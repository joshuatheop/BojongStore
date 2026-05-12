<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BojongStore') }} - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html, body, * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased min-h-screen bg-surface flex flex-col">
    <div class="flex-grow flex flex-col md:flex-row">
        <!-- Left Side: Image -->
        <div class="hidden md:block md:w-1/2 relative bg-gray-200 h-screen sticky top-0">
            <img src="{{ asset('images/foto-sawah.jpg') }}" alt="Sawah Banjarsari" class="absolute inset-0 w-full h-full object-cover">
            <!-- Overlay to darken image slightly if needed -->
            <div class="absolute inset-0 bg-black/10"></div>
        </div>

        <!-- Right Side: Content -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 lg:p-16 bg-white overflow-y-auto">
            <div class="w-full max-w-md">
                @yield('content')
            </div>
        </div>
    </div>
    
    {{-- Footer --}}
    <footer class="bg-surface pt-16 pb-8 border-t border-gray-200 mt-auto">
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
                    +62 813-1282-1849
                </a>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 mt-8">
            &copy; {{ date('Y') }} BojongStore. Mendukung UMKM Lokal Indonesia.
        </div>
    </footer>
</body>
</html>
