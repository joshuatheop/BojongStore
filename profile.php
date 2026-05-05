<?php
include 'includes/db.php';

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch user data
$user = null;
if ($pdo) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
}

// Handle profile update
$successMsg = '';
$errorMsg   = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_profile') {
    // Verify CSRF token
    if (!verifyCSRFToken($_POST['csrf_token'] ?? '')) {
        $errorMsg = 'Validasi keamanan gagal. Silakan coba lagi.';
    } else {
    $nama    = trim($_POST['nama'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $telepon = trim($_POST['telepon'] ?? '');
    $negara  = trim($_POST['negara'] ?? '');
    $newPass = trim($_POST['new_password'] ?? '');
    $fotoFile = null;

    // Validation
    if (empty($nama)) {
        $errorMsg = 'Nama tidak boleh kosong.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = 'Format email tidak valid.';
    } elseif ($newPass !== '' && strlen($newPass) < 6) {
        $errorMsg = 'Password baru minimal 6 karakter.';
    } else {
        // Check if email already used by another user
        $checkEmail = $pdo->prepare('SELECT id FROM users WHERE email = ? AND id != ?');
        $checkEmail->execute([$email, $_SESSION['user_id']]);
        if ($checkEmail->fetch()) {
            $errorMsg = 'Email ini sudah digunakan oleh user lain.';
        } else {
            try {
                // Handle file upload
                $fotoFile = $user['foto']; // Keep existing if no new upload
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $file = $_FILES['avatar'];
                    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                    $filename = basename($file['name']);
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    
                    if (in_array($ext, $allowed)) {
                        $maxSize = 5 * 1024 * 1024; // 5MB
                        if ($file['size'] <= $maxSize) {
                            // Create unique filename
                            $newFilename = 'avatar_' . $_SESSION['user_id'] . '_' . time() . '.' . $ext;
                            $uploadPath = 'assets/uploads/' . $newFilename;
                            
                            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                                // Delete old file if exists
                                if (!empty($user['foto']) && file_exists($user['foto']) && strpos($user['foto'], 'avatar_') !== false) {
                                    unlink($user['foto']);
                                }
                                $fotoFile = $uploadPath;
                            } else {
                                $errorMsg = 'Gagal mengupload file. Silakan coba lagi.';
                            }
                        } else {
                            $errorMsg = 'Ukuran file terlalu besar (max 5MB).';
                        }
                    } else {
                        $errorMsg = 'Format file tidak didukung. Gunakan JPG, PNG, atau GIF.';
                    }
                }
                
                if (!$errorMsg) {
                    if ($newPass !== '') {
                        $hashed = password_hash($newPass, PASSWORD_DEFAULT);
                        $stmt = $pdo->prepare('UPDATE users SET nama=?, email=?, telepon=?, negara=?, foto=?, password=? WHERE id=?');
                        $stmt->execute([$nama, $email, $telepon, $negara, $fotoFile, $hashed, $_SESSION['user_id']]);
                    } else {
                        $stmt = $pdo->prepare('UPDATE users SET nama=?, email=?, telepon=?, negara=?, foto=? WHERE id=?');
                        $stmt->execute([$nama, $email, $telepon, $negara, $fotoFile, $_SESSION['user_id']]);
                    }
                    $_SESSION['user_name'] = $nama; // Update session
                    $successMsg = 'Profil berhasil diperbarui.';
                    // Refresh user data
                    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
                    $stmt->execute([$_SESSION['user_id']]);
                    $user = $stmt->fetch();
                }
            } catch (PDOException $e) {
                $errorMsg = 'Terjadi kesalahan saat memperbarui profil.';
            }
        }
    }
}
}

// Generate CSRF token for form
$csrfToken = generateCSRFToken();

$nama    = $user['nama']    ?? 'Pengguna';
$email   = $user['email']   ?? '';
$telepon = $user['telepon'] ?? '';
$negara  = $user['negara']  ?? 'Indonesia';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Saya - BojongStore</title>
  <meta name="description" content="Kelola informasi profil akun BojongStore Anda.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* ============================================
       PROFILE PAGE STYLES
       ============================================ */
    
    /* STRICT: Prevent any image from expanding beyond container */
    img {
      max-width: 100%;
      max-height: 100%;
    }
    
    body {
      background: #f0f2ed;
      min-height: 100vh;
    }

    /* Navbar override for profile state */
    /* (Removed - now using consistent navbar-user-section from main CSS) */

    /* ---- Profile Main Layout ---- */
    .profile-page {
      min-height: calc(100vh - 60px);
      background: #f0f2ed;
      padding: 40px 40px 60px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .profile-card {
      background: #eef0ea;
      border-radius: 20px;
      padding: 36px 40px 44px;
      width: 100%;
      max-width: 860px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.06);
      animation: fadeInUp 0.5s ease both;
    }

    /* ---- Avatar ---- */
    .profile-avatar-row {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 32px;
    }

    .profile-avatar-wrap {
      position: relative;
      width: 90px;
      height: 90px;
      flex-shrink: 0;
    }

    .profile-avatar-circle {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      background: #d4dbd0;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      flex-shrink: 0;
    }

    .profile-avatar-circle svg {
      color: #7a8a75;
    }

    .profile-avatar-circle img {
      width: 100% !important;
      height: 100% !important;
      max-width: 90px !important;
      max-height: 90px !important;
      object-fit: cover;
      border-radius: 50%;
      pointer-events: none;
      display: block;
    }

    .avatar-camera-btn {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: white;
      border: 1.5px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .avatar-camera-btn:hover {
      background: var(--green-primary);
      border-color: var(--green-primary);
      color: white;
    }

    .avatar-camera-btn:hover svg {
      stroke: white;
    }

    .avatar-camera-btn svg {
      stroke: var(--text-gray);
    }

    #avatarInput {
      display: none;
    }

    /* ---- Edit Profile Button ---- */
    .btn-edit-profile {
      padding: 11px 24px;
      background: var(--green-primary);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 600;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: all 0.25s;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-edit-profile:hover {
      background: #2d6335;
      transform: translateY(-1px);
      box-shadow: 0 4px 14px rgba(58,125,68,0.35);
    }

    .btn-edit-profile:disabled {
      background: #aaa;
      cursor: default;
      transform: none;
      box-shadow: none;
    }

    /* ---- Profile Fields Grid ---- */
    .profile-fields {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .profile-fields-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .profile-field-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .profile-field-group label {
      font-size: 13px;
      font-weight: 500;
      color: var(--green-primary);
      font-family: 'Inter', sans-serif;
    }

    .profile-field-input-wrap {
      position: relative;
    }

    .profile-field-group input {
      width: 100%;
      padding: 13px 16px;
      background: white;
      border: 1.5px solid #dde3d8;
      border-radius: 10px;
      font-size: 14px;
      font-family: 'Inter', sans-serif;
      color: var(--text-dark);
      outline: none;
      transition: border-color 0.25s, box-shadow 0.25s;
    }

    .profile-field-group input::placeholder {
      color: var(--text-light);
    }

    .profile-field-group input:focus {
      border-color: var(--green-primary);
      box-shadow: 0 0 0 3px rgba(58,125,68,0.1);
    }

    .profile-field-group input:disabled {
      background: #f5f5f5;
      color: var(--text-gray);
      cursor: default;
      border-color: #e0e0e0;
    }

    .password-toggle {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--text-light);
      display: flex;
      align-items: center;
      background: none;
      border: none;
      padding: 0;
      transition: color 0.2s;
    }

    .password-toggle:hover {
      color: var(--green-primary);
    }

    .profile-field-group input[type="password"],
    .profile-field-group input.has-toggle {
      padding-right: 44px;
    }

    /* ---- Alerts ---- */
    .profile-alert {
      padding: 12px 16px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .profile-alert.success {
      background: #d4edda;
      color: #2d6335;
      border: 1px solid #b2dfdb;
    }

    .profile-alert.error {
      background: #fdecea;
      color: #c0392b;
      border: 1px solid #f5c6cb;
    }

    /* ---- Footer override ---- */
    .footer {
      background: #eef0ea;
      border-top: 1px solid #dde3d8;
    }

    .footer-bantuan-phone {
      font-size: 14px;
      font-weight: 700;
      color: var(--text-dark);
      margin-top: 8px;
    }

    /* ---- Responsive ---- */
    @media (max-width: 700px) {
      .profile-page { padding: 20px 16px 40px; }
      .profile-card { padding: 24px 20px 32px; }
      .profile-fields-row { grid-template-columns: 1fr; }
    }
  </style>
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
    <a href="index.php">Beranda</a>
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
         $fotoPath = !empty($user['foto']) ? htmlspecialchars($user['foto']) : 'assets/images/default-avatar.svg';
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
  </div>
</nav>

<!-- ===== PROFILE PAGE ===== -->
<main class="profile-page" id="profilePage">
  <div class="profile-card">

    <?php if ($successMsg): ?>
      <div class="profile-alert success">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
        <?= htmlspecialchars($successMsg) ?>
      </div>
    <?php endif; ?>
    <?php if ($errorMsg): ?>
      <div class="profile-alert error">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/></svg>
        <?= htmlspecialchars($errorMsg) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="profile.php" id="profileForm" enctype="multipart/form-data">
      <input type="hidden" name="action" value="update_profile">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

      <!-- Avatar Row -->
      <div class="profile-avatar-row">
        <div class="profile-avatar-wrap">
          <div class="profile-avatar-circle" id="avatarCircle">
            <?php if (!empty($user['foto'])): ?>
              <img src="<?= htmlspecialchars($user['foto']) ?>" alt="Avatar" id="avatarPreview">
            <?php else: ?>
              <!-- Default person SVG -->
              <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#7a8a75" stroke-width="1.5">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20c0-4 3.582-7 8-7s8 3 8 7"/>
              </svg>
            <?php endif; ?>
          </div>
          <label for="avatarInput" class="avatar-camera-btn" title="Ganti foto profil">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke-width="2">
              <path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"/>
              <circle cx="12" cy="13" r="4"/>
            </svg>
          </label>
          <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display:none;">
        </div>

        <button type="submit" class="btn-edit-profile" id="btnEditProfile">
          Edit Profile
        </button>
      </div>

      <!-- Fields -->
      <div class="profile-fields">
        <!-- Row 1: Nama + Email -->
        <div class="profile-fields-row">
          <div class="profile-field-group">
            <label for="profileNama">Nama Lengkap</label>
            <input type="text" id="profileNama" name="nama" value="<?= htmlspecialchars($nama) ?>" placeholder="Nama lengkap" autocomplete="name">
          </div>
          <div class="profile-field-group">
            <label for="profileEmail">Email</label>
            <input type="email" id="profileEmail" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="Email" autocomplete="email">
          </div>
        </div>

        <!-- Row 2: Telepon + Password -->
        <div class="profile-fields-row">
          <div class="profile-field-group">
            <label for="profilePhone">No. Telepon</label>
            <input type="tel" id="profilePhone" name="telepon" value="<?= htmlspecialchars($telepon) ?>" placeholder="(+62) 8xxx-xxxx-xxxx" autocomplete="tel">
          </div>
          <div class="profile-field-group">
            <label for="profilePassword">Password</label>
            <div class="profile-field-input-wrap">
              <input type="password" id="profilePassword" name="new_password" placeholder="••••••••••••" class="has-toggle" autocomplete="new-password">
              <button type="button" class="password-toggle" id="togglePassword" title="Tampilkan/sembunyikan password">
                <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                  <circle cx="12" cy="12" r="3"/>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Row 3: Negara -->
        <div class="profile-fields-row" style="grid-template-columns: 1fr 1fr;">
          <div class="profile-field-group">
            <label for="profileNegara">Negara</label>
            <input type="text" id="profileNegara" name="negara" value="<?= htmlspecialchars($negara) ?>" placeholder="Negara" autocomplete="country-name">
          </div>
          <!-- Empty col for layout balance -->
          <div></div>
        </div>
      </div>
    </form>

  </div>
</main>

<!-- ===== FOOTER ===== -->
<footer class="footer" id="footer">
  <div class="footer-container">
    <div class="footer-grid">

      <!-- Brand -->
      <div class="footer-brand">
        <div class="brand-name">
          <div class="brand-icon" style="width:24px;height:24px;display:flex;align-items:center;justify-content:center;">
            <img src="assets/images/logo_tree.png" alt="BojongStore Logo" style="width:22px;height:22px;object-fit:contain;">
          </div>
          BojongStore
        </div>
        <p class="brand-desc">
          Mendukung keberlanjutan ekonomi lokal Indonesia melalui digitalisasi UMKM dengan cara yang elegan dan efisien.
        </p>
      </div>

      <!-- Kategori -->
      <div class="footer-col">
        <h4>Kategori</h4>
        <ul>
          <li><a href="produk.php?kategori=sayuran">Sayuran Segar</a></li>
          <li><a href="produk.php?kategori=buah">Buah Tropis</a></li>
          <li><a href="produk.php?kategori=makanan">Makanan Siap Saji</a></li>
          <li><a href="produk.php?kategori=minuman">Minuman</a></li>
        </ul>
      </div>

      <!-- Bantuan -->
      <div class="footer-col footer-bantuan">
        <h4>Bantuan</h4>
        <p>Jika anda mengalami gangguan/kendala hubungi nomor berikut</p>
        <p class="footer-bantuan-phone">+62 813-1282-1849</p>
      </div>

    </div>

    <hr class="footer-divider">

    <div class="footer-bottom">
      <p>© 2026 BojongStore. Mendukung UMKM Lokal Indonesia.</p>
    </div>
  </div>
</footer>

<script>
  // ── Password Toggle ──
  const toggleBtn  = document.getElementById('togglePassword');
  const passInput  = document.getElementById('profilePassword');
  const eyeIcon    = document.getElementById('eyeIcon');

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      const shown = passInput.type === 'text';
      passInput.type = shown ? 'password' : 'text';
      eyeIcon.innerHTML = shown
        ? '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>'
        : '<path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    });
  }

  // ── Avatar Preview ──
  const avatarInput  = document.getElementById('avatarInput');
  const avatarCircle = document.getElementById('avatarCircle');

  if (avatarInput) {
    avatarInput.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = (ev) => {
        avatarCircle.innerHTML = `<img src="${ev.target.result}" alt="Avatar Preview" id="avatarPreview" style="width:100%;height:100%;max-width:90px;max-height:90px;object-fit:cover;border-radius:50%;display:block;pointer-events:none;">`;
        // Prevent image interactions
        const img = document.getElementById('avatarPreview');
        if (img) {
          img.addEventListener('contextmenu', (e) => e.preventDefault());
          img.addEventListener('dragstart', (e) => e.preventDefault());
          img.addEventListener('click', (e) => e.preventDefault());
          img.addEventListener('dblclick', (e) => e.preventDefault());
          img.style.userSelect = 'none';
          img.style.WebkitUserSelect = 'none';
        }
      };
      reader.readAsDataURL(file);
    });
  }
  
  // Prevent interactions on existing avatar
  const existingImg = document.querySelector('.profile-avatar-circle img');
  if (existingImg) {
    existingImg.addEventListener('contextmenu', (e) => e.preventDefault());
    existingImg.addEventListener('dragstart', (e) => e.preventDefault());
    existingImg.addEventListener('click', (e) => e.preventDefault());
    existingImg.addEventListener('dblclick', (e) => e.preventDefault());
    existingImg.style.userSelect = 'none';
    existingImg.style.WebkitUserSelect = 'none';
  }

  // ── Search redirect ──
  const searchInput = document.getElementById('searchInput');
  if (searchInput) {
    searchInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' && searchInput.value.trim()) {
        window.location.href = `produk.php?q=${encodeURIComponent(searchInput.value.trim())}`;
      }
    });
  }
</script>
</body>
</html>
