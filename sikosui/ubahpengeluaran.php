<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Pengeluaran
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

          $id_pengeluaran=$_GET['id'];
          $pp=mysqli_query($koneksi,"select * from pengeluaran where id_pengeluaran=$id_pengeluaran");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $jenis_pengeluaran=$_POST['jenis_pengeluaran'];
            $jumlah=$_POST['jumlah'];
            $tanggal_pengeluaran=$_POST['tanggal_pengeluaran'];

                  $s=mysqli_query($koneksi,"update pengeluaran set jenis_pengeluaran='$jenis_pengeluaran', jumlah='$jumlah', tanggal_pengeluaran='$tanggal_pengeluaran' where id_pengeluaran='$id_pengeluaran' ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                      echo "<meta http-equiv=refresh content=2;url=index.php?page=pengeluaran>";
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
              <input type="hidden" name="id_pengeluaran" value="<?=$rr['id_pengeluaran'];?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Uraian</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jenis_pengeluaran" value="<?=$rr['jenis_pengeluaran'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jumlah" value="<?=$rr['jumlah'];?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-6">
                  <div class="input-group date" "form-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <input type="text" class="form-control" name="tanggal_pengeluaran" value="<?=$rr['tanggal_pengeluaran'];?>" required>
                    <p class="help-block"><i>Format tanggal yyyy-mm-dd</i></p>
                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                    </div>
                  </div>
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
