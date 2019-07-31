<?php
 //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
 include "konfig/konek_db.php";
 include "ceksession.php";
?>

<?php
	$id_pegawai = $_GET['id_pegawai'];
	$query      = "SELECT * FROM pegawai join jabatan on pegawai.id_jabatan=jabatan.id_jabatan where id_pegawai='$id_pegawai'";
	$hasil      = mysqli_query($koneksidb, $query);
    $t=mysqli_fetch_assoc($hasil);
?>       	          
 	<div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
         <div class="col-md-6 col-sm-6 col-xs-12">
          <?php 
          if ($t['status_pegawai']=="Pensiunan")
          {
            echo "<input value='Pensiunan' disabled class='form-control' id='nip'>";	
          }
          else
          {
          	echo "<input value='$t[nip]' disabled class='form-control' id='nip'>";
          }
          ?>
            
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
         <div class="col-md-6 col-sm-6 col-xs-12">
          <?php 
          if ($t['status_pegawai']=="Pensiunan")
          {
            echo "<input value='Pensiunan UP Mrica' disabled class='form-control'>";	
          }
          else
          {
          	echo "<input value='$t[nama_jabatan]' disabled class='form-control'>";
          }
          ?>
        </div>
    </div> 
    <div class="form-group">
    	<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
    	<div class="col-md-6 col-sm-6 col-xs-12">
        	<textarea class="form-control" placeholder="<?php echo $t['alamat']; ?>" disabled></textarea>
    </div>

 

  	             