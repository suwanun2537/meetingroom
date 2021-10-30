-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2021 at 03:39 AM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s013_roommeeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `id_mem` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `id_mem`, `username`, `password`) VALUES
(2, '1749900397798', 'user', 'user'),
(3, '1749900397799', 'admin', 'admin'),
(4, '1749900397797', 'test', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `gro`
--

CREATE TABLE `gro` (
  `id_gro` int(4) NOT NULL,
  `name_gro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gro`
--

INSERT INTO `gro` (`id_gro`, `name_gro`) VALUES
(1, 'กลุ่มงานกำกับและบริหารการเงินการคลัง'),
(2, 'กลุ่มงานกำกับและบริหารระบบการคลัง'),
(3, 'กลุ่มงานบริหารการคลังและเศรษฐกิจ'),
(4, 'ฝ่ายบริหารทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `meet`
--

CREATE TABLE `meet` (
  `id_met` int(13) NOT NULL,
  `name_met` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_met` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_met` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_room` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meet`
--

INSERT INTO `meet` (`id_met`, `name_met`, `date`, `time`, `details_met`, `num_met`, `id_room`, `status`) VALUES
(1, 'admin', '2021-10-04', '08.30-12.00', 'ประชุมทางไกล', '5', '1', '1'),
(2, 'user', '2021-10-06', '13.00-16.30', 'เงินเหลือจ่าย', '8', '2', '1'),
(3, 'test', '2021-10-09', '13.00-16.30', 'ประชุมทางไกล', '5', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_mem` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_mem` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname_mem` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_mem` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_mem` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_mem` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_mem` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gro` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_mem`, `pre_mem`, `fname_mem`, `lname_mem`, `tel_mem`, `email_mem`, `line_mem`, `id_gro`) VALUES
('1749900397797', 'นาย', 'วุฒิวงศ์', 'เอียดศรีชายน', '0936439905', 'tang@gmail.com', 'tang2', '4'),
('1749900397798', 'นาง', 'นิสา', 'จันทา', '0848421439', 'tang@gmail.com', 'Sasar', '3'),
('1749900397799', 'นางสาว', 'สุวะนันท์', 'มงคล', '0936439909', 'tang@gmail.com', 'tang', '4');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(4) NOT NULL,
  `name_room` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `name_room`) VALUES
(1, 'ห้องตาปู'),
(2, 'ห้องเขาช้าง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gro`
--
ALTER TABLE `gro`
  ADD PRIMARY KEY (`id_gro`);

--
-- Indexes for table `meet`
--
ALTER TABLE `meet`
  ADD PRIMARY KEY (`id_met`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_mem`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gro`
--
ALTER TABLE `gro`
  MODIFY `id_gro` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meet`
--
ALTER TABLE `meet`
  MODIFY `id_met` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
