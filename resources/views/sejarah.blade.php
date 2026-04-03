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
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Sejarah Desa Banjarsari</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Menelusuri jejak langkah Desa Banjarsari dari masa lalu menuju masa depan yang gemilang.
        </p>
    </div>
</section>

<!-- Sejarah Section -->
<section class="py-16 bg-white relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">
            Perjalanan Sejarah
        </h2>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
            <p>
            Desa BANJARSARI merupakan salah satu desa dalam wilayah kecamatan bayongbong yang gterletak diantara jalur Kabupaten dari Kampung Palnunjuk ke Kampung Cibodas, terletak pada 6 Kilometer menuju Kecamatan Bayongbong kearah selatan dengan jarak tempuh kurang lebih 15 menit dan 13 Kilometer menuju Kabupaten Garut dengan jarak tempuh kurang lebih 25 menit ke arah Utara
            </p>
            <p>
            Desa Banjarsari merupakan desa pokok yang dulunya diwilayah Kecamatan Bayongbong hanya mempunyai 6 Desa pokok, namun pada tahun 1984 melalui musyawarah bersama desa Banjarsari dimekarkan menjadi 2 Desa yaitu Desa Banjarsari dan Desa Mekarjaya yang berada diperbatasan sebelah Timur Desa Banjarsari.
            </p>
            <p>
            Desa Banjarsari, lama kelamaan menjadi berkembang yang terhampar di daerah pesawahan dan air yang cukup untuk menyuburkan lahan pertanian dan tak pernah kering walaupun musim kemarau panjang karena banyak mata air dan dekat dengan alian sungai adapun mata pencaharian penduduk sebagian besar adalah Buruh Tani, Petani Tanaman Padi dan Holtikultura.
            </p>
            <p>
            Selain di bidang pertanian Desa BANJARSARI banyak Home Industri  seperti : Home industri kerajinan makanan seperti : Tahu, Raginang, Dapros, Rangining, Wajit, Genar dan lain-lain yang dipasarkan ke pasar daerah dan luar daerah dan mata pencaharian untuk warga desa kami yang bisa menyerap sebagian tenaga kerja di desa BANJARSARI.
            </p>
            <p>
            Selain itu Desa BANJARSARI kaya akan mata air karena dekat dengan sungai sehingga masih banyak potensi sumber daya alam yang belum di manfaatkan seara maksimal yaitu di bidang perikanan dan banyak untuk pakan ternak hingga bila dikembangkan bisa mengembangkan untuk produktifitas di bidang peternakan dan perikanan.
            </p>
            <p>
            Demikan cerita ringkas Desa BANJARSARI yang siap untuk menyongsong masa depan dengan tetap gigih untuk berusaha memajukan tarap hidup masyarakat yang lebih baik bagi warga Desa BANJARSARI yang akan datang. 
            </p>
        </div>

        <!-- Tabel Kepala Desa -->
        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Daftar Kepala Desa Banjarsari
            </h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium">No</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Nama Kepala Desa</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Masa Jabatan</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                        <tr>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">WANGSA</td>
                            <td class="px-6 py-4">TIDAK DIKETAHUI</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">2</td>
                            <td class="px-6 py-4">MARJUKI</td>
                            <td class="px-6 py-4">TIDAK DIKETAHUI</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">3</td>
                            <td class="px-6 py-4">MUHAMMAD JALIL</td>
                            <td class="px-6 py-4">TIDAK DIKETAHUI</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">4</td>
                            <td class="px-6 py-4">MUHAMMAD SHOLIH</td>
                            <td class="px-6 py-4">1962 s/d 1970</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">5</td>
                            <td class="px-6 py-4">MUHAMMAD ROSYID</td>
                            <td class="px-6 py-4">1970 s/d 1988</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">6</td>
                            <td class="px-6 py-4">A. GUSYAMIN</td>
                            <td class="px-6 py-4">1988</td>
                            <td class="px-6 py-4">PJS</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">7</td>
                            <td class="px-6 py-4">MUHAMMAD TOHARI</td>
                            <td class="px-6 py-4">1988 s/d 1996</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">8</td>
                            <td class="px-6 py-4">ITON</td>
                            <td class="px-6 py-4">1996</td>
                            <td class="px-6 py-4">PJS</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">9</td>
                            <td class="px-6 py-4">UJANG SUPRIATNA</td>
                            <td class="px-6 py-4">1996 s/d 1999</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">10</td>
                            <td class="px-6 py-4">JUHARA</td>
                            <td class="px-6 py-4">1996</td>
                            <td class="px-6 py-4">PJS</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">11</td>
                            <td class="px-6 py-4">ACEP RIDWAN</td>
                            <td class="px-6 py-4">2001 s/d 2003</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">12</td>
                            <td class="px-6 py-4">ENGKUS KUSWARA</td>
                            <td class="px-6 py-4">2003 s/d 2004</td>
                            <td class="px-6 py-4">PJS</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">13</td>
                            <td class="px-6 py-4">II SAPEI</td>
                            <td class="px-6 py-4">2004 s/d 2009</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">14</td>
                            <td class="px-6 py-4">ENGKUS KUSWARA</td>
                            <td class="px-6 py-4">2009</td>
                            <td class="px-6 py-4">PJS</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">15</td>
                            <td class="px-6 py-4">NANANG KAMALUDIN</td>
                            <td class="px-6 py-4">2009 s/d 2015</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">16</td>
                            <td class="px-6 py-4">ENGKUS KUSWARA</td>
                            <td class="px-6 py-4">2015 s/d 2017</td>
                            <td class="px-6 py-4">PJS</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">17</td>
                            <td class="px-6 py-4">UJANG SUPRIATNA</td>
                            <td class="px-6 py-4">2017 s/d November 2019</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">18</td>
                            <td class="px-6 py-4">JAJANG JUHARA, S.IP.,M.Si </td>
                            <td class="px-6 py-4">2019 s/d Desember 2020</td>
                            <td class="px-6 py-4">Penjabat, Kepala Desa </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">19</td>
                            <td class="px-6 py-4">YOLANDA OKTAVIA F</td>
                            <td class="px-6 py-4">2021 s/d Juni 2023</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">20</td>
                            <td class="px-6 py-4">EDI SOPANDI</td>
                            <td class="px-6 py-4">2023 s/d Juni 2031</td>
                            <td class="px-6 py-4">DEFINITIF</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><br><br>

        <div class="bg-gray-50 p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed space-y-6 text-justify">
            <p>
            Saat ini kepala desa Banjarsari dipimpin oleh Bapak Edi sopandi yang terpilih sebagai Kepala Desa Banjarsari Sejak Tahun 2023.
            </p>
            <p>
            Beliau terpilih sebagai Kepala Desa Banjarsari berdasarkan hasil pemilihan Kepala Desa Banjarsari yang laksanakan pada tanggal 16 bulan Mei tahun 2023 kemudian di lantik pada tanggal 16 bulan Juni tahun 2023 untuk periode tahun 2023 sampai dengan 2029. 
            </p>
            <p>
            Dalam Kehidupan sehari-hari masyarakat Desa Banjarsari cukup dinamis dalam berfikir dan berpandangan jauh ke depan sesuai dengan nama desa yang mengandung arti filosofi etos kerja yang bermuara pada kesejahteraaan desa. Fakta sejarah berbicara dan tidak bias dipungkiri bahwa dari masa ke masa sebuah daerah mengalami perubahan perjalanan jaman, masa-masa kemajuan yang dirasakan dan diceritakan masyarakat pada masa dimana desa belum mengalami pemekaran, Desa Banjarsari mengalami kejayaan dimana lurah terdahulu mampu membeli tanah yang cukup luas untuk kepentingan carik desa sehingga setelah pemekaran desa menjadi 2 bagian yaitu menjadi desa Banjarsari dan Mekarjaya masing-masing desa mendapatkan tanah carik yang cukup luasnya dan mungkin salah satu Desa yang mempunyai asset kekayaan carik desa terluas di wilayah kecamatan Bayongbong kabupaten Garut dengan luas carik desa seluas 3.150 Ha. Dan pada saat kepemimpinan Kepala Desa dipimpin oleh Bpk Muhammad Jalil, Bapak Muhammad Jalil mendapatkan gelar lurah berkuda, dikarenakan beliau kemanapun dalam melaksanakan tugasnya sebagai Kepala Desa selalu menunggangi kuda. Serta beliau sangat disegani oleh warga tapi selalu dipuji dan banyak yang simpati karena kearifan dan kepeduliannya terhadap masyarakat.
            </p>
            <p>
            Selain itu, Desa Banjarsari pada masa lurah Muhammad Sholih dan Muhammad Rosyid juga mengalami kemajuan pembangunan yang sangat signifikan di bidanng infrastruktur, pertanian, pendidikan dan penerangan, seiring dengan perjalanan waktu serta program REPELITA dibangun Sekolah Dasar INPRES Banjarsari I, II, III, IV, V dan VI, serta pembangunan irigasi yang lebih mencolok adalah terpasangnya jaringan listrik ke wilayah Desa Banjarsari dimana kurang lebih tahun 1982 berkat kerjasama pemerintah Desa Banjarsari dan warga serta pihak terkait mampu memasang jaringan listrik.
            </p>
            <p>
            Pada masa Kepala Desa M. Tohari telah memberikan kontribusi berupa pembangunan saluran tersier irigasi Beulah Nangka sehingga mampu membuat tanggul penahan longsor demi kelancaran air pertanian serta mampu menjuarai lomba kegiatan PKK Tingkat Nasional.
            </p>
            <p>
            Desa Banjarsari pada saat dipimpin oleh Kepala Desa Bapak Ujang Supriatna mendapatkan prestasi sebagai desa tercepat dalam dalam pelunasan Pajak Bumi dan Bangunan diwilayah Kecamatan Bayongbong disamping itu beliau mampu memasang listrik di daerah terpencil yaitu Kp. Talun yang pada saat itu tidak dapat di tempuh oleh alat transportasi dan hanya dapat di tempuh dengan berjalan kaki. Bapak Ujang Supriatna juga berhasil membangun irigsi Bojong sehingga sampai sekarang mannfaatnya masih dapat dirasakan. Serta dapat merehap rumah-rumah warga yang tidak layak huni dan tidak permanen menjadi rumah permanen.
            </p>
            <p>
            Tahun 2001 Desa Banjarsari dipimpin oleh Acep Ridwan yang dapat merehab Sekolah Dasar Banjarsari 1 dan Kantor Desa, serta memperbaiki Jalan Desa. Kepemimpinan saat itu diteruskan oleh Ii Sapei yang dapat melakukan pengerasan jalan lingkungan Kp. Talun yang sebelumnya hanya jalan setapak serta pembangunan Kirmir Jalan Desa dan lapangan sepak bola.  Lalu dilanjutkan lagi kepemimpinan Desa Banjarsari Oleh Nanang Kamaludin yang berkontribusi dalam pembangunan Desa Banjarsari yaitu beruapa perbaikan seluruh Jalan Lingkungan Desa Banjarsari dan juga perbaikan jembatan Kp. Ciloa. Secara umum para Kepala Desa Banjarsari telah banyak berkontribusi dalam bidanng pendidikan, social dan juga Pembangunan infrastruktur lainnya.
            </p>
            <p>
            Kehidupan masyarakat desa Banjarsari dalam mata pencahariannya terbagi dalam beberapa kegiatan anatara lain :
            <ol type="a">
                <li>a. Pertanian</li>
                <li>b. Peternakan</li>
                <li>c. PNS dan Swasta</li>
                <li>d. Home Industri</li>
                <li>e. Perdagangan</li>
            </ol>
            </p>
            <p>
            Sampai saat ini  di masyarakat desa Banjarsari masih menjunjung tinggi nilai-nilai kebersamaan, kegotong-royongan,serta tentu saja yang paling fundamental yaitu kehidupan agamis yang memberi ciri khas tersendiri.
            </p>
        </div>

        <div class="mt-12">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-green-500 pl-4">
                Daftar Kepala Desa Banjarsari
            </h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium">No</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Kejadian baik/keberhasilan</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Kejadian yang buruk/kegagalan</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Tahun</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                        <tr>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Pemasangan Jaringan Listrik Wilayah Desa</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1982</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">2</td>
                            <td class="px-6 py-4">Pembanguna Sekolah IMPRES I, II, II, IV, V dan VI</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1982</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">3</td>
                            <td class="px-6 py-4">Pembangunan Irigasi Tersier Beulah Nangka</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1988</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">4</td>
                            <td class="px-6 py-4">Pembangunan Irigasi Bojong</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1996</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">5</td>
                            <td class="px-6 py-4">Pemasangan Jaringan Listrik Wilayah Kp. Talun Desa Banjarsari</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1997</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">6</td>
                            <td class="px-6 py-4">Pembangunan Rehab Jalan Lingkungan. </td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1998</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">7</td>
                            <td class="px-6 py-4">Pembangunan Rumah Kumuh</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1998</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">8</td>
                            <td class="px-6 py-4">Pembangunan Rehab Jalan Desa</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">1999</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">9</td>
                            <td class="px-6 py-4">Pembangunan Rehab SDN Banjarsari 1</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2001</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">10</td>
                            <td class="px-6 py-4">Pembangunan Rehab Banjarsari V</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2002</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">11</td>
                            <td class="px-6 py-4">Pembanguna Sumur Artesis di RW 01 dan RW 02</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2002</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">12</td>
                            <td class="px-6 py-4">Pembangun Irigasi Pasantren</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2003</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">13</td>
                            <td class="px-6 py-4">Pembangunan Irigasi Cipeujeuh – Cigarukgak</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2004</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">14</td>
                            <td class="px-6 py-4">Pemasangan PJU Desa Banjarsari</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2005</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">15</td>
                            <td class="px-6 py-4">Pembangunan/Plumisasi Jalan Lingkungan di 6 RW</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2006</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">16</td>
                            <td class="px-6 py-4">Pembangunan Jalan Lingkungan Kp. Talun dan Rehab Kantor</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2007</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">17</td>
                            <td class="px-6 py-4">Pembangunan Jembatan Lingkungan RW 02</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2008</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">18</td>
                            <td class="px-6 py-4">Pembangunan Rehab SDN Banjarsari II dan SDN Banjarsari VI</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2008</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">19</td>
                            <td class="px-6 py-4">Pembangunan Pasar Cibodas</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2008</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">20</td>
                            <td class="px-6 py-4">Pembangunan Mesjid Baitussalam Kp. Cibodas Tengah</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2008</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">21</td>
                            <td class="px-6 py-4">Pembangunan Rehab SDN Banjarsari IV</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2009</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">22</td>
                            <td class="px-6 py-4">Pembangunan Kirmir Jalan Desa</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2009</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">23</td>
                            <td class="px-6 py-4">Pembangunan SMP Yayasan Al-Munir</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2009</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">24</td>
                            <td class="px-6 py-4">Program LisDEs (Listrik Desa) Bagi Keluarga Miskin Sebanyak 50 Titik</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2010</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">25</td>
                            <td class="px-6 py-4">Pembangunan Mesjid Nurul Hidayah Kp. Cibodas Cibodas Kaum</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2010</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">26</td>
                            <td class="px-6 py-4">Pembangunan Mesjid Mua’malah Kp. Sindanglaya</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2010</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">27</td>
                            <td class="px-6 py-4">Pengaspalan Jalan Desa</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2010</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">28</td>
                            <td class="px-6 py-4">Pemasangan 2 Titik PJU di Kp. Ciloa</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2010</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">29</td>
                            <td class="px-6 py-4">Pembangunan TPT Jalan Desa</td>
                            <td class="px-6 py-4">-</td>
                            <td class="px-6 py-4">2010</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><br><br>
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
