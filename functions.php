<?php 

  function cek_stok_buku($conn, $id_buku) {
    $sql = "SELECT jumlah_buku FROM tb_buku WHERE id_buku = $id_buku";
    $query = mysqli_query($conn, $sql);
    $hasil = mysqli_fetch_assoc($query);
    $stok = $hasil['jumlah_buku'];
    
    return $stok;
  }

  function kurangi_stok_buku($conn, $id_buku)
  {
    $sql = "UPDATE tb_buku SET jumlah_buku = jumlah_buku - 1 WHERE id_buku = $id_buku";
    $query = mysqli_query($conn, $sql);
  }

  function tambah_stok_buku($conn, $id_buku)
  {
    $sql = "UPDATE tb_buku SET jumlah_buku = jumlah_buku + 1 WHERE id_buku = $id_buku";
    $query = mysqli_query($conn, $sql);
  }

?>