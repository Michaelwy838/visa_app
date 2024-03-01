-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 08:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `givenname` varchar(50) NOT NULL,
  `passportnumber` varchar(100) NOT NULL,
  `typeofvisa` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `dateofissue` varchar(100) NOT NULL,
  `dateofexpiry` varchar(50) NOT NULL,
  `placeofissue` varchar(100) NOT NULL,
  `purposeofvisit` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `organisation` varchar(100) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `surname`, `givenname`, `passportnumber`, `typeofvisa`, `duration`, `dateofissue`, `dateofexpiry`, `placeofissue`, `purposeofvisit`, `sex`, `organisation`, `nationality`) VALUES
(23, 'kakembo', 'alex', 'k0772787', 'multiple', '3 months', '10/feb/23', '10/Nov/24', 'business union', 'work', 'male', 'pvt', 'ugandan'),
(24, 'nantambi', 'evely', 't63763272', 'multiple', '1 year', '10/feb/23', '10/Nov/24', 'business union', 'work', 'female', 'idi', 'ugandan'),
(25, 'ntambi', 'michael', 'k134242553', 'multiple', '3 year', '10/Nov/23', '10/Nov/23', 'business union', 'work', 'male', 'pvt', 'kenyan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'visa', '$2y$10$GjQMu8K6y7MsHgAR5X79De/TStkrqFt6Jn/dOWmA/SnWEmfnoiF/.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
