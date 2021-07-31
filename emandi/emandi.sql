-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2020 at 02:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_adharno`, `farmer_adharno`, `farmername`, `vname`, `image`, `price`, `quantity`, `paymentstatus`, `date`, `userdel`, `deliverystatus`) VALUES
(1, '9898-9898-9898', '8888-8888-8888', 'Anil Ramesh Bodade', 'Palak', './product_image/4033772020_04_20.jpg', 10, 3, 'YES', '2020-04-20', 0, 'YES'),
(2, '9898-9898-9898', '8888-8888-8888', 'Anil Ramesh Bodade', 'Tomato', './product_image/4337062020_04_20.jpg', 12, 2, 'YES', '2020-04-20', 0, 'YES');

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `mobileno`, `rating`, `comment`, `createdate`) VALUES
(1, 'Rushikesh wakode', '9130830593', 'good', 'It is best webapp to buy vegetables and also minimum price.', '2020-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(255) NOT NULL,
  `uadharno` varchar(255) NOT NULL,
  `fadharno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `paymentstatus` varchar(255) NOT NULL,
  `paymentdate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `uadharno`, `fadharno`, `name`, `total_price`, `address`, `city`, `zip`, `mobileno`, `paymentmode`, `paymentstatus`, `paymentdate`) VALUES
(1, '9898-9898-9898', '8888-8888-8888', 'neha pawar', 54, 'mondha', 'buldana', '443001', '9498595040', 'cash', 'YES', '2020-04-20 09:41:24.233847');

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
(1, 'Shradha Gobare', '1111-1111-1111', '1', 'Keshav Nagar', 'Buldana', '7262075638', 443001, 1, 'OFF', '2020-03-13 15:34:04'),
(2, 'Sham jagannath jadhao', '9878-7667-4768', '2', 'buldana', 'buldana', '3453245666', 443001, 3, 'ON', '2020-03-15 08:30:32'),
(5, 'Anil Ramesh Bodade', '8888-8888-8888', '123', 'Somwarpeth', 'Sinkhed', '7025124542', 443001, 3, 'ON', '2020-04-20 09:19:01'),
(6, 'neha pawar', '9898-9898-9898', '3', 'mondha', 'buldana', '9498595040', 443001, 4, 'OFF', '2020-04-20 09:38:31');

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
-- Dumping data for table `vegetable`
--

INSERT INTO `vegetable` (`id`, `adharno`, `farmername`, `vname`, `image`, `price`, `unit`, `quantity`, `currentdate`, `expiredate`) VALUES
(7, '8888-8888-8888', 'Anil Ramesh Bodade', 'Palak', './product_image/4033772020_04_20.jpg', 10.00, 'pice', 97, '2020-04-20', '2020-04-23'),
(8, '8888-8888-8888', 'Anil Ramesh Bodade', 'methi', './product_image/1217462020_04_20.jpg', 15.00, 'pice', 150, '2020-04-20', '2020-04-24'),
(9, '8888-8888-8888', 'Anil Ramesh Bodade', 'Tomato', './product_image/4337062020_04_20.jpg', 12.00, 'kg', 198, '2020-04-20', '2020-04-25'),
(10, '9878-7667-4768', 'Sham jagannath jadhao', 'carrot', './product_image/1158652020_04_20.png', 20.00, 'kg', 100, '2020-04-20', '2020-04-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
