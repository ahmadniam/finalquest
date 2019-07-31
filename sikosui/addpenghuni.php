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
      Tambah Data Penghuni
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

                $cek=mysqli_query($koneksi,"select*from penghuni where email='$email' ");
                $cek1=mysqli_num_rows($cek);

                if ($cek1==1) {
                    echo "<div class='alert alert-error'><h4>Maaf, email $email sudah terdaftar, silahkan ubah atau gunakan email lain.</h4></div><br>";
                }
                else {

                  $s=mysqli_query($koneksi,"insert into penghuni (id_user,nama_penghuni,alamat,no_telp,nama_ortu,no_telp_ortu,kampus,jurusan,angkatan,email,kamar,id_penghuni)
                          values('$user_id','$nama_penghuni','$alamat','$no_telp','$nama_ortu','$no_telp_ortu','$kampus','$jurusan','$angkatan','$email','$kamar','$id_penghuni')");
                    if ($s)
                    {
                        echo "<div class='alert alert-success'><h4>Data penghuni sudah ditambahkan</h4></div><br>";
                        echo "<meta http-equiv=refresh content=2;url=index.php?page=lihatpenghuni>";
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
                <label class="col-sm-2 control-label">Nama Penghuni (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_penghuni" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="alamat" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">No Telepon (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_telp" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Orang Tua (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_ortu" required>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">No Telepon Orang Tua(*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_telp_ortu" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kampus (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kampus" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jurusan (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jurusan" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Angkatan (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="angkatan" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email (*)</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kamar (*)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kamar" required>
                </div>
              </div>
              <label>(*) Wajib diisi</label>
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
