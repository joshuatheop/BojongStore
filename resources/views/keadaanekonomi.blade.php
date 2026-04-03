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
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Keadaan Ekonomi Desa</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Desa Banjarsari memiliki kondisi ekonomi yang cukup kuat untuk dikembangkan lebih lanjut melalui pengelolaan sumber daya secara bijak dan berkelanjutan.
        </p>
    </div>
</section>

<!-- Keadaan Ekonomi Section -->
<section class="py-16 bg-white relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">
            Pajak dan retribusi desa
        </h2>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Pajak dan retribusi desa bisa dilihat dalam tabel :
                </p>
        <div class="overflow-x-auto mt-8">
            <table class="table-auto w-full border border-black text-sm text-gray-800">
                <thead>
                    <tr class="bg-green-600 text-white text-center">
                        <th class="border border-black px-4 py-2">No</th>
                        <th class="border border-black px-4 py-2">Uraian</th>
                        <th class="border border-black px-4 py-2">2024</th>
                        <th class="border border-black px-4 py-2">2025</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black px-4 py-1 text-center">1</td>
                        <td class="border border-black px-4 py-1">Pajak Desa</td>
                        <td class="border border-black px-4 py-1 text-center">Rp. 74.189.977</td>
                        <td class="border border-black px-4 py-1 text-center">Rp. 81.923.123</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-1 text-center">2</td>
                        <td class="border border-black px-4 py-1">Retribusi Desa</td>
                        <td class="border border-black px-4 py-1 text-center">-</td>
                        <td class="border border-black px-4 py-1 text-center">-</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-1 text-center">3</td>
                        <td class="border border-black px-4 py-1">Lain-lain</td>
                        <td class="border border-black px-4 py-1 text-center">-</td>
                        <td class="border border-black px-4 py-1 text-center">-</td>
                    </tr>
                    <tr class="font-bold bg-gray-100">
                        <td class="border border-black px-4 py-2 text-center" colspan="2">Jumlah</td>
                        <td class="border border-black px-4 py-2 text-center">Rp. 74.189.977</td>
                        <td class="border border-black px-4 py-2 text-center">Rp. 81.923.123</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-sm text-center text-gray-700 mt-3 italic">
                Pajak dan Retribusi Desa BANJARSARI Tahun 2023/2024
            </p>
        </div>

        </div><br>

        <!-- Alokasi dana desa -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Alokasi dana desa
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Alokasi dana desa dari pemerintah tiap tahunnya mengalami kenaikan, hal ini bisa dilihat dalam tabel:
                </p>
                <div class="overflow-x-auto mt-8">
                <table class="table-auto w-full border border-black text-sm text-gray-800">
                    <thead>
                    <tr class="bg-green-600 text-white text-center">
                        <th class="border border-black px-4 py-2">No</th>
                        <th class="border border-black px-4 py-2">Tahun</th>
                        <th class="border border-black px-4 py-2">Jumlah</th>
                        <th class="border border-black px-4 py-2">Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">1</td>
                        <td class="border border-black px-4 py-2 text-center">2023</td>
                        <td class="border border-black px-4 py-2 text-center">1.816.310.312</td>
                        <td class="border border-black px-4 py-2 text-center">Naik</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                        <td class="border border-black px-4 py-2 text-center">2024</td>
                        <td class="border border-black px-4 py-2 text-center">1.766.270.123</td>
                        <td class="border border-black px-4 py-2 text-center">Turun</td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-sm text-center text-gray-700 mt-3 italic">
                    Alokasi Dana Desa BANJARSARI Tahun 2023-2024
                </p>
                </div>
            </div>
        </div><br>

        <!-- Sumber penerimaan desa lainnya -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Sumber penerimaan desa lainnya
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Sumber pendapatan desa selain dari hal di atas adalah dari tanah carik dan insentif.
                </p>
            </div>
        </div><br>

        <!-- Transportasi perhubungan -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Transportasi perhubungan
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Panjang jalan utama desa Banjarsari pada tahun 2016 sepanjang 7 km, yang terdiri dari atas jalan kabupaten 6 km, serta jalan desa sepanjang 1 km. adapun transportasi umum yang digunakan oleh masyarakat adalah jasa ojeg dan angkot.
                </p>
            </div>
        </div><br>

        <!-- Telekomunikasi dan informasi -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Telekomunikasi dan informasi
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Sarana informasi dan komunikasi yang digunakan penduduk Desa Banjarsari adalah telepon genggam (Hand Phone), dikarenakan jasa telepon rumah sudah banyak yang tidak terpakai.
                </p>
                <p>
                Selanjutnya jasa PT. POS Indonesia dan perusahaan jasa sejenis amat membantu mobilisasi komunikasi dan distribusi barang dan jasa pos, sehingga berbagai transaksi bisnis maupun jasa yang diperlukan masyarakat semakin mudah dijangkau.
                </p>
            </div>
        </div><br>

        <!-- Pengairan dan irigasi  -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Pengairan dan irigasi 
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Penanganan keirigasian/pengairan diarahkan dalam rangka memenuhi kebutuhan para petani sawah dan kolam air tawar, maupun tanaman palawija. Kondisi jaringan irigasi di Desa Banjarsari pada tahun 2016 ini kondisinya kurang optimal, mengingat hanya pada musim hujan saja jaringan irigasi ini bisa maksimal, sedangkan pada musim kemarau tidak ada airnya, juga didukung oleh rusaknya saluran irigasi di Desa BANJARSARI sebagai akibat dari terjadinya pendangkalan (Sedimentasi) saluran air. 
            </div>
        </div><br>

        <!-- Air bersih  -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Air bersih 
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Air bersih merupakan salah satu kebutuhan pokok manusia dalam memenuhi kebutuhan hidupnya seperti minum, memasak, mencuci dll. Untuk memenuhi kebutuhan akan air bersih, saat ini penduduk desa Banjarsari sebagian sudah besar menggunakan mata air sumur gali dan sebagian juga ada yang telah memekai air PAM. Pengguna sumber air bersih kami tabelkan dibawah ini:
                </p>
                <table class="table-auto w-full border border-black text-sm text-gray-800">
                    <thead>
                    <tr class="bg-green-600 text-white text-center">
                        <th class="border border-black px-4 py-2">No</th>
                        <th class="border border-black px-4 py-2">
                        Jenis sumber air bersih<br>
                        yang digunakan oleh masyarakat
                        </th>
                        <th class="border border-black px-4 py-2">Jumlah KK Pengguna</th>
                        <th class="border border-black px-4 py-2">Persentase (%)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        <td class="border border-black px-4 py-2">1</td>
                        <td class="border border-black px-4 py-2 text-left">PAM</td>
                        <td class="border border-black px-4 py-2">150</td>
                        <td class="border border-black px-4 py-2"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="border border-black px-4 py-2">2</td>
                        <td class="border border-black px-4 py-2 text-left">Sumur Pompa</td>
                        <td class="border border-black px-4 py-2">30</td>
                        <td class="border border-black px-4 py-2"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="border border-black px-4 py-2">3</td>
                        <td class="border border-black px-4 py-2 text-left">Artesis</td>
                        <td class="border border-black px-4 py-2">300</td>
                        <td class="border border-black px-4 py-2"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="border border-black px-4 py-2">4</td>
                        <td class="border border-black px-4 py-2 text-left">Sumur gali</td>
                        <td class="border border-black px-4 py-2">800</td>
                        <td class="border border-black px-4 py-2"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="border border-black px-4 py-2">5</td>
                        <td class="border border-black px-4 py-2 text-left">Fasilitas air bersama</td>
                        <td class="border border-black px-4 py-2">200</td>
                        <td class="border border-black px-4 py-2"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="border border-black px-4 py-2">6</td>
                        <td class="border border-black px-4 py-2 text-left">Kali/sungai</td>
                        <td class="border border-black px-4 py-2">400</td>
                        <td class="border border-black px-4 py-2"></td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-sm text-center text-gray-700 mt-3 italic">
                    Jumlah air bersih yang digunakan oleh masyarkat Desa Banjarsari Tahun 2024
                </p>
            </div>
        </div><br>

        <!-- Air limbah  -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Air limbah 
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Jenis Limbah yang terdapat di Desa Banjarsari dibedakan menjadi 2 (dua) macam yaitu limbah domestik dan limbah nondomestik. Limbah domestik merupakan limbah hasil buangan rumah tangga dari kegiatan mandi, cuci dan kakus. Sedangkan limbah nondomestik adalah limbah yang dihasilkan seperti limbah penggilingan padi, limbah lemak, limbah industri rumah tangga (konveksi) dan sebagainya.
                </p>
                <p>
                Sistem pembuangan limbah domestik di Desa Banjarsari selain menggunakan jamban keluarga berupa septictank, juga memanfaatkan sungai, dan kolam dan pembangunan langsung ke saluran drainase yang ada. Namun berdasarkan data yang ada pada tahun 2016 sudah sebagian besar masyarakat membuang limbah domestik  melalui saluran septictank.
                </p>
            </div>
        </div><br>

        <!-- Energi -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Energi
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Hampir 90% rumah yang berada di desa Banjarsari sudah teraliri listrik milik PLN, hanya ada beberepa masyarakat yang belum tersambung listrik secara langsung dikarenakan faktor ekonomi. Pada umumnya masyarakat yang belum mampu memasang listrik secara langsung mengambil dari tetangganya. Kesimpulannya seluruh masyarakat desa Banjarsari dalam penerangan sudah menggunakan listrik.
                </p>
            </div>
        </div><br>

        <!-- Musim -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Musim
            </h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
                <p>
                Seperti daerah Jawa Barat pada umunya, Desa Banjarsari mengenal dua musim, yaitu musim hujan dan musim kemarau.
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
