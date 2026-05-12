@extends('layouts.landing')

@section('content')

<!-- HERO BANNER -->
<section class="max-w-7xl mx-auto px-4 md:px-8 mt-6">
    <div class="bg-[#0a6634] rounded-2xl p-8 md:p-14 relative overflow-hidden flex flex-col md:flex-row items-center min-h-[380px]">
        <div class="md:w-3/5 relative z-10 text-left">
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 uppercase leading-tight tracking-tight">
                PRODUK TERBAIK,<br>LANGSUNG DARI<br>JANTUNG DESA.
            </h1>
            <p class="text-white/80 text-[10px] md:text-xs max-w-sm mb-10 uppercase tracking-[0.2em] leading-relaxed font-bold">
                LEBIH DARI SEKADAR BELANJA, SETIAP PRODUK YANG ANDA BELI MEMBANTU PENGRAJIN DAN PETANI LOKAL KITA UNTUK TERUS BERTUMBUH DI ERA DIGITAL.
            </p>
            <a href="#produk-grid" class="inline-block bg-white text-[#0a6634] font-black px-10 py-4 rounded-lg hover:bg-gray-50 transition-all uppercase text-sm tracking-widest shadow-xl">
                Belanja Sekarang
            </a>
        </div>
        <!-- Right side image -->
        <div class="md:w-2/5 mt-10 md:mt-0 relative flex justify-end items-center h-full">
            <img src="{{ asset('images/catalog-bg-utama.png') }}" alt="Produk Lokal" class="w-full max-w-md md:max-w-lg lg:max-w-xl object-contain md:scale-125 lg:scale-135 md:-translate-x-8">
        </div>
    </div>
</section>

<!-- KATEGORI PILIHAN -->
<section class="py-12 bg-[#f8fafc]">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-1">Kategori Pilihan</h2>
        <p class="text-gray-500 text-sm mb-8">Temukan keajaiban lokal dalam berbagai varian.</p>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <a href="{{ route('katalog', ['category' => 'sayuran']) }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center gap-3 shadow-sm hover:shadow-md transition-shadow group border border-gray-100">
                <div class="w-14 h-14 rounded-full bg-[#e7f9ec] flex items-center justify-center group-hover:scale-110 transition-transform">
                    <img src="{{ asset('images/cat-sayuran.png') }}" class="w-8 h-8 object-contain">
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-800">Sayuran</div>
                    <div class="text-[11px] text-gray-500">Segar & Organik</div>
                </div>
            </a>
            
            <a href="{{ route('katalog', ['category' => 'buah']) }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center gap-3 shadow-sm hover:shadow-md transition-shadow group border border-gray-100">
                <div class="w-14 h-14 rounded-full bg-[#fff0e0] flex items-center justify-center group-hover:scale-110 transition-transform">
                    <img src="{{ asset('images/cat-buah.png') }}" class="w-10 h-10 object-contain">
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-800">Buah</div>
                    <div class="text-[11px] text-gray-500">Lokal & Manis</div>
                </div>
            </a>
            
            <a href="{{ route('katalog', ['category' => 'makanan']) }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center gap-3 shadow-sm hover:shadow-md transition-shadow group border border-gray-100">
                <div class="w-14 h-14 rounded-full bg-[#fff8e1] flex items-center justify-center group-hover:scale-110 transition-transform">
                    <img src="{{ asset('images/cat-makanan.png') }}" class="w-10 h-10 object-contain">
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-800">Makanan</div>
                    <div class="text-[11px] text-gray-500">Resep Warisan</div>
                </div>
            </a>
            
            <a href="{{ route('katalog', ['category' => 'minuman']) }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center gap-3 shadow-sm hover:shadow-md transition-shadow group border border-gray-100">
                <div class="w-14 h-14 rounded-full bg-[#e3f2fd] flex items-center justify-center group-hover:scale-110 transition-transform">
                    <img src="{{ asset('images/cat-minuman.png') }}" class="w-10 h-10 object-contain">
                </div>
                <div class="text-center">
                    <div class="font-bold text-gray-800">Minuman</div>
                    <div class="text-[11px] text-gray-500">Alami & Menyehatkan</div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- PRODUK UNGGULAN GRID -->
<section id="produk-grid" class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-10 uppercase">PRODUK UNGGULAN</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach($products as $product)
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col hover:shadow-md transition-shadow">
                <!-- Product Image -->
                <div class="w-full aspect-square bg-gray-50/30 relative p-4 flex items-center justify-center">
                    @auth
                    <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/5 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all z-10">
                        <i class='bx bx-bookmark'></i>
                    </button>
                    @endauth
                    <img src="{{ $product->image ? asset('storage/' . str_replace('public/', '', $product->image)) : 'https://placehold.co/400x400/ffffff/334155?text=Produk' }}" alt="{{ $product->name }}" class="max-w-[80%] max-h-[80%] object-contain">
                </div>
                
                <!-- Product Info -->
                <div class="p-4 flex-grow flex flex-col items-center text-center">
                    <h3 class="text-gray-800 text-sm font-medium line-clamp-2 leading-snug mb-1">{{ $product->name }}</h3>
                    <p class="text-[11px] text-gray-500 mb-3">1 Kemasan 300g</p>
                    
                    <div class="font-bold text-gray-900 text-base mb-4 mt-auto">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    
                    <a href="{{ route('produk.detail', $product->slug) }}" class="inline-block bg-[#116530] hover:bg-[#0a4d24] text-white text-[11px] font-bold px-6 py-2 rounded transition-all uppercase tracking-wide w-max">
                        Beli
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>
</section>

@endsection