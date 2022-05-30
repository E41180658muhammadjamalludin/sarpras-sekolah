<?php 
$query=mysqli_query($koneksi,"select * from stok");
 ?>
  <?php if($_SESSION['level']=="admin") { ?>
 <button onclick="print_d()" class="menu" style="background: #F1F1F1; color: black; float: right;">Cetak</button>
 <?php } ?>
	<table>
		<tr>
			<th> Kode Barang </th>
			<th> Nama Barang </th>
			<th>Jml Barang Masuk </th>
			<th>Jml Barang Keluar</th>
			<th>Total Barang</th>
			<th>Keterangan</th>
		</tr>
		<?php while ($data=mysqli_fetch_assoc($query)) { ?>
		<tr> 	 	 	 	 	 
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['jml_barang_masuk']; ?></td>
			<td><?php echo $data['jml_barang_keluar']; ?></td>
			<td><?php echo $data['total_barang']; ?></td>
			<td><?php echo $data['keterangan']; ?></td>
		</tr>
		<?php } ?>
	</table>
	<script type="text/javascript">
		function print_d(){
			window.open("application/stok/print_stok.php","_blank");
		}
	</script>