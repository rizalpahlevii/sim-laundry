-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 08:18 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `kode_jasa` varchar(10) NOT NULL,
  `nama_jasa` varchar(18) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`kode_jasa`, `nama_jasa`, `harga`) VALUES
('JS001', 'Cuci', 30000),
('JS002', 'Setrika', 15000),
('JS003', 'Full Laundry', 23000),
('JS004', 'Extra Plus Plus', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`, `status_pelanggan`) VALUES
('Non Pelanggan', 'Tidak Pelanggan', 'ytuyt', '65765765', 'ghfgh'),
('P001', 'HGHG', 'GFHGF', 'GFHG', 'pelanggan aktif'),
('PLG0001', 'Rizal', 'Mojo', '076736235', 'aktif'),
('PLG0002', 'Rizal', 'Mojo', '0900909', 'aktif'),
('PLG0003', 'Rizal', 'Mojo', '789876876', 'aktif'),
('PLG0004', 'Asrof', 'Sirahan', '098989898', 'aktif'),
('PLG0005', 'Bagas', 'Metawar', '0987686', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `kode_PTG` varchar(10) NOT NULL,
  `nama_PTG` varchar(30) NOT NULL,
  `password_PTG` varchar(30) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kode_PTG`, `nama_PTG`, `password_PTG`, `status`) VALUES
('admin', 'admin', 'admin', 'admin'),
('kasir', 'kasir', 'kasir123', 'kasir'),
('manager', 'manager', 'manager', 'manager'),
('PTG001', 'Muhammad Rizal Pahlevi', 'pahlevi', 'manager'),
('PTG002', 'Pahlevi', 'kasir', 'kasir'),
('PTG003', 'Rizal', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `nomer_order` varchar(10) NOT NULL,
  `tanggal_order` date NOT NULL,
  `TGL_rencana_selesai` date NOT NULL,
  `berat_cucian` varchar(8) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_cucian` varchar(20) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `kode_PTG` varchar(10) NOT NULL,
  `kode_jasa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`nomer_order`, `tanggal_order`, `TGL_rencana_selesai`, `berat_cucian`, `total_harga`, `status_cucian`, `kode_pelanggan`, `kode_PTG`, `kode_jasa`) VALUES
('LDR0001', '2018-12-07', '2018-12-12', '6', 90000, 'sudah diambil', 'PLG0001', 'PTG002', 'JS002'),
('LDR0002', '2018-12-08', '2018-12-15', '7', 161000, 'sudah diambil', 'PLG0005', 'kasir', 'JS003'),
('LDR0003', '2018-12-08', '2018-12-15', '12', 276000, 'sudah diambil', 'Non Pelanggan', 'kasir', 'JS003'),
('LDR0004', '2018-12-08', '2018-12-12', '4', 120000, 'sudah diambil', 'PLG0004', 'kasir', 'JS001'),
('LDR0005', '2018-12-08', '2018-12-20', '9', 270000, 'sudah diambil', 'PLG0003', 'kasir', 'JS001'),
('LDR0006', '2018-12-08', '2019-01-05', '1211', 27853000, 'sudah diambil', 'PLG0001', 'kasir', 'JS003'),
('LDR0007', '2018-12-08', '2018-12-29', '12', 360000, 'sudah diambil', 'PLG0001', 'admin', 'JS001'),
('LDR0008', '2018-12-11', '2018-12-15', '3', 150000, 'sudah diambil', 'plg0004', 'admin', 'JS004'),
('LDR0009', '2018-12-12', '2018-12-15', '12', 180000, 'sudah diambil', 'PLG0001', 'kasir', 'JS002'),
('LDR0010', '2018-12-12', '2018-12-14', '12', 180000, 'sudah diambil', 'PLG0001', 'kasir', 'JS002'),
('LDR0011', '2018-12-16', '2018-12-20', '90', 1350000, 'belum diambil', 'PLG0001', 'admin', 'JS002'),
('LDR0012', '2018-12-16', '2018-12-27', '3', 45000, 'belum diambil', 'Non Pelanggan', 'admin', 'JS002'),
('LDR0013', '2018-12-16', '2018-12-27', '3', 69000, 'belum diambil', 'PLG0004', 'admin', 'JS003'),
('LDR0014', '2018-12-17', '2018-12-28', '3', 150000, 'sudah diambil', 'Non Pelanggan', 'kasir', 'JS004'),
('LDR0015', '2018-12-18', '2018-12-22', '3', 45000, 'sudah diambil', 'PLG0002', 'kasir', 'JS002'),
('LDR0016', '2018-12-20', '2018-12-22', '20', 1000000, 'sudah diambil', 'PLG0004', 'admin', 'JS004'),
('LDR0017', '2019-01-02', '2019-01-19', '2', 30000, 'belum diambil', 'Non Pelanggan', 'admin', 'JS002');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(10) NOT NULL,
  `TGL_transaksi` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `kode_PTG` varchar(10) NOT NULL,
  `nomer_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `TGL_transaksi`, `bayar`, `kembali`, `kode_PTG`, `nomer_order`) VALUES
('TR00001', '2018-12-07', 100000, 10000, 'PTG002', 'LDR0001'),
('TR00002', '2018-12-08', 28000000, 147000, 'kasir', 'LDR0006'),
('TR00003', '2018-12-08', 280000, 10000, 'admin', 'LDR0005'),
('TR00004', '2018-12-08', 400000, 40000, 'admin', 'LDR0007'),
('TR00005', '2018-12-09', 300000, 24000, 'admin', 'ldr0003'),
('TR00006', '2018-12-11', 400000, 250000, 'admin', 'LDR0008'),
('TR00007', '2018-12-12', 200000, 39000, 'admin', 'LDR0002'),
('TR00008', '2018-12-12', 200000, 20000, 'kasir', 'LDR0010'),
('TR00009', '2018-12-12', 150000, 30000, 'kasir', 'LDR0004'),
('TR00010', '2018-12-12', 200000, 20000, 'kasir', 'LDR0009'),
('TR00011', '2018-12-17', 160000, 10000, 'kasir', 'LDR0014'),
('TR00012', '2018-12-18', 50000, 5000, 'kasir', 'LDR0015'),
('TR00013', '2018-12-20', 1100000, 100000, 'admin', 'LDR0016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`kode_jasa`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode_PTG`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`nomer_order`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
