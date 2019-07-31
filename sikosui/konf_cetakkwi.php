<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cetak Kwitansi Pembayaran
    </h1>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- Horizontal Form -->
        <div class="box box-success">
          <div class="box-header with-border">

          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" id="cetak" action="cetakkwitansi.php" enctype="multipart/form-data" target="_blank">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Pilih pembayaran</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="pembayaran" id="select2rmh" style="width:100%;" required>
                        <option></option>
                        <?php
                            $jaba=mysqli_query($koneksi,"select*from pembayaran where status='Lunas'");
                            while($jab=mysqli_fetch_assoc($jaba)){
                                echo "<option value='".$jab[id_pembayaran]."'>".$jab[nama]." ".$jab[tanggal_pembayaran]." untuk membayar ".$jab[untuk]."</option>";
                            }
                        ?>
                      </select>
                    </div>
                  </div>


            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-3"></div>
              <div class="col-sm-9">
                <a href="#" onclick="document.getElementById('cetak').submit()" class="btn btn-success"><i class='fa fa-file-pdf-o'></i> Export ke PDF</a>

              </div>
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- page script -->
