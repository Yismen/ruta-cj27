<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TodosRequest;
use App\Http\Controllers\Controller;

use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Todo $todos)
    {
        $singleTodo = new $todos; // new instance of todos in order to get the date

        $todos = $todos->whereUserId(auth()->user()->id)->orderBy("due", "ASC")->paginate(10);


        return view('todos.index', compact('todos', 'singleTodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Todo $todo)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Todo $todos, TodosRequest $request)
    {
        $todos = auth()->user()->todos()->create($request->all());
        
        return redirect()->route('admin.todos.index')
            ->withSuccess("La tarea [$todos->name] ha sido guardada satisfactoriamente...");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Todo $todo, TodosRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->back()
            ->withWarning("La tarea [$todo->name] ha sido borrada.");
    }

    /**
     * Set the passed todo id as completed
     * @param  [type] $id   todo's id
     * @param  Todo   $todo the Todo database
     * @return [type]       redirect
     */
    public function completar($id, Todo $todo)
    {
        $todo = $todo->findOrFail($id);

        $todo->done = 1;

        $todo->save();

        return redirect()->back()
             ->withSuccess("La tarea [$todo->name] ha sido marcada como completada"); 

    }

    /**
     * Set the passed todo id as incompleted
     * @param  [type] $id   todo's id
     * @param  Todo   $todo the Todo database
     * @return [type]       redirect
     */
    public function incompletar($id, Todo $todo)
    {
        $todo = $todo->findOrFail($id);

        $todo->done = 0;

        $todo->save();

        return redirect()->back()
             ->withSuccess("La tarea [$todo->name] ha sido marcada como pendiente"); 
    }

    public function removeDoneTasks(Todo $todos)
    {
        $todos->where('done', 1)->delete();  

        return redirect()->route('admin.todos.index')
             ->withWarning("All tasks marked as done have been removed!"); 
    }
}
