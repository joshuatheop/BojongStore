{{-- resources/views/katalog.blade.php --}}
@extends('layouts.landing')
@section('content')

<style>
    :root {
        --green: #00923F;
        --green-dark: #007a34;
        --green-light: #e8f5ee;
        --text-dark: #1a1a1a;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --card-shadow: 0 2px 12px rgba(0,0,0,0.07);
        --card-shadow-hover: 0 8px 32px rgba(0,146,63,0.13);
    }

    .katalog-wrapper {
        padding-top: 100px;
        min-height: 100vh;
        background: #ffffff;
    }

    /* Search Bar */
    .search-section {
        background: white;
        border-bottom: 1px solid var(--border);
        padding: 18px 0 16px;
        position: sticky;
        top: 64px;
        z-index: 100;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .search-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .search-select {
        border: 1.5px solid var(--border);
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 14px;
        color: var(--text-dark);
        background: white;
        cursor: pointer;
        min-width: 180px;
        outline: none;
        transition: border-color 0.2s;
        font-family: 'Poppins', sans-serif;
    }
    .search-select:focus { border-color: var(--green); }

    .search-input-wrap {
        flex: 1;
        display: flex;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        overflow: hidden;
        background: white;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .search-input-wrap:focus-within {
        border-color: var(--green);
        box-shadow: 0 0 0 3px rgba(0,146,63,0.10);
    }

    .search-input {
        flex: 1;
        border: none;
        outline: none;
        padding: 10px 16px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        color: var(--text-dark);
    }
    .search-input::placeholder { color: #adb5bd; }

    .search-btn {
        background: var(--green);
        color: white;
        border: none;
        padding: 10px 28px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: background 0.2s;
        font-family: 'Poppins', sans-serif;
        letter-spacing: 0.3px;
    }
    .search-btn:hover { background: var(--green-dark); }

    /* Main content */
    .katalog-main {
        max-width: 1200px;
        margin: 0 auto;
        padding: 32px 24px 64px;
    }

    /* Result header */
    .result-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    .result-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-dark);
    }

    .result-title span {
        color: var(--green);
    }

    .result-count {
        font-size: 13px;
        color: var(--text-muted);
        background: var(--green-light);
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 500;
    }

    /* Product Grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    @media (max-width: 1024px) {
        .product-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 768px) {
        .product-grid { grid-template-columns: repeat(2, 1fr); }
        .search-select { min-width: 130px; }
    }
    @media (max-width: 480px) {
        .product-grid { grid-template-columns: repeat(1, 1fr); }
        .search-inner { flex-wrap: wrap; }
        .search-select { width: 100%; }
    }

    /* Product Card */
    .product-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        transition: transform 0.22s ease, box-shadow 0.22s ease;
        border: 1.5px solid transparent;
    }
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--card-shadow-hover);
        border-color: var(--green-light);
        text-decoration: none;
        color: inherit;
    }

    .card-img-wrap {
        width: 100%;
        aspect-ratio: 1 / 1;
        background: #f0f4f2;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 16px;
    }
    .card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .product-card:hover .card-img-wrap img {
        transform: scale(1.05);
    }

    .card-body {
        padding: 14px 16px 16px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .card-name {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 2px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-weight {
        font-size: 12px;
        color: var(--text-muted);
        margin-bottom: 8px;
    }

    .card-price {
        font-size: 15px;
        font-weight: 700;
        color: var(--green);
        margin-bottom: 10px;
    }

    .card-stars {
        display: flex;
        gap: 2px;
        margin-bottom: 12px;
    }
    .star { font-size: 13px; }
    .star.filled { color: #f59e0b; }
    .star.empty { color: #d1d5db; }

    .card-btn {
        display: block;
        width: 100%;
        background: var(--green);
        color: white;
        text-align: center;
        padding: 9px 0;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
        margin-top: auto;
        font-family: 'Poppins', sans-serif;
    }
    .card-btn:hover {
        background: var(--green-dark);
        color: white;
        text-decoration: none;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 80px 24px;
        color: var(--text-muted);
    }
    .empty-icon {
        font-size: 56px;
        margin-bottom: 16px;
        opacity: 0.4;
    }
    .empty-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
    }
    .empty-sub {
        font-size: 14px;
    }

    /* Pagination */
    .pagination-wrap {
        margin-top: 40px;
        display: flex;
        justify-content: center;
    }
    .pagination-wrap nav span,
    .pagination-wrap nav a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        margin: 0 2px;
        text-decoration: none;
        transition: all 0.2s;
        border: 1.5px solid var(--border);
        color: var(--text-dark);
        background: white;
    }
    .pagination-wrap nav a:hover {
        border-color: var(--green);
        color: var(--green);
    }
    .pagination-wrap nav span[aria-current] {
        background: var(--green);
        color: white;
        border-color: var(--green);
    }
</style>

<div class="katalog-wrapper">

    {{-- Search Bar --}}
    <div class="search-section">
        <div class="search-inner">
            <form method="GET" action="{{ route('katalog') }}" style="display:flex;gap:12px;width:100%;align-items:center;">
                <select name="category" class="search-select">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="search-input-wrap">
                    <input
                        type="text"
                        name="search"
                        value="{{ $query ?? request('search') }}"
                        class="search-input"
                        placeholder="Cari Produk..."
                        autofocus
                    >
                    <button type="submit" class="search-btn">Cari</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Main --}}
    <div class="katalog-main">

        {{-- Result header --}}
        <div class="result-header">
            <div class="result-title">
                @if(isset($query) && $query)
                    Hasil untuk "<span>{{ $query }}</span>"
                @else
                    Semua Produk
                @endif
            </div>
            <div class="result-count">{{ $products->total() }} produk</div>
        </div>

        {{-- Grid --}}
        @if($products->count() > 0)
        <div class="product-grid">
            @foreach($products as $product)
            <a href="{{ route('product-detail', $product->slug) }}" class="product-card">
                <div class="card-img-wrap">
                    <img
                        src="{{ $product->image ? asset($product->image) : 'https://placehold.co/400x400/e8f5ee/00923F?text=' . urlencode($product->name) }}"
                        alt="{{ $product->name }}"
                        loading="lazy"
                    >
                </div>
                <div class="card-body">
                    <div class="card-name">{{ $product->name }}</div>
                    <div class="card-weight">1kg</div>
                    <div class="card-price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                    <div class="card-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star {{ $i <= 4 ? 'filled' : 'empty' }}">★</span>
                        @endfor
                    </div>
                    <span class="card-btn">Lihat Detail</span>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <div class="empty-icon">🔍</div>
            <div class="empty-title">Produk tidak ditemukan</div>
            <div class="empty-sub">Coba kata kunci yang berbeda atau lihat semua produk</div>
        </div>
        @endif

        {{-- Pagination --}}
        <div class="pagination-wrap">
            {{ $products->links() }}
        </div>

    </div>
</div>

@endsection