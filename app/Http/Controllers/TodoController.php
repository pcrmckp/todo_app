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
        $validator = $request->validate([
            'content' => 'required | max:20',
        ]);

        $todo =  new Todo();
        $todo->content =  $request->content;
        $todo->timestamps = false;
        $todo->save();
        return redirect('/');
    }

    /*  public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('todos.index', [
            "todos" => $todo
        ]);
    } */

    public function update(Request $request)
    {
        $validator = $request->validate([
            'content' => 'required | max:20',
        ]);
        
        $todo = Todo::find($request->id);
        $todo->content =  $request->content;
        $todo->id = $request->id;
        $todo->save();
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id)->delete();
        return redirect('/');
    }

    /* public function post(Request $request)
    {
        $validate_rule = [
            'content' => 'required | max:20',
        ];
        $this->validate($request, $validate_rule);
        return redirect('/');
    } */
}
