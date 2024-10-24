<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriArticle extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'kategori_id');
    }
}
