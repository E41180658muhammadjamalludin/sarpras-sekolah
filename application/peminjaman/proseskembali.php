<?php 
$query=mysqli_query($koneksi,"update pinjam_barang set jml_pinjam=(jml_pinjam-$_POST[jmlk]) where no_pinjam='$_POST[no]'");
$query2=mysqli_query($koneksi,"select * from pinjam_barang where no_pinjam='$_POST[no]'");
$data=mysqli_fetch_assoc($query2);
if($data['jml_pinjam'] == 0){
$query3=mysqli_query($koneksi,"delete from pinjam_barang where no_pinjam='$_POST[no]'");
$query4=mysqli_query($koneksi,"insert into kembali_barang(no_pinjam,tgl_pinjam,kode_barang,nama_barang,jml_pinjam,peminjam,tgl_kembali,kondisi,ket) values('$_POST[no]','$_POST[tglpinjam]','$_POST[kode]','$_POST[nama]','$_POST[jmlp]','$_POST[peminjam]','$_POST[tglkembali]','$_POST[kondisi]','Sudah Kembali')");
}
$query5=mysqli_query($koneksi,"update stok set jml_barang_keluar=(jml_barang_keluar-$_POST[jmlk]) where kode_barang='$_POST[kode]'");
$query6=mysqli_query($koneksi,"select * from stok where kode_barang='$_POST[kode]'");
$data1=mysqli_fetch_assoc($query6);
$masuk=$data1['jml_barang_masuk'];
$keluar=$data1['jml_barang_keluar'];
$hasil=$masuk - $keluar;
$query7=mysqli_query($koneksi,"update stok set total_barang='$hasil' where kode_barang='$_POST[kode]'");
if ($query && $query5 && $query7) {
	$_SESSION['msg']="Berhasil Pengembalian data";
	$_SESSION['class']="succes";
} else {
	$_SESSION['msg']="Gagal Pengembalian data";
	$_SESSION['class']="warn";
}
echo "<script>document.location.href='page.php?url=peminjaman-index'</script>"
 ?>
