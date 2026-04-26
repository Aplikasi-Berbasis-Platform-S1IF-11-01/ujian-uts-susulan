<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\OrganizationController; 

Route::get('/', [HomeController::class, 'index'])->name('home');

// API routes untuk AJAX
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/profile', fn() => response()->json(\App\Models\Profile::first()));
    Route::get('/educations', fn() => response()->json(\App\Models\Education::orderBy('sort_order')->get()));
    Route::get('/skills', fn() => response()->json(\App\Models\Skill::orderBy('sort_order')->get()));
    Route::get('/portfolios', fn() => response()->json(\App\Models\Portfolio::orderBy('sort_order')->get()));
    Route::get('/experiences', fn() => response()->json(\App\Models\Experience::orderBy('sort_order')->get()));
    Route::get('/organizations', fn() => response()->json(\App\Models\Organization::orderBy('sort_order')->get()));
});

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('education', EducationController::class);
    Route::resource('skill', SkillController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::post('/portfolio/sync-github', [PortfolioController::class, 'syncGithub'])->name('portfolio.sync-github');
    Route::resource('experience', ExperienceController::class);
    Route::resource('organization', OrganizationController::class); 
});

require __DIR__.'/auth.php';