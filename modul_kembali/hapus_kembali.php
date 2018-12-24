<?php
  session_start();
  include '../config.php';

  $id_kembali = $_GET['id_kembali'];
  $id_pinjam = $_GET['id_pinjam'];

  $sql = "DELETE FROM tb_kembali WHERE id_kembali = $id_kembali";
  $query = mysqli_query($conn, $sql);
  
  if ($query) {
    $sql_delete = "DELETE FROM tb_pinjam WHERE id_pinjam = $id_pinjam";
    mysqli_query($conn,  $sql_delete);
    $_SESSION['success_msg'] = 'Berhasil menghapus data peminjaman';
    header("Location: list_kembali.php");
  } else {
    $_SESSION['error_msg'] = 'Galga menghapus data peminjaman';
    header("Location: list_kembali.php");
  }

?>