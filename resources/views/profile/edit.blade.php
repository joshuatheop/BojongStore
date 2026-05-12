@extends('layouts.landing')

@section('content')
<style>
    body { background: #f0f2ed; min-height: 100vh; }

    /* ---- Profile Main Layout ---- */
    .profile-page {
      min-height: calc(100vh - 80px);
      background: #f0f2ed;
      padding: 100px 40px 60px; /* Added top padding for header */
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

    .profile-avatar-circle img {
      width: 100% !important;
      height: 100% !important;
      object-fit: cover;
      border-radius: 50%;
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
      display: none; /* Only in edit mode */
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    body.edit-mode .avatar-camera-btn { display: flex; }

    .avatar-camera-btn:hover {
      background: var(--green-primary);
      border-color: var(--green-primary);
    }
    .avatar-camera-btn:hover svg { stroke: white; }

    /* ---- Action Buttons ---- */
    .btn-edit-profile, .btn-save-profile, .btn-cancel-profile {
      padding: 11px 24px;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.25s;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border: none;
    }
    .btn-edit-profile, .btn-save-profile {
      background: var(--green-primary);
      color: white;
    }
    .btn-cancel-profile {
      background: white;
      color: var(--text-dark);
      border: 1.5px solid #dde3d8;
    }

    /* ---- Profile Fields ---- */
    .profile-fields { display: flex; flex-direction: column; gap: 20px; }
    .profile-fields-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .profile-field-group { display: flex; flex-direction: column; gap: 8px; }

    .profile-field-group label {
      font-size: 13px;
      font-weight: 500;
      color: var(--green-primary);
    }

    .profile-field-group input {
      width: 100%;
      padding: 13px 16px;
      background: white;
      border: 1.5px solid #dde3d8;
      border-radius: 10px;
      font-size: 14px;
      color: var(--text-dark);
      outline: none;
      transition: border-color 0.25s;
    }

    .profile-field-group input[readonly] {
      background: white;
      cursor: default;
    }

    /* ---- Alerts ---- */
    .profile-alert {
      padding: 12px 16px;
      border-radius: 8px;
      font-size: 13px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .profile-alert.success { background: #d4edda; color: #2d6335; border: 1px solid #b2dfdb; }

    @media (max-width: 700px) {
      .profile-page { padding: 80px 16px 40px; }
      .profile-fields-row { grid-template-columns: 1fr; }
    }
</style>

<main class="profile-page" id="profilePage">
  <div class="profile-card">

    @if (session('status') === 'profile-updated')
      <div class="profile-alert success">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
        Profil berhasil diperbarui.
      </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" id="profileForm" enctype="multipart/form-data">
      @csrf
      @method('patch')

      <!-- Avatar Row -->
      <div class="profile-avatar-row">
        <div class="profile-avatar-wrap">
          <div class="profile-avatar-circle" id="avatarCircle">
            @if (Auth::user()->foto)
              <img src="{{ asset(Auth::user()->foto) }}" alt="Avatar" id="avatarPreview">
            @else
              <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#7a8a75" stroke-width="1.5">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20c0-4 3.582-7 8-7s8 3 8 7"/>
              </svg>
            @endif
          </div>
          <label for="avatarInput" class="avatar-camera-btn" title="Ganti foto profil">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"/>
              <circle cx="12" cy="13" r="4"/>
            </svg>
          </label>
          <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display:none;">
        </div>

        <div class="profile-action-btns">
          <button type="button" class="btn-edit-profile" id="btnEditProfile">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Edit Profile
          </button>
          <button type="submit" class="btn-save-profile" id="btnSaveProfile" style="display:none;">
            Simpan
          </button>
          <button type="button" class="btn-cancel-profile" id="btnCancelProfile" style="display:none;">
            Batal
          </button>
        </div>
      </div>

      <!-- Fields -->
      <div class="profile-fields">
        <div class="profile-fields-row">
          <div class="profile-field-group">
            <label for="profileNama">Nama Lengkap</label>
            <input type="text" id="profileNama" name="name" value="{{ Auth::user()->name }}" readonly>
          </div>
          <div class="profile-field-group">
            <label for="profileEmail">Email</label>
            <input type="email" id="profileEmail" name="email" value="{{ Auth::user()->email }}" readonly>
          </div>
        </div>

        <div class="profile-fields-row">
          <div class="profile-field-group">
            <label for="profilePhone">No. Telepon</label>
            <input type="tel" id="profilePhone" name="telepon" value="{{ Auth::user()->telepon }}" readonly>
          </div>
          <div class="profile-field-group" id="passwordFieldGroup">
            <label for="profilePassword">Password Baru</label>
            <div style="position: relative;">
              <input type="password" id="profilePassword" name="password" placeholder="••••••••••••" readonly style="padding-right: 44px;">
              <button type="button" id="togglePassword" style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #7a8a75;">
                <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                  <circle cx="12" cy="12" r="3"/>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <div class="profile-fields-row">
          <div class="profile-field-group">
            <label>Negara</label>
            <input type="text" value="Indonesia" readonly>
          </div>
          <div></div>
        </div>
      </div>
    </form>
  </div>
</main>

<script>
  const btnEdit = document.getElementById('btnEditProfile');
  const btnSave = document.getElementById('btnSaveProfile');
  const btnCancel = document.getElementById('btnCancelProfile');
  const passInput = document.getElementById('profilePassword');
  const toggleBtn = document.getElementById('togglePassword');
  const eyeIcon = document.getElementById('eyeIcon');
  
  const inputs = [
    document.getElementById('profileNama'),
    document.getElementById('profileEmail'),
    document.getElementById('profilePhone'),
    passInput
  ];

  const originals = inputs.map(i => i.value);

  btnEdit.addEventListener('click', () => {
    document.body.classList.add('edit-mode');
    inputs.forEach(i => i.removeAttribute('readonly'));
    btnEdit.style.display = 'none';
    btnSave.style.display = 'inline-flex';
    btnCancel.style.display = 'inline-flex';
  });

  btnCancel.addEventListener('click', () => {
    document.body.classList.remove('edit-mode');
    inputs.forEach((i, idx) => {
      i.setAttribute('readonly', '');
      i.value = originals[idx];
    });
    passInput.value = ''; // Clear password on cancel
    btnEdit.style.display = 'inline-flex';
    btnSave.style.display = 'none';
    btnCancel.style.display = 'none';
  });

  toggleBtn.addEventListener('click', () => {
    if (passInput.hasAttribute('readonly')) return;
    const isText = passInput.type === 'text';
    passInput.type = isText ? 'password' : 'text';
    eyeIcon.innerHTML = isText 
      ? '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>'
      : '<path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
  });
</script>
@endsection
