<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Harga
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

          $id_biaya=$_GET['id_biaya'];
          $pp=mysqli_query($koneksi,"select * from biaya where id_biaya=$id_biaya");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $jenis_biaya=$_POST['jenis_biaya'];
            $jumlah=$_POST['jumlah'];


                  $s=mysqli_query($koneksi,"update biaya set jenis_biaya='$jenis_biaya', jumlah='$jumlah' where id_biaya='$id_biaya' ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                      echo "<meta http-equiv=refresh content=2;url=index.php?page=biaya>";
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
              <input type="hidden" name="id_penghuni" value="<?=$rr['id_penghuni'];?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Biaya</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jenis_biaya" value="<?=$rr['jenis_biaya'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jumlah" value="<?=$rr['jumlah'];?>" required>
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
