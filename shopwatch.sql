-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 03:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopwatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userId`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `proID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`proID`, `email`, `quantity`) VALUES
(23, '', 1),
(24, '', 1),
(32, 'issurugayantha14@gmail.com', 1),
(31, 'Issurugayantha14@gmail.com', 1),
(29, 'Issurugayantha14@gmail.com', 1),
(31, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `proID` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `proID`, `quantity`, `email`, `address`, `date`) VALUES
(40, 33, '1', 'naveen@gmail.com', 'Matale', '2023-07-29'),
(41, 32, '1', 'naveen@gmail.com', 'Matale', '2023-07-29'),
(42, 31, '1', 'Issurugayantha14@gmail.com', 'matale', '2023-07-29'),
(43, 31, '1', 'Issurugayantha14@gmail.com', 'matale', '2023-07-29'),
(44, 31, '1', 'Issurugayantha14@gmail.com', 'matale', '2023-07-29'),
(45, 32, '1', 'Issurugayantha14@gmail.com', 'matale', '2023-07-29'),
(46, 32, '1', 'issurugayantha14@gmail.com', 'matale', '2023-08-04'),
(47, 33, '1', 'issurugayantha14@gmail.com', 'matale', '2023-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `imgURL` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `newPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `proName`, `imgURL`, `quantity`, `description`, `price`, `discount`, `newPrice`) VALUES
(23, 'Titan Raga Aurora', 'IMG-64b9f696337890.03418353.png', 9, 'A beautiful and feminine watch from the Raga Collection, featuring a slim stainless steel case, a delicate bracelet with intricate design patterns, and a round mother-of-pearl dial. The dial is adorned with Swarovski crystals, exuding elegance and charm.', 12300, 10, 11.88),
(24, 'Rolex Premium Watch', 'IMG-64ba18853ed7f0.90276602.png', 9, 'luminescent markers, and a date window ', 12030, 10, 10800),
(25, 'Titan', 'IMG-64ba1e2d1a0fe1.28267806.png', 6, 'high quality rolex watch', 1000, 4, 960),
(26, 'G-Shock', 'IMG-64ba1e63012950.81078406.png', 8, 'G_Shock gold watch', 78000, 13, 67860),
(29, 'Audemars Piguet Royal Oak Offshore Chronograph', 'IMG-64c3657edd9e44.90542777.jpg', 10, 'The Audemars Piguet Royal Oak Offshore Chronograph is a bold and iconic timepiece that blends sportiness with luxury. This watch is a larger and more rugged version of the classic Royal Oak model. It features a robust stainless steel or precious metal cas', 31000, 15, 26350),
(31, 'Zenith Defy El Primero', 'IMG-64c3679c447ac3.95182574.jpg', 5, 'Zenith Defy El Primero', 13100, 5, 12445),
(32, 'Omega Speedmaster Moonwatch Professional', 'IMG-64c368ce968926.96458064.jpg', 6, 'he Omega Speedmaster Moonwatch Professional is a legendary watch with a storied history.', 55000, 10, 49500),
(33, 'Rolex Submariner Date', 'IMG-64c36af09ec0e6.64217682.jpg', 7, 'Launched in 1953, the Submariner is one of the most recognizable and enduring timepieces in the world.\r\n\r\n', 9150, 13, 7960.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `userIP` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `userIP`, `address`, `telephone`) VALUES
(1, 'isuru', 'issurugayantha14@gmail.com', '12', '', 'matale', 'daas'),
(3, 'naveen', 'naveen@gmail.com', '12345', '', '', ''),
(4, 'Sewmini', 'sewmini@gmail.com', '12345', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
