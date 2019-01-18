-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 03:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_table`
--

CREATE TABLE `booked_table` (
  `booked_id` int(3) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `Number_of_adult` int(11) NOT NULL,
  `Number_of_teen` int(11) NOT NULL,
  `Number_of_child` int(11) NOT NULL,
  `hotel_price_id` int(3) NOT NULL,
  `individual_rate_adult` int(11) NOT NULL,
  `individual_rate_teen` int(11) NOT NULL,
  `individual_rate_child` int(11) NOT NULL,
  `admin_approve` text NOT NULL,
  `user_id` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  `hotel_id` int(3) NOT NULL,
  `approved_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked_table`
--

INSERT INTO `booked_table` (`booked_id`, `checkin_date`, `checkout_date`, `Number_of_adult`, `Number_of_teen`, `Number_of_child`, `hotel_price_id`, `individual_rate_adult`, `individual_rate_teen`, `individual_rate_child`, `admin_approve`, `user_id`, `price`, `hotel_id`, `approved_date`) VALUES
(30, '2019-01-18', '2019-01-19', 1, 3, 3, 23, 500, 450, 350, 'pending', 21, 2900, 42, '0000-00-00'),
(31, '2019-01-18', '2019-01-25', 3, 3, 5, 24, 2800, 2500, 2000, 'approved', 21, 181300, 43, '2019-01-18'),
(32, '2019-01-18', '2019-01-23', 3, 3, 5, 22, 2000, 1500, 1000, 'pending', 22, 77500, 41, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_price_table`
--

CREATE TABLE `hotel_price_table` (
  `hotel_price_id` int(3) NOT NULL,
  `adult_price` int(11) NOT NULL,
  `teen_price` int(11) NOT NULL,
  `child_price` int(11) NOT NULL,
  `hotel_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_price_table`
--

INSERT INTO `hotel_price_table` (`hotel_price_id`, `adult_price`, `teen_price`, `child_price`, `hotel_id`) VALUES
(22, 2000, 1500, 1000, 41),
(23, 500, 450, 350, 42),
(24, 2800, 2500, 2000, 43);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_table`
--

CREATE TABLE `hotel_table` (
  `hotel_id` int(3) NOT NULL,
  `hotel_name` varchar(80) NOT NULL,
  `hotel_image` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `soft_delete` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_table`
--

INSERT INTO `hotel_table` (`hotel_id`, `hotel_name`, `hotel_image`, `city`, `country`, `soft_delete`) VALUES
(41, 'Hotel1', 'upload/5c41333012ac82.92511231.jpeg', 'mumbai', 'india', 'available'),
(42, 'Hotel2', 'upload/5c413363a0a126.89802509.jpeg', 'mumbai', 'india', 'available'),
(43, 'Hotel3', 'upload/5c4133a11786e1.82148191.jpeg', 'mumbai', 'india', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `user_approve` text NOT NULL,
  `soft_delete` varchar(20) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`, `name`, `age`, `gender`, `mail`, `contact`, `user_approve`, `soft_delete`, `user_image`) VALUES
(1, 'admin', '123', 'admin', 30, 'male', 'admin@gmail.com', '7638504721', 'admin', 'available', ''),
(21, 'user', '123', 'user', 18, 'male', 'xyz@gmail.com', '9578456852', 'not_approve', '', 'upload/5c41307c0f8ba5.99431529.jpg'),
(22, 'user_0', '123', 'user_0', 15, 'male', 'xyzt@gmail.com', '9568423571', 'approved', '', 'upload/5c41310f189149.91099418.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_table`
--
ALTER TABLE `booked_table`
  ADD PRIMARY KEY (`booked_id`),
  ADD KEY `hotel_price_id` (`hotel_price_id`),
  ADD KEY `booked_table_ibfk_1` (`user_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel_price_table`
--
ALTER TABLE `hotel_price_table`
  ADD PRIMARY KEY (`hotel_price_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel_table`
--
ALTER TABLE `hotel_table`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_table`
--
ALTER TABLE `booked_table`
  MODIFY `booked_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `hotel_price_table`
--
ALTER TABLE `hotel_price_table`
  MODIFY `hotel_price_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hotel_table`
--
ALTER TABLE `hotel_table`
  MODIFY `hotel_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_table`
--
ALTER TABLE `booked_table`
  ADD CONSTRAINT `booked_table_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_table` (`hotel_id`);

--
-- Constraints for table `hotel_price_table`
--
ALTER TABLE `hotel_price_table`
  ADD CONSTRAINT `hotel_price_table_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_table` (`hotel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
