<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // 📄 halaman dashboard admin
    public function index()
    {
        return view('admin.profile');
    }

    // 📥 ambil data (READ)
    public function show()
    {
        return response()->json(Profile::first());
    }

    // ✏️ update data (UPDATE)
    public function update(Request $request)
{
    $profile = Profile::first();

    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('profiles', 'public');
        $profile->photo = $path;
    }

    $profile->name = $request->name;
    $profile->description = $request->description;
    $profile->save();

    return response()->json([
        'message' => 'Updated successfully'
    ]);
}
}