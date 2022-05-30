<?php 
$query=mysqli_query($koneksi,"select * from keluar_barang");
 ?>
  <?php if($_SESSION['level']=="admin") { ?>
 <button onclick="print_d()" class="menu" style="background: #F1F1F1; color: black; float: right;">Cetak</button>
 <?php } ?>
	<table>
		<tr>
			<th>Id Brg Keluar</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Tgl Keluar</th>
			<th>Penerima</th>
			<th>Jml barang Keluar</th>
            <th>Keperluan</th>
		</tr>
		<?php while ($data=mysqli_fetch_assoc($query)) { ?>
		<tr> 	 	 	 	 	 
			<td><?php echo "O".$data['id_barang_keluar']; ?></td>
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo substr($data['tgl_keluar'],0,10); ?></td>
			<td><?php echo $data['penerima']; ?></td>
			<td><?php echo $data['jml_barang_keluar']; ?></td>
            <td><?php echo $data['keperluan']; ?></td>
		</tr>
		<?php } ?>
	</table>
	<script type="text/javascript">
		function print_d(){
			window.open("application/outbarang/print_outbarang.php","_blank");
		}
	</script>