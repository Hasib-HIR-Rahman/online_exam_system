-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 07:47 AM
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
-- Database: `online_exam_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Text` varchar(1000) NOT NULL,
  `Seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ID`, `Mail`, `Text`, `Seen`) VALUES
(1, '', 'Hiii', 1),
(2, 'karimrifat320@gmail.com', 'Hiii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_info`
--

CREATE TABLE `exam_info` (
  `Question_Num` int(11) NOT NULL,
  `Answer_Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_info`
--

INSERT INTO `exam_info` (`Question_Num`, `Answer_Time`) VALUES
(5, 60);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `Id` int(11) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`Id`, `Mail`, `Text`) VALUES
(1, '<?php echo karimrifat320@gmail', 'hlw'),
(2, 'karimrifat320@gmail.com', 'hlw');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Id` int(11) NOT NULL,
  `User_Name` varchar(15) NOT NULL,
  `Marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`Id`, `User_Name`, `Marks`) VALUES
(2, 'Karim Rifat', 0),
(3, 'Karim Rifat', 0),
(4, 'Faruk Ovi', 0),
(5, 'Faruk Shubho', 4),
(6, 'Sifat Karim', 0),
(10, 'Razzak Khandaka', 0),
(11, 'Rony Karim', 0);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `Id` int(11) NOT NULL,
  `Num` int(5) NOT NULL,
  `Date_Time` varchar(20) NOT NULL,
  `Score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`Id`, `Num`, `Date_Time`, `Score`) VALUES
(1, 3, '04/19/2019 02:12:43 ', 2),
(2, 3, '04/19/2019 02:29:24 ', 9),
(3, 3, '04/19/2019 02:29:24 ', 9),
(4, 5, '04/19/2019 05:50:34 ', 9),
(5, 5, '04/19/2019 05:52:14 ', 5),
(6, 5, '04/19/2019 05:55:21 ', 4),
(7, 5, '04/19/2019 05:56:37 ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Id` int(11) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Option1` varchar(50) NOT NULL,
  `Option2` varchar(50) NOT NULL,
  `Option3` varchar(50) NOT NULL,
  `Option4` varchar(50) NOT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Id`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Answer`) VALUES
(1, 'Who created The Agile Method?', 'Winston W. Royce', 'Jeff Sutherland', 'Hideo Kodama', 'Barry Boehm', '2'),
(2, 'Output: printf(\"%d\", printf(\"%s\", \"Hello world\")); the print line is given', 'Compiler error', 'Hello world', '11,Hello World', 'Error', '3'),
(3, 'In which year ALOHA protocol invented?', '1968', '1969', '1970', '1971', '3'),
(4, 'Whichof the following technique is used to cpu run faster? ', 'Overclocking', 'Hyperthreading', 'Hypertransport', 'Ram & Rom', '1'),
(5, 'How many principles are there in oop?', '4', '5', '6', '7', '1'),
(6, 'In use case diagram,\"Use Case\" is labeled by which geometric property?', 'Circle', 'Box', 'Line', 'Oval', '4'),
(7, 'How many relationships are there in db?', '2', '3', '4', '5', '2'),
(8, 'Which of these keyword does not return any value?', 'echo', 'print', 'none', 'both', '1'),
(9, 'Another name of ROM?', 'Volatile memory', 'Secondary memory', 'Non Volatile memory', 'External storage', '3'),
(10, 'Which of the following is not a Black Box Testing?', 'Functional Testing', 'Regression Testing', 'Unit Testing', 'Non_Functional Testing', '3'),
(11, '3*3=?', '3', '6', '9', '12', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Mail`, `Password`, `Age`, `Gender`) VALUES
(2, 'Karim Rifat', 'karimrifat320@gmail.com', 'liverpool@', 16, 'Male'),
(3, 'Karim Rifat', 'karimrifat320@gmail.com', '5555', 16, 'Male'),
(4, 'Faruk Ovi', 'farukovi29@gmail.com', '7777', 21, 'Male'),
(5, 'Faruk Shubho', 'fshubho23@gmail.com', '78965', 15, 'Male'),
(6, 'Sifat Karim', 'sifatkarim21@gmail.com', '$2y$10$FFLbSBMIry9OIcWthB2Fd.hOtA4628Hmdf2PATAjhU3QtP9LcWWSS', 22, 'Male'),
(10, 'Razzak Khandakar', 'rk123.rk@gmail.com', '$2y$10$haV/LmFnysnCjn5hTGcRFOERR/hVpk6gdFNSEKw33V74GwiUJspaq', 18, 'Male'),
(11, 'Osman Faruk', 'farukshubho987@gmail.com', '6666', 21, 'Male'),
(12, 'Rony karim', 'aurapvt@gmail.com', 'rony', 40, 'Male'),
(13, 'Rony Karim', 'aurapvt@gmail.com', '7777', 40, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
