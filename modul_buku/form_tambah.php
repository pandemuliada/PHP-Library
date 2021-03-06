<?php include '../auth.php' ?>
<?php include '../modul_kategori/proses_list.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - Tambah Data Buku</title>
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
              <span class="page-title-icon bg-gradient-info text-white mr-2 btn-icon">
                <i class="mdi mdi-book-multiple"></i>                 
              </span>
              Buku
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
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
                      <h4 class="card-title">Tambah Data Buku</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="list_buku.php" class="btn btn-info btn-block">List Buku</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 grid-margin">
                    <?php if (isset($_SESSION['error_msg'])) : ?>
                      <div class="alert alert-danger">
                        Gagal menambahkan data buku !
                      </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success_msg'])) : ?>
                      <div class="alert alert-success">
                        Berhasil menambahkan data buku ! <a href="list_buku.php" class="alert-link">Lihat Hasil</a>
                      </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                    <?php unset($_SESSION['success_msg']); ?>
                      <!-- FORM -->
                      <form method="POST" action="proses_tambah.php" class="">
                        <div class="form-group">
                          <label>Judul Buku</label>
                          <input type="text" name="judul_buku" class="form-control mb-4" placeholder="Judul Buku">
                        </div>
                        <div class="form-group">
                          <label>Kategori Buku</label>
                          <select name="kategori_buku" class="form-control mb-4">
                            <?php foreach ($data_kategori as $kategori) : ?>
                              <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Pengarang Buku</label>
                          <input type="text" name="pengarang_buku" class="form-control mb-4" placeholder="Pengarang Buku">
                        </div>
                        <div class="form-group">
                          <label>Penerbit Buku</label>
                          <input type="text" name="penerbit_buku" class="form-control mb-4" placeholder="Penerbit Buku">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Buku</label>
                          <input type="number" name="jumlah_buku" class="form-control mb-4" placeholder="Jumlah Buku">
                        </div>
                        <input type="submit" name="submit" class="btn btn-gradient-info btn-block my-4" value="Tambah Data Buku">
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