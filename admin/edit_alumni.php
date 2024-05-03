<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
?>
<!doctype html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>Edit Alumni</title>
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
            <a class="navbar-brand" href="admin.php">
                <img src="../gambar/poltek.jpg" alt="Poltek" width="50" height="50">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_alumni.php">User Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="akun_alumni.php">Akun Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_perusahaan.php">User Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="akun_perusahaan.php">Akun Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="export_kuisioner.php">Export Kuisioner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="export_riwayat_kerja.php">Export Riwayat Kerja</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#submenu" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" id="submenu">
                            <li><a class="dropdown-item" href="../logout.php"
                                    onclick="return confirmLogout();">Logout</a></li>
                        </ul>

                        <script>
                            function confirmLogout() {
                                return confirm("Apakah Anda yakin ingin logout?");
                            }
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br><br><br>
    <div class="container h-100 d-flex justify-content-center align-items-center bg-light">
        <div class="container w-75 bg-light">
            <div class="row">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            if (!isset($_SESSION['username'])) {
                                header("Location: ../index.php");
                                exit();
                            }
                            ?>
                        </h5>
                        <h3><i class="fas fa-chalkboard-teacher mr-2"></i> Edit Data Alumni</h3>
                        <hr>
                        <form action="SSupdate_alumni.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>NIM</label>
                                    <input type="text" name="nim" class="form-control" id="nim" value="<?php echo $data1['nim']; ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>No Telepon:</label>
                                    <input type="text" name="telp" class="form-control" id="telp" value="<?php echo $data1['telp']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data1['nama']; ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="kelamin" class="form-control" id="kelamin" value="<?php echo $data1['kelamin']; ?>">
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Prodi</label>
                                    <input type="text" name="prodi" class="form-control" id="prodi" value="<?php echo $data1['prodi']; ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>IPK</label>
                                    <input type="text" name="ipk" class="form-control" id="ipk" value="<?php echo $data1['ipk']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $data1['email']; ?>">
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
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>