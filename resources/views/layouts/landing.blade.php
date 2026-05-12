<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Banjarsari') }}</title>
    
    {{-- link Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html, body, * {
            font-family: 'Poppins', Arial, sans-serif !important;
        }
    </style>

    {{-- alpine carousel --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
</head>
<body x-data x-init="$el.classList.add('opacity-0'); setTimeout(() => $el.classList.remove('opacity-0'), 100)" class="transition-opacity duration-700 ease-in-out opacity-0">
    <div>
        {{-- Navbar --}}
        @include('layouts.navigation.landing')

        {{-- Page Content --}}
        <main class="min-h-[calc(100vh-200px)]">
            @yield('content')
        </main>

        {{-- Flash Message Toast --}}
        @if (session('success'))
            <div x-data="{ show: true }" 
                 x-show="show"
                 x-init="setTimeout(() => show = false, 3000)"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-10"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-10"
                 class="fixed bottom-6 right-6 z-[100] bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 border border-green-400">
                <div class="bg-white/20 rounded-full w-8 h-8 flex items-center justify-center">
                    <i class='bx bx-check text-xl'></i>
                </div>
                <span class="font-medium text-sm">{{ session('success') }}</span>
                <button @click="show = false" class="ml-4 text-white/80 hover:text-white transition-colors">
                    <i class='bx bx-x text-xl'></i>
                </button>
            </div>
        @endif
        
        {{-- Footer --}}
        <footer class="bg-surface pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-primary font-bold text-lg mb-4">BojongStore</h3>
                    <p class="text-sm text-gray-600 max-w-sm">
                        Mendukung keberlanjutan ekonomi lokal Indonesia melalui digitalisasi UMKM dengan cara yang elegan dan efisien.
                    </p>
                </div>
                <div>
                    <h4 class="text-black font-semibold text-sm mb-4">Kategori</h4>
                    <ul class="text-sm text-gray-500 space-y-2">
                        <li><a href="{{ route('katalog', ['category' => 'sayuran']) }}" class="hover:text-primary">Sayuran Segar</a></li>
                        <li><a href="{{ route('katalog', ['category' => 'buah']) }}" class="hover:text-primary">Buah Tropis</a></li>
                        <li><a href="{{ route('katalog', ['category' => 'makanan']) }}" class="hover:text-primary">Makanan Siap Saji</a></li>
                        <li><a href="{{ route('katalog', ['category' => 'minuman']) }}" class="hover:text-primary">Minuman</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-black font-semibold text-sm mb-4">Bantuan</h4>
                    <p class="text-sm text-gray-500 mb-2">Jika anda mengalami gangguan/kendala hubungi nomor berikut</p>
                    <a href="https://wa.me/6281312821849" class="inline-block bg-primary text-white text-sm font-medium px-4 py-2 rounded-full hover:bg-secondary transition-colors">
                        Bantuan
                    </a>
                </div>
            </div>
            <div class="text-center text-xs text-gray-400 mt-8">
                &copy; {{ date('Y') }} BojongStore. Mendukung UMKM Lokal Indonesia.
            </div>
        </footer>
    </div>
    <script>
  document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"])');

    links.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const href = this.href;
        document.body.classList.add('opacity-0');
        setTimeout(() => {
          window.location.href = href;
        }, 150); // waktu fade-out
      });
    });
  });
</script>

</body>
</html>              
