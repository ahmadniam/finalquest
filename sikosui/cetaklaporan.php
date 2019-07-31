<?php
include "koneksi.php";
require('fpdf/fpdf.php');

$tahun=$_POST['tahun'];
$bulan=$_POST['bulan'];
$jumlah_desimal="0";
$pemisah_desimal=",";
$pemisah_ribuan=".";



if ($bulan==1){
  $bln='Januari';
}
elseif ($bulan==2){
  $bln='Februari';
}
elseif ($bulan==3){
  $bln='Maret';
}
elseif ($bulan==4){
  $bln='April';
}
elseif ($bulan==5){
  $bln='Mei';
}
elseif ($bulan==6){
  $bln='Juni';
}
elseif ($bulan==7){
  $bln='Juli';
}
elseif ($bulan==8){
  $bln='Agustus';
}
elseif ($bulan==9){
  $bln='September';
}
elseif ($bulan==10){
  $bln='Oktober';
}
elseif ($bulan==11){
  $bln='November';
}
elseif ($bulan==12){
  $bln='Desember';
}
else {$bln='';}

$pdf = new FPDF('P');
$pdf->SetTopMargin(25);
$pdf->SetLeftMargin(10);
$pdf->SetTitle('Laporan Keuangan');
$pdf->AddPage();
$pdf->Image('dist/img/logosikoui.png',20,15,-500);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,7,'WISMA UKHUWAH ISLAMIYAH',0,0,'C');
$pdf->ln();
$pdf->Cell(0,7,'Kost Putra',0,0,'C');
$pdf->ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,'Jalan Telogosari Utara IV No 5 RT 05/01, Kel. Tembalang, Kec. Tembalang, Kota Semarang',0,0,'C');
$pdf->Line(20, 45, 210-20, 45);
$pdf->ln(15);




if ($bulan=='0') {
  $no1=1;
  $no=1;
	$tambah = mysqli_query($koneksi,"select * from pembayaran where (year(tanggal_pembayaran) = '$tahun') and (status='Lunas') order by tanggal_pembayaran ASC ");


  $kurang = mysqli_query($koneksi,"select * from pengeluaran where (year(tanggal_pengeluaran) = '$tahun') order by tanggal_pengeluaran ASC ");


  $jmlp = mysqli_query($koneksi,"SELECT SUM(jumlah) as nilaisum FROM pembayaran WHERE year(tanggal_pembayaran)= '$tahun'and (status='Lunas')");
  $jp = mysqli_fetch_assoc($jmlp);
  $sumplus=$jp['nilaisum'];

  $jmlm = mysqli_query($koneksi,"SELECT SUM(jumlah) as nilaisum FROM pengeluaran WHERE year(tanggal_pengeluaran)= '$tahun'");
  $jm = mysqli_fetch_assoc($jmlm);
  $summinus=$jm['nilaisum'];

  $jumlah=$sumplus-$summinus;
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(0,7,'Laporan Keuangan Wisma UI',0,0,'C');
      $pdf->ln();
      $pdf->Cell(0,7,'Periode '.$bln.' '.$tahun.' ',0,0,'C');

      $pdf->ln(10);

			$pdf->Cell(10);
			$pdf->Cell(13,7,'No',1,0,'C');
			$pdf->Cell(80,7,'Pemasukan',1,0,'C');
			$pdf->Cell(30,7,'Jumlah',1,0,'C');
			$pdf->ln();

			$pdf->SetFont('Arial','',12);

      while ($plus=mysqli_fetch_assoc($tambah)){
				$pdf->Cell(10);
				$pdf->Cell(13,6,$no1,1,0,'C');
				$pdf->Cell(80,6,$plus['untuk'],1,0,'L');
				$pdf->Cell(30,6,number_format($plus['jumlah'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan),1,0,'C');
        $pdf->ln();
        $no1++;
      }
      $pdf->ln();

      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(10);
      $pdf->Cell(13,7,'No',1,0,'C');
      $pdf->Cell(80,7,'Pengeluaran',1,0,'C');
      $pdf->Cell(30,7,'Jumlah',1,0,'C');
      $pdf->ln();
      $pdf->SetFont('Arial','',12);
      while ($minus=mysqli_fetch_assoc($kurang)){
        $pdf->Cell(10);
				$pdf->Cell(13,6,$no,1,0,'C');
				$pdf->Cell(80,6,$minus['jenis_pengeluaran'],1,0,'L');
				$pdf->Cell(30,6,number_format($minus['jumlah'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan),1,0,'C');
        $pdf->ln();
        $no++;
      }

        $pdf->ln();
        $pdf->Cell(100,7,'Total Pendapatan',0,0,'C');
        $pdf->Cell(30,7,$jumlah,0,0,'R');


			$pdf->ln(20);
		}


else {
  $no1=1;
  $no=1;
	$tambah = mysqli_query($koneksi,"select * from pembayaran where (year(tanggal_pembayaran) = '$tahun') AND (month(tanggal_pembayaran) = '$bulan') and (status='Lunas') order by tanggal_pembayaran ASC ");


  $kurang = mysqli_query($koneksi,"select * from pengeluaran where (year(tanggal_pengeluaran) = '$tahun') AND (month(tanggal_pengeluaran) = '$bulan') order by tanggal_pengeluaran ASC ");


  $jmlp = mysqli_query($koneksi,"SELECT SUM(jumlah) as nilaisum FROM pembayaran WHERE year(tanggal_pembayaran)= '$tahun' AND (month(tanggal_pembayaran) = '$bulan') and (status='Lunas')");
  $jp = mysqli_fetch_assoc($jmlp);
  $sumplus=$jp['nilaisum'];

  $jmlm = mysqli_query($koneksi,"SELECT SUM(jumlah) as nilaisum FROM pengeluaran WHERE year(tanggal_pengeluaran)= '$tahun' AND (month(tanggal_pengeluaran) = '$bulan')");
  $jm = mysqli_fetch_assoc($jmlm);
  $summinus=$jm['nilaisum'];

  $jumlah=$sumplus-$summinus;


			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(10);
			$pdf->Cell(13,7,'No',1,0,'C');
			$pdf->Cell(80,7,'Pemasukan',1,0,'C');
			$pdf->Cell(30,7,'Jumlah',1,0,'C');
			$pdf->ln();

			$pdf->SetFont('Arial','',12);

      while ($plus=mysqli_fetch_assoc($tambah)){
				$pdf->Cell(10);
				$pdf->Cell(13,6,$no1,1,0,'C');
				$pdf->Cell(80,6,$plus['untuk'],1,0,'L');
				$pdf->Cell(30,6,number_format($plus['jumlah'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan),1,0,'C');
        $pdf->ln();
        $no1++;
      }
      $pdf->ln();

      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(10);
      $pdf->Cell(13,7,'No',1,0,'C');
      $pdf->Cell(80,7,'Pengeluaran',1,0,'C');
      $pdf->Cell(30,7,'Jumlah',1,0,'C');
      $pdf->ln();
      $pdf->SetFont('Arial','',12);
      while ($minus=mysqli_fetch_assoc($kurang)){
        $pdf->Cell(10);
				$pdf->Cell(13,6,$no,1,0,'C');
				$pdf->Cell(80,6,$minus['jenis_pengeluaran'],1,0,'L');
				$pdf->Cell(30,6,number_format($minus['jumlah'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan),1,0,'C');
        $pdf->ln();
        $no++;
      }

        $pdf->ln();
        $pdf->Cell(100,7,'Total Pendapatan',0,0,'C');
        $pdf->Cell(30,7,$jumlah,0,0,'R');


			$pdf->ln(20);

}





$pdf->Output();
?>
