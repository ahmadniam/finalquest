<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah Data Pemesanan
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

          $id_pemesanan=$_GET['id_pemesanan'];
          $pp=mysqli_query($koneksi,"select * from pemesanan where id_pemesanan=$id_pemesanan ");
          $rr=mysqli_fetch_assoc($pp);

          if ($_POST['simpan'])
          {
            $nama_pemesan=$_POST['nama_pemesan'];
            $no_telp_pemesan=$_POST['no_telp_pemesan'];
            $masa_sewa=$_POST['masa_sewa'];
            $status_pemesanan=$_POST['status_pemesanan'];
            $email=$_POST['email'];
            $status=$_POST['status'];

                  $s=mysqli_query($koneksi,"update pemesanan set nama_pemesan='$nama_pemesan', no_telp_pemesan='$no_telp_pemesan', masa_sewa='$masa_sewa', status_pemesanan='$status_pemesanan', id_user='$email' ");
                  if ($s)
                  {
                      echo "<div class='alert alert-success'><h4>Perubahan berhasil.</h4></div><br>";
                      echo "<meta http-equiv=refresh content=2;url=index.php?page=pemesanan>";
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
                                        if ($em[id_user]==$rr[id_user]){echo "selected";}
                                        echo ">".$em[email]."</option>";
                                    }
                                ?>
                              </select>
                            </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pemesan</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_pemesan" value="<?=$rr['nama_pemesan'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No Telepon Pemesan</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_telp_pemesan" value="<?=$rr['no_telp_pemesan'];?>" required>
                  </div>
                </div>

                <div class="form group">
                  <label class="col-sm-2 control-label">Masa Sewa</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="masa_sewa" value="<?=$rr['masa_sewa'];?>" required>
                  </div>
                </div>
                <br/>
                <br/>
                <div class="form-group">
                        <label class="col-sm-2 control-label">Status Pemesanan</label>
                        <div class="col-sm-6">
                          <select class="form-control" name="status_pemesanan" required>
                            <option value='Reserved' <?php if ($rr[status_pemesanan]=='Reserved'){echo 'selected';} ?> >Reserved</option>
                            <option value='Unreserved' <?php if ($rr[status_pemesanan]=='Unreserved'){echo 'selected';} ?> >Unreserved</option>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>$('input[name="masa_sewa"]').daterangepicker();</script>
<script   src="https://code.jquery.com/jquery-3.1.1.js"   integrity="sha256-
16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   crossorigin="anonymous">
    </script>
    <script>
        function getId(val){
            //We create ajax function
            $.ajax({
                type: "POST",
                url: "getdata.php",
                data: "id_rumah="+val,
                success: function(data){
                    $("#listkamar").html(data);
                }
            });
        }
    </script>
