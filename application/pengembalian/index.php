<?php 
$query=mysqli_query($koneksi,"select * from kembali_barang");
 ?>
	<button onclick="print_d()" class="menu" style="background: #F1F1F1; color: black; float: right;">Cetak</button>
	<table>
		<tr>
			<th>No kembali</th>
			<th>no pinjam</th>
			<th>Tgl Pinjam</th>
			<th>Kode barang</th>
			<th>nama Barang</th>
			<th>Jml Pinjam</th>
            <th>peminjam</th>
			<th>tgl Kembali</th>
			<th>Keterangan</th>
		</tr>
		<?php while ($data=mysqli_fetch_assoc($query)) { ?>
		<tr> 	 	 	 	 	 
			<td><?php echo "K".$data['no_pengembalian']; ?></td>
			<td><?php echo $data['no_pinjam']; ?></td>
			<td><?php echo $data['tgl_pinjam']; ?></td>
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['jml_pinjam']; ?></td>
            <td><?php echo $data['peminjam']; ?></td>
			<td><?php echo substr($data['tgl_kembali'],0,10); ?></td>
			<td><?php echo $data['ket']; ?></td>
		</tr>
		<?php } ?>
	</table>
		<script type="text/javascript">
		function print_d(){
			window.open("application/pengembalian/print_kembali.php","_blank");
		}
	</script>