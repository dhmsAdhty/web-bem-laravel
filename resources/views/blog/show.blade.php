@extends('layouts.nav')

@section('content')
@php
use Carbon\Carbon;
use Illuminate\Support\Str;
Carbon::setLocale('id');
@endphp

@if(isset($blogs))
@foreach($blogs as $blog)
@php
// Menghitung estimasi waktu baca (rata-rata 200 kata per menit)
$wordCount = str_word_count(strip_tags($blog->content));
$readingTime = ceil($wordCount / 200);
@endphp
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Konten Artikel Utama --}}
        <article class="mx-auto w-full max-w-3xl">
            {{-- Header Artikel --}}
            <header class="mb-6 lg:mb-8 not-format" data-aos="fade-up">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full object-cover" src="{{ asset('assets/BEMFT.png') }}"
                            alt="{{ $blog->author ?? 'Penulis' }}">
                        <div>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->author ?? 'BEM FT
                                UNWAHAS' }}</span>
                            <p class="text-base text-gray-500 dark:text-gray-400">Kontributor</p>
                            <div class="flex items-center gap-x-4 text-base text-gray-500 dark:text-gray-400 mt-1">
                                <p>
                                    <time pubdate datetime="{{ Carbon::parse($blog->published_at)->toIso8601String() }}"
                                        title="{{ Carbon::parse($blog->published_at)->translatedFormat('d F Y') }}">
                                        {{ Carbon::parse($blog->published_at)->translatedFormat('d M Y') }}
                                    </time>
                                </p>
                                <span class="text-gray-300 dark:text-gray-600">&bull;</span>
                                <p class="flex items-center gap-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $readingTime }} mnt baca
                                </p>
                            </div>
                        </div>
                    </div>
                </address>
                <h1
                    class="mb-4 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 lg:mb-6 lg:text-5xl dark:text-white">
                    {{ $blog->title }}
                </h1>
            </header>
            @if($blog->thumbnail)
            <figure class="my-8" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Gambar utama untuk {{ $blog->title }}"
                    class="w-full rounded-xl shadow-lg">
            </figure>
            @endif
            {{-- Isi Artikel dengan Styling Typography --}}
            <div class="prose prose-lg lg:prose-xl dark:prose-invert max-w-none" data-aos="fade-up"
                data-aos-delay="200">
                {!! $blog->content !!}
            </div>
            {{-- Tombol Berbagi (Social Share) --}}
            <div class="mt-12" data-aos="fade-up">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Bagikan Artikel Ini:</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                        Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-lg bg-black px-4 py-2 text-sm font-semibold text-white transition hover:bg-gray-800">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.064c0 2.298 1.634 4.215 3.791 4.649-.69.188-1.452.23-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.5 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                        Twitter
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' - ' . url()->current()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-lg bg-green-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-600">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.456l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.267.655 4.398 1.803 6.12l-1.479 5.424 5.533-1.45z" />
                        </svg>
                        WhatsApp
                    </a>
                    <div x-data="{ copied: false }" class="relative">
                        <button
                            @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2000)"
                            class="inline-flex items-center gap-2 rounded-lg bg-slate-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span x-show="!copied">Salin Link</span>
                            <span x-show="copied" class="text-white">Link Disalin!</span>
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </div>
</main>
@endforeach
@else
@php
// Menghitung estimasi waktu baca (rata-rata 200 kata per menit)
$wordCount = str_word_count(strip_tags($blog->content));
$readingTime = ceil($wordCount / 200);
@endphp
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Konten Artikel Utama --}}
        <article class="mx-auto w-full max-w-3xl">
            {{-- Header Artikel --}}
            <header class="mb-6 lg:mb-8 not-format" data-aos="fade-up">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full object-cover" src="{{ asset('assets/BEMFT.png') }}"
                            alt="{{ $blog->author ?? 'Penulis' }}">
                        <div>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->author ?? 'BEM FT
                                UNWAHAS' }}</span>
                            <p class="text-base text-gray-500 dark:text-gray-400">Kontributor</p>
                            <div class="flex items-center gap-x-4 text-base text-gray-500 dark:text-gray-400 mt-1">
                                <p>
                                    <time pubdate datetime="{{ Carbon::parse($blog->published_at)->toIso8601String() }}"
                                        title="{{ Carbon::parse($blog->published_at)->translatedFormat('d F Y') }}">
                                        {{ Carbon::parse($blog->published_at)->translatedFormat('d M Y') }}
                                    </time>
                                </p>
                                <span class="text-gray-300 dark:text-gray-600">&bull;</span>
                                <p class="flex items-center gap-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $readingTime }} mnt baca
                                </p>
                            </div>
                        </div>
                    </div>
                </address>
                <h1
                    class="mb-4 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 lg:mb-6 lg:text-5xl dark:text-white">
                    {{ $blog->title }}
                </h1>
            </header>
            @if($blog->thumbnail)
            <figure class="my-8" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Gambar utama untuk {{ $blog->title }}"
                    class="w-full rounded-xl shadow-lg">
            </figure>
            @endif
            {{-- Isi Artikel dengan Styling Typography --}}
            <div class="prose prose-lg lg:prose-xl dark:prose-invert max-w-none" data-aos="fade-up"
                data-aos-delay="200">
                {!! $blog->content !!}
            </div>
            {{-- Tombol Berbagi (Social Share) --}}
            <div class="mt-12" data-aos="fade-up">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Bagikan Artikel Ini:</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                        Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-lg bg-black px-4 py-2 text-sm font-semibold text-white transition hover:bg-gray-800">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.064c0 2.298 1.634 4.215 3.791 4.649-.69.188-1.452.23-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.5 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                        Twitter
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' - ' . url()->current()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-lg bg-green-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-600">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.456l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.267.655 4.398 1.803 6.12l-1.479 5.424 5.533-1.45z" />
                        </svg>
                        WhatsApp
                    </a>
                    <div x-data="{ copied: false }" class="relative">
                        <button
                            @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2000)"
                            class="inline-flex items-center gap-2 rounded-lg bg-slate-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span x-show="!copied">Salin Link</span>
                            <span x-show="copied" class="text-white">Link Disalin!</span>
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </div>
</main>
@endif

{{-- Garis Pemisah --}}
<hr class="my-12 lg:my-16 border-gray-200 dark:border-gray-700">

{{-- Layout untuk Postingan & Event Sidebar --}}
<div class=" p-10 flex flex-col lg:flex-row gap-12 lg:gap-16">
    <section class="flex-1">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white" data-aos="fade-right">Postingan Terbaru</h2>

        <div class="grid gap-8 sm:grid-cols-2">
            @forelse($latestBlogs as $latestBlog)
            <div class="card group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <a href="{{ route('blog.show', $latestBlog->slug) }}" class="block overflow-hidden rounded-t-xl">
                    <img src="{{ $latestBlog->thumbnail ? asset('storage/' . $latestBlog->thumbnail) : 'https://via.placeholder.com/400x200' }}"
                        class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
                        alt="Image for {{ $latestBlog->title }}">
                </a>

                <div class="p-6 bg-white dark:bg-gray-800 rounded-b-xl shadow-md">
                    <h3 class="mb-2 text-lg font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="{{ route('blog.show', $latestBlog->slug) }}"
                            class="hover:text-blue-600 dark:hover:text-blue-400 transition line-clamp-2">
                            {{ $latestBlog->title }}
                        </a>
                    </h3>

                    <p class="mb-4 text-sm text-gray-500 dark:text-gray-400 line-clamp-3">
                        {{ Str::limit(strip_tags($latestBlog->excerpt ?? $latestBlog->content), 120) }}
                    </p>

                    <a href="{{ route('blog.show', $latestBlog->slug) }}"
                        class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">
                        Baca selengkapnya
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-500 dark:text-gray-400 sm:col-span-2">Tidak ada postingan terbaru.</p>
            @endforelse
        </div>
    </section>

    <aside class="w-full lg:w-80 lg:flex-shrink-0">
        <div class="sticky top-24">
            <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white" data-aos="fade-left">Event
                Mendatang</h2>
            <ul class="space-y-4">
                @php $maxEvents = 3; @endphp
                @forelse($events->take($maxEvents) as $event)
                <li data-aos="fade-left" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('event.show', $event->id) }}"
                        class="group flex gap-4 rounded-lg bg-gray-50 p-4 transition-all duration-300 hover:bg-white hover:shadow-lg dark:bg-gray-800 dark:hover:bg-gray-700 border border-transparent dark:hover:border-gray-600">
                        <div
                            class="flex h-12 w-12 flex-shrink-0 flex-col items-center justify-center rounded-md bg-blue-100 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300">
                            <span class="block text-xl font-bold">{{ Carbon::parse($event->start_date)->format('d')
                                }}</span>
                            <span class="block text-xs font-semibold uppercase">{{
                                Carbon::parse($event->start_date)->format('M') }}</span>
                        </div>
                        <div>
                            <h4
                                class="font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-blue-400 line-clamp-2">
                                {{ $event->title }}</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($event->location, 25) }}
                            </p>
                        </div>
                    </a>
                </li>
                @empty
                <li class="text-gray-500 dark:text-gray-400" data-aos="fade-left">Belum ada event mendatang.</li>
                @endforelse
            </ul>
            <div class="mt-6 text-center">
                <a href="/event"
                    class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition-colors">
                    Lihat Semua Event
                </a>
            </div>
        </div>
    </aside>
</div>
</div>
</main>
@endsection