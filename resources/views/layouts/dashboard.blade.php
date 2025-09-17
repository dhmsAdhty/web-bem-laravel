<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard BEM</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link rel="stylesheet" href="https://sets.hugeicons.com/YOUR-SET-ID.css" crossorigin="anonymous">
  <script src="https://unpkg.com/hugeicons@latest"></script>
</head>

<body class="bg-gray-100">
  <!-- Sidebar -->
  <div id="sidebar" 
       class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-50">
    <x-dashboard.sidebar />
  </div>

  <!-- Konten Utama -->
  <div class="flex flex-col min-h-screen lg:ml-64 transition-all duration-300">
    <!-- Navbar -->
    <header class="flex items-center justify-between bg-white shadow px-4 py-3">
      <div class="flex items-center gap-2">
        <!-- Tombol Hamburger -->
        <button id="menuBtn" class="lg:hidden text-gray-700 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <x-dashboard.navbar />
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      @yield('content')
    </main>
  </div>

  @stack('scripts')

  <script>
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('menuBtn');

    // Toggle sidebar di mobile
    menuBtn?.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });

    // Klik di luar sidebar untuk menutup (opsional)
    document.addEventListener('click', (e) => {
      if (!sidebar.contains(e.target) && !menuBtn.contains(e.target) && window.innerWidth < 1024) {
        sidebar.classList.add('-translate-x-full');
      }
    });

    // Pastikan sidebar kembali terbuka saat resize ke desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        sidebar.classList.remove('-translate-x-full');
      }
    });
  </script>
</body>
</html>
