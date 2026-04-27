<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\ContactController;

// HERO
Route::get('/hero', [HeroController::class, 'index']);

// ABOUT
Route::get('/about', [AboutController::class, 'index']);

// PROJECTS
Route::get('/projects', [ProjectController::class, 'index']);

// EXPERIENCES
Route::get('/experiences', [ExperienceController::class, 'index']);

// CONTACT
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);