<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
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

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $project->update($validated);
        return redirect()->back();
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->back();
    }
}
