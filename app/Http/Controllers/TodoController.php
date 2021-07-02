<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('id', 'asc')->get();
        return view('todos.index', [
            "todos" => $todos
        ]);
    }

    public function create(Request $request)
    {
        $todo =  new Todo();
        $todo->content =  $request->content;
        $todo->timestamps = false;
        $todo->save();
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('todos.index', [
            "todos" => $todo
        ]);
    }

    public function update(Request $request)
    {
        $todo = Todo::find($request->id)->update;
        $todo->content =  $request->content;
        $todo->id = $request->id;
        $todo->save();
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id)->delete;

        return redirect('/');
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'content' => 'required' | 20,
        ];
        $this->validate($request, $validate_rule);
    }
}
