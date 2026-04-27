<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['judul_project', 'deskripsi_project', 'link_project', 'gambar_project', 'urutan'];
}
