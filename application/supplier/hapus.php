<?php 
$kode=$url['2'];
$query=mysqli_query($koneksi,"delete from supplier where kode_supplier='$kode'");
if ($query) {
	$_SESSION['msg']="Berhasil Hapus data";	
	$_SESSION['class']="succes";
} else {
	$_SESSION['msg']="Gagal Hapus data";	
	$_SESSION['class']="warn";
}
echo "<script language='javascript'>document.location.href='page.php?url=supplier-index';</script>";
 ?>