<?php 
  session_start();
  include '../config.php';
  include '../functions.php';

  if (isset($_POST['submit'])) {

    // $tgl_pinjam = id_pinjam
    $id_pinjam = $_POST['id_pinjam']; 
    $tgl_kembali = $_POST['tgl_kembali'];

    // MENGAMBIL id_buku dari tb_buku
    $sql_select = "SELECT tb_buku.id_buku FROM tb_buku 
                  JOIN tb_pinjam ON tb_buku.id_buku = tb_pinjam.id_buku 
                  WHERE tb_pinjam.id_pinjam = $id_pinjam";
    $query_select = mysqli_query($conn, $sql_select);
    $hasil = mysqli_fetch_assoc($query_select);
    $id_buku = $hasil['id_buku'];

    $sql = "INSERT INTO tb_kembali (id_pinjam, tgl_kembali) VALUES ('$id_pinjam', '$tgl_kembali')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      $_SESSION['success_msg'] = 'Berhasil menambahkan data pengembalian !';
      tambah_stok_buku($conn, $id_buku);
      header("Location: list_kembali.php");
    } else {
      $_SESSION['error_msg'] = 'Ada kesalahan saat menambahkan data pengembalian !';
      header("Location: list_kembali.php?id_pinjam=" . $id_pinjam);
    }

  }

?>