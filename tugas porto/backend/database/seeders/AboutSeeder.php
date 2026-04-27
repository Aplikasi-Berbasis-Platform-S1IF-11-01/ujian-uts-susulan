<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::updateOrCreate(
            ['id' => 1],
            [
                'description' => 'About me description',
                'education' => 'Informatics Engineering',
                'software' => 'Laravel, Figma, Photoshop'
            ]
        );
    }
}