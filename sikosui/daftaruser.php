<!DOCTYPE html>
<html>
  <head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- Horizontal Form -->
        <div class="box box-success">
          <div class="box-header with-border">
          <?php
            session_start();
            include "koneksi.php";
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

            if ($_POST['tambah'])
            {
              $email=$_POST['email'];
              $password=$_POST['password'];
              $cekpassword=$_POST['cekpassword'];
              $cek=mysqli_query($koneksi,"select * from user where email='$email' ");
              $cek1=mysqli_num_rows($cek);

              if ($password != $cekpassword)
              {
                echo "<div class='alert alert-error'><h4>Maaf, password tidak sesuai.</h4></div><br>";
              }

              elseif ($cek1==1){
              echo "<div class='alert alert-error'><h4>Maaf, email sudah terdaftar, silahkan login atau gunakan email lain.</h4></div><br>";
            }
            else {

                    $s=mysqli_query($koneksi,"insert into User (email,password,hak_akses)
                          values('$email','$password','Penghuni')");
                    if ($s)
                    {
                        echo "<div class='alert alert-success'><h4>Pendaftaran berhasil, silahkan login</h4></div><br>";
                        echo "<meta http-equiv=refresh content=2;url=login.php>";

                    }
                    else
                    {
                        $er=mysqli_error($koneksi);
                        echo "<div class='alert alert-error'><h4>Warning $er</h4></div><br>";
                    }

                }
              }
            ?>
          </div><!-- /.box-header -->
          <!-- form start -->
          <body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><h2><b>Wisma UI</b></h2></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"><center><h3>Daftar User Baru</h3></center></p>

    <form action="" method="post">

      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Email" type="email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Password" type="password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Tulis ulang password" type="password" name="cekpassword" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">

        
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="tambah" class="btn btn-primary btn-block btn-flat" value="Daftar">

        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="login.php" class="text-center">Sudah punya akun?</a>
  </div>
  <!-- /.form-box -->
</div>
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('reCAPTCHA_site_key', {action: 'homepage'}).then(function(token) {
       ...
    });
});
</script>
