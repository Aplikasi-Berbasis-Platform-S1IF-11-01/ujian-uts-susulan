<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectAdminController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'title'       => 'required|string|max:150',
            'description' => 'nullable|string',
            'tech_stack'  => 'nullable|array',
            'demo_url'    => 'nullable|url',
            'repo_url'    => 'nullable|url',
            'is_featured' => 'boolean',
        ]);
        return response()->json(Project::create($data), 201);
    }

    public function update(Request $request, Project $project) {
        $data = $request->validate([
            'title'       => 'sometimes|string|max:150',
            'description' => 'nullable|string',
            'tech_stack'  => 'nullable|array',
            'demo_url'    => 'nullable|url',
            'repo_url'    => 'nullable|url',
            'is_featured' => 'boolean',
        ]);
        $project->update($data);
        return response()->json($project);
    }

    public function destroy(Project $project) {
        $project->delete();
        return response()->json(['message' => 'Project dihapus']);
    }
}