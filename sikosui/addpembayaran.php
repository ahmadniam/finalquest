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
      Tambah Data Pembayaran
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-xs-12">
        <p class="help-block"><i>Rek BNI an Hanifan Nurhuda 0243548766.</i></p>
        <!-- Horizontal Form -->
        <div class="box box-success">
          <div class="box-header with-border">
          <?php
            session_start();
            include "koneksi.php";
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


            if ($_POST['tambah'])
            {

              $nama=$_POST['nama'];
              $untuk=$_POST['untuk'];
              $jumlah=$_POST['jumlah'];
              $metode_pembayaran=$_POST['metode_pembayaran'];
              $tanggal_pembayaran=$_POST['tanggal_bayar'];
              $kamar=$_POST['kamar'];

              $s=mysqli_query($koneksi,"insert into pembayaran set user_id='$user_id', nama='$nama', untuk='$untuk', jumlah='$jumlah', metode_pembayaran='$metode_pembayaran',
              tanggal_pembayaran='$tanggal_pembayaran', kamar='$kamar', status='Belum Lunas' ");
              if ($s)
              {
                  echo "<div class='alert alert-success'><h4>Input Data Pembayaran Berhasil.</h4></div><br>";
                  echo "<meta http-equiv=refresh content=2;url=index.php?page=lihatpembayaran>";
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
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Untuk Membayar</label>
                            <div class="col-sm-6">
                              <select class="form-control" name="untuk" required>
                                <option></option>
                                <option value="Listrik">Listrik</option>
                                <option value="Uang Muka">Uang Muka</option>
                                <option value="Uang Kos Satu Tahun">Uang Kos Satu Tahun</option>
                                <option value="Uang Kos Setengah Tahun">Uang Kos Setengah Tahun</option>
                              </select>
                            </div>
                          </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jumlah" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Metode Pembayaran</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="metode_pembayaran" required>
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Pembayaran</label>
              <div class="col-sm-6">
              <div class="input-group date" "form-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                <input type="text" class="form-control" name="tanggal_bayar" required>
                <p class="help-block"><i>Format tanggal yyyy-mm-dd</i></p>
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">No Kamar</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="kamar" required>
            </div>
          </div>
            <p class="help-block"><i>Semua data wajib diisi.</i></p>
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

          $("#select2jb").select2();
        });
      </script>
      <script>
              $(function () {

                $("#select2nm").select2();
              });
            </script>
