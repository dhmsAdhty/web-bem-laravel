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
        // Validasi input
        $request->validate([
            'body' => 'required|string|max:2500',
            // Pastikan jika ada parent_id, id tersebut ada di tabel comments
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        // Buat komentar baru
        $post->comments()->create([
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id, // Mengambil id user yang sedang login
            'parent_id' => $request->parent_id,
            'body' => $request->body,
        ]);

        // Redirect kembali ke halaman post dengan pesan sukses
        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}