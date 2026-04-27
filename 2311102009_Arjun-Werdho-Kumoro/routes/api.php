<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\SkillController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\SkillAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;

// ── Public endpoints (AJAX dari landing page) ──
Route::get('/profile',  [ProfileController::class,  'show']);
Route::get('/skills',   [SkillController::class,    'index']);
Route::get('/projects', [ProjectController::class,  'index']);

// ── Admin endpoints (butuh login) ──
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::put('/profile',        [ProfileAdminController::class, 'update']);
    Route::post('/profile/photo', [ProfileAdminController::class, 'updatePhoto']);

    Route::post('/skills',          [SkillAdminController::class,   'store']);
    Route::put('/skills/{skill}',   [SkillAdminController::class,   'update']);
    Route::delete('/skills/{skill}',[SkillAdminController::class,   'destroy']);

    Route::post('/projects',             [ProjectAdminController::class, 'store']);
    Route::put('/projects/{project}',    [ProjectAdminController::class, 'update']);
    Route::delete('/projects/{project}', [ProjectAdminController::class, 'destroy']);
});