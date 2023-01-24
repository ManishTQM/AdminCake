-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2023 at 03:25 PM
-- Server version: 8.0.31-0ubuntu0.20.04.2
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
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender` varchar(9) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `code` varchar(300) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `gender`, `created_date`, `modified_date`, `code`, `updated_time`) VALUES
(4, 'manish', 'singh', 'manishsingh19970@gmail.com', 1234567890, '$2y$10$JHp6AOPqW4BgHrnjbowlIu5saa9PpbC8ixJASdqufoLIyMU7IAYKC', 'Male', '2023-01-02 17:06:43', NULL, 'EH0WLXRM8C', NULL),
(5, 'manish', 'singh', 'Rsingh@gmail.com', 1234567890, '$2y$10$OClWoekbuHJ6v9QYP.HWCeFx6KHKpQPrYro4qelUMhh3dad1.KmOe', 'Male', '2023-01-02 17:43:45', NULL, NULL, NULL),
(7, 'manish', 'singh', 'manish@mail.com', 123456789, '123', 'Male', '2023-01-04 13:20:10', NULL, NULL, NULL),
(10, 'sdfsd', 'sdfsdf', 'Singh@gmail.com', 1234567890, 'manish123', 'male', '2023-01-16 15:10:10', NULL, NULL, NULL),
(12, 'manish', 'singh', 'manishngh@mail.com', 1234567890, '$2y$10$MLKysGp7bjdqBzIczTE1Z.c.yiLYBSgr6xNYTl88cHO4TW0ZFPLiG', 'male', '2023-01-16 09:44:33', NULL, '', NULL),
(16, 'manish', 'singh', 'ms@gmail.com', 1234567890, '$2y$10$kL8COnJHLQfEWVTWwOjEfubtLFNExKqtFe2Amhd62DIVSvJMsFvmC', 'male', '2023-01-17 09:03:18', NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
