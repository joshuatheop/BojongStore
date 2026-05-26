@extends('layouts.landing')

@section('content')
<style>
/* Detail Page Styles */
.detail-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 100px 40px 40px; /* Adjusted padding-top for fixed header */
}

.detail-breadcrumb {
  font-size: 12px;
  color: var(--text-gray);
  margin-bottom: 30px;
  display: flex;
  gap: 8px;
  align-items: center;
}

.detail-breadcrumb a {
  color: var(--text-gray);
  text-decoration: none;
}

.detail-breadcrumb a:hover {
  color: var(--text-dark);
}

.detail-main {
  display: grid;
  grid-template-columns: 380px 1fr;
  gap: 50px;
  margin-bottom: 60px;
  position: relative;
}

/* Product Image */
.detail-image {
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--bg-light);
  border-radius: 12px;
  height: 380px;
  position: relative;
  overflow: hidden;
}

.detail-image img {
  max-width: 90%;
  max-height: 90%;
  object-fit: contain;
}

.detail-image-badge {
  position: absolute;
  top: 16px;
  left: 16px;
  width: 48px;
  height: 48px;
  background: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  color: var(--text-gray);
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  font-size: 20px;
}

/* Product Info */
.detail-info h1 {
  font-size: 24px;
  font-weight: 800;
  margin-bottom: 12px;
  color: var(--text-dark);
  line-height: 1.3;
}

.save-item-btn {
  position: absolute;
  top: -10px;
  left: 20px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
}

.save-item-btn img {
  width: 48px;
  height: 48px;
}

.detail-rating {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 16px;
  font-size: 14px;
}

.stars {
  color: #ffc107;
  font-size: 16px;
  letter-spacing: 2px;
}

.detail-price {
  font-size: 24px;
  font-weight: 800;
  color: var(--text-dark);
  margin-bottom: 20px;
}

.detail-divider {
  border-top: 1px solid var(--border);
  margin: 16px 0;
}

.detail-description {
  margin-bottom: 16px;
}

.detail-description-title {
  font-weight: 700;
  color: var(--text-dark);
  margin-bottom: 8px;
  font-size: 13px;
}

.detail-description-text {
  color: var(--text-gray);
  line-height: 1.5;
  font-size: 13px;
}

.detail-actions {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-top: 24px;
  max-width: 360px;
}

.detail-actions button, .detail-actions a {
  padding: 16px 32px;
  border: none;
  border-radius: 24px;
  font-weight: 700;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s;
  text-decoration: none;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
}

.btn-beli {
  background: #ff6b35;
  color: white;
}

.btn-beli:hover {
  background: #e55a28;
}

.btn-chat {
  background: var(--green-primary);
  color: white;
}

.btn-chat:hover {
  background: #2d5016;
}

/* Rating & Review Section */
.rating-section {
  margin-bottom: 40px;
}

.rating-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  border-bottom: 2px solid var(--border);
  padding-bottom: 16px;
}

.rating-header h2 {
  font-size: 16px;
  font-weight: 800;
  color: var(--text-dark);
}

.rating-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;
}

.rating-item {
  background: white;
  border-radius: 8px;
  padding: 16px;
  border: 1px solid var(--border);
}

.rating-item-name {
  font-weight: 700;
  color: var(--text-dark);
  font-size: 13px;
}

.rating-item-stars {
  color: #ffc107;
  font-size: 13px;
}

.rating-item-text {
  color: var(--text-gray);
  font-size: 13px;
  margin-top: 8px;
}

@media (max-width: 1024px) {
  .detail-main { grid-template-columns: 1fr; }
  .rating-grid { grid-template-columns: 1fr; }
}
</style>

<div class="detail-container">
  <!-- Breadcrumb -->
  <div class="detail-breadcrumb">
    <a href="{{ route('home') }}">Beranda</a>
    <span>></span>
    <a href="{{ route('katalog') }}">Produk</a>
    <span>></span>
    <span>{{ $product->name }}</span>
  </div>

  <!-- Main Product Detail -->
  <div class="detail-main">
    <!-- Product Image -->
    <div class="detail-image">
      <button class="save-item-btn" title="Simpan Item">
        <img src="{{ asset('assets/images/Container.png') }}" alt="Simpan">
      </button>
      <div class="detail-image-badge">📌</div>
      <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
    </div>

    <!-- Product Info -->
    <div class="detail-info">
      <h1>{{ $product->name }}</h1>
      
      <div class="detail-rating">
        <div class="stars">★★★★★</div>
        <span>4.5/5</span>
      </div>

      <div class="detail-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

      <div class="detail-divider"></div>

      <div class="detail-description">
        <div class="detail-description-text">{{ $product->description }}</div>
      </div>

      <div class="detail-actions">
        <button class="btn-beli">
          <img src="{{ asset('assets/images/Vector.png') }}" alt="Shopee" style="width: 20px; height: 20px;">
          Beli Di Shopee
        </button>
        <a href="https://wa.me/6281312821849" class="btn-chat">
          <img src="{{ asset('assets/images/ic_baseline-whatsapp.png') }}" alt="WhatsApp" style="width: 20px; height: 20px;">
          Chat Penjual
        </a>
      </div>
    </div>
  </div>

  <!-- Rating & Review Section -->
  <div class="rating-section">
    <div class="rating-header">
      <h2>Rating & Ulasan</h2>
    </div>

    <div class="rating-grid">
        <div class="rating-item">
          <div class="rating-item-name">Riky A <span style="color: #3a7d44">✓</span></div>
          <div class="rating-item-stars">★★★★★</div>
          <div class="rating-item-text">Rendang daging sapi ini sangat lezat dan authentic. Rasa bumbu yang kompleks terasa sempurna.</div>
        </div>
        <div class="rating-item">
          <div class="rating-item-name">Ardi F <span style="color: #3a7d44">✓</span></div>
          <div class="rating-item-stars">★★★★★</div>
          <div class="rating-item-text">Produk berkualitas tinggi. Cocok banget buat pengambilan acara keluarga. Packaging rapi dan aman.</div>
        </div>
    </div>
  </div>
</div>
@endsection