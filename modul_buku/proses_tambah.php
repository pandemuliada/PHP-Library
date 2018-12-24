<?php
  session_start();
  
  include '../config.php';

  if (isset($_POST['submit'])) {

    $judul = $_POST['judul_buku'];
    $kategori = $_POST['kategori_buku'];
    $pengarang = $_POST['pengarang_buku'];
    $penerbit = $_POST['penerbit_buku'];
    $jumlah = $_POST['jumlah_buku'];

    $sql = "INSERT INTO tb_buku
          (judul_buku, id_kategori, pengarang_buku, penerbit_buku, jumlah_buku) VALUES 
          ('$judul', '$kategori', '$pengarang', '$penerbit', '$jumlah')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      $_SESSION['success_msg'] = 'success';
      header("Location: form_tambah.php");      
    } else {
      $_SESSION['error_msg'] = 'gagal';
      // header("Location: form_tambah.php");
      echo mysqli_error($conn);
    }
    
  }