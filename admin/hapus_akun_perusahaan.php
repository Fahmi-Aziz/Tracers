<?php
include '../koneksi.php';
session_start();

if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];

  $query1 = "DELETE FROM perusahaan WHERE user_id='$user_id'";
  mysqli_query($koneksi, $query1);

  $query2 = "DELETE FROM user WHERE role='perusahaan' AND user_id='$user_id'";
  mysqli_query($koneksi, $query2);

  $query3 = "DELETE FROM kuisioner_perusahaan WHERE user_id='$user_id'";
  mysqli_query($koneksi, $query3);

  echo "<script>alert('User berhasil dihapus!');</script>";
  echo "<script>window.location.href = 'akun_perusahaan.php';</script>";
  exit();
}
?>