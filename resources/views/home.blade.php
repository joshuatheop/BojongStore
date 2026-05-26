@extends('layouts.landing')

@section('content')
  <!-- ===== HERO ===== -->
  <section class="hero" id="hero">
    <div class="hero-container">

      <!-- Left: Copy -->
      <div class="hero-content">
        <h1>
          Dukung <span class="highlight-italic">UMKM</span><br>
          <span class="highlight-italic">Lokal </span> Tumbuh<br>
          Lebih Jauh
        </h1>
        <p>
          Temukan berbagai produk unggulan dari usaha lokal,
          mulai dari makanan, hingga kebutuhan sehari-hari semua
          dalam satu platform digital!
        </p>
        <a href="{{ route('katalog') }}" class="btn btn-primary" id="btnMulaiBelanja"
          style="padding:12px 26px;font-size:14px;border-radius:10px;">
          Mulai Belanja
        </a>

        <!-- Stats -->
        <div class="hero-stats">
          <div class="stat-avatars">
            <div class="avatar" style="background:#ffccbc;color:#bf360c;">J</div>
            <div class="avatar" style="background:#c8e6c9;color:#1b5e20;">T</div>
            <div class="avatar" style="background:#bbdefb;color:#0d47a1;">P</div>
            <div class="avatar-plus">+20</div>
          </div>
          <div class="stat-info">
            <strong>20+ UMKM</strong>
            Telah Bergabung &amp; Berkembang
          </div>
        </div>
      </div><!-- /.hero-content -->

      <!-- Right: Avatars Visual -->
      <div class="hero-visual">
        <div class="hero-char char-girl">
          <img src="{{ asset('images/char2.png') }}" alt="UMKM Seller">
        </div>
        <div class="hero-char char-mustache">
          <img src="{{ asset('images/char1.png') }}" alt="UMKM Seller">
        </div>
        <div class="hero-char char-dark">
          <img src="{{ asset('images/char_dark.png') }}" alt="UMKM Seller">
        </div>

        <!-- Floating Badge -->
        @if($mostViewedProduct)
          <div class="hero-floating-badge" id="heroBadge">
            <div class="badge-icon">
              <img src="{{ asset('images/logo_pot.png') }}" alt="BojongStore">
            </div>
            <div class="badge-text">
              <strong>Produk Terpopuler</strong>
              {{ $mostViewedProduct->name }}, telah dilihat sebanyak {{ $mostViewedProduct->views }} kali
            </div>
          </div>
        @endif
      </div><!-- /.hero-visual -->
    </div><!-- /.hero-container -->
  </section>

  <!-- ===== TESTIMONI ===== -->
  <section class="section testimonials" id="testimonials">
    <div class="section-container">
      <div class="section-header">
        <h2 class="section-title">Cerita Sukses <span class="highlight-italic">Mitra Kami</span></h2>
        <p class="section-sub">Bukan sekedar Tumpukan tapi ini adalah cerita yang terjadi beneran!</p>
      </div>

      <div class="testi-grid">
        <!-- Card 1 -->
        <div class="testi-card blue-card">
          <p class="testi-text">
            "Dulu jualan cuma di sekitar rumah. Setelah masuk BojongStore, produk saya lebih mudah ditemukan, dan banyak
            yang langsung order lewat WhatsApp. Sekarang pesanan datang dari luar daerah."
          </p>
          <div class="testi-author">
            <div class="author-avatar">
              <img src="{{ asset('images/ibu_ani_avatar.png') }}" alt="Ibu Ani">
            </div>
            <div>
              <div class="author-name">Ibu Ani</div>
              <div class="author-role">Pemilik Cimol Bojot</div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="testi-card yellow-card">
          <p class="testi-text">
            "Awalnya bingung promosi online. Lewat BojongStore, pembeli bisa lihat produk lalu langsung checkout via
            Shopee. Jadi lebih praktis dan penjualan ikut meningkat."
          </p>
          <div class="testi-author">
            <div class="author-avatar">
              <img src="{{ asset('images/pak_budi_avatar.png') }}" alt="Pak Budi">
            </div>
            <div>
              <div class="author-name">Pak Budi</div>
              <div class="author-role">Penjual Rendang Kemasan</div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="testi-card gray-card">
          <p class="testi-text">
            "Sebelumnya hanya dijual ke lingkungan sekitar. Setelah masuk BojongStore, produk saya punya etalase digital
            dan banyak pembeli order lewat WhatsApp."
          </p>
          <div class="testi-author">
            <div class="author-avatar">
              <img src="{{ asset('images/mas_danu_avatar.png') }}" alt="Mas Danu">
            </div>
            <div>
              <div class="author-name">Mas Danu</div>
              <div class="author-role">Penjual Basreng Kemasan</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== ABOUT ===== -->
  <section class="section about" id="about">
    <div class="about-card-container">
      <span class="about-subtitle">MENGENAL KAMI</span>
      <h2 class="about-title">Tentang BojongStore</h2>

      <p class="about-desc">
        BojongStore adalah platform digital yang dikembangkan mahasiswa untuk membantu UMKM di Bojongsoang mempromosikan
        produk mereka secara lebih luas. Website ini menyediakan katalog digital berisi informasi produk lengkap dan
        tampilan menarik, sehingga memudahkan pengguna dalam mencari dan memilih produk.
      </p>

      <p class="about-desc">
        Selain itu, BojongStore menawarkan kemudahan transaksi melalui WhatsApp atau marketplace seperti Shopee. Platform
        ini tidak hanya menjadi media promosi, tetapi juga menjembatani UMKM dengan pasar yang lebih luas, guna
        meningkatkan visibilitas, penjualan, dan pertumbuhan ekonomi lokal.
      </p>

      <div class="about-badges">
        <!-- Badge 1 -->
        <div class="about-badge-item">
          <div class="badge-icon-wrap bg-green">
            <i data-lucide="handshake" width="20" height="20"></i>
          </div>
          <span class="badge-label">Mendukung UMKM Lokal</span>
        </div>

        <!-- Badge 2 -->
        <div class="about-badge-item">
          <div class="badge-icon-wrap bg-blue">
            <i data-lucide="monitor-smartphone" width="20" height="20"></i>
          </div>
          <span class="badge-label">Digitalisasi Usaha</span>
        </div>

        <!-- Badge 3 -->
        <div class="about-badge-item">
          <div class="badge-icon-wrap bg-yellow">
            <i data-lucide="trending-up" width="20" height="20"></i>
          </div>
          <span class="badge-label">Pertumbuhan Ekonomi</span>
        </div>
      </div>

      <div class="about-divider"></div>

      <p class="about-footer-text">
        "Dikembangkan oleh tim mahasiswa Telkom University sebagai bagian dari proyek pengembangan perangkat lunak."
      </p>
    </div>
  </section>
@endsection