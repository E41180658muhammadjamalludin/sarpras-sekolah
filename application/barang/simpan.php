<?php 
$query=mysqli_query($koneksi,"update barang set nama_barang='$_POST[nama]' , spefikasi='$_POST[spek]', lokasi_barang='$_POST[lokasi]', kategori='$_POST[kategori]',jml_barang='$_POST[total]', kondisi='$_POST[kon]', jenis_barang='$_POST[jenis]',sumber_dana='$_POST[sumber]' where kode_barang='$_POST[kode]'");
$query3=mysqli_query($koneksi,"insert into masuk_barang(kode_barang,nama_barang,tgl_masuk,jml_masuk,kode_supplier,keterangan) values('$_POST[kode]','$_POST[nama]','$_POST[tanggal]','$_POST[masuk]','$_POST[kode_supplier]','Barang Baru')");
if(!isset($_POST['cek0'])){
$query2=mysqli_query($koneksi,"update stok set jml_barang_masuk=(jml_barang_masuk+$_POST[masuk]) where kode_barang='$_POST[kode]'");
}
if(isset($_POST['cek0'])){
	$query5=mysqli_query($koneksi,"update stok set jml_barang_keluar=(jml_barang_keluar-$_POST[jmlk]) where kode_barang='$_POST[kode]'");
$query01=mysqli_query($koneksi,"SELECT MAX(id_msk_barang) FROM masuk_barang");
$data01=mysqli_fetch_array($query01);
$query02=mysqli_query($koneksi,"update masuk_barang set keterangan='Barang Pergantian' where id_msk_barang='$data01[0]'");
$quer7=mysqli_query($koneksi,"update pinjam_barang set jml_pinjam=(jml_pinjam-$_POST[cek0]) where no_pinjam='$_POST[cek1]'");
$query11=mysqli_query($koneksi,"select * from pinjam_barang where no_pinjam='$_POST[no]'");
$data11=mysqli_fetch_assoc($query11);
if($data11['jml_pinjam'] == 0){
$query31=mysqli_query($koneksi,"delete from pinjam_barang where no_pinjam='$_POST[no]'");
$query41=mysqli_query($koneksi,"insert into kembali_barang(no_pinjam,tgl_pinjam,kode_barang,nama_barang,jml_pinjam,peminjam,tgl_kembali,kondisi,ket) values('$_POST[no]','$_POST[tglpinjam]','$_POST[kode]','$_POST[nama]','$_POST[jmlp]','$_POST[peminjam]','$_POST[tglkembali]','$_POST[kondisi]','Sudah Kembali')");
}
}
$query4=mysqli_query($koneksi,"select * from stok where kode_barang='$_POST[kode]'");
$data=mysqli_fetch_assoc($query4);
$masuk=$data['jml_barang_masuk'];
$keluar=$data['jml_barang_keluar'];
$hasil=$masuk - $keluar;
$query5=mysqli_query($koneksi,"update stok set total_barang='$hasil' where kode_barang='$_POST[kode]'");
if ($query && $query3  && $query4 && $query5) {
	$_SESSION['msg']="Berhasil Edit data";
	$_SESSION['class']="succes";
} else {
	$_SESSION['msg']="Gagal Edit data";
	$_SESSION['class']="warn";
}
if (isset($_POST['cek0'])) {
echo "<script language='javascript'>document.location.href='page.php?url=peminjaman-index';</script>";
} else {
	echo "<script language='javascript'>document.location.href='page.php?url=barang-index';</script>";
}
 ?>