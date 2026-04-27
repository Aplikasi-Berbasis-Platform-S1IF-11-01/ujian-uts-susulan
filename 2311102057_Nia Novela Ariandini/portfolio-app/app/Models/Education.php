<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations'; // TAMBAHKAN INI

    protected $fillable = [
        'institution',
        'major',
        'year',
    ];
}