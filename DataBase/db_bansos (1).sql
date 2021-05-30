-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2021 pada 18.09
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

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
-- Struktur dari tabel `tabel_kependudukan`
--

CREATE TABLE `tabel_kependudukan` (
  `NO_KK` int(16) NOT NULL,
  `NIK` int(16) NOT NULL,
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
  `jenis_bantuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_kependudukan`
--

INSERT INTO `tabel_kependudukan` (`NO_KK`, `NIK`, `NAMA_LGKP`, `HBKEL`, `JK`, `TMPT_LHR`, `TGL_LHR`, `TAHUN`, `BULAN`, `HARI`, `NAMA_LGKP_AYAH`, `NAMA_LGKP_IBU`, `KECAMATAN`, `KELURAHAN`, `DSN`, `AGAMA`, `bantuan`, `jenis_bantuan`) VALUES
(83, 97, 'Nostrum cumque in iu', '3', 2, 'Voluptatem tempor e', '1977-02-16', '44', '3', '14', 'Non Nam animi neque', 'Ullamco dolor aut au', 'TILONGKABILA', 'BUTU', '2', 'khonghucu', '1', 'BlT'),
(2147483647, 1424151, 'Orang Kaya', '1', 1, 'Gorontalo', '2005-12-31', '15', '4', '30', 'Nico', 'Zenab', 'TILONGKABILA', 'BUTU', '1', 'islam', '0', ''),
(12345678, 53129239, 'Istri', '3', 2, 'Gorontalo', '2000-05-09', '21', '0', '21', 'Nico', 'Zenab', 'TILONGKABILA', 'BUTU', '1', 'islam', '0', ''),
(1212, 241414114, 'Orang Miskin', '1', 1, 'Gorontalo', '2021-12-31', '0', '7', '1', 'Nico', 'Zenab', 'TILONGKABILA', 'BUTU', '2', 'islam', '1', 'Bantuan Untuk Pekerja'),
(12345678, 531418022, 'Azwar Botutihe', '1', 1, 'Gorontalo', '2000-11-29', '20', '6', '1', 'Nico', 'Zenab', 'TILONGKABILA', 'BUTU', '1', 'islam', '1', 'Program Keluarga Harapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_konsumsi`
--

CREATE TABLE `tabel_konsumsi` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `BAHAN_MAKANAN` varchar(10) NOT NULL,
  `FREKUENSI_PER_MINGGU` int(2) NOT NULL,
  `PAKAIAN_PER_TAHUN` int(2) NOT NULL,
  `MAKAN_PER_HARI` int(2) NOT NULL,
  `BIAYA_PENGOBATAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_konsumsi`
--

INSERT INTO `tabel_konsumsi` (`NIK`, `NAMA`, `BAHAN_MAKANAN`, `FREKUENSI_PER_MINGGU`, `PAKAIAN_PER_TAHUN`, `MAKAN_PER_HARI`, `BIAYA_PENGOBATAN`) VALUES
(97, 'Nostrum cumque in iu', '1', 0, 2, 0, 0),
(1424151, 'Orang Kaya', '1', 1, 1, 2, 1),
(53129239, 'Istri', '4', 1, 1, 1, 0),
(241414114, 'Orang Miskin', '2', 0, 0, 0, 0),
(531418022, 'Azwar Botutihe', '4', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pekerjaan`
--

CREATE TABLE `tabel_pekerjaan` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `PEKERJAAN` varchar(30) NOT NULL,
  `PENGHASILAN_PER_BULAN` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pekerjaan`
--

INSERT INTO `tabel_pekerjaan` (`NIK`, `NAMA`, `PEKERJAAN`, `PENGHASILAN_PER_BULAN`) VALUES
(97, 'Nostrum cumque in iu', 'Pedagang', 82),
(1424151, 'Orang Kaya', 'Petani', 2000000),
(53129239, 'Istri', 'Petani', 100000),
(241414114, 'Orang Miskin', 'Petani', 1),
(531418022, 'Azwar Botutihe', 'Lainnya', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pendidikan`
--

CREATE TABLE `tabel_pendidikan` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `PENDIDIKAN_TERAKHIR` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pendidikan`
--

INSERT INTO `tabel_pendidikan` (`NIK`, `NAMA`, `PENDIDIKAN_TERAKHIR`) VALUES
(97, 'Nostrum cumque in iu', 'SD dan Sederajat'),
(1424151, 'Orang Kaya', 'Tidak Sekolah'),
(53129239, 'Istri', 'SD dan Sederajat'),
(241414114, 'Orang Miskin', 'Tidak Sekolah'),
(531418022, 'Azwar Botutihe', 'Tidak Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_rumah`
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
-- Dumping data untuk tabel `tabel_rumah`
--

INSERT INTO `tabel_rumah` (`NIK`, `LUAS_LANTAI`, `JENIS_LANTAI`, `JENIS_DINDING`, `FASILITAS_BAB`, `SUMBER_PENERANGAN`, `SUMBER_AIR_MINUM`, `BAHAN_BAKAR_MEMASAK`) VALUES
(1424151, 2, 'Marmer', 'Lainnya', 1, 1, 'Lainnya', 'Gas'),
(241414114, 1, 'Bambu', 'Bambu', 0, 0, 'Sungai', 'Minyak Tanah'),
(531418022, 1, 'Bambu', 'Bambu', 0, 0, 'Sungai', 'Minyak Tanah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_tabungan`
--

CREATE TABLE `tabel_tabungan` (
  `NIK` int(16) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `KEPEMILIKAN_TABUNGAN` tinyint(1) NOT NULL,
  `JENIS_TABUNGAN` int(2) NOT NULL,
  `HARGA` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_tabungan`
--

INSERT INTO `tabel_tabungan` (`NIK`, `NAMA`, `KEPEMILIKAN_TABUNGAN`, `JENIS_TABUNGAN`, `HARGA`) VALUES
(97, 'Nostrum cumque in iu', 0, 0, 0),
(1424151, 'Orang Kaya', 1, 1, 10000000),
(53129239, 'Istri', 0, 0, 0),
(241414114, 'Orang Miskin', 0, 0, 0),
(531418022, 'Azwar Botutihe', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_kependudukan`
--
ALTER TABLE `tabel_kependudukan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `tabel_konsumsi`
--
ALTER TABLE `tabel_konsumsi`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `tabel_pekerjaan`
--
ALTER TABLE `tabel_pekerjaan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `tabel_pendidikan`
--
ALTER TABLE `tabel_pendidikan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `tabel_rumah`
--
ALTER TABLE `tabel_rumah`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `tabel_tabungan`
--
ALTER TABLE `tabel_tabungan`
  ADD PRIMARY KEY (`NIK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
