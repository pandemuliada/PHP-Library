<?php
  session_start();
  include '../config.php';

  if ($_POST['submit']) {
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama_anggota'];
    $alamat = $_POST['alamat_anggota'];
    $telepon = $_POST['telepon_anggota'];

    $sql = "UPDATE tb_anggota
            SET 
            nama_anggota = '$nama',
            alamat_anggota = '$alamat',
            telepon_anggota = '$telepon'
            WHERE id_anggota = $id_anggota
            ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      $_SESSION['success_msg'] = 'berhasil';
      header("Location: form_edit.php?id_anggota=" . $id_anggota);
    } else {
      $_SESSION['error_msg'] = 'gagal';      
      // header("Location: form_edit.php?id_anggota=" . $id_anggota);
      echo mysqli_error($conn);
    }

  }