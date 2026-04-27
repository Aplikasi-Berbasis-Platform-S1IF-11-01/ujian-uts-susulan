<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Skill::create([
            'skill_name' => $request->skill_name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skill = Skill::findOrFail($id);

        $skill->update([
            'skill_name' => $request->skill_name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus.');
    }
}