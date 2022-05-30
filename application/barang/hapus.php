<?php 
$id=$url['2'];
$query=mysqli_query($koneksi,"delete from barang where kode_barang='$id'");
$query1=mysqli_query($koneksi,"delete from stok where kode_barang='$id'");
$query2=mysqli_query($koneksi,"delete from masuk_barang where kode_barang='$id'");
$query3=mysqli_query($koneksi,"delete from keluar_barang where kode_barang='$id'");
if ($query && $query1 && $query2 && $query3) {
	$_SESSION['msg']="Berhasil Hapus data";	
	$_SESSION['class']="succes";
} else {
	$_SESSION['msg']="Gagal Hapus data";
	$_SESSION['class']="warn";
}
echo "<script language='javascript'>document.location.href='page.php?url=barang-index';</script>";
 ?>