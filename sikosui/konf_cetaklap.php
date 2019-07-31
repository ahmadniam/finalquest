<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cetak Laporan Keuangan
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
          <form class="form-horizontal" method="post" id="cetak" action="cetaklaporan.php" enctype="multipart/form-data" target="_blank">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Pilih Bulan</label>
                <div class="col-sm-5">
                  <select class="form-control" name="bulan" required>
                    <option value="0">-- Pilih Bulan --</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Pilih Tahun</label>
                <div class="col-sm-5">
                  <select class="form-control" name="tahun" required>
                    <option value="0">-- Pilih Tahun --</option>
                    <?php
                        for($i = date('Y') ; $i > 2007; $i--){
                            echo "<option value=".$i.">$i</option>";
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
