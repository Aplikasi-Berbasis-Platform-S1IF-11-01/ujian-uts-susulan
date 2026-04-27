<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'name',
        'title',
        'about',
        'phone',
        'email',
        'instagram',
        'address',
        'photo',
    ];
}