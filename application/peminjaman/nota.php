<?php
require('../../database/koneksi.php');
require('../../asset/pdf/fpdf.php');
?>
<?php
$pdf = new FPDF("L","cm","A4");
$pdf->SetMargins(2,1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../../asset/image/logo smk.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'SMK NEGERI 1 GENDING',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : (0335) 813700',0,'L');    
$pdf->SetFont('Arial','B',11);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Sumber Kerang',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'E-mail : smkn1gending@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(0.8);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25.5,0.7,"Nota Peminjaman",0,12,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5.3,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(0.8);
$pdf->SetFont('Arial','B',10);
$no_pinjam=mysqli_escape_string($koneksi,$_GET['no_pinjam']);
$query2=mysqli_query($koneksi,"select*from pinjam_barang where no_pinjam='$no_pinjam'");
$data=mysqli_fetch_assoc($query2);	
$pdf->Cell(5,0.5,'No Pinjam',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(8, 0.5,$data['no_pinjam']);
$pdf->Cell(5,0.5,'Tgl Pinjam ',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(1, 0.5,$data['tgl_pinjam']);
$pdf->ln(0.8);
$pdf->Cell(5,0.5,'Kode Barang',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(8, 0.5,$data['kode_barang']);
$pdf->Cell(5,0.5,'Nama Barang	 ',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(1, 0.5,$data['nama_barang']);
$pdf->ln(0.8);
$pdf->Cell(5,0.5,'Jml Pinjam',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(8, 0.5,$data['jml_pinjam']);
$pdf->Cell(5,0.5,'Peminjam	 ',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(1, 0.5,$data['peminjam']);
$pdf->ln(0.8);
$pdf->Cell(5,0.5,'Tgl Kembali',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(8, 0.5,$data['tgl_kembali']);
$pdf->Cell(5,0.5,'Keterangan',0,'L');
$pdf->Cell(1, 0.5,':',0,'L');
$pdf->Cell(1, 0.5,$data['keterangan']);
$pdf->ln(0.8);
$pdf->ln(0.8);
$pdf->Cell(14, 0.5,'');
$pdf->ln(2);
$pdf->Cell(20,0.5,'Peminjam',20,'C');
$pdf->Cell(10,0.5,'Petugas',0,'C');
$pdf->ln(3);
$pdf->Cell(20.2,0.5,$data['peminjam'],20,'C');
$pdf->Cell(10,0.5,$_SESSION['login'],0,'C');
$pdf->Output("laporan_peminjaman.pdf","I");
?>
