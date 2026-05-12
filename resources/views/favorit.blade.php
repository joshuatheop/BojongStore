@extends('layouts.landing')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        
        <!-- Header Section -->
        <div class="mb-10 text-center md:text-left">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Produk Favorit Saya</h1>
            <p class="text-gray-500">Daftar produk yang telah Anda simpan. Beli sekarang sebelum kehabisan!</p>
        </div>

        @if($products->isEmpty())
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-sm p-12 text-center flex flex-col items-center justify-center min-h-[400px]">
            <div class="w-24 h-24 bg-green-50 rounded-full flex items-center justify-center text-primary mb-6">
                <i class='bx bx-bookmark-heart text-5xl'></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Produk Favorit</h3>
            <p class="text-gray-500 mb-8 max-w-md">Anda belum menambahkan produk apapun ke daftar favorit. Yuk mulai jelajahi katalog kami dan temukan produk lokal terbaik!</p>
            <a href="{{ route('katalog') }}" class="bg-primary hover:bg-secondary text-white font-medium py-3 px-8 rounded-xl transition-colors shadow-lg shadow-primary/30">
                Jelajahi Katalog
            </a>
        </div>
        @else
        <!-- Grid Section -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden flex flex-col hover:shadow-xl transition-all hover:-translate-y-1 relative group">
                
                <!-- Remove Button -->
                <form action="{{ route('favorit.toggle', $product->id) }}" method="POST" class="absolute top-4 right-4 z-10">
                    @csrf
                    <button type="submit" class="w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-100 transition-colors shadow-sm" title="Hapus dari Favorit">
                        <i class='bx bxs-heart text-xl'></i>
                    </button>
                </form>

                <!-- Product Image -->
                <div class="w-full aspect-square bg-gray-50 p-6 flex items-center justify-center">
                    <img src="{{ $product->image ? asset('storage/' . str_replace('public/', '', $product->image)) : 'https://placehold.co/400x400/e2e8f0/333333?text=No+Image' }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-500">
                </div>
                
                <!-- Product Info -->
                <div class="p-6 flex-grow flex flex-col">
                    <div class="mb-2">
                        <span class="inline-block bg-green-100 text-primary text-xs font-bold px-2 py-0.5 rounded uppercase tracking-wider">{{ $product->category->name ?? 'Kategori' }}</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base line-clamp-2 leading-tight mb-2">{{ $product->name }}</h3>
                    <div class="flex items-center text-yellow-400 text-sm mb-4">
                        <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star-half'></i>
                        <span class="text-gray-400 text-xs ml-1">(4.9)</span>
                    </div>
                    
                    <div class="font-extrabold text-primary text-xl mb-6 mt-auto">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 mt-auto">
                        <a href="{{ route('produk.detail', $product->slug ?? 1) }}" class="col-span-2 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold py-2.5 rounded-lg transition-colors">
                            Lihat Detail
                        </a>
                        <a href="https://wa.me/{{ $product->whatsapp ?? '6281312821849' }}" target="_blank" class="bg-primary hover:bg-secondary text-white flex items-center justify-center py-2.5 rounded-lg transition-colors" title="Beli via WhatsApp">
                            <i class='bx bxl-whatsapp text-xl'></i>
                        </a>
                        <a href="{{ $product->shoppee ?? '#' }}" target="_blank" class="bg-[#ee4d2d] hover:bg-[#d74325] text-white flex items-center justify-center py-2.5 rounded-lg transition-colors" title="Beli di Shopee">
                            <i class='bx bx-shopping-bag text-xl'></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @endif

    </div>
</div>
@endsection
