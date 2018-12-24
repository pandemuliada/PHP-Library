<?php
  session_start();

  include '../config.php';

  $id_buku = $_GET['id_buku'];

  $sql = "DELETE FROM tb_buku WHERE id_buku = $id_buku";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['success_msg'] = 'berhasil';
    header("Location: list_buku.php");
  } else {
    $_SESSION['error_msg'] = 'gagal';
    header("Location: list_buku.php");
  }