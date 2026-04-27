<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('category')->orderBy('order')->get();
        $grouped = $skills->groupBy('category');
        return response()->json($grouped);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string',
            'level'    => 'required|integer|min:0|max:100',
            'icon'     => 'nullable|string',
        ]);

        $skill = Skill::create($request->all());
        return response()->json(['message' => 'Skill added', 'skill' => $skill], 201);
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string',
            'level'    => 'required|integer|min:0|max:100',
            'icon'     => 'nullable|string',
        ]);

        $skill->update($request->all());
        return response()->json(['message' => 'Skill updated', 'skill' => $skill]);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill deleted']);
    }
}