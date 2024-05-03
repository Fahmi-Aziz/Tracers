<?php
include '../koneksi.php';
$nama_alumni = $_POST['nama_alumni'];
$posisi = $_POST['posisi'];
$pertanyaan1 = $_POST['pertanyaan1'];
$pertanyaan2 = $_POST['pertanyaan2'];
$pertanyaan3 = $_POST['pertanyaan3'];
$pertanyaan4 = $_POST['pertanyaan4'];
$pertanyaan5 = $_POST['pertanyaan5'];
$pertanyaan6= $_POST['pertanyaan6'];
$pertanyaan7 = $_POST['pertanyaan7'];
$pertanyaan8 = $_POST['pertanyaan8'];
$pertanyaan9 = $_POST['pertanyaan9'];
$pertanyaan10 = $_POST['pertanyaan10'];
$pertanyaan11 = $_POST['pertanyaan11'];
$pertanyaan12 = $_POST['pertanyaan12'];
$pertanyaan13 = $_POST['pertanyaan13'];
$pertanyaan14 = $_POST['pertanyaan14'];
$pertanyaan15 = $_POST['pertanyaan15'];
$pertanyaan16 = $_POST['pertanyaan16'];
$pertanyaan17 = $_POST['pertanyaan17'];
$pertanyaan18 = $_POST['pertanyaan18'];
$pertanyaan19 = $_POST['pertanyaan19'];
$pertanyaan20 = $_POST['pertanyaan20'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $pertanyaan19s = implode(", ", $pertanyaan19);
    $update = mysqli_query($koneksi, "UPDATE kuisioner_perusahaan SET nama_alumni = '$nama_alumni', posisi = '$posisi', pertanyaan1 = '$pertanyaan1', pertanyaan2 = '$pertanyaan2', pertanyaan3 = '$pertanyaan3', pertanyaan4 = '$pertanyaan4', pertanyaan5 = '$pertanyaan5', pertanyaan6 = '$pertanyaan6', pertanyaan7 = '$pertanyaan7', pertanyaan8 = '$pertanyaan8', pertanyaan9 = '$pertanyaan9', pertanyaan10 = '$pertanyaan10', pertanyaan11 = '$pertanyaan11', pertanyaan12 = '$pertanyaan12', pertanyaan13 = '$pertanyaan13', pertanyaan14 = '$pertanyaan14', pertanyaan15 = '$pertanyaan15', pertanyaan16 = '$pertanyaan16', pertanyaan17 = '$pertanyaan17', pertanyaan18 = '$pertanyaan18', pertanyaan19 = '$pertanyaan19s', pertanyaan20 = '$pertanyaan20' WHERE user_id = '$user_id'") or die(mysqli_error($koneksi));

    if ($update) {
        echo "<script>alert('Data berhasil di simpan!');</script>";
        echo "<script>window.location.href = 'form.php';</script>";
        exit();
    } else {
        echo "<script>alert('Terjadi Kesalahan, Harap ulangi');</script>";
        echo "<script>window.location.href = 'form.php';</script>";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
