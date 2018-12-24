<?php
  session_start();
  
  include '../config.php';

  $id_kategori = $_GET['id_kategori'];

  $sql = "DELETE FROM tb_kategori WHERE id_kategori = $id_kategori";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['success_msg'] = 'berhasil';
    header("Location: list_kategori.php");
  } else {
    $_SESSION['error_msg'] = 'gagal';
    header("Location: list_kategori.php");    
  }