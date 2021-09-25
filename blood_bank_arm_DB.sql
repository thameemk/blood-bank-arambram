-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2021 at 01:25 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank_arm_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int NOT NULL,
  `user_id` int NOT NULL,
  `donated_date` date NOT NULL,
  `donated_place` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `user_id`, `donated_date`, `donated_place`, `is_verified`, `added_by`) VALUES
(1, 1, '2021-09-02', 'Arambram', 1, 'admin@thameem.me');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `last_updated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `user_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'donor',
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `user_phone_2` varchar(12) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(100) DEFAULT NULL,
  `pincode` varchar(6) NOT NULL,
  `added_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_updated`, `user_type`, `user_name`, `user_email`, `user_phone`, `password`, `gender`, `dob`, `user_phone_2`, `blood_group`, `is_available`, `address`, `pincode`, `added_by`) VALUES
(1, '2021-09-05 00:00:00.000000', 'admin', 'admin', 'admin@thameem.me', '9898987878', '$2y$10$6owf1mNt4FqLibnkOaVjUeeRTN1du93V1ERnruSTyYJlWUqxDWWt6', NULL, NULL, NULL, 'B+', 1, NULL, '673571', ''),
(2, '2021-09-23 18:22:01.653135', 'admin', 'Shahir ', 'shahir@api.thameem.me', '1234567890', '$2y$10$dmIq5.UGUnheREI83DZ2Jenxa/Ky/zcCZ/CpZlfZm2/DuRcIj8Hf6', 'male', '1990-12-31', '', 'A+', 1, 'Puttal House', '673571', 'admin@thameem.me');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
