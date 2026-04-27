<?php

use Illuminate\Support\Facades\Route;
use App\Models\Hero;
use App\Models\About;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Contact;

// HOME PAGE (PORTFOLIO)
Route::get('/', function () {

    return view('home', [
        'hero' => Hero::first(),
        'about' => About::first(),
        'projects' => Project::latest()->get(),
        'experiences' => Experience::latest()->get(),
        'contact' => Contact::first(),
    ]);
});

// ADMIN DASHBOARD
Route::get('/admin', function () {
    return view('admin.dashboard');
});