<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectContruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'nama',
        'kategori',
        'deskripsi',
        'tanggal',
        'fotoTambahan1',
        'fotoTambahan2',
        'fotoTambahan3'
    ];
}
