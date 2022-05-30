<div id="sapa">
    <h1>Selamat Datang !!!</h1>
<?php if($_SESSION['level'] != "user") { ?>
       <p>
       	Hai ..:) <b><?= $_SESSION['login']?></b> selamat datang di halaman <?= $_SESSION['level']?>. Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda
       </p>
<?php } else { ?>
       <p>
       	Hai ..:) <b>user</b> selamat datang di halaman user. Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda
       </p>
<?php } ?>
</div>
