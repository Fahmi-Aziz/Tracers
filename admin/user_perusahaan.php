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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="../gambar/loggooo.png">
    <title>User Perusahaan</title>
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
                        <a class="nav-link" aria-current="page" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_alumni.php">User Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="akun_alumni.php">Akun Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="user_perusahaan.php">User Perusahaan</a>
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
    <div class="container-sm h-100 d-flex justify-content-center align-items-center bg-light">
        <div class="container-sm rounded-1 w-100 bg-white" style="border-radius: 3rem;">
            <div class="row">
                <div class="col-md-12 p-5 pt-1">
                    <h4><i class="fas fa-user-graduate mr-2"></i> Daftar Perusahaan</h4>
                    <hr>
                    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahalumni">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Data Perusahaan</a>
                    <div class="table-responsive my-3">
                        <table id="example" class="table-striped table-bordered my-3">
                            <thead>
                            <tr>
                                <td>NO</td>
                                <td>ID User</td>
                                <td>Nama Perusahaan</td>
                                <td>Email</td>
                                <td>Alamat</td>
                                <td>AKSI</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../koneksi.php';

                            $query = mysqli_query($koneksi, "SELECT * FROM perusahaan");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['user_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['alamat']; ?>
                                    </td>
                                    <td>
                                        <a class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="modal"
                                            data-target="#editmhs<?php echo $data['user_id']; ?>"></a>&nbsp;&nbsp;
                                        <a class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="modal"
                                            data-target="#deletemhs<?php echo $data['user_id']; ?>"></a>&nbsp;&nbsp;
                                        <a class="fas fa-eye bg-primary p-2 text-white rounded" data-toggle="modal"
                                            data-target="#lihatmhs<?php echo $data['user_id']; ?>"></a>&nbsp;&nbsp;

                                    </td>
                                </tr>
                                <!-- Update Modal -->
                                <div class="example-modal">
                                    <div class="modal fade" id="editmhs<?php echo $data['user_id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit Data Perusahaan</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="update_perusahaan.php?user_id=<?php echo $data['user_id']; ?>"
                                                        method="post" role="form">
                                                        <?php
                                                        $user_id = $data['user_id'];
                                                        $query1 = mysqli_query($koneksi, "SELECT * FROM perusahaan WHERE user_id='$user_id'");
                                                        while ($data1 = mysqli_fetch_assoc($query1)) {
                                                            ?>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Nama
                                                                        Perusahaan :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="nama"
                                                                            value="<?php echo $data1['nama']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Email
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="email"
                                                                            value="<?php echo $data1['email']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Telepon
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="telp" class="form-control"
                                                                            value="<?php echo $data1['telp']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">
                                                                        Alamat</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="alamat" class="form-control"
                                                                            value="<?php echo $data1['alamat']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button id="noedit" type="button"
                                                                    class="btn btn-danger pull-left"
                                                                    data-dismiss="modal">Batal</button>
                                                                <input type="submit" name="submit" class="btn btn-primary"
                                                                    value="Update">
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal delete-->
                                <div class="example-modal">
                                    <div id="deletemhs<?php echo $data['user_id']; ?>" class="modal fade" role="dialog"
                                        style="display:none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 align="center">Apakah anda yakin ingin menghapus user dengan ID
                                                        <?php echo $data['user_id']; ?>?
                                                    </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                                        data-dismiss="modal">Cancel</button>
                                                    <a href="hapus_perusahaan.php?user_id=<?php echo $data['user_id']; ?>"
                                                        class="btn btn-primary">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Lihat Modal -->
                                <div class="modal fade" id="lihatmhs<?php echo $data['user_id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Data Pribadi Perusahaan
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row my-10">
                                                    <div class="col-md-5">
                                                        <p class="card-text"><b>User ID</b> :
                                                            <?php echo $data['user_id']; ?>
                                                        </p>
                                                        <p class="card-text"><b>Nama</b> :
                                                            <?php echo $data['nama']; ?>
                                                        </p>
                                                        <p class="card-text"><b>Alamat</b> :
                                                            <?php echo $data['alamat']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="card-text"><b>No Telepon</b> :
                                                            <?php echo $data['telp']; ?>
                                                        </p>
                                                        <p class="card-text"><b>Email</b> :
                                                            <?php echo $data['email']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="example-modal">
                            <div class="modal fade" id="tambahalumni" role="dialog">
                                <div class="modal-dialog modal-lg width-50">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h3 class="modal-title mx-auto">Tambah Data Perusahaan</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form action="tambah_data_perusahaan.php" method="post" role="form">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-left">ID User
                                                            :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="user_id"
                                                                value=""
                                                                placeholder="untuk user id yang tidak memiliki data">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-left">Nama :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="nama" value=""
                                                                placeholder="Masukkan Nama Perusahaan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-left">Email :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="email"
                                                                value="" placeholder="Masukkan Email Perusahaan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-left">Telepon
                                                            :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="telp" value=""
                                                                placeholder="Masukkan Telepon Perusahaan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-left">Alamat :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="alamat" class="form-control"
                                                                value="" placeholder="Masukkan Alamat Perusahaan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="noedit" type="button" class="btn btn-danger pull-left"
                                                        data-dismiss="modal">Batal</button>
                                                    <input type="submit" name="submit" class="btn btn-primary"
                                                        value="Update">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- include script -->
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script> $(document).ready(function () {
            $('#example').DataTable();
        });</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>