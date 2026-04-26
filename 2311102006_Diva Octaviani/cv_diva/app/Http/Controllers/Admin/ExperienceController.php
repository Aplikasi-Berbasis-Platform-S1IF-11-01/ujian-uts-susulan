<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('sort_order')->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experience.form', ['experience' => new Experience()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'period'           => 'required|string|max:255',
            'position'         => 'required|string|max:255',
            'company'          => 'required|string|max:255',
            'responsibilities' => 'nullable|string',
            'sort_order'       => 'integer',
        ]);

        // Ubah responsibilities dari textarea (per baris) jadi array JSON
        $data['responsibilities'] = $this->parseResponsibilities($request->responsibilities);

        Experience::create($data);
        return redirect()->route('admin.experience.index')->with('success', 'Experience berhasil ditambahkan!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experience.form', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'period'           => 'required|string|max:255',
            'position'         => 'required|string|max:255',
            'company'          => 'required|string|max:255',
            'responsibilities' => 'nullable|string',
            'sort_order'       => 'integer',
        ]);

        $data['responsibilities'] = $this->parseResponsibilities($request->responsibilities);

        $experience->update($data);
        return redirect()->route('admin.experience.index')->with('success', 'Experience berhasil diupdate!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experience.index')->with('success', 'Experience berhasil dihapus!');
    }

    private function parseResponsibilities(?string $raw): array
    {
        if (!$raw) return [];
        return array_filter(array_map('trim', explode("\n", $raw)));
    }
}