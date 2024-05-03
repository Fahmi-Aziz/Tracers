<?php
include '../koneksi.php';
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$nim = $_POST['nim'];
$tahun_lulus = $_POST['tahun_lulus'];
$prodi = $_POST['prodi'];
$usia = $_POST['usia'];
$kelamin = $_POST['kelamin'];
$provinsi = $_POST['provinsi'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telp = $_POST['telp'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $insert = mysqli_query($koneksi, "INSERT INTO kuisioner_alumni (user_id, nama, nik, nim, tahun_lulus, prodi, usia, kelamin, provinsi, alamat, email, telp) VALUES ('$user_id', '$nama', '$nik', '$nim', '$tahun_lulus', '$prodi', '$usia', '$kelamin', '$provinsi', '$alamat', '$email', '$telp')") or die(mysqli_error($koneksi));

    if ($insert) {
        header("location: form2.php");
    } else {
        echo "Gagal Menyimpan Data";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
