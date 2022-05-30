<?php
require('../../database/koneksi.php');
require('../../asset/pdf/fpdf.php');
$pdf = new FPDF("L","cm","A4");
$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../../asset/image/logo smk.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'SMK NEGERI 1 GENDING',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telopon : (0335) 813700',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Sumber Kerang',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'E-mail : smkn1gending@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.8,"Laporan Barang Keluar",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D d-m-Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(2.5, 0.8, 'Id', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kode Barang', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Tgl Keluar', 1, 0, 'C');
$pdf->Cell(2.8, 0.8, 'Penerima', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Jml Keluar', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Keperluan', 1, 1, 'C');
$pdf->SetFont('Arial','',9);
$query=mysqli_query($koneksi,"select * from keluar_barang");
while($lihat=mysqli_fetch_assoc($query)){ 
	$pdf->Cell(2.5, 0.8, $lihat['id_barang_keluar'] ,1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['kode_barang'],1, 0, 'L');
	$pdf->Cell(5, 0.8, $lihat['nama_barang'],1, 0, 'L');
	$pdf->Cell(2.5, 0.8, $lihat['tgl_keluar'], 1, 0,'C');
	$pdf->Cell(2.8, 0.8, $lihat['penerima'], 1, 0,'C');
	$pdf->Cell(2.5, 0.8, $lihat['jml_barang_keluar'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['keperluan'],1, 1, 'C');
	}
$pdf->Output("Laporan_Barang_Keluar.pdf","I");
?>

