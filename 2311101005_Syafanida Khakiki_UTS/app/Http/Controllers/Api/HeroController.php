<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;

class HeroController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Hero::first()
        ]);
    }
}