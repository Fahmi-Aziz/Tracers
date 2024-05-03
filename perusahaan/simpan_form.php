<?php
include '../koneksi.php';
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$nama_perusahaan = $_POST['nama_perusahaan'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $insert = mysqli_query($koneksi, "INSERT INTO kuisioner_perusahaan (user_id, nama, jabatan, email, telp, nama_perusahaan) VALUES ('$user_id', '$nama', '$jabatan', '$email', '$telp', '$nama_perusahaan')") or die(mysqli_error($koneksi));

    if ($insert) {
        header("location: form2.php");
    } else {
        echo "Gagal Menyimpan Data";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
