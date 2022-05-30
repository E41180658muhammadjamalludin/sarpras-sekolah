	<center>
	<form action="page.php?url=peminjaman-proses" method="post" onsubmit="return cek()">
		<table border="3" class="crud">
			<tr>
				<td>No Pinjam</td>
				<td><input type="text" name="no" value="<?=notis('no_pinjam','pinjam_barang','P')?>"  readonly  required></td>
			</tr>
            <tr>
				<td>Tgl Pinjam</td>
				<td><input type="text" name="tglpinjam" value="<?= date('Y-m-d')?>"  required></td>
			</tr>
			<tr>
				<td>Kode Barang</td>
				<td>
                <input type="hidden" id="kode" name="kode">
					<select name="kd_brg" id="barang" onChange="ubah()" required>
                    <option value=" . . ">~Silahkan dipilih~</option>
						<?php
						$query=mysqli_query($koneksi,"select * from stok");
						while($data=mysqli_fetch_assoc($query)){
							echo "<option value='$data[kode_barang].$data[nama_barang].$data[total_barang]'>".$data['kode_barang']."</option>";
						}
						 ?>
					</select>
				</td>
			</tr>
            <tr>
				<td>Nama Barang</td>
				<td><input type="text" name="nama" id="nama" required></td>
			</tr>
			<tr>
				<td>Sisa Barang</td>
				<td><input type="text" name="sisa" id="sisa" required></td>
			</tr>
			<tr>
				<td>Jml Pinjam</td>
				<td><input type="text" name="jml" id="jml" required></td>
			</tr>
			<tr>
				<td>peminjam</td>
				<td><input type="text" name="peminjam" required></td>
			</tr>
			<tr>
				<td>Tgl kembali</td>
				<td><input type="date" name="tglkembali"  required></td>
			</tr>
			<tr>
				<td>Kondisi</td>
				<td>
					<select name="kondisi">
						<option>Silahkan dipilih</option>
						<option>Baik</option>
						<option>Kurang Baik</option>
					</select>
				</td>
			</tr>
            <tr>
				<td>Ket</td>
				<td><input type="text" name="ket" required></td>
			</tr>
			<tr>
				<td><input type="submit" value="Input" ></td>
				<td><input type="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	</center>
    <script>
    	function cek(){
    		var sisa,jml,ket,sisas;
    		sisa= document.getElementById("sisa").value;
    		jml= parseInt(document.getElementById("jml").value);
    		sisas=sisa-jml;
    		if(sisa == 0){
    			alert('barang habis silahkan pinjam barang yang lain')
    			return false;
    		}
    		if(jml>sisa){
    			alert('barang yang dipinjam melebihi stok barang yang tersedia,sehingga menjadi='+sisas)
    			return false;
    		}
    	}
	function ubah(){
    	var gab,kd,nama,sisa,hasil;
		gab = document.getElementById("barang").value;
		kd= document.getElementById("kode");
		nama = document.getElementById("nama");
		sisa= document.getElementById("sisa");
		hasil = gab.split(".");
		kd.value=hasil[0];
		nama.value=hasil[1];
		sisa.value=hasil[2];
	}
    </script>