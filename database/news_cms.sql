-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2024 at 05:52 AM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_cms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `abc` (IN `startIndex` INT, IN `recordLimit` INT)   IF(startIndex >= 0 AND recordLimit > 0) THEN
    SELECT stock_reg.itemcode, stock_reg.location, stock_reg.lotno, stock_reg.barcode, stock_reg.ShadeNo, stock_reg.minlevl, stock_reg.maxlevl, Sum(stock_reg.stkqty) AS QOH
    FROM stock_reg
    GROUP BY stock_reg.itemcode, stock_reg.location, stock_reg.lotno, stock_reg.barcode, stock_reg.ShadeNo, stock_reg.minlevl, stock_reg.maxlevl
    HAVING (((Sum(stock_reg.stkqty))<>0))
    ORDER BY stock_reg.itemcode
    LIMIT startIndex, recordLimit;
  ELSE
    SELECT stock_reg.itemcode, stock_reg.location, stock_reg.lotno, stock_reg.barcode, stock_reg.ShadeNo, stock_reg.minlevl, stock_reg.maxlevl, Sum(stock_reg.stkqty) AS QOH
    FROM stock_reg
    GROUP BY stock_reg.itemcode, stock_reg.location, stock_reg.lotno, stock_reg.barcode, stock_reg.ShadeNo, stock_reg.minlevl, stock_reg.maxlevl
    HAVING (((Sum(stock_reg.stkqty))<>0))
    ORDER BY stock_reg.itemcode;
  END IF$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `posts_count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `posts_count`) VALUES
(1, 'JAVA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int NOT NULL,
  `author` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `featured_image` text NOT NULL,
  `content` text NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(8) NOT NULL DEFAULT '12345678',
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `mobile`, `email`, `password`, `role`) VALUES
(30, 'Vikas Sir', '123', 'testuser@gmail.com', '12345678', 'user'),
(32, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(33, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(34, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(35, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(36, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(37, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(38, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(39, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(40, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(41, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(42, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(43, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(44, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(45, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(46, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(47, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(48, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(49, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(50, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(51, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(52, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(53, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(54, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(55, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(56, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(57, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(58, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(59, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(60, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(61, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(62, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(63, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(64, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(65, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(66, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(67, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(68, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(69, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(70, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(71, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(72, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(73, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(74, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(75, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(76, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(77, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(78, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(79, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(80, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(81, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(82, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(83, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(84, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(85, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(86, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(87, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(88, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(89, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(90, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(91, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(92, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(93, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(94, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(95, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(96, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(97, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(98, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(99, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(100, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(101, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(102, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(103, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(104, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(105, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(106, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(107, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(108, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(109, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(110, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(111, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(112, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(113, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(114, 'test', '123', 'testuser@gmail.com', '12345678', 'user'),
(115, '', '', '', '', ''),
(116, '', '', '', '', ''),
(117, '', '', '', '', ''),
(118, '', '', '', '', ''),
(119, 'lorem', '', '', '', ''),
(120, 'lorem', '', '', '', ''),
(121, 'lorem', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
