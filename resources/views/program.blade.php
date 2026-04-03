@extends('layouts.landing')

@section('content')

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

<!-- Hero Section -->
<section class="relative w-full py-20 bg-green-600 z-0 shadow-inner">
    <br><br><br><br>
    <div class="max-w-4xl mx-auto text-center px-6">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Program Desa Banjarsari</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Inisiatif dan program unggulan untuk kemajuan bersama.
        </p>
    </div>
</section>

<!-- Program Section -->
<section class="py-16 bg-white relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">
            Program Unggulan: ALUR KSM
        </h2>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
            <p>
                Pekerja KSM melakukan pengambilan sampah ke setiap lingkungan yang mana masing-masing lingkungan sudah ditentukan jadwalnya yaitu Senin, Selasa, Kamis, dan Sabtu. Jadwal angkut dan hari Rabu dan Jumat adalah jadwal untuk memilah sampah.
            </p>
            <p>
                Setiap sampah yang diangkut, jika sudah dipilah oleh masyarakat, maka akan dibayar sebesar Rp 500/Kg. Jika tidak dipilah, masyarakat harus membayar ke tim KSM sebesar Rp 500/Kg.
            </p>
            <p>
                Kemudian, sampah dari masyarakat diangkut ke tempat pemilahan yang berlokasi di SGB (Sumber Guna Bhakti).
            </p>
            <p>
                Hasil dari pemilahan tersebut dipisahkan sesuai kriteria yang sudah ditentukan. Sampah organik seperti dari sisa makanan atau sejenisnya digunakan untuk pakan maggot dan digunakan untuk campuran pupuk.
            </p>
            <p>
                Sampah residu akan diangkut oleh mobil sampah dari Dinas Lingkungan Hidup (LH).
            </p>
            <p>
                Sampah yang bisa didaur ulang seperti plastik, contohnya botol bekas minuman, dibersihkan dan dipisahkan dari plastik kemasan dan tutup botolnya, kemudian dijual. Sampah kardus diikat terpisah dan juga dijual.
            </p>
        </div>
    </div>
</section>

<!-- Footer -->
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