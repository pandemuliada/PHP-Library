<?php
  session_start();
  include '../config.php';
  include '../functions.php';

  if (isset($_POST['submit'])) {
    $peminjam = $_POST['anggota'];
    $buku = $_POST['buku'];
    $tgl_pinjam = date('Y-m-d', strtotime($_POST['tgl_pinjam']));
    $tgl_jatuh_tempo = date('Y-m-d', strtotime($_POST['tgl_jatuh_tempo']));
    
    // if ($peminjam = '' || $buku = '' || $tgl_jatuh_tempo = null || $tgl_pinjam = null) {
    //   $_SESSION['error_msg'] = 'gagal';
    //   header("Location: form_tambah.php");
    // }

    $stok_buku = cek_stok_buku($conn, $buku);

    if ($stok_buku < 1) {
      $_SESSION['error_msg'] = 'Peminjaman gagal, stok buku habis';
      header("Location: form_tambah.php");
      exit();
    } 
    
    $sql = "INSERT INTO tb_pinjam 
            (id_anggota, id_buku, tgl_pinjam, tgl_jatuh_tempo) 
            VALUES ('$peminjam', '$buku', '$tgl_pinjam', '$tgl_jatuh_tempo')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      kurangi_stok_buku($conn, $buku);
      $_SESSION['success_msg'] = 'Berhasil melakukan peminjaman';
      header("Location: form_tambah.php");
    } else {
      $_SESSION['error_msg'] = 'Gagal melakukan peminjaman';
      header("Location: form_tambah.php");
    }
  }
?>