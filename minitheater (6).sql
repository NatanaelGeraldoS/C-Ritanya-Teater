-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 08:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minitheater`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingtype`
--

CREATE TABLE `bookingtype` (
  `BookingTimeID` int(11) NOT NULL,
  `BookingName` varchar(50) NOT NULL,
  `RoomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtype`
--

INSERT INTO `bookingtype` (`BookingTimeID`, `BookingName`, `RoomID`) VALUES
(1, '6.00 - 12.00', 1),
(2, '12.00 - 18.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `RoleName`) VALUES
(1, 'User'),
(2, 'Staff'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` int(11) NOT NULL,
  `RoomTypeID` int(11) NOT NULL,
  `RoomImageURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomNumber`, `RoomTypeID`, `RoomImageURL`) VALUES
(1, 101, 1, ''),
(2, 102, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `roomproblem`
--

CREATE TABLE `roomproblem` (
  `ProblemID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `ProblemDescription` varchar(5000) NOT NULL,
  `IsActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomproblem`
--

INSERT INTO `roomproblem` (`ProblemID`, `RoomID`, `ProblemDescription`, `IsActive`) VALUES
(5, 1, 'Ceritanya text yang jkasdajsdnakjndsa ajdnasmndmas diasndk asjdnaslkd asjd iasndas djasnbdoas djsabdosa dnsa disandsadsadfas dasd as', 1),
(6, 0, '', 1),
(8, 1, 'asda', 1),
(9, 2, 'asdasd', 1),
(10, 2, 'asda', 1),
(16, 1, 'asdasdasdasdasdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `RoomTypeID` int(11) NOT NULL,
  `RoomTypeCapacity` int(11) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`RoomTypeID`, `RoomTypeCapacity`, `Price`, `Description`) VALUES
(1, 100, 1000000, 'Room Description Example');

-- --------------------------------------------------------

--
-- Table structure for table `staffabsent`
--

CREATE TABLE `staffabsent` (
  `AbsentID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `AbsentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffabsent`
--

INSERT INTO `staffabsent` (`AbsentID`, `StaffID`, `Status`, `Description`, `AbsentDate`) VALUES
(0, 2, 2, 'kkk', '2021-12-30'),
(0, 2, 2, 'asdasda', '2021-12-31'),
(0, 1, 0, 'asdad', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `transactionheader`
--

CREATE TABLE `transactionheader` (
  `TransactionID` int(11) NOT NULL,
  `TransactionDate` date NOT NULL,
  `UserID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `RoomPurpose` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `BookingType` int(11) NOT NULL,
  `PaymentType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionheader`
--

INSERT INTO `transactionheader` (`TransactionID`, `TransactionDate`, `UserID`, `RoomID`, `RoomPurpose`, `Status`, `BookingType`, `PaymentType`) VALUES
(1, '2021-12-31', 1, 1, 'asda', 1, 1, 'Cash'),
(2, '2021-12-31', 1, 1, 'asdad', 1, 2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` char(12) NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Email`, `RoleID`, `Password`, `Phone`, `Gender`, `DOB`) VALUES
(1, 'TestUser', 'TestUser@gmail.com', 1, 'TestUser', '08761236122', 'M', '2013-12-11'),
(2, 'TestStaff', 'TestStaff@gmail.com', 2, 'TestStaff', '08761236122', 'F', '2012-12-20'),
(3, 'TestManager', 'TestManager@gmail.com', 3, 'TestManager', '08761236122', 'M', '2013-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingtype`
--
ALTER TABLE `bookingtype`
  ADD PRIMARY KEY (`BookingTimeID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `fk_foreign_key_RoomTypeID` (`RoomTypeID`);

--
-- Indexes for table `roomproblem`
--
ALTER TABLE `roomproblem`
  ADD PRIMARY KEY (`ProblemID`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`RoomTypeID`);

--
-- Indexes for table `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `fk_foreign_key_UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `fk_foreign_key_RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingtype`
--
ALTER TABLE `bookingtype`
  MODIFY `BookingTimeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roomproblem`
--
ALTER TABLE `roomproblem`
  MODIFY `ProblemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `RoomTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactionheader`
--
ALTER TABLE `transactionheader`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_foreign_key_RoomTypeID` FOREIGN KEY (`RoomTypeID`) REFERENCES `roomtype` (`RoomTypeID`);

--
-- Constraints for table `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD CONSTRAINT `fk_foreign_key_RoomID` FOREIGN KEY (`TransactionID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `fk_foreign_key_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_foreign_key_RoleID` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
