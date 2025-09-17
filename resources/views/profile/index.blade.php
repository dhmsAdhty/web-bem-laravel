@extends('layouts.nav')

@section('content')
<section class="bg-white dark:bg-gray-900" x-data="{ activeFilter: 'Semua' }">

    <div class="container px-6 py-16 mx-auto">
        {{-- Header Section --}}
        <div class="text-center" data-aos="fade-down">
            <h1 class="text-3xl font-bold text-gray-800 capitalize lg:text-4xl dark:text-white">Tim BEM FT UNWAHAS</h1>
            <p class="max-w-3xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">
                Kenali pilar-pilar organisasi kami. Inilah tim yang berdedikasi untuk memajukan Fakultas Teknik melalui
                inovasi, kolaborasi, dan pengabdian.
            </p>
        </div>

        {{-- Tombol Filter Dinamis (Desain Baru) --}}
        <div class="flex flex-wrap items-center justify-center gap-3 mt-8 mb-12" data-aos="fade-up"
            data-aos-delay="100">
            <!-- Tombol "Semua" -->
            <button @click="activeFilter = 'Semua'"
                :class="activeFilter === 'Semua' ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 ring-1 ring-gray-200 dark:ring-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700'"
                class="px-5 py-2.5 rounded-full text-sm font-semibold transform transition-all duration-300 ease-in-out hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900">
                Semua
            </button>

            <!-- Tombol untuk setiap departemen -->
            @foreach ($departments as $department)
            <button @click="activeFilter = '{{ $department }}'"
                :class="activeFilter === '{{ $department }}' ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 ring-1 ring-gray-200 dark:ring-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700'"
                class="px-5 py-2.5 rounded-full text-sm font-semibold transform transition-all duration-300 ease-in-out hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900">
                {{ $department }}
            </button>
            @endforeach
        </div>


        {{-- Grid Kartu Anggota (Desain Baru) --}}
        <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 md:grid-cols-2 xl:grid-cols-4">
            @forelse($members as $member)
            <div class="flex flex-col items-center p-6 text-center bg-white dark:bg-gray-800/50 rounded-2xl shadow-sm transition-all duration-300 transform hover:shadow-xl hover:-translate-y-2 hover:ring-2 hover:ring-blue-500 dark:hover:ring-blue-400"
                x-show="activeFilter === 'Semua' || activeFilter === '{{ $member->departemen }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95" data-aos="fade-up"
                data-aos-delay="{{ ($loop->index % 4) * 100 }}">

                @php
                $isLocalImage = $member->foto && !str_starts_with($member->foto, 'http');
                $fotoUrl = $isLocalImage
                ? asset('storage/foto_anggota/' . basename($member->foto))
                : $member->foto ??
                'https://ui-avatars.com/api/?name=' .
                urlencode($member->name) .
                '&background=dbeafe&color=1e40af';
                @endphp
                <img class="object-cover w-32 h-32 rounded-full ring-4 ring-blue-300 dark:ring-blue-500"
                    src="{{ $fotoUrl }}" alt="Foto {{ e($member->name) }}"
                    onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&background=dbeafe&color=1e40af';">

                <h3 class="mt-4 text-xl font-semibold text-gray-700 capitalize dark:text-white">
                    {{ e($member->name) }}
                </h3>

                <p class="mt-1 text-sm text-blue-600 dark:text-blue-400 capitalize">{{ e($member->departemen) }}</p>

                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">{{ e($member->prodi) }}</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">NIM: {{ e($member->nim) }}</p>
                <p class="text-lg mt-4 text-gray-800 dark:text-gray-200 font-bold capitalize"> {{ e($member->jabatan) }}
                </p>

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