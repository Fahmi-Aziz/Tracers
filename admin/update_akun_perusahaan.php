<?php
include '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $user_id = $_GET['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $cekEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND user_id !='$user_id'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        echo "<script>window.location.href = 'akun_perusahaan.php';</script>";
        exit();
    }

    $query = "SELECT * FROM user WHERE username='$username' AND user_id != '$user_id'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah digunakan. Silakan gunakan username lain!');</script>";
        echo "<script>window.location.href = 'akun_perusahaan.php';</script>";
        exit();
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $updateUserQuery = "UPDATE user SET username='$username', email='$email', password='$hashedPassword' WHERE user_id='$user_id'";
        $updatePerusahaanQuery = "UPDATE perusahaan SET email='$email' WHERE user_id='$user_id'";

        mysqli_query($koneksi, $updateUserQuery);
        mysqli_query($koneksi, $updatePerusahaanQuery);

        echo "<script>alert('Akun berhasil diubah!');</script>";
        echo "<script>window.location.href = 'akun_perusahaan.php';</script>";
        exit();
    }
}
?>
