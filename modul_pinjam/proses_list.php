<?php 
  include '../config.php';

  $sql = "SELECT tb_pinjam.*, tb_buku.*, tb_anggota.*,
          (SELECT tgl_kembali FROM tb_kembali JOIN tb_pinjam ON tb_kembali.id_pinjam = tb_pinjam.id_pinjam WHERE tb_kembali.id_pinjam = tb_pinjam.id_pinjam ) as tgl_kembali
          FROM tb_pinjam 
          JOIN tb_anggota ON tb_pinjam.id_anggota = tb_anggota.id_anggota
          JOIN tb_buku ON tb_pinjam.id_buku = tb_buku.id_buku
          ";  
  $query = mysqli_query($conn, $sql);

  $data_pinjam = array();

  while ($row = mysqli_fetch_assoc($query)) {
    $data_pinjam[] = $row;
  }

?>