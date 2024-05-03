<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah ada, Harap pilih yang lain!');</script>";
        echo "<script>window.location.href = 'akun_perusahaan.php';</script>";
        exit;
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";
        mysqli_query($koneksi, $query);
        echo "<script>alert('User berhasil ditambahkan!');</script>";
        echo "<script>window.location.href = 'akun_perusahaan.php';</script>";
        exit;
    }
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
    <title>Akun Perusahaan</title>
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
                        <a class="nav-link" href="user_perusahaan.php">User Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="akun_perusahaan.php">Akun Perusahaan</a>
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
                    <h4><i class="fas fa-user-graduate mr-2"></i> Akun Perusahaan</h4>
                    <hr>
                    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahmhs">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Akun Perusahaan</a>
                    <div class="table-responsive my-3">
                        <table id="example" class="table-striped table-bordered my-3">
                            <thead>
                                <tr>
                                    <td>NO</td>
                                    <td>User Id</td>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td>AKSI</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include '../koneksi.php';

                            $query = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'perusahaan'");

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
                                        <?php echo $data['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['email']; ?>
                                    <td>
                                        <a class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="modal"
                                            data-target="#editmhs<?php echo $data['user_id']; ?>"></a>&nbsp;&nbsp;
                                        <a class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="modal"
                                            data-target="#deletemhs<?php echo $data['user_id']; ?>"></a>
                                    </td>
                                </tr>
                                <!-- Update Modal -->
                                <div class="example-modal">
                                    <div class="modal fade" id="editmhs<?php echo $data['user_id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit Akun Perusahaan</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="update_akun_perusahaan.php?user_id=<?php echo $data['user_id']; ?>"
                                                        method="post" role="form">
                                                        <?php
                                                        $user_id = $data['user_id'];
                                                        $query1 = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
                                                        while ($data1 = mysqli_fetch_assoc($query1)) {
                                                            ?>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Username
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="username"
                                                                            value="<?php echo $data1['username']; ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Email
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="email" class="form-control" name="email"
                                                                            value="<?php echo $data1['email']; ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Password
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="password" class="form-control"
                                                                            name="password" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button id="noedit" type="button"
                                                                    class="btn btn-danger pull-left"
                                                                    data-dismiss="modal">Batal</button>
                                                                <input type="submit" name="update" class="btn btn-primary"
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
                                                    <h3 class="modal-title">Konfirmasi Hapus Akun</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 align="center">Apakah anda yakin ingin menghapus akun dengan User ID
                                                        <?php echo $data['user_id']; ?>?
                                                    </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                                        data-dismiss="modal">Cancel</button>
                                                    <a href="hapus_akun_perusahaan.php?user_id=<?php echo $data['user_id']; ?>"
                                                        class="btn btn-primary">Delete</a>
                                                </div>
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
                        <div id="tambahmhs" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Tambah User Baru</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="akun_perusahaan.php" method="post" role="form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-left">Username :</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="username"
                                                            placeholder="Username" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-left">Password :</label>
                                                    <div class="col-sm-8">
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-left">Role :</label>
                                                    <div class="col-sm-8">
                                                        <select name="role" class="form-control" required>
                                                            <option value="perusahaan">Perusahaan</option>
                                                            <option value="alumni">Alumni</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="nosave" type="button" class="btn btn-danger pull-left"
                                                    data-dismiss="modal">Batal</button>
                                                <input type="submit" name="register" class="btn btn-primary">
                                            </div>
                                        </form>
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