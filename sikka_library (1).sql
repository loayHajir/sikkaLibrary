-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 01:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikka library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `BookName` varchar(30) NOT NULL,
  `Description` longtext NOT NULL,
  `Language` varchar(20) NOT NULL,
  `Available` tinyint(1) NOT NULL,
  `PDF` varchar(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `pageNum` int(11) NOT NULL,
  `dop` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `CatagoryNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagoryNo` int(11) NOT NULL,
  `catagoryName` varchar(30) NOT NULL,
  `catagoryImg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagoryNo`, `catagoryName`, `catagoryImg`) VALUES
(15, 'history', 'uploads/catg/374968805-hisotry.jpg'),
(17, 'arabic', 'uploads/catg/2054338438-arab-maga.jpg'),
(18, 'Life Skill', 'uploads/catg/1404568018-life-skill.jpg'),
(19, 'English', 'uploads/catg/1411360575-eng2.jpg'),
(21, 'Magazine', 'uploads/catg/2120918408-magazine.jpg'),
(24, 'Sceince', 'uploads/catg/945751106-science.jpg'),
(25, 'Design', 'uploads/catg/1427995373-design.jpg'),
(26, 'NGO&#39;s', 'uploads/catg/834902829-ngo.png'),
(27, 'Technology', 'uploads/catg/1791901676-download.jpg'),
(28, 'Law', 'uploads/catg/157790144-law1.jpg'),
(29, 'Politics ', 'uploads/catg/1730924760-politics.jpg'),
(31, 'Saida', 'uploads/catg/714023458-saida1.png'),
(33, 'Arabic Magazine', 'uploads/catg/263865121-arab-mg.jpg'),
(34, 'Dictionary', 'uploads/catg/1560107290-dic2.jpg'),
(37, 'Islam', 'uploads/catg/600537528-islamic.jpg'),
(39, 'Novel', 'uploads/catg/1773950131-novel1.jpg'),
(41, 'Comic', 'uploads/catg/1570910351-comic1.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `stdaddress` varchar(100) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `questions` varchar(50) NOT NULL,
  `answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `phoneno`, `email`, `dob`, `gender`, `Type`, `questions`, `answer`) VALUES
(1, 'loay', 'loay123', '81468412', 'loayhajir122@gmail.com', '2002-07-19', 'Male', 'Admin', '', ''),
(2, 'zeinab', 'zeinab123', '81749034', 'zeinabmiari4@gmail.com', '2002-08-20', 'female', 'user', '', ''),
(3, 'lyal', '', '81468412', 'layalk@gmail.com', '1986-03-03', 'Female', '', '', ''),
(4, 'dana', '', '81468412', 'dana@gmail.com', '2002-07-19', 'Female', NULL, 'What is your favorite color', 'black'),
(6, 'lamya', 'lamya', '81468412', 'lamay@gmail.com', '1969-12-12', 'Female', NULL, 'What is your favorite color', 'black'),
(28, 'koko', 'loay12', '12345678', 'ooisjdv@gmail.com', '2026-02-22', 'Male', NULL, 'What is your favorite color', 'sldvihj'),
(29, 'skdjnv', '123123', '12345678', 'lsdkvm@Gmail.com', '2025-02-22', 'Male', NULL, 'What is your favorite color', 'qfclask'),
(30, 'wldhjf', '123123`', '12345678', 'sjnd@gmail.com', '2030-08-23', 'Male', NULL, 'What is your favorite color', 'black');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagoryNo`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagoryNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
