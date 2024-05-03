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

    $cekEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email='".$data['email']."' AND user_id !='$user_id'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        echo "<script>window.location.href = 'edit.php';</script>";
        exit();
    }

    $updateUser = mysqli_query($koneksi, "UPDATE user SET email='".$data['email']."' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));
    $updateAlumni = mysqli_query($koneksi, "UPDATE alumni SET nim='".$data['nim']."', nama='".$data['nama']."', prodi='".$data['prodi']."', email='".$data['email'].
    "', telp='".$data['telp']."', kelamin='".$data['kelamin']."', ipk='".$data['ipk']."' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));

    if ($updateUser && $updateAlumni) {
        echo "<script>alert('Data Berhasil Diubah!');</script>";
        echo "<script>window.location.href = 'alumni.php';</script>";
        exit();
    } else {
        echo "Gagal Diupdate";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>