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
        $todo->save();
        return redirect('/');
    }

    public function update(Request $request)
    {
        Todo::find($request->id)->update([

            'content' => $request->content
        ]);
        return redirect('/');
    }

    public function delete(Request $id)
    {
        Todo::find($id)->delete();
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
