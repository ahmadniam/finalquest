<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Pembayaran
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

          $id_pembayaran=$_GET['id'];
          $pp=mysqli_query($koneksi,"select * from pembayaran where id_pembayaran=$id_pembayaran");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $nama=$_POST['nama'];
            $email=$_POST['email'];
            $untuk=$_POST['untuk'];
            $jumlah=$_POST['jumlah'];
            $metode_pembayaran=$_POST['metode_pembayaran'];
            $tanggal_pembayaran=$_POST['tanggal_pembayaran'];

            $kamar=$_POST['kamar'];
            $status=$_POST['status'];

                  $s=mysqli_query($koneksi,"update pembayaran set user_id='$email', nama='$nama', untuk='$untuk', jumlah='$jumlah', metode_pembayaran='$metode_pembayaran',
                  tanggal_pembayaran='$tanggal_pembayaran', status='$status', kamar='$kamar' where id_pembayaran='$id_pembayaran' ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                      echo "<meta http-equiv=refresh content=2;url=index.php?page=pembayaran>";
                  }
                  else
                  {
                      $er=mysqli_error($koneksi);
                      echo "<div class='alert alert-error'><h4>Warning $er</h4></div><br>";

                  }
              }


          ?>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_pembayaran" value="<?=$rr['id_pembayaran'];?>">
              <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                              <select class="form-control" name="email" id="select2em" style="width:100%;" required>
                                <option></option>
                                <?php
                                    $email=mysqli_query($koneksi,"select*from user");
                                    while($em=mysqli_fetch_assoc($email)){
                                        echo "<option value='".$em[id_user]."' ";
                                        if ($em[user_id]==$rr[id_user]){echo "selected";}
                                        echo ">".$em[email]."</option>";
                                    }
                                ?>
                              </select>
                            </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" value="<?=$rr['nama'];?>" required>
                  </div>
                </div>

                <div class="form-group">
                        <label class="col-sm-2 control-label">Untuk Membayar</label>
                        <div class="col-sm-6">
                          <select class="form-control" name="untuk" required>

                            <option value='Listrik' <?php if ($rr[untuk]=='Listrik'){echo 'selected';} ?> >Listrik</option>
                            <option value='Uang Muka' <?php if ($rr[untuk]=='Uang Muka'){echo 'selected';} ?> >Uang Muka</option>
                            <option value='Uang Kos Satu Tahun' <?php if ($rr[untuk]=='Uang Kos Satu Tahun'){echo 'selected';} ?> >Uang Kos Satu Tahun</option>
                            <option value='Uang Kos Setengah Tahun' <?php if ($rr[untuk]=='Uang Kos Setengah Tahun'){echo 'selected';} ?> >Uang Kos Setengah Tahun</option>
                          </select>
                        </div>
                      </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jumlah" value="<?=$rr['jumlah'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Metode Pembayaran</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="metode_pembayaran" value="<?=$rr['metode_pembayaran'];?>" required>
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Pembayaran</label>
              <div class="col-sm-6">
              <div class="input-group date" "form-group" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                <input type="text" class="form-control" name="tanggal_pembayaran" value="<?=$rr['tanggal_pembayaran'];?>" required>
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Kamar</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="kamar" value="<?=$rr['kamar'];?>" required>
            </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="status" required>
                      <option></option>
                      <option value='Lunas' <?php if ($rr[status]=='Lunas'){echo 'selected';} ?> >Lunas</option>
                      <option value='Belum Lunas' <?php if ($rr[status]=='Belum Lunas'){echo 'selected';} ?> >Belum Lunas</option>

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
<script>
        $(function () {

          $("#select2nm").select2();
        });

        $(function () {

          $("#select2by").select2();
        });
        $(function () {

          $("#select2em").select2();
        });

        $(function () {
          $.fn.datepicker.defaults.format = "dd/mm/yyyy";
$('.datepicker').datepicker({
    startDate: '-3d'
});
        });
</script>

<script src="../plugins/datepicker/bootstrap-datepicker.js">
</script>
