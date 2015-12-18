-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Nov 2015 pada 15.38
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_ikhwan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `1`
--

CREATE TABLE IF NOT EXISTS `1` (
`id` int(11) unsigned NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `1`
--

INSERT INTO `1` (`id`, `nim`, `nama_lengkap`, `jurusan`, `angkatan`, `hp`) VALUES
(18, '13212014', 'Syaiful Andy', 'Teknik Elektro', '2012', '085793168799'),
(20, '13511014', 'Riandy Rahman Nugraha', 'Teknik Informatika', '2011', '085793174788');

-- --------------------------------------------------------

--
-- Struktur dari tabel `2`
--

CREATE TABLE IF NOT EXISTS `2` (
`id` int(11) unsigned NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `3`
--

CREATE TABLE IF NOT EXISTS `3` (
`id` int(11) unsigned NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `3`
--

INSERT INTO `3` (`id`, `nim`, `nama_lengkap`, `jurusan`, `angkatan`, `hp`) VALUES
(1, '10314026', 'Muhammad Rafiul Ilmi Syarifudin', 'Astronomi', '2014', '089650987870');

-- --------------------------------------------------------

--
-- Struktur dari tabel `4`
--

CREATE TABLE IF NOT EXISTS `4` (
`id` int(11) unsigned NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`id` int(11) NOT NULL,
  `nama_acara` varchar(1000) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `tanggal` date NOT NULL,
  `target` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama_acara`, `deskripsi`, `tanggal`, `target`) VALUES
(1, 'PMB 2015', 'PMB 2015', '2015-09-16', 'Maba ITB 2015'),
(3, 'Sahur', 'Makan sahur bersama', '2015-09-29', 'Seluruh Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` int(11) NOT NULL,
  `filename` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kader`
--

CREATE TABLE IF NOT EXISTS `kader` (
`id` int(11) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nama_lengkap` text,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_libur` text,
  `alamat_bdg` text,
  `asal_sma` varchar(255) DEFAULT NULL,
  `kondisi_mentoring` int(255) DEFAULT '0' COMMENT 'belum ada kelompok - 0, tidak berjalan - 1, sudah mentoring - 2',
  `data_akademik` int(255) DEFAULT '0' COMMENT 'range kurang dri 1, diantara 1-2, diantara 2-3, diatas 3',
  `hobi` text
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kader`
--

INSERT INTO `kader` (`id`, `nim`, `nama_lengkap`, `nama_panggilan`, `jurusan`, `angkatan`, `hp`, `email`, `tempat_lahir`, `tanggal_lahir`, `alamat_libur`, `alamat_bdg`, `asal_sma`, `kondisi_mentoring`, `data_akademik`, `hobi`) VALUES
(3, '13212014', 'Syaiful Andy', NULL, 'Teknik Elektro', '2012', '085793168799', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(4, '13511014', 'Riandy Rahman Nugraha', NULL, 'Teknik Informatika', '2011', '085793174788', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(14, '10313026', 'Muhammad', NULL, 'Astronomi', '2014', '089650987870', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(20, '10314026', 'Muhammad Rafiul Ilmi Syarifudin', NULL, 'Astronomi', '2014', '089650987870', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main`
--

CREATE TABLE IF NOT EXISTS `main` (
`id` int(11) unsigned NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kepanitiaan`
--

CREATE TABLE IF NOT EXISTS `riwayat_kepanitiaan` (
`id` int(11) NOT NULL,
  `id_kader` varchar(255) NOT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_kepanitiaan`
--

INSERT INTO `riwayat_kepanitiaan` (`id`, `id_kader`, `tahun`, `kegiatan`, `jabatan`) VALUES
(1, '9', '2014', 'GIT', 'Akomtrans');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_organisasi`
--

CREATE TABLE IF NOT EXISTS `riwayat_organisasi` (
`id` int(11) NOT NULL,
  `id_kader` varchar(255) NOT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `organisasi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_organisasi`
--

INSERT INTO `riwayat_organisasi` (`id`, `id_kader`, `tahun`, `organisasi`, `jabatan`) VALUES
(3, '9', '2014', 'Gamais ITB', 'Kepala Departemen G-TECH'),
(5, '10', '2014', 'Gamais ITB', 'Kepala Departemen G-TECH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pembinaan`
--

CREATE TABLE IF NOT EXISTS `riwayat_pembinaan` (
`id` int(11) NOT NULL,
  `id_kader` varchar(255) NOT NULL,
  `agenda` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_pembinaan`
--

INSERT INTO `riwayat_pembinaan` (`id`, `id_kader`, `agenda`) VALUES
(7, '9', 'Simfoni Day 1'),
(8, '9', 'Simfoni Day 2'),
(9, '9', 'Simfoni Day 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1`
--
ALTER TABLE `1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2`
--
ALTER TABLE `2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `3`
--
ALTER TABLE `3`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4`
--
ALTER TABLE `4`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kader`
--
ALTER TABLE `kader`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_kepanitiaan`
--
ALTER TABLE `riwayat_kepanitiaan`
 ADD PRIMARY KEY (`id`,`id_kader`);

--
-- Indexes for table `riwayat_organisasi`
--
ALTER TABLE `riwayat_organisasi`
 ADD PRIMARY KEY (`id`,`id_kader`);

--
-- Indexes for table `riwayat_pembinaan`
--
ALTER TABLE `riwayat_pembinaan`
 ADD PRIMARY KEY (`id`,`id_kader`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1`
--
ALTER TABLE `1`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `2`
--
ALTER TABLE `2`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `3`
--
ALTER TABLE `3`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `4`
--
ALTER TABLE `4`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kader`
--
ALTER TABLE `kader`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat_kepanitiaan`
--
ALTER TABLE `riwayat_kepanitiaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `riwayat_organisasi`
--
ALTER TABLE `riwayat_organisasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `riwayat_pembinaan`
--
ALTER TABLE `riwayat_pembinaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
