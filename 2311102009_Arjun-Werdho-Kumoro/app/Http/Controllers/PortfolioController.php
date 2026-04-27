<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Landing page — data di-fetch via AJAX, bukan dirender langsung
     */
    public function index()
    {
        return view('portfolio.index');
    }

    /**
     * API: ambil data profil
     */
    public function getProfile()
    {
        $profile = Profile::first();

        if (!$profile) {
            return response()->json([
                'data' => [
                    'name'             => 'Your Name',
                    'role'             => 'Developer',
                    'short_bio'        => 'Welcome to my portfolio!',
                    'bio'              => '',
                    'email'            => '',
                    'phone'            => '',
                    'location'         => '',
                    'github'           => '',
                    'photo'            => null,
                    'experience_years' => 0,
                    'projects_done'    => 0,
                    'clients'          => 0,
                ]
            ]);
        }

        return response()->json(['data' => $profile]);
    }

    /**
     * API: ambil daftar skill
     */
    public function getSkills()
    {
        $skills = Skill::orderBy('level', 'desc')->get();
        return response()->json(['data' => $skills]);
    }

    /**
     * API: ambil daftar project
     */
    public function getProjects()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $projects]);
    }
}