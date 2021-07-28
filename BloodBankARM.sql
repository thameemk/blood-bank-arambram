-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2021 at 10:08 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
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
-- Database: `BloodBankARM`
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
  `verified_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `user_id`, `donated_date`, `donated_place`, `is_verified`, `verified_admin`) VALUES
(1, 1, '2021-07-08', 'A', 0, ''),
(2, 1, '2021-07-05', 'A', 1, 'thameemk612@gmail.com'),
(3, 1, '2021-07-06', 'A', 0, ''),
(4, 1, '2021-07-04', 'A', 0, ''),
(5, 1, '2021-07-10', 'B', 0, ''),
(6, 4, '2021-07-10', 'B', 1, 'thameemk612@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `oauth_provider` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
  `pin_code` int DEFAULT NULL,
  `home_address` varchar(500) NOT NULL,
  `profile_pic` varchar(5000) NOT NULL,
  `is_profile_complete` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `oauth_provider`, `oauth_user_name`, `user_type`, `status`, `name`, `email`, `password`, `gender`, `dob`, `phone`, `phone_2`, `blood_group`, `pin_code`, `home_address`, `profile_pic`, `is_profile_complete`, `is_verified`, `verified_admin`) VALUES
(1, 'facebook', 'Thameem Karakkoth', 'admin', 1, 'TEST', 'thameemk612@gmail.com', NULL, 'male', '2000-01-01', '9876543210', '', 'A+', 987654, 'NA', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=3038342243116131&height=50&width=50&ext=1627487003&hash=AeREkHGaUIQ5u-4j7fw', 1, 1, 'thameemk612@gmail.com'),
(4, '', '', 'donor', 1, 'TEST2', 'test2@test.com', NULL, 'female', '2001-01-01', '8521479630', '', 'A-', 741258, 'KL', '', 1, 1, 'thameemk612@gmail.com');

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
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
