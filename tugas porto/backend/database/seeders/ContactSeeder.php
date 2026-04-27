<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'email' => 'email@example.com',
                'phone' => '08123456789',
                'address' => 'Indonesia',
                'social_media' => '@instagram'
            ]
        );
    }
}