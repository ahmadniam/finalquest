<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
if (isset($_SESSION['auth_email']))
{include "koneksi.php";

$auth_email=$_SESSION['auth_email'];
$auth_hak_akses=$_SESSION['auth_hak_akses'];
$user_id=$_SESSION['user_id'];
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data Pemesanan
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
              date_default_timezone_set('Asia/Jakarta');
              $nama_pemesan=$_POST['nama_pemesan'];

              $rumah=$_POST['rumah'];
              $kamar=$_POST['kamar'];
              $no_telp_pemesan=$_POST['no_telp_pemesan'];
              $masa_sewa=$_POST['masa_sewa'];


              $qw=mysqli_query($koneksi,"update kamar set status_kamar='Terisi' where id_kamar='$kamar'");

              $s=mysqli_query($koneksi,"insert into pemesanan set nama_pemesan='$nama_pemesan', id_rumah='$rumah', id_kamar='$kamar',
              no_telp_pemesan='$no_telp_pemesan', id_user='$user_id', masa_sewa='$masa_sewa', status_pemesanan='Unreserved' ");
              if ($s&&$qw)
              {
                  echo "<div class='alert alert-success'><h4>Input Data Pemesanan Kamar Berhasil.</h4></div><br>";
                  echo "<meta http-equiv=refresh content=2;url=index.php?page=lihatpemesanan>";
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
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_pemesan" required>
                </div>
              </div>
              <div class="form-group">
                      <label class="col-sm-2 control-label">Pilih Rumah</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="rumah" id="select2rmh" style="width:100%;" onchange="getId(this.value);" required>
                          <option></option>
                          <?php
                    $query = "SELECT * FROM rumah";
                    $results=mysqli_query($koneksi, $query);
                    //loop
                    foreach ($results as $rumah){
                ?>
                        <option value="<?php echo $rumah["id_rumah"];?>"><?php echo $rumah["nama_rumah"];?></option>
                <?php
                    }
                ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Pilih Kamar</label>
                            <div class="col-sm-6">
                              <select class="form-control" name="kamar" id="listkamar" style="width:100%;" required>
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">No Telepon</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_telp_pemesan" required>
                </div>
              </div>

              <div class="form group">
                <label class="col-sm-2 control-label">Masa Sewa</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="masa_sewa" required>
                </div>
              </div>
              <br/>
              <br/>
              <div class="form-group">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-6">
                        <label>Semua form wajib diisi</label>
                        <p class="help-block"><i>Uang muka harus dibayar dalam jangka waktu 24 jam, jika sudah melakukan pembayaran, silahkan lakukan konfirmasi pembayaran.</i></p>
                      </div>
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

          $("#select2kmr").select2();
        });
      </script>
      <script>
              $(function () {

                $("#select2rmh").select2();
              });

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
