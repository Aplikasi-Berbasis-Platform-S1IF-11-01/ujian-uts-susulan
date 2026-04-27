<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Portfolio Website',
            'category' => 'Web',
            'description' => 'My portfolio project',
            'image' => null
        ]);
    }
}