-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2021 at 05:25 PM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donors_arm_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `archived_users`
--

CREATE TABLE `archived_users` (
  `user_id` int(11) NOT NULL,
  `oauth_provider` varchar(50) NOT NULL,
  `oauth_user_name` varchar(100) NOT NULL,
  `user_type` varchar(11) DEFAULT 'donor',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `phone_2` varchar(15) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `pin_code` int(11) DEFAULT NULL,
  `home_address` varchar(500) NOT NULL,
  `profile_pic` varchar(5000) NOT NULL,
  `is_profile_complete` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archived_users`
--

INSERT INTO `archived_users` (`user_id`, `oauth_provider`, `oauth_user_name`, `user_type`, `status`, `name`, `email`, `password`, `gender`, `dob`, `phone`, `phone_2`, `blood_group`, `pin_code`, `home_address`, `profile_pic`, `is_profile_complete`, `is_verified`, `verified_admin`) VALUES
(1, 'facebook', 'Thameem Karakkoth', 'admin', 0, 'Thameem', 'thameemk612@gmail.com', NULL, 'male', '1999-08-16', '8281582725', '', 'B+', 673571, 'Karakkoth House', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=3038342243116131&height=50&width=50&ext=1628326001&hash=AeS2tQHx26dlHiYPUAw', 1, 1, 'thameemk612@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `donated_date` date NOT NULL,
  `donated_place` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `user_id`, `donated_date`, `donated_place`, `is_verified`, `verified_admin`) VALUES
(1, 1, '2021-07-01', 'Arambram', 1, 'thameemk612@gmail.com'),
(2, 1, '2021-07-09', 'Y', 1, 'thameemk612@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_updated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `user_type` varchar(10) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_updated`, `user_type`, `user_name`, `user_email`, `user_phone`, `password`) VALUES
(1, '2021-09-05 00:00:00.000000', 'admin', 'admin', 'admin@thameem.me', '9898987878', '$2y$10$6owf1mNt4FqLibnkOaVjUeeRTN1du93V1ERnruSTyYJlWUqxDWWt6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived_users`
--
ALTER TABLE `archived_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archived_users`
--
ALTER TABLE `archived_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `archived_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
