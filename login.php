<?php
include "pbo.php";

class Login extends Koneksi
{
    public function handleLogin()
    {
        session_start();

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $connection = $this->getConnection();

            $query = "SELECT * FROM user WHERE username='$username'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];

                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];

                    if ($row['role'] == 'admin') {
                        header('location: admin/admin.php');
                    } elseif ($row['role'] == 'alumni') {
                        header('location: alumni/alumni.php');
                    } elseif ($row['role'] == 'perusahaan') {
                        header('location: perusahaan/perusahaan.php');
                    }
                } else {
                    echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
                }
            } else {
                echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
            }
        } elseif (isset($_POST['forgot-password'])) {
            header('location: forgot-password.php');
        }
    }
}

$Login = new Login();
$Login->handleLogin();
?>

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
  <title>Login</title>

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
      <form method="post" action="login.php">
        <h3>
          <center>Sign in</center>
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
        <button class="btn btn-block create-account" type="submit" name="login">Login</button>
      </form>
      <div class="social-media">
        <a href="register.php" id="warna">
          <h5>Doesnt have an account?</h5>
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