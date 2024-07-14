-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2024 at 09:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `saw_kriteria`
--

CREATE TABLE `saw_kriteria` (
  `no` int NOT NULL,
  `peringkat` float NOT NULL,
  `harga` float NOT NULL,
  `keamanan` float NOT NULL,
  `permainan` float NOT NULL,
  `fasilitas` float NOT NULL,
  `akses` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `saw_kriteria`
--

INSERT INTO `saw_kriteria` (`no`, `peringkat`, `harga`, `keamanan`, `permainan`, `fasilitas`, `akses`) VALUES
(9, 0.08, 0.08, 0.42, 0.25, 0.08, 0.08);

-- --------------------------------------------------------

--
-- Table structure for table `saw_penilaian`
--

CREATE TABLE `saw_penilaian` (
  `nama` varchar(100) NOT NULL,
  `peringkat` float NOT NULL,
  `harga` float NOT NULL,
  `keamanan` float NOT NULL,
  `permainan` float NOT NULL,
  `fasilitas` float NOT NULL,
  `akses` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `saw_penilaian`
--

INSERT INTO `saw_penilaian` (`nama`, `peringkat`, `harga`, `keamanan`, `permainan`, `fasilitas`, `akses`) VALUES
('Pantai baron', 4.5, 2, 3, 3, 4, 3),
('Pantai kukup', 4.2, 3, 3, 3, 3, 3),
('Pantai Parangtritis', 4, 4, 3, 2, 3, 4),
('tugu jogja', 4.5, 1, 3, 3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `saw_perankingan`
--

CREATE TABLE `saw_perankingan` (
  `no` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `saw_perankingan`
--

INSERT INTO `saw_perankingan` (`no`, `nama`, `nilai_akhir`) VALUES
(1, 'Pantai baron', 0.918),
(2, 'Pantai kukup', 0.879),
(3, 'Pantai Parangtritis', 0.802),
(4, 'tugu jogja', 0.97);

-- --------------------------------------------------------

--
-- Table structure for table `saw_wisata`
--

CREATE TABLE `saw_wisata` (
  `nama` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `saw_wisata`
--

INSERT INTO `saw_wisata` (`nama`, `Alamat`, `kategori`) VALUES
('Pantai baron', 'DIY', 'Pantai'),
('Pantai Cemara sewu', 'DIY', 'Pantai'),
('Pantai kukup', 'DIY', 'Pantai'),
('Pantai Parangtritis', 'DIY', 'Pantai'),
('Pantai Watu Lumbung', 'DIY', 'Pantai'),
('tugu jogja', 'DIY', 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'ria', '$2y$10$EjGxqZxHWEGCy1ndZOEJd.HP0gGhTVSM8dmpy6RPNamDonsAmcqxe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `saw_penilaian`
--
ALTER TABLE `saw_penilaian`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `saw_perankingan`
--
ALTER TABLE `saw_perankingan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `saw_wisata`
--
ALTER TABLE `saw_wisata`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saw_perankingan`
--
ALTER TABLE `saw_perankingan`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
