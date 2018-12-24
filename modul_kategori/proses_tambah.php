<?php 
  session_start();
  include '../config.php';

  $nama_kategori = $_POST['nama_kategori'];

  $sql = "INSERT INTO tb_kategori (nama_kategori) VALUES ('$nama_kategori')";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['success_msg'] = 'berhasil';
    header("Location: form_tambah.php");
  } else {
    $_SESSION['success_msg'] = 'berhasil';
    header("Location: form_tambah.php");
  }

?>