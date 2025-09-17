@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow rounded-xl p-6">
  <!-- Header -->
  <div class="flex justify-between items-center mb-6 flex-wrap gap-3">
    <h1 class="text-2xl font-bold text-[#154D71]">📅 Daftar Event</h1>
    <a href="{{ route('dashboard.events.create') }}" 
       class="px-4 py-2 bg-[#154D71] text-white rounded-lg shadow hover:bg-[#123C58] transition">
      + Tambah Event
    </a>
  </div>

  <!-- Notifikasi sukses -->
  @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
      {{ session('success') }}
    </div>
  @endif

  <!-- Loop Event -->
  @forelse($events as $event)
    <div class="mb-10">
      <h2 class="text-lg font-semibold mb-3 text-gray-800 border-l-4 border-[#154D71] pl-3">
        {{ $event->title }}
      </h2>

      <div class="overflow-x-auto rounded-lg shadow-md">
        <table class="min-w-full border border-gray-200 text-sm">
          <thead class="bg-[#154D71] text-white">
            <tr>
              <th class="px-4 py-3 text-left font-medium">Banner</th>
              <th class="px-4 py-3 text-left font-medium">Lokasi</th>
              <th class="px-4 py-3 text-left font-medium">Tanggal</th>
              <th class="px-4 py-3 text-center font-medium w-40">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-50 transition">
              <td class="px-4 py-3 text-center">
                @if($event->banner)
                  <img src="{{ asset('storage/'.$event->banner) }}" 
                       class="h-14 w-24 object-cover rounded-md shadow-sm mx-auto">
                @else
                  <span class="text-gray-400">Tidak ada</span>
                @endif
              </td>
              <td class="px-4 py-3 text-gray-700">{{ $event->location }}</td>
              <td class="px-4 py-3 text-gray-700">
                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} – 
                {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
              </td>
              {{-- Aksi --}}
<td class="p-5 flex items-center gap-2 justify-center">
  <!-- Edit -->
  <a href="{{ route('dashboard.events.edit', $event->id) }}"
     class="p-2 rounded-full bg-green-50 hover:bg-green-100 text-green-600"
     title="Edit">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
      <path stroke-linecap="round" stroke-linejoin="round" 
            d="M16.862 4.487l1.651 1.651a2.121 2.121 0 010 3L9.845 17.805l-4.487.996.996-4.487 
               8.668-8.668a2.121 2.121 0 013 0z" />
    </svg>
  </a>

  <!-- Hapus -->
  <form action="{{ route('dashboard.events.destroy', $event->id) }}" 
        method="POST" 
        onsubmit="return confirm('Yakin hapus event ini?')"
        class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="p-2 rounded-full bg-red-50 hover:bg-red-100 text-red-600"
            title="Hapus">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
           stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </form>
</td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  @empty
    <p class="text-center text-gray-500 italic">Belum ada event yang ditambahkan.</p>
  @endforelse
</div>
@endsection
