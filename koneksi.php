<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tracer";

$koneksi = mysqli_connect($servername, $username, $password, $dbname);

if (!$koneksi) {
 echo "Koneksi Gagal".die(mysqli_error($koneksi));
}

?>
