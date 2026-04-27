<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        return view('admin.about.index', compact('profile'));
    }

    public function create()
    {
        return redirect()->route('admin.about.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.about.index');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.about.index');
    }

    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);

        return view('admin.about.edit', compact('profile'));
    }

    public function update(Request $request, string $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'about' => 'required|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        $profile->update([
            'about' => $request->about,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'instagram' => $request->instagram,
        ]);

        return redirect()->route('admin.about.index')
            ->with('success', 'Data about berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.about.index');
    }
}