	<center>
	<form action="page.php?url=supplier-proses" method="post" onsubmit="return input()">
		<table border="3" class="crud">
			<tr>
				<td>Kode Supplier</td>
				<td><input type="text" name="kode" value="<?=notis('kode_supplier','supplier','S')?>" required></td>
			</tr>
			<tr>
				<td>Nama Supplier</td>
				<td><input type="text" name="nama"  required></td>
			</tr>
			<tr>
				<td>Alamat Supplier</td>
				<td><textarea name="alamat" required></textarea></td>
			</tr>
			<tr>
				<td>Telp Supplier</td>
				<td><input type="text" name="telp"  required></td>
			</tr>
            <tr>
				<td>Kota Supplier</td>
				<td><input type="text" name="kota"  required></td>
			</tr>
			<tr>
				<td><input type="submit" value="Input"></td>
				<td><input type="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	</center>
	<script>
		function input(){
			<?php $_SESSION['input'] ="Ada"; ?>
			return true;
		}
	</script>