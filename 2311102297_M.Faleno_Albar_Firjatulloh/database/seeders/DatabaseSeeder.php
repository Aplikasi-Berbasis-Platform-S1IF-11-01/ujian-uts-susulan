<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::firstOrCreate(
            ['email' => 'admin@portfolio.com'],
            [
                'name'     => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        // Profile Faleno
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'name'      => 'M. Faleno Albar Firjatulloh',
                'title'     => 'UI Designer & Frontend Developer',
                'bio'       => 'Halo! Saya M. Faleno Albar Firjatulloh, mahasiswa Universitas Telkom yang passionate di bidang UI Design & Frontend Development. Saya senang menciptakan tampilan web yang indah, intuitif, dan memberikan pengalaman terbaik bagi pengguna. Di luar coding, saya mengisi waktu dengan bermain gitar dan sepak bola — dua hal yang mengajarkan saya tentang kreativitas dan kerja tim.',
                'email'     => 'faleno@student.telkomuniversity.ac.id',
                'phone'     => '+62 812 3456 7890',
                'location'  => 'Bandung, Jawa Barat',
                'github'    => 'https://github.com/faleno',
                'linkedin'  => 'https://linkedin.com/in/faleno',
                'instagram' => '@faleno',
                'photo'     => null,
                'cv_file'   => null,
            ]
        );

        // Skills UI/Frontend fokus
        Skill::truncate();
        $skills = [
            // UI Design
            ['name' => 'Figma',        'category' => 'UI Design',  'level' => 88, 'icon' => 'fas fa-pen-nib',    'order' => 0],
            ['name' => 'UI/UX Design', 'category' => 'UI Design',  'level' => 85, 'icon' => 'fas fa-palette',    'order' => 1],
            ['name' => 'Prototyping',  'category' => 'UI Design',  'level' => 80, 'icon' => 'fas fa-object-group','order' => 2],
            // Frontend
            ['name' => 'HTML & CSS',   'category' => 'Frontend',   'level' => 92, 'icon' => 'fab fa-html5',      'order' => 3],
            ['name' => 'JavaScript',   'category' => 'Frontend',   'level' => 78, 'icon' => 'fab fa-js',         'order' => 4],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend',   'level' => 88, 'icon' => 'fab fa-css3-alt',   'order' => 5],
            ['name' => 'Vue.js',       'category' => 'Frontend',   'level' => 72, 'icon' => 'fab fa-vuejs',      'order' => 6],
            // Backend
            ['name' => 'Laravel',      'category' => 'Backend',    'level' => 75, 'icon' => 'fab fa-laravel',    'order' => 7],
            ['name' => 'MySQL',        'category' => 'Backend',    'level' => 70, 'icon' => 'fas fa-database',   'order' => 8],
            // Tools
            ['name' => 'Git & GitHub', 'category' => 'Tools',      'level' => 80, 'icon' => 'fab fa-github',     'order' => 9],
            ['name' => 'VS Code',      'category' => 'Tools',      'level' => 90, 'icon' => 'fas fa-code',       'order' => 10],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Projects
        Project::truncate();
        $projects = [
            [
                'title'       => 'Personal Portfolio Website',
                'description' => 'Website portofolio pribadi dengan desain modern dark-theme, dibangun menggunakan Laravel dan Tailwind CSS dengan sistem AJAX untuk fetching data.',
                'tech_stack'  => json_encode(['Laravel', 'Tailwind CSS', 'JavaScript', 'MySQL']),
                'github_url'  => 'https://github.com/faleno/portfolio',
                'live_url'    => null,
                'featured'    => true,
                'order'       => 0,
            ],
            [
                'title'       => 'UI Redesign — Mobile App',
                'description' => 'Redesign tampilan aplikasi mobile dengan pendekatan user-centered design. Fokus pada keterbacaan, konsistensi warna, dan kemudahan navigasi.',
                'tech_stack'  => json_encode(['Figma', 'Prototyping', 'UI/UX']),
                'github_url'  => null,
                'live_url'    => null,
                'featured'    => true,
                'order'       => 1,
            ],
            [
                'title'       => 'Dashboard Admin UI Kit',
                'description' => 'Komponen UI kit untuk dashboard admin dengan desain yang bersih dan konsisten. Mencakup tabel, chart, form, dan berbagai komponen interaktif.',
                'tech_stack'  => json_encode(['Figma', 'HTML', 'CSS', 'Tailwind CSS']),
                'github_url'  => 'https://github.com/faleno/ui-kit',
                'live_url'    => null,
                'featured'    => false,
                'order'       => 2,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Experience
        Experience::truncate();
        Experience::create([
            'company'     => 'Universitas Telkom',
            'position'    => 'Mahasiswa Aktif — Teknik Informatika',
            'description' => 'Sedang menempuh pendidikan S1 dengan fokus pada pengembangan web dan desain antarmuka. Aktif mengikuti berbagai proyek kampus dan kompetisi desain UI/UX.',
            'start_date'  => '2022-09',
            'end_date'    => null,
            'is_current'  => true,
            'order'       => 0,
        ]);
    }
}