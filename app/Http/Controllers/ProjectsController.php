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

    public function store()
    {
        //Validation

        //Perpetuation
        Project::create(request(['title', 'description']));
        //Redirection
        return redirect('/projects');
    }
}
