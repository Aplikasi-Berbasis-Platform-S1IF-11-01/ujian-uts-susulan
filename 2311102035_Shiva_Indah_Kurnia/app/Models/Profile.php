<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['nama', 'nim', 'title', 'deskripsi', 'foto', 'email', 'instagram', 'linkedin'];
    public $timestamps = false;
}
