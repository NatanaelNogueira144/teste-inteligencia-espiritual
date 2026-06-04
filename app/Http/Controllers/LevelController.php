<?php

namespace App\Http\Controllers;

use App\Filters\LevelsFilter;
use App\Models\Level;
use App\Http\Requests\UpdateLevelRequest;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(Request $request)
    {
        $filter = new LevelsFilter();
        $filterItems = $filter->transform($request);

        $levels = Level::where($filterItems);

        return view('levels.index', [
            'levels' => $levels->paginate(10)->appends($request->query()),
            'request' => $request->all()
        ]);
    }

    public function edit(Level $level)
    {
        return view('levels.edit', ['level' => $level]);
    }

    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->only('name'));
        return redirect()->route('levels.index')->with('status', [
            'type' => 'success',
            'message' => "O nível foi atualizado com sucesso!"
        ]);
    }
}
