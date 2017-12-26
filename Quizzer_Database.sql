-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 07:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `question_type` varchar(11) NOT NULL,
  `option1` varchar(30) NOT NULL,
  `option2` varchar(30) NOT NULL,
  `option3` varchar(30) NOT NULL,
  `option4` varchar(30) NOT NULL,
  `expected_answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`quiz_id`, `question_id`, `question`, `question_type`, `option1`, `option2`, `option3`, `option4`, `expected_answer`) VALUES
(8, 13, 'First question', 'MCQ', 'abc', 'edf', 'ghi', 'jkl', 'this is answer'),
(8, 14, 'second question', 'True/False', 'True', 'False', '', '', 'True'),
(8, 15, '2 2', 'Numeric', '', '', '', '', '4'),
(1, 16, 'What is Advance Programming?', 'MCQ', 'Joke', 'Magic', 'Life', 'IDK', 'IDK');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `title`, `description`) VALUES
(1, 'Socket Programming', 'All topics are included that we read in socket programming.'),
(2, 'Convolutional Neural Networks', 'Famous CNN models are also included i.e. VGGNet, GoogleNet and Resnet.'),
(3, 'Agile Development', 'Quiz is just MCQs based so be prepared.'),
(4, 'Advance Programming ', 'All the topics we have studied up til now will be included'),
(5, 'Operating System', 'Quiz will be from topics: File systems, distributed computing and scheduling algorithms'),
(6, 'Reliable Data Transfer', 'Reliable Data Transfer (All versions included i.e. from rdt 1.0 - 3.0'),
(8, 'New quiz', 'this'),
(10, 'asdasd', 'asdads');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `type` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `type`, `email`, `password`) VALUES
('asad', 'student', 'asad@gmail.com', 'ali'),
('baou', 'instructor', 'usman@gmail.com', 'usman'),
('sehar', 'Student', 'sehar@mail.com', 'sehar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question_id` (`question_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
