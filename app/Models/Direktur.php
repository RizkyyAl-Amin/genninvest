<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direktur extends Model
{
    use HasFactory;
    protected $table = 'direktur';
    protected $fillable = ["nama","sambutan"];
}
