<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function create(Request $request)
    {
        $new_task = new ToDo();
        $new_task->task = $request->task;
        $new_task->is_complete = false;
        $new_task->save();

        return redirect('/q1');
    }

    public function index()
    {
        $todos = ToDo::all();
        return view('question1', compact('todos'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $results = ToDo::where('task', 'like', "%$keyword%")->get();

        return view('question1', compact('results'));
    }

    public function updatePage($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('to-do-update', compact('todo'));
    }

    public function deleteTask($id)
    {
        ToDo::destroy($id);
        return redirect('/q1');
    }

    public function update(Request $request, $id)
{
    $todo = ToDo::findOrFail($id);
    $todo->task = $request->task;
    $todo->is_complete = $request->is_complete;
    $todo->save();

    return redirect('/q1');
}
}
