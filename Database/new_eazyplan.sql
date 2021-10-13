-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Apr 30, 2021 at 12:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eazyplan`
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
(1, 'Shreya', 'shreya@gmail.com', 'supervisor', '123'),
(2, 'Hariharan', 'hariharan@gmail.com', 'worker', '123'),
(3, 'Arun', 'arun@gmail.com', 'worker', '123'),
(4, 'admin', 'admin@gmail.com', 'admin', '123'),
(5, 'Charu', 'Charu@gmail.com', 'manager', '123'),
(6, 'Rahul', 'rahul@gmail.com', 'supervisor', '123'),
(7, 'Deepsi', 'deepsi@gmail.com', 'worker', '123');

-- --------------------------------------------------------

--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `id` int(11) NOT NULL,
  `Message` varchar(300) NOT NULL,
  `Amount` int(11) NOT NULL,
  `is_expenditure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `allocatedresource`
--

CREATE TABLE `allocatedresource` (
  `Resource_ID` int(11) NOT NULL,
  `Supervisor_ID` int(11) NOT NULL,
  `Resource_quan` int(11) NOT NULL,
  `Alloc_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Manager_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocatedresource`
--

INSERT INTO `allocatedresource` (`Resource_ID`, `Supervisor_ID`, `Resource_quan`, `Alloc_date`, `Manager_ID`) VALUES
(7, 1, 1, '2021-04-30 14:17:46', 5);

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
(3, 'Fans', 'Need 20 fans', 20, '2020-11-21', '2020-12-05', 'not delivered', 200000, 100000, 100000),
(4, 'holt', 'Rise', 1, '2021-04-30', '2021-05-07', 'NOW', 222, 111, 111);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `cost` int(100) NOT NULL,
  `last_updated_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id`, `name`, `quantity`, `unit`, `cost`, `last_updated_time`) VALUES
(1, 'Wire', 986, 'meter', 100, '2021-04-29 11:23:10'),
(2, 'Screw', 859, 'pieces', 5, '2021-04-29 11:23:10'),
(3, 'Resistor', 780, 'Pieces', 50, '2021-04-29 11:23:10'),
(4, 'Glass', 10, '1*1 meter sheets', 200, '2021-04-29 11:23:10'),
(5, 'Bulb', 10, 'bulb', 100, '2021-04-29 11:23:10'),
(6, 'Stainless Steel Sheet', 20, '1*1 meter sheets', 50, '2021-04-29 11:23:10'),
(7, 'Mirror', 19, '1*1 meter sheets', 200, '2021-04-29 11:23:10'),
(8, 'Handle', 10, '10 cm height piece', 200, '2021-04-29 11:23:10'),
(9, 'Aluminium Sheet', 10, '1*1 meter sheets', 200, '2021-04-29 11:23:10'),
(10, 'Wooden Sheet', 100, '1*1 meter sheets', 300, '2021-04-29 11:23:10'),
(11, 'Silicon Chips', 107, 'PCB', 3000, '2021-04-30 10:34:51'),
(12, 'LCD Display', 17, 'Screen', 10000, '2021-04-30 10:34:51'),
(13, 'kill', 1, 'hh', 123, '2021-04-30 14:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `resourcerq`
--

CREATE TABLE `resourcerq` (
  `supervisorID` int(10) NOT NULL,
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

INSERT INTO `resourcerq` (`supervisorID`, `resourceID`, `rqQTY`, `dateRq`, `dateAlot`, `alot`, `ReqId`) VALUES
(1, 7, 1, '2021-04-30 08:42:24', '2021-04-30 08:42:24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `userID` int(11) NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supervision`
--

CREATE TABLE `supervision` (
  `workerID` int(255) NOT NULL,
  `SupervisorID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervision`
--

INSERT INTO `supervision` (`workerID`, `SupervisorID`) VALUES
(2, 1),
(3, 1),
(7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `workallocation`
--

CREATE TABLE `workallocation` (
  `AllocID` int(11) NOT NULL,
  `WorkerID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CompleteBy` date NOT NULL,
  `Quantity_Completed` int(11) NOT NULL,
  `Last_Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workallocation`
--

INSERT INTO `workallocation` (`AllocID`, `WorkerID`, `OrderID`, `Quantity`, `CompleteBy`, `Quantity_Completed`, `Last_Updated`) VALUES
(1, 3, 1, 1, '2021-05-09', 0, '2021-04-30 14:11:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `allocatedresource`
--
ALTER TABLE `allocatedresource`
  ADD KEY `supervisor_account` (`Supervisor_ID`),
  ADD KEY `allocatedresource_resource` (`Resource_ID`);

--
-- Indexes for table `allorder`
--
ALTER TABLE `allorder`
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
  ADD KEY `resource_resourcerq` (`resourceID`),
  ADD KEY `account_resourcerq` (`supervisorID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD KEY `workersalary_Account` (`userID`);

--
-- Indexes for table `supervision`
--
ALTER TABLE `supervision`
  ADD UNIQUE KEY `workerID` (`workerID`),
  ADD KEY `supervisor_worker` (`SupervisorID`),
  ADD KEY `worker_supervisor` (`workerID`);

--
-- Indexes for table `workallocation`
--
ALTER TABLE `workallocation`
  ADD PRIMARY KEY (`AllocID`),
  ADD KEY `worker_Account` (`WorkerID`),
  ADD KEY `order_Allorder` (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resourcerq`
--
ALTER TABLE `resourcerq`
  MODIFY `ReqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workallocation`
--
ALTER TABLE `workallocation`
  MODIFY `AllocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocatedresource`
--
ALTER TABLE `allocatedresource`
  ADD CONSTRAINT `allocatedresource_resource` FOREIGN KEY (`Resource_ID`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `supervisor_account` FOREIGN KEY (`Supervisor_ID`) REFERENCES `account` (`userid`);

--
-- Constraints for table `resourcerq`
--
ALTER TABLE `resourcerq`
  ADD CONSTRAINT `account_resourcerq` FOREIGN KEY (`supervisorID`) REFERENCES `account` (`userid`),
  ADD CONSTRAINT `resource_resourcerq` FOREIGN KEY (`resourceID`) REFERENCES `resource` (`id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `workersalary_Account` FOREIGN KEY (`userID`) REFERENCES `account` (`userid`);

--
-- Constraints for table `supervision`
--
ALTER TABLE `supervision`
  ADD CONSTRAINT `supervisor_worker` FOREIGN KEY (`SupervisorID`) REFERENCES `account` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `worker_supervisor` FOREIGN KEY (`workerID`) REFERENCES `account` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workallocation`
--
ALTER TABLE `workallocation`
  ADD CONSTRAINT `order_Allorder` FOREIGN KEY (`OrderID`) REFERENCES `allorder` (`orderID`),
  ADD CONSTRAINT `worker_Account` FOREIGN KEY (`WorkerID`) REFERENCES `account` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
