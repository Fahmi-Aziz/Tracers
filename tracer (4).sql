-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 05:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `kelamin` varchar(20) DEFAULT NULL,
  `ipk` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `user_id`, `nim`, `nama`, `prodi`, `email`, `telp`, `kelamin`, `ipk`) VALUES
(3, 2, '3312201098', 'mohammad fahmi azizk', 'Teknik informatika', 'Fahmiiazizz21@gmail.com', '08994085312', 'Laki-laki', '4'),
(7, 4, '22333', 'reynaldi', 'teknik perminyakan', 'reynaldi@gmnail.com', '0238123', 'Laki-laki', '4'),
(9, 16, '414122', 'Alice', 'Ti', 'alice@gmail.com', '08994085312', 'Perempuan', '3'),
(10, 17, '3312201100', 'bagas hilmi arib', 'teknik informatika', 'bagashilmiarib99@gmail.com', '082285004111', 'Laki-laki', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_alumni`
--

CREATE TABLE `kuisioner_alumni` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `tahun_lulus` varchar(10) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `usia` int(3) DEFAULT NULL,
  `kelamin` varchar(30) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `bersekolah` varchar(10) DEFAULT NULL,
  `pelatihan` varchar(100) DEFAULT NULL,
  `jenis_pelatihan` varchar(500) DEFAULT NULL,
  `ketenagakerjaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuisioner_alumni`
--

INSERT INTO `kuisioner_alumni` (`id`, `user_id`, `nama`, `nik`, `nim`, `tahun_lulus`, `prodi`, `usia`, `kelamin`, `provinsi`, `alamat`, `email`, `telp`, `bersekolah`, `pelatihan`, `jenis_pelatihan`, `ketenagakerjaan`) VALUES
(30, 4, 'reynaldi', '34232', '22333', '32', 'if', 33, 'laki-laki', 'kepri', 'okok', 'wow@gmail.com', '08994085312', 'Ya', 'Tidak', 'banyak sekali', 'bekerja, wirausaha'),
(31, 16, 'Reynaldi', '2171112812030002', '414122', '2011', 'Ti', 40, 'laki-laki', 'Okok', 'Batu aji', 'oaoaka@gmail.com', '08994085312', 'Ya', 'Ya', 'Banyak', 'bekerja, wirausaha, mencari kerja'),
(32, 17, 'bagas hilmi arib', '2171101710039003', '3312201100', '2025', 'teknik informatika', 23, 'laki-laki', 'Kepulauan riau', 'Batam', 'bagashilmiarib99@gmail.com', '082285004111', 'Tidak', 'Tidak', '.', 'wirausaha'),
(33, 2, 'mohammad fahmi aziz', '212818218218', '3312201098', '2010', 'if', 22, 'laki-laki', 'kepri', 'sdsa', 'Fahmiiazizz21@gmail.com', '08994085312', 'Ya', 'Tidak', 'fsdf', 'bekerja, wirausaha'),
(35, 37, 'mohammad fahmi aziz', '34243242', '12345', '2012', 'teknik perikanan', 22, 'laki-laki', 'keraks', 'batu ajo', 'reynaldi@gmnail.com', '0238123', 'Ya', 'Tidak', 'sadsa', 'bekerja, wirausaha');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_perusahaan`
--

CREATE TABLE `kuisioner_perusahaan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `nama_perusahaan` varchar(200) DEFAULT NULL,
  `nama_alumni` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `pertanyaan1` varchar(30) DEFAULT NULL,
  `pertanyaan2` varchar(30) DEFAULT NULL,
  `pertanyaan3` varchar(30) DEFAULT NULL,
  `pertanyaan4` varchar(30) DEFAULT NULL,
  `pertanyaan5` varchar(30) DEFAULT NULL,
  `pertanyaan6` varchar(30) DEFAULT NULL,
  `pertanyaan7` varchar(30) DEFAULT NULL,
  `pertanyaan8` varchar(30) DEFAULT NULL,
  `pertanyaan9` varchar(30) DEFAULT NULL,
  `pertanyaan10` varchar(30) DEFAULT NULL,
  `pertanyaan11` varchar(30) DEFAULT NULL,
  `pertanyaan12` varchar(30) DEFAULT NULL,
  `pertanyaan13` varchar(30) DEFAULT NULL,
  `pertanyaan14` varchar(30) DEFAULT NULL,
  `pertanyaan15` varchar(30) DEFAULT NULL,
  `pertanyaan16` varchar(30) DEFAULT NULL,
  `pertanyaan17` varchar(200) DEFAULT NULL,
  `pertanyaan18` varchar(200) DEFAULT NULL,
  `pertanyaan19` varchar(255) DEFAULT NULL,
  `pertanyaan20` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuisioner_perusahaan`
--

INSERT INTO `kuisioner_perusahaan` (`id`, `user_id`, `nama`, `jabatan`, `email`, `telp`, `nama_perusahaan`, `nama_alumni`, `posisi`, `pertanyaan1`, `pertanyaan2`, `pertanyaan3`, `pertanyaan4`, `pertanyaan5`, `pertanyaan6`, `pertanyaan7`, `pertanyaan8`, `pertanyaan9`, `pertanyaan10`, `pertanyaan11`, `pertanyaan12`, `pertanyaan13`, `pertanyaan14`, `pertanyaan15`, `pertanyaan16`, `pertanyaan17`, `pertanyaan18`, `pertanyaan19`, `pertanyaan20`) VALUES
(10, 13, 'IF2D_3312201098_Mohammad Fahmi Aziz', 'HR Manager', 'Fahmiiazizz21@gmail.com', '08994085312', 'sdas', 'Jon', 'software enginer', 'Ya', 'Baik Sekali', 'Baik', 'Baik', 'Baik', 'Baik Sekali', 'Baik', 'Baik Sekali', 'Baik', 'Baik Sekali', 'Baik', 'Baik', 'Baik Sekali', 'Baik', 'Baik', 'Baik Sekali', 'sdas', 'dffdd', 'Membangun kerjasama untuk perekrutan dengan perusahaan, Meningkatkan keterampilan calon alumni, Lainnya, dsadsa', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `user_id`, `nama`, `email`, `telp`, `alamat`) VALUES
(9, 13, 'Sanyo', 'Sanyoo@gmail.com', '08994085312', 'Batu aji');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kerja`
--

CREATE TABLE `riwayat_kerja` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `durasi` varchar(50) DEFAULT NULL,
  `pendapatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_kerja`
--

INSERT INTO `riwayat_kerja` (`id`, `user_id`, `nama_perusahaan`, `posisi`, `durasi`, `pendapatan`) VALUES
(1, 2, 'None', 'hengkeroo', '5 tahun', '40.000.000'),
(3, 4, 'Penyet', 'software enginer', '14 tahun', '1000.000.000'),
(4, 4, 'sanyo', 'hengkers', 'permanent', '40.000.0000'),
(5, 2, 'piayu corp', 'Hr', 'permanent', '1000.000.000'),
(6, 17, 'Microsoft', 'Manager projek', '2 tahun', '2*******'),
(9, 2, 'asadas', 'hengkers', '4 tahun1', '1000.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `exp_date` varchar(250) DEFAULT NULL,
  `reset_link_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`, `exp_date`, `reset_link_token`) VALUES
(2, 'fahmi', 'Fahmiiazizz21@gmail.com', '$2y$10$ZnfEZPVheNCEmzrvzaD06.F2yONn8DgwTQccL77CN835483tv9ZUK', 'alumni', NULL, NULL),
(4, 'reynaldi', 'reynaldi@gmnail.com', '$2y$10$rcPZINpA2xp50o5hZQq9oeqNpk97ZBrUHKXSUF8k2OHDydcxNS4Zu', 'alumni', '', ''),
(13, 'sanyo123', 'Sanyoo@gmail.com', '$2y$10$PKWo3wdG80uCttJ4DUgLB.Pjj5ej5ecFbfpeB9vbhfVqrrk3cLm0O', 'perusahaan', '', ''),
(16, 'alice', 'alice@gmail.com', '$2y$10$5rPVF0Nv.KiZoxVXwOaLmubc8zUfKfWx9U/93yRGMRxdmzwjY19I2', 'alumni', '', ''),
(17, 'bagas', 'bagashilmiarib99@gmail.com', '$2y$10$J8r5DkEo6MdzLKpBlP2WSOy0f3zi36W61ivngHT2Xg5FWXp/mDuIK', 'alumni', '', ''),
(22, 'tracer', '', '$2y$10$1AVwjFF76UAzkuvtaluCsOxOf5EWFRS5b2g4C5Oykpx34OqRRZxia', 'admin', '', ''),
(37, 'iwak', NULL, '$2y$10$XjDyd0si0EWOURbu3VADLOE9iiVQP/FwpAs.oU.M8vx17VoZaUQhS', 'alumni', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kuisioner_alumni`
--
ALTER TABLE `kuisioner_alumni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `kuisioner_perusahaan`
--
ALTER TABLE `kuisioner_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kuisioner_alumni`
--
ALTER TABLE `kuisioner_alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kuisioner_perusahaan`
--
ALTER TABLE `kuisioner_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `kuisioner_alumni`
--
ALTER TABLE `kuisioner_alumni`
  ADD CONSTRAINT `kuisioner_alumni_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `kuisioner_perusahaan`
--
ALTER TABLE `kuisioner_perusahaan`
  ADD CONSTRAINT `kuisioner_perusahaan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD CONSTRAINT `riwayat_kerja_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
