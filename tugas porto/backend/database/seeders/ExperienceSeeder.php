<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'company' => 'Company Name',
            'position' => 'Intern Developer',
            'start_date' => now(),
            'end_date' => null,
            'description' => 'Work experience',
            'image' => null
        ]);
    }
}