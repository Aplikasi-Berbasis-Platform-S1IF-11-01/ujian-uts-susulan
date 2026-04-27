<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['nama_lengkap', 'nim', 'program_studi', 'title', 'short_bio', 'about_me', 'email', 'instagram', 'github', 'foto'];
}