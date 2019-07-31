<?php
include "koneksi.php";
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
session_destroy();
mysqli_close($koneksi);

echo "<meta http-equiv=refresh content=0;url=login.php>";
?>