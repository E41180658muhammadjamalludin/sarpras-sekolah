-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 03:18 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarpras_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `spefikasi` varchar(35) NOT NULL,
  `lokasi_barang` varchar(40) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `sumber_dana` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `spefikasi`, `lokasi_barang`, `kategori`, `jml_barang`, `kondisi`, `jenis_barang`, `sumber_dana`) VALUES
('B001', 'Sapu Teratai Bangsa', 'Sapu bawah hitam dan pegangan putih', 'Meja 1', 'Peralatan Kebersihan', 5, 'Bagus', 'Sapu', 'Dana Bos'),
('B002', 'Penghapus Itan Pinar', 'Karet bawah hitam dan ada bantalan', 'Lemari 1', 'Peralatan ATK', 6, 'Bagus', 'Penghapus', 'Sekolah'),
('B003', 'Laptop Lenovo E-30', 'Ram 1 GB ,Prosecessor Intel Celeron', 'Lemari 2', 'Electronik', 5, 'Bagus', 'Laptop', 'Dana Bos');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_barang`
--

CREATE TABLE `keluar_barang` (
  `id_barang_keluar` int(8) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_keluar` varchar(12) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `jml_barang_keluar` int(8) NOT NULL,
  `keperluan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar_barang`
--

INSERT INTO `keluar_barang` (`id_barang_keluar`, `kode_barang`, `nama_barang`, `tgl_keluar`, `penerima`, `jml_barang_keluar`, `keperluan`) VALUES
(12, 'B001', 'Sapu Teratai Bangsa', '2018-05-06 1', 'Jamal', 1, 'Untuk keperluan belajar UKK'),
(13, 'B001', 'Sapu Teratai Bangsa', '2018-05-06 1', 'Jamal', 2, 'Untuk kegiatan jumat bersih');

-- --------------------------------------------------------

--
-- Table structure for table `kembali_barang`
--

CREATE TABLE `kembali_barang` (
  `no_pengembalian` int(8) NOT NULL,
  `no_pinjam` varchar(8) NOT NULL,
  `tgl_pinjam` varchar(12) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `jml_pinjam` int(7) NOT NULL,
  `peminjam` varchar(35) NOT NULL,
  `tgl_kembali` varchar(12) NOT NULL,
  `kondisi` varchar(18) NOT NULL,
  `ket` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kembali_barang`
--

INSERT INTO `kembali_barang` (`no_pengembalian`, `no_pinjam`, `tgl_pinjam`, `kode_barang`, `nama_barang`, `jml_pinjam`, `peminjam`, `tgl_kembali`, `kondisi`, `ket`) VALUES
(4, 'P001', '2018-05-06', 'B001', 'Sapu Teratai Bangsa', 1, 'Jamal', '2018-05-06', 'Baik', 'Sudah Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `masuk_barang`
--

CREATE TABLE `masuk_barang` (
  `id_msk_barang` int(8) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_masuk` varchar(12) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `kode_supplier` varchar(8) NOT NULL,
  `keterangan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk_barang`
--

INSERT INTO `masuk_barang` (`id_msk_barang`, `kode_barang`, `nama_barang`, `tgl_masuk`, `jml_masuk`, `kode_supplier`, `keterangan`) VALUES
(19, 'B001', 'Sapu Teratai Bangsa', '2018-05-06', 5, 'S001', 'Barang Baru'),
(20, 'B002', 'Penghapus Itan Pinar', '2018-05-06', 6, 'S002', 'Barang Baru'),
(21, 'B003', 'Laptop Lenovo E-30', '2018-05-06', 5, 'S003', 'Barang Baru');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `no_pinjam` varchar(8) NOT NULL,
  `tgl_pinjam` varchar(12) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_pinjam` int(11) NOT NULL,
  `jml_pinjam1` int(11) NOT NULL,
  `peminjam` varchar(35) NOT NULL,
  `tgl_kembali` varchar(12) NOT NULL,
  `kondisi` varchar(18) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`no_pinjam`, `tgl_pinjam`, `kode_barang`, `nama_barang`, `jml_pinjam`, `jml_pinjam1`, `peminjam`, `tgl_kembali`, `kondisi`, `keterangan`) VALUES
('P001', '2018-05-06', 'B001', 'Sapu Teratai Bangsa', 2, 2, 'Jamal', '2018-05-08', 'Baik', 'Untuk kegiatan jumat bersih');

--
-- Triggers `pinjam_barang`
--
DELIMITER $$
CREATE TRIGGER `setelahinsert` AFTER INSERT ON `pinjam_barang` FOR EACH ROW INSERT INTO keluar_barang (kode_barang,nama_barang,tgl_keluar,penerima,jml_barang_keluar,keperluan) VALUES(new.kode_barang,new.nama_barang,now(),new.peminjam,new.jml_pinjam,new.keterangan)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_barang_masuk` int(7) NOT NULL,
  `jml_barang_keluar` int(7) NOT NULL,
  `total_barang` int(8) NOT NULL,
  `keterangan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kode_barang`, `nama_barang`, `jml_barang_masuk`, `jml_barang_keluar`, `total_barang`, `keterangan`) VALUES
('B001', 'Sapu Teratai Bangsa', 5, 2, 3, 'Untuk kegiatan jumat bersih'),
('B002', 'Penghapus Itan Pinar', 6, 0, 6, 'Untuk buat belajar'),
('B003', 'Laptop Lenovo E-30', 5, 0, 5, 'Untuk keperluan belajar UKK');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(35) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `telp_supplier` varchar(25) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`) VALUES
('S001', 'JamalLudin', 'Sumbersuko', '082565776876', 'Probolinggo'),
('S002', 'Merdad', 'Sumber Agung', '092323232323', 'Surabaya'),
('S003', 'Antoni', 'SumberKerang', '034343434343', 'Surakarta'),
('S004', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
('2', 'ludin', 'ludin', '123', 1),
('3', 'anton', 'anton', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `kembali_barang`
--
ALTER TABLE `kembali_barang`
  ADD PRIMARY KEY (`no_pengembalian`),
  ADD KEY `no_pinjam` (`no_pinjam`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD PRIMARY KEY (`id_msk_barang`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`no_pinjam`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  MODIFY `id_barang_keluar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kembali_barang`
--
ALTER TABLE `kembali_barang`
  MODIFY `no_pengembalian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
  MODIFY `id_msk_barang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
