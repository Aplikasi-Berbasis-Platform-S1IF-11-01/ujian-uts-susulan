<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller {
    public function index() { return view('admin.education.index', ['items' => Education::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.education.form', ['item' => new Education()]); }
    public function store(Request $r) { Education::create($this->validateData($r)); return redirect()->route('admin.education.index')->with('success', 'Ditambahkan!'); }
    public function edit(Education $education) { return view('admin.education.form', ['item' => $education]); }
    public function update(Request $r, Education $education) { $education->update($this->validateData($r)); return redirect()->route('admin.education.index')->with('success', 'Diupdate!'); }
    public function destroy(Education $education) { $education->delete(); return back()->with('success', 'Dihapus!'); }
    private function validateData(Request $r) {
        return $r->validate([
            'period' => 'required|string|max:100',
            'institution' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);
    }
}
