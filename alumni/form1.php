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
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <link rel="shortcut icon" type="image/png" href="../gambar/loggooo.png">
     <title>Kuisioner</title>
     <style>
        .form-control {
            width: 70%;
            height: 3rem;
            border-radius: 0.5rem;
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
                              <a class="nav-link active" href="#">Kuisioner</a>
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
                         </li>
                    </ul>
               </div>
          </div>
     </nav><br>
     <div class="container-sm py-2 h-100  bg-light">
          <div class="row d-flex justify-content-center align-items-center">
               <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card w-100" style="border-radius: 2rem;">
                         <div class="card-body p-3">
                              <form action="simpan_form.php" method="post">
                                   <h3 class="card-title">Data Umum Responden </h3>
                                   <hr class="lg-5">
                                   </hr>
                                   <div class="form-group">
                                        <label for="nama"><b>Nama :</label></b>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                             placeholder="e.g reynaldi" required>
                                   </div>

                                   <div class="form-group">
                                        <label for="nik"><b>Nomor Induk Kependudukan (NIK) :</label></b>
                                        <input type="text" class="form-control" name="nik" id="nik"
                                             placeholder="e.g 21711100000" required>
                                   </div>

                                   <div class="form-group">
                                        <label for="NIM"><b>Nomor Induk Mahasiswa (NIM) :</label></b>
                                        <input type="text" class="form-control" name="nim" id="NIM" placeholder="NIM"
                                             required>
                                   </div>

                                   <div class="form-group">
                                        <label for="Tahun"><b>Tahun Lulus :</label></b>
                                        <input type="text" class="form-control" name="tahun_lulus" id="Tahun"
                                             placeholder="e.g 2012" required>
                                   </div>

                                   <div class="form-group">
                                        <label for="Prodi"><b>Prodi :</label></b>
                                        <input type="text" class="form-control" name="prodi" id="Prodi"
                                             placeholder="e.g eknik Informatika" required>
                                   </div>

                                   <div class="form-group">
                                        <label for="Usia"><b>Usia :</label></b>
                                        <input type="number" class="form-control" name="usia" min="0" max="120" required
                                             placeholder="Usia Anda" required>
                                   </div>

                                   <div class="form-group">
                                        <label><b>Jenis kelamin :</b></label><br>
                                        <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="kelamin" id="laki-laki"
                                                  value="laki-laki">
                                             <label class="form-check-label" for="laki-laki"><b>Laki-laki</label></b>
                                        </div>
                                        <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="kelamin" id="perempuan"
                                                  value="perempuan">
                                             <label class="form-check-label" for="perempuan"><b>Perempuan</label></b>
                                        </div>
                                   </div>

                                   <div class="form-group">
                                        <label for="Prov"><b>Provinsi tempat tinggal sekarang:</label></b>
                                        <input type="text" class="form-control" name="provinsi" id="Prov"
                                             placeholder="e.g Kepulauan Riau" required>
                                   </div>

                                   <div class="form-group">
                                        <label for="Alamat"><b>Alamat:</label></b>
                                        <input type="text" class="form-control" name="alamat" id="Alamat"
                                             placeholder="e.g Perum Batu Aji Blok ... No..." required>
                                   </div>

                                   <div class="form-group">
                                        <label for="Email"><b>Email:</label></b>
                                        <input type="email" class="form-control" name="email" id="Email"
                                             placeholder="e.g Email@gmail.com" required>
                                   </div>

                                   <div class="form-group">
                                        <label for="NO"><b>No. HP / WA aktif:</label></b>
                                        <input type="text" class="form-control" name="telp" id="NO"
                                             placeholder="e.g 081234567890" required>
                                   </div><br>
                                   <hr>
                                   <div class="card-body w-100 text-right">
                                        <button type="submit" class="btn btn-secondary text-center"
                                             style="width: 7rem;">Save</button>
                                   </div>
                              </form>
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