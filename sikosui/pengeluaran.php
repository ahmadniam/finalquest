<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Pengeluaran
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
                $s1=mysqli_query($koneksi,"delete from pengeluaran where id_pengeluaran='$_GET[id]'");

                if ($s1)
                {
                    echo "<div class='alert alert-success'><h4>Data pengeluaran berhasil dihapus.</h4><br>
                    </div>";
                }

                else
                {
                    $er=mysqli_error($koneksi);
                    echo "<div class='alert alert-error'><h4>Warning $er</h4></div>";
                }
            }
            ?>
            <a href="?page=tambahpengeluaran" class="btn btn-success">
              <i class="fa fa-plus"></i>
              Tambah data pengeluaran
            </a>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Uraian</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                $query = mysqli_query($koneksi,"select * from pengeluaran");
                while($b = mysqli_fetch_assoc($query))
                {
                  echo "<tr>
                  <td>$no</td>
                  <td>$b[jenis_pengeluaran]</td>
                  <td>$b[jumlah]</td>
                  <td>$b[tanggal_pengeluaran]</td>";

                  $no++;
                  echo "<td>
                    <div class='action-buttons'>
                      <span data-toggle='tooltip' title='Ubah'>
                        <a class='btn btn-xs btn-default btn-flat' href=?page=ubahpengeluaran&id=$b[id_pengeluaran] title='Ubah'>
                          <i class='fa fa-pencil fa-lg text-blue'></i>
                        </a>
                      </span>


                      <span data-toggle='tooltip' title='Hapus'>
                        <a class='btn btn-xs btn-default btn-flat' href=#$b[id_pengeluaran] data-toggle='modal' title='Hapus'>
                          <i class='fa fa-trash-o fa-lg text-red'></i>
                        </a>
                      </span>
                    </div> ";
                  echo "</td>
                  </tr>";


                  echo "
                  <div class='modal fade' id='$b[id_pengeluaran]' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Konfirmasi hapus</h4>
                        </div>
                        <div class='modal-body'>
                          Apakah anda yakin akan menghapus data pengeluaran ini?
                        </div>
                        <div class='modal-footer'>
                          <a class='btn btn-primary' href=?page=pengeluaran&aksi=hapus&id=$b[id_pengeluaran]>&nbsp; Ya &nbsp;</a>
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


    } ).draw();

    // show the alert
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 3000);
  });
</script>
