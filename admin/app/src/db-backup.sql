-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 09, 2018 at 12:03 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `reserveringssysteem`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_parts`
--

CREATE TABLE `order_parts` (
  `productID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `category` varchar(15) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `category`, `quantity`, `price`) VALUES
  (5, 'Macbook Pro', 'Laptop', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `orderID` int(11) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `fromDate` varchar(15) NOT NULL,
  `toDate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `uid`, `pwd`, `firstName`, `lastName`, `email`) VALUES
  (7, 'frank', '$2y$10$4pm./DRVZ3M.RbzVzA.bUu76h846mER/vmzxRV8Puwbn6q5FQHTQy', 'Frank', 'Solleveld', 'fsolleveld@outlook.com'),
  (8, 'dick', '$2y$10$1ihOuHY7G3/JlCAurTjnl.3KAGkQGik57BAZU9kWwF.P93Ft9YbFu', 'Dick', 'van der Weijden', 'dick@compleetit.nl'),
  (9, 'sander', '$2y$10$qcA0FJ8/vbZK0yAqHKmZu.oFfAJmrXRzBEAYS4ooAAPJbG11KDDve', 'Sander', 'Klijn', 'sander@compleetit.nl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
