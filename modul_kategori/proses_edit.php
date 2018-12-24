<?php
  session_start();
  include '../config.php';
  
  $id_kategori = $_POST['id_kategori'];
  $nama_kategori = $_POST['nama_kategori'];

  $sql = "UPDATE tb_kategori SET
          nama_kategori = '$nama_kategori'
          WHERE id_kategori = $id_kategori
          ";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['success_msg'] = 'berhasil';
    header("Location: form_edit.php?id_kategori=". $id_kategori);
  } else {
    $_SESSION['success_msg'] = 'gagal';
    header("Location: form_edit.php?id_kategori=". $id_kategori);
  }