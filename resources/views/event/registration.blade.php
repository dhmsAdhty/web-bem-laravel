@extends('layouts.nav')

@section('content')
<section class="w-full min-h-screen bg-gradient-to-r from-blue-50 to-white flex items-center justify-center">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-5 ml-0 mr-0">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-700 mb-6 text-center">Formulir Pendaftaran Event</h2>
        <form method="POST" action="{{ route('event.register.store', $event->id) }}" class="space-y-5">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Event</label>
                <select name="event_id" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blue-500">
                    <option value="">-- Pilih Event --</option>
                    @foreach($allEvents as $ev)
                        <option value="{{ $ev->id }}" {{ (old('event_id', $event->id ?? '') == $ev->id) ? 'selected' : '' }}>{{ $ev->title }}</option>
                    @endforeach
                </select>
                @error('event_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            @csrf
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blue-500" value="{{ old('name') }}">
                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blue-500" value="{{ old('email') }}">
                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Universitas</label>
                <input type="text" name="university" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blue-500" value="{{ old('university') }}">
                @error('university')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">No. HP / WhatsApp</label>
                <input type="text" name="phone" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blue-500" value="{{ old('phone') }}">
                @error('phone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition">Daftar Sekarang</button>
        </form>
    </div>
</section>
@endsection
