<?php

          include "koneksi.php";

          $a1=array();
          $b1=array();
          $c1=array();
          $i=1;
          $query1 = mysqli_query($koneksi,"select * from koperasi_periode join koperasi on koperasi_periode.id_koperasi=koperasi.id_koperasi
              where koperasi_periode.id_koperasi=2 order by tahun_periode_koperasi desc, bulan_periode_koperasi*1 desc"); 
          $cek=mysqli_num_rows($query1);

          while($zz = mysqli_fetch_assoc($query1))
          {
            if ($i<13) {
              if ($zz['bulan_periode_koperasi']==1) { $bln='Januari';}
              elseif ($zz['bulan_periode_koperasi']==2) {$bln='Februari';}
              elseif ($zz['bulan_periode_koperasi']==3) {$bln='Maret';}
              elseif ($zz['bulan_periode_koperasi']==4) {$bln='April';}
              elseif ($zz['bulan_periode_koperasi']==5) {$bln='Mei';}
              elseif ($zz['bulan_periode_koperasi']==6) {$bln='Juni';}
              elseif ($zz['bulan_periode_koperasi']==7) {$bln='Juli';}
              elseif ($zz['bulan_periode_koperasi']==8) {$bln='Agustus';}
              elseif ($zz['bulan_periode_koperasi']==9) {$bln='September';}
              elseif ($zz['bulan_periode_koperasi']==10) {$bln='Oktober';}
              elseif ($zz['bulan_periode_koperasi']==11) {$bln='November';}
              elseif ($zz['bulan_periode_koperasi']==12) {$bln='Desember';}

              $a2=array($bln);
              $b2=array($zz['volume_usaha']);
              $c2=array($zz['tahun_periode_koperasi']);

              $a1=array_merge($a2,$a1);
              $b1=array_merge($b2,$b1);
              $c1=array_merge($c2,$c1);
            }
            $i++;
          }          

          $for=0;
          foreach ($a1 as $keya1) {
            echo "$keya1 $c1[$for]";
            echo "=";
            echo "$b1[$for]";
            echo ",";
            $for++;
          }


 ?>