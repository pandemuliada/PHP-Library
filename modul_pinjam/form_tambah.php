<?php include '../auth.php' ?>
<?php 
  include '../modul_buku/proses_list.php';
  include '../modul_anggota/proses_list.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - Tambah Data Peminjaman</title>
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
              <span class="page-title-icon bg-gradient-success text-white mr-2 btn-icon">
                <i class="mdi mdi-format-list-bulleted"></i>                 
              </span>
              Peminjaman
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Peminjaman</li>
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
                      <h4 class="card-title">Tambah Data Peminjaman</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="list_pinjam.php" class="btn btn-success btn-block">List Peminjaman</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 grid-margin">
                    <?php if (isset($_SESSION['error_msg'])) : ?>
                      <div class="alert alert-danger">
                        <?= $_SESSION['error_msg'] ?>
                      </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success_msg'])) : ?>
                      <div class="alert alert-success">
                        Berhasil menambahkan data peminjaman ! <a href="list_pinjam.php" class="alert-link">Lihat Hasil</a>
                      </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                    <?php unset($_SESSION['success_msg']); ?>
                      <!-- FORM -->
                      <form method="POST" action="proses_tambah.php" class="">
                        <div class="form-group">
                          <label>Nama Peminjam</label>
                          <select name="anggota" class="form-control mb-4">
                            <?php foreach ($data_anggota as $anggota) : ?>
                              <option value="<?= $anggota['id_anggota'] ?>"><?= $anggota['nama_anggota'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Buku</label>
                          <select name="buku" class="form-control mb-4">
                            <?php foreach ($data_buku as $buku) : ?>
                              <option value="<?= $buku['id_buku'] ?>"><?= $buku['judul_buku'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Pinjam</label>
                          <input type="date" name="tgl_pinjam" class="form-control mb-4" placeholder="Tanggal Pinjam">
                        </div>
                        <div class="form-group">
                          <label>Tanggal Jatuh Tempo</label>
                          <input type="date" name="tgl_jatuh_tempo" class="form-control mb-4" placeholder="Tanggal Jatuh Tempo">
                        </div>
                        <input type="submit" name="submit" class="btn btn-gradient-success btn-block my-4" value="Tambah Data Peminjaman">
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