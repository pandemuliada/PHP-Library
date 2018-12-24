<?php 
  include '../config.php';
  include '../auth.php';

  $id_anggota = $_GET['id_anggota'];
  
  $sql = "SELECT * FROM tb_anggota WHERE id_anggota = $id_anggota";
  $query = mysqli_query($conn, $sql);
  $data_anggota = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - Edit Data Anggota</title>
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
                <li class="breadcrumb-item" aria-current="page"><a href="#!">Edit Anggota</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data_anggota['nama_anggota'] ?></li>
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
                      <h4 class="card-title">Edit Data Anggota</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="list_anggota.php" class="btn btn-danger btn-block">List Anggota</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 grid-margin">
                    <?php if (isset($_SESSION['error_msg'])) : ?>
                      <div class="alert alert-danger">
                        Gagal mengedit data anggota !
                      </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success_msg'])) : ?>
                      <div class="alert alert-success">
                        Berhasil mengedit data anggota ! <a href="list_anggota.php" class="alert-link">Lihat Hasil</a>
                      </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                    <?php unset($_SESSION['success_msg']); ?>
                      <!-- FORM -->
                      <form method="POST" action="proses_edit.php" class="">
                        <input type="hidden" name="id_anggota" value="<?= $id_anggota ?>">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_anggota" value="<?= $data_anggota['nama_anggota'] ?>" class="form-control mb-4" placeholder="Nama Anggota">
                        </div>
                        <div class="form-group">
                          <label>Alamat</label>
                          <select name="alamat_anggota" class="form-control mb-4">
                            
                            <option value="Tabanan" <?php if($data_anggota['alamat_anggota'] == 'Tabanan') {echo "selected=='selected'";} ?> >Tabanan</option>
                            <option value="Badung" <?php if($data_anggota['alamat_anggota'] == 'Badung') {echo "selected=='selected'";} ?> >Badung</option>
                            <option value="Denpasar" <?php if($data_anggota['alamat_anggota'] == 'Denpasar') {echo "selected=='selected'";} ?> >Denpasar</option>
                            <option value="Bangli" <?php if($data_anggota['alamat_anggota'] == 'Bangli') {echo "selected=='selected'";} ?> >Bangli</option>
                            <option value="Karangasem" <?php if($data_anggota['alamat_anggota'] == 'Karangasem') {echo "selected=='selected'";} ?> >Karangasem</option>
                            <option value="Gianyar" <?php if($data_anggota['alamat_anggota'] == 'Gianyar') {echo "selected=='selected'";} ?> >Gianyar</option>
                            <option value="Klungkung" <?php if($data_anggota['alamat_anggota'] == 'Klungkung') {echo "selected=='selected'";} ?> >Klungkung</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Telepon</label>
                          <input type="text" name="telepon_anggota" value="<?= $data_anggota['telepon_anggota'] ?>" class="form-control mb-4" placeholder="Telepon Anggota">
                        </div>
                        <input type="submit" name="submit" class="btn btn-gradient-danger btn-block my-4" value="Edit Data Anggota">
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