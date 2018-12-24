<?php 

  include '../config.php';

  $sql = "SELECT * FROM tb_kategori";
  $query = mysqli_query($conn, $sql);
  
  $data_kategori = array();

  while ($row = mysqli_fetch_assoc($query)) {
    $data_kategori[] = $row;
  }

?>