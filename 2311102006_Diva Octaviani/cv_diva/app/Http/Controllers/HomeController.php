<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $profile    = Profile::first();
        $educations = Education::orderBy('sort_order')->get();
        $skills     = Skill::orderBy('sort_order')->get();
        $portfolios = Portfolio::orderBy('sort_order')->get();

        return view('home', compact('profile', 'educations', 'skills', 'portfolios'));
    }
}