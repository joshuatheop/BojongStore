<?php
include 'includes/db.php';
include 'includes/header.php';
$kategori = $_GET['kategori'] ?? '';
$query    = $_GET['q'] ?? '';

// Dummy produk data
$produk = [
  ['id'=>1,'nama'=>'Kangkung Organik','harga'=>5000,'kategori'=>'sayuran','emoji'=>'🥬','toko'=>'Bu Ani'],
  ['id'=>2,'nama'=>'Bayam Hijau Segar','harga'=>4000,'kategori'=>'sayuran','emoji'=>'🌿','toko'=>'Pak Sari'],
  ['id'=>3,'nama'=>'Jeruk Mandarin','harga'=>15000,'kategori'=>'buah','emoji'=>'🍊','toko'=>'Pak Rudi'],
  ['id'=>4,'nama'=>'Pisang Kepok','harga'=>8000,'kategori'=>'buah','emoji'=>'🍌','toko'=>'Bu Lastri'],
  ['id'=>5,'nama'=>'Tempe Goreng','harga'=>7000,'kategori'=>'makanan','emoji'=>'🍱','toko'=>'Bu Santi'],
  ['id'=>6,'nama'=>'Keripik Singkong','harga'=>10000,'kategori'=>'makanan','emoji'=>'🍟','toko'=>'Mba Rina'],
  ['id'=>7,'nama'=>'Jus Alpukat','harga'=>12000,'kategori'=>'minuman','emoji'=>'🥑','toko'=>'Mba Desy'],
  ['id'=>8,'nama'=>'Es Teh Manis','harga'=>5000,'kategori'=>'minuman','emoji'=>'🍵','toko'=>'Pak Budi'],
];

// Filter
$filtered = array_filter($produk, function($p) use ($kategori, $query) {
  $matchKat = $kategori ? $p['kategori'] === $kategori : true;
  $matchQ   = $query    ? stripos($p['nama'], $query) !== false : true;
  return $matchKat && $matchQ;
});
?>

<style>
.produk-page { padding: 48px 40px; max-width: 1100px; margin: 0 auto; }
.produk-page h1 { font-size: 22px; font-weight: 800; margin-bottom: 8px; }
.produk-page .sub { font-size: 13px; color: var(--text-gray); margin-bottom: 32px; }
.filter-tags { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 32px; }
.filter-tag { padding: 6px 16px; border-radius: 20px; border: 1.5px solid var(--border); font-size: 13px; font-weight: 600; cursor: pointer; transition: all 0.2s; color: var(--text-gray); }
.filter-tag:hover, .filter-tag.active { background: var(--green-primary); color: white; border-color: var(--green-primary); }
.produk-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.produk-card { border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden; transition: all 0.25s; background: white; }
.produk-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.produk-card .prod-thumb { height: 140px; background: var(--bg-light); display: flex; align-items: center; justify-content: center; font-size: 56px; }
.produk-card .prod-info { padding: 14px; }
.produk-card .prod-name { font-weight: 700; font-size: 14px; margin-bottom: 4px; }
.produk-card .prod-toko { font-size: 12px; color: var(--text-gray); margin-bottom: 8px; }
.produk-card .prod-price { font-size: 15px; font-weight: 800; color: var(--green-primary); }
.no-result { text-align: center; padding: 60px 20px; color: var(--text-gray); }
.no-result .icon { font-size: 48px; margin-bottom: 12px; }
</style>

<div class="produk-page">
  <h1>
    <?php if ($query): ?>Hasil pencarian "<?= htmlspecialchars($query) ?>"
    <?php elseif ($kategori): ?>Produk <?= ucfirst(htmlspecialchars($kategori)) ?>
    <?php else: ?>Semua Produk<?php endif; ?>
  </h1>
  <p class="sub"><?= count($filtered) ?> produk ditemukan dari mitra UMKM kami</p>

  <div class="filter-tags">
    <a href="produk.php" class="filter-tag <?= !$kategori ? 'active' : '' ?>">Semua</a>
    <a href="produk.php?kategori=sayuran" class="filter-tag <?= $kategori==='sayuran' ? 'active' : '' ?>">🥬 Sayuran</a>
    <a href="produk.php?kategori=buah"    class="filter-tag <?= $kategori==='buah' ? 'active' : '' ?>">🍊 Buah</a>
    <a href="produk.php?kategori=makanan" class="filter-tag <?= $kategori==='makanan' ? 'active' : '' ?>">🍲 Makanan</a>
    <a href="produk.php?kategori=minuman" class="filter-tag <?= $kategori==='minuman' ? 'active' : '' ?>">🥤 Minuman</a>
  </div>

  <?php if (empty($filtered)): ?>
    <div class="no-result">
      <div class="icon">🔍</div>
      <p>Produk tidak ditemukan. Coba kata kunci lain.</p>
    </div>
  <?php else: ?>
    <div class="produk-grid">
      <?php foreach ($filtered as $p): ?>
        <div class="produk-card">
          <div class="prod-thumb"><?= $p['emoji'] ?></div>
          <div class="prod-info">
            <div class="prod-name"><?= htmlspecialchars($p['nama']) ?></div>
            <div class="prod-toko">by <?= htmlspecialchars($p['toko']) ?></div>
            <div class="prod-price">Rp <?= number_format($p['harga'],0,',','.') ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
