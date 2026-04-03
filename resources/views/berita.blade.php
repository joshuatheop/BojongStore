@extends('layouts.landing')

@section('content')

<style>
    html, body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.5;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #ecf2ea;
    }
</style>

<!-- Hero Section -->
<div class="absolute top-0 left-0 w-screen h-[520px] z-10 overflow-hidden pointer-events-none">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 1440 320"
        class="w-full h-full"
        preserveAspectRatio="none"
    >
    <path
        fill="#ffffff"
        fill-opacity="1"
        d="M0,32L80,42.7C160,53,320,75,480,80C640,85,800,75,960,69.3C1120,64,1280,64,1360,64L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"
    ></path>
    </svg>
</div>
        <br>
<section class="relative w-full py-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/bgtes.jpg') }}" alt="BG" class="w-full h-full object-cover" />
    </div>

    <div class="absolute inset-0 bg-white/15 backdrop-blur-lg backdrop-saturate-150 z-0"></div>

    <div class="relative z-10 max-w-4xl mx-auto text-center px-6 mt-5">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-green-800 mb-4 leading-tight drop-shadow-md">
            Berita <span class="text-yellow-500">Desa Banjarsari</span>
        </h1>
        <p class="text-white text-lg sm:text-xl max-w-2xl mx-auto drop-shadow-sm">
            Bersama kita kuat, bersatu kita hebat. Lihat kegiatan komunitas yang menginspirasi dan berdampak.
        </p>
    </div>
</section>

<!-- Search Bar -->
<div class="max-w-3xl mx-auto -mt-10 mb-12 px-4 z-10 relative">
    <form method="GET" action="">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari berita atau kegiatan..."
               class="w-full border border-green-300 bg-white rounded-full px-6 py-3 shadow-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition">
    </form>
</div>


<!-- Berita Card Section -->
<div class="w-[85%] mx-auto bg-white shadow-2xl rounded-2xl py-10 px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-extrabold text-gray-800 mb-2 text-center">Berita Desa Banjarsari</h2>
    <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-10"></div>

    @if($kontens->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($kontens as $konten)
        <div class="bg-white rounded-xl overflow-hidden shadow-lg"> {{-- ✅ Lebih besar --}}
            <img src="{{ asset('storage/' . $konten->cover) }}" alt="Cover"
                 class="h-60 w-full object-cover">
            <div class="p-5 flex flex-col justify-between h-[290px]">
                <div>
                    <h3 class="text-lg font-bold text-green-800 mb-2 break-words line-clamp-2 uppercase">
                        {{ \Illuminate\Support\Str::limit($konten->judul, 100) }}
                    </h3>
                    <p class="text-sm text-gray-600 line-clamp-3 mb-3">
                        {{ \Illuminate\Support\Str::limit(strip_tags($konten->deskripsi), 120) }}
                    </p>
                </div>

                <div class="flex items-center justify-between mt-auto pt-2 border-t border-gray-200">
                    <div class="flex flex-wrap gap-3 text-sm text-gray-500 mt-2 items-center">
                        <div class="flex items-center gap-1">
                            <i class="bx bx-calendar text-base"></i>
                            <span>{{ $konten->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="bx bx-user text-base"></i>
                            <span>{{ $konten->user->name ?? 'User' }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="bx bx-show text-base"></i>
                            <span>{{ $konten->dibaca }}</span>
                        </div>
                    </div>
                    <a href="{{ route('user.berita.show', $konten->id) }}"
                       class="ml-3 text-sm bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700 transition whitespace-nowrap">
                        Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-10 text-center">
        {{ $kontens->links() }}
    </div>
    @else
    <div class="text-center text-gray-500 py-20">Belum ada konten komunitas yang tersedia.</div>
    @endif
</div>
<br><br><br>
<footer class="bg-[#00923F] text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-4">
            <a href="" class="text-white text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="Banjarsari" class="logo-img" style="height: 45px; width: auto; object-fit: contain;">
            </a>
            <div class="d-flex gap-4">
                <a href="" class="text-white text-decoration-none hover:text-white/80">Privacy Policy</a>
                <a href="" class="text-white text-decoration-none hover:text-white/80">Hubungi Kami</a>
            </div>
        </div>
        <div class="text-white/80">
            © {{ date('Y') }} Banjarsari. All Rights Reserved.
        </div>
    </div>
</footer>

@endsection
