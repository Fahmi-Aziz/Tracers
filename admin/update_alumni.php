<?php
include '../koneksi.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
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

    $updateAlumni = mysqli_query($koneksi, "UPDATE alumni SET nim='$nim', nama='$nama', prodi='$prodi', email='$email', telp='$telp', kelamin='$kelamin', ipk='$ipk' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));
    $updateUser = mysqli_query($koneksi, "UPDATE user SET email='$email' WHERE user_id='$user_id'") or die(mysqli_error($koneksi));

    if ($updateAlumni && $updateUser) {
        echo "<script>alert('Data berhasil diubah!');</script>";
        echo "<script>window.location.href = 'user_alumni.php';</script>";
        exit();
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
        echo "<script>window.location.href = 'user_alumni.php';</script>";
        exit();
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>