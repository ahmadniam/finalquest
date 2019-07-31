      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ubah Password
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
                $pp=mysqli_query($koneksi,"select * from akun where username='$auth_username' ");
                $rr=mysqli_fetch_assoc($pp);
                $password=$rr[password];

                if ($_POST['simpan'])
                {
                    $password_lama=$_POST['password_lama'];
                    $password_baru=$_POST['password_baru'];

                    $cek=mysqli_query($koneksi,"select * from akun where username='$auth_username' and password='$password_lama' ");
                    $cek1=mysqli_num_rows($cek);

                    if ($password_lama==$password){
                      $s=mysqli_query($koneksi,"update akun set password='$password_baru' where username='$auth_username' ");

                      if ($s)
                      {
                          echo "<div class='alert alert-success'><h4>Password berhasil dirubah.</h4></div>";
                          echo "<meta http-equiv=refresh content=2;url=index.php?page=profiladmin>";
                      }
                      else
                      {
                          $er=mysqli_error($koneksi);
                          echo "<div class='alert alert-error'><h4>Warning $er</h4></div><br>";

                      }
                    }
                    else {
                      echo "<div class='alert alert-error'><h4>Maaf, anda salah memasukkan password lama. Silahkan masukkan ulang password lama anda.</h4></div>";
                    }
                }
                ?>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="username" value="<?=$rr['username'];?>" readonly required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Password lama</label>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" name="password_lama" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Password baru</label>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" name="password_baru" required>
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
