<?php
include '../koneksi.php';
$user_id = $_GET['user_id'];

$deleteAlumniQuery = "DELETE FROM perusahaan WHERE user_id='$user_id'";
$deleteAlumniResult = mysqli_query($koneksi, $deleteAlumniQuery);

if ($deleteAlumniResult) {
    echo "<script>alert('Data Berhasil Dihapus!');</script>";
    echo "<script>window.location.href = 'user_perusahaan.php';</script>";
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>

