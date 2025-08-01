@extends('layouts.nav')

@section('content')
<section class="bg-white dark:bg-gray-900" x-data="{ activeFilter: 'Semua' }"> {{-- Inisialisasi Alpine.js untuk filter
    --}}

    <div class="container px-6 py-16 mx-auto">
        {{-- Header Section --}}
        <div class="text-center" data-aos="fade-down">
            <h1 class="text-3xl font-bold text-gray-800 capitalize lg:text-4xl dark:text-white">Tim BEM FT UNWAHAS</h1>
            <p class="max-w-3xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">
                Kenali pilar-pilar organisasi kami. Inilah tim yang berdedikasi untuk memajukan Fakultas Teknik melalui
                inovasi, kolaborasi, dan pengabdian.
            </p>
        </div>

        {{-- Tombol Filter Dinamis --}}
        <div class="flex items-center justify-center" data-aos="fade-up" data-aos-delay="100">
            <div
                class="flex flex-wrap justify-center items-center p-1.5 border border-blue-600 dark:border-blue-500 rounded-xl">
                <!-- Tombol "Semua" -->
                <button @click="activeFilter = 'Semua'"
                    :class="activeFilter === 'Semua' ? 'bg-blue-600 text-white' : 'text-blue-600 dark:text-blue-400 hover:bg-blue-500 hover:text-white'"
                    class="px-4 py-2 text-sm font-medium capitalize transition-colors duration-300 md:py-2.5 rounded-lg md:px-6">
                    Semua
                </button>

                <!-- Tombol untuk setiap departemen -->
                @foreach($departments as $departement)
                <button @click="activeFilter = '{{ $departement }}'"
                    :class="activeFilter === '{{ $departement }}' ? 'bg-blue-600 text-white' : 'text-blue-600 dark:text-blue-400 hover:bg-blue-500 hover:text-white'"
                    class="px-4 py-2 mx-1 text-sm font-medium capitalize transition-colors duration-300 md:py-2.5 rounded-lg md:mx-2 md:px-6">
                    {{ $departement }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Grid Kartu Anggota --}}
        <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
            @forelse($members as $member)
            <div class="flex flex-col items-center p-6 transition-all duration-300 transform bg-gray-50 dark:bg-gray-800 rounded-xl hover:shadow-lg hover:-translate-y-2"
                x-show="activeFilter === 'Semua' || activeFilter === '{{ $member->departemen }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100" data-aos="fade-up"
                data-aos-delay="{{ ($loop->index % 4) * 100 }}">

                @php
                $isLocalImage = $member->foto && !str_starts_with($member->foto, 'http');
                $fotoUrl = $isLocalImage ? asset('storage/' . basename($member->foto)) : ($member->foto ??
                'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&background=dbeafe&color=1e40af');
                @endphp
                <img class="object-cover w-32 h-32 rounded-full ring-4 ring-blue-300 dark:ring-blue-500"
                    src="{{ $fotoUrl }}" alt="Foto {{ e($member->name) }}"
                    onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&background=dbeafe&color=1e40af';">

                <h3 class="mt-4 text-xl font-semibold text-gray-700 capitalize dark:text-white">{{ e($member->name) }}
                </h3>

                <p class="mt-1 text-sm text-blue-600 dark:text-blue-400 capitalize">{{ e($member->departemen) }}</p>

                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">{{ e($member->prodi) }}</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">NIM: {{ e($member->nim) }}</p>

                {{-- Placeholder untuk Ikon Sosial Media --}}
                <div class="flex mt-4 -mx-2">
                    <a href="#"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="Instagram">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.585-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.585-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.585.069-4.85c.149-3.225 1.664-4.771 4.919-4.919C8.415 2.175 8.796 2.163 12 2.163zm0 1.441c-3.111 0-3.48.012-4.693.068-2.61.12-3.832 1.34-3.951 3.951-.056 1.21-.067 1.575-.067 4.693s.011 3.483.067 4.693c.119 2.61 1.341 3.832 3.951 3.951.22.01.46.015.68.018.22.003.46.005.68.005s.46-.002.68-.005c.22-.003.46-.008.68-.018 2.61-.119 3.832-1.341 3.951-3.951.056-1.21.067-1.575.067-4.693s-.011-3.483-.067-4.693c-.119-2.61-1.341-3.832-3.951-3.951-.22-.01-.46-.015-.68-.018-.22-.003-.46-.005-.68-.005zm0 2.882c-1.955 0-3.518 1.563-3.518 3.518s1.563 3.518 3.518 3.518 3.518-1.563 3.518-3.518-1.563-3.518-3.518-3.518zm0 5.596c-1.149 0-2.078-.929-2.078-2.078s.929-2.078 2.078-2.078 2.078.929 2.078 2.078-.929 2.078-2.078 2.078zm4.965-5.252c-.578 0-1.046.468-1.046 1.046s.468 1.046 1.046 1.046 1.046-.468 1.046-1.046-.468-1.046-1.046-1.046z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="LinkedIn">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zM5 8h-5v16h5v-16zm7.5-5h-1v2h1c1.3 0 2.5 1.111 2.5 3.518v9.482h-5v-8.362c0-.98-.447-1.638-1.5-1.638s-1.5.658-1.5 1.638v8.362h-5v-16h5v2.161c.896-1.583 2.297-2.661 4.5-2.661c2.227 0 4.042 1.583 4.042 4.438v9.062h-5v-9.482c0-2.402-1.2-3.518-2.5-3.518z" />
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-12">
                <p>Belum ada data anggota untuk ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection