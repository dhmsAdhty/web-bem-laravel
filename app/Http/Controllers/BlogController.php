<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     * Only show published posts, ordered by published date.
     */
    public function index()
    {
        $blogs = BlogPost::where('is_published', true)->orderByDesc('published_at')->paginate(10);
        $events = \App\Models\Event::orderByDesc('start_date')->take(5)->get();
        $latestBlogs = BlogPost::where('is_published', true)->orderByDesc('published_at')->take(4)->get();
        return view('blog.all', compact('blogs', 'events', 'latestBlogs'));
    }

    /**
     * Display a single blog post by slug.
     * Only allow access to published posts, or to admin/editor users.
     */
    public function show($slug)
    {
        // Validasi slug hanya karakter aman
        if (!preg_match('/^[a-zA-Z0-9-_]+$/', $slug)) {
            abort(404);
        }
        $blog = BlogPost::where('slug', $slug)
            ->firstOrFail();
        if (!$blog->is_published) {
            // Only allow admin/editor to preview unpublished posts
            if (!Auth::check() || !Auth::user()->hasAnyRole(['admin', 'editor'])) {
                abort(404);
            }
        }
        // Artikel terkait
        $relatedBlogs = BlogPost::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->take(4)
            ->get();
        // Postingan terbaru
        $latestBlogs = BlogPost::where('is_published', true)
            ->orderByDesc('published_at')
            ->take(4)
            ->get();
        // Daftar event untuk sidebar
        $events = \App\Models\Event::orderByDesc('start_date')->take(5)->get();
        return view('blog.show', compact('blog', 'relatedBlogs', 'latestBlogs', 'events'));
    }
}