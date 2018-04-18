-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 07:35 PM
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
  `visName` varchar(100) NOT NULL,
  `visOccu` varchar(100) NOT NULL,
  `visOrg` varchar(100) NOT NULL,
  `visAlum` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'UNPAID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vistransaction`
--
ALTER TABLE `vistransaction`
  ADD PRIMARY KEY (`transaction_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
