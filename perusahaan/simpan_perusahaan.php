<?php
include '../koneksi.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $cekEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        echo "<script>window.location.href = 'tambah.php';</script>";
        exit();
    }

    $updateUser = mysqli_query($koneksi, "UPDATE user SET email='$email' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));
    $insert = mysqli_query($koneksi, "INSERT INTO perusahaan (nama, email, telp, alamat, user_id) VALUES ('$nama', '$email', '$telp', '$alamat', '$user_id')") or die(mysqli_error($koneksi));

    if ($insert && $updateUser) {
        echo "<script>alert('Data Berhasil Disimpan!');</script>";
        echo "<script>window.location.href = 'perusahaan.php';</script>";
    } else {
        echo "Gagal Disimpan";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
