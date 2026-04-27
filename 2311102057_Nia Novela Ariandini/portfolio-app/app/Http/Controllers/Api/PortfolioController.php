<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Contact;

class PortfolioController extends Controller
{
    public function profile()
    {
        return response()->json(Profile::first());
    }

    public function skills()
    {
        return response()->json(Skill::all());
    }

    public function educations()
    {
        return response()->json(Education::all());
    }

    public function experiences()
    {
        return response()->json(Experience::all());
    }

    public function projects()
    {
        return response()->json(Project::all());
    }

    public function contact()
    {
        return response()->json(Contact::first());
    }
}