<?php 
$sql="insert into supplier values('$_POST[kode]','$_POST[nama]' ,'$_POST[alamat]', '$_POST[telp]','$_POST[kota]')";
$query=mysqli_query($koneksi,$sql);
if ($query){
$_SESSION['msg']="Berhasil Input data";
	$_SESSION['class']="succes";
} else {
$_SESSION['msg']="Gagal Input data";
	$_SESSION['class']="warn";
}
echo "<script language='javascript'>document.location.href='page.php?url=supplier-index';</script>";

 ?>