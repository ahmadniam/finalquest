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
      Data Pemesanan
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
                $s1=mysqli_query($koneksi,"delete from pemesanan where id_pemesanan='$_GET[id]'");
                $s2=mysqli_query($koneksi,"update kamar set status_kamar='Kosong' where id_kamar='$_GET[kamar]'");

                if ($s1&&$s2)
                {
                    echo "<div class='alert alert-success'><h4>Data pemesanan berhasil dihapus.</h4><br>
                    </div>";
                }

                else
                {
                    $er=mysqli_error($koneksi);
                    echo "<div class='alert alert-error'><h4>Warning $er</h4></div>";
                }
            }
            ?>
            <a href="?page=addpemesanan" class="btn btn-success">
              <i class="fa fa-plus"></i>
              Tambah data pemesanan
            </a>
            <a href="?page=addpembayaran" class="btn btn-success">
              <i class="fa fa-plus"></i>
              Konfirmasi Pembayaran
            </a>
            <br/>
            <p class="help-block"><i>Jika data ada yg salah, silahkan hapus kemudian tambahkan data ulang.</i></p>
            <p class="help-block"><i>Uang muka harus dibayar dalam jangka waktu 24 jam, jika sudah melakukan pembayaran, silahkan lakukan konfirmasi pembayaran.</i></p>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal Pesan</th>
                  <th>Rumah</th>
                  <th>Kamar</th>
                  <th>No Telp</th>
                  <th>Masa Sewa</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                $query = mysqli_query($koneksi,"select * from pemesanan join rumah on pemesanan.id_rumah=rumah.id_rumah join kamar on pemesanan.id_kamar=kamar.id_kamar where id_user='$user_id' ");
                while($b = mysqli_fetch_assoc($query))
                {
                  echo "<tr>
                  <td>$no</td>
                  <td>$b[nama_pemesan]</td>
                  <td>$b[tanggal_pesan]</td>
                  <td>$b[nama_rumah]</td>
                  <td>$b[no_kamar]</td>
                  <td>$b[no_telp_pemesan]</td>
                  <td>$b[masa_sewa]</td>";
                  if ($b[status_pemesanan]=='Reserved') { echo "<td><label class='label-success'>&nbsp; Reserved &nbsp;</label></td>"; }
                        else {echo "<td><label class='label-warning'>&nbsp; Unreserved &nbsp;</label></td>";}
                  echo "<td>


                      <span data-toggle='tooltip' title='Hapus'>
                        <a class='btn btn-xs btn-default btn-flat' href=#$b[id_pemesanan] data-toggle='modal' title='Hapus'>
                          <i class='fa fa-trash-o fa-lg text-red'></i>
                        </a>
                      </span>
                    </div> ";
                  echo "</td>
                  </tr>";
                  $no++;

                  echo "
                  <div class='modal fade' id='$b[id_pemesanan]' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Konfirmasi hapus</h4>
                        </div>
                        <div class='modal-body'>
                          Apakah anda yakin akan menghapus pemesanan $b[nama_pemesanan] ?
                        </div>
                        <div class='modal-footer'>
                          <a class='btn btn-primary' href=?page=lihatpemesanan&aksi=hapus&id=$b[id_pemesanan]&kamar=$b[id_kamar]>&nbsp; Ya &nbsp;</a>
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
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    var t = $("#example1").DataTable({
      "language": {
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Pencarian:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Pertama",
            "sPrevious": "Sebelumnya",
            "sNext":     "Selanjutnya",
            "sLast":     "Terakhir"
        }},
      "columnDefs": [ {
          "searchable": false,
          "orderable": false,
          "targets": 0
      } ],
      "order": [[ 1, 'asc' ]]
    });

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    // show the alert
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 3000);
  });
</script>


<!-- jQuery 2.1.4 -->
