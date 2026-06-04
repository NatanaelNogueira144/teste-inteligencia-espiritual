<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\{ Answer, Level, Question, Result };
use Illuminate\Http\Request;
use App\Mail\TestResultsMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class FormController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        if($user->result) {
            return view('result', ['result' => $user->result]);
        }

        $questions = Question::get();
        return view('form', ['questions' => $questions]);
    }

    public function submit(TestRequest $request) 
    {
        $user = Auth::user();
        if($user->result) {
            return redirect()->route('form');
        }

        DB::transaction(function() use ($user, $request) {
            $scores = [];
            $answers = [];

            foreach($request->answers as $questionId => $note) {
                $answers[] = (new Answer())->fill([
                    'question_id' => $questionId,
                    'note' => $note
                ]);
            }

            foreach($answers as $answer) {
                if(!isset($scores[$answer->question->result_number])) {
                    $scores[$answer->question->result_number] = 0;
                }

                $scores[$answer->question->result_number] += $answer->note;
            }

            $total = array_sum($scores);
            $result = Result::create([
                'user_id' => $user->id,
                'first_result' => $scores[1],
                'second_result' => $scores[2],
                'third_result' => $scores[3],
                'fourth_result' => $scores[4],
                'general_result' => $total,
                'level_id' => Level::where([
                    ['min_note', '<=', $total],
                    ['max_note', '>=', $total]
                ])->first()?->id ?? 0
            ]);

            foreach($answers as $answer) {
                $answer->result_id = $result->id;
                $answer->save();
            }
        });

        return redirect()->route('form');
    }
}
