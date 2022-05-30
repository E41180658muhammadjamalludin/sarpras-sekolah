<?php 
$query=mysqli_query($koneksi,"update supplier set nama_supplier='$_POST[nama]' , alamat_supplier='$_POST[alamat]', telp_supplier='$_POST[telp]', kota_supplier='$_POST[kota]' where kode_supplier='$_POST[kode]'");
if ($query) {
	$_SESSION['msg']="Berhasil Edit data";
	$_SESSION['class']="succes";
} else {
	$_SESSION['msg']="Gagal Edit data";
	$_SESSION['class']="warn";
}
echo "<script language='javascript'>document.location.href='page.php?url=supplier-index';</script>";
 ?>
