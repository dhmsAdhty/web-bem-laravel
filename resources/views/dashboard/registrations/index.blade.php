@extends('layouts.dashboard')

@section('content')
<div class="p-6">
  <h2 class="text-2xl font-bold mb-6">Daftar Pendaftaran Event</h2>

  @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-6 flex items-center">
      ✅ {{ session('success') }}
    </div>
  @endif

  <a href="{{ route('dashboard.registrations.create') }}" 
     class="inline-block bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 shadow">
    + Tambah
  </a>

  @forelse($grouped as $eventTitle => $registrations)
    <div class="mt-8">
      <h3 class="text-xl font-semibold mb-3 text-gray-700">{{ $eventTitle }}</h3>
      
      <div class="overflow-x-auto rounded-xl shadow border border-gray-200">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-50 text-gray-600 uppercase tracking-wider text-xs">
            <tr>
              <th class="p-3 text-left">#</th>
              <th class="p-3 text-left">Nama</th>
              <th class="p-3 text-left">Email</th>
              <th class="p-3 text-left">Tanggal Daftar</th>
              <th class="p-3 text-left">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @foreach($registrations as $r)
              <tr class="hover:bg-gray-50 transition">
                <td class="p-3 font-medium text-gray-700">{{ $loop->iteration }}</td>
                <td class="p-3 font-medium text-gray-900">{{ $r->name }}</td>
                <td class="p-3 text-gray-600">{{ $r->email }}</td>
                <td class="p-3 text-gray-600">{{ $r->created_at->format('d M Y') }}</td>
                <td class="p-3 flex items-center gap-2">
                  <!-- Detail -->
                  <a href="{{ route('dashboard.registrations.show', $r->id) }}" 
                     class="p-2 rounded-full bg-blue-50 hover:bg-blue-100 text-blue-600" 
                     title="Detail">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M2.25 12C3.75 7.5 7.5 4.5 12 4.5s8.25 3 9.75 7.5c-1.5 4.5-5.25 7.5-9.75 7.5S3.75 16.5 2.25 12z" />
                      <circle cx="12" cy="12" r="3" />
                    </svg>
                  </a>

                  <!-- Edit (jika ada fitur edit pendaftaran) -->
                  <a href="#" 
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
                  <form action="{{ route('dashboard.registrations.destroy', $r->id) }}" 
                        method="POST" 
                        onsubmit="return confirm('Yakin hapus?')" 
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
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @empty
    <p class="mt-6 text-gray-500 text-center">Belum ada pendaftaran event.</p>
  @endforelse
</div>
@endsection
