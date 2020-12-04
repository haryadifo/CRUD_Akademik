-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 05:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-oprec`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `nim` varchar(18) NOT NULL,
  `nama` text NOT NULL,
  `angkatan` int(11) NOT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`nim`, `nama`, `angkatan`, `tempat_lahir`, `tanggal_lahir`, `email`) VALUES
('1234511', 'Muhammad Fachrurrozi', 2018, 'Palembang', '2020-11-28', 'mfachrz@unsri.ac.id'),
('123456', 'Muhammad Fachrurrozi', 2018, 'Lubuklinggau', '2020-10-17', 'mfachrz@unsri.ac.id'),
('123466', 'Muhammad Fachrurrozi', 2018, 'Palembang', '2020-11-24', 'mfachrz@unsri.ac.id'),
('1234667', 'Muhammad Erwin', 2018, 'Palembang', '0000-00-00', 'mfachrz@unsri.ac.id'),
('12346678', 'Azami Abdul Malik', 2018, '', '0000-00-00', ''),
('45678', 'Ahmad Yaasiin Ubaidillah', 2019, 'Palembang', '2020-10-08', 'mfachrz@unsri.ac.id'),
('9999999', 'Yasmin', 2019, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `prodi` varchar(150) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama`, `gender`, `prodi`, `id_prodi`, `alamat`, `email`) VALUES
(6, '09021181823016', 'Arya Difo Hasmi', 'Laki - Laki', '', 102, 'Pekanbaru', 'haryadiifo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama`) VALUES
(100, 'Teknik Informatika'),
(101, 'Sistem Informasi'),
(102, 'Sistem Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(100) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL,
  `konten` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `tanggal`, `nama`, `angkatan`, `konten`) VALUES
(1, '2020-10-07 02:13:51', 'Azam', 2010, 'Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.\r\n'),
(2, '2020-10-07 02:14:19', 'Yaasiin', 2005, 'Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.'),
(3, '2020-10-07 02:14:35', 'Kaafi', 2011, 'Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.'),
(4, '2020-10-07 02:14:53', 'Azma', 2013, 'Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
