-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 04:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinventory`
--

CREATE TABLE `bookinventory` (
  `bookinventory_id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookinventory`
--

INSERT INTO `bookinventory` (`bookinventory_id`, `bookid`, `stock`, `totalprice`) VALUES
(1, 1, 10, 500),
(2, 2, 18, 360),
(3, 3, 14, 700),
(4, 4, 5, 100),
(5, 5, 3, 90);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `publishdate` date DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `coverimage` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `edition` varchar(50) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `booktitle`, `publishdate`, `price`, `description`, `coverimage`, `author`, `publisher`, `edition`, `category`) VALUES
(1, 'Javascript the definitive guide', '2020-03-01', '40.00', 'Since 1996, JavaScript: The Definitive Guide has been the bible for JavaScript programmers—a programmer\'s guide and comprehensive reference to the core language.\r\nThe 6th edition covers HTML5 and ECMAScript 5. Many chapters have been completely rewritten to bring them in line with today\'s best web development practices. It\'s recommended for experienced program', 'javascript.jpg', 'David Flanagan ', 'O\'Reilly Media, Inc.', '4th', 'Study, Computer programming.'),
(2, 'Java for Beginners Guide', '2022-02-18', '20.00', 'Java: The Definitive Guide has been the bible for JavaScript programmers—a programmer\\\'s guide and comprehensive reference to the core language.\\r\\nThe 6th edition covers HTML5 and ECMAScript 5. Many chapters have been completely rewritten to bring them in line with today\\\'s best web development practices. It\\\'s recommended for experienced program', 'java.jpg', 'Josh Thompsons', 'O\'Reilly Media, Inc.', '1st', 'Study, Computer programming.'),
(3, 'The Monk Who sold his Ferrari', '2020-12-18', '50.00', 'The Monk Who Sold His Ferrari is a self-help classic telling the story of fictional lawyer Julian Mantle, who sold his mansion and Ferrari to study the seven virtues of the Sages of Sivana in the Himalayan mountains.', 'Themonk.jpg', 'Robbin Sharma', 'Packt Publishing', '2nd', 'Motivational'),
(4, 'Rich Dad Poor Dad', '2021-04-01', '20.00', 'Rich Dad Poor Dad is about Robert Kiyosaki and his two dads—his real father (poor dad) and the father of his best friend (rich dad)—and the ways in which both men shaped his thoughts about money and investing. He says that his poor dad went to Stanford and earned a Ph.degree. He enjoyed every bit of it. ', 'richdad.jpg', 'Robert T. Kiyosaki', 'Warner Books', '20th Anniversary Edition', 'Money & Finance, Personal Finance'),
(5, 'Secrets of Happiness', '2018-11-13', '30.00', 'When a man discovers his father in New York has long had another, secret, family–a wife and two kids–the interlocking fates of both families lead to surprise loyalties, love triangles, and a reservoir of inner strength.', 'secretofhappiness.jpg', 'Joan Silber', 'Novel ', '1st', 'Business & Careers, Management & Leadership');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `paymentmethod` varchar(20) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `postalcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `bookid`, `order_date`, `email`, `quantity`, `total`, `paymentmethod`, `firstname`, `lastname`, `address`, `city`, `state`, `country`, `postalcode`) VALUES
(83, 5, '2022-06-23', 'thukral.neha9@gmail.com', 3, '90', 'card', 'Neha ', 'Thukral', 'tfyggh', 'jhb', 'vjhh', 'vbjknh', '13456'),
(84, 2, '2022-06-23', 'azeem@gmail.com', 1, '20', 'card', 'Azeem ', 'virani', '325 , helena feasby ', 'kitchener', 'kitchener', 'canada', '123456'),
(85, 2, '2022-06-23', 'mohitthukral@gmail.com', 1, '20', 'card', 'Mohit', 'Thukral', '123 main st', 'oshawa', 'oshawa', 'canada', '1234545'),
(86, 3, '2022-06-23', 'reaganarora@gmail.com', 1, '50', 'card', 'Reagan', 'arora', '1234 mant', 'oshawa', 'ontario', 'canada', '1234456'),
(87, 5, '2022-06-23', 'shaliniarora@gmail.com', 3, '90', 'card', 'shalini', 'arora', '123445', 'oshawa', 'ontario', 'canada', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD PRIMARY KEY (`bookinventory_id`),
  ADD KEY `bookid` (`bookid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinventory`
--
ALTER TABLE `bookinventory`
  MODIFY `bookinventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD CONSTRAINT `bookinventory_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `books` (`bookid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
