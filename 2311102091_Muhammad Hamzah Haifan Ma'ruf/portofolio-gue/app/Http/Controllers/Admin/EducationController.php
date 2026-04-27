<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::latest()->get();
        return view('admin.education.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'start_year' => 'required|digits:4',
            'end_year' => 'nullable|digits:4',
        ]);

        Education::create([
            'institution' => $request->institution,
            'major' => $request->major,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
        ]);

        return redirect()->route('admin.education.index')
            ->with('success', 'Data education berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.education.index');
    }

    public function edit(string $id)
    {
        $education = Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'start_year' => 'required|digits:4',
            'end_year' => 'nullable|digits:4',
        ]);

        $education = Education::findOrFail($id);

        $education->update([
            'institution' => $request->institution,
            'major' => $request->major,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
        ]);

        return redirect()->route('admin.education.index')
            ->with('success', 'Data education berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('admin.education.index')
            ->with('success', 'Data education berhasil dihapus.');
    }
}