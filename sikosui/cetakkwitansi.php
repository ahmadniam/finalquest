<?php
include "koneksi.php";
require('fpdf/fpdf.php');

$id_pembayaran=$_POST['pembayaran'];

$jumlah_desimal="0";
$pemisah_desimal=",";
$pemisah_ribuan=".";

function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}
		return $hasil;
	}


$pdf = new FPDF('L');
$pdf->SetTopMargin(25);
$pdf->SetLeftMargin(10);
$pdf->SetTitle('Kwitansi Pembayaran');
$pdf->AddPage();
$pdf->Image('dist/img/logosikoui.png',20,20,-500);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,'Kwitansi Pembayaran',0,0,'C');
$pdf->ln();
$pdf->ln(20);


  $bayar=mysqli_query($koneksi,"select * from pembayaran where id_pembayaran=$id_pembayaran");
  $byr=mysqli_fetch_assoc($bayar);


  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10);
  $pdf->Cell(40,7,'Tanggal         : ',0,0,'L');
  $pdf->Cell(80,7,$byr['tanggal_pembayaran'],0,0,'L');
  $pdf->ln();
  $pdf->Cell(10);
  $pdf->Cell(40,7,'Telah diterima dari :  ',0,0,'L');
  $pdf->Cell(70,7,$byr['nama'],0,0,'C');
	$pdf->Cell(25,7,', kamar no',0,0,'L');
	$pdf->Cell(10,7,$byr['kamar'],0,0,'L');
  $pdf->ln();
	$pdf->Cell(10);
  $pdf->Cell(40,7,'Untuk membayar    : ',0,0,'L');
	$pdf->Cell(10);
  $pdf->Cell(40,7,$byr['untuk'],0,0,'C');
  $pdf->ln();
  $pdf->Cell(10);
  $pdf->Cell(40,7,'Uang Sejumlah       : ',0,0,'L');
  $pdf->Cell(40,7,number_format($byr['jumlah'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan),0,0,'C');
  $pdf->ln();
  $pdf->Cell(10);
  $pdf->Cell(50,7,'Terbilang                 :    ',0,0,'L');
  $pdf->Cell(100,7,terbilang($byr['jumlah']),0,0,'L');
	 $pdf->ln();
	$pdf->Cell(10);
  $pdf->Cell(40,7,'Keterangan             :  ',0,0,'L');
  $pdf->Cell(80,7,'.................................................................',0,0,'L');
  $pdf->ln(10);
	$pdf->Cell(100);
	$pdf->Cell(40,7,'Yang menerima',0,0,'R');
	$pdf->ln(30);
	$pdf->Cell(100);
	$pdf->Cell(40,7,'(.........................)',0,0,'R');
	$pdf->ln();


$pdf->Output();




 ?>
