<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use Illuminate\Http\Request;

class PortfolioDataController extends Controller
{
    public function getAllData()
    {
        // Ambil data pertama atau buat default kalau kosong
        $profile = Profile::first() ?? new Profile();
        $skills = Skill::all();
        $projects = Project::latest()->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'profile' => $profile,
                'skills' => $skills,
                'projects' => $projects,
                'experiences' => $experiences
            ]
        ]);
    }
}