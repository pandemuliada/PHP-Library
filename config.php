<?php

  $server = 'localhost';
  $name = 'root';
  $pass = '';
  $db = 'urlibrary';

  $conn = mysqli_connect($server, $name, $pass, $db) or die ("Koneksi gagal");