@extends('layouts.nav')

@section('content')
@php
use Carbon\Carbon;
use Illuminate\Support\Str;
// Mengatur locale Carbon ke Bahasa Indonesia
Carbon::setLocale('id');
@endphp

<section class="bg-slate-100 py-20 md:py-24">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="text-center" data-aos="fade-down">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Kalender Event Teknik</h2>
            <p class="mt-3 max-w-2xl mx-auto text-lg text-slate-600">Jelajahi, pelajari, dan ikuti kegiatan teknis dan
                non-teknis dari BEM FT UNWAHAS.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

            @forelse ($events as $event)
            @php
            // Logika untuk menentukan status event berdasarkan tanggal
            $now = Carbon::now();
            $startDate = Carbon::parse($event->start_date);
            $endDate = $event->end_date ? Carbon::parse($event->end_date) : $startDate;

            $isUpcoming = $startDate->isFuture();
            $isOngoing = $now->between($startDate, $endDate);
            $isFinished = $endDate->isPast();
            @endphp

            <div class="group flex flex-col overflow-hidden rounded-lg bg-white shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1.5 border border-slate-200"
                data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">

                <div class="relative aspect-[16/9] overflow-hidden">
                    @if($event->banner)
                    <img src="{{ asset('storage/' . $event->banner) }}" alt="Banner {{ $event->title }}"
                        class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                    @else
                    <div class="flex h-full w-full items-center justify-center bg-slate-200">
                        <span class="font-semibold text-slate-500 text-center px-4">{{ Str::limit($event->title, 40)
                            }}</span>
                    </div>
                    @endif

                    {{-- Badge Status Dinamis --}}
                    <div @class([ 'absolute top-3 right-3 text-white text-xs font-bold uppercase tracking-wider rounded-full px-3 py-1 shadow-lg'
                        , 'bg-blue-600'=> $isUpcoming,
                        'bg-green-600 animate-pulse' => $isOngoing,
                        'bg-slate-500' => $isFinished,
                        ])>
                        @if($isUpcoming) Segera @elseif($isOngoing) Berlangsung @else Selesai @endif
                    </div>
                </div>

                <div class="flex flex-1 flex-col p-5">
                    <h3 class="text-lg font-semibold text-slate-800 leading-tight">
                        <a href="#" class="hover:text-blue-600 transition-colors">{{ $event->title }}</a>
                    </h3>

                    <p class="mt-2 text-sm text-slate-600 line-clamp-8">
                        {{ $event->description }}
                    </p>

                    <div class="mt-4 space-y-2 border-t border-slate-200 pt-4 text-sm font-medium">
                        <div class="flex items-center gap-3 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-slate-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $startDate->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-slate-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $event->location ?? 'Online' }}</span>
                        </div>
                    </div>

                    <div class="mt-auto pt-5">
                        @if($isFinished)
                        <button disabled
                            class="block w-full rounded-md bg-slate-300 px-4 py-2.5 text-center text-sm font-semibold text-slate-500 cursor-not-allowed">
                            Event Selesai
                        </button>
                        @else
                        <a href="{{ route('event.register', $event->id) }}"
                            class="block w-full rounded-md bg-slate-800 px-4 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                            Lihat Detail & Daftar
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12" data-aos="fade-up">
                <p class="text-slate-500">Saat ini belum ada event yang tersedia.</p>
            </div>
            @endforelse

        </div>
    </div>
</section>
@endsection