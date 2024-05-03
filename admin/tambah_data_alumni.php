<?php
include '../koneksi.php';
session_start();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $kelamin = $_POST['kelamin'];
    $ipk = $_POST['ipk'];

    $cekEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND user_id !='$user_id'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        echo "<script>window.location.href = 'user_alumni.php';</script>";
        exit();
    }

    $insert = mysqli_query($koneksi, "INSERT INTO alumni (user_id, nim, nama, prodi, email, telp, kelamin, ipk) VALUES ('$user_id', '$nim', '$nama', '$prodi', '$email', '$telp', '$kelamin', '$ipk')") or die(mysqli_error($koneksi));
    $update = mysqli_query($koneksi, "UPDATE user SET email='$email' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));

    if ($insert && $update) {
        echo "<script>alert('Data berhasil diubah!');</script>";
        echo "<script>window.location.href = 'user_alumni.php';</script>";
        exit();
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
        echo "<script>window.location.href = 'user_alumni.php';</script>";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
