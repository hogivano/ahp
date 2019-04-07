-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2019 at 05:37 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alternatif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `id_user`, `alternatif`) VALUES
(5, 1, 'Allstay Hotel Yogyakarta'),
(6, 1, 'Yellow Star Hotel Gejayan'),
(7, 1, 'Hotel Neo Malioboro'),
(8, 1, 'Airy UGM');

-- --------------------------------------------------------

--
-- Table structure for table `cek_konsistensi`
--

CREATE TABLE `cek_konsistensi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ci` double NOT NULL,
  `ri` double NOT NULL,
  `cr` double NOT NULL,
  `p` double NOT NULL,
  `cr_persen` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cek_konsistensi`
--

INSERT INTO `cek_konsistensi` (`id`, `id_user`, `ci`, `ri`, `cr`, `p`, `cr_persen`) VALUES
(1, 1, 0.11112135537435508, 1.12, 0.09921549586995988, 5, 9.92);

-- --------------------------------------------------------

--
-- Table structure for table `konsistensi_kriteria`
--

CREATE TABLE `konsistensi_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsistensi_kriteria`
--

INSERT INTO `konsistensi_kriteria` (`id`, `id_kriteria`, `nilai`) VALUES
(1, 4, 5.335164133350365),
(2, 5, 5.24349123461395),
(3, 6, 5.700140252454418),
(4, 7, 5.24349123461395),
(5, 8, 5.700140252454418);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `id_user`, `kriteria`) VALUES
(4, 1, 'Harga'),
(5, 1, 'Kualitas'),
(6, 1, 'Fasilitas'),
(7, 1, 'Lokasi'),
(8, 1, 'Trasnportasi');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(10, 5, 4, 386),
(11, 5, 5, 85),
(12, 5, 6, 8),
(13, 5, 7, 80),
(14, 5, 8, 60),
(15, 6, 4, 308),
(16, 6, 5, 86),
(17, 6, 6, 8),
(18, 6, 7, 70),
(19, 6, 8, 70),
(20, 7, 4, 566),
(21, 7, 5, 89),
(22, 7, 6, 9),
(23, 7, 7, 90),
(24, 7, 8, 80),
(25, 8, 4, 167),
(26, 8, 5, 82),
(27, 8, 6, 3),
(28, 8, 7, 50),
(29, 8, 8, 60);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria_1` int(11) NOT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id`, `id_kriteria_1`, `id_kriteria_2`, `nilai`) VALUES
(10, 4, 5, 5),
(11, 5, 4, 0.2),
(12, 4, 6, 1),
(13, 6, 4, 1),
(14, 4, 7, 1),
(15, 7, 4, 1),
(16, 4, 8, 0.2),
(17, 8, 4, 5),
(18, 5, 6, 1),
(19, 6, 5, 1),
(20, 5, 7, 0.2),
(21, 7, 5, 5),
(22, 5, 8, 0.2),
(23, 8, 5, 5),
(24, 6, 7, 0.2),
(25, 7, 6, 5),
(26, 6, 8, 0.2),
(27, 8, 6, 5),
(28, 7, 8, 1),
(29, 8, 7, 1),
(30, 4, 4, 1),
(31, 5, 5, 1),
(32, 6, 6, 1),
(33, 7, 7, 1),
(34, 8, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi_kriteria`
--

CREATE TABLE `normalisasi_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria_1` int(11) NOT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normalisasi_kriteria`
--

INSERT INTO `normalisasi_kriteria` (`id`, `id_kriteria_1`, `id_kriteria_2`, `nilai`) VALUES
(1, 4, 4, 0.12195121951219513),
(2, 5, 4, 0.02439024390243903),
(3, 6, 4, 0.12195121951219513),
(4, 7, 4, 0.12195121951219513),
(5, 8, 4, 0.6097560975609757),
(6, 4, 5, 0.29411764705882354),
(7, 5, 5, 0.058823529411764705),
(8, 6, 5, 0.058823529411764705),
(9, 7, 5, 0.29411764705882354),
(10, 8, 5, 0.29411764705882354),
(11, 4, 6, 0.07692307692307693),
(12, 5, 6, 0.07692307692307693),
(13, 6, 6, 0.07692307692307693),
(14, 7, 6, 0.38461538461538464),
(15, 8, 6, 0.38461538461538464),
(16, 4, 7, 0.29411764705882354),
(17, 5, 7, 0.05882352941176471),
(18, 6, 7, 0.05882352941176471),
(19, 7, 7, 0.29411764705882354),
(20, 8, 7, 0.29411764705882354),
(21, 4, 8, 0.07692307692307693),
(22, 5, 8, 0.07692307692307693),
(23, 6, 8, 0.07692307692307693),
(24, 7, 8, 0.3846153846153846),
(25, 8, 8, 0.3846153846153846);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan_alternatif`
--

CREATE TABLE `pembobotan_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembobotan_alternatif`
--

INSERT INTO `pembobotan_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 5, 4, 0.27049754730203224),
(2, 6, 4, 0.2158374211632796),
(3, 7, 4, 0.39663629992992294),
(4, 8, 4, 0.11702873160476523),
(5, 5, 5, 0.24853801169590642),
(6, 6, 5, 0.25146198830409355),
(7, 7, 5, 0.260233918128655),
(8, 8, 5, 0.23976608187134502),
(9, 5, 6, 0.2857142857142857),
(10, 6, 6, 0.2857142857142857),
(11, 7, 6, 0.32142857142857145),
(12, 8, 6, 0.10714285714285714),
(13, 5, 7, 0.27586206896551724),
(14, 6, 7, 0.2413793103448276),
(15, 7, 7, 0.3103448275862069),
(16, 8, 7, 0.1724137931034483),
(17, 5, 8, 0.2222222222222222),
(18, 6, 8, 0.25925925925925924),
(19, 7, 8, 0.2962962962962963),
(20, 8, 8, 0.2222222222222222);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id`, `id_alternatif`, `nilai`) VALUES
(1, 5, 0.2529890581911408),
(2, 6, 0.24808560072775035),
(3, 7, 0.3176360110158202),
(4, 8, 0.1812893300652887);

-- --------------------------------------------------------

--
-- Table structure for table `skor_normalisasi_kriteria`
--

CREATE TABLE `skor_normalisasi_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `skor` double DEFAULT NULL,
  `persen` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skor_normalisasi_kriteria`
--

INSERT INTO `skor_normalisasi_kriteria` (`id`, `id_kriteria`, `skor`, `persen`) VALUES
(1, 4, 0.1728065334951992, 17),
(2, 5, 0.05917669131442447, 6),
(3, 6, 0.07868888643637569, 8),
(4, 7, 0.2958834565721223, 30),
(5, 8, 0.3934444321818784, 39);

-- --------------------------------------------------------

--
-- Table structure for table `total_normalisasi_kriteria`
--

CREATE TABLE `total_normalisasi_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_normalisasi_kriteria`
--

INSERT INTO `total_normalisasi_kriteria` (`id`, `id_kriteria`, `nilai`) VALUES
(1, 4, 1),
(2, 5, 1),
(3, 6, 1),
(4, 7, 1),
(5, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `remember_token` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hogivano', '$2y$10$efyOYzmsEo/V0yzrfUDmaeHtXg7gJjZAwVZ7eYPh39xu2c/L4yvnO', 'U7pzvC19fjxDS2ZEp1Tf067JrDsM4afQuJhM9zYThCyEpeTjDBogbW0q6BSk', '2019-04-07 22:00:59', '2019-04-07 04:55:36'),
(2, 'admin', '$2y$10$/bTVEnkp3ng1UMhu1QukquUHF9k3/rwR8B7ZbGDPdCPovFmNbNHK2', 'fRvDuevHxM6zY8pVLoWtbROxG2HQIp8vPIrS2GcbNpgG0sNEjYrBfL6Zq73l', '2019-04-07 22:09:11', '2019-04-07 15:02:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cek_konsistensi`
--
ALTER TABLE `cek_konsistensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsistensi_kriteria`
--
ALTER TABLE `konsistensi_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_user` (`id_user`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_kriteria_1` (`id_kriteria_1`),
  ADD KEY `nilai_kriteria_2` (`id_kriteria_2`);

--
-- Indexes for table `normalisasi_kriteria`
--
ALTER TABLE `normalisasi_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `normalisasi_kriteria_1` (`id_kriteria_1`),
  ADD KEY `normalisasi_kriteria_2` (`id_kriteria_2`);

--
-- Indexes for table `pembobotan_alternatif`
--
ALTER TABLE `pembobotan_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skor_normalisasi_kriteria`
--
ALTER TABLE `skor_normalisasi_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_normalisasi_kriteria`
--
ALTER TABLE `total_normalisasi_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cek_konsistensi`
--
ALTER TABLE `cek_konsistensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `konsistensi_kriteria`
--
ALTER TABLE `konsistensi_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `normalisasi_kriteria`
--
ALTER TABLE `normalisasi_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pembobotan_alternatif`
--
ALTER TABLE `pembobotan_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `skor_normalisasi_kriteria`
--
ALTER TABLE `skor_normalisasi_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `total_normalisasi_kriteria`
--
ALTER TABLE `total_normalisasi_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_1` FOREIGN KEY (`id_kriteria_1`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_kriteria_2` FOREIGN KEY (`id_kriteria_2`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `normalisasi_kriteria`
--
ALTER TABLE `normalisasi_kriteria`
  ADD CONSTRAINT `normalisasi_kriteria_1` FOREIGN KEY (`id_kriteria_1`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `normalisasi_kriteria_2` FOREIGN KEY (`id_kriteria_2`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
