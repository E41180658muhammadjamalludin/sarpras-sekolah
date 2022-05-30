<?php
require_once "database/koneksi.php";
if(isset($_SESSION['login'])){
require_once "fungsi.php";
$url=explode("-", $_GET['url']);
$content = ($url[0] == "home" ) ? "application/home.php" : "application/".$url[0]."/".$url[1].".php" ; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sarpras Sekolah</title>
    <link rel="stylesheet" href="asset/css/main.css">
    <script type="text/javascript" src="asset/javascript/jquery.js"></script>
  </head>
  <body>
    <!--  Bagian header -->
    <div id="header" class="clear-fix">
        <div id="logo">
          <img src="asset/image/LOGO.png" alt="logo web">
        </div>
    </div>
    <!--    End Header    -->
    <div class="content-kiri clear-fix"
    >
		<div id="menu">
            <ul>
              <li><img src="asset/image/home.png" width="20"><a href="page.php?url=home"> Home </a></li>
              <?php if($_SESSION['level'] == "user" || $_SESSION['level'] == "admin" || $_SESSION['level'] == "sarpras") {   
               if($_SESSION['level'] == "admin" || $_SESSION['level'] == "sarpras") {  
                ?>
              <li><img src="asset/image/masuk.png" width="20"><a href="page.php?url=inbarang-index"> In Barang </a></li>
              <?php } ?>
              <li><img src="asset/image/barang.png" width="20"><a href="page.php?url=barang-index"> Barang </a></li>
              <?php if($_SESSION['level'] == "admin" || $_SESSION['level'] == "sarpras") {   ?>
              <li><img src="asset/image/keluar.png" width="20"><a href="page.php?url=outbarang-index"> Out Barang </a></li>
              <li><img src="asset/image/stok.png" width="20"><a href="page.php?url=stok-index"> Stok </a></li>
              <?php } 
                if($_SESSION['level'] == "admin") {  
              ?>
              <li><img src="asset/image/supplier.png" width="20"><a href="page.php?url=supplier-index"> Supplier </a></li>
              <li><img src="asset/image/pinjam.png" width="20"><a href="page.php?url=peminjaman-index"> Peminjaman </a></li>
              <li><img src="asset/image/kembali.png" width="20"><a href="page.php?url=pengembalian-index"> Pengembalian </a></li>
              <?php 
            }
            } ?>
              <li><img src="asset/image/logout.png" width="20"><a href="logout.php"  onclick="return confirm('Apakah anda yakin ingin keluar dari program ini?')"> Logout</a></li>
            </ul>
        </div>
	</div>
<!--   End content kiri      -->
<!--   Bagian content kanan     -->
    <div class="content-kanan clear-fix">    
      <div id="msg">
  <?php 
if(isset($_SESSION['msg']) && isset($_SESSION['class'])){
  echo "<p class=".$_SESSION['class'].">".$_SESSION['msg']."</p>";
  unset($_SESSION['msg']);
  unset($_SESSION['class']);
  }
   ?>
</div>
    	<?php
		    if (file_exists($content)) {
			require_once $content;
			} else {
			echo "Halaman tidak ada";
			}
?>
    </div>
<!--   End content kanan      -->
<script>
  $(document).ready(function(){
  setTimeout(myFunction, 3000);
  function myFunction(){
    $('#msg').slideUp();
  }
  })
</script>
</body>
</html>
<?php } else{
  echo "<center>Anda harus login terlebih dahulu<a href='index.php'>Login</a></center>";
} ?>