-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 04:26 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_number` varchar(10) NOT NULL,
  `time_remaining` time NOT NULL DEFAULT '20:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_number`, `time_remaining`) VALUES
('2015', '20:00:00'),
('2015-03196', '20:00:00'),
('2015-77777', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_number` int(10) UNSIGNED ZEROFILL NOT NULL,
  `student_number` varchar(10) NOT NULL,
  `time_in` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_number`, `student_number`, `time_in`, `time_out`) VALUES
(0000000001, '2015-11111', '2018-02-05 10:55:37', '0000-00-00 00:00:00'),
(0000000002, '2015-11122', '2018-02-05 10:59:32', '0000-00-00 00:00:00'),
(0000000003, '2015-11122', '2018-02-05 10:59:37', '0000-00-00 00:00:00'),
(0000000004, '2015-03196', '2018-02-05 10:59:50', '0000-00-00 00:00:00'),
(0000000005, '2015-03196', '2018-02-05 11:09:35', '0000-00-00 00:00:00'),
(0000000006, '2015-03196', '2018-02-05 11:11:05', '0000-00-00 00:00:00'),
(0000000007, '2015-03196', '2018-02-05 11:11:12', '0000-00-00 00:00:00'),
(0000000008, '2015-77777', '2018-02-05 11:20:56', '0000-00-00 00:00:00'),
(0000000009, '2015-00000', '2018-02-05 11:21:23', '0000-00-00 00:00:00'),
(0000000010, '2015-03196', '2018-02-05 11:21:30', '0000-00-00 00:00:00'),
(0000000011, '2015-03196', '2018-02-05 11:22:34', '0000-00-00 00:00:00'),
(0000000012, '2015-03196', '2018-02-05 11:23:18', '0000-00-00 00:00:00'),
(0000000013, '2015-03196', '2018-02-05 11:23:31', '0000-00-00 00:00:00'),
(0000000014, '2015-03196', '2018-02-05 11:23:56', '0000-00-00 00:00:00'),
(0000000015, '2015-03196', '2018-02-05 11:24:59', '0000-00-00 00:00:00'),
(0000000016, '2015-03196', '2018-02-05 11:25:11', '0000-00-00 00:00:00'),
(0000000017, '2015-77777', '2018-02-05 11:25:57', '0000-00-00 00:00:00'),
(0000000018, '2015-77777', '2018-02-05 11:26:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_number` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
