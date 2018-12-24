<?php 
  session_start();
  include 'config.php';

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_petugas WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    $data_admin = mysqli_fetch_assoc($query);

    if ($data_admin != null) {
      if ($password == $data_admin['password']) {
        $_SESSION['admin'] = $data_admin;
        header("Location: index.php");
      } else {
        header("Location: login.php");
      }
    } else {
      header("Location: login.php");
    }
  }


?>