<?php
include '../koneksi.php';
session_start();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $cekEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND user_id !='$user_id'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        echo "<script>window.location.href = 'user_perusahaan.php';</script>";
        exit();
    }

    $insert = mysqli_query($koneksi, "INSERT INTO perusahaan (user_id, nama, email, telp, alamat) VALUES ('$user_id', '$nama', '$email', '$telp', '$alamat')") or die(mysqli_error($koneksi));
    $update = mysqli_query($koneksi, "UPDATE user SET email='$email' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));

    if ($insert && $update) {
        echo "<script>alert('Data Berhasil Diupdate!');</script>";
        echo "<script>window.location.href = 'user_perusahaan.php';</script>";
        exit;
    } else {
        echo "Gagal Menambahkan Data";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>

