<?php 
$query=mysqli_query($koneksi,"select * from masuk_barang");
 ?>
 <?php if($_SESSION['level']=="admin") { ?>
 <a href="page.php?url=barang-form" class="menu"> + Tambah Data</a>
 <button onclick="print_d()" class="menu" style="background: #F1F1F1; color: black; float: right;">Cetak</button>
 <?php } ?>
	<table >
		<tr>
			<th>Id</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Tgl masuk</th>
			<th>Jml masuk</th>
			<th>Kode supplier</th>
			<th>Keterangan</th>
		</tr>
		<?php while ($data=mysqli_fetch_assoc($query)) { ?>
		<tr> 	 	 	 	 	 
			<td><?php echo "IN00".$data['id_msk_barang']; ?></td>
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['tgl_masuk']; ?></td>
			<td><?php echo $data['jml_masuk']; ?></td>
			<td><?php echo $data['kode_supplier']; ?></td>
			<td><?php echo $data['keterangan']; ?></td>
		</tr>
		<?php } ?>
	</table>
	<script type="text/javascript">
		function print_d(){
			window.open("application/inbarang/print_inbarang.php","_blank");
		}
	</script>