-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 08:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrower_account`
--

CREATE TABLE `borrower_account` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `login_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_account`
--

INSERT INTO `borrower_account` (`id`, `email`, `password`, `role`, `login_status`) VALUES
(4, 'Joana.Reyes', '21-04-000010', 'borrower', 0),
(5, 'Juan.Cruz', '21-04-000011', 'borrower', 0),
(6, 'Maria.Cruz', '21-04-000012', 'borrower', 0),
(7, 'Asd.Asd', '21-04-000013', 'borrower', 0),
(8, 'Juan.Asd', '21-04-000014', 'borrower', 0),
(9, 'EZERNIEL.CREDO', '22-12-000015', 'borrower', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrower_tbl`
--

CREATE TABLE `borrower_tbl` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(100) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `suffix` varchar(25) NOT NULL,
  `dob` varchar(55) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `occupation` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_registered` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_tbl`
--

INSERT INTO `borrower_tbl` (`id`, `ref_id`, `fname`, `mname`, `lname`, `suffix`, `dob`, `gender`, `status`, `nationality`, `contact`, `occupation`, `address`, `image`, `date_registered`) VALUES
(10, '21-04-000010', 'Joana', 'delos', 'reyes', '', '2021-04-06', 'female', 'single', 'filipino', '09107583827', 'housewife', 'address', '2044839326.jpg', ''),
(11, '21-04-000011', 'juan', 'dela', 'cruz', '', '2021-04-12', 'male', 'single', 'filipino', '09107583827', 'housewife', 'address', '1559860905.jpg', ''),
(12, '21-04-000012', 'Maria', 'delos', 'cruz', '', '2021-04-14', 'female', 'single', 'filipino', '09107583827', 'housewife', 'address', '913598289.jpg', ''),
(13, '21-04-000013', 'asd', 'delos', 'asd', '', '2021-04-06', 'male', 'single', 'as', '09107583827', 'housewife', 'address', '105602037.png', ''),
(14, '21-04-000014', 'juan', 'asdf', 'asd', '', '2021-04-15', 'female', 'single', 'asdf', '09107583827', 'asdasdf', 'address', '405811452.jpg', ''),
(15, '22-12-000015', 'EZERNIEL', 'CRUTA', 'CREDO', '', '2022-02-23', 'male', 'single', 'filip', '00000000000', 'wifey', 'PUROK 6 BALINTAWAK', '1229389796.jpg', '12-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_tbl`
--

CREATE TABLE `deduction_tbl` (
  `id` int(11) NOT NULL,
  `borrower_id` varchar(55) NOT NULL,
  `loan_id` varchar(55) NOT NULL,
  `deduction_name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deduction_tbl`
--

INSERT INTO `deduction_tbl` (`id`, `borrower_id`, `loan_id`, `deduction_name`, `reference`, `amount`) VALUES
(65, '10', '2104-203388', 'Notarial', 'xxxxxx', 100),
(66, '10', '2104-219800', 'Notarial', 'xxxxxx', 100),
(67, '10', '2104-219800', 'Service Fee', 'xxxxxx', 100);

-- --------------------------------------------------------

--
-- Table structure for table `is_current_loan`
--

CREATE TABLE `is_current_loan` (
  `id` int(11) NOT NULL,
  `borrower_id` varchar(100) NOT NULL,
  `loan_id` varchar(100) NOT NULL,
  `is_current` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_current_loan`
--

INSERT INTO `is_current_loan` (`id`, `borrower_id`, `loan_id`, `is_current`) VALUES
(38, '10', '2104-203388', 'paid-up'),
(39, '10', '2104-219800', 'current');

-- --------------------------------------------------------

--
-- Table structure for table `loans_tbl`
--

CREATE TABLE `loans_tbl` (
  `id` int(11) NOT NULL,
  `borrower_id` varchar(100) NOT NULL,
  `loan_id` varchar(100) NOT NULL,
  `loan_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `plan` varchar(255) NOT NULL,
  `interest_rate` double NOT NULL,
  `penalty_rate` double NOT NULL,
  `collateral` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `approve_status` varchar(100) NOT NULL,
  `date_approved` varchar(100) NOT NULL,
  `date_released` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans_tbl`
--

INSERT INTO `loans_tbl` (`id`, `borrower_id`, `loan_id`, `loan_type`, `description`, `purpose`, `amount`, `plan`, `interest_rate`, `penalty_rate`, `collateral`, `image`, `approve_status`, `date_approved`, `date_released`) VALUES
(34, '10', '2104-203388', 'Agricultural', 'Palay Production', 'Purchasing Fertilizer', 10000, '6', 3, 5, 'Land Title', '188257868.jpg', 'released', '2021-04-20', '2021-02-22'),
(35, '10', '2104-219800', 'Business', 'Small Enterprises', 'variety store', 10000, '6', 3, 5, 'Kabaw', '1892489368.png', 'released', '2021-04-21', '2021-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `loan_deductions`
--

CREATE TABLE `loan_deductions` (
  `id` int(11) NOT NULL,
  `deductions_name` varchar(100) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_deductions`
--

INSERT INTO `loan_deductions` (`id`, `deductions_name`, `amount`) VALUES
(6, 'Notarial', 100),
(7, 'Service Fee', 160);

-- --------------------------------------------------------

--
-- Table structure for table `loan_plan`
--

CREATE TABLE `loan_plan` (
  `id` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `interest` double NOT NULL,
  `penalty_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_plan`
--

INSERT INTO `loan_plan` (`id`, `term`, `interest`, `penalty_rate`) VALUES
(7, 1, 1, 1),
(8, 2, 2, 2),
(9, 3, 3, 3),
(10, 4, 4, 4),
(11, 5, 5, 5),
(12, 6, 6, 6),
(13, 7, 7, 7),
(14, 8, 8, 8),
(15, 9, 9, 9),
(16, 10, 10, 10),
(17, 12, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_type`
--

INSERT INTO `loan_type` (`id`, `type`, `description`) VALUES
(43, 'Business', 'Small Enterprises'),
(44, 'Business', 'Medium Enterprises'),
(45, 'Business', 'Commercial Loan'),
(46, 'Agricultural', 'Palay Production'),
(47, 'Agricultural', 'Sugarcane Production'),
(48, 'Agricultural', 'Hog Fattening'),
(49, 'Agricultural', 'Backyard Hog Raiser'),
(50, 'Agricultural', 'Aquatic Production'),
(51, 'Agricultural', 'Vegetable and Crop Production'),
(55, 'Providential', 'House Repair'),
(56, 'Providential', 'Educational'),
(57, 'Providential', 'Property Acquisition');

-- --------------------------------------------------------

--
-- Table structure for table `next_payment`
--

CREATE TABLE `next_payment` (
  `id` int(11) NOT NULL,
  `borrower_id` varchar(100) NOT NULL,
  `loan_id` varchar(100) NOT NULL,
  `next_payment` varchar(100) NOT NULL,
  `total_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `next_payment`
--

INSERT INTO `next_payment` (`id`, `borrower_id`, `loan_id`, `next_payment`, `total_balance`) VALUES
(34, '10', '2104-203388', 'N/A', -5.6700000000001),
(35, '10', '2104-219800', '2021-06-21', 8432.84);

-- --------------------------------------------------------

--
-- Table structure for table `payments_tbl`
--

CREATE TABLE `payments_tbl` (
  `id` int(11) NOT NULL,
  `loan_id` varchar(100) NOT NULL,
  `principal` double NOT NULL,
  `interest` double NOT NULL,
  `penalties` double NOT NULL,
  `total_payment` double NOT NULL,
  `balance` double NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `existing_balance` float NOT NULL,
  `existing_penalty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_tbl`
--

INSERT INTO `payments_tbl` (`id`, `loan_id`, `principal`, `interest`, `penalties`, `total_payment`, `balance`, `date_created`, `existing_balance`, `existing_penalty`) VALUES
(139, '2104-203388', 1666.67, 300, 98.33, 2065, 9833.33, '2021-04-21', 0, 0),
(140, '2104-203388', 1666.67, 300, 0, 1968, 7865.33, '2021-04-21', 0, 0),
(141, '2104-203388', 1666.67, 300, 0, 1968, 5897.33, '2021-04-21', 0, 0),
(142, '2104-203388', 1666.67, 300, 0, 1968, 3929.33, '2021-04-21', 0, 0),
(143, '2104-203388', 1666.67, 300, 0, 1968, 1961.33, '2021-04-21', 0, 0),
(144, '2104-203388', 1666.67, 300, 0, 1967, -5.6700000000001, '2021-04-21', 0, 0),
(145, '2104-219800', 1666.67, 300, 101.61, 1500, 10401.61, '2021-04-21', 0, 0),
(146, '2104-219800', 1666.67, 300, 0, 599, 10400.25, '2021-04-21', 568.28, 29.36),
(147, '2104-219800', 1666.67, 300, 0, 3936, 8432.84, '2021-04-22', 1965.31, 3.28);

-- --------------------------------------------------------

--
-- Table structure for table `reference_tbl`
--

CREATE TABLE `reference_tbl` (
  `id` int(11) NOT NULL,
  `borrower_id` varchar(255) NOT NULL,
  `loan_id` varchar(255) NOT NULL,
  `co_maker` varchar(255) NOT NULL,
  `contact` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_tbl`
--

INSERT INTO `reference_tbl` (`id`, `borrower_id`, `loan_id`, `co_maker`, `contact`) VALUES
(65, '10', '2104-203388', 'Joana D. Reyes ', '11111111111'),
(66, '10', '2104-203388', 'Juan D. Cruz ', '12212121212'),
(67, '10', '2104-219800', 'Maria D. Cruz ', '11111111111'),
(68, '10', '2104-219800', 'Juan A. Asd ', '12212121212');

-- --------------------------------------------------------

--
-- Table structure for table `unpaid_balance`
--

CREATE TABLE `unpaid_balance` (
  `id` int(11) NOT NULL,
  `loan_id` varchar(100) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `existing_balance` float NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unpaid_balance`
--

INSERT INTO `unpaid_balance` (`id`, `loan_id`, `payment_id`, `existing_balance`, `due_date`, `payment_date`) VALUES
(34, '2104-219800', 0, -0.74, '2021-05-21', '2021-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `address` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(55) NOT NULL,
  `registered_on` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `login_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `firstname`, `middlename`, `lastname`, `contact`, `address`, `email`, `password`, `role`, `registered_on`, `image`, `login_status`) VALUES
(34, 'lhenz', 'cruta', 'credo', '23222222222', 'talibon, bohol', 'admin@admin.com', 'admin', 'Admin', '04-11-2021', '857688981.png', 1),
(35, 'EZERNIEL', 'CRUTA', 'CREDO', '09655742488', 'PUROK 6 BALINTAWAK', 'ezernielcredo@gmail.com', '123', 'Admin', '12-10-2022', '810655682.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrower_account`
--
ALTER TABLE `borrower_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrower_tbl`
--
ALTER TABLE `borrower_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_tbl`
--
ALTER TABLE `deduction_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `is_current_loan`
--
ALTER TABLE `is_current_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans_tbl`
--
ALTER TABLE `loans_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_deductions`
--
ALTER TABLE `loan_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_plan`
--
ALTER TABLE `loan_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `next_payment`
--
ALTER TABLE `next_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_tbl`
--
ALTER TABLE `reference_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unpaid_balance`
--
ALTER TABLE `unpaid_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower_account`
--
ALTER TABLE `borrower_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `borrower_tbl`
--
ALTER TABLE `borrower_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deduction_tbl`
--
ALTER TABLE `deduction_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `is_current_loan`
--
ALTER TABLE `is_current_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `loans_tbl`
--
ALTER TABLE `loans_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `loan_deductions`
--
ALTER TABLE `loan_deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loan_plan`
--
ALTER TABLE `loan_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `loan_type`
--
ALTER TABLE `loan_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `next_payment`
--
ALTER TABLE `next_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `reference_tbl`
--
ALTER TABLE `reference_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `unpaid_balance`
--
ALTER TABLE `unpaid_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
