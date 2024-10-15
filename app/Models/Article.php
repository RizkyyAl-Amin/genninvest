<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ["title","text_content","image","user_id"];

    public function user() :BelongsTo {
        return $this->BelongsTo(User::class);
    }
}
