<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Organization;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        return view('admin.dashboard', [
            'totalHome' => $profile ? 1 : 0,
            'totalAbout' => $profile ? 1 : 0,
            'totalSkills' => Skill::count(),
            'totalEducations' => Education::count(),
            'totalExperiences' => Experience::count(),
            'totalOrganizations' => Organization::count(),
            'totalProjects' => Project::count(),
        ]);
    }
}