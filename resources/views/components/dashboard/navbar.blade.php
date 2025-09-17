<header class="w-full bg-white shadow flex items-center justify-between px-6 h-16 rounded-lg">
  <!-- Kiri: Logo -->
  <div class="flex items-center gap-3">
    <img src="{{ asset('assets/aksati.png') }}" alt="Logo Kabinet Cakra Aksata" class="h-15 w-auto -translate-x-3">
  </div>

  <!-- Kanan: Notif + User -->
  <div class="flex items-center gap-4" x-data="{ open: false }">
    <!-- Notifikasi -->
    <button class="p-2 rounded-full hover:bg-gray-100 transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405C18.21 14.79 18 13.918 18 13V9a6 6 0 10-12 0v4c0 .918-.21 1.79-.595 2.595L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
      </svg>
    </button>

    <!-- Profil Admin (Dropdown Trigger) -->
    <div class="relative">
      <button @click="open = !open" class="flex items-center gap-2 bg-white rounded-full border border-gray-700 px-2 py-1 shadow">
        <img src="{{ asset('assets/human.png') }}" 
             alt="Foto Admin" 
             class="h-9 w-9 rounded-full object-cover border-2 border-teal-500">
        <div class="text-sm text-left">
          <p class="font-semibold text-gray-800">Admin BEM FT</p>
          <p class="text-xs text-gray-500">Admin</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600 ml-1 transition-transform"
             :class="{ 'rotate-180': open }"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <!-- Dropdown -->
      <div x-show="open" @click.away="open = false"
           class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg overflow-hidden z-50">
        {{-- Tombol Keluar --}}
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" 
                  class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
            Keluar
          </button>
        </form>
      </div>
    </div>
  </div>
</header>
