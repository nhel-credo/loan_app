-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 07:00 PM
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
(3, 'Niel.Credo', '21-04-00001', 'borrower', 0);

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
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_tbl`
--

INSERT INTO `borrower_tbl` (`id`, `ref_id`, `fname`, `mname`, `lname`, `suffix`, `dob`, `gender`, `status`, `nationality`, `contact`, `occupation`, `address`, `image`) VALUES
(9, '21-04-00001', 'niel', 'cruta', 'credo', '', '2021-03-10', 'male', 'single', 'filipino', '09107583827', 'tambay', 'address', '135384077.png');

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
(59, '9', '2104-150480', 'Notarial', 'xxxxxx', 100);

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
(25, '9', '2104-150480', 'paid-up');

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
(28, '9', '2104-150480', 'Agricultural Loans', 'Hog fattening', 'Allowance', 10000, '3', 3, 5, 'Land Title', '1602577679.png', 'released', '2021-04-15', '2021-04-15');

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
(32, 'Personal Loans', 'Allowance'),
(40, 'Business Loans', 'Small business'),
(41, 'Personal Loans', 'personal'),
(42, 'Agricultural Loans', 'Hog fattening');

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
(21, '9', '2104-150480', 'N/A', 0.010000000000218);

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
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_tbl`
--

INSERT INTO `payments_tbl` (`id`, `loan_id`, `principal`, `interest`, `penalties`, `total_payment`, `balance`, `date_created`) VALUES
(64, '2104-150480', 3333.33, 300, 0, 3633.33, 7266.67, '2021-04-15'),
(65, '2104-150480', 3333.33, 300, 0, 3500, 3633.34, '2021-04-15'),
(66, '2104-150480', 3333.33, 300, 0, 15000, 0.010000000000218, '2021-04-15');

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
(47, '9', '2104-136332', 'Niel C. Credo ', '12212121212'),
(48, '9', '2104-136332', 'Niel C. Credo ', '11111111111'),
(49, '9', '2104-132981', 'Niel C. Credo ', '11111111111'),
(50, '9', '2104-132981', 'Niel C. Credo ', '12212121212'),
(51, '9', '2104-144559', 'Niel C. Credo ', '11111111111'),
(52, '9', '2104-144559', 'Niel C. Credo ', '12212121212'),
(53, '9', '2104-150480', 'Niel C. Credo ', '11111111111'),
(54, '9', '2104-150480', 'Niel C. Credo ', '12212121212');

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
(33, 'Nhel', 'cruta', 'credo', '32344444444', 'talibon, bohol', 'ezernielcredo@yahoo.com', '123', 'Staff', '04-11-2021', '1532422500.png', 1),
(34, 'lhenz', 'cruta', 'credo', '23222222222', 'talibon, bohol', 'admin@admin.com', 'admin', 'Admin', '04-11-2021', '857688981.png', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrower_tbl`
--
ALTER TABLE `borrower_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deduction_tbl`
--
ALTER TABLE `deduction_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `is_current_loan`
--
ALTER TABLE `is_current_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `loans_tbl`
--
ALTER TABLE `loans_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `next_payment`
--
ALTER TABLE `next_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `reference_tbl`
--
ALTER TABLE `reference_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
