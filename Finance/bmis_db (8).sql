-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 03:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `finance_fundoperation_noe`
--

CREATE TABLE `finance_fundoperation_noe` (
  `noe_id` int(11) NOT NULL,
  `noe_type` varchar(100) NOT NULL,
  `noe_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_fundoperation_noe`
--

INSERT INTO `finance_fundoperation_noe` (`noe_id`, `noe_type`, `noe_code`) VALUES
(1, '20% Barangay Development Fund', 545),
(2, '10% Sangguniang Kabataan Fund', 530),
(3, '1% Senior Citizen Persons with Disability Fund', 439),
(4, '1% Barangay Council For The Protection Of Children Fund', 766),
(5, '5% Barangay Disaster Risk Reduction Management Fund', 344);

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_noeset`
--

CREATE TABLE `finance_fundoperation_noeset` (
  `noe_id` int(11) NOT NULL,
  `noe_setid` int(11) NOT NULL,
  `noe_amount` double NOT NULL,
  `noe_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finance_fundoperation_noe`
--
ALTER TABLE `finance_fundoperation_noe`
  ADD PRIMARY KEY (`noe_id`),
  ADD UNIQUE KEY `noe_code` (`noe_code`),
  ADD UNIQUE KEY `noe_type` (`noe_type`);

--
-- Indexes for table `finance_fundoperation_noeset`
--
ALTER TABLE `finance_fundoperation_noeset`
  ADD PRIMARY KEY (`noe_setid`),
  ADD KEY `noe_id` (`noe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finance_fundoperation_noe`
--
ALTER TABLE `finance_fundoperation_noe`
  MODIFY `noe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `finance_fundoperation_noeset`
--
ALTER TABLE `finance_fundoperation_noeset`
  MODIFY `noe_setid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `finance_fundoperation_noeset`
--
ALTER TABLE `finance_fundoperation_noeset`
  ADD CONSTRAINT `finance_fundoperation_noeset_ibfk_1` FOREIGN KEY (`noe_id`) REFERENCES `finance_fundoperation_noe` (`noe_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
