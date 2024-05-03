<?php
include "pbo.php";

class Register extends Koneksi
{
    public function handleRegister()
    {
        session_start();

        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $connection = $this->getConnection();

            $query = "SELECT * FROM user WHERE username='$username'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                echo '<script>alert("Username sudah digunakan. Silakan gunakan username lain.");</script>';
                echo "<script>window.location.href = 'register.php';</script>";
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user (username, password, role) VALUES ('$username', '$hashedPassword', 'alumni')";
            mysqli_query($connection, $query);

            echo "<script>alert('User Berhasil Ditambah!')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }
}

$Register = new Register();
$Register->handleRegister();
?>
</html>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="gambar/loggooo.png">
    <title>Register</title>

    <style>
        body {
            background-image: url('gambar/login_bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="registration-form">
            <form method="post" action="register.php">
                <h3>
                    <center>Sign up</center>
                </h3>
                <hr>
                <br><br>
                <div class="form-group">
                    <input type="text" class="form-control item" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control item" name="password" placeholder="Password" required>
                </div>
                <a href="forget-password.php" id="warna">
                    <h6>Forget Password?</h6>
                </a><br>
                <button class="btn btn-block create-account" type="submit" name="register">Register</button>
            </form>
            <div class="social-media">
                <a href="login.php" id="warna">
                    <h5>Already have an account?</h5>
                </a>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
</script>
<script src="assets/js/script.js"></script>

</html>