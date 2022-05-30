<?php
function notis($field,$tabel,$i){
global $koneksi;
$query = "SELECT max($field) as maxKode FROM $tabel ORDER BY $field";
$hasil = mysqli_query($koneksi,$query);
$data  = mysqli_fetch_assoc($hasil);
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang, 1, 3);
$noUrut++;
$char = $i;
$inbrg = $char . sprintf("%03s", $noUrut);
return $inbrg;
}
?>