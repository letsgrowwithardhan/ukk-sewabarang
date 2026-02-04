-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2026 pada 10.45
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukksewabarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayathapusbarang`
--

CREATE TABLE `riwayathapusbarang` (
  `id_barang` int(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kategori` enum('sepatu','tas','jaket','aksesoris') NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayathapusbarang`
--

INSERT INTO `riwayathapusbarang` (`id_barang`, `nama_barang`, `kategori`, `gambar`) VALUES
(1, 'Jaket Gorpcore', 'sepatu', 'aji.JPG'),
(1002, 'Tas', 'tas', 'tas carrier.webp'),
(1, 'Jaket Gorpcore', 'tas', 'tas carrier.webp'),
(4006, 'Tracking Pole', 'aksesoris', 'trackingpole.webp'),
(1001, 'Jaket', 'jaket', 'jaket gorpcore.webp'),
(2002, 'Tas', 'tas', 'tas carrier.webp'),
(3003, 'Jaket', 'jaket', 'jaket gorpcore.webp'),
(4004, 'Tas', 'tas', 'tas carrier.webp'),
(4005, 'Jaket', 'jaket', 'jaket gorpcore.webp'),
(1001, 'Jaket Gorpcore', 'jaket', 'gorpcore.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbarang`
--

CREATE TABLE `tbbarang` (
  `id_barang` int(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` enum('sepatu','tas','jaket','aksesoris') NOT NULL,
  `jml_barang` int(5) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_entry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbbarang`
--

INSERT INTO `tbbarang` (`id_barang`, `nama_barang`, `kategori`, `jml_barang`, `gambar`, `tgl_entry`) VALUES
(1001, 'Jaket Gorpcore', 'jaket', 15, 'gorpcore.webp', '2026-02-01');

--
-- Trigger `tbbarang`
--
DELIMITER $$
CREATE TRIGGER `hapusbarang` AFTER DELETE ON `tbbarang` FOR EACH ROW INSERT INTO riwayathapusbarang VALUES (Old.`id_barang`, Old.`nama_barang`, Old.`kategori`, Old.`gambar`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblogin`
--

CREATE TABLE `tblogin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','petugas','peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblogin`
--

INSERT INTO `tblogin` (`username`, `password`, `level`) VALUES
('admin', 'admin', 'admin'),
('ardhan', 'ardhan123', 'petugas'),
('peminjam', 'peminjam', 'peminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpeminjaman`
--

CREATE TABLE `tbpeminjaman` (
  `no_transaksi` int(8) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_barang` int(8) NOT NULL,
  `jml_pinjam` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_batas_kembali` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `tgl_entry` date NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `nama`, `jk`, `telp`, `email`, `alamat`, `tgl_entry`, `foto`) VALUES
(1001, 'Fabiyan David Ardhana', 'L', '08987654321', 'ardhanfabiyan@gmail.com', 'Kasihan', '2026-01-27', 'adit.jpg'),
(1002, 'Johnny Orlando', 'L', '08808398232', 'johnnyorlando@gmail.com', 'Kasihan', '2026-01-28', 'andita.JPG'),
(1003, 'Johnny Orlando', 'L', '08808398232', 'johnnyorlando@gmail.com', 'Kasihan', '2026-01-28', 'aji.JPG'),
(1004, 'Johnny Orlando', 'L', '08808398232', 'johnnyorlando@gmail.com', 'Pajangan', '2026-01-29', 'andri.JPG'),
(1005, 'Melvin Rhee Muzzaki ', 'L', '088232456583', 'melvinrhee@gmail.com', 'Banguntapan', '2026-01-31', 'andi.JPG'),
(1006, 'Fabiyan', 'L', '088232423027', 'ardhanfabiyan@gmail.com', 'Kasihan', '2026-01-31', 'andi.JPG'),
(1007, 'Sandinan', 'L', '088123456789', 'adnanst@gmail.com', 'Bangunjiwo', '2026-01-31', 'andi.JPG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbpeminjaman`
--
ALTER TABLE `tbpeminjaman`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
