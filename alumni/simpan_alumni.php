<?php
include '../koneksi.php';
$data = array(
    'nim' => $_POST['nim'],
    'nama' => $_POST['nama'],
    'prodi' => $_POST['prodi'],
    'email' => $_POST['email'],
    'telp' => $_POST['telp'],
    'kelamin' => $_POST['kelamin'],
    'ipk' => $_POST['ipk']
);

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $checkEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '".$data['email']."'");
    if (mysqli_num_rows($checkEmail) > 0) {
        echo "<script>alert('Email sudah ada dalam database. Silakan gunakan email lain.');</script>";
        echo "<script>window.location.href = 'tambah.php';</script>";
        exit();
    }

    $update = mysqli_query($koneksi, "UPDATE user SET email='".$data['email']."' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));
    $insert = mysqli_query($koneksi, "INSERT INTO alumni (nim, nama, prodi, email, telp, kelamin, ipk, user_id) VALUES ('".$data['nim']."', '".$data['nama']."', 
    '".$data['prodi']."', '".$data['email']."', '".$data['telp']."', '".$data['kelamin']."', '".$data['ipk']."', '$user_id')") or die(mysqli_error($koneksi));

    if ($insert && $update) {
        echo "<script>alert('Data Berhasil disimpan!');</script>";
        echo "<script>window.location.href = 'alumni.php';</script>";
    } else {
        echo "Gagal Disimpan";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>