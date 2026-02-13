<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::query()->paginate(2);
        $headers = Project::all()->first()->getFillable();

        return Inertia::render('Projects-list', [
            'headers' => $headers,
            'projects' => $projects
        ]);
    }
}
