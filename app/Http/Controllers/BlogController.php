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
        $blogs = BlogPost::where('is_published', true)->orderByDesc('published_at')->take(6)->get();
        return view('welcome', compact('blogs'));
    }

    /**
     * Display a single blog post by slug.
     * Only allow access to published posts, or to admin/editor users.
     */
    public function show($slug)
    {
        $blog = BlogPost::where('slug', $slug)->firstOrFail();
        if (!$blog->is_published) {
            // Only allow admin/editor to preview unpublished posts
            if (!Auth::check() || !Auth::user()->hasAnyRole(['admin', 'editor'])) {
                abort(404);
            }
        }
        return view('welcome', compact('blog'));
    }
}