<?php 
  include '../config.php';
  include '../auth.php';

  $id_kategori = $_GET['id_kategori'];

  $sql = "SELECT * FROM tb_kategori WHERE id_kategori = $id_kategori";
  $query = mysqli_query($conn, $sql);
  $data_kategori = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - Edit Data Kategori</title>
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
                <li class="breadcrumb-item"><a href="#">Edit Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data_kategori['nama_kategori'] ?></li>
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
                      <h4 class="card-title">Edit Data Kategori</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="list_kategori.php" class="btn btn-info btn-block">List Kategori</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 grid-margin">
                    <?php if (isset($_SESSION['error_msg'])) : ?>
                      <div class="alert alert-danger">
                        Gagal mengedit data kategori !
                      </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success_msg'])) : ?>
                      <div class="alert alert-success">
                        Berhasil mengedit data kategori ! <a href="list_kategori.php" class="alert-link">Lihat Hasil</a>
                      </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                    <?php unset($_SESSION['success_msg']); ?>
                      <!-- FORM -->
                      <form method="POST" action="proses_edit.php" class="">
                        <input type="hidden" name="id_kategori" value="<?= $data_kategori['id_kategori'] ?>" class="form-control mb-4" placeholder="">
                        <div class="form-group">
                          <label>Nama Kategori</label>
                          <input type="text" name="nama_kategori" value="<?= $data_kategori['nama_kategori'] ?>" class="form-control mb-4" placeholder="Nama Kategori">
                        </div>
                        <input type="submit" name="submit" class="btn btn-gradient-info btn-block my-4" value="Edit Data Buku">
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