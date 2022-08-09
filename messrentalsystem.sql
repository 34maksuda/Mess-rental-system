-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 07:34 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messrentalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback12`
--

CREATE TABLE `feedback12` (
  `feedbackId` bigint(255) NOT NULL,
  `givenId` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `seatId` varchar(255) NOT NULL,
  `roomId` varchar(255) NOT NULL,
  `messId` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `feedbackPic` varchar(255) DEFAULT NULL,
  `entryTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback12`
--

INSERT INTO `feedback12` (`feedbackId`, `givenId`, `feedback`, `seatId`, `roomId`, `messId`, `userId`, `feedbackPic`, `entryTime`) VALUES
(12, 'c8e2aa7e527d681419e737b691dfe666', 'onek valo service.go ahead varate!', 'abdullahmamun45@gmail.comshantinirflat25012', 'abdullahmamun45@gmail.comshantinirflat2501', 'abdullahmamun45@gmail.comshantinirflat2', '4d483075ea0efff8978c20c5f596f21f', ',6075a9d90d5e8.jpg,6075a9d91d9a0.jpg,6075a9d928d8b.jpg,6075a9d933300.jpg', '2021-04-13 14:25:29'),
(13, 'caec1de7aba0f748322698ef730576cf', 'ai mess ar features gulo darun.web a dewa info gulo akdom perfect.', 'abdullahmamun45@gmail.comshantinirflat25012', 'abdullahmamun45@gmail.comshantinirflat2501', 'abdullahmamun45@gmail.comshantinirflat2', '4d483075ea0efff8978c20c5f596f21f', ',6075abc04fd36.jpg,6075abc06ae3d.jpg', '2021-04-13 14:33:36'),
(14, 'fb0dfaa6362c9b86dca8f223d50b7ec0', 'onek valo website.protita info e sothik.ami dhaka theke bose olpo somoye ato valo akta seat khuje pelam.dhonnobad developer team!', 'abdullahmamun45@gmail.comshantinirflat25012', 'abdullahmamun45@gmail.comshantinirflat2501', 'abdullahmamun45@gmail.comshantinirflat2', '4d483075ea0efff8978c20c5f596f21f', ',6075aca40b15f.jpg,6075aca41e815.jpg,6075aca42c9de.jpg,6075aca4376e7.jpg,6075aca444f47.jpg', '2021-04-13 14:37:24'),
(16, 'caec1de7aba0f748322698ef730576cf', 'onek valo website.but kisu info match korena.', 'asfiyamumu80@gmail.commaruf1011', 'asfiyamumu80@gmail.commaruf101', 'asfiyamumu80@gmail.commaruf', 'a97a63424a52207239c63c76ea96a849', ',6076bc75895c8.jpg,6076bc75a95e1.jpg,6076bc75b4976.jpg', '2021-04-14 09:57:09'),
(17, 'caec1de7aba0f748322698ef730576cf', 'seat related sob information e thik dewa.', 'taherulislam778@gmail.comduibon5012', 'taherulislam778@gmail.comduibon501', 'taherulislam778@gmail.comduibon', 'c195b37f6b43f32a6aee89ec79db8bc9', ',6077a2b22e45c.jpg,6077a2b23e8b4.jpg,6077a2b248cf9.jpg,6077a2b2516d6.jpg', '2021-04-15 02:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `messinfo12`
--

CREATE TABLE `messinfo12` (
  `messId` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `messName` varchar(20) NOT NULL,
  `messType` enum('Male','Female') DEFAULT NULL,
  `messLocation` varchar(255) NOT NULL,
  `numOfFloor` tinyint(5) NOT NULL,
  `messOwnerStatus` enum('Yes','No') DEFAULT NULL,
  `securityGurdStatus` enum('Yes','No') DEFAULT NULL,
  `maidStatus` enum('Yes','No') DEFAULT NULL,
  `roomStatus` enum('Yes','No') DEFAULT NULL,
  `specialFeatures` varchar(255) DEFAULT NULL,
  `leaseTerm` varchar(20) DEFAULT NULL,
  `tenantType` varchar(20) DEFAULT NULL,
  `messPic` varchar(255) DEFAULT NULL,
  `entryTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messinfo12`
--

INSERT INTO `messinfo12` (`messId`, `userId`, `messName`, `messType`, `messLocation`, `numOfFloor`, `messOwnerStatus`, `securityGurdStatus`, `maidStatus`, `roomStatus`, `specialFeatures`, `leaseTerm`, `tenantType`, `messPic`, `entryTime`) VALUES
('abdullahmamun45@gmail.comshantinir', '4d483075ea0efff8978c20c5f596f21f', 'shantinir', 'Male', 'balubari,dinajpur', 6, 'Yes', 'No', 'Yes', 'No', 'Wifi,TV,Fridge,', '1 year', 'anyone', '603dd20a4ea7d.jpg', '2021-03-02 05:50:02'),
('abdullahmamun45@gmail.comshantinirflat2', '4d483075ea0efff8978c20c5f596f21f', 'shantinirflat2', 'Female', 'balubari,dinajpur', 6, 'Yes', 'No', 'Yes', 'No', 'Wifi,TV,Fridge,', '1 year', 'anyone', '603d08ab33438.jpg', '2021-03-02 05:34:17'),
('asfiyamumu80@gmail.commaruf', 'a97a63424a52207239c63c76ea96a849', 'maruf', 'Male', 'kornai mor basherhat', 6, 'Yes', 'No', 'Yes', 'No', 'Wifi,TV,Fridge,', '6 month', 'student', '6072ac562b886.jpg', '2021-04-11 08:05:12'),
('maksudabilkis1114@gmail.comduibon666', 'caec1de7aba0f748322698ef730576cf', 'duibon666', 'Female', 'mohabolipur,dinajpur', 6, 'Yes', 'No', 'Yes', 'Yes', 'Wifi,TV,Fridge,', '1 year', 'student', '603a796e7b5f1.jpg', '2021-04-13 04:30:21'),
('maksudabilkis1114@gmail.comduibontinshed', 'caec1de7aba0f748322698ef730576cf', 'duibontinshed', 'Female', 'mohabolipur,HSTU,dinajpur', 5, 'Yes', 'No', 'Yes', 'No', 'Wifi,TV,Fridge,', '1 year', 'student', '603888de8137f.jpg', '2021-04-13 04:36:25'),
('maksudabilkis1114@gmail.commaruf10', 'caec1de7aba0f748322698ef730576cf', 'maruf10', 'Male', 'kornai mor,basherhat', 6, 'Yes', 'No', 'Yes', 'No', 'Wifi,TV,', '1 year', 'anyone', '6039a1ff1d222.jpg', '2021-04-13 04:30:21'),
('taherulislam778@gmail.comduibon', 'c195b37f6b43f32a6aee89ec79db8bc9', 'duibon', 'Female', 'kajla,Rajshahi', 10, 'Yes', 'No', 'Yes', 'No', 'Wifi,TV,Fridge,IPS,diningSpace,', 'N/A', 'anyone', '6072ce31300fd.jpg', '2021-04-11 10:32:41'),
('taherulislam778@gmail.commohuya', 'c195b37f6b43f32a6aee89ec79db8bc9', 'mohuya', 'Female', 'kajla,Rajshahi', 10, 'Yes', 'No', 'Yes', 'No', 'Wifi,TV,Fridge,IPS,diningSpace,', 'N/A', 'anyone', '6072ce4f933cd.jpg', '2021-04-11 10:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment12`
--

CREATE TABLE `payment12` (
  `paymentId` bigint(20) NOT NULL,
  `seatId` varchar(256) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `userTID` varchar(255) NOT NULL,
  `userContact` bigint(20) NOT NULL,
  `messOwnerContact` bigint(20) NOT NULL,
  `meFROMmessOwnerTID` varchar(255) DEFAULT NULL,
  `totalSeatRent` int(11) NOT NULL,
  `paymentStatus` text NOT NULL DEFAULT 'uncheck',
  `requestTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment12`
--

INSERT INTO `payment12` (`paymentId`, `seatId`, `userName`, `userEmail`, `gender`, `userTID`, `userContact`, `messOwnerContact`, `meFROMmessOwnerTID`, `totalSeatRent`, `paymentStatus`, `requestTime`) VALUES
(35, 'taherulislam778@gmail.comduibon5012', 'maksudabilkis', 'maksudabilkis1114@gmail.com', 'Female', 'TrGhYj', 1878654329, 17483367855, 'wetVFG', 1248, 'checked', '2021-04-13 06:04:40'),
(36, 'taherulislam778@gmail.comduibon5011', 'saifurrahman', 'saifurrrahman78@gmail.com', 'Male', 'tgHrjk', 1689904677, 17483367855, 'werthjklou', 1248, 'checked', '2021-04-15 04:57:52'),
(37, 'abdullahmamun45@gmail.comshantinirflat25012', 'maksudabilkis', 'maksudabilkis1114@gmail.com', 'Female', 'TrGhYj', 1886254329, 1899754326, NULL, 520, 'uncheck', '2021-04-15 04:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `registeredperson12`
--

CREATE TABLE `registeredperson12` (
  `userId` varchar(256) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `contactNumber` bigint(20) NOT NULL,
  `profilePic` varchar(256) NOT NULL DEFAULT 'avatar.png',
  `signupDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registeredperson12`
--

INSERT INTO `registeredperson12` (`userId`, `firstName`, `lastName`, `email`, `password`, `gender`, `contactNumber`, `profilePic`, `signupDate`) VALUES
('29962c23d189a7b8e426f32a39c06061', 'shamima', 'rahman', 'shamimarahman78@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Female', 1744356789, 'avatar.png', '2021-03-02 06:15:41'),
('4d483075ea0efff8978c20c5f596f21f', 'abdullah', 'mamun', 'abdullahmamun45@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Female', 1899754326, '603d0738445b1.jpg', '2021-03-01 15:41:06'),
('7b731f18e325a7b66878610113bfc0e3', 'tonmoy', 'sarker', 'tonmoysarker56@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Male', 1876654277, '6072c80880ea7.jpg', '2021-04-11 09:57:28'),
('942c61a41f04141126e09ff34f0d3842', 'page', 'developers', 'varateourwebsite34@gmail.com', 'edd50df31e67a803ba83fca75ba8dabf', 'Male', 1768076546, '607521067161d.jpg', '2021-04-15 02:20:48'),
('a97a63424a52207239c63c76ea96a849', 'asfiya', 'mumu', 'asfiyamumu80@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Female', 1876654277, 'avatar.png', '2021-04-11 08:05:12'),
('c195b37f6b43f32a6aee89ec79db8bc9', 'taherul', 'Islam', 'taherulislam778@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Male', 17483367855, '6072cd22a99b8.jpg', '2021-04-11 10:32:40'),
('c8e2aa7e527d681419e737b691dfe666', 'sajeeda', 'kabir', 'sanjedakabir56@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Female', 1877489534, 'avatar.png', '2021-04-13 14:20:35'),
('caec1de7aba0f748322698ef730576cf', 'maksuda', 'bilkis', 'maksudabilkis1114@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Female', 1886254329, '607482f5e7fd8.jpg', '2021-04-15 02:18:21'),
('fb0dfaa6362c9b86dca8f223d50b7ec0', 'saifur', 'rahman', 'saifurrrahman78@gmail.com', '8843028fefce50a6de50acdf064ded27', 'Male', 1689904677, 'avatar.png', '2021-03-05 07:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `roomdetails12`
--

CREATE TABLE `roomdetails12` (
  `roomId` varchar(255) NOT NULL,
  `messId` varchar(255) NOT NULL,
  `roomNo` varchar(20) NOT NULL,
  `roomLength` int(10) NOT NULL,
  `roomWidth` int(10) NOT NULL,
  `numOfSeat` tinyint(2) NOT NULL,
  `numOfWindow` tinyint(2) NOT NULL,
  `roomLocation` varchar(20) NOT NULL,
  `numOfSeatInFloor` tinyint(3) NOT NULL,
  `specialFeatures` varchar(255) DEFAULT NULL,
  `numOfCommonBath` tinyint(2) NOT NULL,
  `numOfBesin` tinyint(2) DEFAULT NULL,
  `roomPic` varchar(255) NOT NULL,
  `commonBathPic` varchar(255) NOT NULL,
  `besinPic` varchar(255) NOT NULL,
  `entryTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomdetails12`
--

INSERT INTO `roomdetails12` (`roomId`, `messId`, `roomNo`, `roomLength`, `roomWidth`, `numOfSeat`, `numOfWindow`, `roomLocation`, `numOfSeatInFloor`, `specialFeatures`, `numOfCommonBath`, `numOfBesin`, `roomPic`, `commonBathPic`, `besinPic`, `entryTime`) VALUES
('abdullahmamun45@gmail.comshantinir602', 'abdullahmamun45@gmail.comshantinir', '602', 20, 30, 3, 2, '5th floor', 8, 'Bed,', 2, 2, ',603dd0ed86b41.jpg,603dd0ed946ce.jpg,603dd0eda9f4f.jpg', ',603dd0edbfbbc.jpg,603dd0edca625.jpg', '603dd156b7765.jpg', '2021-03-02 05:48:26'),
('abdullahmamun45@gmail.comshantinirflat2501', 'abdullahmamun45@gmail.comshantinirflat2', '501', 20, 30, 2, 2, '4th floor', 10, 'Bed,AC,Balcony,', 2, 2, ',603d0f1c08938.jpg,603d0f1c1120f.jpg,603d0f1c185e5.jpg', ',603d0f1c23ab6.jpg,603d0f1c2ba8d.jpg', '603d0f1bef407.jpg', '2021-03-02 05:34:17'),
('asfiyamumu80@gmail.commaruf101', 'asfiyamumu80@gmail.commaruf', '101', 20, 30, 3, 2, 'Ground floor', 12, 'Bed,Chair-table,mattress,', 2, 2, ',6072acb240ad8.jpg,6072acb24b653.jpg,6072acb25614c.jpg', ',6072acb2610fa.jpg,6072acb26bf9e.jpg', '6072acb235173.jpg', '2021-04-11 08:05:12'),
('asfiyamumu80@gmail.commaruf102', 'asfiyamumu80@gmail.commaruf', '102', 20, 30, 3, 2, 'Ground floor', 12, 'Bed,Chair-table,mattress,', 2, 2, ',6072acd71d3d4.jpg,6072acd7379c9.jpg', ',6072acd7424c1.jpg,6072acd74a996.jpg', '6072acd70ec73.jpg', '2021-04-11 08:05:12'),
('asfiyamumu80@gmail.commaruf103', 'asfiyamumu80@gmail.commaruf', '103', 20, 30, 3, 2, 'Ground floor', 12, 'Bed,Chair-table,mattress,', 2, 2, ',6072acf94c9b7.jpg,6072acf96c966.jpg,6072acf977882.jpg', ',6072acf9824ba.jpg,6072acf98d3f8.jpg', '6072acf93dca4.jpg', '2021-04-11 08:05:13'),
('maksudabilkis1114@gmail.commaruf10101', 'maksudabilkis1114@gmail.commaruf10', '101', 20, 30, 2, 2, 'Ground floor', 12, 'Bed,Chair-table,', 2, 2, ',6039a25d70db1.jpg,6039a25d7b8e6.jpg,6039a25d85fcd.jpg', ',6039a25d9128e.jpg,6039a25d9bf8a.jpg', '6039a25d647b6.jpg', '2021-04-13 04:30:21'),
('taherulislam778@gmail.comduibon501', 'taherulislam778@gmail.comduibon', '501', 20, 30, 2, 2, '3rd floor', 20, 'Bed,mattress,', 4, 4, ',6072ced149655.jpg,6072ced15435c.jpg,6072ced161bd3.jpg', ',6072ced16f3cd.jpg,6072ced17a0f9.jpg', '6072ced138b99.jpg', '2021-04-11 10:32:41'),
('taherulislam778@gmail.comduibon502', 'taherulislam778@gmail.comduibon', '502', 20, 30, 2, 2, '3rd floor', 20, 'Bed,mattress,', 4, 4, ',6072cefadc30e.jpg,6072cefb0de45.jpg,6072cefb2e413.jpg', ',6072cefb5470b.jpg', '6072cefac80c6.jpg', '2021-04-11 10:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `seatdetails12`
--

CREATE TABLE `seatdetails12` (
  `seatId` varchar(255) NOT NULL,
  `roomId` varchar(255) NOT NULL,
  `seatNo` varchar(255) NOT NULL,
  `seatRent` int(20) NOT NULL,
  `serviceCharge` int(20) DEFAULT NULL,
  `securityDeposit` int(20) DEFAULT NULL,
  `seatStatus` enum('vacant','occupied') DEFAULT NULL,
  `seatPic` varchar(255) NOT NULL,
  `entryTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seatdetails12`
--

INSERT INTO `seatdetails12` (`seatId`, `roomId`, `seatNo`, `seatRent`, `serviceCharge`, `securityDeposit`, `seatStatus`, `seatPic`, `entryTime`) VALUES
('abdullahmamun45@gmail.comshantinirflat25012', 'abdullahmamun45@gmail.comshantinirflat2501', '2', 500, 200, 500, 'vacant', ',603e74fcbdd66.jpg,603e74fcd0034.jpg', '2021-04-13 05:42:41'),
('asfiyamumu80@gmail.commaruf1011', 'asfiyamumu80@gmail.commaruf101', '1', 1000, 500, 500, 'vacant', ',6072ad217c210.jpg,6072ad2186d1d.jpg', '2021-04-13 05:42:47'),
('asfiyamumu80@gmail.commaruf1012', 'asfiyamumu80@gmail.commaruf101', '2', 1500, 500, 500, 'vacant', ',6072ad3745077.jpg', '2021-04-13 05:42:57'),
('asfiyamumu80@gmail.commaruf1015', 'asfiyamumu80@gmail.commaruf101', '5', 1500, 500, 500, 'vacant', ',6072ad450a7d0.jpg', '2021-04-13 05:43:03'),
('maksudabilkis1114@gmail.commaruf101011', 'maksudabilkis1114@gmail.commaruf10101', '1', 1300, 500, 1300, 'vacant', ',60751f2c5dcf1.jpg,60751f2c65b84.jpg', '2021-04-13 05:43:09'),
('maksudabilkis1114@gmail.commaruf101012', 'maksudabilkis1114@gmail.commaruf10101', '2', 2000, 500, 1000, 'vacant', ',6039a28cf2bda.jpg,6039a28d14c37.jpg', '2021-04-13 06:00:54'),
('maksudabilkis1114@gmail.commaruf101013', 'maksudabilkis1114@gmail.commaruf10101', '3', 1300, 500, 1300, 'vacant', ',60751f42752db.jpg,60751f4292e9e.jpg', '2021-04-13 06:00:37'),
('taherulislam778@gmail.comduibon5011', 'taherulislam778@gmail.comduibon501', '1', 1200, 500, 1200, 'occupied', ',6072cf2932d3a.jpg', '2021-04-15 04:57:52'),
('taherulislam778@gmail.comduibon5012', 'taherulislam778@gmail.comduibon501', '2', 1200, 500, 1200, 'occupied', ',6072cf476633b.jpg,6072cf47813b1.jpg', '2021-04-13 06:04:40'),
('taherulislam778@gmail.comduibon5021', 'taherulislam778@gmail.comduibon502', '1', 1500, 300, 1500, 'vacant', ',6072cf82c2e42.jpg,6072cf82ee339.jpg', '2021-04-13 05:43:33'),
('taherulislam778@gmail.comduibon5022', 'taherulislam778@gmail.comduibon502', '2', 1500, 300, 1500, 'vacant', ',6072cf97e8c19.jpg,6072cf980fabc.jpg', '2021-04-13 05:43:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback12`
--
ALTER TABLE `feedback12`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `messinfo12`
--
ALTER TABLE `messinfo12`
  ADD PRIMARY KEY (`messId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `payment12`
--
ALTER TABLE `payment12`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `seatId` (`seatId`);

--
-- Indexes for table `registeredperson12`
--
ALTER TABLE `registeredperson12`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `roomdetails12`
--
ALTER TABLE `roomdetails12`
  ADD PRIMARY KEY (`roomId`),
  ADD KEY `messId` (`messId`);

--
-- Indexes for table `seatdetails12`
--
ALTER TABLE `seatdetails12`
  ADD PRIMARY KEY (`seatId`),
  ADD KEY `roomId` (`roomId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback12`
--
ALTER TABLE `feedback12`
  MODIFY `feedbackId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment12`
--
ALTER TABLE `payment12`
  MODIFY `paymentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messinfo12`
--
ALTER TABLE `messinfo12`
  ADD CONSTRAINT `messinfo12_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `registeredperson12` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment12`
--
ALTER TABLE `payment12`
  ADD CONSTRAINT `payment12_ibfk_1` FOREIGN KEY (`seatId`) REFERENCES `seatdetails12` (`seatId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roomdetails12`
--
ALTER TABLE `roomdetails12`
  ADD CONSTRAINT `roomdetails12_ibfk_1` FOREIGN KEY (`messId`) REFERENCES `messinfo12` (`messId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seatdetails12`
--
ALTER TABLE `seatdetails12`
  ADD CONSTRAINT `seatdetails12_ibfk_1` FOREIGN KEY (`roomId`) REFERENCES `roomdetails12` (`roomId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
