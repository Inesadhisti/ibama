<?php 
 include "configuration/config_connect.php";
 include "configuration/config_etc.php";
include "configuration/config_include.php";
session_start();

if ($_POST['no'] && $_POST['disetujui']){
$kode = $_POST['kode'];
$no = $_POST['no'];
$jumlah= $_POST['disetujui'];
$stok = $_POST['stok'];
$nota = $_POST['nota'];

$terjual = $_POST['terjual'];
$sisa = $stok - $jumlah ;
$jual = $terjual + $jumlah;




$sql= " UPDATE reqdata set disetujui='$jumlah', stok='$stok' where no='$no' ";

$sqlx = " UPDATE barang set terjual='$jual', sisa='$sisa' where kode='$kode' ";



if (  (mysqli_query($conn, $sqlx)) && (mysqli_query($conn, $sql))  ){
echo "<script type='text/javascript'>window.location = 'proses_request?nota=$nota&hapusberhasil=1';</script>";
} else {
	echo "<script type='text/javascript'>window.location = 'proses_request?nota=$nota&hapusberhasil=2';</script>";
}


}

 ?>