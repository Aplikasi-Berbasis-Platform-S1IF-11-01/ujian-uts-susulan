<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get()->map(function ($project) {
            if ($project->image) {
                $project->image_url = asset('storage/' . $project->image);
            }
            return $project;
        });
        return response()->json($projects);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack'  => 'required',
            'image'       => 'nullable|image|max:2048',
            'github_url'  => 'nullable|url',
            'live_url'    => 'nullable|url',
            'featured'    => 'boolean',
        ]);

        $data = $request->except('image');
        if (is_string($data['tech_stack'])) {
            $data['tech_stack'] = json_decode($data['tech_stack'], true) ?? explode(',', $data['tech_stack']);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project = Project::create($data);
        if ($project->image) {
            $project->image_url = asset('storage/' . $project->image);
        }
        return response()->json(['message' => 'Project added', 'project' => $project], 201);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->except(['image', '_method']);
        if (isset($data['tech_stack']) && is_string($data['tech_stack'])) {
            $data['tech_stack'] = json_decode($data['tech_stack'], true) ?? explode(',', $data['tech_stack']);
        }

        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);
        if ($project->image) {
            $project->image_url = asset('storage/' . $project->image);
        }
        return response()->json(['message' => 'Project updated', 'project' => $project]);
    }

    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return response()->json(['message' => 'Project deleted']);
    }
}