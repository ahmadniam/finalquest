<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Kamar
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

          $id_kamar=$_GET['id_kamar'];
          $pp=mysqli_query($koneksi,"select k.id_kamar,k.no_kamar,k.id_rumah,r.nama_rumah,k.status_kamar from kamar k INNER JOIN rumah r on k.id_rumah = r.id_rumah where id_kamar=$id_kamar");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $no_kamar=$_POST['no_kamar'];
            $id_rumah=$_POST['rumah'];
            $status_kamar=$_POST['status_kamar'];

                  $s=mysqli_query($koneksi,"update kamar set no_kamar='$no_kamar', id_rumah='$id_rumah', status_kamar='$status_kamar' where id_kamar =$id_kamar ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                      echo "<meta http-equiv=refresh content=2;url=index.php?page=datakamar>";
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
              <input type="hidden" name="id_kamar" value="<?=$rr['id_kamar'];?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">No Kamar</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_kamar" value="<?=$rr['no_kamar'];?>" required>
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
                              echo "<option value='".$jab[id_rumah]."' ";
                              if ($jab[id_rumah]==$rr[id_rumah]){echo "selected";}
                              echo ">".$jab[nama_rumah]."</option>";
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
                                <option value='Terisi' <?php if ($rr[status_kamar]=='Terisi'){echo 'selected';} ?> >Terisi</option>
                                <option value='Kosong' <?php if ($rr[status_kamar]=='Kosong'){echo 'selected';} ?> >Kosong</option>

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
