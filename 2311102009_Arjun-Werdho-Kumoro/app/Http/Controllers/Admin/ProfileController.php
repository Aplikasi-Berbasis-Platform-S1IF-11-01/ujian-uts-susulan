<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Profile::first();
        return response()->json(['data' => $profile]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'             => 'nullable|string|max:100',
            'role'             => 'nullable|string|max:100',
            'email'            => 'nullable|email|max:100',
            'phone'            => 'nullable|string|max:30',
            'location'         => 'nullable|string|max:100',
            'github'           => 'nullable|string|max:200',
            'short_bio'        => 'nullable|string|max:300',
            'bio'              => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'projects_done'    => 'nullable|integer|min:0',
            'clients'          => 'nullable|integer|min:0',
            'photo'            => 'nullable|image|max:2048',
        ]);

        $profile = Profile::firstOrNew([]);
        $data = $request->except(['_token', '_method', 'photo']);
        $profile->fill($data);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
                Storage::disk('public')->delete($profile->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $profile->photo = $path;
        }

        $profile->save();

        return response()->json([
            'message' => 'Profile updated successfully.',
            'data'    => $profile
        ]);
    }
}