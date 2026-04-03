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
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Kondisi Sosial Desa</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Desa Banjarsari memiliki kondisi sosial yang ditandai dengan semangat gotong royong dan kebersamaan antarwarga yang masih terjaga dengan baik. Struktur sosial yang terdiri dari berbagai kelompok usia dan latar belakang mendukung terciptanya hubungan sosial yang harmonis. Kegiatan kemasyarakatan seperti posyandu, karang taruna, dan keagamaan berjalan aktif sebagai bagian dari penguatan nilai-nilai sosial dan budaya lokal.
        </p>
    </div>
</section>

<!-- Kondisi Sosial Section -->
<section class="py-16 bg-white relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">
            Kependudukan
        </h2>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Laju pertumbuhan penduduk desa BANJARSARI pada kurun tiga tahun terakhir, dapat dilihat pada tabel dibawah ini : 
                </p>
        <div class="overflow-x-auto mt-8">
            <table class="table-auto w-full border border-black text-sm text-gray-800">
                <thead class="text-center">
                <tr class="bg-gray-200">
                    <th rowspan="2" class="border border-black px-3 py-2">No</th>
                    <th rowspan="2" class="border border-black px-4 py-2">Tahun</th>
                    <th colspan="2" class="border border-black px-4 py-2">Jenis kelamin</th>
                    <th rowspan="2" class="border border-black px-4 py-2">Jumlah</th>
                </tr>
                <tr class="bg-gray-200">
                    <th class="border border-black px-4 py-2">L</th>
                    <th class="border border-black px-4 py-2">P</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr>
                    <td class="border border-black px-2 py-1">1</td>
                    <td class="border border-black px-2 py-1">2018</td>
                    <td class="border border-black px-2 py-1">4.046</td>
                    <td class="border border-black px-2 py-1">3.953</td>
                    <td class="border border-black px-2 py-1">7.999</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">2</td>
                    <td class="border border-black px-2 py-1">2019</td>
                    <td class="border border-black px-2 py-1">4.028</td>
                    <td class="border border-black px-2 py-1">3.937</td>
                    <td class="border border-black px-2 py-1">7.956</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">3</td>
                    <td class="border border-black px-2 py-1">2020</td>
                    <td class="border border-black px-2 py-1">4.007</td>
                    <td class="border border-black px-2 py-1">3.906</td>
                    <td class="border border-black px-2 py-1">7.913</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">4</td>
                    <td class="border border-black px-2 py-1">2021</td>
                    <td class="border border-black px-2 py-1">3.948</td>
                    <td class="border border-black px-2 py-1">3.839</td>
                    <td class="border border-black px-2 py-1">7.787</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">5</td>
                    <td class="border border-black px-2 py-1">2022</td>
                    <td class="border border-black px-2 py-1">3.924</td>
                    <td class="border border-black px-2 py-1">3.806</td>
                    <td class="border border-black px-2 py-1">7.730</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">6</td>
                    <td class="border border-black px-2 py-1">2023</td>
                    <td class="border border-black px-2 py-1">3.909</td>
                    <td class="border border-black px-2 py-1">3.779</td>
                    <td class="border border-black px-2 py-1">7.688</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">7</td>
                    <td class="border border-black px-2 py-1">2024</td>
                    <td class="border border-black px-2 py-1">3.897</td>
                    <td class="border border-black px-2 py-1">3.784</td>
                    <td class="border border-black px-2 py-1">7.682</td>
                </tr>
                </tbody>
            </table>
            <p class="text-sm text-center text-gray-700 mt-3 italic">
                Jumlah Penduduk Desa BANJARSARI per tahun
            </p>
        </div><br>

        <div class="overflow-x-auto mt-8">
            <table class="table-auto w-full border border-black text-sm text-gray-800">
                <thead class="text-center">
                <tr class="bg-gray-200">
                    <th rowspan="2" class="border border-black px-3 py-2">No</th>
                    <th rowspan="2" class="border border-black px-4 py-2">Tahun</th>
                    <th colspan="2" class="border border-black px-4 py-2">Jumlah Rumah tangga/KK</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr>
                    <td class="border border-black px-2 py-1">1</td>
                    <td class="border border-black px-2 py-1">2018</td>
                    <td class="border border-black px-2 py-1">2.137 kepala keluarga</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">2</td>
                    <td class="border border-black px-2 py-1">2019</td>
                    <td class="border border-black px-2 py-1">2.202 kepala keluarga</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">3</td>
                    <td class="border border-black px-2 py-1">2020</td>
                    <td class="border border-black px-2 py-1">2.253 kepala keluarga</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">4</td>
                    <td class="border border-black px-2 py-1">2021</td>
                    <td class="border border-black px-2 py-1">2.304 kepala keluarga</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">5</td>
                    <td class="border border-black px-2 py-1">2022</td>
                    <td class="border border-black px-2 py-1">2.333 kepala keluarga</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">6</td>
                    <td class="border border-black px-2 py-1">2023</td>
                    <td class="border border-black px-2 py-1">2.292 kepala keluarga</td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">7</td>
                    <td class="border border-black px-2 py-1">2024</td>
                    <td class="border border-black px-2 py-1">2.293 Kepala Keluarga</td>
                </tr>
                </tbody>
            </table>
            <p class="text-sm text-center text-gray-700 mt-3 italic">
                Jumlah Rumah tangga/KK
            </p>
        </div><br>

        <div class="overflow-x-auto mt-8">
            <table class="table-auto w-full border border-black text-sm text-gray-800">
                <thead>
                    <tr class="bg-green-600 text-white text-center">
                    <th class="border border-black px-4 py-2">NO</th>
                    <th class="border border-black px-4 py-2">Nama dusun</th>
                    <th class="border border-black px-4 py-2">Jumlah rumah tangga/KK</th>
                    <th class="border border-black px-4 py-2">Kepadatan per km2</th>
                    <th class="border border-black px-4 py-2">Sex ratio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">1</td>
                    <td class="border border-black px-4 py-1">Dusun (I)</td>
                    <td class="border border-black px-4 py-1 text-center">985</td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">2</td>
                    <td class="border border-black px-4 py-1">Dusun (II)</td>
                    <td class="border border-black px-4 py-1 text-center">747</td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    </tr>
                    <tr>
                    <td class="border border-black px-4 py-1 text-center">3</td>
                    <td class="border border-black px-4 py-1">Dusun (III)</td>
                    <td class="border border-black px-4 py-1 text-center">563</td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    </tr>
                    <tr class="font-bold bg-gray-100">
                    <td class="border border-black px-4 py-2 text-center" colspan="2">Jumlah Total</td>
                    <td class="border border-black px-4 py-2 text-center">2.292</td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    <td class="border border-black px-4 py-2 text-center"></td>
                    </tr>
                </tbody>
            </table>
            <p class="text-sm text-center text-gray-700 mt-3 italic">
                Jumlah Rumah Tangga/KK, Kepadatan/km2 dan sex ratio Tahun 2024
            </p>
        </div>

        </div><br>

        <!-- Indeks Pembangunan Manusia -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Indeks Pembangunan Manusia
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <table class="table-auto w-full border border-black text-sm text-gray-800">
                    <thead class="text-center">
                    <tr class="bg-gray-200">
                        <th rowspan="2" class="border border-black px-3 py-2 align-middle">No</th>
                        <th rowspan="2" class="border border-black px-4 py-2 align-middle">Uraian</th>
                        <th colspan="2" class="border border-black px-4 py-2">Tahun</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-black px-4 py-2">2020</th>
                        <th class="border border-black px-4 py-2">2024</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-black px-2 py-1 text-center">1</td>
                        <td class="border border-black px-2 py-1">Pendidikan</td>
                        <td class="border border-black px-2 py-1 text-right">86,91</td>
                        <td class="border border-black px-2 py-1 text-right">87,69</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1 text-center">2</td>
                        <td class="border border-black px-2 py-1">Kesehatan</td>
                        <td class="border border-black px-2 py-1 text-right">63,16</td>
                        <td class="border border-black px-2 py-1 text-right">64,34</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1 text-center">3</td>
                        <td class="border border-black px-2 py-1">Daya beli</td>
                        <td class="border border-black px-2 py-1 text-right">74,93</td>
                        <td class="border border-black px-2 py-1 text-right">75,66</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1" colspan="2">Target IPM Kec. Bayongbong</td>
                        <td class="border border-black px-2 py-1 text-right">72,38</td>
                        <td class="border border-black px-2 py-1 text-right">75,70</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1" colspan="2">Target IPM Kab. Garut</td>
                        <td class="border border-black px-2 py-1 text-right">73,38</td>
                        <td class="border border-black px-2 py-1 text-right">73,00</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1" colspan="2">Realisasi IPM</td>
                        <td class="border border-black px-2 py-1 text-right">73,84</td>
                        <td class="border border-black px-2 py-1 text-right">74,84</td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-sm text-center text-gray-700 mt-3 italic">
                Indeks Pembangunan Manusia (IPM/HDI) Desa BANJARSARI Tahun 2020-2024
                </p>
            </div>
        </div><br>

        <!-- Kesehatan -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Kesehatan
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Tenaga kesehatan yang ada di desa BANJARSARI dapat dilihat pada tabel dibawah ini:
                </p>
                <table class="table-auto w-full border border-black text-sm text-gray-800">
                    <thead class="text-center bg-gray-100">
                    <tr>
                        <th class="border border-black px-2 py-1">No</th>
                        <th class="border border-black px-2 py-1" colspan="2">Tenaga kesehatan</th>
                        <th class="border border-black px-2 py-1">Jumlah</th>
                        <th class="border border-black px-2 py-1">Ket.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-black px-2 py-1 text-center" rowspan="2">1</td>
                        <td class="border border-black px-2 py-1" rowspan="2">Medis</td>
                        <td class="border border-black px-2 py-1">Dokter Umum</td>
                        <td class="border border-black px-2 py-1 text-center">-</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1">Dokter spesialis</td>
                        <td class="border border-black px-2 py-1 text-center">-</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1 text-center" rowspan="2">2</td>
                        <td class="border border-black px-2 py-1" rowspan="2">Keperawatan</td>
                        <td class="border border-black px-2 py-1">Bidan</td>
                        <td class="border border-black px-2 py-1 text-center">1</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1">Perawat</td>
                        <td class="border border-black px-2 py-1 text-center">3</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1 text-center" rowspan="3">3</td>
                        <td class="border border-black px-2 py-1" rowspan="3">Partisipasi masyarakat</td>
                        <td class="border border-black px-2 py-1">Posyandu</td>
                        <td class="border border-black px-2 py-1 text-center">9</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1">Paraji</td>
                        <td class="border border-black px-2 py-1 text-center">2</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-2 py-1 font-semibold text-right">Jumlah</td>
                        <td class="border border-black px-2 py-1 text-center font-bold">15</td>
                        <td class="border border-black px-2 py-1"></td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-sm text-center text-gray-700 mt-3 italic">
                Jumlah Tenaga Kesehatan Tahun 2024
                </p>
            </div>
        </div><br>

        <!-- Pendidikan -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Pendidikan
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Data pendidikan desa BANJARSARI, mulai dari jumlah guru, murid, jumlah sekolah, lulusan dan sarana pendidikan kami dituangkan dalam tabel dibawah ini : 
                </p>
            </div>
        </div><br>

        <!-- Kesejehteraan sosial -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Kesejehteraan sosial
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Data pendidikan desa BANJARSARI, mulai dari jumlah guru, murid, jumlah sekolah, lulusan dan sarana pendidikan kami dituangkan dalam tabel dibawah ini : 
                </p>
            </div>
        </div><br>

        <!-- Ketenagaan kerjaan -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Ketenagaan kerjaan
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Data pendidikan desa BANJARSARI, mulai dari jumlah guru, murid, jumlah sekolah, lulusan dan sarana pendidikan kami dituangkan dalam tabel dibawah ini : 
                </p>
            </div>
        </div><br>

        <!-- Pemuda dan olah raga -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Pemuda dan olah raga
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Data pendidikan desa BANJARSARI, mulai dari jumlah guru, murid, jumlah sekolah, lulusan dan sarana pendidikan kami dituangkan dalam tabel dibawah ini : 
                </p>
            </div>
        </div><br>

        <!-- Kebudayaan -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Kebudayaan
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Data pendidikan desa BANJARSARI, mulai dari jumlah guru, murid, jumlah sekolah, lulusan dan sarana pendidikan kami dituangkan dalam tabel dibawah ini : 
                </p>
            </div>
        </div><br>

        <!-- Tempat Peribadahan -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Tempat Peribadahan
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Data pendidikan desa BANJARSARI, mulai dari jumlah guru, murid, jumlah sekolah, lulusan dan sarana pendidikan kami dituangkan dalam tabel dibawah ini : 
                </p>
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
