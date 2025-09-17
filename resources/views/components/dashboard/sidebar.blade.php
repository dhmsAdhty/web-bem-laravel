<aside class="fixed top-0 left-0 w-64 bg-[#154D71] text-white h-screen shadow-lg overflow-y-auto">
  <!-- Logo / Judul -->
  <div class="flex items-center p-4 space-x-2">
    <h1 class="text-lg font-bold">Dashboard BEM FT</h1>
  </div>

  <nav class="px-3 mt-4 space-y-1 text-sm">
    <!-- Dashboard -->
    <a href="{{ route('dashboard.index') }}"
       class="flex items-center p-2 rounded-lg transition gap-3 
       {{ request()->routeIs('dashboard.index') ? 'bg-yellow-500 text-white font-bold' : 'hover:bg-[#1e6091]' }}">
      <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#1e6091]">
        <img src="{{ asset('assets/home-icon-silhouette.png') }}" class="w-4 h-4">
      </span>
      Dashboard
    </a>

    <!-- Attendance -->
    <div x-data="{open: {{ request()->routeIs('dashboard.berita.*') ? 'true' : 'false' }} }" class="space-y-1">
      <button @click="open=!open"
              class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-[#1e6091] transition">
        <div class="flex items-center gap-3">
          <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#1e6091]">
            <img src="/assets/calendar.png" class="w-4 h-4">
          </span>
          Konten Website
        </div>
        <svg :class="{'rotate-90':open}" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
      <div x-show="open" x-transition x-cloak class="ml-11 border-l border-gray-500/30 space-y-1 pl-3">
        <a href="{{ route('dashboard.berita.index') }}" 
        class="flex items-center gap-2 p-2 rounded transition hover:bg-[#1e6091]
        {{ request()->routeIs('dashboard.berita.index') ? 'text-yellow-400 font-semibold' : 'hover:bg-[#1e6091]' }}">
          <span class="w-2 h-2 rounded-full {{ request()->routeIs('dashboard.berita.index') ? 'bg-yellow-400' : 'bg-gray-300' }}"></span> Daftar Berita
        </a>
      </div>
    </div>

    <div x-data="{open: {{ request()->routeIs('dashboard.anggota.*') ? 'true' : 'false' }} }" class="space-y-1">
      <button @click="open=!open"
              class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-[#1e6091] transition">
        <div class="flex items-center gap-3">
          <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#1e6091]">
            <img src="{{ asset('assets/group.png') }}" class="w-4 h-4">
          </span>
          Anggota
        </div>
        <svg :class="{'rotate-90':open}" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
      <div x-show="open" x-transition x-cloak class="ml-11 border-l border-gray-500/30 space-y-1 pl-3">
        <a href="{{ route('dashboard.anggota.index') }}" 
           class="flex items-center gap-2 p-2 rounded transition
           {{ request()->routeIs('dashboard.anggota.index') ? 'text-yellow-400 font-semibold' : 'hover:bg-[#1e6091]' }}">
          <span class="w-2 h-2 rounded-full {{ request()->routeIs('dashboard.anggota.index') ? 'bg-yellow-400' : 'bg-gray-300' }}"></span>
          Daftar Anggota
        </a>
      </div>
    </div>

    <!-- Event & Pendaftaran -->
    <div x-data="{ open: {{ request()->routeIs('dashboard.events.*') || request()->routeIs('dashboard.registrations.*') ? 'true' : 'false' }} }">
      <button @click="open=!open"
              class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-[#1e6091] transition">
        <div class="flex items-center gap-3">
          <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#1e6091]">
            <img src="{{ asset('assets/newspaper.png') }}" class="w-4 h-4">
          </span>
          Event & Pendaftaran
        </div>
        <svg :class="{'rotate-90':open}" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
      <div x-show="open" x-transition x-cloak class="ml-11 border-l border-gray-500/30 space-y-1 pl-3">
        <a href="{{ route('dashboard.events.index') }}"
           class="flex items-center gap-2 p-2 rounded transition
           {{ request()->routeIs('dashboard.events.*') ? 'text-yellow-400 font-semibold' : 'hover:bg-[#1e6091]' }}">
          <span class="w-2 h-2 rounded-full {{ request()->routeIs('dashboard.events.*') ? 'bg-yellow-400' : 'bg-gray-300' }}"></span>
          Daftar Event
        </a>
        <a href="{{ route('dashboard.registrations.index') }}"
           class="flex items-center gap-2 p-2 rounded transition
           {{ request()->routeIs('dashboard.registrations.*') ? 'text-yellow-400 font-semibold' : 'hover:bg-[#1e6091]' }}">
          <span class="w-2 h-2 rounded-full {{ request()->routeIs('dashboard.registrations.*') ? 'bg-yellow-400' : 'bg-gray-300' }}"></span>
          Daftar Pendaftaran
        </a>
      </div>
    </div>
  </nav>
</aside>

<script src="//unpkg.com/alpinejs" defer></script>
