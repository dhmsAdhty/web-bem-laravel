<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'slug',
        'thumbnail',
        'published_at',
        'is_published',
    ];

     // Cast ke Carbon (biar bisa format())
    protected $casts = [
        'published_at' => 'datetime',
    ];

}