<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Education;

class DashboardController extends Controller
{
    public function index()
{
    $profile = Profile::first();
    $education = Education::orderBy('created_at', 'desc')->get();
    
    // Pastikan diarahkan ke 'welcome' jika ini untuk halaman depan
    return view('welcome', compact('profile', 'education'));
}
}