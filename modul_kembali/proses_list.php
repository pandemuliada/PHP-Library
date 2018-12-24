<?php 

  session_start();
  include '../config.php';

  $sql = "SELECT * FROM tb_kembali
          JOIN tb_pinjam ON tb_kembali.id_pinjam = tb_pinjam.id_pinjam
          JOIN tb_buku ON tb_pinjam.id_buku = tb_buku.id_buku
          JOIN tb_anggota ON tb_pinjam.id_anggota = tb_anggota.id_anggota
          ";
  $query = mysqli_query($conn, $sql);

  $data_kembali = array();

  while ($row = mysqli_fetch_assoc($query)) {
    $data_kembali[] = $row;
  }

?>