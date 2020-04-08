-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 07:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `user_first` varchar(256) DEFAULT NULL,
  `user_last` varchar(256) DEFAULT NULL,
  `user_status` varchar(256) DEFAULT 'Active',
  `user_privilages` varchar(256) DEFAULT 'User',
  `user_joindate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pwd`, `user_first`, `user_last`, `user_status`, `user_privilages`, `user_joindate`) VALUES
(6, 'Admin', 'admin@gmail.com', '$2y$10$6qoM8FbXJ2R.tULmUIY0VuFwaIaSRo9jgzbJE8pyHHRZFhvy6FNEa', 'Admin', 'Admin', 'Active', 'Admin', '2018-02-25 18:17:13'),
(8, 'Akhtar', 'a@gm.co', '$2y$10$LC67Yl3WL7BY4PebgUzhueoOg9BElzR7guAXC/bm8nnKB4/sqRjzm', 'Akhtar', 'Fida', 'Active', 'Admin', '2018-02-25 19:22:14'),
(9, 'Ali', 'ali@gmail.com', '$2y$10$LC67Yl3WL7BY4PebgUzhueoOg9BElzR7guAXC/bm8nnKB4/sqRjzm', 'Ali', 'Ali', 'Active', 'User', '2018-02-26 16:53:25'),
(10, 'test', 'test@test.com', '12345', 'test', 'test', 'Active', 'Admin', '2020-04-08 09:58:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
