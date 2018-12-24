<?php include '../auth.php' ?>
<?php include 'proses_list.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - List Peminjaman</title>
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
                <li class="breadcrumb-item active" aria-current="page">List Peminjaman</li>
              </ol>
            </nav>
          </div>
          <!-- ROW 2 -->
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                      <h4 class="card-title">List Peminjaman</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="form_tambah.php" class="btn btn-success btn-block">Tambah Peminjaman</a>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-12">
                      <?php if (isset($_SESSION['success_msg'])) : ?>
                        <div class="alert alert-success">
                          Berhasil menghapus data peminjaman !
                        </div>
                      <?php endif; ?>
                      <?php if (isset($_SESSION['error_msg'])) : ?>
                        <div class="alert alert-danger">
                          Gagal menghapus data peminjaman !
                        </div>
                      <?php endif; ?>

                      <?php unset($_SESSION['success_msg']); ?>
                      <?php unset($_SESSION['error_msg']); ?>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr class="bg-success text-white">
                          <th>
                            No
                          </th>
                          <th>
                            Nama
                          </th>
                          <th>
                            Buku
                          </th>
                          <th>
                            Tanggal Pinjam
                          </th>
                          <th>
                            Tanggal Jatuh Tempo
                          </th>
                          <th>
                          Tanggal Kembali</th>
                          <th>
                            Status
                          </th>
                          <th>
                            Opsi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_pinjam as $pinjam) : ?>
                          <tr>
                            <td>
                              <?= $no++ ?>
                            </td>
                            <td>
                              <?= $pinjam['nama_anggota'] ?>
                            </td>
                            <td>
                              <?= $pinjam['judul_buku'] ?>
                            </td>
                            <td>
                              <?= $pinjam['tgl_pinjam'] ?>
                            </td>
                            <td>
                              <?= $pinjam['tgl_jatuh_tempo'] ?>
                            </td>
                            <td>
                              <?php if (empty($pinjam['tgl_kembali'])) {
                                echo '-';
                              } else {
                                echo date('Y-m-d', strtotime($pinjam['tgl_kembali']));
                              }
                              ?>
                            </td>
                            <td>
                              <?php 
                                $status = '';
                                if (empty($pinjam['tgl_kembali'])) {
                                  $status = 'Dipinjam';
                                  echo $status;
                                } else {
                                  $status = 'Kembali';
                                  echo $status;
                                }
                              ?>
                            </td>
                            <td>
                              <?php if (empty($pinjam['tgl_kembali'])) : ?>
                                <a href="../modul_kembali/form_kembali.php?id_pinjam=<?= $pinjam['id_pinjam'] ?>" class="disable btn btn-gradient-success btn-xs"><i class="mdi mdi-cached"></i></a>
                                <a href="form_edit.php?id_pinjam=<?= $pinjam['id_pinjam'] ?>" class="btn btn-gradient-info btn-xs"><i class="mdi mdi-pencil"></i></a>
                              <?php endif; ?>
                                <a href="hapus_pinjam.php?id_pinjam=<?= $pinjam['id_pinjam'] ?>&&status=<?= $status ?>" onclick="return confirm('Are you sure ?')" class="btn btn-gradient-danger btn-xs"><i class="mdi mdi-delete"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
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