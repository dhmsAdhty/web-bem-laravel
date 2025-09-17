<header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-gray-100 transition-all duration-500 ease-in-out">
  <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6 sm:px-8">
    <!-- Logo -->
    <a class="flex items-center gap-2" href="/">
      <img src="/assets/BEMFT.png" alt="BEM FT Logo" class="h-9 w-9 rounded-full transition-transform hover:scale-105">
      <span class="text-lg font-semibold text-gray-800 hidden sm:block">BEM FT</span>
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex items-center space-x-8">
      <a class="text-gray-600 hover:text-blue-500 transition-colors duration-200 font-medium text-sm  tracking-wider relative group"
        href="/">
        Home
        <span
          class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a class="text-gray-600 hover:text-blue-500 transition-colors duration-200 font-medium text-sm  tracking-wider relative group"
        href="{{ route('profile.index') }}">
        Profil
        <span
          class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a class="text-gray-600 hover:text-blue-500 transition-colors duration-200 font-medium text-sm  tracking-wider relative group"
        href="/event">
        Event
        <span
          class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a class="text-gray-600 hover:text-blue-500 transition-colors duration-200 font-medium text-sm  tracking-wider relative group"
        href="/blog">
        Blog
        <span
          class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></span>
      </a>
    </nav>

    <!-- Mobile Menu Button -->
    <button id="menu-btn"
      class="md:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
      <span class="sr-only">Toggle menu</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu"
    class="md:hidden hidden px-6 py-3 bg-white/20 backdrop-blur-md border-t border-gray-100 shadow-lg transition-all duration-300 ease-in-out transform opacity-0 -translate-y-4">
    <div class="flex flex-col space-y-3">
      <a href="/"
        class="py-2 px-3 rounded-md text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200 font-medium">Home</a>
      <a href="/profile"
        class="py-2 px-3 rounded-md text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200 font-medium">Profil</a>
      <a href="/event"
        class="py-2 px-3 rounded-md text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200 font-medium">Event</a>
      <a href="/blog"
        class="py-2 px-3 rounded-md text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200 font-medium">Blog</a>
    </div>
  </div>
</header>

<script>
  // Animasi navbar saat scroll
  const header = document.querySelector("header");
  let lastScroll = 0;

  window.addEventListener("scroll", () => {
    const currentScroll = window.scrollY;

    if (currentScroll > 150 && lastScroll <= 150) {
      header.classList.add(
        "fixed",
        "top-5",
        "mx-auto",
        "rounded-xl",
        "shadow-lg",
        "w-11/12",
        "transition-all",
        "duration-500",
        "ease-in-out"
      );
      header.classList.remove("top-0");
    } else if (currentScroll <= 150 && lastScroll > 150) {
      header.classList.add("top-0");
      header.classList.remove(
        "fixed",
        "top-5",
        "mx-auto",
        "rounded-xl",
        "shadow-lg",
        "w-11/12"
      );
    }
    lastScroll = currentScroll;
  });

  // Mobile menu animasi halus
  document.addEventListener("DOMContentLoaded", () => {
    const menuBtn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");

    if (menuBtn && menu) {
      menuBtn.addEventListener("click", () => {
        if (menu.classList.contains("hidden")) {
          menu.classList.remove("hidden");
          requestAnimationFrame(() => {
            menu.classList.remove("opacity-0", "-translate-y-4");
            menu.classList.add("opacity-100", "translate-y-0", "transition-all", "duration-300", "ease-in-out");
          });
        } else {
          menu.classList.remove("opacity-100", "translate-y-0");
          menu.classList.add("opacity-0", "-translate-y-4", "transition-all", "duration-300", "ease-in-out");
          menu.addEventListener(
            "transitionend",
            () => menu.classList.add("hidden"),
            { once: true }
          );
        }
      });
    }
  });
</script>