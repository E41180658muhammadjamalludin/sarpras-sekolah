<?php 
if(isset($url[2])){
$query=mysqli_query($koneksi,"select * from barang where kode_barang like '%$url[2]%'");
}else{
$query=mysqli_query($koneksi,"select * from barang");}
 ?>
<input type="" name="" id="cari" style=" float: right; height: 30px; width: 300px" placeholder="Silahkan cari berdasarkan kode barang">
<button style="float: right; height: 30px;" onclick="cari()">Cari</button>
  <?php if($_SESSION['level']=="admin") { ?>
<a href="page.php?url=barang-form" class="menu">+ Input Data</a>
 <?php } ?>
 <br><br>
	<table style="margin-top:30px">
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Spefikasi</th>
			<th>Lokasi Barang</th>
			<th>Kategori</th>
			<th>Jml barang</th>
            <th>Kondisi</th>
			<th>jenis Barang</th>
			<th>Sumber dana</th>
			 <?php if($_SESSION['level']=="admin") { ?>
			<th style="width: 130px">Aksi</th>
			<?php } ?>
		</tr>
		<?php while ($data=mysqli_fetch_assoc($query)) { ?>
		<tr> 	 	 	 	 	 
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['spefikasi']; ?></td>
			<td><?php echo $data['lokasi_barang']; ?></td>
			<td><?php echo $data['kategori']; ?></td>
			<td><?php echo $data['jml_barang']; ?></td>
            <td><?php echo $data['kondisi']; ?></td>
			<td><?php echo $data['jenis_barang']; ?></td>
			<td><?php echo $data['sumber_dana']; ?></td>
			 <?php if($_SESSION['level']=="admin") { ?>
			<td><a href="page.php?url=barang-edit-<?php echo $data['kode_barang']; ?>">Edit</a>  <a onclick="return confirm('Apakah nda ingin menghapus data ini ?')" href="page.php?url=barang-hapus-<?php echo $data['kode_barang']; ?>">Hapus</a></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
<?php if($_SESSION['level']=="admin") { ?>
	<button onclick="print_d()" class="menu" style=" margin-top: 50px; background: #F1F1F1; color: black; float: right;">Cetak</button>
	<?php } ?>
	<script type="text/javascript">
		function cari(){	
	var cari = document.getElementById('cari').value;
	document.location.href='page.php?url=barang-index-'+cari;
}
		function print_d(){
			window.open("application/barang/print_barang.php","_blank");
		}
	</script>
