<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BojongStore - {{ $product->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="#1B5E20"/>
                    <path d="M2 17L12 22L22 17" stroke="#1B5E20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="#1B5E20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>BOJONGSTORE</span>
            </div>
            <nav class="nav-links">
                <a href="#">Beranda</a>
                <a href="#" class="active">Produk</a>
            </nav>
            <div class="search-bar">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                <input type="text" placeholder="Cari produk...">
            </div>
            <div class="user-actions">
                <button class="icon-btn favorite-toggle-header" data-product-id="{{ $product->id }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="{{ $isFavorited ? '#1B5E20' : 'none' }}" stroke="{{ $isFavorited ? '#1B5E20' : 'currentColor' }}" stroke-width="2">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                </button>
                <button class="icon-btn profile-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="breadcrumb">
            Beranda > Produk > Produk Unggulan > {{ $product->name }}
        </div>

        <section class="product-details">
            <div class="product-gallery">
                <div class="main-image">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://placehold.co/400x300/e0e0e0/666?text=Rendang+Image' }}" alt="{{ $product->name }}">
                    <button class="favorite-toggle main-favorite" data-product-id="{{ $product->id }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="{{ $isFavorited ? '#333' : 'none' }}" stroke="#333" stroke-width="2">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>
                <div class="product-rating">
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="#FFC107" stroke="#FFC107" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @endfor
                    </div>
                    <span class="rating-text">5/5</span>
                </div>
                <div class="product-price">Rp. {{ number_format($product->price, 0, ',', '.') }}</div>
                
                <p class="product-description">{{ $product->description }}</p>
                
                <div class="product-meta">
                    <p>Berat Bersih: {{ $product->weight }}</p>
                    <p>Jenis: {{ $product->type }}</p>
                    <p>Kemasan: {{ $product->packaging }}</p>
                    <p>Daya Tahan: {{ $product->shelf_life }}</p>
                    <p>Produksi: {{ $product->producer }}</p>
                </div>

                <div class="purchase-options">
                    <p class="purchase-label">Pilih Metode Pembelian</p>
                    <button class="btn btn-primary btn-shopee">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M16 6v-2c0-2.2-1.8-4-4-4s-4 1.8-4 4v2h-5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-14h-5zm-6-2c0-1.1.9-2 2-2s2 .9 2 2v2h-4v-2z"/></svg>
                        Beli Di Shopee
                    </button>
                    <button class="btn btn-secondary btn-whatsapp">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        Chat Penjual
                    </button>
                </div>
            </div>
        </section>

        <!-- Reviews Section -->
        <section class="reviews-section">
            <div class="reviews-tabs">
                <button class="tab active">Rating & Ulasan</button>
            </div>

            <div class="reviews-header">
                <h2 class="reviews-title">Semua Ulasan <span class="reviews-count" id="total-ulasan">({{ $totalUlasan }})</span></h2>
                <div class="reviews-actions">
                    <button class="icon-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg></button>
                    <select class="sort-select">
                        <option>Terbaru</option>
                    </select>
                    <button class="btn btn-dark btn-beri-ulasan" id="open-review-modal">Beri Ulasan</button>
                </div>
            </div>

            <div class="reviews-grid" id="reviews-container" data-product-id="{{ $product->id }}">
                @foreach ($ulasans as $ulasan)
                <div class="review-card">
                    <div class="review-header">
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="{{ $i <= $ulasan->rating ? '#FFC107' : 'none' }}" stroke="#FFC107" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            @endfor
                        </div>
                        <button class="more-options"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg></button>
                    </div>
                    <div class="user-info">
                        <strong>{{ $ulasan->user->name }}</strong>
                        <svg class="verified-icon" width="14" height="14" viewBox="0 0 24 24" fill="#4CAF50"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    </div>
                    <p class="review-text">"{{ $ulasan->review_text }}"</p>
                    <div class="review-date">Ditulis pada {{ \Carbon\Carbon::parse($ulasan->created_at)->translatedFormat('d F Y') }}</div>
                </div>
                @endforeach
            </div>

            @if ($ulasans->hasMorePages())
                <div class="load-more-container">
                    <button class="btn btn-outline" id="load-more-btn" data-next-page="2">Muat Lebih Banyak</button>
                </div>
            @endif
        </section>
    </main>

    <!-- Review Modal Overlay -->
    <div class="modal-overlay" id="review-modal">
        <div class="modal-content">
            <h3 class="modal-title">Berikan Ulasan Anda</h3>
            <div class="modal-user">
                <div class="user-avatar">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <strong>{{ Auth::user() ? Auth::user()->name : 'Anda' }}</strong>
            </div>
            <form id="review-form">
                <div class="rating-input">
                    <label>RATING PRODUK</label>
                    <div class="star-rating" id="star-rating-input">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg data-rating="{{ $i }}" width="24" height="24" viewBox="0 0 24 24" fill="#FFC107" stroke="#FFC107" stroke-width="1.5" class="star-interactive"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating-val" value="5" required>
                </div>
                <div class="text-input">
                    <label>ULASAN ANDA</label>
                    <textarea name="review_text" id="review_text" rows="4" placeholder="Tulis ulasan Anda di sini..." required></textarea>
                </div>
                <div class="modal-actions">
                    <button type="submit" class="btn btn-primary" id="submit-review-btn">Kirim Ulasan</button>
                </div>
            </form>
            <button class="close-modal" id="close-review-modal"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h4>BojongStore</h4>
                <p>Mendukung keberlanjutan ekonomi lokal Indonesia melalui digitalisasi UMKM dengan cara yang elegan dan efisien.</p>
            </div>
            <div class="footer-column">
                <h4>Kategori</h4>
                <ul>
                    <li><a href="#">Sayuran Segar</a></li>
                    <li><a href="#">Buah Tropis</a></li>
                    <li><a href="#">Makanan Siap Saji</a></li>
                    <li><a href="#">Minuman</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Bantuan</h4>
                <p>Jika Anda mengalami kendala, silahkan hubungi kami dengan mudah melalui tombol di bawah.</p>
                <button class="btn btn-dark btn-bantuan">Bantuan</button>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} BojongStore. Mendukung UMKM Lokal Indonesia.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
