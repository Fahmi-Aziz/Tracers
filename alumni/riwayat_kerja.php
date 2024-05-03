<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'alumni') {
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
    <title>Riwayat Kerja</title>
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
            <a class="navbar-brand" href="alumni.php">
                <img src="../gambar/poltek.jpg" alt="Poltek" width="50" height="50">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="alumni.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form.php">Kuisioner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Riwayat Kerja</a>
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
                    </li>


                </ul>
            </div>
        </div>
    </nav><br><br><br>
    <div class="container h-100 d-flex justify-content-center align-items-center bg-light">
        <div class="container-sm rounded-1 w-100 bg-white" style="border-radius: 3rem;">
            <div class="row">
                <div class="col-md-12 p-5 pt-1">
                <?php
                    $riwayat_kerja_user_id = $_SESSION['user_id'];

                    include '../koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM riwayat_kerja WHERE user_id = '$riwayat_kerja_user_id'");

                    if (!$query) {
                        echo "Error, harap ulangi lagi.";
                    }

                    elseif (mysqli_num_rows($query) == 0) {
                        echo "<h4>Hi " . $_SESSION['username'] . "!</h4><br>";
                        echo "<center><h5>Riwayat Kerja Anda Kosong!</h5></center>";
                        echo "<hr><br>";
                        echo '<div class="my-4"></div>';
                        echo '<a href="tambah_riwayat.php" class="btn btn-md w-100 bg-light">Tambah Riwayat Kerja</a>';
                    } else {
                    ?>
                    <h3><i class="fas fa-user-graduate mr-2"></i> Riwayat Kerja</h3>
                    <hr>
                    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahriwayat">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Riwayat Kerja</a>
                    <div class="table-responsive-sm  my-3">
                        <table class="table-striped table-bordered">
                            <thread>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Pendapatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thread>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['nama_perusahaan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['posisi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['durasi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['pendapatan']; ?>
                                    </td>
                                    <td>
                                        <a class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="modal"
                                            data-target="#editkerja<?php echo $data['id']; ?>"></a>&nbsp;&nbsp;
                                        <a class="fas fa-trash-alt bg-danger p-2 text-white rounded"
                                            href="hapus_riwayat.php?id=<?php echo $data['id']; ?>"
                                            onclick="return confirm('Apakah Anda yakin untuk menghapus?')"></a>
                                    </td>
                                </tr>
                                <div class="example-modal">
                                    <div class="modal fade" id="editkerja<?php echo $data['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit Riwayat Kerja</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update_riwayat.php" method="post" role="form">
                                                        <?php
                                                        $id = $data['id'];
                                                        $query1 = mysqli_query($koneksi, "SELECT * FROM riwayat_kerja WHERE id='$id'");
                                                        while ($data1 = mysqli_fetch_assoc($query1)) {
                                                            ?>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Nama
                                                                        Perusahaan :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            name="nama_perusahaan"
                                                                            value="<?php echo $data1['nama_perusahaan']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Posisi
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="posisi"
                                                                            value="<?php echo $data1['posisi']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Durasi
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="durasi"
                                                                            value="<?php echo $data1['durasi']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label text-left">Pendapatan
                                                                        :</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="pendapatan"
                                                                            class="form-control"
                                                                            value="<?php echo $data1['pendapatan']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id" value="<?php echo $data1['id']; ?>">

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
                                <?php
                            }
                            ?>
                    </div>
                    </table>
                    </tbody>
                </div>
            </div>
            <div class="example-modal">
                <div id="tambahriwayat" class="modal fade" role="dialog" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Tambah Data Baru</h3>
                            </div>
                            <div class="modal-body">
                                <form action="simpan_kerja.php" method="post" role="form">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-left">Nama Perusahaan :</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                    name="nama_perusahaan" placeholder="Nama Perusahaan" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-left">Posisi :</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="posisi"
                                                    placeholder="Posisi" value=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-left">Durasi :</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="durasi"
                                                    placeholder="Durasi" id="alamat" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-left">Pendapatan :</label>
                                            <div class="col-sm-8"><input type="text" name="pendapatan"
                                                    class="form-control" placeholder="Pendapatan">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nosave" type="button" class="btn btn-danger pull-left"
                                            data-dismiss="modal">Batal</button>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                            }
                            ?>
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