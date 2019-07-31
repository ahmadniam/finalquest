<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Kosan
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

          $id_kosan=$_GET['id_kosan'];
          $pp=mysqli_query($koneksi,"select * from rumah where id_rumah=$id_kosan");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $nama_kosan=$_POST['nama_kosan'];
            $alamat=$_POST['alamat'];
            $jumlah_kamar=$_POST['jumlah_kamar'];

                  $s=mysqli_query($koneksi,"update rumah set nama_rumah='$nama_kosan', alamat_rumah='$alamat', jumlah_kamar='$jumlah_kamar' where id_rumah = $id_kosan ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                      echo "<meta http-equiv=refresh content=2;url=index.php?page=dataKosan>";
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
              <input type="hidden" name="id_rumah" value="<?=$rr['id_rumah'];?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Kosan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_kosan" value="<?=$rr['nama_rumah'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="alamat" value="<?=$rr['alamat_rumah'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Kamar</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jumlah_kamar" value="<?=$rr['jumlah_kamar'];?>" required>
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
