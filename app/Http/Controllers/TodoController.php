<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
   public function index()
   {
    return view('todos.index', ['todos' => Todo::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string','max:100'],
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->is_done = false;
        $todo->save();
        return redirect()->route('todos.index');
    }

    public function done(Todo $todo)
    {
        $todo->is_done = true;
        $todo->save();

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }

    public function donedelete()
    {
        Todo::where('is_done',true)->delete();

        return redirect()->route('todos.index');
    }
}

