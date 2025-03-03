<?php

namespace App\Http\Controllers;

use App\Models\SideBar;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $sidebar = SideBar::latest()->first();
        return view('projects.index', compact('projects','sidebar'));
    }

    public function create()
    {
        $sidebar = SideBar::latest()->first();
        return view('projects.create',compact('sidebar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image',
            'description' => 'required',
        ]);

        $photoPath = $request->file('photo')->store('projects', 'public');

        Project::create([
            'name' => $request->name,
            'photo' => $photoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $project->photo);
            $photoPath = $request->file('photo')->store('projects', 'public');
            $project->update(['photo' => $photoPath]);
        }

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        Storage::delete('public/' . $project->photo);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
