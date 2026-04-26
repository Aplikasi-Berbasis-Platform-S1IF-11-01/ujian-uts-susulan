<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguard();

        // Akun admin
        User::factory()->create([
            'name' => 'diva',
            'email' => 'admin@divaocta.test',
            'password' => Hash::make('admin123'),
        ]);

        // Profil utama
        Profile::create([
            'name' => 'Diva Octaviani',
            'title' => 'Data & AI Enthusiast',
            'description' => 'Mahasiswa Teknik Informatika Telkom University Purwokerto yang tertarik mengeksplorasi dunia data, machine learning, serta jaringan komputer. Saya percaya data yang diolah dengan baik dapat menjadi solusi nyata.',
            'about_title' => 'Belajar, Tumbuh, dan Berkarya Lewat Data',
            'about_description' => 'Saya mahasiswa Teknik Informatika dengan pengalaman sebagai asisten praktikum di Laboratorium High Performance dan Laboratorium Jaringan Komputer. Selain menyukai dunia jaringan dan sistem operasi, saya sedang aktif memperdalam analisis data dan kecerdasan buatan untuk menyiapkan diri menghadapi industri teknologi.',
            'achievement_title' => 'Pencapaian Utama',
            'achievement_description' => 'Silver Medal kategori Pop/Jazz pada Karangturi International Choir Competition 2025, serta tersertifikasi BNSP Junior Network Administrator dan MikroTik Certified Network Associate (MTCNA).',
            'image_url' => 'https://via.placeholder.com/400',
            'cv_url' => '#',
            'email' => 'divaoctaviani848@gmail.com',
            'phone' => '087867466781',
            'location' => 'Purwokerto, Jawa Tengah',
            'github_url' => 'https://github.com/divaocta',
            'instagram_url' => 'https://instagram.com/divaocta',
            'linkedin_url' => 'https://www.linkedin.com/in/divaoctaviani/',
            'whatsapp_url' => 'https://wa.me/6287867466781',
        ]);

        // Pendidikan
        Education::create([
            'period' => '2023 - Sekarang',
            'institution' => 'Telkom University Purwokerto',
            'major' => 'S1 Teknik Informatika',
            'description' => 'Fokus pada analisis data, kecerdasan buatan (AI), basis data, struktur data, dan jaringan komputer.',
            'sort_order' => 1,
        ]);

        Education::create([
            'period' => '2020 - 2023',
            'institution' => 'SMK Negeri 1 Sragi',
            'major' => 'Teknik Komputer dan Jaringan',
            'description' => 'Mempelajari fundamental jaringan komputer, instalasi sistem operasi, dan troubleshooting perangkat keras.',
            'sort_order' => 2,
        ]);

        // Skill
        $skills = [
            'Python (Data & ML)',
            'SQL & MySQL',
            'PHP & Laravel',
            'HTML, CSS, JavaScript',
            'Microsoft Office & Google Workspace',
            'Instalasi & Konfigurasi OS',
            'Virtualisasi (VirtualBox, VMware)',
            'MikroTik & Networking',
            'Troubleshooting Hardware',
            'Problem Solving & Teamwork',
        ];
        foreach ($skills as $i => $skill) {
            Skill::create(['name' => $skill, 'sort_order' => $i]);
        }

        // Portfolio - Project Analisis Sentimen
        Portfolio::create([
            'title' => 'Analisis Sentimen Ulasan Produk',
            'description' => 'Project analisis sentimen menggunakan Python untuk mengklasifikasikan ulasan produk menjadi sentimen positif, negatif, dan netral. Memanfaatkan library Pandas, Scikit-learn, dan Natural Language Toolkit (NLTK) untuk preprocessing teks dan pemodelan.',
            'image_url' => 'https://via.placeholder.com/300x200',
            'link' => '#',
            'sort_order' => 1,
        ]);

        Portfolio::create([
            'title' => 'Sentiment Analysis Media Sosial',
            'description' => 'Analisis sentimen cuitan publik terhadap suatu topik menggunakan Python dan teknik Natural Language Processing (NLP). Menghasilkan visualisasi tren opini publik melalui word cloud dan grafik distribusi sentimen.',
            'image_url' => 'https://via.placeholder.com/300x200',
            'link' => '#',
            'sort_order' => 2,
        ]);

        Portfolio::create([
            'title' => 'Klasifikasi Komentar dengan Machine Learning',
            'description' => 'Membangun model machine learning untuk mengklasifikasikan komentar berdasarkan sentimen menggunakan algoritma Naive Bayes dan Support Vector Machine (SVM). Project ini mencakup pembersihan data, ekstraksi fitur dengan TF-IDF, dan evaluasi model.',
            'image_url' => 'https://via.placeholder.com/300x200',
            'link' => '#',
            'sort_order' => 3,
        ]);
    }
}
