<?php
// BojongStore - Header Include
// Fetch user data if logged in
$user = null;
if (isset($_SESSION['user_id']) && function_exists('get_defined_vars')) {
    global $pdo;
    if ($pdo) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BojongStore - Dukung UMKM Lokal Tumbuh Lebih Jauh</title>
  <meta name="description" content="BojongStore adalah platform digital yang dikembangkan mahasiswa untuk membantu UMKM di Bojongsoang. Temukan berbagai produk unggulan dari sekitar anda.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar" id="navbar">
  <a href="index.php" class="navbar-brand">
    <div class="brand-icon">
      <img src="assets/images/logo_tree.png" alt="BojongStore Logo">
    </div>
    BOJONGSTORE
  </a>

  <nav class="navbar-nav">
    <a href="index.php" class="active">Beranda</a>
    <a href="produk.php">Produk</a>
  </nav>

  <div class="navbar-search">
    <span class="search-icon">
      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
      </svg>
    </span>
    <input type="text" id="searchInput" placeholder="Cari produk..." autocomplete="off">
  </div>

  <div class="navbar-actions">
    <?php if (isset($_SESSION['user_id'])): ?>
      <!-- User sudah login - Avatar Style -->
      <div class="navbar-user-section">
        <!-- Wishlist/Bookmark Button -->
        <a href="#" class="navbar-icon-btn" title="Wishlist">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="none">
            <path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"/>
          </svg>
        </a>

        <!-- Profile Avatar Button -->
        <a href="profile.php" class="navbar-avatar-btn" title="Profil Saya">
          <?php 
          $fotoPath = !empty($user['foto']) ? 'assets/uploads/' . htmlspecialchars($user['foto']) : 'assets/images/default-avatar.svg';
          $userExists = isset($user) && !empty($user['foto']);
          ?>
          <?php if ($userExists && !empty($user['foto'])): ?>
            <img src="<?= $fotoPath ?>" alt="<?= htmlspecialchars($_SESSION['user_name']) ?>" class="avatar-image">
          <?php else: ?>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="8" r="4"/><path d="M6 21v-2a4 4 0 014-4h4a4 4 0 014 4v2"/>
            </svg>
          <?php endif; ?>
        </a>

        <!-- Logout Button -->
        <a href="logout.php" class="navbar-logout-btn" title="Logout">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/>
          </svg>
        </a>
      </div>
    <?php else: ?>
      <!-- User belum login -->
      <a href="register.php" class="btn btn-outline" id="btnSignUp">Sign Up</a>
      <a href="login.php" class="btn btn-primary" id="btnLogin">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/>
        </svg>
        Log In
      </a>
    <?php endif; ?>
  </div>
</nav>
