@extends('layouts.landing')

@section('content')
<!-- ===== HERO ===== -->
<section class="hero" id="hero">
  <div class="hero-container">

    <!-- Left: Copy -->
    <div class="hero-content">
      <h1>
        Dukung <span class="highlight-italic">UMKM</span><br>
        <span class="highlight-italic">Lokal</span> Tumbuh<br>
        Lebih Jauh
      </h1>
      <p>
        Temukan berbagai produk unggulan dari usaha lokal,
        mulai dari makanan, hingga kebutuhan sehari-hari semua
        dalam satu platform digital!
      </p>
      <a href="{{ route('katalog') }}" class="btn btn-primary" id="btnMulaiBelanja" style="padding:12px 26px;font-size:14px;border-radius:10px;">
        Mulai Belanja
      </a>

      <!-- Stats -->
      <div class="hero-stats">
        <div class="stat-avatars">
          <div class="avatar" style="background:#ffccbc;color:#bf360c;">R</div>
          <div class="avatar" style="background:#c8e6c9;color:#1b5e20;">S</div>
          <div class="avatar" style="background:#bbdefb;color:#0d47a1;">D</div>
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
      <div class="hero-floating-badge" id="heroBadge">
        <div class="badge-icon">
          <img src="{{ asset('images/logo_pot.png') }}" alt="BojongStore" style="width:24px;height:24px;object-fit:contain;">
        </div>
        <div class="badge-text">
          <strong>Produk Terlaris</strong>
          Rendang Kemasan, baru saja terjual 42 menit lalu!
        </div>
      </div>
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
      <div class="testi-card">
        <div class="testi-quote">"</div>
        <p class="testi-text">
          "Dulu jualan cuma di sekitar rumah. Sejak masuk BojongStore, produk saya sudah mulai ditemukan, dan banyak yang tanya-tanya order lewat WhatsApp."
        </p>
        <div class="testi-author">
          <div class="author-avatar" style="background:#c8e6c9;color:#2e7d32;">IJ</div>
          <div>
            <div class="author-name">Ibu Ani</div>
            <div class="author-role">Penjual Sayuran Organik</div>
          </div>
        </div>
      </div>

      <div class="testi-card featured">
        <div class="testi-quote">"</div>
        <p class="testi-text">
          "Lewat BojongStore, pembeli bisa lihat foto produk lengkap dan langsung checkout. Jadi lebih praktis dan penjualan ikut meningkat."
        </p>
        <div class="testi-author">
          <div class="author-avatar" style="background:#ffe0b2;color:#e65100;">PR</div>
          <div>
            <div class="author-name">Pak Rudi</div>
            <div class="author-role">Pedagang Buah Lokal</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
