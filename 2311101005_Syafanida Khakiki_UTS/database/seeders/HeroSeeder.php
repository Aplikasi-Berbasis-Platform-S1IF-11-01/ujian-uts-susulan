<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::updateOrCreate(
            ['id' => 1],
            [
                'greeting' => 'Hello!',
                'name' => 'Your Name',
                'title' => 'Web Developer',
                'description' => 'Welcome to my portfolio'
            ]
        );
    }
}