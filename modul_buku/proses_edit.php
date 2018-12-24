<?php
  session_start();
  include '../config.php';

  if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul_buku'];
    $kategori = $_POST['kategori_buku'];
    $pengarang = $_POST['pengarang_buku'];
    $penerbit = $_POST['penerbit_buku'];
    $jumlah = $_POST['jumlah_buku'];

    $sql = "UPDATE tb_buku SET 
            judul_buku = '$judul',
            id_kategori = '$kategori',
            pengarang_buku='$pengarang',
            penerbit_buku='$penerbit',
            jumlah_buku='$jumlah'
            WHERE id_buku = $id_buku
            ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      $_SESSION['success_msg'] = 'berhasil';
      header("Location: form_edit.php?id_buku=" . $id_buku);
    } else {
      $_SESSION['error_msg'] = 'gagal';
      header("Location: list_buku.php");
    }
  }
  
  