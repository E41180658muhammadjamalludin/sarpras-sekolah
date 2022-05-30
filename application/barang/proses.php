<?php 
$query=mysqli_query($koneksi,"insert into barang values('$_POST[kode]','$_POST[nama]' , '$_POST[spek]','$_POST[lokasi]','$_POST[kategori]','$_POST[total]','$_POST[kondisi]','$_POST[jenis]','$_POST[sumber]')");
$query1=mysqli_query($koneksi,"insert into masuk_barang (kode_barang,nama_barang,tgl_masuk,jml_masuk,kode_supplier,keterangan) values('$_POST[kode]' ,'$_POST[nama]', '$_POST[tanggal]','$_POST[masuk]','$_POST[kode_supplier]','Barang Baru')");
$query2=mysqli_query($koneksi,"insert into stok values('$_POST[kode]','$_POST[nama]', '$_POST[masuk]','0','$_POST[total]','$_POST[ket]')");
if ($query && $query1 && $query2) {
	$_SESSION['msg']="Berhasil Input data";
	$_SESSION['class']="succes";
} else {
	$_SESSION['msg']="Gagal Input data";
	$_SESSION['class']="warn";
}
echo "<script language='javascript'>document.location.href='page.php?url=barang-index';</script>";
 ?>