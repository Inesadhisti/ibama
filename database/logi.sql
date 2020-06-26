-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 06:50 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logi`
--

-- --------------------------------------------------------

--
-- Table structure for table `backset`
--

CREATE TABLE `backset` (
  `url` varchar(100) NOT NULL,
  `sessiontime` varchar(4) DEFAULT NULL,
  `footer` varchar(50) DEFAULT NULL,
  `themesback` varchar(2) DEFAULT NULL,
  `responsive` varchar(2) DEFAULT NULL,
  `namabisnis1` tinytext NOT NULL,
  `batas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backset`
--

INSERT INTO `backset` (`url`, `sessiontime`, `footer`, `themesback`, `responsive`, `namabisnis1`, `batas`) VALUES
('http://localhost/Logistik', '100', 'Magelang', '6', '0', 'iBama', 22);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `terjual` int(11) DEFAULT NULL,
  `terbeli` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `no` int(11) NOT NULL,
  `avatar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode`, `nama`, `keterangan`, `kategori`, `terjual`, `terbeli`, `sisa`, `no`, `avatar`) VALUES
('0001', 'Form penyetoran', '1 kertas', 'Barang Cetakan', 27, 60, 33, 1, 'dist/upload/'),
('0002', 'Form penarikan', 'keterangan', 'Barang Cetakan', 0, 50, 50, 2, 'dist/upload/'),
('0003', 'Form Pembayaran Jasa (Hijau)', 'keterangan', 'Barang Cetakan', 0, 55, 55, 3, 'dist/upload/'),
('0004', 'Form Pembayaran Jasa (Biru)', 'keterangan', 'Barang Cetakan', 0, 57, 57, 4, 'dist/upload/'),
('0005', 'Form Pembukaan Rekening Perorangan', 'keterangan', 'kertas', 0, 100, 100, 5, 'dist/upload/'),
('0006', 'Form Pembukaan Rekening Giro', 'keterangan', 'kertas', 0, 0, 0, 6, 'dist/upload/'),
('0007', 'Form Pemindahbukuan', 'keterangan', 'kertas', 0, 12, 12, 7, 'dist/upload/'),
('0008', 'Form Penutupan Rekening', 'keterangan', 'kertas', 0, 0, 0, 8, 'dist/upload/'),
('0009', 'Form Pembayaran Pajak (MPN)', 'keterangan', 'kertas', 0, 22, 22, 9, 'dist/upload/'),
('0010', 'Surat Perintah Membayar', 'keterangan', 'kertas', 0, 0, 0, 10, 'dist/upload/'),
('0011', 'Bukti Setor', 'keterangan', 'kertas', 0, 0, 0, 11, 'dist/upload/'),
('0012', 'Form Pencetakan Giro Bulanan', 'keterangan', 'kertas', 0, 0, 0, 12, 'dist/upload/'),
('0013', 'Form BTN Siap', 'keterangan', 'kertas', 0, 0, 0, 13, 'dist/upload/'),
('0014', 'Spesimen Tanda Tangan', 'keterangan', 'kertas', 0, 0, 0, 14, 'dist/upload/'),
('0015', 'Form Countiunus 1 ply besar', 'keterangan', 'kertas', 0, 0, 0, 15, 'dist/upload/'),
('0016', 'Form Countiunus 2 ply kecil', 'keterangan', 'kertas', 0, 0, 0, 16, 'dist/upload/'),
('0017', 'Ban uang Rp. 1.000', 'keterangan', 'kertas', 0, 0, 0, 17, 'dist/upload/'),
('0018', 'Ban uang Rp. 2.000', 'keterangan', 'kertas', 0, 0, 0, 18, 'dist/upload/'),
('0019', 'Ban uang Rp. 5.000', 'keterangan', 'kertas', 0, 0, 0, 19, 'dist/upload/'),
('0020', 'Ban uang Rp. 10.000', 'keterangan', 'kertas', 0, 0, 0, 20, 'dist/upload/'),
('0021', 'Ban uang Rp. 20.000', 'keterangan', 'kertas', 0, 0, 0, 21, 'dist/upload/'),
('0022', 'Ban uang Rp. 50.000', 'keterangan', 'kertas', 0, 0, 0, 22, 'dist/upload/'),
('0023', 'Ban uang Rp. 100.000', 'keterangan', 'kertas', 0, 50, 50, 23, 'dist/upload/'),
('0024', 'Buku Tabungan Ku', 'keterangan', 'kertas', 0, 0, 0, 24, 'dist/upload/'),
('0025', 'Buku Tabungan Batara', 'keterangan', 'kertas', 0, 0, 0, 25, 'dist/upload/'),
('0026', 'Buku Tabungan Simple', 'keterangan', 'kertas', 0, 0, 0, 26, 'dist/upload/'),
('0027', 'Buku Tabungan Junior', 'keterangan', 'kertas', 0, 0, 0, 27, 'dist/upload/'),
('0028', 'Buku Tabungan Prima', 'keterangan', 'kertas', 0, 0, 0, 28, 'dist/upload/'),
('0029', 'Buku E-batara pos', 'keterangan', 'kertas', 0, 0, 0, 29, 'dist/upload/'),
('0030', 'Amplop uang kecil', 'keterangan', 'kertas', 0, 0, 0, 30, 'dist/upload/'),
('0031', 'Amplop uang sedang', 'keterangan', 'kertas', 0, 0, 0, 31, 'dist/upload/'),
('0032', 'Amplop uang besar', 'keterangan', 'kertas', 0, 0, 0, 32, 'dist/upload/'),
('0033', 'Amplop surat coklat kecil', 'keterangan', 'kertas', 0, 0, 0, 33, 'dist/upload/'),
('0034', 'Amplop surat coklat sedang', 'keterangan', 'kertas', 0, 0, 0, 34, 'dist/upload/'),
('0035', 'Amplop surat coklat besar', 'keterangan', 'kertas', 0, 0, 0, 35, 'dist/upload/'),
('0036', 'Amplop kaca kiri', 'keterangan', 'kertas', 0, 0, 0, 36, 'dist/upload/'),
('0037', 'Amplop kaca kanan', 'keterangan', 'kertas', 0, 0, 0, 37, 'dist/upload/'),
('0038', 'Amplop tanpa kaca', 'keterangan', 'kertas', 0, 0, 0, 38, 'dist/upload/'),
('0039', 'Form Pembukaan e-batara pos', 'keterangan', 'kertas', 0, 0, 0, 39, 'dist/upload/'),
('0040', 'Form Penyetoran e-batara pos', 'keterangan', 'kertas', 0, 0, 0, 40, 'dist/upload/'),
('0041', 'Kertas ATM', 'keterangan', '', 0, 0, 0, 41, 'dist/upload/'),
('0042', 'Kertas HVS A4', 'keterangan', 'kertas', 0, 0, 0, 42, 'dist/upload/'),
('0043', 'MAP', 'keterangan', 'kertas', 0, 0, 0, 43, 'dist/upload/'),
('0044', 'Bantex', 'keterangan', 'Barang Cetakan', 0, 0, 0, 44, 'dist/upload/');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kode`, `nama`, `alamat`, `nohp`, `no`) VALUES
('0001', 'KC Magelang', 'Jl. Tentara Pelajarr', '0293-3125983', 25),
('0002', 'KCP Kebumen', 'Jl. Pahlawan No.141 Kebumen', '0287-384244', 26),
('0003', 'KCP Temanggung', 'Jl. MT Haryono No.82, Suronatan, Temanggung II', '0293-4961446', 27),
('0004', 'KCP Muntilan', 'Jl. Dr.Sutomo No.12 Muntilan', '0293-587066', 28),
('0005', 'Kankas Mertoyudan', 'Jl.Mayjend Sarwo Edi W No.89', '0293-364595', 29);

-- --------------------------------------------------------

--
-- Table structure for table `chmenu`
--

CREATE TABLE `chmenu` (
  `userjabatan` varchar(20) NOT NULL,
  `menu1` varchar(1) DEFAULT '0',
  `menu2` varchar(1) DEFAULT '0',
  `menu3` varchar(1) DEFAULT '0',
  `menu4` varchar(1) DEFAULT '0',
  `menu5` varchar(1) DEFAULT '0',
  `menu6` varchar(1) DEFAULT '0',
  `menu7` varchar(1) DEFAULT '0',
  `menu8` varchar(1) DEFAULT '0',
  `menu9` varchar(1) DEFAULT '0',
  `menu10` varchar(1) DEFAULT '0',
  `menu11` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chmenu`
--

INSERT INTO `chmenu` (`userjabatan`, `menu1`, `menu2`, `menu3`, `menu4`, `menu5`, `menu6`, `menu7`, `menu8`, `menu9`, `menu10`, `menu11`) VALUES
('admin', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5'),
('user', '0', '1', '1', '1', '0', '5', '0', '0', '5', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `nama` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`nama`, `tagline`, `alamat`, `notelp`, `signature`, `avatar`, `no`) VALUES
('Inventory Batara Magelang', 'Sahabat Keluarga Indonesia', 'Jl. Tentara Pelajar No. 40 Magelang', '0293 3215983', 'Hallo', 'dist/upload/btn.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `nama` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`nama`, `avatar`, `tanggal`, `isi`, `id`) VALUES
('WENNIE MARINE JOAM', 'dist/upload/index.jpg', '2020-05-19', '<p>Hallo</p>', 1),
('WENNIE MARINE JOAM', 'dist/upload/index.jpg', '2020-05-19', '<p>Hallo</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode`, `nama`, `no`) VALUES
('0001', 'admin', 28),
('0002', 'user', 33);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode`, `nama`, `no`) VALUES
('0001', 'Barang Cetakan', 18),
('0002', 'ATK', 19);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `namauser` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `kodebarang` varchar(10) NOT NULL,
  `sisa` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `no` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`namauser`, `tgl`, `kodebarang`, `sisa`, `jumlah`, `kegiatan`, `keterangan`, `no`, `status`) VALUES
('admin', '2020-02-10', '0003', 1050, 3, 'menambah stok', 'keterangan tidak tersedia', 22, 'berhasil'),
('admin', '2020-02-10', '0002', 10, 10, 'menambah stok', 'keterangan tidak tersedia', 23, 'berhasil'),
('admin', '2020-02-11', '', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 24, 'berhasil'),
('admin', '2020-02-11', '', 110, 100, 'menambah stok', 'keterangan tidak tersedia', 25, 'berhasil'),
('admin', '2020-02-11', '', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 26, 'berhasil'),
('admin', '2020-02-11', '', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 27, 'berhasil'),
('admin', '2020-02-11', '', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 28, 'berhasil'),
('admin', '2020-02-11', '', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 29, 'berhasil'),
('admin', '2020-02-11', '', 110, 10, 'menambah stok', 'keterangan tidak tersedia', 30, 'berhasil'),
('admin', '2020-02-11', '', 200, 100, 'menambah stok', 'keterangan tidak tersedia', 31, 'berhasil'),
('admin', '2020-02-11', '0001', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 32, 'berhasil'),
('admin', '2020-02-11', '0002', 200, 100, 'menambah stok', 'keterangan tidak tersedia', 33, 'berhasil'),
('admin', '2020-02-11', '0001', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 34, 'berhasil'),
('admin', '2020-02-12', '0009', 110, 10, 'menambah stok', 'keterangan tidak tersedia', 35, 'berhasil'),
('wennie12659', '2020-04-21', '0001', 50, 50, 'menambah stok', 'keterangan tidak tersedia', 36, 'berhasil'),
('wennie12659', '2020-04-22', '0001', 53, 10, 'menambah stok', 'keterangan tidak tersedia', 37, 'berhasil'),
('wennie12659', '2020-04-23', '0002', 50, 50, 'menambah stok', 'keterangan tidak tersedia', 38, 'berhasil'),
('wennie12659', '2020-04-23', '0003', 55, 55, 'menambah stok', 'keterangan tidak tersedia', 39, 'berhasil'),
('wennie12659', '2020-04-23', '0004', 57, 57, 'menambah stok', 'keterangan tidak tersedia', 40, 'berhasil'),
('wennie12659', '2020-04-23', '0005', 100, 100, 'menambah stok', 'keterangan tidak tersedia', 41, 'berhasil'),
('wennie12659', '2020-04-23', '0007', 12, 12, 'menambah stok', 'keterangan tidak tersedia', 42, 'berhasil'),
('wennie12659', '2020-04-23', '0009', 22, 22, 'menambah stok', 'keterangan tidak tersedia', 43, 'berhasil'),
('wennie12659', '2020-05-22', '0023', 50, 50, 'menambah stok', 'keterangan tidak tersedia', 44, 'berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`avatar`, `id`) VALUES
('dist/pengumuman/Interface1.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

CREATE TABLE `req` (
  `nota` varchar(20) NOT NULL,
  `tglreq` date DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL,
  `cabang` varchar(20) DEFAULT NULL,
  `unit` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `no` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `approve` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req`
--

INSERT INTO `req` (`nota`, `tglreq`, `user`, `cabang`, `unit`, `total`, `keterangan`, `no`, `status`, `approve`) VALUES
('1030001', '2020-04-21', 'darusman9883', 'KC Magelang', 'BCLU', 0, '', 73, 'approve', 'WENNI MARINE JOAM'),
('1030002', '2020-04-21', 'ocky9902', 'KC Magelang', 'BCLU', 0, '', 74, 'reject', ''),
('1030003', '2020-04-21', 'ocky9902', 'KC Magelang', 'BCLU', 0, '', 75, 'reject', ''),
('1030004', '2020-04-22', 'ocky9902', 'KC Magelang', 'BCLU', 0, '', 76, 'reject', ''),
('1030005', '2020-04-22', 'ocky9902', 'KC Magelang', 'BCLU', 0, '', 77, 'approve', 'WENNI MARINE JOAM'),
('1030006', '2020-04-23', 'darusman9883', 'KC Magelang', 'BCLU', 0, '', 78, 'approve', 'WENNIE MARINE JOAM');

-- --------------------------------------------------------

--
-- Table structure for table `reqdata`
--

CREATE TABLE `reqdata` (
  `nota` varchar(20) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `disetujui` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reqdata`
--

INSERT INTO `reqdata` (`nota`, `kode`, `nama`, `jumlah`, `disetujui`, `stok`, `no`) VALUES
('1030001', '0001', 'Form penyetoran', 15, 2, 50, 137),
('1030002', '0001', 'Form penyetoran', 20, 0, 48, 138),
('1030003', '0001', 'Form penyetoran', 11, 5, 48, 139),
('1030004', '0001', 'Form penyetoran', 22, 0, 43, 140),
('1030005', '0001', 'Form penyetoran', 11, 10, 53, 141),
('1030006', '0001', 'Form penyetoran', 15, 10, 43, 142);

-- --------------------------------------------------------

--
-- Table structure for table `unitkerja`
--

CREATE TABLE `unitkerja` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitkerja`
--

INSERT INTO `unitkerja` (`kode`, `nama`, `no`) VALUES
('0001', 'Sekretaris', 11),
('0002', 'BCFU', 12),
('0003', 'BCLU', 13),
('0004', 'BCSU', 14),
('0005', 'TP&IT', 15),
('0006', 'CS', 16),
('0007', 'TELLER', 17),
('0008', 'COD', 18),
('0009', 'ACCOUNTING', 19),
('0010', 'LA & LD', 20),
('0011', 'BSSU', 24),
('0012', 'CLS', 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userna_me` varchar(20) NOT NULL,
  `pa_ssword` varchar(70) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `cabang` varchar(30) DEFAULT NULL,
  `kodeunit` varchar(10) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userna_me`, `pa_ssword`, `nama`, `alamat`, `nohp`, `cabang`, `kodeunit`, `jabatan`, `avatar`, `no`) VALUES
('adhari18361', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ADHARIYANSYAH', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BSSU', 'user', 'dist/upload/index.jpg', 91),
('anan15509', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ANANDA HERNASA PUTRA', 'Jalan Pemuda RT 02/RW01, Krndal Growong, Pucungrejo, Kec. Muntilan, Magelang, Jawa Tengah.', '-', 'KC Magelang', 'CLS', 'user', 'dist/upload/index.jpg', 104),
('anis12016', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ANIS AKMALIA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'ACCOUNTING', 'user', 'dist/upload/index.jpg', 100),
('anisa13006', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ANISA JATUS ANAFAUZIAH', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'LA & LD', 'user', 'dist/upload/index.jpg', 97),
('ayu14355', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'SHYFANI AYU YANIKA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'TP&IT', 'user', 'dist/upload/index.jpg', 93),
('bambang2643', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'BAMBANG SUPRIADI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'LA & LD', 'user', 'dist/upload/index.jpg', 95),
('barhokah17276', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'BARHOKAH', 'Jl. Pahlawan No. 141, Bumirejo, Kebumen, Keposan, Kebumen, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah.', '-', 'KCP Kebumen', 'CS', 'user', 'dist/upload/index.jpg', 113),
('bima9882', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'BIMA ADITYA PRISTOYO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '085729286660', 'KC Magelang', 'BCLU', 'user', 'dist/upload/index.jpg', 69),
('candra1553', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'CANDRA ADI SETIAWAN', 'Jl. Pahlawan No. 141, Bumirejo, Kebumen, Keposan, Kebumen, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah.', '-', 'KCP Kebumen', 'CLS', 'user', 'dist/upload/index.jpg', 112),
('dara15422', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'DARA KARINA ROOSDIANA', 'Jl. Pahlawan No. 141, Bumirejo, Kebumen, Keposan, Kebumen, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah.', '-', 'KCP Kebumen', 'CLS', 'user', 'dist/upload/index.jpg', 111),
('darusman9883', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'DARUSMAN', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCLU', 'user', 'dist/upload/index.jpg', 70),
('devina16560', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'DEVINA WIDYA SARASWATI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'TELLER', 'user', 'dist/upload/index.jpg', 87),
('dian15029', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'DIAN DHARMANINGTYAS', 'Ruko Metro Square Blok F4-F5, Jalan Mayjend Bambang Soegeng, Jarangan, Sumberrejo, Kec. Mertoyudan, Kota Magelang, Jawa Tengah.', '-', 'Kankas Mertoyudan', 'CS', 'user', 'dist/upload/index.jpg', 116),
('diena7730', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'DIENA ASTRI NIRMALA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'CS', 'user', 'dist/upload/index.jpg', 83),
('dofa10419', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'DOFA JANUAR PUTRI', 'Ruko Metro Square Blok F4-F5, Jalan Mayjend Bambang Soegeng, Jarangan, Sumberrejo, Kec. Mertoyudan, Kota Magelang, Jawa Tengah.', '-', 'Kankas Mertoyudan', 'TELLER', 'user', 'dist/upload/index.jpg', 117),
('eko10670', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'MUHAMMAD EKO WAHYU WIDODO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'CS', 'user', 'dist/upload/index.jpg', 84),
('elian15507', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ELIAN DINI RAHMAWATI', 'Jalan Pemuda RT 02/RW01, Krndal Growong, Pucungrejo, Kec. Muntilan, Magelang, Jawa Tengah.', '-', 'KCP Muntilan', 'CS', 'user', 'dist/upload/index.jpg', 105),
('eriska15508', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ERISKA FRISTIANTI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'CS', 'user', 'dist/upload/index.jpg', 86),
('evan12718', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'HENRYCUS EVAN RADIKTYA PUTRA', ' Jalan Pemuda RT 02/RW01, Krndal Growong, Pucungrejo, Kec. Muntilan, Magelang, Jawa Tengah', '-', 'KC Magelang', 'CLS', 'user', 'dist/upload/index.jpg', 103),
('febryna16745', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'FEBRYNA MARGARETHA CHRISTINA', 'Jl. Pahlawan No. 141, Bumirejo, Kebumen, Keposan, Kebumen, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah.', '-', 'KCP Kebumen', 'TELLER', 'user', 'dist/upload/index.jpg', 114),
('galih16646', '10470c3b4b1fed12c3baac014be15fac67c6e815', ' GALIH LAZUARDI ASSEL ', 'Jalan Pemuda RT 02/RW01, Krndal Growong, Pucungrejo, Kec. Muntilan, Magelang, Jawa Tengah.', '-', 'KCP Muntilan', 'TELLER', 'user', 'dist/upload/index.jpg', 106),
('hendra9174', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'HENDRA SEPRIYONO ', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCSU', 'user', 'dist/upload/index.jpg', 77),
('hesti10421', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'DWI HESTI ARIANI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCFU', 'user', 'dist/upload/index.jpg', 80),
('hudiyanto2599', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'HUDIYANTO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'ACCOUNTING', 'user', 'dist/upload/index.jpg', 98),
('indrawan8031', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'INDRAWAN SETIO AJI', 'Ruko Metro Square Blok F4-F5, Jalan Mayjend Bambang Soegeng, Jarangan, Sumberrejo, Kec. Mertoyudan, Kota Magelang, Jawa Tengah.', '-', 'Kankas Mertoyudan', 'CLS', 'user', 'dist/upload/index.jpg', 115),
('irma3989', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'IRMA HUSMAINI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'OPR', 'user', 'dist/upload/index.jpg', 82),
('jangkung2961', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'JANGKUNG PRAYITNO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'COLLECTION', 'user', 'dist/upload/index.jpg', 102),
('meita10870', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'MEITA DWI KUSUMANINGRUM', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCSU', 'user', 'dist/upload/index.jpg', 76),
('mellita9707', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'MELLITA YULIA NURINDA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'TELLER', 'user', 'dist/upload/index.jpg', 88),
('narendra12296', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'NARENDRA EDI PUTRANTO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah', '-', 'KC Magelang', 'CLS', 'user', 'dist/upload/index.jpg', 119),
('nevy14627', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'RR NEVY NUR AKBAR', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'CS', 'user', 'dist/upload/index.jpg', 85),
('nisa18483', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'NISA ANDRIA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCFU', 'user', 'dist/upload/index.jpg', 79),
('nungki11458', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'NUNGKI ARISTANIA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'ACCOUNTING', 'user', 'dist/upload/index.jpg', 99),
('nurcholisa16746', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'NURCHOLISA PUTRI SAPTA ', 'Jl. MT Haryono No.82, Suronatan, Temanggung II, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah', '-', 'KCP Temanggung', 'TELLER', 'user', 'dist/upload/index.jpg', 110),
('ocky9902', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'OCKY ROSA PERMANA PUTRA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCLU', 'user', 'dist/upload/index.jpg', 71),
('okta14120', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'OKTAVIANA  MUSTIKA DEWI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCSU', 'user', 'dist/upload/index.jpg', 75),
('rio18449', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ANTONIUS RIO BARUNO', 'Jl. MT Haryono No.82, Suronatan, Temanggung II, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah', '-', 'KCP Temanggung', 'CLS', 'user', 'dist/upload/index.jpg', 108),
('riyan12303', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'RIYAN KUSUMA SETYA PRABOWO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BSSU', 'user', 'dist/upload/index.jpg', 90),
('rizza9906', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'RIZZA ENGGAR KHRUSMAWAN', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'TP&IT', 'user', 'dist/upload/index.jpg', 92),
('saputro11538', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'SAPUTRO CAHYO KARTIKO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCLU', 'user', 'dist/upload/index.jpg', 72),
('satriya15506', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'SATRIYA WISNU WARDHANA', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'TP&IT', 'user', 'dist/upload/index.jpg', 94),
('sehono4386', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'SEHONO', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'COLLECTION', 'user', 'dist/upload/index.jpg', 101),
('septiana7143', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'SEPTIANA PRASTIWI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCFU', 'user', 'dist/upload/index.jpg', 78),
('siregar16322', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'PINTAR SIREGAR', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'LA & LD', 'user', 'dist/upload/index.jpg', 96),
('supranyata', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'SUPRANYATA B.U', 'Jl. MT Haryono No.82, Suronatan, Temanggung II, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah', '-', 'KCP Temanggung', 'CLS', 'user', 'dist/upload/index.jpg', 107),
('tindo15336', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'TINDO SOVI AULIYA', 'Jl. MT Haryono No.82, Suronatan, Temanggung II, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah', '-', 'KCP Temanggung', 'CS', 'user', 'dist/upload/index.jpg', 109),
('trido2567', '10470c3b4b1fed12c3baac014be15fac67c6e815', ' TRIDO JOHAN HIDAYAT ', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'BCSU', 'user', 'dist/upload/index.jpg', 74),
('wennie12659', '036d0ef7567a20b5a4ad24a354ea4a945ddab676', 'WENNIE MARINE JOAM', ' Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '085664662558', 'KC Magelang', 'Sekretaris', 'admin', 'dist/upload/index.jpg', 68),
('widya9255', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'WIDYA ARIANTI', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'TELLER', 'user', 'dist/upload/index.jpg', 89),
('yuswanto5011', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'YUSWANTO HERY P ', 'Jl. Tentara Pelajar, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah.', '-', 'KC Magelang', 'DSM', 'user', 'dist/upload/index.jpg', 81);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backset`
--
ALTER TABLE `backset`
  ADD PRIMARY KEY (`url`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no` (`no`),
  ADD KEY `jenis` (`kategori`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no3` (`no`);

--
-- Indexes for table `chmenu`
--
ALTER TABLE `chmenu`
  ADD PRIMARY KEY (`userjabatan`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD KEY `id` (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no4` (`no`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`nota`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `reqdata`
--
ALTER TABLE `reqdata`
  ADD PRIMARY KEY (`nota`,`kode`),
  ADD KEY `barang` (`nama`),
  ADD KEY `no5_2` (`no`);

--
-- Indexes for table `unitkerja`
--
ALTER TABLE `unitkerja`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no3` (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userna_me`),
  ADD KEY `no` (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `req`
--
ALTER TABLE `req`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `reqdata`
--
ALTER TABLE `reqdata`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
