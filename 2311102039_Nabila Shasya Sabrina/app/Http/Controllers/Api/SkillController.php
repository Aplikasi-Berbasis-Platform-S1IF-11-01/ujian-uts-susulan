<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    // READ
    public function index()
    {
        return response()->json(Skill::all());
    }

    // CREATE
    public function store(Request $request)
    {
        $skill = Skill::create([
            'name' => $request->name,
            'level' => $request->level
        ]);

        return response()->json($skill);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->update([
            'name' => $request->name,
            'level' => $request->level
        ]);

        return response()->json(['message' => 'updated']);
    }

    // DELETE
    public function destroy($id)
    {
        Skill::destroy($id);

        return response()->json(['message' => 'deleted']);
    }
}