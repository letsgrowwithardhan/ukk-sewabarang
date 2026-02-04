-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2026 pada 10.44
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
