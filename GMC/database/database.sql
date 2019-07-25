-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 07:14 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `serial_no` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `c1` int(10) NOT NULL,
  `c2` int(10) NOT NULL,
  `c3` int(10) NOT NULL,
  `c4` int(10) NOT NULL,
  `c5` int(10) NOT NULL,
  `c6` int(10) NOT NULL,
  `c7` int(10) NOT NULL,
  `c8` int(10) NOT NULL,
  `c9` int(10) NOT NULL,
  `c10` int(10) NOT NULL,
  `c11` int(10) NOT NULL,
  `c12` int(10) NOT NULL,
  `q1` int(100) NOT NULL,
  `q2` int(100) NOT NULL,
  `q3` int(100) NOT NULL,
  `q4` int(100) NOT NULL,
  `q5` int(100) NOT NULL,
  `q6` int(100) NOT NULL,
  `q7` int(100) NOT NULL,
  `q8` int(100) NOT NULL,
  `q9` int(100) NOT NULL,
  `q10` int(100) NOT NULL,
  `q11` int(100) NOT NULL,
  `q12` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`serial_no`, `username`, `password`, `address`, `phone_no`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`) VALUES
(31, 's1', '123456', 'Manpur', '8603611924', 5, 0, 0, 5, 1, 0, 0, 5, 0, 0, 3, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dep_1`
--

CREATE TABLE `dep_1` (
  `serial_no` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `complaint_no` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `queue_no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dep_2`
--

CREATE TABLE `dep_2` (
  `serial_no` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `complaint_no` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `queue_no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dep_2`
--

INSERT INTO `dep_2` (`serial_no`, `username`, `complaint_no`, `status`, `queue_no`) VALUES
(52, 's1', '3', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dep_3`
--

CREATE TABLE `dep_3` (
  `serial_no` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `complaint_no` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `queue_no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dep_3`
--

INSERT INTO `dep_3` (`serial_no`, `username`, `complaint_no`, `status`, `queue_no`) VALUES
(64, 's1', '5', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `field_engineer`
--

CREATE TABLE `field_engineer` (
  `serial_no` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field_engineer`
--

INSERT INTO `field_engineer` (`serial_no`, `username`, `password`) VALUES
(1, 'engineer1', 'engineer1'),
(2, 'engineer2', 'engineer2');

-- --------------------------------------------------------

--
-- Table structure for table `free_workers`
--

CREATE TABLE `free_workers` (
  `serial_no` int(100) NOT NULL,
  `dep_no` int(10) NOT NULL,
  `no_of_free_workers` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `free_workers`
--

INSERT INTO `free_workers` (`serial_no`, `dep_no`, `no_of_free_workers`) VALUES
(1, 1, 10),
(2, 2, 10),
(3, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `supervisior`
--

CREATE TABLE `supervisior` (
  `serial_no` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisior`
--

INSERT INTO `supervisior` (`serial_no`, `username`, `password`) VALUES
(1, 'admin1', 'admin1'),
(2, 'admin2', 'admin2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `c3` (`c3`),
  ADD KEY `c3_2` (`c3`);

--
-- Indexes for table `dep_1`
--
ALTER TABLE `dep_1`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `dep_2`
--
ALTER TABLE `dep_2`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `dep_3`
--
ALTER TABLE `dep_3`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `field_engineer`
--
ALTER TABLE `field_engineer`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `free_workers`
--
ALTER TABLE `free_workers`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `supervisior`
--
ALTER TABLE `supervisior`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dep_1`
--
ALTER TABLE `dep_1`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `dep_2`
--
ALTER TABLE `dep_2`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `dep_3`
--
ALTER TABLE `dep_3`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `field_engineer`
--
ALTER TABLE `field_engineer`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `free_workers`
--
ALTER TABLE `free_workers`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisior`
--
ALTER TABLE `supervisior`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
