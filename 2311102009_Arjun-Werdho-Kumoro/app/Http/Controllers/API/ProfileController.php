<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Profile;

class ProfileController extends Controller {
    public function show() {
        $profile = Profile::first();
        if (!$profile) return response()->json(['message' => 'Not found'], 404);
        return response()->json($profile);
    }
}