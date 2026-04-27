<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'email',
        'phone',
        'location',
        'github',
        'short_bio',
        'bio',
        'photo',
        'experience_years',
        'projects_done',
        'clients',
    ];
}