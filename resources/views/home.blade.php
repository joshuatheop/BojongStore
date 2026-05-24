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


<!-- ===== KATEGORI PILIHAN ===== -->
<section class="section categories" id="kategori">
  <div class="section-container">
    <div class="section-header">
      <div>
        <h2 class="section-title">Kategori Pilihan</h2>
        <p class="section-sub">Temukan kebutuhan dari berbagai jenis pilihan</p>
      </div>
      <a href="{{ route('katalog') }}" class="see-all">
        Lihat Semua
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
      </a>
    </div>

    <div class="category-grid">
      <a href="{{ route('katalog', ['category' => 1]) }}" class="category-card">
        <div class="cat-icon green">🥬</div>
        <div class="cat-name">Sayuran</div>
        <div class="cat-count">Hijau &amp; Organik</div>
      </a>
      <a href="{{ route('katalog', ['category' => 2]) }}" class="category-card">
        <div class="cat-icon orange">🍊</div>
        <div class="cat-name">Buah</div>
        <div class="cat-count">Lokal &amp; Segar</div>
      </a>
      <a href="{{ route('katalog', ['category' => 4]) }}" class="category-card">
        <div class="cat-icon brown">🍲</div>
        <div class="cat-name">Makanan</div>
        <div class="cat-count">Produk olahan</div>
      </a>
      <a href="{{ route('katalog', ['category' => 5]) }}" class="category-card">
        <div class="cat-icon blue">🥤</div>
        <div class="cat-name">Minuman</div>
        <div class="cat-count">Segar &amp; Lokal</div>
      </a>
    </div>
  </div>
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
