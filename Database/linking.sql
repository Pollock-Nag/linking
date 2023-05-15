-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 02:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linking`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(19) NOT NULL,
  `user_one` bigint(20) NOT NULL,
  `user_two` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_one`, `user_two`) VALUES
(14, 432557883698471927, 672815305),
(15, 1187230035, 672815305),
(16, 432557883698471927, 1187230035),
(17, 35290590223, 672815305),
(18, 35290590223, 1187230035),
(19, 27373030084893346, 672815305),
(20, 27373030084893346, 2759689015),
(21, 432557883698471927, 2759689015),
(22, 672815305, 2759689015);

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(19) NOT NULL,
  `user_one` bigint(20) NOT NULL,
  `user_two` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `user_one`, `user_two`, `status`) VALUES
(31, 672815305, 432557883698471927, 1),
(32, 672815305, 1187230035, 1),
(33, 672815305, 35290590223, 1),
(34, 432557883698471927, 1187230035, 2),
(35, 1187230035, 432557883698471927, 1),
(36, 1187230035, 35290590223, 1),
(37, 35290590223, 432557883698471927, 2),
(38, 27373030084893346, 672815305, 2),
(39, 672815305, 27373030084893346, 1),
(40, 672815305, 2759689015, 2),
(41, 2759689015, 27373030084893346, 1),
(42, 672815305, 2759689015, 2),
(43, 2759689015, 672815305, 1),
(44, 2759689015, 432557883698471927, 1),
(45, 672815305, 2759689015, 2),
(46, 2759689015, 672815305, 1),
(47, 672815305, 2759689015, 2),
(48, 2759689015, 672815305, 1),
(49, 432557883698471927, 27373030084893346, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(1000) NOT NULL,
  `cover_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `first_name`, `last_name`, `gender`, `email`, `password`, `url_address`, `date`, `profile_image`, `cover_image`) VALUES
(1, 432557883698471927, 'Albert', 'Einstein', 'Male', 'ae@gmail.com', '1234', 'albert.einstein', '2020-09-10 12:28:39', 'uploads/Albert Einstein1.jpg', ''),
(2, 1187230035, 'Richard', 'Feynman', 'Male', 'fman@gmail.com', '1234', 'richard.feynman', '2020-09-10 12:27:54', 'uploads/Fman.jpg', ''),
(3, 672815305, 'Pollock', 'Nag', 'Male', 'pollocknag1999@gmail.com', '1234', 'pollock.nag', '2020-09-26 05:07:00', 'uploads/anonymous.jpg', ''),
(4, 35290590223, 'Stephen', 'Hawking', 'Male', 'sth@gmail.com', '1234', 'stephen.hawking', '2020-09-10 12:29:48', 'uploads/Stephen Hawking.jpg', ''),
(5, 2759689015, 'Queen', 'Elizabeth', 'Female', 'queen@gmail.com', '1234', 'queen.elizabeth', '2020-09-10 12:35:38', 'uploads/eleizabeth.jfif', ''),
(6, 27373030084893346, 'Madam', 'Teresa', 'Female', 'mt@gmail.com', '1234', 'madam.teresa', '2020-09-12 05:03:13', 'uploads/mt.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
