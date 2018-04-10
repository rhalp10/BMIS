-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 01:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_procurement`
--

CREATE TABLE `annual_procurement` (
  `id` int(50) NOT NULL,
  `item` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ucost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `annual_procurement`
--

INSERT INTO `annual_procurement` (`id`, `item`, `description`, `ucost`, `quantity`, `unit`, `total`) VALUES
(1, 1, 'bond paper', 20, 5, 'rms', 0),
(2, 0, '1', 0, 1, '', 0),
(3, 0, '1', 0, 1, '', 0),
(4, 12, '12', 12, 12, '12', 0),
(5, 12, '12', 12, 12, '12', 0),
(6, 12, '12', 12, 12, '12', 0),
(7, 12, '12', 12, 12, '12', 0),
(8, 12, '12', 12, 12, '12', 0),
(9, 12, '12', 12, 12, '12', 0),
(10, 12, '12', 12, 12, '12', 0),
(11, 12, '12', 12, 12, '12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `annual_project`
--

CREATE TABLE `annual_project` (
  `project_id` int(11) NOT NULL,
  `aip` int(11) NOT NULL,
  `program` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `e_output` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `amount` int(20) NOT NULL,
  `status` varchar(200) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `annual_project`
--

INSERT INTO `annual_project` (`project_id`, `aip`, `program`, `department`, `start`, `end`, `e_output`, `source`, `amount`, `status`, `year`) VALUES
(3, 0, 'thesis', 'sk', '0000-00-00', '0000-00-00', 'pusuan ko to', 'Barangay Council For the Protection of Children Fund', 21232, 'On-Going', 2017),
(4, 1, 'thesi', 'barangay', '0000-00-00', '0000-00-00', 'mabuhay kayong lahat', 'Senior Citizen Persons with Disability Fund', 2312321, 'On-Going', 2017),
(30, 0, 'thesis', 'wow magic', '0000-00-00', '0000-00-00', 'yawqo na', 'Barangay Development Fund', 100000, 'On-Going', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `youth_investment`
--

CREATE TABLE `youth_investment` (
  `youth_id` int(11) NOT NULL,
  `issues` varchar(200) NOT NULL,
  `programs` varchar(200) NOT NULL,
  `result` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `source` varchar(200) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `youth_investment`
--

INSERT INTO `youth_investment` (`youth_id`, `issues`, `programs`, `result`, `amount`, `source`, `start`, `end`, `status`, `year`) VALUES
(124, '12', '12', '12', 12, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(125, '123', '123', '123', 123, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(126, '32', '32', '32', 32, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(127, '32', '32', '32', 32, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(128, '1234', '1234', '1234', 1234, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(129, '3141422', '1325614', '123546', 235463423, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(130, '3141422', '1325614', '123546', 235463423, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(131, '3141422', '1325614', '123546', 235463423, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(132, '3141422', '1325614', '123546', 235463423, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(133, '3141422', '1325614', '123546', 235463423, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(134, '1234', '1234', '1234', 1234, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(135, '1234', '1234', '1234', 1234, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(136, '1234', '1234', '1234', 1234, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(137, 'gg', '1234', '1234', 1234, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(138, '123123', '123', '123', 123, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(139, '123', '213', '123', 123, '', '0000-00-00', '0000-00-00', 'On-Going', 0000),
(140, '2312', '123', '123', 123, '', '0000-00-00', '0000-00-00', 'On-Going', 0000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_procurement`
--
ALTER TABLE `annual_procurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annual_project`
--
ALTER TABLE `annual_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `youth_investment`
--
ALTER TABLE `youth_investment`
  ADD PRIMARY KEY (`youth_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annual_procurement`
--
ALTER TABLE `annual_procurement`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `annual_project`
--
ALTER TABLE `annual_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `youth_investment`
--
ALTER TABLE `youth_investment`
  MODIFY `youth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
