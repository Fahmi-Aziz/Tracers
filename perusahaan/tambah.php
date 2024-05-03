<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'perusahaan') {
    header("Location: ../index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">


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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="../gambar/loggooo.png">
    <title>Tambah Data Perusahaan</title>
    <style>
        .container {
            width: 70%;
        }
    </style>

</head>
<script>
    $('.navbar-toggler').click(function () {
        var target = $($(this).attr('data-target'));
        if (target.hasClass('show')) {
            target.collapse('hide');
        } else {
            target.collapse('show');
        }
    });
</script>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="perusahaan.php">
                <img src="../gambar/poltek.jpg" alt="Poltek" width="50" height="50">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="perusahaan.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form.php">Kuisioner</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#submenu" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu" id="submenu">
                            <li><a class="dropdown-item" href="edit.php">Edit data</a></li>
                            <li><a class="dropdown-item" href="../logout.php" onclick="return Logout();">Logout</a></li>
                        </ul>

                        <script>
                            function Logout() {
                                return confirm("Apakah Anda yakin ingin logout?");
                            }
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
                        <h5 class="card-title">
                        </h5>
                        <h3><i class="fas fa-chalkboard-teacher mr-2"></i> Tambah Data Perusahaan</h3>
                        <hr>
                        <form action="simpan_perusahaan.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Telepon</label>
                                    <input type="text" name="telp" class="form-control" id="telp">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>