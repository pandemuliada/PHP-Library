<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Wayan Alex</span>
          <span class="text-secondary text-small">Petugas Perpustakaan</span>
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../index.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Buku</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-book-multiple menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../modul_kategori/list_kategori.php">List Kategori</a></li>
          <li class="nav-item"> <a class="nav-link" href="../modul_buku/list_buku.php">List Buku</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../modul_anggota/list_anggota.php">
        <span class="menu-title">Anggota</span>
        <i class="mdi mdi-account-multiple menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../modul_pinjam/list_pinjam.php">
        <span class="menu-title">Peminjaman</span>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../modul_kembali/list_kembali.php">
        <span class="menu-title">Pengembalian</span>
        <i class="mdi mdi-cached menu-icon"></i>
      </a>
    </li>
    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
        </div>
        <a href="../modul_buku/form_tambah.php" class="btn btn-rounded btn-block btn-lg btn-gradient-primary mt-4">Tambah Buku</a>
      </span>
    </li>
  </ul>
</nav>