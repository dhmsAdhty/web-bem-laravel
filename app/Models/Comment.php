<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'user_id',
        'parent_id',
        'body',
    ];

    /**
     * Sebuah komentar dimiliki oleh satu Post.
     */
    public function blog(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class);
    }

    /**
     * Sebuah komentar ditulis oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Sebuah komentar bisa memiliki banyak balasan (replies).
     * Ini adalah relasi ke model itu sendiri.
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}