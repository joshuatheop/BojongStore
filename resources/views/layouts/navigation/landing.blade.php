<nav class="bg-white border-b border-gray-200 py-3 px-4 md:px-8 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    <!-- Logo -->
    <a href="/" class="flex items-center gap-2 text-black font-extrabold text-xl tracking-tight">
      BOJONGSTORE
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
    </a>

    <!-- Menu Links -->
    <div class="hidden md:flex items-center gap-8 font-bold text-[15px] ml-8">
      <a href="/" class="{{ request()->is('/') ? 'text-primary' : 'text-gray-800 hover:text-primary' }}">Beranda</a>
      <a href="{{ route('katalog') }}" class="{{ request()->routeIs('katalog') ? 'text-primary' : 'text-gray-800 hover:text-primary' }}">Produk</a>
    </div>

    <!-- Search Bar -->
    <div class="flex-1 max-w-md mx-8 hidden md:block">
      <form action="{{ route('katalog') }}" method="GET" class="relative">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
          <i class='bx bx-search text-gray-400 text-lg'></i>
        </div>
        <input type="text" name="search" placeholder="Cari produk..." class="block w-full pl-11 pr-4 py-2.5 border-none rounded-full bg-gray-100 focus:bg-gray-200 focus:ring-0 text-sm outline-none transition-colors">
      </form>
    </div>

    <!-- Auth Buttons / Icons -->
    <div class="flex items-center gap-3">
      @guest
        <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full border-2 border-primary text-primary font-bold hover:bg-primary/5 transition-colors text-sm">Sign Up</a>
        <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-full bg-primary text-white font-bold hover:bg-secondary transition-colors text-sm flex items-center gap-2">
          <i class='bx bx-user text-base'></i> Log In
        </a>
      @endguest
      @auth
        <!-- Search icon for mobile -->
        <button class="md:hidden w-10 h-10 flex items-center justify-center rounded-full text-gray-500 hover:bg-gray-100">
          <i class='bx bx-search text-xl'></i>
        </button>
        
        <a href="/favorit" class="w-10 h-10 flex items-center justify-center rounded-full text-primary hover:bg-green-50 transition-colors">
          <i class='bx bxs-bookmark text-2xl'></i>
        </a>
        <a href="{{ route('profile.edit') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors ml-2">
          <i class='bx bx-user text-xl'></i>
        </a>
      @endauth
    </div>
  </div>
</nav>
