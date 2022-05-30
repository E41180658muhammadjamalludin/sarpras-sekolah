<?php 
if(!isset($url['2'])){
$query=mysqli_query($koneksi,"select * from pinjam_barang");
}else{
$query=mysqli_query($koneksi,"select * from pinjam_barang where no_pinjam like '%$url[2]%'");
}
 ?>
<a href="page.php?url=peminjaman-form" class="menu">+ Tambah Data</a>
<input type="" name="" id="cari" style="float: right; height: 30px; width: 300px" placeholder="Silahkan cari berdasarkan no pinjam">
<button style="float: right; height: 30px;" onclick="cari()">Cari</button>
	<table>
		<tr>
			<th>No Pinjam</th>
			<th>Tgl <br> Pinjam</th>
			<th>Kode <br> Barang</th>
			<th>Nama Barang</th>
			<th>Jml pinjam</th>
			<th>Peminjam</th>
            <th>Tgl Kembali</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
            <th>Kembali</th>
		</tr>
		<?php
		 while ($data=mysqli_fetch_assoc($query)) { ?>
		<tr> 	 	 	 	 	 
			<td><?php echo $no=$data['no_pinjam']; ?>
				<input type="hidden" id="no_pjm" value="<?php echo $data['no_pinjam']; ?>">
			</td>
			<td><?php echo $data['tgl_pinjam']; ?></td>
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['jml_pinjam']; ?></td>
			<td><?php echo $data['peminjam']; ?></td>
            <td><?php echo $data['tgl_kembali']; ?></td>
            <td><?php echo $data['kondisi']; ?></td>
			<td><?php echo $data['keterangan']; ?></td>
            <td><a href="" onclick="print_d('<?php echo $no; ?>')">Nota</a><a href="page.php?url=peminjaman-kembali-<?php echo $data['no_pinjam']; ?>">Kembali</a></td>
		</tr>
		<?php
		 } ?>
	</table>
	<script language='javascript'>
function print_d(i){
			window.open("application/peminjaman/nota.php?no_pinjam="+i,"_blank");
			no_p="";
		}
	function cari(){	
	var cari = document.getElementById('cari').value;
	document.location.href='page.php?url=peminjaman-index-'+cari;
}
	</script>