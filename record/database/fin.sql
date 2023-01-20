-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 09:25 AM
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
-- Database: `fin`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_class` varchar(15) NOT NULL,
  `account_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_class`, `account_name`) VALUES
(101, 'asset', 'cash'),
(112, 'asset', 'account receivable'),
(126, 'asset', 'supplies'),
(130, 'asset', 'prepaid account'),
(157, 'asset', 'equipment'),
(158, 'asset', 'account depreciation equipment'),
(200, 'liability', 'notes payable'),
(201, 'liability', 'account payable'),
(209, 'liability', 'unearned service revenue'),
(212, 'liability', 'salaries and wages payable'),
(230, 'liability', 'interest payable'),
(301, 'equity', 'owners capital'),
(306, 'equity', 'owners drawing'),
(350, 'equity', 'income summary'),
(400, 'revenue', 'service revenue'),
(631, 'expenses', 'supply expense'),
(711, 'expenses', 'depreciation expense'),
(722, 'expenses', 'insurance expense'),
(726, 'expenses', 'salaries and wages expense'),
(729, 'expenses', 'rent expense'),
(732, 'expenses', 'utility expense'),
(905, 'expenses', 'interest expense');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `transaction_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `account_type` int(11) NOT NULL,
  `description` varchar(30) NOT NULL,
  `reference` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`transaction_id`, `date`, `account_type`, `description`, `reference`, `debit`, `credit`, `balance`) VALUES
(5, '2023-01-18', 101, '', 0, 10000, 0, 0),
(6, '2023-01-18', 301, '', 0, 0, 10000, 0),
(7, '2023-01-18', 157, '', 0, 5000, 0, 0),
(8, '2023-01-18', 200, '', 0, 0, 5000, 0),
(9, '2023-01-18', 101, '', 0, 1200, 0, 0),
(10, '2023-01-18', 209, '', 0, 0, 1200, 0),
(11, '2023-01-18', 101, '', 0, 0, 900, 0),
(12, '2023-01-18', 729, '', 0, 900, 0, 0),
(13, '2023-01-18', 130, '', 0, 600, 0, 0),
(14, '2023-01-18', 101, '', 0, 0, 600, 0),
(15, '2023-01-18', 126, '', 0, 2500, 0, 0),
(16, '2023-01-18', 201, '', 0, 0, 2500, 0),
(17, '2023-01-18', 101, '', 0, 0, 500, 0),
(18, '2023-01-18', 306, '', 0, 500, 0, 0),
(19, '2023-01-18', 101, '', 0, 0, 4000, 0),
(20, '2023-01-18', 726, '', 0, 4000, 0, 0),
(21, '2023-01-18', 400, '', 0, 0, 10000, 0),
(22, '2023-01-18', 101, '', 0, 10000, 0, 0),
(23, '2023-01-19', 631, '', 0, 1500, 0, 0),
(24, '2023-01-19', 722, '', 0, 50, 0, 0),
(25, '2023-01-19', 158, '', 0, 0, 40, 0),
(26, '2023-01-19', 711, '', 0, 40, 0, 0),
(27, '2023-01-19', 112, '', 0, 200, 0, 0),
(28, '2023-01-19', 905, '', 0, 50, 0, 0),
(29, '2023-01-19', 230, '', 0, 0, 50, 0),
(30, '2023-01-19', 212, '', 0, 0, 1200, 0),
(32, '2023-01-20', 126, '', 0, 0, 1500, 0),
(34, '2023-01-20', 130, '', 0, 0, 50, 0),
(36, '2023-01-20', 209, '', 0, 400, 0, 0),
(37, '2023-01-20', 400, '', 0, 0, 400, 0),
(38, '2023-01-20', 400, '', 0, 0, 200, 0),
(39, '2023-01-20', 726, '', 0, 1200, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tran`
--

CREATE TABLE `tran` (
  `date` date NOT NULL,
  `acc_type` int(11) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `value` int(11) NOT NULL,
  `tran_id` int(11) NOT NULL,
  `dc` int(11) NOT NULL,
  `person` varchar(22) NOT NULL,
  `acc_type_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tran`
--

INSERT INTO `tran` (`date`, `acc_type`, `reason`, `value`, `tran_id`, `dc`, `person`, `acc_type_2`) VALUES
('2023-01-13', 1, 'investment', 15000, 34, 1, 'kebede', 0),
('2023-01-13', 1, 'alx', 7000, 35, 2, 'computer', 0),
('2023-01-13', 2, 'acme supply', 1600, 38, 1, 'paper and others', 0),
('2023-01-13', 1, 'ser revenue', 1200, 39, 1, '', 4),
('2023-01-13', 2, 'ad service', 250, 40, 1, '', 5),
('2023-01-13', 1, 'ser revenue', 1500, 41, 1, '', 4),
('2023-01-13', 3, 'customer receivable', 2000, 44, 1, '', 4),
('2023-01-13', 1, 'expenses', 1700, 45, 2, 'rent,wages,utility', 5),
('2023-01-13', 1, '38 payed', 250, 46, 2, '', 2),
('2023-01-13', 1, '44 received', 600, 47, 1, '', 3),
('2023-01-13', 1, 'monthly withdraw', 1300, 48, 2, '', 0),
('2023-01-18', 1, 'investment', 10000, 49, 1, 'kebede', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `acc_type` (`account_type`);

--
-- Indexes for table `tran`
--
ALTER TABLE `tran`
  ADD PRIMARY KEY (`tran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tran`
--
ALTER TABLE `tran`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `acc_type` FOREIGN KEY (`account_type`) REFERENCES `accounts` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
