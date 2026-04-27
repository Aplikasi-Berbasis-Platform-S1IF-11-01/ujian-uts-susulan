<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillAdminController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'level'    => 'required|integer|between:0,100',
            'category' => 'required|string|max:50',
            'icon'     => 'nullable|string',
        ]);
        return response()->json(Skill::create($data), 201);
    }

    public function update(Request $request, Skill $skill) {
        $data = $request->validate([
            'name'     => 'sometimes|string|max:100',
            'level'    => 'sometimes|integer|between:0,100',
            'category' => 'sometimes|string|max:50',
            'icon'     => 'nullable|string',
        ]);
        $skill->update($data);
        return response()->json($skill);
    }

    public function destroy(Skill $skill) {
        $skill->delete();
        return response()->json(['message' => 'Skill dihapus']);
    }
}