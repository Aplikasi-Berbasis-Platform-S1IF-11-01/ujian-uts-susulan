<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}