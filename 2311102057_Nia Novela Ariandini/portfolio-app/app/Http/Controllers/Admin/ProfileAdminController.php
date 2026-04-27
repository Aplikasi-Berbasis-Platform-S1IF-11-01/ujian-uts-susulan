<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileAdminController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile', compact('profile'));
    }

    public function update(Request $request)
{
    try {
        $profile = Profile::first();

        if (!$profile) {
            $profile = new Profile();
        }

        $validated = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'nim' => 'required',
            'description' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'github' => 'nullable',
            'dribbble' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
    if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
        Storage::disk('public')->delete($profile->photo);
    }

    $file = $request->file('photo');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('', $filename, 'public');

    $profile->photo = $filename;
    
        }

        $profile->name = $validated['name'];
        $profile->title = $validated['title'];
        $profile->nim = $validated['nim'];
        $profile->description = $validated['description'];
        $profile->email = $validated['email'] ?? null;
        $profile->phone = $validated['phone'] ?? null;
        $profile->address = $validated['address'] ?? null;
        $profile->github = $validated['github'] ?? null;
        $profile->dribbble = $validated['dribbble'] ?? null;

        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile berhasil diupdate',
            'photo_url' => $profile->photo ? asset('storage/' . $profile->photo) : null,
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors' => $e->errors(),
        ], 422);
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi error di server',
            'error' => $e->getMessage(),
        ], 500);
    }
}
}