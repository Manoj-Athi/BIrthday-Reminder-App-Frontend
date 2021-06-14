-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2021 at 02:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birth`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Dob` varchar(10) DEFAULT NULL,
  `today` int(1) DEFAULT 0,
  `daysRemaining` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `Name`, `Dob`, `today`, `daysRemaining`) VALUES
(27, 'John', '2001-02-08', 0, 240),
(28, 'Joseph', '2001-06-11', 0, 363),
(30, 'Christian', '1996-11-29', 0, 169),
(31, 'Jacob', '2000-08-25', 0, 73),
(32, 'Dan', '2001-10-14', 0, 123),
(35, 'Arnold', '2001-06-13', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
