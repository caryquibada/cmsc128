CREATE TABLE `payment` (
  `student_number` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Acad Prog` varchar(10) NOT NULL,
  `pdtransaction_no` varchar(50) NOT NULL,
  `pdtime_in` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pdtime_out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `pdtime_consumed` varchar(20) NOT NULL,
  `pdtag_no` varchar(2) NOT NULL,
  `type` varchar(50) NOT NULL
  `total_debt` int(50) UNSIGNED ZEROFILL,
  `total_paid` int(50) UNSIGNED ZEROFILL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
