-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 10:44 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financemodule`
--

-- --------------------------------------------------------

--
-- Table structure for table `finance_clearance_list`
--

CREATE TABLE `finance_clearance_list` (
  `clearance_id` int(11) NOT NULL,
  `clearance_form` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_clearance_list`
--

INSERT INTO `finance_clearance_list` (`clearance_id`, `clearance_form`) VALUES
(26, 'Barangay Clearance'),
(28, 'BASIC'),
(27, 'Business Permit');

-- --------------------------------------------------------

--
-- Table structure for table `finance_clearance_set`
--

CREATE TABLE `finance_clearance_set` (
  `clearance_id` int(11) NOT NULL,
  `purpose_id` int(10) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_clearance_set`
--

INSERT INTO `finance_clearance_set` (`clearance_id`, `purpose_id`, `purpose`, `price`) VALUES
(26, 6, 'Financial Assistance', 50),
(26, 7, 'Loans', 30),
(27, 8, 'Sari-sari Store', 100),
(28, 9, 'ASDFGHJKL;', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `finance_collection`
--

CREATE TABLE `finance_collection` (
  `collection_id` int(10) NOT NULL,
  `collection_date` date NOT NULL,
  `collection_particular` varchar(50) NOT NULL,
  `collection_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_collection`
--

INSERT INTO `finance_collection` (`collection_id`, `collection_date`, `collection_particular`, `collection_amount`) VALUES
(1, '2018-03-09', 'asdfghjkl', 134567),
(2, '2019-08-02', 'errshvhjnkinkjo', 5465476567),
(3, '2018-03-01', 'hgffgyytrtdfhyghj', 8767878787),
(4, '2018-03-09', 'gfgtdfgdtdyhyf', 67667678);

-- --------------------------------------------------------

--
-- Table structure for table `finance_disbursement`
--

CREATE TABLE `finance_disbursement` (
  `disbursement_id` int(10) NOT NULL,
  `disbursement_date` date NOT NULL,
  `disbursement_particular` varchar(50) NOT NULL,
  `disbursement_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_disbursement`
--

INSERT INTO `finance_disbursement` (`disbursement_id`, `disbursement_date`, `disbursement_particular`, `disbursement_amount`) VALUES
(1, '2018-03-09', 'fdxfxghchgvhj', 8787798),
(3, '2018-03-16', 'jhjgjvghf', 9809);

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_income`
--

CREATE TABLE `finance_fundoperation_income` (
  `income_id` int(11) NOT NULL,
  `income_code` int(11) NOT NULL,
  `income_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_fundoperation_income`
--

INSERT INTO `finance_fundoperation_income` (`income_id`, `income_code`, `income_type`) VALUES
(16, 123, 'Basic Community Tax'),
(17, 232, 'Private sponsor'),
(19, 678, 'Local tax');

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_incomeset`
--

CREATE TABLE `finance_fundoperation_incomeset` (
  `income_id` int(11) NOT NULL,
  `income_setid` int(11) NOT NULL,
  `income_amount` double NOT NULL,
  `income_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_mooe`
--

CREATE TABLE `finance_fundoperation_mooe` (
  `mooe_id` int(11) NOT NULL,
  `mooe_code` int(11) NOT NULL,
  `mooe_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_fundoperation_mooe`
--

INSERT INTO `finance_fundoperation_mooe` (`mooe_id`, `mooe_code`, `mooe_type`) VALUES
(7, 234, 'Travelling Expense'),
(8, 980, 'Training Expense');

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_mooeset`
--

CREATE TABLE `finance_fundoperation_mooeset` (
  `mooe_id` int(11) NOT NULL,
  `mooe_setid` int(11) NOT NULL,
  `mooe_amount` double NOT NULL,
  `mooe_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_noe`
--

CREATE TABLE `finance_fundoperation_noe` (
  `noe_id` int(11) NOT NULL,
  `noe_type` varchar(100) NOT NULL,
  `noe_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_ps`
--

CREATE TABLE `finance_fundoperation_ps` (
  `service_id` int(11) NOT NULL,
  `service_code` int(11) NOT NULL,
  `service_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_fundoperation_ps`
--

INSERT INTO `finance_fundoperation_ps` (`service_id`, `service_code`, `service_type`) VALUES
(9, 346, 'Honoraria');

-- --------------------------------------------------------

--
-- Table structure for table `finance_fundoperation_psset`
--

CREATE TABLE `finance_fundoperation_psset` (
  `service_id` int(11) NOT NULL,
  `service_setid` int(11) NOT NULL,
  `service_position` varchar(100) NOT NULL,
  `service_amount` double NOT NULL,
  `service_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finance_clearance_list`
--
ALTER TABLE `finance_clearance_list`
  ADD PRIMARY KEY (`clearance_id`),
  ADD UNIQUE KEY `clearance_form` (`clearance_form`);

--
-- Indexes for table `finance_clearance_set`
--
ALTER TABLE `finance_clearance_set`
  ADD PRIMARY KEY (`purpose_id`),
  ADD KEY `clearance_id` (`clearance_id`);

--
-- Indexes for table `finance_collection`
--
ALTER TABLE `finance_collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `finance_disbursement`
--
ALTER TABLE `finance_disbursement`
  ADD PRIMARY KEY (`disbursement_id`);

--
-- Indexes for table `finance_fundoperation_income`
--
ALTER TABLE `finance_fundoperation_income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `finance_fundoperation_incomeset`
--
ALTER TABLE `finance_fundoperation_incomeset`
  ADD PRIMARY KEY (`income_setid`),
  ADD KEY `income_id` (`income_id`);

--
-- Indexes for table `finance_fundoperation_mooe`
--
ALTER TABLE `finance_fundoperation_mooe`
  ADD PRIMARY KEY (`mooe_id`),
  ADD UNIQUE KEY `mooe_code` (`mooe_code`);

--
-- Indexes for table `finance_fundoperation_mooeset`
--
ALTER TABLE `finance_fundoperation_mooeset`
  ADD PRIMARY KEY (`mooe_setid`),
  ADD KEY `mooe_id` (`mooe_id`);

--
-- Indexes for table `finance_fundoperation_noe`
--
ALTER TABLE `finance_fundoperation_noe`
  ADD PRIMARY KEY (`noe_id`),
  ADD UNIQUE KEY `noe_code` (`noe_code`);

--
-- Indexes for table `finance_fundoperation_noeset`
--
ALTER TABLE `finance_fundoperation_noeset`
  ADD PRIMARY KEY (`noe_setid`),
  ADD KEY `noe_id` (`noe_id`);

--
-- Indexes for table `finance_fundoperation_ps`
--
ALTER TABLE `finance_fundoperation_ps`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_code` (`service_code`);

--
-- Indexes for table `finance_fundoperation_psset`
--
ALTER TABLE `finance_fundoperation_psset`
  ADD PRIMARY KEY (`service_setid`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `service_id_2` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finance_clearance_list`
--
ALTER TABLE `finance_clearance_list`
  MODIFY `clearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `finance_clearance_set`
--
ALTER TABLE `finance_clearance_set`
  MODIFY `purpose_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `finance_collection`
--
ALTER TABLE `finance_collection`
  MODIFY `collection_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `finance_disbursement`
--
ALTER TABLE `finance_disbursement`
  MODIFY `disbursement_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `finance_fundoperation_income`
--
ALTER TABLE `finance_fundoperation_income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `finance_fundoperation_incomeset`
--
ALTER TABLE `finance_fundoperation_incomeset`
  MODIFY `income_setid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `finance_fundoperation_mooe`
--
ALTER TABLE `finance_fundoperation_mooe`
  MODIFY `mooe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `finance_fundoperation_mooeset`
--
ALTER TABLE `finance_fundoperation_mooeset`
  MODIFY `mooe_setid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `finance_fundoperation_noe`
--
ALTER TABLE `finance_fundoperation_noe`
  MODIFY `noe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `finance_fundoperation_noeset`
--
ALTER TABLE `finance_fundoperation_noeset`
  MODIFY `noe_setid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `finance_fundoperation_ps`
--
ALTER TABLE `finance_fundoperation_ps`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `finance_fundoperation_psset`
--
ALTER TABLE `finance_fundoperation_psset`
  MODIFY `service_setid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `finance_clearance_set`
--
ALTER TABLE `finance_clearance_set`
  ADD CONSTRAINT `finance_clearance_set_ibfk_1` FOREIGN KEY (`clearance_id`) REFERENCES `finance_clearance_list` (`clearance_id`);

--
-- Constraints for table `finance_fundoperation_incomeset`
--
ALTER TABLE `finance_fundoperation_incomeset`
  ADD CONSTRAINT `finance_fundoperation_incomeset_ibfk_1` FOREIGN KEY (`income_id`) REFERENCES `finance_fundoperation_income` (`income_id`);

--
-- Constraints for table `finance_fundoperation_mooeset`
--
ALTER TABLE `finance_fundoperation_mooeset`
  ADD CONSTRAINT `finance_fundoperation_mooeset_ibfk_1` FOREIGN KEY (`mooe_id`) REFERENCES `finance_fundoperation_mooe` (`mooe_id`);

--
-- Constraints for table `finance_fundoperation_noeset`
--
ALTER TABLE `finance_fundoperation_noeset`
  ADD CONSTRAINT `finance_fundoperation_noeset_ibfk_1` FOREIGN KEY (`noe_id`) REFERENCES `finance_fundoperation_noe` (`noe_id`);

--
-- Constraints for table `finance_fundoperation_psset`
--
ALTER TABLE `finance_fundoperation_psset`
  ADD CONSTRAINT `finance_fundoperation_psset_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `finance_fundoperation_ps` (`service_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
