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
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Kelembagaan Desa</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Desa Banjarsari memiliki kelembagaan yang berfungsi sebagai pilar utama dalam penyelenggaraan pemerintahan, pembangunan, dan pelayanan masyarakat. Struktur kelembagaan terdiri dari Pemerintah Desa yang dipimpin oleh Kepala Desa beserta perangkatnya,
        </p>
    </div>
</section>

<!-- Kondisi Umum Section -->
<section class="py-16 bg-white relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">
            Letak Geografis
        </h2>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
            <p>
            Desa Banjarsari salah satu desa di Kecamatan Bayongbong di Kabupaten Garut yang terdiri dari 8 RW dan 36 RT. Kondisi Umum desa Banjarsari memiliki batas wilayah administratif, yaitu : 
            </p>
            <div class="space-y-2">
                <div class="text-gray-800">
                    <span class="inline-block w-40 font-medium">Sebelah Utara</span>: Desa Cintakarya
                </div>
                <div class="text-gray-800">
                    <span class="inline-block w-40 font-medium">Sebelah Timur</span>: Desa Mekarjaya
                </div>
                <div class="text-gray-800">
                    <span class="inline-block w-40 font-medium">Sebelah Selatan</span>: Desa Mekarsari
                </div>
                <div class="text-gray-800">
                    <span class="inline-block w-40 font-medium">Sebelah Barat</span>: Desa Padamukti
                </div>
            </div>
            <p>
                Gambaran Desa BANJARSARI secara administratif dapat dilihat dalam peta dibawah ini.
            </p>
        </div><br>

        <!-- Tofografi -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Tofografi 
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Desa BANJARSARI merupakan Desa yang berada di daerah datarn tinggi dengan ketinggian kira-kira 800-1000450-550m DPL (Diatas Permukaan Laut.) sebagian besar wilayah Desa BANJARSARI adalah daerah yang cocok untuk pertanian dan sebelah utara desa terbentang sungai Cibodas.
                </p>
            </div>
        </div><br>

        <!-- Hidrologi dan klimatologi -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Hidrologi dan klimatologi
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Aspek hidrologi suatu wilayah desa sangat dibutuhkan dalam pengendalian dan pengaturan tata air wilayah desa. Berdasarkan hidrologinya, aliran-aliran sungai di wilayah desa Banjarsari membentuk pola daerah aliran sungai, yaitu DAS Cibodas. Tercatat berberapa sungai maupun selokan baik skala kecil, sedang dan besar terdapat di Desa Banjarsari, seperti : Sungai Cibodas dan Cigarukgak yang mengalir dari arah Barat ke Timur  sampai bermuara di sungai papandayan dan inilah yang menjadi sumber Hidrologi Desa Banjarsari.
                </p>
            </div>
        </div><br>

        <!-- Hidrologi dan klimatologi -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Luas dan sebaran penggunaan lahan
            </h3>
              <div class="overflow-x-auto">
                <table class="table-auto w-full border border-black text-sm text-gray-800">
                <thead>
                    <tr class="bg-green-600 text-white text-center">
                    <th class="border border-black px-4 py-2">NO</th>
                    <th class="border border-black px-4 py-2">JENIS LAHAN</th>
                    <th class="border border-black px-4 py-2">LUAS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">1</td>
                    <td class="border border-black px-4 py-1">Permukiman</td>
                    <td class="border border-black px-4 py-1 text-right">75.0 <span class="text-sm text-gray-600">Ha/m²</span></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">2</td>
                    <td class="border border-black px-4 py-1">Persawahan</td>
                    <td class="border border-black px-4 py-1 text-right">142.8 <span class="text-sm text-gray-600">Ha/m²</span></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">3</td>
                    <td class="border border-black px-4 py-1">Perkebunan</td>
                    <td class="border border-black px-4 py-1 text-right">0.5 <span class="text-sm text-gray-600">Ha/m²</span></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">4</td>
                    <td class="border border-black px-4 py-1">Kuburan</td>
                    <td class="border border-black px-4 py-1 text-right">1 <span class="text-sm text-gray-600">Ha/m²</span></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">5</td>
                    <td class="border border-black px-4 py-1">Pekarangan</td>
                    <td class="border border-black px-4 py-1 text-right">-</td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">6</td>
                    <td class="border border-black px-4 py-1">Taman</td>
                    <td class="border border-black px-4 py-1 text-right">-</td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">7</td>
                    <td class="border border-black px-4 py-1">Kolam</td>
                    <td class="border border-black px-4 py-1 text-right">1,6 <span class="text-sm text-gray-600">Ha/m²</span></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">8</td>
                    <td class="border border-black px-4 py-1">Fasilitas Umum</td>
                    <td class="border border-black px-4 py-1 text-right">2.5 <span class="text-sm text-gray-600">Ha/m²</span></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">9</td>
                    <td class="border border-black px-4 py-1">Lain-lain</td>
                    <td class="border border-black px-4 py-1 text-right">1.4 <span class="text-sm text-gray-600">Ha/m²</span></td>
                    </tr>
                    <tr class="font-bold bg-gray-100">
                    <td class="border border-black px-4 py-2 text-center" colspan="2">Jumlah Total</td>
                    <td class="border border-black px-4 py-2 text-right">140,40 <span class="text-sm text-gray-800">Ha/m²</span></td>
                    </tr>
                </tbody>
                </table>
            </div>
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
