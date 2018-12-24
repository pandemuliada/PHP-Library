<?php
  session_start();
  include '../config.php';

  if (isset($_POST['submit'])) {
    $nama = $_POST['nama_anggota'];
    $alamat = $_POST['alamat_anggota'];
    $telepon = $_POST['telepon_anggota'];

    $sql = "INSERT INTO tb_anggota 
            (nama_anggota, alamat_anggota, telepon_anggota) 
            VALUES ('$nama', '$alamat', '$telepon')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      $_SESSION['success_msg'] = 'berhasil';
      header("Location: form_tambah.php");
    } else {
      $_SESSION['error_msg'] = 'gagal';
      header("Location: form_tambah.php");
    }
  }