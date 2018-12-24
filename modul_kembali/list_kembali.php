<?php include 'proses_list.php' ?>
<?php include '../auth.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UrLibary - List Pengembalian</title>
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
                <li class="breadcrumb-item active" aria-current="page">List Pengembalian</li>
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
                      <h4 class="card-title">List Pengembalian</h4>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-12">
                      <?php if (isset($_SESSION['success_msg'])) : ?>
                        <div class="alert alert-success">
                          <?= $_SESSION['success_msg'] ?>
                        </div>
                      <?php endif; ?>
                      <?php if (isset($_SESSION['error_msg'])) : ?>
                        <div class="alert alert-danger">
                          <?= $_SESSION['success_msg'] ?>
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
                        <?php foreach ($data_kembali as $kembali) : ?>
                          <tr>
                            <td>
                              <?= $no++ ?>
                            </td>
                            <td>
                              <?= $kembali['nama_anggota'] ?>
                            </td>
                            <td>
                              <?= $kembali['judul_buku'] ?>
                            </td>
                            <td>
                              <?= $kembali['tgl_pinjam'] ?>
                            </td>
                            <td>
                              <?= $kembali['tgl_jatuh_tempo'] ?>
                            </td>
                            <td>
                              <?= $kembali['tgl_kembali']; ?>
                            </td>
                            <td>
                              <?php 
                                $status = '';
                                if ($kembali['tgl_kembali'] == null) {
                                  echo $status = 'Dipinjam';
                                } else {
                                  echo $status = 'Kembali';
                                }
                              ?>
                            </td>
                            <td>
                              <a href="hapus_kembali.php?id_kembali=<?= $kembali['id_kembali'] ?>&&status=<?= $status ?>&&id_pinjam=<?= $kembali['id_pinjam'] ?>" onclick="return confirm('Are you sure ?')" class="btn btn-gradient-danger btn-xs"><i class="mdi mdi-delete"></i></a>
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