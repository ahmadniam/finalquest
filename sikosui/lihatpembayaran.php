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
      Data pembayaran
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <?php
            if ($_GET['aksi']=='hapus')
            {
                $s1=mysqli_query($koneksi,"delete from pembayaran where id_pembayaran='$_GET[id]'");

                if ($s1)
                {
                    echo "<div class='alert alert-success'><h4>Data pembayaran berhasil dihapus.</h4><br>
                    </div>";
                }

                else
                {
                    $er=mysqli_error($koneksi);
                    echo "<div class='alert alert-error'><h4>Warning $er</h4></div>";
                }
            }
            ?>
            <a href="?page=addpembayaran" class="btn btn-success">
              <i class="fa fa-plus"></i>
              Tambah data pembayaran
            </a>
            <a href="?page=konf_cetakkwitansi" class="btn btn-success">
              <i class="fa fa-plus"></i>
              Cetak kwitansi
            </a>
            <p class="help-block"><i>Transfer ke bank BNI an Hanifan Nurhuda 0243548766.</i></p>
            <p class="help-block"><i>Jika sudah melakukan pembayaran, silahkan konfirmasi ke pemilik kost : 08997251512.</i></p>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>

                  <th>Nama Penghuni</th>
                  <th>No Kamar</th>
                  <th>Untuk Membayar</th>
                  <th>Jumlah</th>
                  <th>Metode Pembayaran</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $query = mysqli_query($koneksi,"select * from pembayaran where user_id='$user_id'");
                while($b = mysqli_fetch_assoc($query))
                {
                  echo "<tr>

                  <td>$b[nama]</td>
                  <td>$b[kamar]</td>
                  <td>$b[untuk]</td>
                  <td>$b[jumlah]</td>
                  <td>$b[metode_pembayaran]</td>
                  <td>$b[tanggal_pembayaran]</td> ";
                  if ($b[status]=='Lunas') { echo "<td><label class='label-success'>&nbsp; Lunas &nbsp;</label></td>"; }
                        else {echo "<td><label class='label-warning'>&nbsp; Belum Lunas &nbsp;</label></td>";}

                  echo "<td>
                    <div class='action-buttons'>
                      <span data-toggle='tooltip' title='Ubah'>
                        <a class='btn btn-xs btn-default btn-flat' href=?page=editpembayaran&id=$b[id_pembayaran] title='Ubah'>
                          <i class='fa fa-pencil fa-lg text-blue'></i>
                        </a>
                      </span>

                      <span data-toggle='tooltip' title='Hapus'>
                        <a class='btn btn-xs btn-default btn-flat' href=#$b[id_pembayaran] data-toggle='modal' title='Hapus'>
                          <i class='fa fa-trash-o fa-lg text-red'></i>
                        </a>
                      </span>
                    </div> ";
                  echo "</td>
                  </tr>";


                  echo "
                  <div class='modal fade' id='$b[id_pembayaran]' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Konfirmasi hapus</h4>
                        </div>
                        <div class='modal-body'>
                          Apakah anda yakin akan menghapus data ini?
                        </div>
                        <div class='modal-footer'>
                          <a class='btn btn-primary' href=?page=lihatpembayaran&aksi=hapus&id=$b[id_pembayaran]>&nbsp; Ya &nbsp;</a>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>Tidak</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  ";
                }
                ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- jQuery 2.1.4 -->
