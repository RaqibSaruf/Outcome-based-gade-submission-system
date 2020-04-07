-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 09:25 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grade_submission`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `co1` double NOT NULL DEFAULT '0',
  `co2` double NOT NULL DEFAULT '0',
  `co3` double NOT NULL DEFAULT '0',
  `co4` double NOT NULL DEFAULT '0',
  `exam_in_taken` double NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `name`, `co1`, `co2`, `co3`, `co4`, `exam_in_taken`) VALUES
(75, 'class participation', 0, 0, 0, 10, 10),
(2, 'mid2', 4, 8, 4, 4, 40),
(3, 'final', 5, 10, 10, 0, 50),
(48, 'mid1', 2, 7, 3, 3, 30),
(71, 'Quiz', 10, 0, 0, 0, 10),
(70, 'Lab', 10, 10, 0, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `student_id` text NOT NULL,
  `a_id` int(11) NOT NULL,
  `co1` double NOT NULL,
  `co2` double NOT NULL,
  `co3` double NOT NULL,
  `co4` double NOT NULL,
  `presence` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_id`, `a_id`, `co1`, `co2`, `co3`, `co4`, `presence`) VALUES
(49, '2017-1-60-091', 2, 7, 15, 7, 8, 'p'),
(50, '2017-1-60-123', 2, 4, 12, 7, 4, 'p'),
(51, '2016-1-60-001', 2, 8, 11, 6, 8, 'p'),
(52, '2017-1-60-091', 3, 6, 19, 15, 0, 'p'),
(53, '2017-1-60-123', 3, 4, 18, 16, 0, 'p'),
(54, '2016-1-60-001', 3, 8, 17, 17, 0, 'p'),
(55, '2017-1-60-091', 48, 3, 10, 5, 5, 'p'),
(56, '2017-1-60-123', 48, 4, 12, 5, 6, 'p'),
(57, '2016-1-60-001', 48, 4, 11, 6, 4, 'p'),
(75, '2017-1-60-091', 75, 0, 0, 0, 8, 'p'),
(74, '2016-1-60-001', 75, 0, 0, 0, 8, 'p'),
(61, '2016-1-60-001', 71, 10, 0, 0, 0, 'p'),
(62, '2017-1-60-091', 71, 9, 0, 0, 0, 'p'),
(63, '2017-1-60-123', 71, 8, 0, 0, 0, 'p'),
(65, '2016-1-60-001', 70, 7, 9, 0, 0, 'p'),
(66, '2017-1-60-091', 70, 8, 7, 0, 0, 'p'),
(67, '2017-1-60-123', 70, 8, 8, 0, 0, 'p'),
(76, '2017-1-60-123', 75, 0, 0, 0, 9, 'p'),
(77, '2015-1-60-02', 75, 0, 0, 0, 6, 'p'),
(78, '2015-1-60-02', 3, 8, 18, 16, 0, 'p'),
(79, '2015-1-60-02', 70, 8, 7, 0, 0, 'p'),
(80, '2015-1-60-02', 48, 3, 11, 4, 6, 'p'),
(81, '2015-1-60-02', 2, 7, 15, 4, 6, 'p'),
(82, '2015-1-60-02', 71, 9, 0, 0, 0, 'p'),
(83, '2019-1-60-111', 75, 0, 0, 0, 8, 'p'),
(84, '2019-1-60-111', 3, 0, 0, 0, 0, 'a'),
(85, '2019-1-60-111', 70, 0, 0, 0, 0, 'a'),
(86, '2019-1-60-111', 48, 0, 0, 0, 0, 'a'),
(87, '2019-1-60-111', 2, 0, 0, 0, 0, 'a'),
(88, '2019-1-60-111', 71, 0, 0, 0, 0, 'a'),
(89, '123', 3, 0, 0, 0, 0, 'p');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `student_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `student_id`) VALUES
(2, 'hello', '2017-1-60-091'),
(15, 'test', '2017-1-60-123'),
(141, 'fghjhk', '2015-1-60-02'),
(142, 'test2', '2019-1-60-111'),
(98, 'abcd', '2016-1-60-001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`) VALUES
('abcd', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`(10));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
