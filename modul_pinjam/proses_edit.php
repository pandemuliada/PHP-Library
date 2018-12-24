<?php
  session_start();
  include '../config.php';
  include '../functions.php';
  
  if (isset($_POST['submit'])) {
    $id_pinjam = $_POST['id_pinjam'];
    $peminjam = $_POST['anggota'];
    $buku = $_POST['buku'];
    $tgl_pinjam = date('Y-m-d', strtotime($_POST['tgl_pinjam']));
    $tgl_jatuh_tempo = date('Y-m-d', strtotime($_POST['tgl_jatuh_tempo']));

    // MENGAMBIL DATA SEBELUMNYA DARI TABLE (tb_pinjam)
    $sql_select = "SELECT * FROM tb_pinjam WHERE id_pinjam = $id_pinjam";
    $query_select = mysqli_query($conn, $sql_select);
    $recent_data = mysqli_fetch_assoc($query_select);
    $recent_buku = $recent_data['id_buku'];
    $recent_peminjam = $recent_data['id_anggota'];
    
    // SQL UNTUK UPDATE DATA PINJAM YANG BARU
    $sql = "UPDATE tb_pinjam SET
            id_anggota = '$peminjam',
            id_buku = '$buku',
            tgl_pinjam = '$tgl_pinjam',
            tgl_jatuh_tempo = '$tgl_pinjam'
            WHERE id_pinjam = $id_pinjam
            ";

    // if ($recent_buku == $buku) {
    //   $_SESSION['error_msg'] = "Data yang anda masukan sama, jadi tidak perlu ada perubahan";
    //   header("Location: form_edit.php?id_pinjam=" . $id_pinjam);      
    //   exit();
    // }

    $query = mysqli_query($conn, $sql);

    if ($query) {
      tambah_stok_buku($conn, $recent_buku);
      kurangi_stok_buku($conn, $buku);
      $_SESSION['success_msg'] = 'Berhasil mengedit data buku';
      header("Location: form_edit.php?id_pinjam=" . $id_pinjam);
    } else {
      $_SESSION['error_msg'] = 'Gagal mengedit data buku';
      header("Location: form_edit.php?id_pinjam=" . $id_pinjam);
      echo mysqli_error($conn);
    }
  }
  

?>