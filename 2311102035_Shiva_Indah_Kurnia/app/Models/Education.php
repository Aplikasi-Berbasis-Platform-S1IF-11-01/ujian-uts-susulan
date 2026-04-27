<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations'; // Paksa Laravel pakai nama tabel jamak
    protected $fillable = ['instansi', 'tahun'];
    public $timestamps = false;
}