<?php
  session_start();
  include '../config.php';

  $id_anggota = $_GET['id_anggota'];

  $sql = "DELETE FROM tb_anggota WHERE id_anggota = $id_anggota";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['success_msg'] = 'berhasil';
    header("Location: list_anggota.php");
  } else {
    $_SESSION['error_msg'] = 'gagal';
    header("Location: list_anggota.php");
  }