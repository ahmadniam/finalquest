<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Kamar
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
                $s1=mysqli_query($koneksi,"delete from kamar where id_kamar='$_GET[id]'");

                if ($s1)
                {
                    echo "<div class='alert alert-success'><h4>Data Kamar berhasil dihapus.</h4><br>
                    </div>";
                }
                elseif ($s1)
                {
                    echo "<div class='alert alert-success'><h4>Data Kamar berhasil dihapus.</h4></div>";
                }
                else
                {
                    $er=mysqli_error($koneksi);
                    echo "<div class='alert alert-error'><h4>Warning $er</h4></div>";
                }
            }
            ?>
            <a href="?page=tambahkamar" class="btn btn-success">
              <i class="fa fa-plus"></i>
              Tambah Data Kamar
            </a>
          </div><!-- /.box-header -->
          <div class="box-body" style="overflow:scroll;">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Kamar</th>
                  <th>Nama Kosan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                $query = mysqli_query($koneksi,"select k.id_kamar,k.no_kamar,k.id_rumah,r.nama_rumah,k.status_kamar from kamar k INNER JOIN rumah r on k.id_rumah = r.id_rumah order by k.no_kamar and r.nama_rumah asc");
                while($b = mysqli_fetch_assoc($query))
                {
                  echo "<tr>
                  <td>$no</td>
                  <td>$b[no_kamar]</td>
                  <td>$b[nama_rumah]</td>";
                  if ($b[status_kamar]=='Kosong') { echo "<td><label class='label-success'>&nbsp; Kosong &nbsp;</label></td>"; }
                        else {echo "<td><label class='label-danger'>&nbsp; Terisi &nbsp;</label></td>";}
                  echo "<td>
                    <div class='action-buttons'>
                      <span data-toggle='tooltip' title='Ubah'>
                        <a class='btn btn-xs btn-default btn-flat' href=?page=ubahkamar&id_kamar=$b[id_kamar] title='Ubah'>
                          <i class='fa fa-pencil fa-lg text-blue'></i>
                        </a>
                      </span>

                      <span data-toggle='tooltip' title='Hapus'>
                        <a class='btn btn-xs btn-default btn-flat' href=#$b[id_kamar] data-toggle='modal' title='Hapus'>
                          <i class='fa fa-trash-o fa-lg text-red'></i>
                        </a>
                      </span>
                    </div> ";
                  echo "</td>
                  </tr>";
                  $no++;

                  echo "
                  <div class='modal fade' id='$b[id_kamar]' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Konfirmasi hapus</h4>
                        </div>
                        <div class='modal-body'>
                          Apakah anda yakin akan menghapus Kamar dengan nomor kamar $b[no_kamar] ?
                        </div>
                        <div class='modal-footer'>
                          <a class='btn btn-primary' href=?page=datakamar&aksi=hapus&id=$b[id_kamar]>&nbsp; Ya &nbsp;</a>
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
