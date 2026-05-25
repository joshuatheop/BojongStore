@extends('layouts.landing')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endpush

@section('content')

<section class="hero">
    <div class="container">
        <div class="hero-banner">
            <div class="hero-content">
                <h1 style="color: white;">PRODUK TERBAIK, LANGSUNG DARI JANTUNG DESA.</h1>
                <p style="color: white;">LEBIH DARI SEKADAR BELANJA. SETIAP PRODUK YANG ANDA BELI MEMBANTU PENGRAJIN DAN PETANI LOKAL
                    KITA UNTUK TERUS BERTUMBUH DI ERA DIGITAL.</p>
                <a href="{{ route('katalog') }}" class="btn-primary">BELANJA SEKARANG</a>
            </div>
            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&q=80&w=800"
                alt="Groceries" class="hero-image">
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kategori Pilihan</h2>
            <p>Temukan keajaiban lokal dalam berbagai varian.</p>
        </div>
        <div class="categories-grid">
            @foreach($categories as $category)
                <a href="{{ route('katalog', ['category' => $category->id]) }}" class="category-card">
                    <div class="category-icon">
                        @php
                            $icons = [
                                'Sayuran'          => 'sayuranlogo.png',
                                'Buah-buahan'      => 'buahlogo.png',
                                'Kerajinan Tangan' => 'kerajinanlogo.png',
                                'Makanan Olahan'   => 'makananlogo.png',
                                'Minuman'          => 'minumanlogo.png',
                                'Jasa'             => 'jasalogo.png',
                            ];
                            $icon = $icons[$category->name] ?? 'logo.png';
                        @endphp
                        <img src="{{ asset('images/' . $icon) }}" width="60" height="60" alt="{{ $category->name }}">
                    </div>
                    <h3>{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="products-section">
    <div class="container">
        <div class="section-title">
            <h2>PRODUK UNGGULAN</h2>
        </div>
        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                        <button class="wishlist-btn"><i data-lucide="bookmark" width="18" height="18"></i></button>
                    </div>
                    <div class="product-title">{{ $product->name }}</div>
                    <div class="product-weight">{{ $product->weight }}</div>
                    <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <a href="{{ route('product-detail', $product->slug) }}" class="btn-secondary"
                        style="text-decoration: none; text-align: center; display: block;">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-info">
                <div class="logo-wrapper footer-logo">
                    <span class="logo-text footer-logo-text">BojongStore</span>
                </div>
                <p class="footer-desc">Mendukung keberlanjutan ekonomi lokal Indonesia melalui digitalisasi UMKM
                    dengan cara yang elegan dan efisien.</p>
            </div>
            <div class="footer-column">
                <h4 class="footer-title">Kategori</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('katalog', ['category' => 1]) }}">Sayuran Segar</a></li>
                    <li><a href="{{ route('katalog', ['category' => 2]) }}">Buah-buahan</a></li>
                    <li><a href="{{ route('katalog', ['category' => 4]) }}">Makanan Olahan</a></li>
                    <li><a href="{{ route('katalog', ['category' => 5]) }}">Minuman</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4 class="footer-title">Bantuan</h4>
                <p class="footer-desc" style="margin-bottom: 16px;">Jika Anda mengalami kendala, silahkan hubungi
                    kami dengan mudah melalui tombol di bawah.</p>
                <button class="btn-footer" id="openHelpBtn">Bantuan</button>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 BojongStore. Mendukung UMKM Lokal Indonesia.
        </div>
    </div>
</footer>

<!-- Help Center Modal -->
<div class="help-modal-overlay" id="helpModal">
    <div class="help-modal-content">
        <button class="btn-help-close" id="closeHelpModal">
            <i data-lucide="x" width="18" height="18"></i>
        </button>

        <div id="helpFormState">
            <div class="help-modal-header">
                <i data-lucide="help-circle" width="32" height="32"></i>
                <h2>Pusat Bantuan</h2>
                <p>Punya keluhan atau pertanyaan? Kami siap membantu Anda.</p>
            </div>

            <form id="complaintForm">
                <div class="help-form-group">
                    <label for="helpName">Nama Lengkap</label>
                    <input type="text" id="helpName" class="help-input" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="help-form-group">
                    <label for="helpContact">Email / WhatsApp</label>
                    <input type="text" id="helpContact" class="help-input"
                        placeholder="Contoh: 0812xxxx atau email@mail.com" required>
                </div>
                <div class="help-form-group">
                    <label for="helpCategory">Kategori Keluhan</label>
                    <select id="helpCategory" class="help-select" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Produk">Masalah Produk</option>
                        <option value="Pengiriman">Masalah Pengiriman</option>
                        <option value="Pembayaran">Masalah Pembayaran</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="help-form-group">
                    <label for="helpMessage">Detail Keluhan</label>
                    <textarea id="helpMessage" class="help-textarea"
                        placeholder="Ceritakan kendala yang Anda alami..." required></textarea>
                </div>
                <button type="submit" class="btn-help-submit">
                    <span>Kirim Keluhan</span>
                    <i data-lucide="send" width="18" height="18"></i>
                </button>
            </form>
        </div>

        <div id="helpSuccessState" class="success-state">
            <i data-lucide="check-circle" width="64" height="64"></i>
            <h2>Berhasil Terkirim!</h2>
            <p>Terima kasih atas laporan Anda. Tim kami akan segera menindaklanjuti keluhan Anda melalui kontak yang
                tersedia.</p>
            <button class="btn-help-submit" style="margin-top: 32px;" onclick="closeHelpModal()">Tutup</button>
        </div>
    </div>
</div>

<script>
    // Wishlist Toggle
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            btn.classList.toggle('active');
            const icon = btn.querySelector('i');
            icon.setAttribute('fill', btn.classList.contains('active') ? 'currentColor' : 'none');
        });
    });

    // Help Modal
    const helpModal = document.getElementById('helpModal');
    const openHelpBtn = document.getElementById('openHelpBtn');
    const closeHelpBtn = document.getElementById('closeHelpModal');
    const complaintForm = document.getElementById('complaintForm');
    const helpFormState = document.getElementById('helpFormState');
    const helpSuccessState = document.getElementById('helpSuccessState');

    function openHelpModal() {
        helpModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeHelpModal() {
        helpModal.classList.remove('active');
        document.body.style.overflow = 'auto';
        setTimeout(() => {
            helpFormState.style.display = 'block';
            helpSuccessState.style.display = 'none';
            const submitBtn = complaintForm.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span>Kirim Keluhan</span><i data-lucide="send" width="18" height="18"></i>';
            submitBtn.disabled = false;
            complaintForm.reset();
            lucide.createIcons();
        }, 300);
    }

    if (openHelpBtn) openHelpBtn.addEventListener('click', openHelpModal);
    if (closeHelpBtn) closeHelpBtn.addEventListener('click', closeHelpModal);
    helpModal.addEventListener('click', (e) => { if (e.target === helpModal) closeHelpModal(); });

    complaintForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const submitBtn = complaintForm.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<span>Mengirim...</span>';
        submitBtn.disabled = true;
        setTimeout(() => {
            helpFormState.style.display = 'none';
            helpSuccessState.style.display = 'block';
            lucide.createIcons();
        }, 1500);
    });
</script>

@endsection