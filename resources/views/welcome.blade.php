@extends('layouts.landing')

@section('content')
<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    /* Base Styles */
    html, body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.5;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #ecf2ea;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* Layout */
    .w-screen { width: 100vw; }
    .h-screen { height: 100vh; }
    .min-h-screen { min-height: 100vh; }
    .w-full { width: 100%; }
    .h-full { height: 100%; }
        
    /* Positioning */
    .relative { position: relative; }
    .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }

    /* Flex & Grid */
    .flex { display: flex; }
    .grid { display: grid; }
    .items-center { align-items: center; }
    .justify-center { justify-content: center; }
    .grid-cols-1 { grid-template-columns: 1fr; }
    .gap-12 { gap: 3rem; }
        
    /* Spacing */
    .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
    .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
    .mb-6 { margin-bottom: 1.5rem; }
    .mr-12 { margin-right: 3rem; }
    .mx-auto { margin-left: auto; margin-right: auto; }

    /* Typography */
    .header-text {
        font-size: 40px;
        line-height: 3rem;
        color: white;
        margin: 20px;
        font-weight: bold;
    }
        
    /* Utilities */
    .object-cover { object-fit: cover; }

    /* Responsive */
    @media (min-width: 768px) {
        .md\:text-5xl { font-size: 3rem; line-height: 1; }
    }

    @media (min-width: 1024px) {
        .lg\:px-12 { padding-left: 3rem; padding-right: 3rem; }
        .lg\:text-6xl { font-size: 3.75rem; line-height: 1; }
        .lg\:grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
    }

    .stats-card {
        display: flex;
        justify-content: center;
        margin-top: -60px; /* untuk overlap ke Hero jika perlu */
        z-index: 2;
        position: relative;
    }

        .stats-container {
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        display: flex;
        padding: 30px 40px;
        gap: 20px;
        align-items: center;
        max-width: 1100px;
        width: 100%;
        justify-content: space-around;
        }

        .stat-box {
        text-align: center;
        }

        .stat-box h2 {
        font-size: 3.2rem;
        margin: 0;
        color: #111;
        font-weight: 700;
        }

        .stat-box p {
        margin: 6px 0 0;
        color: #666;
        font-size: 1.2rem;
        }

        .divider {
        width: 1px;
        height: 70px;
        background-color: #e0e0e0;
        }

        @media (max-width: 768px) {
        .stats-container {
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }

        .divider {
            display: none;
        }
        }

        section#misi {
          padding: 60px 20px;
          text-align: center;
          background-color: #ffffff;
        }

        section#misi h2 {
          font-size: 2.2rem;
          font-weight: bold;
          margin-bottom: 10px;
        }

        section#misi p {
          max-width: 720px;
          margin: 0 auto 40px auto;
          color: #555;
          font-size: 1rem;
          line-height: 1.6;
        }

        section#peta {
          padding: 60px 20px;
          text-align: center;
          background-color: #ffffff;
        }

        section#peta h2 {
          font-size: 2.2rem;
          font-weight: bold;
          margin-bottom: 10px;
        }

        section#peta p {
          max-width: 720px;
          margin: 0 auto 40px auto;
          color: #555;
          font-size: 1rem;
          line-height: 1.6;
        }

    section#sejarah {
      padding: 60px 20px;
      text-align: center;
      background-color: #ffffff;
    }

    section#sejarah h2 {
      font-size: 2.2rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    section#sejarah p {
      max-width: 720px;
      margin: 0 auto 40px auto;
      color: #555;
      font-size: 1rem;
      line-height: 1.6;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      max-width: 1140px;
      margin: 0 auto;
    }

    .card {
      background: #f9f9f9;
      padding: 24px;
      border-radius: 16px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      margin-bottom: 12px;
      font-size: 1.2rem;
      font-weight: 600;
    }

    .card p {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.5;
    }

    @media screen and (max-width: 600px) {
      section#misi h2 {
        font-size: 1.6rem;
      }

      .card {
        padding: 20px;
      }
    }


    .about-text {
      flex: 1 1 300px;
      max-width: 400px;
      color: #ffffff;
      padding: 30px 30px;
    }

    .about-text h2 {
      font-size: 2rem;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .about-text p {
      font-size: 1rem;
      color: #e0e0e0;
    }

    .card-container {
      flex: 2 1 500px;
      display: flex;
      flex-direction: column;
      padding: 30px 20px;
      gap: 20px;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 24px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      color: #ffffff;
      transition: transform 0.3s ease;
    }

    .glass-card:hover {
      transform: translateY(-5px);
    }

    .glass-card h3 {
      margin-bottom: 10px;
      font-size: 1.2rem;
    }

    .glass-card p {
      font-size: 0.95rem;
      color: #e0e0e0;
      line-height: 1.5;
    }
    
    .testimonials-section {
      max-width: 1200px;
      margin: auto;
      padding: 60px 20px;
      text-align: center;
    }
    .testimonials-section h2 {
      font-size: 2rem;
      margin-bottom: 10px;
      color: #222;
      font-weight: bold;
    }

    .testimonials-section p.subtitle {
      color: #666;
      margin-bottom: 40px;
      font-size: 1rem;
    }

    .testimonial-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .testimonial-card {
      background-color: #ffffff;
      border-radius: 16px;
      padding: 24px;
      max-width: 320px;
      text-align: left;
      position: relative;
    }

    .testimonial-card::before {
      content: "❝";
      font-size: 4rem;
      color: #007e3e;
      position: absolute;
      top: 16px;
      left: 20px;
    }

    .testimonial-text {
      color: #333;
      font-size: 0.95rem;
      margin-bottom: 20px;
      margin-top: 60px;
    }

    @media (max-width: 768px) {
      .testimonial-cards {
        flex-direction: column;
        align-items: center;
      }
    }
    </style>
    </head>
    <body class="font-sans antialiased m-0 p-0 flex flex-col min-h-screen">
      
        <!-- Hero Section -->
    <div class="relative h-[90vh] sm:h-screen">
      
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/bgtes.jpg') }}" alt="Background" class="w-full h-full object-cover">
        </div>
        
        <!-- Overlay Transparan -->
        <div class="absolute inset-0 bg-black/40 z-10"></div>

        {{-- Svg --}}
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


        <!-- Konten Teks -->
        <div class="relative z-20 h-full flex items-center">
            <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                        <!-- Kolom kiri -->
                        <div class="flex flex-col items-start space-y-2">
                            <h1 id="typing-text" class="header-text whitespace-pre-line text-white m-0 p-0"></h1>
                            <h3 class="text-white text-lg m-0 p-0">Kec. Bayongbong Kab. Garut</h3>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="hidden lg:block">
                            <!-- Tambahan konten -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Hero -->

    <section class="absolute z-30 left-1/2 transform -translate-x-1/2 -bottom-12 w-full max-w-5xl px-4">
        <div class="stats-container">
            <div class="stat-box">
            <h2>7.682</h2>
            <p>Jumlah Penduduk (Jiwa)</p>
            </div>
            <div class="divider"></div>
            <div class="stat-box">
            <h2>2.293</h2>
            <p>Jumlah Kepala Keluarga (KK)</p>
            </div>
            <div class="divider"></div>
            <div class="stat-box">
            <h2>140 Ha/m²</h2>
            <p>Luas Wilayah</p>
            </div>
        </div>
    </section>
    <br>

    <div class="w-[85%] mx-auto shadow-md rounded-2xl p-1 bg-white">
        <section id="sejarah">
            <div class="w-full flex justify-center">
                <div class="max-w-7xl w-full flex flex-col items-center gap-4 phone:gap-2">
                    <div class="w-full 2xl:h-[calc((100vw-24rem)*9/24)] xl:h-[calc((100vw-22rem)*9/19)] lg:h-[calc((100vw-10rem)*9/19)] md:h-[calc((100vw-8rem)*9/16)] sm:h-auto phone:h-auto flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-row sm:flex-col phone:flex-col 2xl:items-start xl:items-start lg:items-start md:items-center sm:items-center phone:items-center rounded-md mb-4">
                        <div class="2xl:w-[65%] xl:w-[65%] lg:w-[60%] md:w-[60%] sm:w-full phone:w-full h-full flex flex-col justify-start items-start p-5 2xl:pr-20 xl:pr-10 phone:p-2 lg:pr-8 gap-2 2xl:order-1 xl:order-1 lg:order-1 md:order-1 sm:order-2 phone:order-2">
                            <div class="w-auto h-auto flex flex-col gap-1">
                                <h2>Sambutan Kepala Desa</h2>
                                <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>
                            </div>
                            <div class="mt-2 font-light text-justify text-base phone:text-xs text-gray-700 reveal-r animate">
                                {!! nl2br(e($sambutan->sambutan ?? 'Belum ada sambutan.')) !!}
                                @if(!empty($sambutan->nama_kepala_desa))
                                    <br><br><br>— {{ strtoupper($sambutan->nama_kepala_desa) }}, KEPALA DESA BANJARSARI —
                                @endif
                            </div>
                        </div>
                        <div class="2xl:w-auto xl:w-auto lg:w-auto md:w-auto sm:w-[60%] phone:w-[70%] h-full flex flex-col 2xl:p-8 xl:p-8 lg:p-8 md:p-7 sm:p-8 phone:p-5 sm:order-1 phone:order-1 self-center relative">
                            @if (!empty($sambutan->foto))
                                <img src="{{ asset('storage/' . $sambutan->foto) }}"
                                    class="h-full w-full bg-cover bg-center self-center z-10 reveal rounded-lg shadow-product animate"
                                    alt="Foto Kepala Desa">
                            @else
                                <img src="{{ asset('images/logo.png') }}" alt="Default"
                                    class="h-full w-full bg-cover bg-center self-center z-10 reveal rounded-lg shadow-product animate" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    
    {{-- sekilas info --}}
@if($infos->count())
    <div class="w-[85%] mx-auto rounded-md border border-yellow-300 overflow-hidden shadow-md">
        <div class="flex">
            
            <!-- Label Sekilas Info -->
            <div class="bg-blue-600 px-4 py-2 text-white font-semibold text-sm flex items-center gap-2 shrink-0">
                <i class="bx bx-bell text-xl"></i>
                Sekilas Info
            </div>

            <!-- Marquee dari DB -->
            <div class="bg-yellow-400 flex-1 px-4 py-2">
                <marquee behavior="scroll" direction="left" scrollamount="7"
                         class="text-sm text-gray-800 font-medium tracking-wide">
                    @foreach($infos as $info)
                        {{ $info->sekilas_info }}
                        @if(!$loop->last) &nbsp;&nbsp;•&nbsp;&nbsp; @endif
                    @endforeach
                </marquee>
            </div>

        </div>
    </div>
@endif


    <br>

    <div class="w-[85%] mx-auto shadow-md rounded-2xl bg-white">
      <div class="flex flex-col md:flex-row gap-6 h-[600px] p-4">

        <!-- Carousel Konten Komunitas (Kiri) -->
        <div x-data="carousel()" class="w-[70%] relative overflow-hidden rounded-lg h-full shadow-lg">
          <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentIndex === index" class="relative w-full h-full transition-all duration-500 ease-in-out">
              <img :src="slide.image" alt="Slide Image"
                  class="w-full h-full object-cover rounded-lg" />
              <div class="absolute bottom-0 left-0 bg-black/50 text-white p-4 w-full">
                <h2 class="text-xl font-bold" x-text="slide.title"></h2>
              </div>
            </div>
          </template>

          <!-- Tombol navigasi -->
          <button @click="prev"
                  class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black/30 text-white px-3 py-1 rounded-r z-10 hover:bg-black/60">‹</button>
          <button @click="next"
                  class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black/30 text-white px-3 py-1 rounded-l z-10 hover:bg-black/60">›</button>
        </div>

        <!-- Konten Aktif (Kanan) -->
        @if($kontens->count())
          @php $utama = $kontens->first(); @endphp
          <div class="w-[30%] bg-yellow-600 text-white p-6 rounded-lg flex flex-col justify-between h-full shadow-lg">
            <div>
              <img src="{{ asset('storage/' . $utama->cover) }}"
                  class="rounded-md mb-4 h-64 w-full object-cover shadow" 
                  alt="Cover Konten">
              <h3 class="text-xl font-bold leading-snug break-words whitespace-normal">{{ $utama->judul }}</h3>
              <p class="text-sm mt-3 text-white/90 line-clamp-3">
                {{ \Illuminate\Support\Str::limit(strip_tags($utama->deskripsi), 120) }}
              </p>
            </div>
            <div class="mt-4">
              <a href="{{ route('user.berita.show', $utama->id) }}"
                class="inline-block bg-blue-600 text-white hover:bg-blue-800 text-yellow-800 font-semibold px-4 py-2 rounded hover:bg-yellow-300 transition">
                Selengkapnya →
              </a>
            </div>
          </div>
        @endif

      </div>
    </div><br>

    <div class="w-[85%] mx-auto shadow-md rounded-2xl p-1 bg-white">
    <section class="py-10 px-4">
      
    </section>
    </div>
    <br>

    <div class="w-[85%] mx-auto shadow-md rounded-2xl p-1 bg-white">
    <section id="peta" class="">
      <h2 class="text-3xl font-bold uppercase mb-4 text-center">Peta Desa</h2>
      <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>

      <!-- Container Peta -->
      <div id="map" class="w-[80%] h-96 rounded-lg shadow-md mx-auto"></div>
    </section>
    </div>
    <br><br><br><br>
    
  {{-- Footer (Only for regular users) --}}
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
    </div>

    <script>
      function carousel() {
          return {
              currentIndex: 0,
              slides: @json($slides), // <-- pastikan ini menghasilkan data valid
              prev() {
                  this.currentIndex = (this.currentIndex === 0) ? this.slides.length - 1 : this.currentIndex - 1;
              },
              next() {
                  this.currentIndex = (this.currentIndex === this.slides.length - 1) ? 0 : this.currentIndex + 1;
              }
          };
      }

      // Typing text
      const text = "SISTEM INFORMASI DESA BANJARSARI";
      const target = document.getElementById("typing-text");
      let index = 0;

      function typeWriter() {
          if (index < text.length) {
              target.innerHTML += text.charAt(index) === "\n" ? "<br>" : text.charAt(index);
              index++;
              setTimeout(typeWriter, 100); // Kecepatan ketik
          } else {
              setTimeout(() => {
                  target.innerHTML = ""; // Hapus tulisan
                  index = 0;             // Reset index
                  typeWriter();          // Mulai ulang
              }, 2000); // Jeda sebelum mengulang lagi (dalam ms)
          }
      }

      document.addEventListener("DOMContentLoaded", typeWriter);

      // Koordinat Banjarsari, Surakarta
      const desaLat = -7.559575;
      const desaLng = 110.822467;

      // Inisialisasi Peta
      const map = L.map('map').setView([desaLat, desaLng], 13); // zoom out

      // Layer OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);

      // Marker Desa
      L.marker([desaLat, desaLng])
        .addTo(map)
        .bindPopup('Ini lokasi Desa di Banjarsari, Surakarta.')
        .openPopup();
    </script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        footer a:hover {
            opacity: 0.8;
            transition: opacity 0.2s ease-in-out;
        }
    </style>
@endsection