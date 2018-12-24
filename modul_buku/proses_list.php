<?php 
  include '../config.php';

  $sql = "SELECT * FROM tb_buku
          INNER JOIN tb_kategori ON tb_buku.id_kategori = tb_kategori.id_kategori
          ";
  $query = mysqli_query($conn, $sql);

  $data_buku = array();
  
  while ($row = mysqli_fetch_assoc($query)) {
    $data_buku[] = $row; 
  }
  

?>