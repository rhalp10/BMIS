-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 01:49 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `resident_vaccinated`
--

CREATE TABLE `resident_vaccinated` (
  `vac_ID` int(11) UNSIGNED NOT NULL,
  `res_ID` int(11) UNSIGNED DEFAULT NULL,
  `vac_Date` date DEFAULT NULL,
  `vac_Date_Recorded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vac_Name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_vaccinated`
--

INSERT INTO `resident_vaccinated` (`vac_ID`, `res_ID`, `vac_Date`, `vac_Date_Recorded`, `vac_Name`) VALUES
(4, 3, '2018-03-13', '2018-03-13 01:07:08', 'dengvaxia'),
(5, 4, '2018-03-16', '2018-03-15 21:57:25', 'sad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resident_vaccinated`
--
ALTER TABLE `resident_vaccinated`
  ADD PRIMARY KEY (`vac_ID`),
  ADD KEY `res_ID` (`res_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resident_vaccinated`
--
ALTER TABLE `resident_vaccinated`
  MODIFY `vac_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
