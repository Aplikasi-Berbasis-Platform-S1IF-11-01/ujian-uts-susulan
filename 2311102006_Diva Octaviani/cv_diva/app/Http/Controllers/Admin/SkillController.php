<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller {
    public function index() { return view('admin.skill.index', ['items' => Skill::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.skill.form', ['item' => new Skill()]); }
    public function store(Request $r) { Skill::create($this->validateData($r)); return redirect()->route('admin.skill.index')->with('success', 'Ditambahkan!'); }
    public function edit(Skill $skill) { return view('admin.skill.form', ['item' => $skill]); }
    public function update(Request $r, Skill $skill) { $skill->update($this->validateData($r)); return redirect()->route('admin.skill.index')->with('success', 'Diupdate!'); }
    public function destroy(Skill $skill) { $skill->delete(); return back()->with('success', 'Dihapus!'); }
    private function validateData(Request $r) {
        return $r->validate([
            'name'       => 'required|string|max:100',
            'sort_order' => 'nullable|integer',
        ]);
    }
}