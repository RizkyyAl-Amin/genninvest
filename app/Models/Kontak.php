<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $fillable = ["alamat","email","no_hp","fb_url", "ig_url", "yt_url"];

}
