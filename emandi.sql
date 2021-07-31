-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 11:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emandi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adharno` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `user_type_id` int(255) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `adharno`, `mobileno`, `password`, `address`, `city`, `zip`, `user_type_id`, `createdate`) VALUES
(1, 'Rushikesh Wakode', '1111-1111-1111', '9130830593', '123', 'Ram nagar', 'Buldana', '413001', 1, '2021-06-20 16:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `bhumi_table`
--

CREATE TABLE `bhumi_table` (
  `index_no` int(50) NOT NULL,
  `bhumino` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bhumi_table`
--

INSERT INTO `bhumi_table` (`index_no`, `bhumino`) VALUES
(1, 1234),
(2, 7845),
(3, 878),
(4, 1287),
(5, 989),
(6, 7698),
(7, 1787),
(8, 4527),
(9, 7239),
(10, 9078),
(11, 5256),
(14, 5689),
(15, 1098),
(16, 6789),
(17, 4521),
(18, 454),
(19, 8765),
(20, 437),
(21, 9812),
(22, 7561),
(23, 98),
(24, 3516),
(25, 8172),
(26, 9187),
(27, 4328),
(28, 879),
(29, 56),
(30, 139),
(31, 5472),
(32, 9273),
(33, 9873),
(34, 1234),
(35, 1234),
(36, 1234),
(37, 1234),
(38, 1234),
(39, 1234),
(40, 1234),
(41, 1234),
(42, 6272),
(43, 8282),
(44, 7383),
(45, 6392),
(46, 999),
(47, 5271),
(48, 643),
(49, 3721),
(50, 8911),
(51, 2323),
(52, 7282),
(53, 6545);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_adharno` varchar(255) NOT NULL,
  `farmer_adharno` varchar(255) NOT NULL,
  `farmername` varchar(255) NOT NULL,
  `vname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `paymentstatus` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `userdel` int(255) NOT NULL,
  `deliverystatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(255) NOT NULL,
  `bhumino` varchar(255) NOT NULL,
  `adharno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `user_type_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `uadharno` varchar(255) NOT NULL,
  `fadharno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `paymentstatus` varchar(255) NOT NULL,
  `deliverystatus` varchar(255) NOT NULL,
  `paymentdate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adharno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `mobileno` varchar(255) DEFAULT NULL,
  `zip` int(6) DEFAULT NULL,
  `user_type_id` int(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `adharno`, `password`, `address`, `city`, `mobileno`, `zip`, `user_type_id`, `status`, `createdat`) VALUES
(1, 'Rahul kapoor', '1234-1234-1234', '1', 'Ram nagar,sagwan', 'Buldana', '7245826458', 413001, 4, 'ON', '2021-06-21 23:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `vegetable`
--

CREATE TABLE `vegetable` (
  `id` int(100) NOT NULL,
  `adharno` varchar(255) NOT NULL,
  `farmername` varchar(255) NOT NULL,
  `vname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float(30,2) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `currentdate` date NOT NULL DEFAULT current_timestamp(),
  `expiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhumi_table`
--
ALTER TABLE `bhumi_table`
  ADD PRIMARY KEY (`index_no`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhumi_table`
--
ALTER TABLE `bhumi_table`
  MODIFY `index_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
