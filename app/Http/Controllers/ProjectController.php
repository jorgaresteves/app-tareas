<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
        $projects = Project::all();

        $users = User::all();

        $tasks = Task::all();

        return view('projects.index')->with('projects', $projects)->with('users', $users)->with('tasks', $tasks);
    }

    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $project = new Project;

        $project->name = $request->name;
        $project->status = $request->status;
        $project->description = $request->description;

        $project->save();

        return redirect()->back();
    }


    public function show(Project $project)
    {
        //
    }


    public function edit(Project $project)
    {
        //
    }


    public function update(Request $request, Project $project)
    {
        //
    }


    public function destroy(Project $project)
    {
        //
    }
}
