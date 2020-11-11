-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 07:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eazy_plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `name`, `email`, `role`, `password`) VALUES
(1, 'Shreya', 'shreya@gmail.com', 'staff', 'hellohello123'),
(2, 'Hariharan', 'hariharan@gmail.com', 'worker', 'hellohello123'),
(3, 'Arun', 'arun@gmail.com', 'worker', 'hellohello123'),
(4, 'admin', 'admin@gmail.com', 'admin', 'hellohello123');

-- --------------------------------------------------------

--
-- Table structure for table `allocatedresources`
--

CREATE TABLE `allocatedresources` (
  `workerID` int(100) NOT NULL,
  `resourceID` int(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `AllocDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocatedresources`
--

INSERT INTO `allocatedresources` (`workerID`, `resourceID`, `quantity`, `StaffID`, `AllocDate`) VALUES
(2, 1, 10, 1, '2020-11-05'),
(2, 2, 10, 1, '2020-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `allorder`
--

CREATE TABLE `allorder` (
  `orderID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quantity` int(10) NOT NULL,
  `orderDate` date NOT NULL,
  `completionDate` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `totalEstimatedAmt` int(100) NOT NULL,
  `advanceAmt` int(100) NOT NULL,
  `amtLeft` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allorder`
--

INSERT INTO `allorder` (`orderID`, `name`, `description`, `quantity`, `orderDate`, `completionDate`, `status`, `totalEstimatedAmt`, `advanceAmt`, `amtLeft`) VALUES
(1, 'APS Computer', '100 computers to be delivered to APS Techs, order accepted on 5-11-2020.', 100, '2020-11-05', '2020-11-25', 'Not Delivered', 3800000, 1800000, 2000000),
(2, 'MTV Home Appliances', 'Require 350 air conditioners.', 350, '2020-11-07', '2020-11-30', 'Not Delivered', 3500000, 1000000, 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `pendingorder`
--

CREATE TABLE `pendingorder` (
  `orderID` int(10) NOT NULL,
  `CompletedProdQTY` int(10) NOT NULL,
  `lastUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendingorder`
--

INSERT INTO `pendingorder` (`orderID`, `CompletedProdQTY`, `lastUpdated`) VALUES
(1, 20, '2020-11-05'),
(2, 0, '2020-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `cost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id`, `name`, `quantity`, `unit`, `cost`) VALUES
(1, 'Wire', 1000, 'meter', 100),
(2, 'screw', 880, 'pieces', 5),
(3, 'Resistor', 800, 'Pieces', 50);

-- --------------------------------------------------------

--
-- Table structure for table `resourcerq`
--

CREATE TABLE `resourcerq` (
  `workerID` int(10) NOT NULL,
  `resourceID` int(10) NOT NULL,
  `rqQTY` int(10) NOT NULL,
  `dateRq` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateAlot` timestamp NOT NULL DEFAULT current_timestamp(),
  `alot` tinyint(1) NOT NULL,
  `ReqId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resourcerq`
--

INSERT INTO `resourcerq` (`workerID`, `resourceID`, `rqQTY`, `dateRq`, `dateAlot`, `alot`, `ReqId`) VALUES
(2, 2, 10, '2020-11-04 16:50:52', '2020-11-04 16:50:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `totalworkupdate`
--

CREATE TABLE `totalworkupdate` (
  `orderID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `productQTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workerworkupdate`
--

CREATE TABLE `workerworkupdate` (
  `workerID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `productQTY` int(30) NOT NULL,
  `updateTime` date NOT NULL DEFAULT current_timestamp(),
  `AllocID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workerworkupdate`
--

INSERT INTO `workerworkupdate` (`workerID`, `orderID`, `productQTY`, `updateTime`, `AllocID`) VALUES
(2, 1, 30, '2020-11-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `allocatedresources`
--
ALTER TABLE `allocatedresources`
  ADD PRIMARY KEY (`workerID`,`resourceID`),
  ADD KEY `resource_allocatedResource` (`resourceID`),
  ADD KEY `staff_allocatedResource` (`StaffID`);

--
-- Indexes for table `allorder`
--
ALTER TABLE `allorder`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `pendingorder`
--
ALTER TABLE `pendingorder`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resourcerq`
--
ALTER TABLE `resourcerq`
  ADD PRIMARY KEY (`ReqId`),
  ADD KEY `account_resourcerq` (`workerID`),
  ADD KEY `resource_resourcerq` (`resourceID`);

--
-- Indexes for table `totalworkupdate`
--
ALTER TABLE `totalworkupdate`
  ADD PRIMARY KEY (`orderID`,`userID`),
  ADD KEY `account_totalworkupdate` (`userID`);

--
-- Indexes for table `workerworkupdate`
--
ALTER TABLE `workerworkupdate`
  ADD PRIMARY KEY (`orderID`,`workerID`),
  ADD KEY `account_workerworkupdate` (`workerID`),
  ADD KEY `wallocid_fk` (`AllocID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resourcerq`
--
ALTER TABLE `resourcerq`
  MODIFY `ReqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocatedresources`
--
ALTER TABLE `allocatedresources`
  ADD CONSTRAINT `account_allocatedResource` FOREIGN KEY (`workerID`) REFERENCES `account` (`userid`),
  ADD CONSTRAINT `resource_allocatedResource` FOREIGN KEY (`resourceID`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `staff_allocatedResource` FOREIGN KEY (`StaffID`) REFERENCES `account` (`userid`);

--
-- Constraints for table `pendingorder`
--
ALTER TABLE `pendingorder`
  ADD CONSTRAINT `allorder_pendingorder` FOREIGN KEY (`orderID`) REFERENCES `allorder` (`orderID`);

--
-- Constraints for table `resourcerq`
--
ALTER TABLE `resourcerq`
  ADD CONSTRAINT `account_resourcerq` FOREIGN KEY (`workerID`) REFERENCES `account` (`userid`),
  ADD CONSTRAINT `resource_resourcerq` FOREIGN KEY (`resourceID`) REFERENCES `resource` (`id`);

--
-- Constraints for table `totalworkupdate`
--
ALTER TABLE `totalworkupdate`
  ADD CONSTRAINT `account_totalworkupdate` FOREIGN KEY (`userID`) REFERENCES `account` (`userid`),
  ADD CONSTRAINT `pendingorder_totalworkupdate` FOREIGN KEY (`orderID`) REFERENCES `pendingorder` (`orderID`);

--
-- Constraints for table `workerworkupdate`
--
ALTER TABLE `workerworkupdate`
  ADD CONSTRAINT `account_workerworkupdate` FOREIGN KEY (`workerID`) REFERENCES `account` (`userid`),
  ADD CONSTRAINT `allorder_workerworkupdate` FOREIGN KEY (`orderID`) REFERENCES `allorder` (`orderID`),
  ADD CONSTRAINT `wallocid_fk` FOREIGN KEY (`AllocID`) REFERENCES `workallocation` (`AllocID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
