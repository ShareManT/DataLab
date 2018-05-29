<?php

namespace App\Http\Controllers;

use App\Project;


class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::where('display', 1)->latest('created_at')->paginate(6);
        return view('project.index', compact('projects', 'type'));
    }

    public function item($id)
    {
        $project = Project::where('display', 1)->where('id', $id)->first();
        return view('project.show', compact('project'));
    }

}

