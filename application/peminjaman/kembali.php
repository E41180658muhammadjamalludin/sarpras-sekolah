	<?php 
			$query=mysqli_query($koneksi,"select * from pinjam_barang where no_pinjam='$url[2]'");
			$data=mysqli_fetch_assoc($query);
	 ?>
	 <style>
	 	#ganti{
	 		display: none;
	 	}
	 </style>
	<center>
	<form id="form" action="page.php?url=peminjaman-proseskembali" method="post" onsubmit="return cekk()">
		<table border="3" class="crud">
			<tr>
				<td>No Pinjam</td>
				<td><input type="text" name="no" value="<?= $data['no_pinjam']?>" id="no"></td>
			</tr>
            <tr>
				<td>Tgl Pinjam</td>
				<td><input type="text" name="tglpinjam" required value="<?= $data['tgl_pinjam']?>" id="tglpinjam"></td>
			</tr>
			<tr>
				<td>Kode Barang</td>
				<td><input type="text" name="kode" id="kode" required value="<?= $data['kode_barang']?>"></td>
			</tr>
            <tr>
				<td>Nama Barang</td>
				<td><input type="text" name="nama" id="nama" required value="<?= $data['nama_barang']?>"></td>
			</tr>
			<tr>
				<td>Jml Pinjam</td>
				<td><input type="text" name="jmlps"  required value="<?= $data['jml_pinjam']?>" id="jmlps"></td>
				<input type="hidden" name="jmlp" id="jmlp"  required value="<?= $data['jml_pinjam1']?>">
			</tr>
			<tr>
				<td>Jml Pengembalian</td>
				<td><input type="text" name="jmlk" id="jmlpengem" required></td>
			</tr>
			<tr>
				<td>peminjam</td>
				<td><input type="text" name="peminjam" required value="<?= $data['peminjam']?>" id="peminjam"></td>
			</tr>
			<tr>
				<td>Tgl kembali</td>
				<td><input type="text" name="tglkembali" value="<?php echo date('Y-m-d')  ?>"  required id="tglkembali"></td>
			</tr>
			<tr>
				<td>Kondisi</td>
				<td>
					<select name="kondisi" id="kondisi" onchange="cek()">
						<option value=" ">Silahkan dipilih</option>
						<option value="Baik">Baik</option>
						<option value="Rusak">Rusak</option>
					</select>
					<input onclick="loncat()" id="ganti" value="ganti" type="submit">
				</td>
			</tr>
			<tr>
				<td><input type="reset" value="Kembalikan" id="submit"></td>
				<td></td>
			</tr>
		</table>
	</form>
	</center>
    <script>
    	function cek(){
    		var kondisi,ket,ganti,submit;
    		ganti = document.getElementById("ganti");
    		submit = document.getElementById("submit");
    		kondisi= document.getElementById("kondisi").value;
    		if(kondisi == "Baik"){
    			ganti.style.display ="none";
    			submit.removeAttribute('disabled','disabled');
    			submit.type="submit";
    		}else{
    			ganti.style.display ="block";
    			submit.setAttribute('disabled','disabled');
    			submit.type="reset";
    		}

    	}
    	function loncat(){
    		var kode,no,form;
    		form = document.getElementById("form");
    		no=document.getElementById("no").value;
    		kode = document.getElementById("kode").value;
    		jmlps = document.getElementById("jmlpengem").value;
    		form.action = 'page.php?url=barang-edit-'+kode+'-'+jmlps+'-'+no;
    	}
    </script>