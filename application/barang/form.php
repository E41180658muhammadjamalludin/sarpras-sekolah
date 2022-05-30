	<center>
	<form action="page.php?url=barang-proses" method="post">
		<table class="crud">
			<tr>
				<td>Kode Barang</td>
				<td><input type="text" name="kode" value="<?=notis('kode_barang','barang','B')?>" required></td>
			</tr>
            <tr>
				<td>Nama Barang</td>
				<td><input type="text" name="nama" required></td>
			</tr>
            <tr>
				<td>Tanggal Masuk</td>
				<td><input type="text" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required></td>
			</tr>
            <tr>
				<td>Spefikasi</td>
				<td><input type="text" name="spek" required></td>
			</tr>
            <tr>
				<td>Lokasi Barang</td>
				<td><input type="text" name="lokasi" required></td>
			</tr>
            <tr>
				<td>Kategori</td>
				<td>
                <select name="kategori" required>
                	<option>Silahkan dipilih</option>
                	<option>Peralatan Kebersihan</option>
                    <option>Electronik</option>
                    <option>Peralatan ATK</option>
                </select>
                </td>
			</tr>
            <tr>
				<td>Barang masuk</td>
				<td><input type="number" min="0" name="masuk" id="masuk" oninput="cek()" required></td>
			</tr>
            <tr>
				<td>Total Barang</td>
				<td><input type="text" name="total" id="total" value="0" required></td>
			</tr>
             <tr>
				<td>Kondisi</td>
				<td>
                <select name="kondisi" required>
                	<option>Silahkan dipilih</option>
                	<option>Bagus</option>
                	<option>rusak</option>
                </select>
                </td>
			</tr>
            <tr>
				<td>Jenis Barang</td>
				<td><input type="text" name="jenis" required></td>
			</tr>
            <tr>
				<td>Sumber Dana</td>
				<td><input type="text" name="sumber" required></td>
			</tr>
			<tr>
				<td>Kode Supplier</td>
				<td>
					<select name="kode_supplier"required>
						<option>Silahkan dipilih</option>
						<?php
						$query=mysqli_query($koneksi,"select * from supplier");
						while($data=mysqli_fetch_assoc($query)){
							echo "<option>".$data['kode_supplier']."</option>";
						}
						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Ket</td>
				<td><input type="text" name="ket"required></td>
			</tr>
			<tr>
				<td><input type="submit" value="Input"></td>
				<td><input type="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	</center>

 <script type="text/javascript">
	function cek(){
	var masuk,hasil,akhir;
	masuk = parseInt(document.getElementById("masuk").value);
	hasil = document.getElementById("total");
	hasil.value = masuk;	
}
</script>