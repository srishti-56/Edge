-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2016 at 04:49 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `Options`
--

CREATE TABLE IF NOT EXISTS `Options` (
  `id` varchar(23) NOT NULL,
  `Q_id` int(100) NOT NULL,
  `T_id` int(100) NOT NULL,
  `Op_id` int(100) NOT NULL,
  `Op` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Options`
--

INSERT INTO `Options` (`id`, `Q_id`, `T_id`, `Op_id`, `Op`) VALUES
('a1', 1, 1, 1, '1'),
('a10', 3, 1, 2, '4 circuits'),
('a11', 3, 1, 3, '8 circuits'),
('a12', 3, 1, 4, '6 circuits'),
('a13', 4, 1, 1, 'AND'),
('a14', 4, 1, 2, 'NAND'),
('a15', 4, 1, 3, 'NOR'),
('a16', 4, 1, 4, 'OR'),
('a17', 5, 1, 1, 'Corners in the same row\r\n'),
('a18', 5, 1, 2, 'Corners in the same column'),
('a19', 5, 1, 3, 'Diagonal corners'),
('a2', 1, 1, 3, '4'),
('a20', 5, 1, 4, 'Overlapping combinations'),
('a21', 1, 2, 1, 'Microcontroller'),
('a22', 1, 2, 2, 'Arithmetic logic unit (ALU)'),
('a23', 1, 2, 3, 'Register Array'),
('a24', 1, 2, 4, 'Control Unit'),
('a3', 1, 1, 4, '8'),
('a4', 1, 1, 2, '2'),
('a5', 2, 1, 1, 'A = 1, B = 1, C = 0\r\n'),
('a6', 2, 1, 2, 'A = 1, B = 1, C = 1\r\n'),
('a7', 2, 1, 3, 'A = 0, B = 0, C = 0\r\n'),
('a8', 2, 1, 4, 'A = 1, B = 0, C = 1\r\n'),
('a9', 3, 1, 1, '2 circuits\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE IF NOT EXISTS `Test` (
  `Q_id` int(100) NOT NULL,
  `T_id` int(11) NOT NULL,
  `Q` varchar(250) NOT NULL,
  `A_key` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Test`
--

INSERT INTO `Test` (`Q_id`, `T_id`, `Q`, `A_key`) VALUES
(1, 1, 'How many 3-line-to-8-line decoders are required for a 1-of-32 decoder?\r\n', 3),
(1, 2, 'Which of the following is not a basic element within the microprocessor?', 1),
(2, 1, 'The output of an AND gate with three inputs, A, B, and C, is HIGH when ________.\r\n', 2),
(3, 1, 'When used with an IC, what does the term "QUAD" indicate?\r\n', 2),
(4, 1, '	\r\nIf a signal passing through a gate is inhibited by sending a LOW into one of the inputs, and the output is HIGH, the gate is a', 2),
(5, 1, 'Which of the following combinations cannot be combined into K-map groups?', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `User_id` int(11) NOT NULL,
  `Password` int(11) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Options`
--
ALTER TABLE `Options`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
 ADD PRIMARY KEY (`Q_id`,`T_id`), ADD UNIQUE KEY `Q` (`Q`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`User_id`), ADD UNIQUE KEY `User_id` (`User_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
