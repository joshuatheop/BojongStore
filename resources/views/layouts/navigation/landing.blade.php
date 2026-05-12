<header x-data="{ scrolled: false }"
        @scroll.window="scrolled = window.scrollY > 10"
        :class="{ 'header-scrolled': scrolled }">
    <div class="container">
        <div class="header-left">
            <a href="{{ url('/') }}" class="logo-wrapper">
                <span class="logo-text">BOJONGSTORE</span>
                <img src="{{ asset('images/logo.png') }}" width="36" height="36" alt="Logo" class="logo-img">
            </a>
            <nav class="nav-links">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                <a href="{{ url('/produk') }}" class="nav-link {{ request()->is('produk') ? 'active' : '' }}">Produk</a>
            </nav>
        </div>
        
        <div class="search-bar">
            <span class="search-icon">
                <i data-lucide="search" width="18" height="18"></i>
            </span>
            <input type="text" placeholder="Cari produk...">
        </div>

        <div class="header-actions">
            @guest
                <div class="auth-btns">
                    <a href="{{ route('login') }}" class="header-btn header-btn-login">Masuk</a>
                    <a href="{{ route('register') }}" class="header-btn header-btn-signup">Daftar</a>
                </div>
            @else
                <a href="{{ url('/favorit') }}" class="action-btn-bookmark" title="Favorit">
                    <i data-lucide="bookmark" width="24" height="24"></i>
                </a>
                <a href="{{ route('profile.edit') }}" class="action-btn-user" title="Profil Saya">
                    <i data-lucide="user" width="24" height="24"></i>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="action-btn-logout" title="Logout">
                        <i data-lucide="log-out" width="22" height="22"></i>
                    </button>
                </form>
            @endguest
        </div>
    </div>
</header>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<style>
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(10px);
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  padding: 1rem 0;
  transition: all 0.3s ease;
}

header.header-scrolled {
  padding: 0.6rem 0;
  background: rgba(255, 255, 255, 0.98);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
}

header .container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 24px;
}

.header-left {
  display: flex;
  align-items: center;
  gap: 3rem;
}

.logo-wrapper {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  text-decoration: none;
}

.logo-text {
  font-weight: 800;
  font-size: 1.3rem;
  letter-spacing: -0.5px;
  color: #1a1a2e;
}

.logo-img {
  object-fit: contain;
}

.nav-links {
  display: flex;
  gap: 2rem;
}

.nav-link {
  text-decoration: none;
  color: #666;
  font-weight: 600;
  font-size: 0.9rem;
  transition: color 0.3s ease;
}

.nav-link:hover, .nav-link.active {
  color: #00923F;
}

.search-bar {
  flex: 1;
  max-width: 400px;
  position: relative;
  margin: 0 2rem;
}

.search-bar input {
  width: 100%;
  padding: 0.6rem 1.2rem 0.6rem 2.8rem;
  border: 1.5px solid #f0f0f0;
  border-radius: 12px;
  background: #f9f9f9;
  font-size: 0.9rem;
  transition: all 0.3s ease;
}

.search-bar input:focus {
  outline: none;
  border-color: #00923F;
  background: white;
  box-shadow: 0 10px 25px rgba(0, 146, 63, 0.1);
}

.search-icon {
  position: absolute;
  left: 1rem;
  top: 50%;
  transform: translateY(-50%);
  color: #999;
  display: flex;
  align-items: center;
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.action-btn-bookmark, .action-btn-user, .action-btn-logout {
  color: #333;
  transition: all 0.2s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 8px;
  border-radius: 10px;
  background: transparent;
  border: none;
  cursor: pointer;
}

.action-btn-bookmark:hover, .action-btn-user:hover, .action-btn-logout:hover {
  color: #00923F;
  background: rgba(0, 146, 63, 0.05);
}

.auth-btns {
  display: flex;
  gap: 0.75rem;
}

.header-btn {
  padding: 8px 20px;
  border-radius: 10px;
  font-size: 0.85rem;
  font-weight: 700;
  text-decoration: none;
  transition: all 0.3s ease;
}

.header-btn-login {
  color: #00923F;
  border: 1.5px solid #00923F;
}

.header-btn-login:hover {
  background: #00923F;
  color: white;
}

.header-btn-signup {
  background: #00923F;
  color: white;
}

.header-btn-signup:hover {
  background: #007a35;
  transform: translateY(-1px);
}
</style>

