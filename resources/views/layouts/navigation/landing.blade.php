<nav x-data="{ scrolled: false }"
     @scroll.window="scrolled = window.scrollY > 10"
     :class="{ 'navbar-scrolled': scrolled }"
     class="navbar">
  <div class="navbar-container">
    
    <!-- Logo -->
    <a href="/" class="logo">
          <span style="font-size: 1.1rem; font-weight: 700; letter-spacing: 1px;color: #1a1a1a;">BOJONGSTORE</span>
          <img :src="scrolled ? '{{ asset('images/logo.png') }}' : '{{ asset('images/logo.png') }}'" 
          alt="BojongStore" 
          style="width: 40px; height: auto; transition: all 0.3s ease;">
    </a>

    <!-- Menu Tengah (Removed) -->
    <div class="nav-links flex gap-4 items-center">
    </div>

    <!-- Tombol Login/Register -->
    <div class="auth-buttons flex gap-3">
      @guest
        <a href="{{ route('register') }}" class="register-btn" style="background-color: white; color: #00923F; border: 1px solid #00923F; padding: 8px 20px; border-radius: 20px; transition: all 0.3s ease;">Daftar</a>
        <a href="{{ route('login') }}" class="login-btn" style="background-color: #00923F; color: white; padding: 8px 20px; border-radius: 20px; transition: all 0.3s ease;">Masuk</a>
      @endguest
      @auth
        @if(auth()->user()->role === 'admin')
          <a href="/" class="login-btn" style="background-color: #00923F; color: white; padding: 8px 20px; border-radius: 20px; transition: all 0.3s ease;">Dashboard Admin</a>
        @else
          <a href="/" class="login-btn" style="background-color: #00923F; color: white; padding: 8px 20px; border-radius: 20px; transition: all 0.3s ease;">Dashboard Saya</a>
    @endif
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
