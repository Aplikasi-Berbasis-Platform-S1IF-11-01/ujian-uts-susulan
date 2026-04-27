<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company', 'position', 'description',
        'start_date', 'end_date', 'is_current', 'order'
    ];

    protected $casts = ['is_current' => 'boolean'];
}