<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Kost Wisma UI</title>
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
        <p class="login-box-msg"><center><h3>Sistem Informasi Kost Wisma UI</h3></center></p><hr>
        <?php
        session_start();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
        include "koneksi.php";

        if ($_POST['masuk'])
        {
          $email=$_POST['email'];
          $password=$_POST['password'];
          $p=mysqli_query($koneksi,"select*from user where BINARY email='$email' and BINARY password='$password'");
          $r=mysqli_fetch_array($p);
          $jum=mysqli_num_rows($p);

          if ($jum==1)
          {
            $_SESSION['auth_email']=$r[email];
            $_SESSION['auth_hak_akses']=$r[hak_akses];
            $_SESSION['user_id']=$r[id_user];
              header("location:index.php");
          }
          else
          {
            echo "<div class='alert alert-error'><p>Maaf, email atau password anda salah.</p></div><br>";
          }
        }
        ?>
        <p><h4><i class="fa fa-users"></i>&nbsp;Masuk sistem</h4></p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" name="masuk" class="btn btn-primary btn-block btn-flat" value="Masuk">
            </div><!-- /.col -->
          </div>
        </form>

        <a href="forgot.php">Lupa password?</a><br><a href="daftaruser.php">Belum Punya Akun?</a><br>
        <a href="http://3.87.231.198">Kembali ke Website Wisma UI</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      // show the alert
      window.setTimeout(function() {
          $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
              $(this).remove();
          });
      }, 3000);
    </script>
  </body>
</html>
