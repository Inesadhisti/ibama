<?php
// Load file koneksi.php
include "configuration/config_connect.php";

$cabang=$_GET['cabang'];

$awal = $_GET['awal'];
$akhir= $_GET['akhir'];
// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$csv = new PHPExcel();

// Settingan awal fil excel
$csv->getProperties()->setCreator('IDwares')
					   ->setLastModifiedBy('logistik App')
					   ->setTitle("Data rekap")
					   ->setSubject("Rekap")
					   ->setDescription("Data rekapitulasi Hasil Export Csv")
					   ->setKeywords("Data Rekap");

// Buat header tabel nya pada baris ke 1
$csv->setActiveSheetIndex(0)->setCellValue('A1', "NO"); // Set kolom A1 dengan tulisan "NO"
$csv->setActiveSheetIndex(0)->setCellValue('B1', "Cabang"); // Set kolom B1 dengan tulisan "NIS"
$csv->setActiveSheetIndex(0)->setCellValue('C1', "UNIT"); // Set kolom C1 dengan tulisan "NAMA"

$csv->setActiveSheetIndex(0)->setCellValue('D1', "Tanggal"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('E1', "Nama"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('F1', "Jumlah Diminta"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('G1', "Dikirim"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('H1', "Stok Awal"); // Set kolom F1 dengan tulisan "ALAMAT"

$csv->setActiveSheetIndex(0)->setCellValue('I1', "Stok Akhir"); // Set kolom F1 dengan tulisan "ALAMAT"

// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($conn, "select * from req inner join reqdata on req.nota=reqdata.nota where req.cabang like '%$cabang%' and (req.tglreq BETWEEN '$awal' and '$akhir') group by reqdata.kode");

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['cabang']);
	$csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['unit']);

            
          $akhir1 = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$akhir);
      
          
	$csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $akhir1);
	$csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['nama']);

	
 


$kode = $data['kode'];
            $sqlx2="SELECT SUM(reqdata.jumlah) AS data10 FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    


	$csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row['data10']);


	$kode = $data['kode'];
            $sqlx2="SELECT SUM(reqdata.disetujui) AS data1 FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    $keluar = $row['data1'];
 	$csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $row['data1']);


$kode = $data['kode'];
            $sqlx2="SELECT MIN(reqdata.stok) AS data2 FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    $base = $row['data2'];
    $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row['data2']);


	$selisih = $base - $keluar;
  	$csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $selisih);
	
	
	
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set orientasi kertas jadi LANDSCAPE
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$csv->getActiveSheet(0)->setTitle("Laporan Data Rekap");
$csv->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Rekap.csv"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = new PHPExcel_Writer_CSV($csv);
$write->save('php://output');
?>
