-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 07:50 AM
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
(4, 'admin', 'admin@gmail.com', 'admin', 'hellohello123'),
(5, 'Charu', 'Charu@gmail.com', 'manager', 'hellohello123'),
(6, 'Rahul', 'rahul@gmail.com', 'staff', 'hellohello123'),
(7, 'Deepsi', 'deepsi@gmail.com', 'worker', 'hellohello123'),
(8, 'raji', 'raji@gmail.com', 'manager', ''),
(9, 'vineeth', 'vineeth@gmail.com', 'manager', 'hellohello123'),
(10, 'abc', 'abc@gmail.com', 'manager', 'hi');

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
(2, 2, 10, 1, '2020-11-05'),
(3, 1, 2, 1, '2020-11-16');

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
(2, 'MTV Home Appliances', 'Require 350 air conditioners.', 350, '2020-11-07', '2020-11-30', 'Not Delivered', 3500000, 1000000, 2500000),
(3, 'Fans', 'i want them nooo', 20, '2020-11-21', '2020-12-05', 'not delivered', 200000, 100000, 100000);

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
(1, 0, '2020-11-25');

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
(1, 'Wire', 996, 'meter', 100),
(2, 'screw', 879, 'pieces', 5),
(3, 'Resistor', 800, 'Pieces', 50),
(4, 'Glass', 10, '1*1 meter sheets', 200),
(5, 'Bulb', 10, 'bulb', 100),
(6, 'metal', 20, '1*1 meter sheets', 50),
(7, 'mirror', 20, '1*1 meter sheets', 200),
(8, 'handle', 10, '10 cm height piece', 200),
(9, 'steel', 10, '1*1 meter sheets', 200);

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
(2, 2, 10, '2020-11-04 16:50:52', '2020-11-04 16:50:52', 1, 1),
(2, 1, 2, '2016-11-19 18:30:00', '2020-11-16 16:05:14', 1, 2),
(3, 1, 2, '2016-11-19 18:30:00', '2020-11-16 16:21:44', 1, 3),
(2, 2, 1, '2017-11-19 18:30:00', '2020-11-17 02:39:48', 1, 4),
(3, 2, 20, '2017-11-19 18:30:00', '2020-11-17 16:02:34', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `workallocation`
--

CREATE TABLE `workallocation` (
  `AllocID` int(11) NOT NULL,
  `WorkerID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CompleteBy` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workallocation`
--

INSERT INTO `workallocation` (`AllocID`, `WorkerID`, `OrderID`, `Quantity`, `CompleteBy`) VALUES
(1, 2, 1, 10, '2020-11-27'),
(2, 2, 2, 350, '2020-12-06'),
(3, 2, 3, 20, '2020-12-05');

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
(2, 2, 350, '2020-11-25', 2),
(2, 3, 20, '2020-11-25', 3);

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
-- Indexes for table `workallocation`
--
ALTER TABLE `workallocation`
  ADD PRIMARY KEY (`AllocID`),
  ADD KEY `orderid_fk` (`OrderID`),
  ADD KEY `workerid_fk` (`WorkerID`);

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
  MODIFY `ReqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workallocation`
--
ALTER TABLE `workallocation`
  MODIFY `AllocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `workallocation`
--
ALTER TABLE `workallocation`
  ADD CONSTRAINT `orderid_fk` FOREIGN KEY (`OrderID`) REFERENCES `allorder` (`orderID`),
  ADD CONSTRAINT `workerid_fk` FOREIGN KEY (`WorkerID`) REFERENCES `account` (`userid`);

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
