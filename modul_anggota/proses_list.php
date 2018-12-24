<?php 
  include '../config.php';

  $sql = "SELECT * FROM tb_anggota";
  $query = mysqli_query($conn, $sql);

  $data_anggota = array();

  while ($row = mysqli_fetch_assoc($query)) {
    $data_anggota[] = $row;
  }