<?php 
session_start();
$koneksi=mysqli_connect("localhost","root","","sarpras_sekolah");
if(!$koneksi){
	echo "Kesalahan ".mysqli_error();
}
 ?>
