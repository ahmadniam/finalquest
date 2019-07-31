<?php
 //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
 include "konfig/konek_db.php";
 include "ceksession.php";
?>
<?php
	$id_pegawai = $_GET['id_pegawai'];
	$query      = ("SELECT * FROM anggota_keluarga where id_pegawai='$id_pegawai' order by nama_anggota asc");
	$hasil      = mysqli_query($koneksidb, $query);
    echo " <option value=''>---- Pilih ----</option>";
    while ($t=mysqli_fetch_assoc($hasil))
    {
      echo "<option value=$t[id_kel]>$t[nama_anggota]</option>";
    }
?>   
