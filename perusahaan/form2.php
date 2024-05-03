<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'perusahaan') {
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
        .container {
            width: 70%;
        }
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
            <a class="navbar-brand" href="perusahaan.php">
                <img src="../gambar/poltek.jpg" alt="Poltek" width="50" height="50">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="perusahaan.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="form2.php">Kuisioner</a>
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
                        <form action="simpan_form1.php" method="post">
                            <h3 class="card-title">Bagian 2. Kuesioner Penilaian Terhadap Kinerja Alumni</h3>
                            <hr class="lg-5">
                            </hr>
                            <div class="form-group">
                                <label for="nama_alumni">
                                    <h6>Nama Alumni</h6>
                                </label>
                                <input type="text" class="form-control" name="nama_alumni" id="nama_alumni"
                                    placeholder="nama" required>
                            </div>

                            <div class="form-group">
                                <label for="posisi">
                                    <h6>Posisi</h6>
                                </label>
                                <input type="text" class="form-control" name="posisi" id="posisi"
                                    placeholder="e.g welder" required>
                            </div>

                            <div>
                                <p>
                                <h6>Apakah alumni bekerja pada bidang yang sesuai dengan keahliannya?</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan1" value="Ya" required>
                                    <label class="form-check-label">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan1" value="Tidak"
                                        required>
                                    <label class="form-check-label">
                                        Tidak
                                    </label>
                                </div>
                            </div><br>

                            <h6>
                                <h6>Dalam mengikuti peraturan yang ada di perusahaan, apakah alumni sudah memenuhi
                                    standar perusahaan dalam hal ini? (Silakan pilih salah satu)</h6>
                            </h6>
                            <div class="form-group">
                                <p>
                                <h6>Tingkat kehadiran / The level of attendance</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan2" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan2" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan2" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan2" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Tingkat Kedisiplinan / The level of discipline</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan3" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan3" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan3" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan3" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Kemampuan menyelesaikan pekerjaan / The ability to get the job</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan4" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan4" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan4" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan4" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Tingkat kreatifitas dan kemampuan berinisiatif / The level of initiative,
                                    creativity and ability</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan5" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan5" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan5" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan5" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Kemampuan berkomunikasi / The Ability to communicate</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan6" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan6" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan6" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan6" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Kemampuan beradaptasi dengan lingkungan kerja / The ability to adapt to
                                    the work environment</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan7" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan7" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan7" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan7" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Kemampuan bersosialisasi dalam lingkungan kerja / The ability to socialize
                                    in a work environment</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan8" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan8" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan8" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan8" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Sopan santun / The manners of politeness</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan9" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan9" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan9" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan9" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Kerapian dalam berbusana / The Neatness in apparels</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan10" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan10" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan10" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan10" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Integritas (etika dan moral) / The Integrity (ethical and moral)</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan11" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan11" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan11" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan11" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Keahlian berdasarkan bidang ilmu (kompetensi utama) / The skill based on
                                    the knowledge (core competency)</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan12" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan12" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan12" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan12" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Bahasa Inggris / English language</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan13" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan13" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan13" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan13" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Penggunaan teknologi informasi / The use of information technology</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan14" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan14" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan14" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan14" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Kerjasama tim / team Cooperation</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan15" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan15" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan15" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan15" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>
                                <h6>Pengembangan diri / Self Development</h6>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan16" value="Baik Sekali"
                                        required>
                                    <label class="form-check-label">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan16" value="Baik"
                                        required>
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan16" value="Cukup"
                                        required>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan16" value="kurang"
                                        required>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="pertanyaan17">
                                    <h6>Berdasarkan pengamatan Bapak/Ibu terhadap kinerja
                                        alumni Politeknik Negeri Batam keterampilan atau ilmu pengetahuan apa
                                        yang harus dikembangkan agar relevan dengan kebutuhan
                                        perusahaan
                                </label></h6>
                                <input type="text" class="form-control" name="pertanyaan17" id="okok" required>
                            </div>
                            <div class="form-group">
                                <label for="pertanyaan18">
                                    <h6>Sertifikasi apa yang perlu dimiliki oleh mahasiswa
                                        kami agar relevan dengan bidang pekerjaan di perusahaan
                                        Bapak/Ibu
                                </label></h6>
                                <input type="text" class="form-control" name="pertanyaan18" id="okok" required>
                            </div>
                            <div class="form-group" required>
                                <h6> Untuk perbaikan pelaksanaan perekrutan terhadap alumni Politeknik Negeri
                                    Batam di masa yang akan datang, menurut Bapak/Ibu apa yang perlu
                                    dilaksanakan oleh pengelola Politeknik Negeri Batam (jawaban bisa lebih
                                    dari satu)</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaan19[]"
                                        value="Meningkatkan komunikasi dengan perusahaan">
                                    <label class="form-check-label">
                                        Meningkatkan komunikasi dengan perusahaan
                                    </label><br>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaan19[]"
                                        value="Membangun kerjasama untuk perekrutan dengan perusahaan">
                                    <label class="form-check-label">
                                        Membangun kerjasama untuk perekrutan dengan perusahaan
                                    </label><br>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaan19[]"
                                        value="Menyediakan fasilitas dan infrastruktur yang memadai">
                                    <label class="form-check-label">
                                        Menyediakan fasilitas dan infrastruktur yang memadai
                                    </label><br>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaan19[]"
                                        value="Meningkatkan keterampilan calon alumni">
                                    <label class="form-check-label">
                                        Meningkatkan keterampilan calon alumni
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaan19[]"
                                        value="Meningkatkan kompetensi akademik calon alumni">
                                    <label class="form-check-label">
                                        Meningkatkan kompetensi akademik calon alumni
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaan19[]"
                                        value="Lainnya">
                                    <label class="form-check-label" for="radioKurang2">
                                        Lainnya
                                    </label><br><br>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pertanyaan19[]"
                                        placeholder="Lainnya... (titik jika tidak ada)" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6>Dalam setiap tahunnya kami akan mewisuda alumni Politeknik Negeri Batam,
                                    bersediakah Perusahaan Bapak menerima alumni Politeknik batam</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan20" value="Ya"
                                        required>
                                    <label class="form-check-label">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pertanyaan20" value="Tidak"
                                        required>
                                    <label class="form-check-label">
                                        Tidak
                                    </label>
                                </div>
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