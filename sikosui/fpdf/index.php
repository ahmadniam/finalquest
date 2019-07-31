<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,6,'Kode',1,0,'C');
$pdf->Cell(40,6,'Nama',1,0,'C');
$pdf->Cell(40,6,'Kelamin',1,0,'C');
$pdf->Cell(40,6,'Alamat',1,0,'C');
$pdf->ln();

$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$pdf->SetFont('Arial','',12);
$query = $mysqli->query("SELECT * FROM fpdf");
while($row = $query->fetch_array(MYSQLI_ASSOC)){
	$pdf->Cell(40,6,$row['kode'],1,0,'C');
	$pdf->Cell(40,6,$row['nama'],1,0,'L');
	$pdf->Cell(40,6,$row['kelamin'],1,0,'L');
	$pdf->Cell(40,6,$row['alamat'],1,0,'L');
	$pdf->ln();
}

$pdf->Output();
?>