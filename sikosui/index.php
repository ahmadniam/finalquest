<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
if (isset($_SESSION['auth_email']))
{include "koneksi.php";

$auth_email=$_SESSION['auth_email'];
$auth_hak_akses=$_SESSION['auth_hak_akses'];
$user_id=$_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Indekost Wisma UI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- datepicker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Morris charts -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <style type="text/css">
    /*Bootstrap 3*/
    .modalpdf .modal-dialog{
         width: 80%;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="dist/img/logosikoui.png" width="50px" ><b>           SIKOSUI</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <?php

                      echo "<i class='fa fa-user fa-lg'></i>";

                  ?>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->

                  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <?php
                        echo "<i class='fa fa-user fa-5x'></i>";
                    ?>
                    <p>
                      <?php
                        echo $nama;
                      ?>
                      <small>
                        <?php
                          echo $auth_email;
                        ?>
                      </small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <?php
                          echo "<a href='?page=edituser' class='btn btn-success btn-flat'>Ubah Email dan Password</a>";
                      ?>
                    </div>
                    <div class="pull-right">
                      <a href="keluar.php" class="btn btn-success btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li <?php if (isset($_GET['page'])=='') { echo "class='active'"; }?> ><a href='http://3.87.231.198'><i class='fa fa-home text-success'></i> <span>Website Wisma UI</span></a></li>
            <?php

            if ($auth_hak_akses=="Admin" or $auth_hak_akses=="Pengelola") {
              echo "
                <li class='treeview";?>
                  <?php if
                  (isset($_GET['page'])&&(($_GET['page'])=='biaya')||(($_GET['page'])=='pembayaran')||(($_GET['page'])=='pengeluaran')||(($_GET['page'])=='Pembayaran')||(($_GET['page'])=='Pengeluaran')||(($_GET['page'])=='Biaya')) { echo "active"; }?> <?php echo " '>
                  <a href='#'><i class='fa fa-briefcase text-success'></i> <span>Master Data Keuangan</span> <i class='fa fa-angle-down pull-right'></i></a>
                  <ul class='treeview-menu'>
                    <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='biaya') { echo "class='active'"; }?> <?php echo "><a href='?page=biaya'><i class='fa fa-circle-o'></i>Harga</a></li> ";
                      echo "
                        <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='pembayaran') { echo "class='active'"; }?> <?php echo "><a href='?page=pembayaran'><i class='fa fa-circle-o'></i>Pembayaran</a></li>
                        <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='pengeluaran') { echo "class='active'"; }?> <?php echo "><a href='?page=pengeluaran'><i class='fa fa-circle-o'></i>Pengeluaran</a></li>
                        <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='konf_cetaklap') { echo "class='active'"; }?> <?php echo "><a href='?page=konf_cetaklap'><i class='fa fa-circle-o'></i>Cetak Laporan Keuangan</a></li>
                  </ul>
                </li>
              ";
            }

            if ($auth_hak_akses=="Admin" or $auth_hak_akses=="Pengelola") {
              echo "
                <li class='treeview";?> <?php if (isset($_GET['page'])&&(($_GET['page'])=='datakosan')||(($_GET['page'])=='datakamar')) { echo "active"; }?> <?php echo " '>
                  <a href='#'><i class='fa fa-building text-success'></i> <span>Master Data Hunian</span> <i class='fa fa-angle-down pull-right'></i></a>
                  <ul class='treeview-menu'>
                    <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='datakosan') { echo "class='active'"; }?> <?php echo "><a href='?page=datakosan'><i class='fa fa-circle-o'></i> Data Kosan</a></li> ";
                      echo "
                        <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='datakamar') { echo "class='active'"; }?> <?php echo "><a href='?page=datakamar'><i class='fa fa-circle-o'></i> Data Kamar</a></li>
                        <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='penghuni') { echo "class='active'"; }?> <?php echo "><a href='?page=penghuni'><i class='fa fa-circle-o'></i> Data Penghuni</a></li>
                  </ul>
                </li>
              ";
            }
            if ($auth_hak_akses=="Admin") {
              echo "

                <li class='treeview";?> <?php if (isset($_GET['page'])&&(($_GET['page'])=='akunadmin')||(($_GET['page'])=='akunbiaya')||(($_GET['page'])=='akunkoperasi')) { echo "active"; }?> <?php echo " '>
                  <a href='#'><i class='fa fa-user text-success'></i> <span>Master Data Akun</span> <i class='fa fa-angle-down pull-right'></i></a>
                  <ul class='treeview-menu'>
                    <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='datauser') { echo "class='active'"; }?> <?php echo "><a href='?page=datauser'><i class='fa fa-circle-o'></i> Data Akun</a></li>

                  </ul>
                </li>
              ";
            }
            if ($auth_hak_akses=="Penghuni") {
              echo "
                    <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='lihatpemesanan') { echo "class='active'"; }?> <?php echo "><a href='?page=lihatpemesanan'><i class='fa fa-circle-o'></i> Pemesanan</a></li>
                    <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='lihatpembayaran') { echo "class='active'"; }?> <?php echo "><a href='?page=lihatpembayaran'><i class='fa fa-circle-o'></i> Pembayaran</a></li>
                    <li";?> <?php if (isset($_GET['page'])&&($_GET['page'])=='lihatpenghuni') { echo "class='active'"; }?> <?php echo "><a href='?page=lihatpenghuni'><i class='fa fa-circle-o'></i> Data diri</a></li>


              ";
            }
            ?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <?php
        $page=$_GET['page'];
        if (empty($page))
        {
      ?>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sistem Informasi Kos Wisma Ukhuwah Islamiyah (SIKOSUI)
          </h1>

        </section>

        <!-- Main content -->
      <section class="content" style="background-image: url('dist/img/logosikoui.png');background-repeat: no-repeat;background-origin: content-box;background-position: center;">


          <!-- =========================================================== -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php
        }
        else
        {
          include "$page.php";
        }
      ?>

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018</strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
    <!-- Morris.js charts -->
    <script src="plugins/morris/raphael.min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

  </body>
</html>

<?php
}
else
{

?>
<meta http-equiv=refresh content=0;url=login.php>

<?php
}
?>
