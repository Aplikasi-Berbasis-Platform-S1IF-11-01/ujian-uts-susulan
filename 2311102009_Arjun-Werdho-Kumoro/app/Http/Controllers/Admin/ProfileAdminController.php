<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileAdminController extends Controller {
    public function update(Request $request) {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'tagline'  => 'nullable|string|max:200',
            'about'    => 'nullable|string',
            'email'    => 'nullable|email',
            'github'   => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);
        $profile = Profile::first() ?? new Profile();
        $profile->fill($data)->save();
        return response()->json($profile);
    }

    public function updatePhoto(Request $request) {
        $request->validate(['photo' => 'required|image|max:2048']);
        $path    = $request->file('photo')->store('photos', 'public');
        $profile = Profile::first() ?? new Profile();
        $profile->photo_path = $path;
        $profile->save();
        return response()->json(['photo_path' => $path]);
    }
}