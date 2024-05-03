<?php
include '../koneksi.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
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

    $updatePerusahaan = mysqli_query($koneksi, "UPDATE perusahaan SET nama='$nama', email='$email', telp='$telp', alamat='$alamat' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));
    $updateUser = mysqli_query($koneksi, "UPDATE user SET email='$email' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));

    if ($updatePerusahaan && $updateUser ) {
        echo "<script>alert('Data berhasil diubah!');</script>";
        echo "<script>window.location.href = 'user_perusahaan.php';</script>";
        exit();
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
        echo "<script>window.location.href = 'user_perusahaan.php';</script>";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
