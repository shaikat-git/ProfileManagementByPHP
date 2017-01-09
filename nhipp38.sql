-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 08:07 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhipp38`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`id`, `u_id`, `c_id`) VALUES
(7, 9, 2),
(3, 10, 3),
(6, 9, 3),
(8, 5, 4),
(9, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `sn` int(11) NOT NULL,
  `nick` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`sn`, `nick`, `fullname`) VALUES
(1, 'NHF', 'New Horizons Foundation'),
(2, 'NHIPP', 'New Horizons Internet Professional Program'),
(3, 'Java', 'Java'),
(4, 'C/C++', 'C/C++');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `Id` int(11) NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `User` text COLLATE utf8_unicode_ci NOT NULL,
  `Pass` text COLLATE utf8_unicode_ci NOT NULL,
  `Section` text COLLATE utf8_unicode_ci NOT NULL,
  `Shift` text COLLATE utf8_unicode_ci NOT NULL,
  `More` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`Id`, `Name`, `Email`, `User`, `Pass`, `Section`, `Shift`, `More`, `Image`) VALUES
(1, 'New Horizons', 'abc@def.com', 'user', '123', 'Design', 'Day', 'More Info updated', 'demo.png'),
(5, 'Mamun', 'abc@def.com', 'mamun', '123', 'Design,Development', 'Evening', 'Nothing ', '1413543321_nhipp_38.png'),
(6, 'Mr. Someone', 'mr@tareq.com', 'me', '12', 'Design,Development', 'Evening', 'Demo', '1411818060_nhipp_38.jpg'),
(9, 'Tamim', 'abc@def.com', 'ggg', 'ggg', 'Design,Development', 'Evening', 'test', 'demo.png'),
(10, 'Ana', 'ana@adsjflkaj.com', 'user2', '1232', 'Design,Development', 'Evening', 'test', 'demo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
