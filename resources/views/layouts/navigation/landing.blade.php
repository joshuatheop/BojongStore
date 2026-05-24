<header x-data="{ scrolled: false }"
        @scroll.window="scrolled = window.scrollY > 10"
        :class="{ 'header-scrolled': scrolled }">
    <div class="container">
        <div class="header-left">
            <a href="{{ route('home') }}" class="logo-wrapper">
                <span class="logo-text">BOJONGSTORE</span>
                <img src="{{ asset('images/logo_tree.png') }}" width="36" height="36" alt="Logo" class="logo-img">
            </a>
            <nav class="nav-links">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('produk') }}" class="nav-link {{ request()->routeIs('produk') ? 'active' : '' }}">Produk</a>
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
                {{-- === SUDAH LOGIN: Bookmark + User Dropdown === --}}
                <a href="{{ url('/favorit') }}" class="action-btn-bookmark" title="Favorit">
                    <i data-lucide="bookmark" width="22" height="22"></i>
                </a>

                <div class="user-dropdown-wrap" x-data="{ open: false }" @click.away="open = false">
                    <button class="action-btn-user" @click="open = !open" title="Akun Saya" type="button">
                        @if (Auth::user()->foto ?? null)
                            <img src="{{ asset(Auth::user()->foto) }}" alt="Avatar" class="user-avatar-img">
                        @else
                            <i data-lucide="user" width="18" height="18"></i>
                        @endif
                    </button>

                    <div class="user-dropdown-menu" x-show="open"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0">

                        {{-- Info user --}}
                        <div class="dropdown-user-info">
                            <div class="dropdown-avatar">
                                <i data-lucide="user" width="18" height="18"></i>
                            </div>
                            <div>
                                <div class="dropdown-name">{{ Auth::user()->name }}</div>
                                <div class="dropdown-email">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="user-dropdown-divider"></div>

                        @if(Route::has('profile.edit'))
                        <a href="{{ route('profile.edit') }}" class="user-dropdown-item">
                            <i data-lucide="user" width="15" height="15"></i>
                            Profile
                        </a>
                        @endif

                        <div class="user-dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="user-dropdown-item user-dropdown-item--danger">
                                <i data-lucide="log-out" width="15" height="15"></i>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>

            @else
                {{-- === BELUM LOGIN: Sign Up + Log In === --}}
                <div class="auth-btns">
                    <a href="{{ route('register') }}" class="header-btn header-btn-signup-outline">Sign Up</a>
                    <a href="{{ route('login') }}" class="header-btn header-btn-login-filled">
                        <i data-lucide="user" width="14" height="14"></i>
                        Log In
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>

{{-- Toast Notification --}}
@if(session('auth_required'))
<div id="authToast" class="auth-toast">
    <i data-lucide="alert-circle" width="18" height="18"></i>
    <span>{{ session('auth_required') }}</span>
</div>
@endif

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();

        // Auto-hide toast
        const toast = document.getElementById('authToast');
        if (toast) {
            setTimeout(() => toast.classList.add('auth-toast--hide'), 3500);
            setTimeout(() => toast.remove(), 4000);
        }
    });
</script>
