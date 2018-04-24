-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 03:14 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upblibusage`
--

-- --------------------------------------------------------

--
-- Table structure for table `vistransaction`
--

CREATE TABLE `vistransaction` (
  `transaction_number` int(10) NOT NULL,
  `tag_no` varchar(2) NOT NULL,
  `time_consumed` varchar(20) NOT NULL,
  `time_out` datetime NOT NULL,
  `time_in` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(20) NOT NULL,
  `visName` varchar(100) NOT NULL,
  `visOccu` varchar(100) NOT NULL,
  `visOrg` varchar(100) NOT NULL,
  `visAlum` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'UNPAID',
  `or_number` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vistransaction`
--

INSERT INTO `vistransaction` (`transaction_number`, `tag_no`, `time_consumed`, `time_out`, `time_in`, `type`, `visName`, `visOccu`, `visOrg`, `visAlum`, `status`, `or_number`) VALUES
(24, '05', '', '2018-04-19 20:49:07', '2018-04-19 19:32:17', 'Computer_Usage', 'numb', 'numbb', 'numbbb', 'yes', 'PAID', '123'),
(25, '01', '', '2018-04-19 20:48:54', '2018-04-19 20:43:05', 'Computer_Usage', 'Charles', 'Occu', 'Shit', 'yes', 'PAID', '123'),
(26, '01', '', '2018-04-19 20:52:31', '2018-04-19 20:52:27', 'Computer_Usage', 'Charles', 'Nikkon', 'Acoba', 'yes', 'PAID', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vistransaction`
--
ALTER TABLE `vistransaction`
  ADD PRIMARY KEY (`transaction_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vistransaction`
--
ALTER TABLE `vistransaction`
  MODIFY `transaction_number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
