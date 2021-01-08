-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 02:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_insta`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpeg',
  `follower` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `email`, `password`, `nama`, `foto`, `follower`) VALUES
(1, 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Satou Kazuma', 'kazuma.jpg', 696969),
(2, 'reyhansavero720hz@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Reyhan720hz', 'reyhan.jpg', 568);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `foto_postingan` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `id_akun`, `nama`, `foto`, `text`, `foto_postingan`, `waktu`) VALUES
(1, 1, 'Satou Kazuma', 'kazuma.jpg', '3 loli boys :\'v', 'Satou_Kazuma_5ff72d70e18aa.png', '2021-01-07 15:49:04'),
(2, 2, 'Reyhan720hz', 'reyhan.jpg', 'hehe boy :\'v', 'Reyhan720hz_5ff72d9726bd1.png', '2021-01-07 15:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id_comment` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `text` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comment`
--

INSERT INTO `tb_comment` (`id_comment`, `id_post`, `id_akun`, `text`, `waktu`) VALUES
(1, 1, 2, 'give me 1 :\'v', '2021-01-07 16:01:30'),
(2, 1, 1, 'oh no boys :\'v', '2021-01-08 00:46:28'),
(3, 2, 1, 'just lucky !', '2021-01-08 00:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_like`
--

CREATE TABLE `tb_like` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_like`
--

INSERT INTO `tb_like` (`id_like`, `id_post`, `id_akun`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD PRIMARY KEY (`id_like`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_like`
--
ALTER TABLE `tb_like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
