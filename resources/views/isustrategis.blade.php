@extends('layouts.landing')

@section('content')

<!-- SVG Background Decoration -->
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

<!-- Hero Section dengan warna hijau pastel -->
<section class="relative w-full py-20 bg-green-600 z-0 shadow-inner">
    <br><br><br><br>
    <div class="max-w-4xl mx-auto text-center px-6">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Isu Strategis Desa</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Dalam upaya mencapai pembangunan yang berkelanjutan, Desa Banjarsari menghadapi sejumlah isu strategis yang perlu mendapatkan perhatian bersama.
        </p>
    </div>
</section>

<!-- Isu Strategis -->
<section class="py-16 bg-white relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">
            ISU STRATEGIS yang DIHADAPI DESA BANJARSARI
        </h2>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
            <p>
            Isu strategis merupakan permasalahan yang berkaitan dengan fenomena atau belum dapat diselesaikan pada periode enam tahun sebelumnya dan memiliki dampak jangka panjang bagi keberlanjutan pelaksanaan pembangunan sehingga perlu dibatasi secara bertahap. Isu strategis Pembangunan Desa :
            </p>
            <ol class="list-[lower-alpha] pl-6 space-y-4 text-justify">
                <li>
                <span class="font-medium">Kualitas pelayanan umum pemerintahan</span> masih dirasakan belum memuaskan bagi sebagian masyarakat Desa Banjarsari seperti pendidikan, kesehatan, kependudukan, dan sarana prasarana umum. Hal ini bertumpu pada kurangnya alokasi dana yang tersedia dan kualitas aparatur pemerintahan yang belum optimal.
                </li>
                <li>
                <span class="font-medium">Kompetensi dan daya saing penduduk usia produktif</span> (angkatan kerja) di Desa Banjarsari masih dirasakan kurang memenuhi harapan dunia usaha. Peluang kerja dan peluang usaha yang ada belum termanfaatkan secara optimal, yang erat kaitannya dengan kesempatan memperoleh pendidikan berkualitas.
                </li>
                <li>
                <span class="font-medium">Pertumbuhan ekonomi yang relatif lambat</span> mengakibatkan keterbatasan dalam perkembangan ekonomi masyarakat. Banyak warga belum mampu meningkatkan pendapatan secara merata, dan masih terdapat masyarakat yang berada di bawah garis kemiskinan.
                </li>
                <li>
                <span class="font-medium">Kerusakan infrastruktur desa</span> seperti jalan utama, jaringan irigasi, dan sarana pendidikan menjadi penghambat utama mobilitas ekonomi. Ditambah belum optimalnya sarana dan prasarana penunjang seperti fasilitas olahraga dan kesehatan, kondisi ini berdampak pada kesejahteraan masyarakat secara umum.
                </li>
            </ol>
        </div><br>

    </div>
</section>

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
