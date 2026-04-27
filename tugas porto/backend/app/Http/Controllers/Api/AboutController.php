<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => About::first()
        ]);
    }
}