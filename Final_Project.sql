-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2022 at 08:24 PM
-- Server version: 10.2.38-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Final_Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` text NOT NULL,
  `customer_lastname` text NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `vehicle_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_phone`, `email`, `vehicle_id`) VALUES
(1, 'Bill', 'Harmon', '6165554500', 'harmon@gmail.com', '1'),
(2, 'Sally', 'Botts', '6167489845', NULL, '2'),
(3, 'Gary', 'Fields', '7856521500', NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `tech_id` int(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `vehicle_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`tech_id`, `firstName`, `username`, `password`, `vehicle_id`) VALUES
(1, 'Don', 'don', 'tester', '1'),
(2, 'Bill', 'bill', 'cars', '3'),
(3, 'Max', 'max', 'garage', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tires`
--

CREATE TABLE `tires` (
  `tire_id` int(20) NOT NULL,
  `position` text NOT NULL,
  `tire_code` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `number_of_repairs` int(20) NOT NULL,
  `vehicle_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tires`
--

INSERT INTO `tires` (`tire_id`, `position`, `tire_code`, `name`, `date`, `number_of_repairs`, `vehicle_id`) VALUES
(1, 'FL', '210/35R1898V', 'Cooper', '07/18/2021', 1, 1),
(2, 'RR', '190/30R1842V', 'Kenda', '1/15/2022', 2, 2),
(3, 'S', '220/15R1598V', 'Cooper', '07/18/2021', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(20) NOT NULL,
  `vehicle_vin` varchar(20) NOT NULL,
  `mileage` varchar(20) NOT NULL,
  `year` int(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `make` varchar(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `tire_id` int(20) NOT NULL,
  `tech_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_vin`, `mileage`, `year`, `model`, `make`, `customer_id`, `tire_id`, `tech_id`) VALUES
(1, '55DTJ', '105000', 2020, 'Silverado', 'Chevrolet', 1, 1, 1),
(2, 'P876T', '87990', 2019, 'Ford', 'Fusion', 2, 2, 2),
(3, '98TRP', '78245', 2020, 'Ford', 'Explorer', 3, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `tires`
--
ALTER TABLE `tires`
  ADD PRIMARY KEY (`tire_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `tech_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tires`
--
ALTER TABLE `tires`
  MODIFY `tire_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
