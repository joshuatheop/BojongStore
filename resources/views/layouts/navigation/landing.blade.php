<nav x-data="{ scrolled: false }"
     @scroll.window="scrolled = window.scrollY > 10"
     :class="{ 'navbar-scrolled': scrolled }"
     class="navbar">
     
  <div class="navbar-container">
    
    <!-- Logo -->
    <a href="#" class="logo">
                <img :src="scrolled ? '{{ asset('images/logo.png') }}' : '{{ asset('images/logo.png') }}'" 
          alt="GivEats" 
          class="h-8 transition-all duration-300"
          style="width: 40px; height: auto; transition: all 0.3s ease;">
    </a>

    <!-- Menu Tengah -->
    <!-- Tambahkan x-data ke container utama -->
<div class="nav-links flex gap-4 items-center">

  <a href="/" class="nav-link">Beranda</a>

  <!-- Dropdown Profil Desa -->
  <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
    <button class="nav-link flex items-center gap-1">
      Profil Desa
      <svg class="w-4 h-4 mt-[2px]" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.043l3.71-3.81a.75.75 0 111.08 1.04l-4.24 4.36a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
      </svg>
    </button>

    <div x-show="open" x-transition
         class="absolute mt-2 bg-white shadow-lg rounded-md w-40 border border-gray-200 z-50">
      <a href="{{ route('sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sejarah</a>
      <a href="{{ route('kondisiumum') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kondisi Umum</a>
      <a href="{{ route('kondisisosial') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kondisi Sosial</a>
      <a href="{{ route('keadaanekonomi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keadaan Ekonomi</a>
      <a href="{{ route('kelembagaandesa') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kelembagaan Desa</a>
      <a href="{{ route('isustrategis') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Isu Strategis</a>
    </div>
  </div>

  <a href="{{ route('user.program') }}" class="nav-link {{ Request::is('komunitas*') ? 'active' : '' }}">Program</a>

  <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
    <button class="nav-link flex items-center gap-1">
      Belanja
      <svg class="w-4 h-4 mt-[2px]" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.043l3.71-3.81a.75.75 0 111.08 1.04l-4.24 4.36a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
      </svg>
    </button>

    <div x-show="open" x-transition
         class="absolute mt-2 bg-white shadow-lg rounded-md w-40 border border-gray-200 z-50">
      <a href="{{ route('produkunggulan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Produk Unggulan</a>
      <a href="{{ route('katalog.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Katalog</a>
    </div>
  </div>

  <a href="{{ route('user.berita') }}" class="nav-link {{ Request::is('komunitas*') ? 'active' : '' }}">Berita</a>

</div>



    <!-- Tombol Login/Register -->
    <div class="auth-buttons">
              @guest
            {{-- Tampilkan ini hanya jika pengunjung belum login --}}
            <a href="{{ route('login') }}" class="login-btn">Masuk</a>
            <a href="{{ route('register') }}" class="register-btn">Daftar</a>
        @endguest

        @auth
            {{-- Tampilkan ini hanya jika pengunjung sudah login --}}
            <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="register-btn">
                Dashboard Admin
            </a>
        @endauth
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<style>
.navbar {
  width: 100%;
  padding: 30px 5%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  transition: all 0.3s ease;
}

.navbar-scrolled {
  background-color: white !important;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  padding: 15px 5% !important;
}

.navbar-scrolled .nav-link,
.navbar-scrolled .login-btn {
  color: #010101 !important;
}

.navbar-scrolled .login-btn {
  border-color: #00923F !important;
}

.navbar-scrolled .login-btn:hover {
  background-color: rgba(29, 29, 29, 0.1) !important;
}

.navbar-scrolled .register-btn {
  background-color: #00923F !important;
  color: white !important;
}

.navbar-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
  padding: 0 20px;
}

.logo {
  flex-shrink: 0;
}

.nav-links {
  display: flex;
  gap: 25px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
}

.login-btn {
  color: rgb(0, 0, 0);
  text-decoration: none;
  padding: 8px 20px;
  border-radius: 20px;
  transition: all 0.3s ease;
  border: 1px solid #00923F;
}
.register-btn {
  background-color: #00923F;
  color: white;
  text-decoration: none;
  padding: 8px 20px;
  border-radius: 20px;
  transition: all 0.3s ease;
}

.navbar-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  color: white;
  font-weight: 700;
  font-size: 1.5rem;
  text-decoration: none;
}

.nav-links {
  display: flex;
  gap: 25px;
  align-items: center;
}

.logo img {
  height: 32px;
  width: auto;
}

.nav-link {
  color: rgb(0, 0, 0);
  text-decoration: none;
  position: relative;
}

.nav-link:hover,
.nav-link.active {
  color: #00923F;
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -2px;
  left: 0;
  background-color: #00923F;
  transition: width 0.3s ease;
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}

.btn-daftar {
  background-color: #00923F;
  color: white;
  padding: 6px 18px;
  border-radius: 20px;
  font-weight: 500;
  transition: background-color 0.3s ease;
  margin-left: 20px;
}

.btn-masuk {
  border: 1px solid black;
  color: black;
  padding: 6px 18px;
  border-radius: 20px;
  font-weight: 500;
  transition: all 0.3s ease;
}
</style>
