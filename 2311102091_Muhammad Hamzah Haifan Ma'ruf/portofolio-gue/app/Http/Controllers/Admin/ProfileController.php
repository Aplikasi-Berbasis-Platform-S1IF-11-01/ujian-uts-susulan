<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();

        return view('admin.profile.index', compact('profile'));
    }

    public function edit(): View
    {
        $profile = Profile::first() ?? new Profile();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $profile = Profile::first() ?? new Profile();

        $validated = $request->validate([
            // HOME
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // ABOUT
            'about' => ['required', 'string'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('photo')) {
            if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
                Storage::disk('public')->delete($profile->photo);
            }

            $validated['photo'] = $request->file('photo')->store('profiles', 'public');
        } else {
            unset($validated['photo']);
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()
            ->route('admin.profile.index')
            ->with('success', 'Data Home dan About berhasil diperbarui.');
    }
}