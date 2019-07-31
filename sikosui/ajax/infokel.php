<?php
 //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED ));
 include "konfig/konek_db.php";
 include "ceksession.php";
?>

<?php
  $id_kel = $_GET['id_kel'];
  $query  = "SELECT * fROM anggota_keluarga join pegawai on anggota_keluarga.id_pegawai=pegawai.id_pegawai join jabatan on pegawai.id_jabatan=jabatan.id_jabatan join kelas_rawat on jabatan.id_klsrawat=kelas_rawat.id_klsrawat where id_kel='$id_kel'";
  $hasil  = mysqli_query($koneksidb, $query);
  $t      =mysqli_fetch_assoc($hasil);
?>       	          
 	<div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Umur</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
      <?php
          $tgllahir = date_create($t['tgl_lahir']);
          $tglskrng = date_create(date('Y-m-d'));
          $hitung   = date_diff($tglskrng, $tgllahir);

              if($hitung->y > 0)
              {
                echo "<input value='$hitung->y Tahun' disabled class='form-control'>";
              }
              else if($hitung->y == 0 && $hitung->m > 0 )
              {
                  echo "<input value='$hitung->m Bulan' disabled class='form-control'>";
              }
              else
              {
                echo "<input value='$hitung->d Hari' disabled class='form-control'>";
              }
      ?>                                                         
      </div>
  </div>  
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Hubungan</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" value="<?php echo $t['hub_keluarga'];?>" disabled class="form-control col-md-7 col-xs-12">
      </div>
  </div>    
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Rawat Kelas</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" value="<?php echo $t['nama_klsrawat'];?>" disabled class="form-control col-md-7 col-xs-12">
      </div>
  </div>    
    <div class="form-group">
    	<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
    	<div class="col-md-6 col-sm-6 col-xs-12">
        	<textarea class="form-control" placeholder="<?php echo $t['alamat']; ?>" disabled></textarea>
    </div>

 

  	             