<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Indekost Wisma UI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-box-body">
        <p class="login-box-msg"><center><h3>Sistem Informasi Indekost Wisma UI</h3></center></p><hr>
        <?php
        session_start();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
        include "koneksi.php";

        if ($_POST['kirim'])
        {

          $email=$_POST['email'];

          $cek=mysqli_query($koneksi,"select*from user where BINARY email='$email' ");
          $cek1=mysqli_num_rows($cek);

          if ($cek1==1) {

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randstring = '';
            for ($i = 0; $i < 10; $i++) {
                $randstring .= $characters[rand(0, strlen($characters))];
            }

            $to      = $email;
            $subject = 'Reset Password SIKOSUI';

            $headers .= 'From: Wisma UI<nurhudacoc@gmail.com>' . "\r\n" .
            'Reply-To: nurhudacoc@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            $message = "
            Hai, ".$email."
            Sepertinya anda telah lupa password untuk masuk SIKOSUI.
            Sekarang anda dapat masuk SIKOSUI dengan menggunakan password berikut ini : ".$randstring."
            Kami merekomendasikan anda agar mengubah password setelah masuk kedalam sistem.
            PENTING : Jika anda merasa tidak melakukan reset password ini,mohon segera menghubungi pemilik atau pengelola Wisma UI demi keamanan data dan informasi anda.
            Terima Kasih.
            ";

            $query=mysqli_query($koneksi, "update user set password='$randstring' where email='$email' ");

            $s4=mail($to, $subject, $message, $headers);

            if ($query && $s4)
            {
              echo "<div class='alert alert-success'><p>Konfirmasi reset password telah dikirim ke email anda.
              Silahkan buka email anda untuk proses selanjutnya.</p></div>";
            }
            else
            {
              echo "<div class='alert alert-error'><p>Maaf, gagal mereset akun.</p></div>";
            }
          }
          else {
            echo "<div class='alert alert-error'><p>Maaf, akun dengan email tersebut tidak ada didalam sistem.</p></div>";
          }
        }
        ?>
        <p><h4><i class="fa fa-key"></i>&nbsp;Lupa password</h4></p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            Masukkan email anda untuk mereset password
            <p class="help-block"><i>Jika anda lupa email, silahkan hubungi pemilik kost</i></p>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" name="kirim" class="btn btn-primary btn-block btn-flat" value="Kirim">
            </div><!-- /.col -->
          </div>
        </form>

        <a href="login.php">Masuk sistem</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
