<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Penghuni
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

          $id_penghuni=$_GET['id_penghuni'];
          $pp=mysqli_query($koneksi,"select * from penghuni where id_penghuni=$id_penghuni");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $nama_penghuni=$_POST['nama_penghuni'];
            $alamat=$_POST['alamat'];
            $no_telp=$_POST['no_telp'];
            $nama_ortu=$_POST['nama_ortu'];
            $no_telp_ortu=$_POST['no_telp_ortu'];
            $kampus=$_POST['kampus'];
            $jurusan=$_POST['jurusan'];
            $angkatan=$_POST['angkatan'];
            $email=$_POST['email'];
            $kamar=$_POST['kamar'];



                  $s=mysqli_query($koneksi,"update penghuni set nama_penghuni='$nama_penghuni', alamat='$alamat', no_telp='$no_telp', nama_ortu='$nama_ortu', no_telp_ortu='$no_telp_ortu',
                  kampus='$kampus', jurusan='$jurusan', angkatan='$angkatan', email='$email', kamar='$kamar' where id_penghuni='$id_penghuni' ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                      echo "<meta http-equiv=refresh content=2;url=index.php?page=lihatpenghuni>";
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
                <label class="col-sm-2 control-label">Nama penghuni</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_penghuni" value="<?=$rr['nama_penghuni'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="alamat" value="<?=$rr['alamat'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">No Telepon</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_telp" value="<?=$rr['no_telp'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Orang Tua</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_ortu" value="<?=$rr['nama_ortu'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">No Telp Orang Tua</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_telp_ortu" value="<?=$rr['no_telp_ortu'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kampus</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kampus" value="<?=$rr['kampus'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jurusan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jurusan" value="<?=$rr['jurusan'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Angkatan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="angkatan" value="<?=$rr['angkatan'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control" name="email" value="<?=$rr['email'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kamar</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kamar" value="<?=$rr['kamar'];?>" required>
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
