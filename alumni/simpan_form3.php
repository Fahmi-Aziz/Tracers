<?php
include '../koneksi.php';
$ketenagakerjaan = $_POST['ketenagakerjaan'];

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $ketenagakerjaan2 = implode(", ", $ketenagakerjaan);
    $update = mysqli_query($koneksi, "UPDATE kuisioner_alumni SET ketenagakerjaan = '$ketenagakerjaan2' WHERE user_id = '$user_id'") or die(mysqli_error($koneksi));

    if ($update) {
        echo "<script>alert('Data berhasil disimpan!');</script>";
        echo "<script>window.location.href = 'form.php';</script>";
        exit();
    } else {
        echo "Gagal Memperbarui Data";
    }
} else {
    echo "Gagal mendapatkan user_id";
}
?>
