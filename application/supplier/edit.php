<?php 
$id=$url['2'];
$query=mysqli_query($koneksi,"select * from supplier where kode_supplier='$id'");
$data=mysqli_fetch_assoc($query);
 ?>
	<center>
	<form action="page.php?url=supplier-simpan" method="post">
		<table border="3" class="crud">
			<input type="hidden" name="kode" value="<?php echo $data['kode_supplier']; ?>" required>
			<tr>
				<td>Nama supplier</td>
				<td><input type="text" name="nama" value="<?php echo $data['nama_supplier']; ?>" required></td>
			</tr>
			<tr>
				<td>Alamat Supplier</td>
				<td><textarea name="alamat" id="" cols="25" rows="10" required><?php echo $data['alamat_supplier']; ?></textarea></td>
			</tr>
			<tr>
				<td>Telp Supplier</td>
				<td><input type="text" name="telp" value="<?php echo $data['telp_supplier']; ?>" required></td>
			</tr>
            <tr>
				<td>Kota Supplier</td>
				<td><input type="text" name="kota" value="<?php echo $data['kota_supplier']; ?>" required></td>
			</tr>
			<tr>
				<td><input type="submit" value="Edit"></td>
				<td><input type="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	</center>