<?php session_start() ?>
<?php
  include 'config.php';

  if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
  } 

  $sql_anggota = "SELECT * FROM tb_anggota";
  $data_anggota = mysqli_query($conn, $sql_anggota);

  $sql_buku = "SELECT * FROM tb_buku";
  $data_buku = mysqli_query($conn, $sql_buku);
  
  $sql_pinjam = "SELECT * FROM tb_pinjam 
                JOIN tb_anggota ON tb_pinjam.id_anggota = tb_anggota.id_anggota  
                ";
  $query_pinjam = mysqli_query($conn, $sql_pinjam);

  $data_pinjam = array();

  while ($row = mysqli_fetch_assoc($query_pinjam)) {
    $data_pinjam[] = $row;
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - Dashboard</title>
  <link rel="stylesheet" href="src/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="src/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="src/css/style.css">	
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php">UrLibrary</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-text">
                <p class="mb-1 text-black">Halo, <?= $_SESSION['admin']['nama_petugas'] ?> &nbsp;</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="signout.php">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- SIDEBAR -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?= $_SESSION['admin']['nama_petugas'] ?></span>
                <span class="text-secondary text-small">Petugas Perpustakaan</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
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
                <li class="nav-item"> <a class="nav-link" href="modul_kategori/list_kategori.php">List Kategori</a></li>
                <li class="nav-item"> <a class="nav-link" href="modul_buku/list_buku.php">List Buku</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modul_anggota/list_anggota.php">
              <span class="menu-title">Anggota</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modul_pinjam/list_pinjam.php">
              <span class="menu-title">Peminjaman</span>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modul_kembali/list_kembali.php">
              <span class="menu-title">Pengembalian</span>
              <i class="mdi mdi-cached menu-icon"></i>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
              </div>
              <a href="modul_buku/form_tambah.php" class="btn btn-rounded btn-block btn-lg btn-gradient-primary mt-4">Tambah Buku</a>
            </span>
          </li>
        </ul>
      </nav>
      <!-- MAIN PANEL -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2 btn-icon">
                <i class="mdi mdi-home"></i>                 
              </span>
              Dashboard
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="src/img/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Daftar Anggota
                    <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?= mysqli_num_rows($data_anggota) ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="src/img/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                  <h4 class="font-weight-normal mb-3">Daftar Buku
                    <i class="mdi mdi-book-multiple mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?= mysqli_num_rows($data_buku) ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="src/img/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">List Peminjaman
                    <i class="mdi mdi-format-list-bulleted mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?= mysqli_num_rows($query_pinjam) ?></h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ROW 2 -->
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Peminjaman Terakhir</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Nama
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            Tanggal Pinjam
                          </th>
                          <th>
                            Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data_pinjam as $i => $pinjam) : ?>
                          <tr>
                            <td>
                              <?= ++$i ?>
                            </td>
                            <td>
                              <?= $pinjam['nama_anggota'] ?>
                            </td>
                            <td>
                              <?= $pinjam['alamat_anggota'] ?>
                            </td>
                            <td>
                              <?=  $pinjam['tgl_pinjam'] ?>
                            </td>
                            <td>
                              Dipinjam
                            </td>
                          </tr>
                          <?php if ($i == 4) {
                            break;
                          } 
                          ?>
                        <?php $i++; endforeach; ?>
                      </tbody>
                    </table>

                    <div class="mt-4">
                      <a href="" class="btn btn-block btn-gradient-success">Lihat Selengkapnya</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include './partials/_footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="src/vendors/js/vendor.bundle.base.js"></script>
  <script src="src/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="src/js/off-canvas.js"></script>
  <script src="src/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="src/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
