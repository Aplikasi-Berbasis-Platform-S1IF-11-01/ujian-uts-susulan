<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
            'project_name' => $request->project_name,
            'project_type' => $request->project_type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data project berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.projects.index');
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Project::findOrFail($id);

        $project->update([
            'project_name' => $request->project_name,
            'project_type' => $request->project_type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data project berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data project berhasil dihapus.');
    }
}