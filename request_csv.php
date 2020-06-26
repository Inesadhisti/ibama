<?php
// Load file koneksi.php
include "configuration/config_connect.php";

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$csv = new PHPExcel();

// Settingan awal fil excel
$csv->getProperties()->setCreator('IDwares')
					   ->setLastModifiedBy('logistik App')
					   ->setTitle("Data Request Barang")
					   ->setSubject("Request Barang")
					   ->setDescription("Data Request Barang Hasil Export Csv")
					   ->setKeywords("Data Request Barang");

// Buat header tabel nya pada baris ke 1
$csv->setActiveSheetIndex(0)->setCellValue('A1', "NO"); // Set kolom A1 dengan tulisan "NO"
$csv->setActiveSheetIndex(0)->setCellValue('B1', "No Req"); // Set kolom B1 dengan tulisan "NIS"
$csv->setActiveSheetIndex(0)->setCellValue('C1', "tanggal"); // Set kolom C1 dengan tulisan "NAMA"

$csv->setActiveSheetIndex(0)->setCellValue('D1', "User"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('E1', "cabang"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('F1', "Unit"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('G1', "keterangan"); // Set kolom F1 dengan tulisan "ALAMAT"
$csv->setActiveSheetIndex(0)->setCellValue('H1', "Status"); // Set kolom F1 dengan tulisan "ALAMAT"

$csv->setActiveSheetIndex(0)->setCellValue('I1', "Approval"); // Set kolom F1 dengan tulisan "ALAMAT"

// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($conn, "SELECT * FROM req");

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nota']);

	 $akhir1 = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$data['tglreq']);
      
          
	$csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $akhir1);
	
		$csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['user']);
	$csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['cabang']);
	$csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['unit']);
	$csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['keterangan']);
	$csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['status']);
	
	$csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['approve']);
	
	
	
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set orientasi kertas jadi LANDSCAPE
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$csv->getActiveSheet(0)->setTitle("Laporan Data Barang");
$csv->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Request.csv"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = new PHPExcel_Writer_CSV($csv);
$write->save('php://output');
?>
