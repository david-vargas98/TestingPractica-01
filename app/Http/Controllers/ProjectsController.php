<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        //We want to fetch all of the projects
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function store()
    {
        //Validation
        $attributes = request()->validate(['title' => 'required', 'description' => 'required']);
        //Perpetuation
        Project::create($attributes);
        //Redirection
        return redirect('/projects');
    }
}
