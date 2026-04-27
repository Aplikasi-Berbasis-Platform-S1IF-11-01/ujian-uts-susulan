<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\PortfolioAdminController;
use App\Http\Controllers\Admin\EducationAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/profile', [ProfileAdminController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/update', [ProfileAdminController::class, 'update'])->name('admin.profile.update');

    Route::get('/admin/portfolio', [PortfolioAdminController::class, 'index'])->name('admin.portfolio');
    Route::post('/admin/portfolio/store', [PortfolioAdminController::class, 'store'])->name('admin.portfolio.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Education Routes
    Route::get('/admin/education', [EducationAdminController::class, 'index'])->name('admin.education');
    Route::post('/admin/education/store', [EducationAdminController::class, 'store'])->name('admin.education.store');
    Route::post('/admin/education/{id}/update', [EducationAdminController::class, 'update'])->name('admin.education.update');
    Route::delete('/admin/education/{id}/delete', [EducationAdminController::class, 'destroy'])->name('admin.education.delete');
});

require __DIR__.'/auth.php';