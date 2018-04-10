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
-- Table structure for table `inventory_drugs`
--

CREATE TABLE `inventory_drugs` (
  `drug_ID` int(11) UNSIGNED NOT NULL,
  `drug_Name` varchar(250) DEFAULT NULL,
  `unit_ID` int(11) UNSIGNED DEFAULT NULL,
  `drug_Qnty` int(11) UNSIGNED DEFAULT NULL,
  `drug_Description` varchar(250) DEFAULT NULL,
  `drug_Expiration_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_drugs`
--

INSERT INTO `inventory_drugs` (`drug_ID`, `drug_Name`, `unit_ID`, `drug_Qnty`, `drug_Description`, `drug_Expiration_Date`) VALUES
(10, 'Medicol', NULL, 1000, 'Gamot sa error', '2018-03-24'),
(11, 'Biogesic', NULL, 2000, 'sa ulo', '2018-03-11'),
(12, 'Yacapsul', NULL, 2000, 'shdaj', '2018-03-27'),
(13, 'kisspirin', NULL, 90000, 'dhasgd', '2018-03-24'),
(16, 'asd', NULL, 5000, 'gamot sa sakit', '2018-03-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_drugs`
--
ALTER TABLE `inventory_drugs`
  ADD PRIMARY KEY (`drug_ID`),
  ADD KEY `unit_ID` (`unit_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_drugs`
--
ALTER TABLE `inventory_drugs`
  MODIFY `drug_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
