CREATE TABLE `reservations` (
  `orderID` int(100),
  `firstName` varchar(50),
  `lastName` varchar(50),
  `email` varchar(50),
  `phonenumber` int(10),
  `zip` varchar(6),
  `fromDate` varchar(15),
  `toDate` varchar(15),
  PRIMARY KEY (`orderID`),
  KEY `Key` (`firstName`, `lastName`, `email`, `phonenumber`, `zip`, `fromDate`, `toDate`)
);

CREATE TABLE `products` (
  `productID` int(100),
  `productName` varchar(50),
  `category` varchar(50),
  `email` varchar(50),
  `quantity` integer(100),
  PRIMARY KEY (`productID`),
  KEY `Key` (`productName`, `category`, `email`, `quantity`)
);

CREATE TABLE `users` (
  `userID` int(100),
  `uid` varchar(50),
  `pwd` varchar(100),
  `firstName` varchar(50),
  `lastName` varchar(50),
  `email` varchar(50),
  PRIMARY KEY (`userID`),
  KEY `Key` (`uid`, `pwd`, `firstName`, `lastName`, `email`)
);

CREATE TABLE `order_parts` (
  `orderID` int(100),
  `productID` int(100),
  KEY `FK` (`orderID`, `productID`)
);

