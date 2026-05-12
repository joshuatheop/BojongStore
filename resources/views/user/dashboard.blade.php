@extends('layouts.landing')

@section('content')
<div class="bg-gray-50 min-h-[calc(100vh-200px)] py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Dashboard -->
        <div class="bg-primary rounded-2xl p-8 text-white mb-8 shadow-sm relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="text-white/80">Apa yang ingin Anda jelajahi hari ini di BojongStore?</p>
            </div>
            <!-- Decorative circle -->
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
        </div>

        <!-- Quick Links / Menu -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Ke Katalog -->
            <a href="{{ route('katalog') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-primary mb-4 group-hover:scale-110 transition-transform">
                    <i class='bx bx-store-alt text-3xl'></i>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">Mulai Belanja</h3>
                <p class="text-gray-500 text-sm">Jelajahi berbagai produk lokal unggulan dari UMKM Bojongsoang.</p>
            </a>

            <!-- Ke Favorit -->
            <a href="/favorit" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-surface rounded-full flex items-center justify-center text-primary mb-4 group-hover:scale-110 transition-transform">
                    <i class='bx bx-bookmark-heart text-3xl'></i>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">Favorit Saya</h3>
                <p class="text-gray-500 text-sm">Lihat kembali produk-produk yang telah Anda simpan.</p>
            </a>

            <!-- Ke Profil -->
            <a href="{{ route('profile.edit') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-accent/20 rounded-full flex items-center justify-center text-primary mb-4 group-hover:scale-110 transition-transform">
                    <i class='bx bx-user text-3xl'></i>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">Edit Profil</h3>
                <p class="text-gray-500 text-sm">Atur informasi akun, kata sandi, dan pengaturan lainnya.</p>
            </a>

        </div>

    </div>
</div>
@endsection
