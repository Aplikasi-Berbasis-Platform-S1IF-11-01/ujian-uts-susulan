<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan halaman form edit
    public function edit()
    {
        $profile = Profile::first(); // Ambil data profile pertama
        return view('admin.profile.edit', compact('profile'));
    }

    // Proses update data ke database
    public function update(Request $request)
    {
        $profile = Profile::first();

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            // Simpan foto baru
            $path = $request->file('photo')->store('profile_photos', 'public');
            $profile->photo = $path;
        }

        $profile->update([
            'name' => $request->name,
            'title' => $request->title,
            'nim' => $request->nim,
            'description' => $request->description,
            'dribbble' => $request->dribbble,
        ]);

        return redirect()->back()->with('success', 'Profile berhasil diperbarui!');
    }
}