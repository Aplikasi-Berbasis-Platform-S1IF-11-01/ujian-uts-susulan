<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController as ApiProfileController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\EducationController;

/*
|--------------------------------------------------------------------------
| PUBLIC API (Landing Page)
|--------------------------------------------------------------------------
*/

Route::get('/profile', [ApiProfileController::class, 'index']);
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/experiences', [ExperienceController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ADMIN API (CRUD Dashboard)
|--------------------------------------------------------------------------
*/

// PROFILE ADMIN
Route::get('/admin/profile', [AdminProfileController::class, 'show']);
Route::post('/admin/profile', [AdminProfileController::class, 'update']);

/*
|--------------------------------------------------------------------------
| SKILLS CRUD
|--------------------------------------------------------------------------
*/
Route::post('/skills', [SkillController::class, 'store']);
Route::put('/skills/{id}', [SkillController::class, 'update']);
Route::delete('/skills/{id}', [SkillController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| EXPERIENCE CRUD
|--------------------------------------------------------------------------
*/
Route::post('/experiences', [ExperienceController::class, 'store']);
Route::put('/experiences/{id}', [ExperienceController::class, 'update']);
Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy']);

Route::get('/educations', [EducationController::class, 'index']);
Route::post('/educations', [EducationController::class, 'store']);
Route::put('/educations/{id}', [EducationController::class, 'update']);
Route::delete('/educations/{id}', [EducationController::class, 'destroy']);