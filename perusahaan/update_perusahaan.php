<?php
include '../koneksi.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $cekEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND user_id !='$user_id'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        echo "<script>window.location.href = 'edit.php';</script>";
        exit();
    }

    $updateUser = mysqli_query($koneksi, "UPDATE user SET email='$email' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));
    $update = mysqli_query($koneksi, "UPDATE perusahaan SET nama='$nama', email='$email', telp='$telp', alamat='$alamat' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));

    if ($update && $updateUser) {
        echo "<script>alert('Data Berhasil Diupdate');</script>";
        echo "<script>window.location.href = 'perusahaan.php';</script>";
    } else {
        echo "Gagal Diupdate";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
