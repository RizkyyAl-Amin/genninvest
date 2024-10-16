<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug', 'status'];

    // Relasi ke Berita (satu kategori bisa memiliki banyak berita)
    public function beritas()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }
}
