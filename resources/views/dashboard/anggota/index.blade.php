@extends('layouts.dashboard')

@section('content')
<div class="p-6">
  <h2 class="text-2xl font-bold mb-6 text-[#154D71]">Daftar Anggota</h2>

  {{-- Notifikasi sukses --}}
  @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-6 flex items-center">
      ✅ {{ session('success') }}
    </div>
  @endif

  <a href="{{ route('dashboard.anggota.create') }}" 
     class="inline-block bg-[#154D71] text-white px-4 py-2 rounded-xl hover:bg-[#1e6091] shadow">
    + Tambah Anggota
  </a>

  <div class="mt-8 overflow-x-auto rounded-xl shadow border border-gray-200">
    <table class="min-w-full text-sm">
      <thead class="bg-gray-50 text-gray-600 uppercase tracking-wider text-xs">
        <tr>
          <th class="p-3 text-left">Foto</th>
          <th class="p-3 text-left">Nama</th>
          <th class="p-3 text-left">NIM</th>
          <th class="p-3 text-left">Prodi</th>
          <th class="p-3 text-left">Jabatan</th>
          <th class="p-3 text-left">Departemen</th>
          <th class="p-3 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @forelse($members as $member)
          <tr class="hover:bg-gray-50 transition">
            {{-- Foto --}}
            <td class="p-3">
              @if($member->foto)
                <img src="{{ asset('storage/'.$member->foto) }}" 
                     alt="Foto {{ $member->name }}"
                     class="h-12 w-12 object-cover rounded-full border">
              @else
                <span class="text-gray-400">-</span>
              @endif
            </td>

            {{-- Nama --}}
            <td class="p-3 font-medium text-gray-900">{{ $member->name }}</td>

            {{-- NIM --}}
            <td class="p-3 text-gray-600">{{ $member->nim }}</td>

            {{-- Prodi --}}
            <td class="p-3 text-gray-600">{{ $member->prodi }}</td>

            {{-- Jabatan --}}
            <td class="p-3 text-gray-600">{{ $member->jabatan }}</td>

            {{-- Departemen --}}
            <td class="p-3 text-gray-600">{{ $member->departemen }}</td>

            {{-- Aksi --}}
            <td class="p-3 flex items-center gap-2">
              <!-- Detail -->
              <a href="{{ route('dashboard.anggota.show', $member->id) }}" 
                 class="p-2 rounded-full bg-blue-50 hover:bg-blue-100 text-blue-600" 
                 title="Detail">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" 
                        d="M2.25 12C3.75 7.5 7.5 4.5 12 4.5s8.25 3 9.75 7.5c-1.5 4.5-5.25 7.5-9.75 7.5S3.75 16.5 2.25 12z" />
                  <circle cx="12" cy="12" r="3" />
                </svg>
              </a>

              <!-- Edit -->
              <a href="{{ route('dashboard.anggota.edit', $member->id) }}" 
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
              <form action="{{ route('dashboard.anggota.destroy', $member->id) }}" 
                    method="POST" 
                    onsubmit="return confirm('Yakin hapus anggota ini?')" 
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
        @empty
          <tr>
            <td colspan="7" class="text-center p-6 text-gray-500">Belum ada data anggota</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
