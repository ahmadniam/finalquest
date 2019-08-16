<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data User
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

            if ($_POST['tambah'])
            {
              $email=$_POST['email'];
              $password=$_POST['password'];
              $cekpassword=$_POST['cekpassword'];
              $hak_akses=$_POST['hak_akses'];

              $cek=mysqli_query($koneksi,"select * from user where email='$email' ");
              $cek1=mysqli_num_rows($cek);

              if ($password != $cekpassword)
              {
                echo "<div class='alert alert-error'><h4>Maaf, password tidak sesuai.</h4></div><br>";
              }
              elseif ($cek1==1){
              echo "<div class='alert alert-error'><h4>Maaf, email sudah terdaftar, silahkan gunakan email lain.</h4></div><br>";
            }
            else {

                  $s=mysqli_query($koneksi,"insert into user (email,password,hak_akses)
                          values('$email','$password','$hak_akses')");
                    if ($s)
                    {
                        echo "<div class='alert alert-success'><h4>Data User sudah ditambahkan</h4></div><br>";
                        echo "<meta http-equiv=refresh content=2;url=index.php?page=datauser>";

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
              <div class="form-group">
                <label class="col-sm-2 control-label">Email (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="email" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password (*)</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" name="password" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tulis ulang password (*)</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" name="cekpassword" required>
                </div>
              </div>
              <div class="form-group">
                      <label class="col-sm-2 control-label">Hak Akses (*)</label>
                      <div class="col-sm-4">
                        <select class="form-control" name="hak_akses" required>
                          <option></option>
                          <option value="Admin">Admin</option>
                          <option value="Pengurus">Pengurus</option>
                          <option value="Penghuni">Penghuni</option>
                        </select>
                      </div>
                    </div>

            </div>
              <label>(*) Wajib diisi</label>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                <input type="reset" name="reset" class="btn btn-danger" value="&nbsp;Batal&nbsp;" onClick="history.back();">
              </div>
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
        $(function () {

          $("#select2rmh").select2();
        });
      </script>
