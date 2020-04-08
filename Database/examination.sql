-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 06:09 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fdb_id` int(10) NOT NULL,
  `fdb_subject` text,
  `fdb` text,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fdb_id`, `fdb_subject`, `fdb`, `user_id`) VALUES
(1, 'Good', 'It is Awesome', 8),
(2, 'Nice', 'It is Nice!', 6),
(3, 'Good', 'It is Good', 9);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `op_id` int(10) NOT NULL,
  `qst_id` int(10) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `op_a` varchar(100) DEFAULT NULL,
  `op_b` varchar(100) DEFAULT NULL,
  `op_c` varchar(100) DEFAULT NULL,
  `op_d` varchar(100) DEFAULT NULL,
  `op_true` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`op_id`, `qst_id`, `sub_id`, `op_a`, `op_b`, `op_c`, `op_d`, `op_true`) VALUES
(1, 1, 21, 'Islamabad', 'Karachi', 'Lahore', 'Quetta', 'Islamabad'),
(2, 2, 21, '6', '7', '4', '3', '7'),
(3, 3, 21, 'Hevana', 'Cuba', 'Hong Kong', 'Tokyo', 'Tokyo'),
(4, 4, 21, 'Vinod Khosla', '  James Gosling', 'Edward Codd', 'Dennis Ritchie', 'James Gosling'),
(5, 5, 21, 'Kolkatta', 'Delhi', 'Haiderabad', 'Mumbai', 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qst_id` int(10) NOT NULL,
  `qst_name` varchar(200) DEFAULT NULL,
  `sub_id` int(10) NOT NULL,
  `qst_status` varchar(20) DEFAULT 'Active',
  `qst_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qst_id`, `qst_name`, `sub_id`, `qst_status`, `qst_type`) VALUES
(1, 'What is Capital of Pakistan?', 21, 'Active', NULL),
(2, 'How many continents are there in the world?', 21, 'Active', NULL),
(3, 'What is capital of Japan?', 21, 'Active', NULL),
(4, 'Who developed the Java?', 20, 'Active', NULL),
(5, 'What is Capital of India?', 21, 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `user_id` int(10) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `result` varchar(200) NOT NULL,
  `exam_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `res_perc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`user_id`, `sub_id`, `result`, `exam_date`, `res_perc`) VALUES
(9, 21, 'Pass', '2018-02-26 16:59:34', 67),
(9, 21, 'Pass', '2018-02-26 17:48:14', 67),
(9, 21, 'Pass', '2018-02-26 17:52:11', 100),
(9, 21, 'Failed', '2018-02-26 17:56:22', 0),
(9, 20, 'Failed', '2018-02-26 18:15:01', 0),
(9, 20, 'Failed', '2018-02-26 18:15:39', 0),
(9, 20, 'Failed', '2018-02-26 18:16:40', 25),
(9, 21, 'Failed', '2018-02-26 18:17:44', 57),
(9, 21, 'Pass', '2018-02-26 22:05:40', 100),
(8, 21, 'Pass', '2018-02-26 22:06:48', 100);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(10) NOT NULL,
  `sub_name` varchar(256) NOT NULL,
  `sub_qst` int(10) NOT NULL,
  `sub_pass` int(10) NOT NULL,
  `sub_status` varchar(256) DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_qst`, `sub_pass`, `sub_status`) VALUES
(20, 'Java', 1, 60, 'Active'),
(21, 'General Knowledge', 10, 60, 'Active');

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
  `user_joindate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pwd`, `user_first`, `user_last`, `user_status`, `user_privilages`, `user_joindate`) VALUES
(6, 'Admin', 'admin@gmail.com', '$2y$10$vfeXFp4QINOOxmqzzqtFMu2R5drNTcOQqSKf8ZisBRn7r3BKHnhNe', 'Admin', 'Admin', 'Active', 'Admin', '2018-02-25 18:17:13'),
(8, 'Akhtar', 'a@gm.co', '$2y$10$LC67Yl3WL7BY4PebgUzhueoOg9BElzR7guAXC/bm8nnKB4/sqRjzm', 'Akhtar', 'Fida', 'Active', 'Admin', '2018-02-25 19:22:14'),
(9, 'Ali', 'ali@gmail.com', '$2y$10$LC67Yl3WL7BY4PebgUzhueoOg9BElzR7guAXC/bm8nnKB4/sqRjzm', 'Ali', 'Ali', 'Active', 'User', '2018-02-26 16:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_qst`
--

CREATE TABLE `user_qst` (
  `user_id` int(10) NOT NULL,
  `qst_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_qst`
--

INSERT INTO `user_qst` (`user_id`, `qst_id`) VALUES
(6, 1),
(6, 2),
(6, 3),
(8, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub`
--

CREATE TABLE `user_sub` (
  `user_id` int(10) NOT NULL,
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub`
--

INSERT INTO `user_sub` (`user_id`, `sub_id`) VALUES
(8, 20),
(6, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fdb_id`),
  ADD KEY `user_fk3` (`user_id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`op_id`),
  ADD KEY `qst_fk` (`qst_id`),
  ADD KEY `sub_fk2` (`sub_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qst_id`),
  ADD KEY `sub_fk` (`sub_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `user_fk4` (`user_id`),
  ADD KEY `sub_fk3` (`sub_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_qst`
--
ALTER TABLE `user_qst`
  ADD KEY `user_fk2` (`user_id`),
  ADD KEY `qst_fk1` (`qst_id`);

--
-- Indexes for table `user_sub`
--
ALTER TABLE `user_sub`
  ADD KEY `user_fk1` (`user_id`),
  ADD KEY `sub_fk1` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fdb_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `op_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qst_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `user_fk3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `qst_fk` FOREIGN KEY (`qst_id`) REFERENCES `question` (`qst_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_fk2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `sub_fk` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `sub_fk3` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_qst`
--
ALTER TABLE `user_qst`
  ADD CONSTRAINT `qst_fk1` FOREIGN KEY (`qst_id`) REFERENCES `question` (`qst_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub`
--
ALTER TABLE `user_sub`
  ADD CONSTRAINT `sub_fk1` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
