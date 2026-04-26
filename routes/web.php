<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Http\Controllers\Api\PortfolioController;

// --- API UNTUK AJAX (TAMBAHKAN INI AGAR TIDAK ERROR) ---
// Ini jalur yang dicari oleh tampilan depan kamu
Route::get('/api/portfolio', function () {
    return response()->json([
        'profile' => Profile::first(),
        'skills' => Skill::all(),
        'educations' => Education::all(),
        'experiences' => Experience::all(),
        'portfolios' => Portfolio::all()
    ]);
});

// --- HALAMAN DEPAN ---
Route::get('/', function () {
    $profile = Profile::first();
    $skills = Skill::all();
    $educations = Education::all();
    $experiences = Experience::all();
    $portfolios = Portfolio::all();
    return view('welcome', compact('profile', 'skills', 'educations', 'experiences', 'portfolios'));
});

// --- DASHBOARD UTAMA ---
Route::get('/admin/shiva', function () {
    return view('admin.dashboard'); 
});

// --- KELOLA PROFILE ---
Route::get('/admin/profile', function () {
    $profile = Profile::first();
    return view('admin.profile', compact('profile'));
});

Route::post('/admin/update-profile', function (Request $request) {
    $profile = Profile::first() ?? new Profile;
    $profile->nama = $request->nama;
    $profile->title = $request->title;
    $profile->nim = $request->nim;
    $profile->deskripsi = $request->deskripsi;
    $profile->email = $request->email;
    $profile->instagram = $request->instagram;
    $profile->linkedin = $request->linkedin;
    
    if ($request->hasFile('foto')) {
        $profile->foto = $request->file('foto')->store('uploads', 'public');
    }

    $profile->save();
    return back()->with('success', 'Profile & Kontak berhasil diperbarui!');
})->name('admin.profile.update');

// --- KELOLA SKILLS ---
Route::get('/admin/skills', function () {
    return view('admin.skills', ['skills' => Skill::all()]);
});

Route::post('/admin/skills', function (Request $request) {
    Skill::create($request->all());
    return back()->with('success', 'Skill berhasil ditambah!');
});

Route::delete('/admin/skills/{id}', function ($id) {
    Skill::findOrFail($id)->delete();
    return back()->with('success', 'Skill dihapus!');
});

// --- KELOLA EDUCATION ---
Route::get('/admin/education', function () {
    return view('admin.education', ['educations' => Education::all()]);
});

Route::post('/admin/education', function (Request $request) {
    Education::create($request->all());
    return back()->with('success', 'Pendidikan berhasil ditambah!');
});

Route::delete('/admin/education/{id}', function($id){ 
    Education::findOrFail($id)->delete(); 
    return back(); 
});

// --- KELOLA EXPERIENCE ---
Route::get('/admin/experience', function () {
    return view('admin.experience', ['experiences' => Experience::all()]);
});

Route::post('/admin/experience', function (Request $request) {
    Experience::create($request->all());
    return back()->with('success', 'Pengalaman berhasil ditambah!');
});

Route::delete('/admin/experience/{id}', function($id){ 
    Experience::findOrFail($id)->delete(); 
    return back(); 
});

// --- KELOLA PORTFOLIO ---
Route::get('/admin/portfolio-manage', function () {
    return view('admin.portfolio_manage', ['portfolios' => Portfolio::all()]);
});

Route::post('/admin/portfolio-manage', function (Request $request) {
    $data = $request->all();
    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('portfolios', 'public');
    }
    Portfolio::create($data);
    return back()->with('success', 'Project baru berhasil dipublish!');
});

Route::delete('/admin/portfolio-manage/{id}', function($id){ 
    Portfolio::findOrFail($id)->delete(); 
    return back(); 
});

// --- MENU CONTACT ---
Route::get('/admin/contact', function () {
    $profile = Profile::first();
    return view('admin.profile', compact('profile'));
});