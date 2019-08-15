-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 03:38 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `noisbn` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga_jual` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_jual`) VALUES
(6, 'Panduan Lengkap Menuntut Ilmu', ' 979 3956 624', 'Muhammad bin Shalih Al-Utsaimin', 'Pustaka Ibnu Katsir', 2019, 110, 90000),
(7, 'Petuah-petuah Syaikh Bin Baz', '978-8-8936-1392', 'Abdul Aziz bin Abdullah bin Baz', 'Darus Sunnah', 2019, 67, 90000),
(8, 'Kitab Tauhid', '978-7-1018-5374', 'Dr. Shalih bin Fauzan Al-Fauzan', 'Ummul Qura', 2017, 50, 70000),
(11, 'Mulia Dengan Manhaj Salaf', '978 979 16611 33', ' Yazid Bin Abdul Qadir Jawas', 'Pustaka At-Taqwa', 2018, 80, 150000),
(13, 'Istiqomah Aqidah Ibadah Dan Tasawuf', '9789795928010', 'Ibnu Taimiyah', 'Pustaka Al-Kautsar', 2017, 40, 165000),
(16, 'Ikhlas', '978 602 6209 009', 'Abu Mushlih Ari Wahyudi', 'Pustaka Muslim', 2018, 10, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `id_distributor` int(50) NOT NULL,
  `nama_distributor` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_distributor`
--

INSERT INTO `tb_distributor` (`id_distributor`, `nama_distributor`, `alamat`, `email`) VALUES
(1, 'Pustaka Ibnu Katsir', 'Jl.Cipinang Cempedak IV No. 3 RT. 11, RW. 05, Polo', 'PustakaIbnuKatsir@gmail.com'),
(2, 'Darus Sunnah', 'Jl. Cakrawijaya XII No. 15 RT/RW 018/002 Cipinang ', 'penerbit@darus-sunnah.com'),
(3, 'Pustaka Muslim', 'Jl. Karangsari, Gg. Kemuning No. 272, Rejowinangun', 'cs@muslimjogja'),
(5, 'Pustaka Attaqwa', 'Jakarta', ' order@pustakaattaqwa.com'),
(6, 'Pustaka Al-Kautsar', 'Jl. Cipinang Muara Raya No.63 Jakarta Timur 13420', 'Hrd@kautsar.co.id'),
(8, 'Ummul Qura', 'Jl. Pd. Ranggon Blok Mitra No.17, RT.1/RW.6, Pond', 'ummulqura@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jual`
--

CREATE TABLE `tb_jual` (
  `id_jual` varchar(10) NOT NULL,
  `total` varchar(50) NOT NULL,
  `uang` varchar(50) NOT NULL,
  `kembali` varchar(50) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jual`
--

INSERT INTO `tb_jual` (`id_jual`, `total`, `uang`, `kembali`, `id_kasir`, `tanggal`) VALUES
('KD0001', '180000', '200000', '20000', 7, '2019-04-13'),
('KD0002', '270000', '300000', '30000', 7, '2019-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasir`
--

CREATE TABLE `tb_kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kasir`
--

INSERT INTO `tb_kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
(3, 'Roihan Mishbahul Anam', 'Jl. Sama Dia', '0897765456', 'aktif', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'Kasir', 'Jalan', '078909876789', 'aktif', 'kasir', '8a660ee11ebe5c2f08d47c687607e57e', 'kasir'),
(7, 'Roihan', 'Bandung', '0896755878', 'aktif', 'roi', '83832391027a1f2f4d46ef882ff3a47d', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` varchar(40) NOT NULL,
  `jumlah_harga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasok`
--

CREATE TABLE `tb_pasok` (
  `id_pasok` int(50) NOT NULL,
  `id_distributor` int(50) NOT NULL,
  `id_buku` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tanggal` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasok`
--

INSERT INTO `tb_pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(2, 1, 6, 10, '06-11-2018'),
(3, 2, 7, 10, '06-11-2018'),
(6, 1, 6, 50, '26-11-2018'),
(7, 1, 6, 10, '09-04-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` varchar(40) NOT NULL,
  `id_jual` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_buku`, `jumlah`, `jumlah_harga`, `id_jual`) VALUES
(40, 7, 2, '100000', 'KD0004'),
(41, 7, 2, '100000', 'KD0004'),
(42, 11, 2, '34000', 'KD0004'),
(43, 13, 2, '35000', 'KD0004'),
(44, 6, 2, '15600', 'KD0001'),
(45, 11, 3, '51000', 'KD0002'),
(46, 8, 2, '23000', 'KD0003'),
(47, 6, 2, '15600', 'KD0003'),
(48, 7, 6, '534000', 'KD0004'),
(49, 16, 5, '125000', 'KD0005'),
(50, 16, 5, '125000', 'KD0006'),
(51, 7, 5, '400000', 'KD0007'),
(52, 8, 5, '325000', 'KD0007'),
(53, 6, 5, '400000', 'KD0006'),
(54, 6, 10, '800000', 'KD0006'),
(55, 6, 1, '80000', 'KD0007'),
(56, 6, 4, '320000', 'KD0008'),
(57, 7, 5, '400000', 'KD0009'),
(58, 8, 5, '325000', 'KD0010'),
(59, 6, 5, '400000', 'KD0011'),
(60, 6, 1, '80000', 'KD0012'),
(61, 7, 1, '80000', 'KD0012'),
(62, 6, 1, '90000', 'KD0001'),
(63, 6, 1, '90000', 'KD0001'),
(64, 6, 3, '270000', 'KD0002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `tb_jual`
--
ALTER TABLE `tb_jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `tb_kasir`
--
ALTER TABLE `tb_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_distributor` (`id_distributor`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_jual` (`id_jual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  MODIFY `id_distributor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kasir`
--
ALTER TABLE `tb_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  MODIFY `id_pasok` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jual`
--
ALTER TABLE `tb_jual`
  ADD CONSTRAINT `tb_jual_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `tb_kasir` (`id_kasir`);

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `tb_kasir` (`id_kasir`),
  ADD CONSTRAINT `tb_keranjang_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`);

--
-- Constraints for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD CONSTRAINT `tb_pasok_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`),
  ADD CONSTRAINT `tb_pasok_ibfk_2` FOREIGN KEY (`id_distributor`) REFERENCES `tb_distributor` (`id_distributor`);

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
