<?php 
$query=mysqli_query($koneksi,"insert into pinjam_barang values('$_POST[no]','$_POST[tglpinjam]' ,'$_POST[kode]', '$_POST[nama]','$_POST[jml]','$_POST[jml]','$_POST[peminjam]','$_POST[tglkembali]','$_POST[kondisi]','$_POST[ket]')");
$query2= mysqli_query($koneksi,"update stok set jml_barang_keluar=(jml_barang_keluar+'$_POST[jml]') where kode_barang='$_POST[kode]'");
$query4=mysqli_query($koneksi,"select * from stok where kode_barang='$_POST[kode]'");
$data=mysqli_fetch_assoc($query4);
$masuk=$data['jml_barang_masuk'];
$keluar=$data['jml_barang_keluar'];
$hasil=$masuk - $keluar;
$query5=mysqli_query($koneksi,"update stok set total_barang='$hasil' where kode_barang='$_POST[kode]'");
if ($query && $query5 && $query4 && $query2) {
	$_SESSION['msg']="Berhasil Transaksi data";
	$_SESSION['class']="succes";
} else {
	$_SESSION['msg']="Gagal Transaksi data";
	$_SESSION['class']="warn";
}
echo "<script language='javascript'>document.location.href='page.php?url=peminjaman-index';</script>";
 ?>
