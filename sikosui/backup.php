      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Backup dan Restore
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> Beranda </li>
            <li> Backup dan restore </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-6">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                <?php
                  session_start();
                  include "koneksi.php";
                  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                  if ($_POST['backup']) 
                  {
                      date_default_timezone_set("Asia/Bangkok");
                      //$backupFile = "sipdukop-".date("d-m-Y")."-(".date("H-i-s").").sql";
                      $backupFile = "sipdukop.sql";
                      $command = "..\..\mysql\bin\mysqldump --routines -hlocalhost -uroot --single-transaction sipdukop > $backupFile ";
                      $s=shell_exec($command);
                      clearstatcache();

                      echo "<div class='alert alert-success'><h4>Backup data berhasil. </br>File hasil backup disimpan sebagai $backupFile</h4></div>";
                      echo "<script>window.open('$backupFile')</script>";

                  }

                  ?>
                  <h4>Backup Data</h4>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    </br>
                    <div class="form-group">
                      <div class="col-sm-8">
                        <label class="control-label">Klik tombol backup untuk membackup data</label>
                      </div>
                      <div class="col-sm-4">
                        <a href="#backup" class="btn btn-primary" data-toggle='modal'>
                          <i class="fa fa-save"></i>
                          Backup
                        </a>
                      </div>
                    </div>
                    </br>
                  </div><!-- /.box-body -->

                  <div class='modal fade' id='backup' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Backup data</h4>
                        </div>
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                          <div class='modal-body'>
                            Apakah anda yakin akan membackup data dari sistem ?
                          </div>
                          <div class='modal-footer'>
                            <input type="submit" name="backup" class="btn btn-primary" value="&nbsp; Ya &nbsp;">
                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Batal</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </form>
              </div><!-- /.box -->
              
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-12 col-lg-6">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                <?php
                  session_start();
                  include "koneksi.php";
                  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                  if ($_POST['restore']) 
                  {
                      date_default_timezone_set("Asia/Bangkok");
                      $restoreFile=$_FILES['sql']["name"];
                      $temp = explode(".", $_FILES["sql"]["name"]);
                      $tipe = end($temp);

                      if ($_FILES["sql"]["name"]==NULL) {
                        echo "<div class='alert alert-error'><h4>Silahkan pilih file sql terlebih dahulu.</h4></div>";     
                      }
                      elseif ($tipe != "sql") {
                        echo "<div class='alert alert-error'><h4>Maaf, jenis file tidak didukung.</h4></div>";
                      }

                      else {

                        $cmd = "..\..\mysql\bin\mysql -hlocalhost -uroot sipdukop < $restoreFile ";
                        $a=shell_exec($cmd);
                        clearstatcache();

                        echo "<div class='alert alert-success'><h4>Restore data berhasil.</h4></div>";
                      }
                  }
                  ?>
                  <h4>Restore Data</h4>
                </div><!-- /.box-header -->
                <!-- form start -->
                <label class="col-sm-12 control-label">Pilih file sql yang akan direstore, kemudian klik tombol restore untuk merestore data</label>
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="sql" id="sql" >
                      </div>
                      <div class="col-sm-4">
                        <a href="#restore" class="btn btn-primary" data-toggle='modal'>
                          <i class="fa fa-database"></i>
                          Restore
                        </a>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <div class='modal fade' id='restore' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Restore data</h4>
                        </div>
                        <div class='modal-body'>
                          Apakah anda yakin akan merestore data tersebut kedalam sistem ?
                        </div>
                        <div class='modal-footer'>
                          <input type="submit" name="restore" class="btn btn-primary" value="&nbsp; Ya &nbsp;">
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
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

          // show the alert
          window.setTimeout(function() {
              $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                  $(this).remove(); 
              });
          }, 4000);
        });
      </script>