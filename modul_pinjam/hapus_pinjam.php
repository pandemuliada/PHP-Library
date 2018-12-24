<?php 
  session_start();

  include '../config.php';
  include '../functions.php';

  $id_pinjam = $_GET['id_pinjam'];
  $status = $_GET['status'];
  
  
  $sql_select = "SELECT id_buku FROM tb_pinjam WHERE id_pinjam = $id_pinjam";
  $query_select = mysqli_query($conn, $sql_select);
  $hasil = mysqli_fetch_assoc($query_select);
  $id_buku = $hasil['id_buku'];
  
  if ($status === 'Dipinjam') {
    tambah_stok_buku($conn, $id_buku);
  }

  $sql = "DELETE FROM tb_pinjam WHERE id_pinjam = $id_pinjam";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['success_msg'] = 'berhasil';
    header("Location: list_pinjam.php");
  } else {
    $_SESSION['error_msg'] = 'gagal';
    header("Location: list_pinjam.php");
  }