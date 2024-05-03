<?php
if (isset($_POST['password-reset-token']) && $_POST['email']) {
    include "koneksi.php";

    $emailId = $_POST['email'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email='" . $emailId . "'");

    $row = mysqli_fetch_array($result);

    if ($row) {
        $token = md5($emailId) . rand(10, 9999);

        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")
        );

        $expDate = date("Y-m-d H:i:s", $expFormat);

        $update = mysqli_query($koneksi, "UPDATE user SET password='" . $password . "', reset_link_token='" . $token . "', exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

        $link = "<a href='localhost/tracers/reset-password.php?key=" . $emailId . "&token=" . $token . "'>Klik untuk Mereset password anda</a>";

        require_once 'vendor/autoload.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = "tracers.tes@gmail.com";
        // GMAIL password
        $mail->Password = "xkbkkfqjzncfzluj";
        $mail->SMTPSecure = "ssl";
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From = 'tracers.tes@gmail.com';
        $mail->FromName = 'Admin Tracer Study';
        $mail->AddAddress($emailId, 'reciever_name');
        $mail->Subject = 'Reset Password';
        $mail->IsHTML(true);
        $mail->Body = 'reset password anda ' . $link . '';

        if ($mail->Send()) {
            echo '<script>alert("Email berhasil dikirm! harap cek inbox anda!");window.location.href = "password-reset-token.php";</script>';
            exit();
        } else {
            echo '<script>alert("Mail Error ->' . $mail->ErrorInfo . '");window.location.href = "forget-password.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Alamat Email tidak valid!");window.location.href = "forget-password.php";</script>';
        exit();
    }
}
?>
