-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2016 at 05:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `copg`
--

CREATE TABLE `copg` (
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copg`
--

INSERT INTO `copg` (`firstname`, `surname`, `id`, `username`, `password`) VALUES
('RAKESH ', 'SHARMA', '11003', '11003', '12345'),
('RACHIT ', 'GARG', '11004', '11004', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `current_order`
--

CREATE TABLE `current_order` (
  `mat_code` varchar(10) NOT NULL,
  `mat_desc` varchar(100) NOT NULL,
  `mat_price` decimal(11,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `customer_code` int(6) NOT NULL,
  `customer_ref_no` int(40) NOT NULL,
  `cust_name` varchar(40) NOT NULL,
  `cust_add1` varchar(40) NOT NULL,
  `cust_add2` varchar(40) NOT NULL,
  `cust_add3` varchar(40) NOT NULL,
  `cust_pincode` varchar(10) NOT NULL,
  `cust_city` varchar(15) NOT NULL,
  `contact_person_name` varchar(30) NOT NULL,
  `contact_person_number` varchar(20) NOT NULL,
  `state_code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`customer_code`, `customer_ref_no`, `cust_name`, `cust_add1`, `cust_add2`, `cust_add3`, `cust_pincode`, `cust_city`, `contact_person_name`, `contact_person_number`, `state_code`) VALUES
(123456, 12345, 'Ramesh Kumar', '22', 'Madan Park', 'East Punjabi Bgh', '110026', 'DELHI', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown`
--

CREATE TABLE `dropdown` (
  `id` int(10) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropdown`
--

INSERT INTO `dropdown` (`id`, `sid`, `sname`, `age`) VALUES
(1, 's001', 'raj', 25),
(2, 's002', 'rahul', 26),
(3, 's003', 'raju', 27),
(4, 's004', 'rajesh', 28);

-- --------------------------------------------------------

--
-- Table structure for table `material_master`
--

CREATE TABLE `material_master` (
  `id` int(2) NOT NULL,
  `mat_code` varchar(10) NOT NULL,
  `mat_desc` varchar(100) NOT NULL,
  `ship_plant` varchar(4) NOT NULL,
  `mat_price` decimal(11,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_master`
--

INSERT INTO `material_master` (`id`, `mat_code`, `mat_desc`, `ship_plant`, `mat_price`) VALUES
(1, 'COMP001', 'Computer – Pentium IV', 'PMP', '5000.0000'),
(2, 'COMP002', 'Computer – Core i3', 'PMP1', '8000.0000');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_no` varchar(20) NOT NULL,
  `mat_code` varchar(10) NOT NULL,
  `item_qty` int(6) NOT NULL,
  `item_value` decimal(11,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_header`
--

CREATE TABLE `order_header` (
  `order_no` varchar(20) NOT NULL,
  `order_create_date` date NOT NULL,
  `order_status` varchar(4) NOT NULL DEFAULT 'BLOC',
  `customer_ref_no` int(40) NOT NULL,
  `customer_ref_date` varchar(15) NOT NULL,
  `order_value` decimal(11,0) NOT NULL,
  `customer_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`order_no`, `order_create_date`, `order_status`, `customer_ref_no`, `customer_ref_date`, `order_value`, `customer_code`) VALUES
('0', '0000-00-00', 'BLOC', 12345, '2016-01-12', '0', 123456),
('20160612A4A8', '0000-00-00', 'BLOC', 0, '', '0', 0),
('20160612172F', '0000-00-00', 'BLOC', 0, '', '0', 0),
('20160612FF92', '0000-00-00', 'BLOC', 0, '', '0', 0),
('2016061217C3', '0000-00-00', 'BLOC', 0, '', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status` varchar(4) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status_tracking`
--

CREATE TABLE `order_status_tracking` (
  `order_no` varchar(20) NOT NULL,
  `order_status` varchar(4) NOT NULL,
  `order_create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plant_master`
--

CREATE TABLE `plant_master` (
  `plant_code` varchar(4) NOT NULL,
  `plant_name` varchar(40) NOT NULL,
  `plant_add1` varchar(40) NOT NULL,
  `plant_add2` varchar(40) NOT NULL,
  `plant_add3` varchar(40) NOT NULL,
  `plant_city` varchar(15) NOT NULL,
  `plant_pin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

CREATE TABLE `stock_master` (
  `material_code` varchar(10) NOT NULL,
  `plant_code` varchar(4) NOT NULL,
  `stock_qty` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dropdown`
--
ALTER TABLE `dropdown`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dropdown`
--
ALTER TABLE `dropdown`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
