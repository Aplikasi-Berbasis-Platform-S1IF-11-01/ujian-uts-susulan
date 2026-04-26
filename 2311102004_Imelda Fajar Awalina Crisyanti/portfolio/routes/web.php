<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PortfolioApiController;

Route::get('/', [PageController::class, 'home']);
Route::get('/admin', [PageController::class, 'admin']);

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('api')->group(function () {
    Route::get('/profile', [PortfolioApiController::class, 'profile']);
    Route::put('/profile', [PortfolioApiController::class, 'updateProfile']);

    Route::get('/skills', [PortfolioApiController::class, 'skills']);
    Route::post('/skills', [PortfolioApiController::class, 'storeSkill']);
    Route::put('/skills/{skill}', [PortfolioApiController::class, 'updateSkill']);
    Route::delete('/skills/{skill}', [PortfolioApiController::class, 'deleteSkill']);

    Route::get('/projects', [PortfolioApiController::class, 'projects']);
    Route::post('/projects', [PortfolioApiController::class, 'storeProject']);
    Route::put('/projects/{project}', [PortfolioApiController::class, 'updateProject']);
    Route::delete('/projects/{project}', [PortfolioApiController::class, 'deleteProject']);
});