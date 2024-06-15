-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2024 pada 18.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_servismotor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `c_id` varchar(6) NOT NULL,
  `c_nama` varchar(32) DEFAULT NULL,
  `c_alamat` text DEFAULT NULL,
  `c_noTlp` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`c_id`, `c_nama`, `c_alamat`, `c_noTlp`) VALUES
('C0001', 'Dhika', 'Jl.Jalan Raya No.31', '082237129318');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtlservice`
--

CREATE TABLE `dtlservice` (
  `s_id` varchar(6) NOT NULL,
  `e_id` varchar(6) DEFAULT NULL,
  `m_noPol` varchar(9) DEFAULT NULL,
  `s_tgl` date DEFAULT NULL,
  `s_layanan` varchar(32) DEFAULT NULL,
  `s_biaya` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dtlservice`
--

INSERT INTO `dtlservice` (`s_id`, `e_id`, `m_noPol`, `s_tgl`, `s_layanan`, `s_biaya`) VALUES
('S1001', 'E0002', 'B123ADP', '2024-06-15', 'Tune Up', 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `e_id` varchar(6) NOT NULL,
  `e_nama` varchar(32) DEFAULT NULL,
  `e_alamat` text DEFAULT NULL,
  `e_noTlp` varchar(12) DEFAULT NULL,
  `e_gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`e_id`, `e_nama`, `e_alamat`, `e_noTlp`, `e_gambar`) VALUES
('E0002', 'Delas Princisa', 'Jl. Haji Buang No66A', '089538504549', 'e_gambar/WhatsApp Image 2024-06-15 at 23.33.53.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `m_noPol` varchar(9) NOT NULL,
  `c_id` varchar(5) DEFAULT NULL,
  `m_brand` varchar(16) DEFAULT NULL,
  `m_model` varchar(16) DEFAULT NULL,
  `m_thnBuat` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`m_noPol`, `c_id`, `m_brand`, `m_model`, `m_thnBuat`) VALUES
('B123ADP', 'C0001', 'Honda', 'Scoopy', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `sp_id` varchar(6) NOT NULL,
  `sp_nama` varchar(32) DEFAULT NULL,
  `sp_brand` varchar(16) DEFAULT NULL,
  `sp_harga` int(9) DEFAULT NULL,
  `sp_stok` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spservice`
--

CREATE TABLE `spservice` (
  `s_id` varchar(6) DEFAULT NULL,
  `sp_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indeks untuk tabel `dtlservice`
--
ALTER TABLE `dtlservice`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `e_id` (`e_id`),
  ADD KEY `m_noPol` (`m_noPol`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indeks untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`m_noPol`),
  ADD KEY `c_id` (`c_id`);

--
-- Indeks untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indeks untuk tabel `spservice`
--
ALTER TABLE `spservice`
  ADD KEY `s_id` (`s_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dtlservice`
--
ALTER TABLE `dtlservice`
  ADD CONSTRAINT `dtlservice_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`),
  ADD CONSTRAINT `dtlservice_ibfk_2` FOREIGN KEY (`m_noPol`) REFERENCES `motor` (`m_noPol`);

--
-- Ketidakleluasaan untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Ketidakleluasaan untuk tabel `spservice`
--
ALTER TABLE `spservice`
  ADD CONSTRAINT `spservice_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `dtlservice` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
