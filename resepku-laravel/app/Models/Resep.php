<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    // Mengizinkan kolom-kolom ini untuk diisi data
    protected $fillable = ['judul', 'kategori', 'bahan', 'langkah'];
}