<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;

// ========================
// PUBLIC PORTFOLIO
// ========================
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');

// ========================
// PUBLIC API ENDPOINTS (AJAX from landing page)
// ========================
Route::prefix('api')->group(function () {
    Route::get('/profile', [PortfolioController::class, 'getProfile']);
    Route::get('/skills', [PortfolioController::class, 'getSkills']);
    Route::get('/projects', [PortfolioController::class, 'getProjects']);
    Route::post('/contact', [ContactController::class, 'store']);
});

// ========================
// ADMIN AUTH
// ========================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ========================
    // ADMIN PROTECTED ROUTES
    // ========================
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profile - Admin API
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Skills CRUD - Admin API
        Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
        Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
        Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
        Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

        // Projects CRUD - Admin API
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        // Contacts - Admin API
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});