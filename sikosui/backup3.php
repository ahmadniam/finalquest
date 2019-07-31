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
            <div class="col-xs-6">
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
                      $command = "..\..\mysql\bin\mysqldump --routines -hlocalhost -uroot --single-transaction sipdukop2 > $backupFile ";
                      $s=shell_exec($command);
                      clearstatcache();

                      echo "<div class='alert alert-success'><h4>Backup data berhasil. File hasil backup disimpan sebagai $backupFile</h4></div>";
                      echo "<script>window.open('$backupFile')</script>";

                  }

                  ?>
                  <h4>Backup Data</h4>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-8 control-label">Klik tombol backup untuk membackup data</label>
                      <div class="col-sm-4">
                        <a href="#backup" class="btn btn-success" data-toggle='modal'>
                          <i class="fa fa-save"></i>
                          Backup
                        </a>
                      </div>
                    </div>
                  </br>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
              
            </div><!-- /.col -->

            <div class="col-xs-6">
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
                      $restoreFile = "sipdukop.sql";
                      $cmd = "..\..\mysql\bin\mysql -hlocalhost -uroot sipdukop2 < $restoreFile ";
                      $a=shell_exec($cmd);
                      clearstatcache();

                      echo "<div class='alert alert-success'><h4>Restore data berhasil.</h4></div>";
                  }
                  ?>
                  <h4>Restore Data</h4>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-8 control-label">Klik tombol restore untuk merestore data</label>
                      <div class="col-sm-4">
                        <a href="#restore" class="btn btn-primary" data-toggle='modal'>
                          <i class="fa fa-database"></i>
                          Restore
                        </a>
                      </div>
                    </div>
                  </br>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->

              <div class='modal fade' id='backup' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <h4 class='modal-title' id='myModalLabel'>Backup data</h4>
                    </div>
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                      <div class='modal-body'>
                        <p><b>PERHATIAN</b></br>
                        Proses backup ini akan mengganti file hasil backup data sebelumnya.</p>
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

              <div class='modal fade' id='restore' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='myModalLabel'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <h4 class='modal-title' id='myModalLabel'>Restore data</h4>
                    </div>
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                      <div class='modal-body'>
                        <p><b>PERHATIAN</b></br>
                          <?php
                          // outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.
                          date_default_timezone_set("Asia/Bangkok");
                          $filename = 'sipdukop.sql';
                          if (file_exists($filename)) {
                              $mod=date ("d M Y H:i:s.", filemtime($filename));
                              echo "Backup data terakhir kali dilakukan pada $mod";
                          }
                          ?>
                        </p>
                        Apakah anda yakin akan merestore data tersebut kedalam sistem ?
                      </div>
                      <div class='modal-footer'>
                        <input type="submit" name="restore" class="btn btn-primary" value="&nbsp; Ya &nbsp;">
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

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