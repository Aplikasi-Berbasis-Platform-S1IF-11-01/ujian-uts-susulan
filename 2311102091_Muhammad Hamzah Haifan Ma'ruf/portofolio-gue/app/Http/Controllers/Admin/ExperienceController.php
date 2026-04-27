<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Experience::create([
            'company' => $request->company,
            'position' => $request->position,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.experience.index')
            ->with('success', 'Data experience berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.experience.index');
    }

    public function edit(string $id)
    {
        $experience = Experience::findOrFail($id);
        return view('admin.experience.edit', compact('experience'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $experience = Experience::findOrFail($id);

        $experience->update([
            'company' => $request->company,
            'position' => $request->position,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.experience.index')
            ->with('success', 'Data experience berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('admin.experience.index')
            ->with('success', 'Data experience berhasil dihapus.');
    }
}