-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 08:12 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sal_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `food` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `empl_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `grade`, `basic`, `transport`, `food`, `mobile`, `empl_id`, `total`) VALUES
(1, 1, 100000, 4000, 5000, 1000, 4, 110000),
(2, 2, 90000, 4000, 5000, 1000, 17, 100000),
(3, 3, 80000, 4000, 5000, 1000, 18, 90000),
(4, 4, 70000, 4000, 5000, 1000, 19, 80000),
(5, 5, 60000, 4000, 5000, 1000, 32, 70000),
(6, 6, 50000, 4000, 5000, 1000, 0, 60000),
(7, 7, 40000, 4000, 5000, 1000, 0, 50000),
(8, 8, 30000, 4000, 5000, 1000, 0, 40000),
(9, 9, 20000, 4000, 5000, 1000, 0, 30000),
(10, 10, 10000, 4000, 5000, 1000, 0, 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
