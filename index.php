<?php 
require_once "database/koneksi.php";
if(isset($_POST['submit'])){
$query=mysqli_query($koneksi,"select * from user where username='$_POST[username]'");
$cek=mysqli_num_rows($query);
if($cek == 1){
	$_SESSION['login'] = $_POST['username'];
	$query1=mysqli_query($koneksi,"select * from user where username='$_POST[username]' and password='$_POST[password]'");
	if (mysqli_num_rows($query1)) {
	$data=mysqli_fetch_assoc($query1);
	switch ($data['level']) {
		case '1':
		$_SESSION['msg']="Berhasil Login Sebagai Sarpras";
		$_SESSION['level'] = "sarpras";
			break;
		case '2':
		$_SESSION['msg']="Berhasil Login Sebagai Admin";
		$_SESSION['level'] = "admin";
			break;	
	}
	echo "<script language='javascript'>document.location.href='page.php?url=home';</script>";
	} else {
		echo "<script>alert('password atau username anda salah ');</script>";
	}
}else{
	$_SESSION['login'] = "user";
	$_SESSION['msg']="Berhasil Login Sebagai User";
	$_SESSION['level'] = "user";
	echo "<script language='javascript'>document.location.href='page.php?url=home';</script>";
}
$_SESSION['class']="succes";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<style type="text/css">
	*{ margin:0;padding: 0;}	
	#bungkus{margin:50px auto 0 auto; width: 28%; padding: 50px 30px;background: white;}
	table tr{width: 100%;margin: 10px auto;display: inline-block;}
	table tr td:first-child{border:1px solid grey;background-color: grey;height: 50px;}
	table tr td:first-child img{display: block;padding: 0 10px;margin: 0 auto;}
	table tr td:last-child input[type="text"],table tr td:last-child input[type="password"]{
    width: 320px;height: 50px;padding-left: 5px;border:1px solid black;}
	table tr:last-child td{border:none;height: 50px;background: white;}
    input[type='submit']{ background-color:rgba(27,81,219,0.8);color: white;display: block;
    font-size: 23px;margin: 5px auto;padding: 10px 156px;width: 100%;font-weight: bold;border-color: white;}
    input[type='submit']:hover{background-color: rgba(27,81,219,0.9);color: black;cursor: pointer;}
</style>
</head>
<body style="background:url('asset/image/fresh_snow.png');">
	<div id="bungkus">
		<center>
	<form action="" method="post">
		<table class="crud" align="center">
			<tr>
				<td><img src="asset/image/user.png" width="30px"></td>
				<td><input type="text" name="username" placeholder="Masukkan username" ></td>
			</tr>
			<br>
            <tr>
				<td><img src="asset/image/password.png" width="30px"></td>
				<td><input type="password" name="password" placeholder="Masukkan Password" ></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Login" name="submit"></td>
			</tr>
		</table>
	</form>
	</center>
</div>
</body>
</html>