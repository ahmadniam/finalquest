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
      Data Penghuni
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <?php

            $query= mysqli_query($koneksi,"select * from penghuni where id_user='$user_id'");
            $cek = mysqli_num_rows($query);

            if ($cek==0){
              echo "<div class='alert alert-warning'><h4>Data belum ada, silahkan isi terlebih dahulu</h4></div><br>";
              echo "<meta http-equiv=refresh content=3;url=index.php?page=addpenghuni>";
          }

            if ($_GET['aksi']=='hapus')
            {
                $s1=mysqli_query($koneksi,"delete from penghuni where id_penghuni='$_GET[id]'");

                if ($s1)
                {
                    echo "<div class='alert alert-success'><h4>Data penghuni berhasil dihapus.</h4><br>
                    </div>";
                }
                elseif ($s1)
                {
                    echo "<div class='alert alert-success'><h4>Data penghuni berhasil dihapus.</h4></div>";
                }
                else
                {
                    $er=mysqli_error($koneksi);
                    echo "<div class='alert alert-error'><h4>Warning $er</h4></div>";
                }
            }
            ?>

          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>

                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Telepon</th>
                  <th>Nama Orang Tua</th>
                  <th>No Telp Orang Tua</th>
                  <th>Kampus</th>
                  <th>Jurusan</th>
                  <th>Angkatan</th>
                  <th>Email</th>
                  <th>Kamar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $query = mysqli_query($koneksi,"select * from penghuni where id_user='$user_id'");
                while($b = mysqli_fetch_assoc($query))
                {
                  echo "<tr>

                  <td>$b[nama_penghuni]</td>
                  <td>$b[alamat]</td>
                  <td>$b[no_telp]</td>
                  <td>$b[nama_ortu]</td>
                  <td>$b[no_telp_ortu]</td>
                  <td>$b[kampus]</td>
                  <td>$b[jurusan]</td>
                  <td>$b[angkatan]</td>
                  <td>$b[email]</td>
                  <td>$b[kamar]</td>  ";
                  echo "<td>
                    <div class='action-buttons'>
                      <span data-toggle='tooltip' title='Ubah'>
                        <a class='btn btn-xs btn-default btn-flat' href=?page=editpenghuni&id_penghuni=$b[id_penghuni] title='Ubah'>
                          <i class='fa fa-pencil fa-lg text-blue'></i>
                        </a>
                      </span>

                      <span data-toggle='tooltip' title='Hapus'>
                        <a class='btn btn-xs btn-default btn-flat' href=#$b[id_penghuni] data-toggle='modal' title='Hapus'>
                          <i class='fa fa-trash-o fa-lg text-red'></i>
                        </a>
                      </span>
                    </div> ";
                  echo "</td>
                  </tr>";


                  echo "
                  <div class='modal fade' id='$b[id_penghuni]' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Konfirmasi hapus</h4>
                        </div>
                        <div class='modal-body'>
                          Apakah anda yakin akan menghapus penghuni $b[nama_penghuni] ?
                        </div>
                        <div class='modal-footer'>
                          <a class='btn btn-primary' href=?page=penghuni&aksi=hapus&id=$b[id_penghuni]>&nbsp; Ya &nbsp;</a>
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
