<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductManufacture extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'nama',
        'kategori',
        'harga',
        'deskripsi',
        'dekripsiTambahan',
        'berat',
        'ukuran',
        'fotoTambahan1',
        'fotoTambahan2',
        'fotoTambahan3',
        'created_at'
    ];
}
