-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 02:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3
CREATE Database dbblog;
use dbblog;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateCommented` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `datePosted` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `userID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `mi` varchar(100) DEFAULT NULL,
  `userType` int(11) NOT NULL,
  `regDate` datetime NOT NULL,
  `stats` int(11) NOT NULL,
  `picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`userID`, `email`, `upass`, `lastname`, `firstname`, `mi`, `userType`, `regDate`, `stats`, `picture`) VALUES
(2, 'rafael.gellangarin@gmail.com', '123456789', 'Mendoza', 'Rafael', 'Valenzuela', 1, '2022-01-28 00:00:00', 0, 'Desktop/pic.jpg'),
(4, 'rafael.gellangarin2@gmail.com', '123456789', 'Gellangarin', 'Rafael', 'Valenzuela', 1, '2022-01-28 00:00:00', 0, 'Desktop/pic.jpg'),
(5, 'rafael.gellangarin3@gmail.com', '123456789', 'Gellangarin', 'Rafael', 'Valenzuela', 1, '2022-01-28 00:00:00', 0, 'Desktop/pic.jpg'),
(6, 'jdelacruz@gmail.com', '987654321', 'Dela Cruz', 'Juan', 'D', 2, '2023-02-04 14:56:28', 0, 'Desktop/sample.jpg'),
(7, 'mclara@gmail.com', '54321', 'Clara', 'Maria', 'M', 2, '2022-02-04 00:00:00', 1, 'Desktop/sample.jpg'),
(9, 'user101@gmail.com', '123456', 'Gellangarin', 'Rafael', 'V.', 1, '2022-02-04 00:00:00', 1, 'Desktop/sample.jpg'),
(10, 'user102@gmail.com', '1231321', 'sample', 'sample', 'sample', 1, '2023-02-04 15:46:37', 1, 'sample');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userlist` (`userID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userlist` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
