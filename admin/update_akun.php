<?php
include '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $user_id = $_GET['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cekEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND user_id !='$user_id'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        echo "<script>window.location.href = 'akun_alumni.php';</script>";
        exit();
    }

    $query = "SELECT * FROM user WHERE username='$username' AND user_id != '$user_id'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah digunakan. Silakan gunakan username lain!');</script>";
        echo "<script>window.location.href = 'akun_alumni.php';</script>";
        exit();
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE user SET username='$username', email='$email', password='$hashedPassword' WHERE user_id='$user_id'";
        $query1 = "UPDATE alumni SET email='$email' WHERE user_id='$user_id'";
        mysqli_query($koneksi, $query);
        mysqli_query($koneksi, $query1);

        echo "<script>alert('Akun berhasil diubah!');</script>";
        echo "<script>window.location.href = 'akun_alumni.php';</script>";
        exit();
    }
}
?>
