<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Contact;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Nia Novela Ariandini',
                'title' => 'UI/UX Designer',
                'nim' => '2311102057',
                'description' => 'Saya tertarik pada desain antarmuka yang rapi, nyaman digunakan, dan punya alur yang jelas. Fokus saya ada pada layout, wireframe, dan visual yang tetap lembut tanpa mengurangi fungsi.',
                'photo' => null,
                'email' => 'novelaariandini@gmail.com',
                'phone' => '081392150129',
                'address' => 'Sokaraja',
                'github' => 'https://github.com/nianovela16',
                'dribbble' => 'https://dribbble.com/Nianovela',
            ]
        );

        Skill::truncate();
        Skill::insert([
            ['name' => 'UI/UX Design', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Figma', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Canva', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wireframing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Prototype', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Visual Design', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Problem Solving', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Communication', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Teamwork', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Time Management', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Attention to Detail', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Education::truncate();
        Education::insert([
            [
                'institution' => 'SMK Telkom Purwokerto',
                'major' => 'Rekayasa Perangkat Lunak',
                'year' => '2020 - 2023',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'institution' => 'Telkom University Purwokerto',
                'major' => 'S1 Teknik Informatika',
                'year' => '2023 - Sekarang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Experience::truncate();
        Experience::insert([
            [
                'title' => 'UI Designer Intern',
                'company' => 'Selaras Studio',
                'description' => 'Membuat desain antarmuka web, memahami kebutuhan klien, dan belajar menyusun tampilan yang lebih rapi dengan standar kerja profesional.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Freelance UI Designer',
                'company' => 'Selaras Studio',
                'description' => 'Mendesain template presentasi dan kebutuhan visual lainnya dengan pendekatan yang fleksibel, tetap rapi, dan sesuai karakter proyek.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UI/UX Designer Intern',
                'company' => 'Universitas Jenderal Soedirman',
                'description' => 'Terlibat dalam pengembangan desain antarmuka selama kegiatan magang dan membantu penyusunan tampilan yang lebih nyaman digunakan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Project::truncate();
        Project::insert([
            [
                'title' => 'Dashboard UI Exploration',
                'description' => 'Desain antarmuka dengan susunan layout yang terstruktur, tampilan bersih, dan visual modern yang tetap terasa ringan untuk dilihat.',
                'image' => null,
                'link' => 'https://dribbble.com/Nianovela',
                'tag' => 'Dribbble Project',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mobile App Interface Design',
                'description' => 'Eksplorasi tampilan aplikasi dengan pendekatan soft visual, hierarchy yang jelas, dan penyusunan elemen yang lebih konsisten.',
                'image' => null,
                'link' => 'https://dribbble.com/Nianovela',
                'tag' => 'Dribbble Project',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Website UI Concept',
                'description' => 'Konsep desain website yang menonjolkan komposisi visual yang seimbang, warna lembut, dan pengalaman pengguna yang terasa lebih nyaman.',
                'image' => null,
                'link' => 'https://dribbble.com/Nianovela',
                'tag' => 'Dribbble Project',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Contact::updateOrCreate(
            ['id' => 1],
            [
                'email' => 'novelaariandini@gmail.com',
                'phone' => '081392150129',
                'address' => 'Sokaraja',
                'dribbble' => 'https://dribbble.com/Nianovela',
                'github' => 'https://github.com/nianovela16',
            ]
        );
    }
}