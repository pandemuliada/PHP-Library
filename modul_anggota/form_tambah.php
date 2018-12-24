<?php include '../auth.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - Tambah Data Anggota</title>
  <link rel="stylesheet" href="../src/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../src/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../src/css/style.css">	
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include '../partials/_navbar.php' ?>
    
    <div class="container-fluid page-body-wrapper">
      <!-- SIDEBAR -->
      <?php include '../partials/_sidebar.php' ?>
      <!-- MAIN PANEL -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-danger text-white mr-2 btn-icon">
                <i class="mdi mdi-book-multiple"></i>                 
              </span>
              Anggota
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Anggota</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>
              </ol>
            </nav>
          </div>
          <!-- ROW 2 -->
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row mb-5">
                    <div class="col-md-9">
                      <h4 class="card-title">Tambah Data Anggota</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="list_anggota.php" class="btn btn-danger btn-block">List Anggota</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 grid-margin">
                    <?php if (isset($_SESSION['error_msg'])) : ?>
                      <div class="alert alert-danger">
                        Gagal menambahkan data anggota !
                      </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success_msg'])) : ?>
                      <div class="alert alert-success">
                        Berhasil menambahkan data anggota ! <a href="list_anggota.php" class="alert-link">Lihat Hasil</a>
                      </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                    <?php unset($_SESSION['success_msg']); ?>
                      <!-- FORM -->
                      <form method="POST" action="proses_tambah.php" class="">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_anggota" class="form-control mb-4" placeholder="Nama Anggota">
                        </div>
                        <div class="form-group">
                          <label>Alamat</label>
                          <select name="alamat_anggota" class="form-control mb-4">
                            <option value="Tabanan">Tabanan</option>
                            <option value="Badung">Badung</option>
                            <option value="Denpasar">Denpasar</option>
                            <option value="Bangli">Bangli</option>
                            <option value="Karangasem">Karangasem</option>
                            <option value="Gianyar">Gianyar</option>
                            <option value="Klungkung">Klungkung</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Telepon</label>
                          <input type="text" name="telepon_anggota" class="form-control mb-4" placeholder="Telepon Anggota">
                        </div>
                        <input type="submit" name="submit" class="btn btn-gradient-danger btn-block my-4" value="Tambah Data Anggota">
                      </form>
                      <!-- END FORM -->
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include '../partials/_footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
  </div>

    <!-- plugins:js -->
  <script src="../src/vendors/js/vendor.bundle.base.js"></script>
  <script src="../src/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../src/js/off-canvas.js"></script>
  <script src="../src/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../src/js/dashboard.js"></script>
  <!-- End custom js for this page-->


</body>
</html>