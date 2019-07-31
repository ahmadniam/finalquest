<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data Kamar
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
              $no_kamar=$_POST['no_kamar'];
              $id_rumah=$_POST['rumah'];
              $status_kamar=$_POST['status_kamar'];


              $cek=mysqli_query($koneksi,"select*from kamar where no_kamar='$no_kamar' ");
              $cek1=mysqli_num_rows($cek);

              if ($cek1==1) {
                  echo "<div class='alert alert-error'><h4>Maaf, kamar nomor $no_kamar sudah terdaftar, silahkan ubah atau tambahkan data kamar lain.</h4></div><br>";
              }
              else {

                  $s=mysqli_query($koneksi,"insert into kamar (no_kamar,id_rumah,status_kamar)
                          values('$no_kamar','$id_rumah','$status_kamar')");
                    if ($s)
                    {
                        echo "<div class='alert alert-success'><h4>Data kamar sudah ditambahkan</h4></div><br>";
                        echo "<meta http-equiv=refresh content=2;url=index.php?page=DataKamar>";

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
                <label class="col-sm-2 control-label">No Kamar</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_kamar" required>
                </div>
              </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kosan</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="rumah" id="select2rmh" style="width:100%;" required>
                          <option></option>
                          <?php
                              $jaba=mysqli_query($koneksi,"select*from rumah");
                              while($jab=mysqli_fetch_assoc($jaba)){
                                  echo "<option value='".$jab[id_rumah]."'>".$jab[nama_rumah]."</option>";
                              }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                            <label class="col-sm-2 control-label">Status Kamar</label>
                            <div class="col-sm-6">
                              <select class="form-control" name="status_kamar" required>
                                <option></option>
                                <option value="Terisi">Terisi</option>
                                <option value="Kosong">Kosong</option>

                              </select>
                            </div>
                          </div>
                          <p class="help-block"><i>Semua data wajib diisi</i></p>
            </div>

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
