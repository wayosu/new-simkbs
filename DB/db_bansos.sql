-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 01:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kependudukan`
--

CREATE TABLE `tabel_kependudukan` (
  `NO_KK` char(16) NOT NULL,
  `NIK` char(16) NOT NULL,
  `NAMA_LGKP` varchar(50) NOT NULL,
  `HBKEL` varchar(2) NOT NULL,
  `JK` tinyint(1) NOT NULL,
  `TMPT_LHR` varchar(30) NOT NULL,
  `TGL_LHR` date NOT NULL,
  `TAHUN` varchar(3) NOT NULL,
  `BULAN` varchar(2) NOT NULL,
  `HARI` varchar(2) NOT NULL,
  `NAMA_LGKP_AYAH` varchar(100) NOT NULL,
  `NAMA_LGKP_IBU` varchar(100) NOT NULL,
  `KECAMATAN` varchar(30) NOT NULL,
  `KELURAHAN` varchar(30) NOT NULL,
  `DSN` varchar(1) NOT NULL,
  `AGAMA` varchar(10) NOT NULL,
  `bantuan` varchar(2) NOT NULL,
  `jenis_bantuan` varchar(100) NOT NULL,
  `ibu_hamil` varchar(2) NOT NULL,
  `disabilitas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_kependudukan`
--

INSERT INTO `tabel_kependudukan` (`NO_KK`, `NIK`, `NAMA_LGKP`, `HBKEL`, `JK`, `TMPT_LHR`, `TGL_LHR`, `TAHUN`, `BULAN`, `HARI`, `NAMA_LGKP_AYAH`, `NAMA_LGKP_IBU`, `KECAMATAN`, `KELURAHAN`, `DSN`, `AGAMA`, `bantuan`, `jenis_bantuan`, `ibu_hamil`, `disabilitas`) VALUES
('1231231232', '1231233131', 'Eos labore odit fug', '1', 1, 'Quas consectetur la', '1989-05-20', '32', '0', '15', '123123', '123123', 'TILONGKABILA', 'BUTU', '1', 'hindu', '1', 'PKH', '0', ''),
('123123', '12313313', 'Eos labore odit fug', '1', 1, 'edfsa', '2021-05-06', '0', '0', '29', 'Dicta molestiae est ', 'Animi maiores hic i', 'TILONGKABILA', 'BUTU', '2', 'islam', '1', 'BLT', '0', ''),
('1231231232', '34', 'Vero aut est enim pe', '9', 2, 'Mollit est id aliqu', '1976-12-28', '44', '5', '7', 'Ad molestiae sit vol', 'Inventore in tenetur', 'TILONGKABILA', 'BUTU', '3', 'khonghucu', '0', '', '0', ''),
('123123', '83', 'Culpa maiores fugia', '9', 2, 'Aut at laborum Sit ', '2010-12-12', '10', '5', '19', 'Velit elit enim lor', 'Illo ad consectetur ', 'TILONGKABILA', 'BUTU', '2', 'khonghucu', '0', '', '0', ''),
('123123', '84', 'In enim eu aut rem e', '9', 1, 'Soluta dolorem offic', '2009-05-23', '12', '0', '13', 'Reprehenderit sit ', 'Sit dolorum cum comm', 'TILONGKABILA', 'BUTU', '2', 'khonghucu', '', '', '', '1'),
('1231231232', '85', 'Cum eligendi fugiat', '3', 2, 'Qui omnis porro cons', '2020-04-24', '1', '1', '11', 'Nulla proident volu', 'Pariatur Accusantiu', 'TILONGKABILA', 'BUTU', '1', 'islam', '0', '', '0', '1'),
('123123', '99', 'Ea sed necessitatibu', '3', 2, 'Aperiam labore expli', '2000-12-20', '20', '5', '16', 'Iusto rerum et et no', 'Nulla quia culpa dol', 'TILONGKABILA', 'BUTU', '2', 'kristen', '0', '', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_konsumsi`
--

CREATE TABLE `tabel_konsumsi` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `BAHAN_MAKANAN` varchar(10) NOT NULL,
  `FREKUENSI_PER_MINGGU` varchar(2) NOT NULL,
  `PAKAIAN_PER_TAHUN` varchar(2) NOT NULL,
  `MAKAN_PER_HARI` varchar(2) NOT NULL,
  `BIAYA_PENGOBATAN` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_konsumsi`
--

INSERT INTO `tabel_konsumsi` (`NIK`, `NAMA`, `BAHAN_MAKANAN`, `FREKUENSI_PER_MINGGU`, `PAKAIAN_PER_TAHUN`, `MAKAN_PER_HARI`, `BIAYA_PENGOBATAN`) VALUES
(34, 'Vero aut est enim pe', '4', '3', '0', '4', '1'),
(83, 'Culpa maiores fugia', '1', '1', '1', '0', '0'),
(84, 'In enim eu aut rem e', '', '', '', '', ''),
(85, 'Cum eligendi fugiat', '2', '0', '0', '0', '1'),
(99, 'Ea sed necessitatibu', '4', '1', '1', '1', '0'),
(12313313, 'Eos labore odit fug', '2', '1', '1', '1', '0'),
(1231233131, 'Eos labore odit fug', '3', '1', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pekerjaan`
--

CREATE TABLE `tabel_pekerjaan` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `PEKERJAAN` varchar(30) NOT NULL,
  `PENGHASILAN_PER_BULAN` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pekerjaan`
--

INSERT INTO `tabel_pekerjaan` (`NIK`, `NAMA`, `PEKERJAAN`, `PENGHASILAN_PER_BULAN`) VALUES
(34, 'Vero aut est enim pe', 'Pensiunan', 88),
(83, 'Culpa maiores fugia', 'Perangkat Desa', 2),
(84, 'In enim eu aut rem e', 'Tidak Bekerja', 26),
(85, 'Cum eligendi fugiat', 'Guru', 32),
(99, 'Ea sed necessitatibu', 'Buruh Bangunan', 54),
(12313313, 'Eos labore odit fug', 'Buruh Tani', 200000),
(1231233131, 'Eos labore odit fug', 'Buruh Bangunan', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendidikan`
--

CREATE TABLE `tabel_pendidikan` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `PENDIDIKAN_TERAKHIR` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pendidikan`
--

INSERT INTO `tabel_pendidikan` (`NIK`, `NAMA`, `PENDIDIKAN_TERAKHIR`) VALUES
(34, 'Vero aut est enim pe', 'Tidak Tamat SD'),
(83, 'Culpa maiores fugia', 'S3 dan Sederajat'),
(84, 'In enim eu aut rem e', 'Tidak Sekolah'),
(85, 'Cum eligendi fugiat', 'Diploma 1-3'),
(99, 'Ea sed necessitatibu', 'SMP dan Sederajat'),
(12313313, 'Eos labore odit fug', 'Tidak Tamat SD'),
(1231233131, 'Eos labore odit fug', 'SD dan Sederajat');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_rumah`
--

CREATE TABLE `tabel_rumah` (
  `NIK` int(16) NOT NULL,
  `LUAS_LANTAI` int(2) NOT NULL,
  `JENIS_LANTAI` varchar(20) NOT NULL,
  `JENIS_DINDING` varchar(30) NOT NULL,
  `FASILITAS_BAB` tinyint(1) NOT NULL,
  `SUMBER_PENERANGAN` tinyint(1) NOT NULL,
  `SUMBER_AIR_MINUM` varchar(30) NOT NULL,
  `BAHAN_BAKAR_MEMASAK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_rumah`
--

INSERT INTO `tabel_rumah` (`NIK`, `LUAS_LANTAI`, `JENIS_LANTAI`, `JENIS_DINDING`, `FASILITAS_BAB`, `SUMBER_PENERANGAN`, `SUMBER_AIR_MINUM`, `BAHAN_BAKAR_MEMASAK`) VALUES
(12313313, 1, 'Kayu/Papan', 'Rumbia', 0, 0, 'Mata Air tidak Terlindung', 'Kayu Bakar'),
(1231233131, 1, 'Bambu', 'Bambu', 0, 0, 'Air Hujan', 'Kayu Bakar');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tabungan`
--

CREATE TABLE `tabel_tabungan` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `KEPEMILIKAN_TABUNGAN` varchar(1) NOT NULL,
  `JENIS_TABUNGAN` varchar(4) NOT NULL,
  `HARGA` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_tabungan`
--

INSERT INTO `tabel_tabungan` (`NIK`, `NAMA`, `KEPEMILIKAN_TABUNGAN`, `JENIS_TABUNGAN`, `HARGA`) VALUES
(34, 'Vero aut est enim pe', '1', '4', '36'),
(83, 'Culpa maiores fugia', '0', '0', '0'),
(84, 'In enim eu aut rem e', '', '', ''),
(85, 'Cum eligendi fugiat', '0', '0', '0'),
(99, 'Ea sed necessitatibu', '0', '0', '0'),
(12313313, 'Eos labore odit fug', '0', '0', '0'),
(1231233131, 'Eos labore odit fug', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `pass`) VALUES
(2, 'Amirrudin Paneo', 'amirpaneo', '4e72fc71d6afe049572655387d0f5346');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_kependudukan`
--
ALTER TABLE `tabel_kependudukan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tabel_konsumsi`
--
ALTER TABLE `tabel_konsumsi`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tabel_pekerjaan`
--
ALTER TABLE `tabel_pekerjaan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tabel_pendidikan`
--
ALTER TABLE `tabel_pendidikan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tabel_rumah`
--
ALTER TABLE `tabel_rumah`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tabel_tabungan`
--
ALTER TABLE `tabel_tabungan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
