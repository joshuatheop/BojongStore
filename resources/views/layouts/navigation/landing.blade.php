<header x-data="{ scrolled: false }"
        @scroll.window="scrolled = window.scrollY > 10"
        :class="{ 'header-scrolled': scrolled }">
    <div class="container">
        <div class="header-left">
            <a href="{{ route('home') }}" class="logo-wrapper">
                <span class="logo-text">BOJONGSTORE</span>
                <img src="{{ asset('assets/images/logo_tree.png') }}" width="36" height="36" alt="Logo" class="logo-img">
            </a>
            <nav class="nav-links">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('katalog') }}" class="nav-link {{ request()->routeIs('katalog') ? 'active' : '' }}">Produk</a>
            </nav>
        </div>
        
        <div class="search-bar">
            <span class="search-icon">
              <i data-lucide="search" width="18" height="18"></i>
            </span>
            <input type="text" id="searchInput" placeholder="Cari produk...">
        </div>

        <div class="header-actions">
            @auth
                <!-- Bookmark -->
                <a href="{{ url('/favorit') }}" class="action-btn-bookmark" title="Favorit">
                    <i data-lucide="bookmark" width="22" height="22" style="fill:var(--green-primary);stroke:var(--green-primary);"></i>
                </a>

                <!-- User dropdown -->
                <div class="user-dropdown-wrap" x-data="{ open: false }" @click.away="open = false">
                    <button class="action-btn-user" @click="open = !open" title="Akun Saya" type="button">
                        @if (Auth::user()->foto)
                            <img src="{{ asset(Auth::user()->foto) }}" alt="Avatar" class="user-avatar-img">
                        @else
                            <i data-lucide="user" width="18" height="18"></i>
                        @endif
                    </button>
                    <div class="user-dropdown-menu" x-show="open" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         :class="{ 'visible opacity-100 transform-none': open }">
                        <a href="{{ route('profile.edit') }}" class="user-dropdown-item">
                            <i data-lucide="user" width="15" height="15"></i>
                            Profil Saya
                        </a>
                        <div class="user-dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="user-dropdown-item user-dropdown-item--danger" style="width: 100%; border: none; background: none; text-align: left; padding: 10px 12px; cursor: pointer;">
                                <i data-lucide="log-out" width="15" height="15"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="auth-btns">
                    <a href="{{ route('login') }}" class="header-btn header-btn-login">Masuk</a>
                    <a href="{{ route('register') }}" class="header-btn header-btn-signup">Daftar</a>
                </div>
            @endauth
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
