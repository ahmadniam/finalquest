-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 03:46 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sikosui`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id_biaya` int(11) NOT NULL,
  `jenis_biaya` varchar(50) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `jenis_biaya`, `jumlah`) VALUES
(16, 'Sewa kamar 1 tahun', '4.500.000'),
(17, 'Membawa setrika', '10.000'),
(18, 'Membawa kipas angin', '10.000'),
(19, 'Membawa dispenser', '30.000');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(5) NOT NULL,
  `no_kamar` varchar(10) NOT NULL,
  `id_rumah` int(10) DEFAULT NULL,
  `status_kamar` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `id_rumah`, `status_kamar`) VALUES
(11, '11', 1, 'Terisi'),
(12, '12', 1, 'Terisi'),
(13, '13', 1, 'Terisi'),
(14, '14', 1, 'Kosong'),
(15, '15', 1, 'Kosong'),
(16, '21', 2, 'Terisi'),
(17, '22', 2, 'Kosong'),
(18, '25', 2, 'Terisi'),
(19, '26', 2, 'Terisi'),
(20, '23', 2, 'Terisi'),
(21, '24', 2, 'Terisi'),
(22, '212', 2, 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `user_id` int(5) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `untuk` varchar(30) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `kamar` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `user_id`, `nama`, `untuk`, `jumlah`, `metode_pembayaran`, `tanggal_pembayaran`, `status`, `kamar`) VALUES
(1, NULL, 'Danu', 'Listrik', 30000, 'cash', '2018-08-16', 'Lunas', '21'),
(3, 5, 'hanifan', 'Uang Kos Satu Tahun', 3500000, 'transfer', '2018-08-22', 'Lunas', '12'),
(4, 11, 'hanifan nurhuda', 'Uang Muka', 350000, 'transfer', '2018-09-05', 'Lunas', '26'),
(5, 12, 'daniel', 'Uang Muka', 500000, 'transfer', '2018-08-31', 'Lunas', '12');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_rumah` int(10) NOT NULL,
  `id_kamar` int(10) NOT NULL,
  `no_telp_pemesan` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL,
  `masa_sewa` varchar(30) NOT NULL,
  `status_pemesanan` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `tanggal_pesan`, `id_rumah`, `id_kamar`, `no_telp_pemesan`, `id_user`, `masa_sewa`, `status_pemesanan`) VALUES
(3, 'eri', '2018-08-05 02:39:34', 0, 3, '235425', 0, '08/23/2018 - 12/05/2018', 'Reserved'),
(5, 'denito', '2018-08-05 03:22:46', 2, 3, '45678', 0, '08/22/2018 - 09/29/2018', 'Reserved'),
(6, 'hanifan', '2018-08-08 04:46:30', 2, 9, '0896566', 8, '08/16/2018 - 09/16/2018', 'Unreserved'),
(7, 'hanifan nurhuda', '2018-08-20 06:28:31', 2, 19, '08997251512', 10, '08/20/2018 - 08/20/2018', 'Unreserved'),
(8, 'hanifan', '2018-08-20 07:29:57', 2, 20, '122344', 5, '08/20/2018 - 08/20/2018', 'Unreserved'),
(9, 'daniel', '2018-08-26 14:37:44', 1, 12, '0876551', 12, '09/01/2018 - 08/31/2019', 'Unreserved');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(15) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `jumlah`, `tanggal_pengeluaran`) VALUES
(1, 'bayar listrik', '100000', '2018-08-09'),
(2, 'Beli lampu', '150.000', '2018-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE IF NOT EXISTS `penghuni` (
  `id_penghuni` int(10) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `nama_penghuni` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `no_telp_ortu` int(15) NOT NULL,
  `kampus` varchar(20) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kamar` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `id_user`, `nama_penghuni`, `alamat`, `no_telp`, `nama_ortu`, `no_telp_ortu`, `kampus`, `jurusan`, `angkatan`, `email`, `kamar`) VALUES
(4, 1, 'danu gentolet', 'medan jaya', 98657676, 'ida jauni', 86544435, 'uncendra', 'elektrolite', 2007, 'danumedan123@gmail.com', '112'),
(11, NULL, 'Iwan Kopling', 'pbg', 12345, 'ayah', 97665, 'undip', 'teknik kedokteran', 2019, 'iwankopling@gmail.com', '22'),
(12, 8, 'hanifan', 'pbg', 896554, 'ayah', 12345, 'unsoed', 'teknik informatika', 2011, 'hanifannurhuda@gmail.com', '21'),
(13, 10, 'hanifan nurhuda', 'Jalan Telogosari Utara 5 Tembalang, Semarang', 2147483647, 'poniman', 1234567, 'unsoed', 'teknik kedokteran', 2019, 'hudanurhuda182@gmail.com', '26'),
(14, 12, 'daniel', 'semarang', 12132424, 'nehio', 121343, 'unsoed', 'teknik', 2019, 'cobacoba@gmail.com', '12');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE IF NOT EXISTS `rumah` (
  `id_rumah` int(10) NOT NULL,
  `nama_rumah` varchar(30) NOT NULL,
  `alamat_rumah` varchar(50) NOT NULL,
  `jumlah_kamar` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `nama_rumah`, `alamat_rumah`, `jumlah_kamar`) VALUES
(1, 'wisma ui 1', 'Jalan Telogosari Utara IV No 5 Tembalang Semarang', '30'),
(2, 'wisma ui 2', 'Jalan Telogosari Utara 8 Tembalang, Semarang', '20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `hak_akses`) VALUES
(1, 'hudanurhuda182@gmail.com', '123', 'Admin'),
(2, 'pengelola@gmail.com', 'admin', 'Pengelola'),
(3, 'iwandarmawan@gmail.com', 'qwerty', 'Penghuni'),
(4, 'mencoba@gmail.com', '12345', 'Penghuni'),
(5, 'penghuni@yahoo.com', '12345', 'Penghuni'),
(6, 'hanifan@gmail.com', '12345', 'Admin'),
(7, 'calonpenghuni@gmail.com', '12345', 'Penghuni'),
(8, 'hanifannurhuda@gmail.com', '12345', 'Penghuni'),
(9, 'hanifannur@gmail.com', 'qwerty', 'Penghuni'),
(10, 'hudanurhuda123@gmail.com', 'YT9m9w8ooc', 'Penghuni'),
(11, 'abcd@gmail.com', '12345', 'Penghuni'),
(12, 'cobabaru@gmail.com', '12345', 'Penghuni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`), ADD KEY `fk_rumah_kamar` (`id_rumah`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`), ADD KEY `fk_pembayaran_penghuni` (`nama`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
