CREATE TABLE `payment` (
  `student_number` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Acad Prog` varchar(10) NOT NULL,
  `transaction_hist` varchar(50) NOT NULL,
  `total_debt` int(50) UNSIGNED ZEROFILL,
  `total_paid` int(50) UNSIGNED ZEROFILL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;