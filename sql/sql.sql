-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 08:17 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakib`
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
(5, 'bangla', 12, 7, 13, 0, 60),
(2, 'mid2', 4, 5, 4, 4, 40),
(3, 'final', 4, 0, 0, 0, 1),
(27, 'name', 0, 0, 0, 0, 1),
(21, 'get together', 10, 5, 3, 2, 50),
(16, 'hello', 10, 20, 5, 5, 100),
(42, 'Sk.Amir', 0, 0, 0, 0, 1);

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
  `co4` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_id`, `a_id`, `co1`, `co2`, `co3`, `co4`) VALUES
(30, '2014', 2, 0, 0, 0, 0),
(29, '2014', 5, 0, 10, 7, 0),
(28, '2017-1-60-091', 21, 0, 0, 0, 0),
(27, '2017-1-60-05', 21, 0, 0, 0, 0),
(26, '2017-1-60-091', 42, 0, 0, 0, 0),
(25, '2017-1-60-05', 42, 0, 0, 0, 0),
(24, '2017-1-60-091', 16, 0, 0, 0, 0),
(23, '2017-1-60-05', 16, 0, 0, 0, 0),
(22, '2017-1-60-091', 5, 0, 0, 4, 0),
(21, '2017-1-60-05', 5, 0, 7, 4, 0),
(20, '2017-1-60-091', 2, 0, 0, 0, 0),
(19, '2017-1-60-05', 2, 0, 0, 0, 0),
(18, '2017-1-60-091', 3, 0, 0, 0, 0),
(17, '2017-1-60-05', 3, 4, 0, 0, 0),
(31, '2014', 42, 0, 0, 0, 0),
(32, '20155 1', 2, 0, 0, 0, 0),
(33, '20155 1', 5, 0, 0, 0, 0),
(34, '2014', 3, 0, 0, 0, 0),
(35, '20155 1', 3, 0, 0, 0, 0),
(36, '2017-1-60-05', 27, 0, 0, 0, 0),
(37, '2017-1-60-091', 27, 0, 0, 0, 0),
(38, '2014', 27, 0, 0, 0, 0),
(39, '20155 1', 27, 0, 0, 0, 0),
(40, '20155 1', 42, 0, 0, 0, 0),
(41, '2014', 16, 0, 0, 0, 0),
(42, '20155 1', 16, 0, 0, 0, 0);

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
(1, 'bangladesh', '2017-1-60-05'),
(2, 'hello', '2017-1-60-091'),
(13, 'rakib', '2014'),
(14, 'hello bangla', '20155 1');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
