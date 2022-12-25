-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 04:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_spx`
--

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `no_mekanik` int(3) UNSIGNED NOT NULL,
  `nama_mekanik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`no_mekanik`, `nama_mekanik`) VALUES
(1, 'Lukman'),
(2, 'Ivan'),
(3, 'Muhidin'),
(4, 'Irhas Prabu'),
(5, 'Tamher Firman'),
(6, 'Manto Gurning');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `no_tiket` int(5) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `nama_driver` varchar(30) NOT NULL,
  `nama_mekanik` varchar(30) DEFAULT NULL,
  `km_unit` varchar(6) NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `tanggal_servis` varchar(15) DEFAULT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`no_tiket`, `nopol`, `nama_driver`, `nama_mekanik`, `km_unit`, `keluhan`, `tanggal_servis`, `status`) VALUES
(3, 'B1234ABC', 'Ucok', 'Ivan', '1000', 'Migrain', '24-12-2022', 'Open'),
(4, 'B1234ABC', 'Ucok', 'Ivan', '2222', 'Migrain', '23-12-2022', 'Closed'),
(5, 'B2222ABC', 'Mya', 'Muhidin', '1234', 'Migrain', '23-12-2022', 'Open'),
(6, 'B1234ABC', 'Meong', 'Muhidin', '1000', 'Migrain', '23-12-2022', 'Open'),
(7, 'D1234DD', 'Meong', 'Irhas Prabu', '1000', 'Migrain', '23-12-2022', 'Open'),
(8, 'D1234DD', 'Meong', 'Lukman', '1234', 'Migrain', '23-12-2022', 'Open'),
(9, 'B2222ABC', 'Meong', 'Lukman', '1234', 'Migrain', '23-12-2022', 'Open'),
(10, 'B2222ABC', 'Start', 'Ivan', '1111', 'Batuk', '23-12-2022', 'Open'),
(11, 'D1234DD', 'Halo', 'Manto Gurning', '60', 'Kelistrikan mati, servis rutin, ganti ban depan, oli rembes, kaki-kaki bunyi, tidak bisa starter', '23-12-2022', 'Open'),
(12, 'B1234ABC', 'Tambah', 'Lukman', '60', 'Kelistrikan mati, servis rutin, ganti ban depan, oli rembes, kaki-kaki bunyi, tidak bisa starter', '23-12-2022', 'Open'),
(13, 'B1234ABC', 'Mulai', 'Ivan', '1', 'Penyok, kelistrikan mati, servis rutin, ganti ban depan, oli rembes, kaki-kaki bunyi, tidak bisa starter', '23-12-2022', 'Open'),
(14, 'B1234ABC', 'Telur Gulung', 'Tamher Firman', '1234', 'Lapar', '24-12-2022', 'Open'),
(15, 'B9695ALI', 'Macchiato', 'Irhas Prabu', '900', 'Kenyang', '24-12-2022', 'Open');

--
-- Triggers `tiket`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tiket` FOR EACH ROW BEGIN
UPDATE 213_sparepart SET stock=stock-NEW.qty
WHERE id_sparepart=NEW.id_sparepart;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `no_unit` int(4) NOT NULL,
  `nopol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`no_unit`, `nopol`) VALUES
(1, 'B1234ABC'),
(2, 'B2222ABC'),
(3, 'D1234DD'),
(4, 'B9695ALI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `no_user` int(2) NOT NULL,
  `username` varchar(8) DEFAULT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no_user`, `username`, `nama_user`, `password`) VALUES
(1, 'ali', 'Aulia', '1844156d4166d94387f1a4ad031ca5fa'),
(2, 'iadhisti', 'Ines Adhisti', '594f803b380a41396ed63dca39503542'),
(3, 'unch', 'Bang Ucok', '594f803b380a41396ed63dca39503542');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`no_mekanik`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`no_tiket`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`no_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `no_mekanik` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `no_tiket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `no_unit` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
