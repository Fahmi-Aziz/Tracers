<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'alumni') {
    header("Location: ../index.php");
    exit();
}
?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="../gambar/loggooo.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>Kuisioner</title>
</head>


<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="alumni.php">
                <img src="../gambar/poltek.jpg" alt="Poltek" width="50" height="50">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="alumni.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="form.php">Kuisioner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat_kerja.php">Riwayat Kerja</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#submenu" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu" id="submenu">
                            <li><a class="dropdown-item" href="edit.php">Edit data</a></li>
                            <li><a class="dropdown-item" href="../logout.php"
                                    onclick="return confirmLogout();">Logout</a></li>
                        </ul>

                        <script>
                            function confirmLogout() {
                                return confirm("Apakah Anda yakin ingin logout?");
                            }
                        </script>
                        <script>
                            $(document).ready(function () {
                                $('.dropdown-toggle').dropdown();
                            });
                        </script>
                        <script>
                            $(document).ready(function () {
                                $('.navbar-toggler').click(function () {
                                    var target = $($(this).attr('data-target'));
                                    if (target.hasClass('show')) {
                                        target.collapse('hide');
                                    } else {
                                        target.collapse('show');
                                    }
                                });
                            });
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br><br><br>
    <div class="container-sm py-2 h-100  bg-light">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card w-100" style="border-radius: 2rem;">
                    <div class="card-body p-3">
                        <h4 class="card-title text-center">Kuisioner</h4>
                        <hr class="lg-5">
                        </hr>
                        <?php
                        $alumni_user_id = $_SESSION['user_id'];
                        include '../koneksi.php';

                        $query = mysqli_query($koneksi, "SELECT * FROM kuisioner_alumni WHERE user_id = '$alumni_user_id'");
                        $query1 = mysqli_query($koneksi, "SELECT * FROM kuisioner_alumni WHERE user_id = '$alumni_user_id' AND bersekolah IS NULL AND ketenagakerjaan IS  NULL");
                        $query2 = mysqli_query($koneksi, "SELECT * FROM kuisioner_alumni WHERE user_id = '$alumni_user_id' AND bersekolah IS NOT NULL AND ketenagakerjaan IS  NULL");
                        
                        if (mysqli_num_rows($query) == 0) {
                            echo "<center>Para alumni yang terhormat, saat ini kami sedang mengadakan Tracer Study kepada alumni Polibatam.<br></center>";
                            echo "<center>Studi ini dilakukan dalam rangka mengidentifikasi keberadaan alumni setelah lulus kuliah.<br></center>";
                            echo "<center>Tujuan studi ini untuk mengevaluasi proses dan hasil perkuliahan, penyempurnaan serta penjaminan kualitas pembelajaran di Polibatam.<br></center>";
                            echo "<center>Berkaitan dengan hal tersebut kami mohon partisipasi saudara meluangkan waktu untuk menjawab pertanyaan dalam kuisioner ini, data yang telah disampaikan akan dijaga kerahasiaannya.<br></center>";
                            echo "<center>Atas perhatian dan kerjasama yang baik serta bantuannya, kami mengucapkan terima kasih.<br></center>";
                            echo "<center>🙏</center>";
                            echo '<div class="my-4"></div>';
                            echo '<a href="form1.php" class="btn btn-md w-100 bg-light">Isi Kuisioner</a>';

                        }elseif ($row = mysqli_fetch_assoc($query1)) {
                            echo "<center>Para alumni yang terhormat, saat ini kami sedang mengadakan Tracer Study kepada alumni Polibatam.<br></center>";
                            echo "<center>Studi ini dilakukan dalam rangka mengidentifikasi keberadaan alumni setelah lulus kuliah.<br></center>";
                            echo "<center>Tujuan studi ini untuk mengevaluasi proses dan hasil perkuliahan, penyempurnaan serta penjaminan kualitas pembelajaran di Polibatam.<br></center>";
                            echo "<center>Berkaitan dengan hal tersebut kami mohon partisipasi saudara meluangkan waktu untuk menjawab pertanyaan dalam kuisioner ini, data yang telah disampaikan akan dijaga kerahasiaannya.<br></center>";
                            echo "<center>Atas perhatian dan kerjasama yang baik serta bantuannya, kami mengucapkan terima kasih.<br></center>";
                            echo "<center>🙏</center>";
                            echo '<div class="my-4"></div>';
                            echo '<a href="form2.php" class="btn btn-md w-100 bg-light">Lanjutkan Mengisi Kuisioner</a>';
                            
                        }elseif ($row = mysqli_fetch_assoc($query2)) {
                            echo "<center>Para alumni yang terhormat, saat ini kami sedang mengadakan Tracer Study kepada alumni Polibatam.<br></center>";
                            echo "<center>Studi ini dilakukan dalam rangka mengidentifikasi keberadaan alumni setelah lulus kuliah.<br></center>";
                            echo "<center>Tujuan studi ini untuk mengevaluasi proses dan hasil perkuliahan, penyempurnaan serta penjaminan kualitas pembelajaran di Polibatam.<br></center>";
                            echo "<center>Berkaitan dengan hal tersebut kami mohon partisipasi saudara meluangkan waktu untuk menjawab pertanyaan dalam kuisioner ini, data yang telah disampaikan akan dijaga kerahasiaannya.<br></center>";
                            echo "<center>Atas perhatian dan kerjasama yang baik serta bantuannya, kami mengucapkan terima kasih.<br></center>";
                            echo "<center>🙏</center>";
                            echo '<div class="my-4"></div>';
                            echo '<a href="form3.php" class="btn btn-md w-100 bg-light">Lanjutkan Mengisi Kuisioner</a>';
                        }else{
                        ?>
                        <h4 class="card-text my-5">
                            <center>Terimakasih Sudah Mengisi Kuisioner!</center>
                        </h4>
                        <hr class="sm-3">
                        <p class="card-text"><small class="text-muted">Data Anda akan kami pastikan aman dan
                                terjaga.</small></p>
                    </div>
                </div>
                <a href="alumni.php" class="btn btn-md w-100 bg-white">Home</a>
            </div>
            <div class="my-4"></div>
                            <?php
                        }
                        ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <!-- include script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

</body>

</html>