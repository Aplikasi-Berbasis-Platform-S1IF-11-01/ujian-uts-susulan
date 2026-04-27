<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/data-portfolio', [App\Http\Controllers\PortfolioController::class, 'getApiData']);

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Utama
    Route::get('/dashboard', [PortfolioController::class, 'index'])->name('dashboard');

    // Profile
    Route::post('/profile/update', [PortfolioController::class, 'updateProfile'])->name('profile.update-data');

    // Skills
    Route::post('/skill/add', [PortfolioController::class, 'addSkill'])->name('skill.add');
    Route::post('/skill/update/{id}', [PortfolioController::class, 'updateSkill'])->name('skill.update');
    Route::get('/skill/delete/{id}', [PortfolioController::class, 'deleteSkill'])->name('skill.delete');

    // Projects
    Route::post('/project/add', [PortfolioController::class, 'addProject'])->name('project.add');
    Route::post('/project/update/{id}', [PortfolioController::class, 'updateProject'])->name('project.update');
    Route::get('/project/delete/{id}', [PortfolioController::class, 'deleteProject'])->name('project.delete');
});

require __DIR__.'/auth.php';