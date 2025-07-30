@extends('layouts.nav')

@section('content')
{{-- =================================================================== --}}
{{-- =================== KODE POPUP NOTIFIKASI SUKSES ================== --}}
{{-- =================================================================== --}}
@if (session('success'))
<div x-data="{ showModal: true }" x-show="showModal" @keydown.escape.window="showModal = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">

    <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="showModal = false"></div>

    <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        class="relative w-full max-w-md bg-white rounded-2xl shadow-xl p-8 text-center">

        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-100 mb-5">
            <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h3 class="text-2xl font-bold text-slate-800">Pendaftaran Berhasil!</h3>
        <p class="mt-3 text-slate-600 leading-relaxed">
            Selamat, pendaftaran Anda pada event: <strong class="font-semibold text-blue-600">"{{
                session('success')['eventName'] }}"</strong> sudah berhasil.
        </p>
        <p class="mt-2 text-sm text-slate-500">
            Informasi selanjutnya bisa menghubungi panitia event.
        </p>

        <div class="mt-8">
            <button @click="showModal = false"
                class="w-full rounded-lg bg-blue-600 px-6 py-3 text-lg font-semibold text-white shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endif
{{-- =================== AKHIR KODE POPUP SUKSES ====================== --}}


{{-- =================================================================== --}}
{{-- =================== KODE POPUP NOTIFIKASI ERROR =================== --}}
{{-- =================================================================== --}}
@if (session('error'))
<div x-data="{ showModal: true }" x-show="showModal" @keydown.escape.window="showModal = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">

    <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="showModal = false"></div>

    <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        class="relative w-full max-w-md bg-white rounded-2xl shadow-xl p-8 text-center">

        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-100 mb-5">
            <svg class="h-12 w-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>

        <h3 class="text-2xl font-bold text-slate-800">Pendaftaran Gagal!</h3>
        <p class="mt-3 text-slate-600 leading-relaxed">
            {{ session('error') }}
        </p>

        <div class="mt-8">
            <button @click="showModal = false"
                class="w-full rounded-lg bg-red-600 px-6 py-3 text-lg font-semibold text-white shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition">
                Coba Lagi
            </button>
        </div>
    </div>
</div>
@endif
{{-- =================== AKHIR KODE POPUP ERROR ====================== --}}


{{-- Latar Belakang Section --}}
<section
    class=" mb-20 w-full min-h-screen bg-gradient-to-br from-blue-50 via-white flex items-center justify-center p-4">

    {{-- Container Form dengan Animasi --}}
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-8 md:p-10 transform opacity-0 translate-y-10 transition-all duration-500 ease-out"
        x-data="{ loaded: false }" x-init="setTimeout(() => { loaded = true }, 100)"
        :class="{'opacity-100 translate-y-0': loaded}">

        {{-- Judul dan Subjudul --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Formulir Pendaftaran Event</h2>
            <p class="text-slate-500 mt-2">Daftarkan diri Anda untuk mengikuti event: <strong class="text-blue-600">{{
                    $event->title }}</strong></p>
        </div>

        {{-- ... SISA KODE FORM ANDA (TIDAK PERLU DIUBAH) ... --}}
        <form method="POST" action="{{ route('event.register.store', $event->id) }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name" required
                    class="w-full border border-slate-300 bg-slate-50 rounded-lg px-4 py-3 text-slate-700 placeholder-slate-400
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    placeholder="Contoh: Budi Santoso" value="{{ old('name') }}">
                @error('name')<span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Alamat Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full border border-slate-300 bg-slate-50 rounded-lg px-4 py-3 text-slate-700 placeholder-slate-400
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    placeholder="contoh@email.com" value="{{ old('email') }}">
                @error('email')<span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="university" class="block text-sm font-medium text-slate-700 mb-2">Asal Universitas</label>
                <input type="text" id="university" name="university" required
                    class="w-full border border-slate-300 bg-slate-50 rounded-lg px-4 py-3 text-slate-700 placeholder-slate-400
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    placeholder="Contoh: Universitas Wahid Hasyim" value="{{ old('university') }}">
                @error('university')<span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">No. HP / WhatsApp
                    (Aktif)</label>
                <input type="tel" id="phone" name="phone" required
                    class="w-full border border-slate-300 bg-slate-50 rounded-lg px-4 py-3 text-slate-700 placeholder-slate-400
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    placeholder="Contoh: 081234567890" value="{{ old('phone') }}">
                @error('phone')<span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="event_id" class="block text-sm font-medium text-slate-700 mb-2">Pilih Event</label>

                @php
                // Mencari nama event yang terpilih saat ini untuk ditampilkan di tombol
                // Ini penting agar saat ada error validasi, pilihan sebelumnya tetap tampil.
                $selectedEventId = old('event_id', $event->id ?? '');
                $initialSelectedEvent = $allEvents->firstWhere('id', $selectedEventId);
                $initialEventName = $initialSelectedEvent ? $initialSelectedEvent->title : '-- Pilih salah satu event
                --';
                @endphp

                <!-- Komponen Dropdown Kustom dengan Alpine.js -->
                <div x-data="{
            open: false,
            selectedEventId: '{{ $selectedEventId }}',
            selectedEventName: '{{ addslashes($initialEventName) }}'
         }" class="relative">

                    <!-- (1) Tombol yang Terlihat oleh Pengguna -->
                    <button type="button" @click="open = !open"
                        class="relative w-full cursor-default rounded-lg bg-white py-3 pl-4 pr-10 text-left border border-slate-300 shadow-sm
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                        <span class="block truncate" x-text="selectedEventName"></span>
                        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 6.53 8.28a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.28a.75.75 0 011.06 0L10 15.19l3.47-3.47a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>

                    <!-- (2) Menu Dropdown yang Muncul/Hilang -->
                    <ul x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none"
                        style="display: none;">

                        @foreach($allEvents as $ev)
                        <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9 hover:bg-blue-50"
                            @click="selectedEventId = '{{ $ev->id }}'; selectedEventName = '{{ addslashes($ev->title) }}'; open = false;">

                            <span class="block truncate"
                                :class="{ 'font-semibold': selectedEventId == '{{ $ev->id }}' }">{{ $ev->title }}</span>

                            <!-- Ikon centang untuk item yang terpilih -->
                            <span x-show="selectedEventId == '{{ $ev->id }}'"
                                class="text-blue-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>
                        @endforeach
                    </ul>

                    <!-- (3) <select> Asli yang Tersembunyi untuk Form Submission -->
                    <select name="event_id" x-model="selectedEventId" class="hidden">
                        <option value="" disabled>-- Pilih salah satu event --</option>
                        @foreach($allEvents as $ev)
                        <option value="{{ $ev->id }}">{{ $ev->title }}</option>
                        @endforeach
                    </select>

                </div>
                @error('event_id')<span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>@enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-semibold text-lg
                           hover:bg-blue-700 hover:-translate-y-0.5 transform transition-all duration-150 ease-in-out
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 shadow-md hover:shadow-lg">
                Daftar Sekarang
            </button>
        </form>
    </div>
</section>
@endsection