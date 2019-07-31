<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah User
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
          $pp=mysqli_query($koneksi,"select * from user where id_user=$id_user");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $email=$_POST['email'];
            $hak_akses=$_POST['hak_akses'];

            $cek=mysqli_query($koneksi,"select * from user where email='$email' ");
            $cek1=mysqli_num_rows($cek);


          if ($cek1==1){
            echo "<div class='alert alert-error'><h4>Maaf, email sudah terdaftar, silahkan gunakan email lain.</h4></div><br>";
          }
          else {

                  $s=mysqli_query($koneksi,"update user set email='$email', hak_akses='$hak_akses' where id_user =$id_user ");
                  if ($s)
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
          ?>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_user" value="<?=$rr['id_user'];?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="email" value="<?=$rr['email'];?>" required>
                </div>
              </div>

              <div class="form-group">
                      <label class="col-sm-2 control-label">Hak Akses</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="hak_akses" required>
                          <option></option>
                          <option value='Admin' <?php if ($rr[hak_akses]=='Admin'){echo 'selected';} ?> >Admin</option>
                          <option value='Pengurus' <?php if ($rr[hak_akses]=='Pengurus'){echo 'selected';} ?> >Pengurus</option>
                          <option value='Penghuni' <?php if ($rr[hak_akses]=='Penghuni'){echo 'selected';} ?> >Penghuni</option>
                        </select>
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
