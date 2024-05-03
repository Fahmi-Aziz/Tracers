<?php
if (isset($_POST['password']) && isset($_POST['reset_link_token']) && isset($_POST['email'])) {
    include "koneksi.php";
    $emailId = $_POST['email'];
    $token = $_POST['reset_link_token'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        echo "<script>alert('Password tidak cocok! Silakan coba lagi.');</script>";
        echo "<script>window.history.back();</script>";
        exit();
    }

    $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `reset_link_token`='" . $token . "' AND `email`='" . $emailId . "'");
    $row = mysqli_num_rows($query);
    if ($row) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($koneksi, "UPDATE `user` SET `password`='" . $hashedPassword . "', `reset_link_token`=NULL, `exp_date`=NULL WHERE `email`='" . $emailId . "'");

        echo "<script>alert('Password berhasil diubah! Silakan login.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Kesalahan, Silakan coba lagi!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    }
}
?>
