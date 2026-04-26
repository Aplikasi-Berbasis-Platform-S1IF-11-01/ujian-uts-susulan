<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'name' => 'Imelda Fajar Awalina Crisyanti',
            'nim' => '2311102004',
            'role' => 'Web Portfolio Developer',
            'description' => 'Saya tertarik pada pengembangan aplikasi web yang rapi, responsif, dan mudah digunakan. Website ini dibuat sebagai portofolio pribadi yang dapat dikelola melalui dashboard admin.',
            'email' => 'imelda@example.com',
            'phone' => '08xxxxxxxxxx',
            'address' => 'Purwokerto, Indonesia',
            'photo' => '/images/profile.svg',
        ]);

        Skill::insert([
            ['name' => 'Laravel', 'level' => 85],
            ['name' => 'HTML & CSS', 'level' => 90],
            ['name' => 'JavaScript AJAX', 'level' => 80],
            ['name' => 'UI Design', 'level' => 75],
        ]);

        Project::insert([
            ['title' => 'Web Portofolio Dinamis', 'description' => 'Landing page portofolio dengan data yang diambil dari backend menggunakan AJAX.', 'link' => '#'],
            ['title' => 'Dashboard Admin Portfolio', 'description' => 'Halaman admin untuk mengubah profil, skill, dan project.', 'link' => '#'],
        ]);
    }
}
