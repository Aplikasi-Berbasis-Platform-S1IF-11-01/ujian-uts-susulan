<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function edit() {
        $profile = Profile::firstOrCreate(['id' => 1]);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request) {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'description'       => 'nullable|string',
            'about_description' => 'nullable|string',
            'email'             => 'nullable|email',
            'github_url'        => 'nullable|url|max:255',
            'instagram_url'     => 'nullable|url|max:255',
            'linkedin_url'      => 'nullable|url|max:255',
            'whatsapp_url'      => 'nullable|url|max:255',
            'image'             => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('profile', 'public');
            unset($data['image']);
        }

        Profile::firstOrCreate(['id' => 1])->update($data);
        return back()->with('success', 'Profile berhasil diupdate!');
    }
}