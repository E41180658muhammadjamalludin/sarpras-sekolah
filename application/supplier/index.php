<?php 
$query=mysqli_query($koneksi,"select * from supplier");

 ?>
<a href="page.php?url=supplier-form" class="menu">+ Input Data</a>
	<table>
		<tr>
			<th>Kode Supplier</th>
			<th>Nama Supplier</th>
			<th>Alamat Supplier</th>
			<th>Telp Supplier</th>
			<th>Kota Supplier</th>
			<th>Aksi</th>
		</tr>
		<?php while ($data=mysqli_fetch_assoc($query)) { ?>
		<tr> 	 	 	 	 	 
			<td><?php echo $data['kode_supplier']; ?></td>
			<td><?php echo $data['nama_supplier']; ?></td>
			<td><?php echo $data['alamat_supplier']; ?></td>
			<td><?php echo $data['telp_supplier']; ?></td>
			<td><?php echo $data['kota_supplier']; ?></td>
			<td><a href="page.php?url=supplier-edit-<?php echo $data['kode_supplier']; ?>">Edit</a> <a href="page.php?url=supplier-hapus-<?php echo $data['kode_supplier']; ?>" onClick="return confirm('apakah anda yakin ingin menghapus')">Hapus</a></td>
		</tr>
		<?php } ?>
	</table>
	