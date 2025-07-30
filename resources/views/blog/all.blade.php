@extends('layouts.nav')

@section('content')
<section id="blog-all" class="py-16 bg-blue-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Semua Berita & Artikel</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Kumpulan informasi, kegiatan, dan prestasi terbaru Fakultas
                Teknik UNWAHAS</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
            <article
                class="overflow-hidden rounded-lg shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                @php
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $thumbnail = $blog->thumbnail;
                $isValidImage = false;
                $isValidSlug = !empty($blog->slug) && preg_match('/^[a-zA-Z0-9-_]+$/', $blog->slug);
                if ($thumbnail) {
                $ext = strtolower(pathinfo($thumbnail, PATHINFO_EXTENSION));
                $isValidImage = in_array($ext, $allowedExtensions);
                }
                @endphp
                @if($isValidSlug)
                <a href="{{ route('blog.show', $blog->slug) }}">
                    <img alt="{{ $blog->title }}"
                        src="{{ $isValidImage ? asset('storage/' . $thumbnail) : 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80' }}"
                        class="h-48 w-full object-cover rounded-t-lg" />
                </a>
                @else
                <img alt="{{ $blog->title }}"
                    src="{{ $isValidImage ? asset('storage/' . $thumbnail) : 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80' }}"
                    class="h-48 w-full object-cover rounded-t-lg" />
                @endif
                <div class="bg-white p-6 rounded-b-lg">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($blog->published_at ?? $blog->created_at)->translatedFormat('d F
                            Y') }}</span>
                    </div>
                    <a href="{{ route('blog.show', $blog->slug) }}">
                        <h3
                            class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors line-clamp-2">
                            {{ $blog->title }}</h3>
                    </a>
                    <p class="mt-3 text-gray-600 line-clamp-3">{{ $blog->excerpt ??
                        \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}</p>
                    <div class="mt-4 flex items-center">
                        <a href="{{ route('blog.show', $blog->slug) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center transition-colors">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center text-gray-500 py-12">
                Belum ada blog atau berita yang dipublikasikan.
            </div>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection