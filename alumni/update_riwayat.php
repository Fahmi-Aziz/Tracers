<?php
include '../koneksi.php';
$nama_perusahaan = $_POST['nama_perusahaan'];
$posisi = $_POST['posisi'];
$durasi = $_POST['durasi'];
$pendapatan = $_POST['pendapatan'];
$id = $_POST['id'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $update = mysqli_query($koneksi, "UPDATE riwayat_kerja SET nama_perusahaan='$nama_perusahaan', posisi='$posisi', durasi='$durasi', pendapatan='$pendapatan' WHERE user_id='$user_id' AND id='$id'") or die(mysqli_error($koneksi));

    if ($update) {
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo "<script>window.location.href = 'riwayat_kerja.php';</script>";
    } else {
        echo "Gagal Diupdate";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
