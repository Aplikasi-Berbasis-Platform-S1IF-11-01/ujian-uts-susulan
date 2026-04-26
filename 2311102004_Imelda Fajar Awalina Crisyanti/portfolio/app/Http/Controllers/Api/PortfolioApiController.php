<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioApiController extends Controller
{
    public function profile()
    {
        return response()->json(Profile::first());
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'nim' => 'nullable|string|max:50',
            'role' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:150',
            'photo' => 'nullable|string|max:255',
        ]);

        $profile = Profile::first();
        $profile->update($data);

        return response()->json(['message' => 'Profil berhasil diperbarui', 'data' => $profile]);
    }

    public function skills()
    {
        return response()->json(Skill::orderBy('id', 'desc')->get());
    }

    public function storeSkill(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'level' => 'required|integer|min:1|max:100',
        ]);

        return response()->json(Skill::create($data));
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'level' => 'required|integer|min:1|max:100',
        ]);

        $skill->update($data);
        return response()->json($skill);
    }

    public function deleteSkill(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill berhasil dihapus']);
    }

    public function projects()
    {
        return response()->json(Project::orderBy('id', 'desc')->get());
    }

    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:120',
            'description' => 'nullable|string',
            'link' => 'nullable|string|max:255',
        ]);

        return response()->json(Project::create($data));
    }

    public function updateProject(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:120',
            'description' => 'nullable|string',
            'link' => 'nullable|string|max:255',
        ]);

        $project->update($data);
        return response()->json($project);
    }

    public function deleteProject(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Project berhasil dihapus']);
    }
}
