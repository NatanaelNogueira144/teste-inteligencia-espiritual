<?php

namespace App\Http\Controllers;

use App\Filters\FeedbacksFilter;
use App\Models\Feedback;
use App\Http\Requests\UpdateFeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $filter = new FeedbacksFilter();
        $filterItems = $filter->transform($request);

        $feedbacks = Feedback::where($filterItems);

        return view('feedbacks.index', [
            'feedbacks' => $feedbacks->paginate(10)->appends($request->query()),
            'request' => $request->all()
        ]);
    }

    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit', ['feedback' => $feedback]);
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->update($request->only('description'));
        return redirect()->route('feedbacks.index')->with('status', [
            'type' => 'success',
            'message' => "O feedback foi atualizado com sucesso!"
        ]);
    }
}
