-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 06:07 PM
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
-- Table structure for table `all_user`
--

CREATE TABLE `all_user` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `user_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_user`
--

INSERT INTO `all_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `user_image`, `user_role`) VALUES
(26, 'Shorna', 'shorna@gmail.com', '123456', 'Admin', '610318.jpg', 'view.edit.'),
(27, 'Tamanna', 'tamannafarabi@yahoo.com', '123456', 'Admin', '871271.jpg', '.edit.delete'),
(28, 'Ananna', 'ananna@gmail.com', '123456', 'Admin', '488585.jpg', 'view..delete'),
(29, 'Bonna', 'bonna@gmail.com', '123456', 'Admin', '720346.png', 'view.edit.delete'),
(30, 'Ema', 'ema@gmail.com', '123456', 'Admin', '263940.jpg', 'view..'),
(31, 'Rima', 'rima@gmail.com', '123456', 'Admin', '382856.png', '.edit.'),
(32, 'Sima', 'sima@gmail.com', '123456', 'Admin', '185223.jpg', '..delete'),
(33, 'Nasrin', 'nasrin@gmail.com', '123456', 'Client', '375456.png', '..'),
(34, 'Susmita', 'susmita@gmail.com', '123456', 'Admin', '866284.jpg', 'view..'),
(35, 'Sima', 'sima@yahoo.com', '123456', 'Admin', '965401.jpg', 'view.edit.delete'),
(36, 'Sima', 'sima@yahoo.com', '123456', 'Admin', '535145.jpg', 'view.edit.delete');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(50) NOT NULL,
  `sign_in` varchar(30) NOT NULL,
  `sign_out` varchar(30) NOT NULL,
  `employee_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `sign_in`, `sign_out`, `employee_id`) VALUES
(8, '1520996400', '1521039600', 32),
(9, '1521014400', '1521050400', 33),
(10, '1521000000', '1521057600', 33),
(11, '1520982000', '1521068100', 33),
(12, '1520895600', '1521068100', 33),
(13, '1520982000', '1521068100', 33);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`) VALUES
(7, 'Business'),
(34, 'IT Department'),
(35, 'HR Department'),
(36, 'Programmer'),
(37, 'Technical');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(50) NOT NULL,
  `designation_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`) VALUES
(4, 'HR'),
(5, 'IT Officer'),
(6, 'Programmer'),
(7, 'Admin'),
(8, 'IT Officer66'),
(9, 'HR'),
(11, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone_num` int(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dept_id` int(50) NOT NULL,
  `desig_id` int(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `phone_num`, `address`, `dept_id`, `desig_id`, `image`) VALUES
(23, 'Karima', 'jubedashorna@gmail.com', 1234567899, '29/A satisgh', 36, 7, '683608.jpeg'),
(31, 'Tamanna', 'shorna@gmail.com', 1234567899, '29/A satisgh', 34, 5, '905467.jpg'),
(32, 'Sumi', 'sumi@gmail.com', 1234567899, '29/A', 34, 5, '14896.jpg'),
(33, 'Nakshi', 'nakshi@gmail', 1234567899, 'Dhaka', 34, 5, '489913.png');

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
(6, 6, 50000, 4000, 5000, 1000, 33, 60000),
(7, 7, 40000, 4000, 5000, 1000, 0, 50000),
(8, 8, 30000, 4000, 5000, 1000, 0, 40000),
(9, 9, 20000, 4000, 5000, 1000, 0, 30000),
(10, 10, 10000, 4000, 5000, 1000, 0, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'Tamanna', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_user`
--
ALTER TABLE `all_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_user`
--
ALTER TABLE `all_user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
