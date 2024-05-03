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
    <title>Reset Password</title>

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
            <?php
            if (isset($_GET['key']) && isset($_GET['token'])) {
                include "koneksi.php";
                $email = $_GET['key'];
                $token = $_GET['token'];
                $query = mysqli_query(
                    $koneksi,
                    "SELECT * FROM `user` WHERE `reset_link_token`='" . $token . "' and `email`='" . $email . "';"
                );
                $curDate = date("Y-m-d H:i:s");
                if (mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_array($query);
                    if ($row['exp_date'] >= $curDate) { ?>
                        <form method="post" action="update-forget-password.php">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <input type="hidden" name="reset_link_token" value="<?php echo $token; ?>">
                            <h3>
                                <center>Reset Your Password</center>
                            </h3>
                            <hr>
                            <br><br>
                            <div class="form-group">
                                <input type="password" class="form-control item" name="password" placeholder="New Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control item" name="confirm_password"
                                    placeholder="Re-Type New Password" required>
                            </div>
                            <a href="forget-password.php" id="warna">
                                <h6>Forget Password?</h6>
                            </a><br>
                            <button class="btn btn-block create-account" type="submit">Reset Password</button>
                        </form>

                        <div class="social-media">
                            <a href="login.php" id="warna">
                                <h5>Already have an account?</h5>
                            </a>
                        </div>
                    <?php } else { ?>
                        <p>This forget password link has been expired</p>
                    <?php }
                } else { ?>
            <p>This forget password link is invalid</p>
            <?php }
            }
            ?>
        </div>
    </div>
</body>

</html>