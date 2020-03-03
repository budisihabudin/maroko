-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 05:51 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maroko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi_teks` text NOT NULL,
  `foto` varchar(128) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_kategori_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_aturan_pengguna_sistem`
--

CREATE TABLE `tb_aturan_pengguna_sistem` (
  `id` int(11) NOT NULL,
  `status_pengguna` enum('admin','user','belum diaktifkan','belum ditentukan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aturan_pengguna_sistem`
--

INSERT INTO `tb_aturan_pengguna_sistem` (`id`, `status_pengguna`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'belum diaktifkan'),
(4, 'belum ditentukan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_anggota`
--

CREATE TABLE `tb_data_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat_ind` varchar(100) NOT NULL,
  `alamat_mrk` varchar(100) NOT NULL,
  `sd` varchar(50) NOT NULL,
  `smp` varchar(50) NOT NULL,
  `sma` varchar(50) NOT NULL,
  `jk` enum('laki - laki','perempuan','','') NOT NULL,
  `nik` varchar(50) NOT NULL,
  `pgtinggi` varchar(100) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pesantren` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `status_pengguna` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_akun` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `no_telp` char(16) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_anggota`
--

INSERT INTO `tb_data_anggota` (`id_anggota`, `nama`, `alamat_ind`, `alamat_mrk`, `sd`, `smp`, `sma`, `jk`, `nik`, `pgtinggi`, `id_pendidikan`, `id_pengguna`, `id_pesantren`, `id_dokumen`, `status_pengguna`, `username`, `password`, `status_akun`, `foto`, `no_telp`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`) VALUES
(3, 'admin', '', '', '', '', '', 'laki - laki', '', '', 0, 0, 0, 0, 1, 'admin', 'admin', 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `dokumen` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `dikirim_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dokumen`, `dokumen`, `keterangan`, `id_anggota`, `dikirim_pada`) VALUES
(1, '8787878.pdf', 'jkjkjkj', 3, '2020-03-19 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_artikel`
--

CREATE TABLE `tb_kategori_artikel` (
  `id_kategori_artikel` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_artikel`
--

INSERT INTO `tb_kategori_artikel` (`id_kategori_artikel`, `kategori`) VALUES
(3, 'Muhasabah Diri'),
(4, 'Sunnah Thoharoh'),
(5, 'Tabbayun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_org_tua`
--

CREATE TABLE `tb_org_tua` (
  `id_org_tua` int(11) NOT NULL,
  `nama_orgtua` varchar(100) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_telp` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `pendidikan`, `jurusan`, `fakultas`, `kelas`) VALUES
(5, 'SMP', '', '', '3'),
(6, 'SMA', '', '', '2'),
(7, 'SD', '', '', ''),
(8, 'D1', '', '', ''),
(9, 'D2', '', '', ''),
(10, 'D3', '', '', ''),
(11, 'D4', '', '', ''),
(12, 'S1', '', '', ''),
(13, 'S2', '', '', ''),
(14, 'S3', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_aturan_pengguna_sistem`
--
ALTER TABLE `tb_aturan_pengguna_sistem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_anggota`
--
ALTER TABLE `tb_data_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_pendidikan_2` (`id_pendidikan`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tb_kategori_artikel`
--
ALTER TABLE `tb_kategori_artikel`
  ADD PRIMARY KEY (`id_kategori_artikel`);

--
-- Indexes for table `tb_org_tua`
--
ALTER TABLE `tb_org_tua`
  ADD PRIMARY KEY (`id_org_tua`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_aturan_pengguna_sistem`
--
ALTER TABLE `tb_aturan_pengguna_sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_data_anggota`
--
ALTER TABLE `tb_data_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori_artikel`
--
ALTER TABLE `tb_kategori_artikel`
  MODIFY `id_kategori_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_org_tua`
--
ALTER TABLE `tb_org_tua`
  MODIFY `id_org_tua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
