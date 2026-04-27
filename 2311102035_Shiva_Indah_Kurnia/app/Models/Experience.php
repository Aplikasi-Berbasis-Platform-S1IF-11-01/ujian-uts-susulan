<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['posisi', 'perusahaan', 'deskripsi'];
    public $timestamps = false;
}
