<?php include '../auth.php' ?>

<?php 
  include '../config.php';

  $id_pinjam = $_GET['id_pinjam'];

  $sql = "SELECT tb_buku.*, tb_anggota.*, tb_pinjam.* FROM tb_pinjam
          JOIN tb_buku ON tb_pinjam.id_buku = tb_buku.id_buku
          JOIN tb_anggota ON tb_pinjam.id_anggota = tb_anggota.id_anggota
          WHERE tb_pinjam.id_pinjam = $id_pinjam";

$query = mysqli_query($conn, $sql);
$data_pinjam = mysqli_fetch_assoc($query);
// echo mysqli_error($conn);        

  $tgl_kembali = date('Y-m-d'); 
?>

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
              <span class="page-title-icon bg-gradient-success text-white mr-2 btn-icon">
                <i class="mdi mdi-cached"></i>                 
              </span>
              Pengembalian
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pengembalian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Pengembalian</li>
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
                      <h4 class="card-title">Tambah Data Pengembalian</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="list_pengembalian.php" class="btn btn-success btn-block">List Pengembalian</a>
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
                      <form method="POST" action="proses_kembali.php" class="">
                        <input type="hidden" name="id_pinjam" value="<?= $data_pinjam['id_pinjam']; ?>">
                        <input type="hidden" name="tgl_kembali" value="<?= $tgl_kembali; ?>">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" value="<?= $data_pinjam['nama_anggota'] ?>" class="form-control mb-4" placeholder="Nama Anggota" disabled>
                        </div>
                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" value="<?= $data_pinjam['alamat_anggota'] ?>" class="form-control mb-4" placeholder="Alamat Anggota" disabled>
                        </div>
                        <div class="form-group">
                          <label>Buku</label>
                          <input type="text" value="<?= $data_pinjam['judul_buku'] ?>" class="form-control mb-4" placeholder="Buku Yang Dipinjam" disabled>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Pinjam</label>
                          <input type="text" value="<?= $data_pinjam['tgl_pinjam'] ?>" class="form-control mb-4" placeholder="Buku Yang Dipinjam" disabled>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Jatuh Tempo</label>
                          <input type="text" value="<?= $data_pinjam['tgl_jatuh_tempo'] ?>" class="form-control mb-4" placeholder="Buku Yang Dipinjam" disabled>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Kembali</label>
                          <input type="text" value="<?= $tgl_kembali ?>" class="form-control mb-4 bg-gradient-success" placeholder="Tanggal Kembali" disabled>
                        </div>
                        <div class="form-group">
                          <label>Denda</label>
                          <input type="text" class="form-control mb-4" placeholder="Denda" disabled>
                        </div>
                        <input type="submit" name="submit" class="btn btn-gradient-success btn-block my-4" value="Tambah Data Pengembalian">
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