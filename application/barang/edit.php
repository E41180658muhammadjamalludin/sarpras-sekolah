<?php
$query=mysqli_query($koneksi,"select * from barang where kode_barang='$url[2]'");
$data=mysqli_fetch_assoc($query);
$query1=mysqli_query($koneksi,"select * from stok where kode_barang='$url[2]'");
$data2=mysqli_fetch_assoc($query1);
$query2=mysqli_query($koneksi,"select * from masuk_barang where kode_barang='$url[2]'");
$data3=mysqli_fetch_assoc($query2);
 ?>
<center>
	<form action="page.php?url=barang-simpan" method="post">
		<table border="3" class="crud">
			<input type="hidden" name="kode" value="<?= $data['kode_barang'] ?>" required>
            <tr>
				<td>Nama Barang</td>
				<td><input type="text" name="nama" value="<?= $data['nama_barang'] ?>"  required></td>
			</tr>
            <tr>
				<td>Tanggal Masuk</td>
				<td><input type="text" name="tanggal" value="<?php echo date('d-m-Y'); ?>" readonly required></td>
			</tr>
            <tr>
				<td>Spefikasi</td>
				<td><input type="text" name="spek" value="<?= $data['spefikasi'] ?>" required></td>
			</tr>
            <tr>
				<td>Lokasi Barang</td>
				<td><input type="text" name="lokasi" value="<?= $data['lokasi_barang'] ?>"  required></td>
			</tr>
            <tr>
				<td>Kategori</td>
				<td>
                <select name="kategori" required>
                	<option>Silahkan dipilih</option>
                	<option <?php if($data['kategori'] == "Peralatan Kebersihan"){echo "selected";} ?>>Peralatan Kebersihan</option>
                    <option <?php if($data['kategori'] == "Electronik"){echo "selected";} ?>>Electronik</option>
                    <option <?php if($data['kategori'] == "Peralatan ATK"){echo "selected";} ?>>Peralatan ATK</option>
                </select>
                </td>
			</tr>
            <tr>
				<td>Barang masuk</td>
				<td><input type="number" name="masuk" id="masuk"  oninput="cek()" required <?php if(!isset($url[3])){echo "value='0'";}else { echo "value='$url[3]'";}?>></td>
			</tr>
            <tr>
				<td>Total Barang</td>
                <input type="hidden" name="hid" id="hid" value="<?= $data['jml_barang'] ?>">
				<td><input type="text" name="total" id="total" value="<?= $data['jml_barang'] ?>" required></td>
			</tr>
             <tr>
				<td>Kondisi</td>
				<td>
                <select name="kon" required>
                	<option>Silahkan dipilih</option>
                	<option <?php if($data['kondisi'] == "rusak"){echo "selected";} ?>>rusak</option>
                    <option <?php if($data['kondisi'] == "Bagus"){echo "selected";} ?>>Bagus</option>
                </select>
                </td>
			</tr>
            <tr>
				<td>Jenis Barang</td>
				<td><input type="text" name="jenis" value="<?= $data['jenis_barang'] ?>" required></td>
			</tr>
            <tr>
				<td>Sumber Dana</td>
				<td><input type="text" name="sumber" value="<?= $data['sumber_dana'] ?>" required></td>
			</tr>
			<tr>
				<td>Kode Supplier</td>
				<td>
					<select name="kode_supplier" required>
						<option>Silahkan dipilih</option>
						<?php
						$query=mysqli_query($koneksi,"select * from supplier");
						while($data=mysqli_fetch_assoc($query)){
							if($data3['kode_supplier'] == $data['kode_supplier']){
							echo "<option selected>".$data['kode_supplier']."</option>";
						}else{
							echo "<option>".$data['kode_supplier']."</option>";
						}
						}
						 ?>
					</select>
				</td>
			<?php 
					if(isset($url[3])){
						echo "<input type='hidden' name='cek0' value='$url[3]' />";
						echo "<input type='hidden' name='cek1' value='$url[4]' />";
						echo "<input type='hidden' name='no' value='$_POST[no]' />";
						echo "<input type='hidden' name='tglpinjam' value='$_POST[tglpinjam]' />";
						echo "<input type='hidden' name='jmlp' value='$_POST[jmlp]' />";
						echo "<input type='hidden' name='peminjam' value='$_POST[peminjam]' />";
						echo "<input type='hidden' name='tglkembali' value='$_POST[tglkembali]' />";
						echo "<input type='hidden' name='kondisi' value='$_POST[kondisi]' />";
						echo "<input type='hidden' name='jmlk' value='$_POST[jmlk]' />";
					}
			 ?>
			</tr>
			<tr>
				<td>Ket</td>
				<td><input type="text" name="ket"   value="<?= $data2['keterangan'] ?>" required></td>
			</tr>
			<tr>
				<td><input type="submit" value="Edit"></td>
				<td><input type="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	</center>
    <script type="text/javascript">
	function cek(){
	var masuk,total,hasil,akhir;
	masuk = parseInt(document.getElementById("masuk").value);
	total = parseInt(document.getElementById("hid").value);
	hasil = document.getElementById("total");
	akhir = masuk + total;
	hasil.value = akhir;	
	}
</script>