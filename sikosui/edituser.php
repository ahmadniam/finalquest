<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
if (isset($_SESSION['auth_email']))
{include "koneksi.php";

$auth_email=$_SESSION['auth_email'];
$auth_hak_akses=$_SESSION['auth_hak_akses'];
$user_id=$_SESSION['user_id'];
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Email dan Password
    </h1>

  </section>

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

          $id_user=$_GET['id_user'];
          $pp=mysqli_query($koneksi,"select * from user where id_user=$user_id");
          $rr=mysqli_fetch_assoc($pp);
          $email_lama=$rr[email];
          $passwordlama=$rr[password];

          if ($_POST['simpan'])
          {
            $email=$_POST['email'];
            $cekpassword=$_POST['cekpassword'];
            $password=$_POST['password'];
            $password_lama=$_POST['password_lama'];

            if($password_lama != $passwordlama){
              echo "<div class='alert alert-error'><h4>Maaf, password lama tidak sesuai.</h4></div><br>";
            }
            else{

            $cek=mysqli_query($koneksi,"select * from user where email='$email' ");
            $cek1=mysqli_num_rows($cek);

            if ($email==$email_lama){

            if ($password != $cekpassword)
            {
              echo "<div class='alert alert-error'><h4>Maaf, password tidak sesuai.</h4></div><br>";
            }

          else {
            $d=mysqli_query($koneksi,"update user set password='$password' where id_user =$user_id ");
            if ($d)
            {
                echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                echo "<meta http-equiv=refresh content=2;url=index.php?page=DataUser>";
            }
            else
            {
                $er=mysqli_error($koneksi);
                echo "<div class='alert alert-error'><h4>Warning $er</h4></div><br>";

            }
          }
        }
            elseif ($cek1==1){
            echo "<div class='alert alert-error'><h4>Maaf, email sudah terdaftar, silahkan gunakan email lain.</h4></div><br>";
          }
          else {

                  $s=mysqli_query($koneksi,"update user set email='$email', password='$password' where id_user =$user_id ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";

                  }
                  else
                  {
                      $er=mysqli_error($koneksi);
                      echo "<div class='alert alert-error'><h4>Warning $er</h4></div><br>";

                  }
              }

            }
          }
          ?>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_user" value="<?=$rr['id_user'];?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control" name="email" value="<?=$rr['email'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password Lama</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" name="password_lama" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" name="password" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tulis ulang password</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" name="cekpassword" required>
                </div>
              </div>


            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                <input type="reset" name="reset" class="btn btn-danger" value="&nbsp;Batal&nbsp;" onClick="history.back();">
              </div>
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
