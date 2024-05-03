<?php
include '../koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM riwayat_kerja WHERE id='$id'");
echo "<script>alert('Data Berhasil Dihapus!');</script>";
echo "<script>window.location.href = 'riwayat_kerja.php';</script>";
?>
