<?php
include '../koneksi.php';
$bersekolah = $_POST['bersekolah'];
$pelatihan = $_POST['pelatihan'];
$jenis_pelatihan = $_POST['jenis_pelatihan'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $update = mysqli_query($koneksi, "UPDATE kuisioner_alumni SET bersekolah = '$bersekolah', pelatihan = '$pelatihan', jenis_pelatihan = '$jenis_pelatihan' WHERE user_id = '$user_id'") or die(mysqli_error($koneksi));

    if ($update) {
        header("Location: form3.php");
        exit();
    } else {
        echo "Gagal Memperbarui Data";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
