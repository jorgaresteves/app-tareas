<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tasks = Task::all();

        $users = User::all();

        return view('tasks.index')->with('tasks', $tasks)->with('users', $users);

    }

    
    public function create()
    {
        $users = User::all();

        return view('tasks.create')->with('users', $users);
    }

    
    public function store(Request $request)
    {
        $task = new Task;

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->is_complete = false;
        $task->project_id = $request->project_id;
        $task->user_id = $request->user_id;

        $task->save();

        $users = User::all();

        Session::flash('exito', 'Se guardó correctamente tu tarea.');
        if($request->source == 'proyectos'){
           return redirect()->route('proyectos.index')->with('users', $users);
        }else{
           return redirect()->route('tareas.index'); 
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit')->with('task', $task);
    }

    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;

        $task->save();

        Session::flash('info', 'Tu tarea fue editada correctamente.');

        return redirect()->route('tareas.index');
    }

    public function status($id)
    {
        $task = Task::find($id);
        $task->is_complete = true;
        $task->save();

        Session::flash('info', 'Tarea completada.');

        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        Session::flash('alert', 'Se eliminó correctamente.');

        return redirect()->back();
    }
}
