<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortfolioController;

Route::get('/profile', [PortfolioController::class, 'profile']);
Route::get('/skills', [PortfolioController::class, 'skills']);
Route::get('/educations', [PortfolioController::class, 'educations']);
Route::get('/experiences', [PortfolioController::class, 'experiences']);
Route::get('/projects', [PortfolioController::class, 'projects']);
Route::get('/contact', [PortfolioController::class, 'contact']);
Route::get('/portfolio-data', [PortfolioController::class, 'getAllData']);