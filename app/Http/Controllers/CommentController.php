<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Menyimpan komentar baru ke database.
     */
    public function store(Request $request, BlogPost $post)
    {
        // Pastikan user login
        if (!\Illuminate\Support\Facades\Auth::check()) {
            abort(403);
        }
        // Validasi input
        $request->validate([
            'body' => 'required|string|max:2500',
            'parent_id' => 'nullable|exists:comments,id',
        ]);
        // Sanitasi body komentar
        $body = strip_tags($request->body);
        $post->comments()->create([
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id,
            'parent_id' => $request->parent_id,
            'body' => $body,
        ]);
        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}