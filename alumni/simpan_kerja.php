<?php
include '../koneksi.php';
$nama_perusahaan = $_POST['nama_perusahaan'];
$posisi = $_POST['posisi'];
$durasi = $_POST['durasi'];
$pendapatan = $_POST['pendapatan'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $insert = mysqli_query($koneksi, "INSERT INTO riwayat_kerja (nama_perusahaan, posisi, durasi, pendapatan, user_id) VALUES ('$nama_perusahaan', '$posisi', '$durasi', '$pendapatan', '$user_id')") or die(mysqli_error($koneksi));

    if ($insert) {
        echo "<script>alert('Data Berhasil Disimpan');</script>";
        echo "<script>window.location.href = 'riwayat_kerja.php';</script>";
    } else {
        echo "Gagal Disimpan";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
