<?php
include '../koneksi.php';
session_start();

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $query1 = "DELETE FROM riwayat_kerja WHERE user_id='$user_id'";
    mysqli_query($koneksi, $query1);

    $query2 = "DELETE FROM alumni WHERE user_id='$user_id'";
    mysqli_query($koneksi, $query2);

    $query3 = "DELETE FROM user WHERE role='alumni' AND user_id='$user_id'";
    mysqli_query($koneksi, $query3);

    $query4 = "DELETE FROM kuisioner_alumni WHERE user_id='$user_id'";
    mysqli_query($koneksi, $query4);

    echo "<script>alert('User berhasil dihapus!');</script>";
    echo "<script>window.location.href = 'akun_alumni.php';</script>";
    exit();
}
?>
