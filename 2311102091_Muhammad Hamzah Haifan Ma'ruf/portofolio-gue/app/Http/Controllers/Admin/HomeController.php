<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        return view('admin.home.index', compact('profile'));
    }

    public function create()
    {
        return redirect()->route('admin.home.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.home.index');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.home.index');
    }

    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);

        return view('admin.home.edit', compact('profile'));
    }

    public function update(Request $request, string $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'about' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'about' => $request->about,
            'phone' => $request->phone,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'address' => $request->address,
            'photo' => $profile->photo,
        ];

        if ($request->hasFile('photo')) {
            if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
                Storage::disk('public')->delete($profile->photo);
            }

            $data['photo'] = $request->file('photo')->store('profiles', 'public');
        }

        $profile->update($data);

        return redirect()->route('admin.home.index')
            ->with('success', 'Data home berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.home.index');
    }
}