<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 

class BeritaController extends Controller
{
    public function index()
    {
        $berita = BlogPost::latest()->get();
        return view('dashboard.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('dashboard.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }


        BlogPost::create([
            'title'        => $request->judul,
            'content'      => $request->konten,
            'slug'         => Str::slug($request->judul),
            'thumbnail'    => $thumbnailPath,
            'is_published' => true,
            'published_at' => now(),
        ]);

        return redirect()->route('dashboard.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    

    public function destroy($id)
    {
        $berita = BlogPost::findOrFail($id);

        if ($berita->thumbnail && \Storage::disk('public')->exists($berita->thumbnail)) {
            \Storage::disk('public')->delete($berita->thumbnail);
        }

        $berita->delete();

        return redirect()->route('dashboard.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    
}
