<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Skill::orderBy('level', 'desc')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'level'    => 'nullable|integer|min:0|max:100',
            'category' => 'nullable|string|max:100',
        ]);

        $skill = Skill::create($request->only(['name', 'level', 'category']));

        return response()->json(['message' => 'Skill added.', 'data' => $skill], 201);
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'level'    => 'nullable|integer|min:0|max:100',
            'category' => 'nullable|string|max:100',
        ]);

        $skill->update($request->only(['name', 'level', 'category']));

        return response()->json(['message' => 'Skill updated.', 'data' => $skill]);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill deleted.']);
    }
}