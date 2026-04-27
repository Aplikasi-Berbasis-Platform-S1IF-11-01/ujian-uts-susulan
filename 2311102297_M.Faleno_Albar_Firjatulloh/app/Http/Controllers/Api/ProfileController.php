<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Profile::first();
        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }
        if ($profile->photo) {
            $profile->photo_url = asset('storage/' . $profile->photo);
        }
        return response()->json($profile);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'title'     => 'required|string|max:255',
            'bio'       => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'nullable|string',
            'location'  => 'nullable|string',
            'github'    => 'nullable|url',
            'linkedin'  => 'nullable|url',
            'instagram' => 'nullable|string',
            'photo'     => 'nullable|image|max:2048',
        ]);

        $profile = Profile::firstOrCreate([]);
        $data = $request->except(['photo', 'cv_file', '_method']);

        if ($request->hasFile('photo')) {
            if ($profile->photo) Storage::disk('public')->delete($profile->photo);
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        if ($request->hasFile('cv_file')) {
            if ($profile->cv_file) Storage::disk('public')->delete($profile->cv_file);
            $data['cv_file'] = $request->file('cv_file')->store('cv', 'public');
        }

        $profile->update($data);
        if ($profile->photo) {
            $profile->photo_url = asset('storage/' . $profile->photo);
        }
        return response()->json(['message' => 'Profile updated successfully', 'profile' => $profile]);
    }
}