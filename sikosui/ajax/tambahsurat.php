   <!-- combo box-->
    <link href="style/css/select/select2.min.css" rel="stylesheet">              
                <div class="">                  
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Data Surat Jaminan Perawatan Kesehatan</h2><br/>                                                                        
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Simpan data -->
                                    <?php
                                        if (isset($_POST['simpan']))
                                            {
                                                 $no_srt          = $_POST['no_srt'];
                                                 $srtsdr_no       = $_POST['srtsdr_no'];
                                                 $lampiran        = $_POST['lampiran'];
                                                 $id_kel          = $_POST['id_kel'];
                                                 $id_jnsperawatan = $_POST['id_jnsperawatan'];         
                                                 $id_rs           = $_POST['id_rs'];
                                                 $tgl_masuk       = $_POST['tgl_masuk'];                                                      
                                                 $tgl_masuk       = date("Y-m-d", strtotime($tgl_masuk)); 
                                                 $query = "INSERT INTO srt_jaminan (id_rs, id_jnsperawatan, id_kel, no_srt, srtsdr_no, lampiran, tgl_pengajuansrt ,tgl_masuk, stat_surat)
                                                            VALUES ('$id_rs', '$id_jnsperawatan', '$id_kel', '$no_srt', '$srtsdr_no', '$lampiran', NOW(),'$tgl_masuk', 'Proses')";
                                                 $hasil = mysqli_query($koneksidb, $query);                                                                                                                                              
                                                    if ($hasil)
                                                    {
                                                        echo "<div class='alert alert-success'>
                                                                 <span class='glyphicon glyphicon-ok-circle'></span> <strong>Data berhasil disimpan, menampilkan data</strong>&nbsp;<img src='gambar/loading.gif' width='20'> 
                                                              </div>";
                                                        echo "<meta http-equiv=refresh content=2;url=?page=surat>";
                                                    }
                                                    else
                                                    {
                                                    echo "<div class='alert alert-danger'>
                                                             <span class='glyphicon glyphicon-alert'></span> <strong>Gagal menyimpan data</strong> 
                                                          </div>";
                                                    }                                                                
                                            }
                                    ?>
                                <div class="x_content">
                                    <br />
                                    <form  method="post" name="formtambah" action="?page=tambahsurat" onsubmit="return cekdata()" class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Surat</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="no_srt" value="/450/UPMRC/<?php echo date('Y'); ?>" required class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Surat Sdr.No</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="srtsdr_no" placeholder="-"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lampiran</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="lampiran" placeholder="-"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="idpegawai form-control" tabindex="-1" name="id_pegawai" id="id_pegawai">
                                                    <option value="" selected>---- Pilih Pegawai / Pensiunan (Ketik Nama Untuk Mencari) ----</option>
                                                    <?php
                                                      $query = ("SELECT * FROM pegawai order by nama_pegawai asc");
                                                      $hasil = mysqli_query($koneksidb, $query);
                                                      while ($t=mysqli_fetch_assoc($hasil))
                                                      {
                                                        echo "<option value=$t[id_pegawai]>$t[nama_pegawai]</option>";
                                                      }
                                                    ?>                                                                                   
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="form-group" id="informasipegawai">
                                            
                                        </div>    
                                        <div class="ln_solid"></div>
                                        Surat Jaminan ini diberikan kepada yang bersangkutan untuk keperluan perawatan sebagai berikut :                                                                   
                                        <div class="ln_solid"></div>  
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pasien</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="id_kel" id="id_kel" required>
                                                    <option value="" selected>---- Pilih ----</option>
                                                                                                               
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="form-group" id="infokel">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Perawatan</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="id_jnsperawatan" required>
                                                    <option value="" selected>---- Pilih Jenis Perawatan ----</option>
                                                    <?php
                                                      $query = ("SELECT * FROM jenis_perawatan");
                                                      $hasil = mysqli_query($koneksidb, $query);
                                                      while ($t=mysqli_fetch_assoc($hasil))
                                                      {
                                                        echo "<option value=$t[id_jnsperawatan]>$t[nama_jnsperawatan]</option>";
                                                      }
                                                    ?>                                                   
                                                </select>
                                            </div>
                                        </div>     
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rumah Sakit</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="idrs form-control" tabindex="-1" name="id_rs">
                                                    <option value="" selected>---- Pilih Rumah Sakit ----</option>
                                                    <?php
                                                      $query = ("SELECT * FROM rumah_sakit order by nama_rs asc");
                                                      $hasil = mysqli_query($koneksidb, $query);
                                                      while ($t=mysqli_fetch_assoc($hasil))
                                                      {
                                                        echo "<option value=$t[id_rs]>$t[nama_rs]</option>";
                                                      }
                                                    ?>                                                                                   
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Masuk</label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="datetimepicker2" type="text" name="tgl_masuk" required class="form-control col-md-7 col-xs-12">                          
                                              </div>
                                        </div>                                                                                
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                               <input type="reset" class="btn btn-danger" value="Batal" onclick="window.location='?page=surat'">
                                               <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       

<!-- tanggal -->
    <script src="style/tanggal/jquery.js"></script>
    <script src="style/tanggal/jquery.datetimepicker.js"></script>

<!-- combo box -->
    <script src="style/js/select/select2.full.js"></script>

<!-- script combo box rumah sakit -->
    <script>
        $(document).ready(function () {
            $(".idrs").select2({
                placeholder: "---- Pilih Rumah Sakit ----",
                allowClear: true
              });
        });
    </script>
    <!-- script combo box pegawai -->
    <script>
        $(document).ready(function () {
            $(".idpegawai").select2({
                placeholder: "---- Pilih Pegawai / Pensiunan (Ketik Nama Untuk Mencari) ----",
                allowClear: true
              });
        });
    </script>

<!-- script tanggal-->
<script type="text/javascript">
jQuery('#datetimepicker2').datetimepicker({
 lang:'id',
 timepicker:false,
 format:'d-m-Y'
});
</script>
    
<!-- cek isi combo box-->
<script type="text/javascript">
  function cekdata ()
  {
    if (formtambah.id_pegawai.value=="")
    {
      alert("Anda Belum Memilih Pegawai / Pensiunan");
      return false;
    } 
    if (formtambah.id_rs.value=="")
    {
      alert("Anda Belum Memilih Rumah Sakit");
      return false;
    }           
  }
</script>
<!-- /cek isi combo box-->    

<!--informasi pegawai-->    
<script type="text/javascript">
    $(document).ready(function(){
        $('#id_pegawai').change(function(){
            var id_pegawai = $('#id_pegawai').val();
            $.ajax({
                url:'infopeg.php',
                data:'id_pegawai='+id_pegawai,
                success:function(data){
                   $('#informasipegawai').html(data);                                    
                }
            });
        });
    });
</script>

<!--combobox anggota keluarga-->    
<script type="text/javascript">
    $(document).ready(function(){
        $('#id_pegawai').change(function(){
            var id_pegawai = $('#id_pegawai').val();
            $.ajax({
                url:'cekkel.php',
                data:'id_pegawai='+id_pegawai,
                success:function(data){
                   $('#id_kel').html(data);                                    
                }
            });
        });
    });
</script>

<!--informasi anggota keluarga-->    
<script type="text/javascript">
    $(document).ready(function(){
        $('#id_kel').change(function(){
            var id_kel = $('#id_kel').val();
            $.ajax({
                url:'infokel.php',
                data:'id_kel='+id_kel,
                success:function(data){
                   $('#infokel').html(data);                                    
                }
            });
        });
    });
</script>