-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 10:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'ณัฐริกา', 'admin', 917740550, 'pladao002@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-07-25 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` bigint(11) DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Services`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, '261064124', 'Komal', 'komal@gmail.com', 7798797897, '7/27/2019', '4:00pm', '1', '2019-07-26 04:48:25', 'Acceped', '1', '2021-09-16 16:56:12'),
(2, '518326442', 'น้องดาว', 'pladao002@gmail.com', 99999, '9/15/2021', '7:30am', 'เสริมจมูก', '2021-09-16 16:30:38', 'ok', '1', '2021-09-16 16:34:02'),
(3, '920127403', 'มานี', 'pladao002@gmail.com', 0, '9/22/2021', '1:30am', 'เสริมจมูก', '2021-09-16 16:53:48', '1', '1', '2021-09-17 14:57:46'),
(4, '467737265', 'มานะ', 'pladao002@gmail.com', 9988, '22/9/2021', '6:00pm', 'ทรีทเมนต์', '2021-09-16 17:13:57', 'ยืนยัน', '1', '2021-09-16 17:15:15'),
(5, '203284982', 'deksamrong', 'pladao002@gmail.com', 8787878, '22/9/2021', '10:30am', 'ทรีทเมนต์', '2021-09-17 05:28:30', 'ok', '1', '2021-09-19 06:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `companyname` varchar(60) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `line_token` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(10) DEFAULT NULL,
  `Gender` int(1) DEFAULT NULL,
  `Details` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `Email`, `MobileNumber`, `Gender`, `Details`, `CreationDate`, `UpdationDate`) VALUES
(6, 'ดุจลัดดาวัลย์', 'pladao002@gmail.com', '0917740550', 2, 'ทท', '2021-05-23 13:27:25', '2021-09-19 05:48:43'),
(7, 'จักรพันธ์', 'pladao002@gmail.com', '917740550', 1, 'รายละเอียด', '2021-05-26 12:38:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(1, 6, 1, 441261187, '2021-05-26 04:37:18'),
(2, 6, 9, 838115076, '2021-09-19 05:53:24'),
(3, 6, 10, 838115076, '2021-09-19 05:53:24'),
(4, 6, 7, 768425019, '2021-09-19 05:53:55'),
(5, 6, 8, 768425019, '2021-09-19 05:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '        Clinic ศูนย์ศัลยกรรมความงาม และปรับรูปหน้า บริการเติมสวยอย่างครบครัน ปรับรูปหน้า ฟิลเลอร์ ร้อยไหม เมโสแฟต เมโส หน้าใส ฉีดผิวขาว สิว ฝ้า กระ ลดน้ำหนัก เลเซอร์', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '                                        <h1 style=\"margin-bottom: 0.5rem; line-height: 1.2;\" noto=\"\" serif=\"\" tc\",=\"\" sans-serif;=\"\" text-align:=\"\" center;\"=\"\"><font color=\"#7a7f82\" size=\"4\">637/8 ซอยรามคำแหง 79 แขวง หัวหมาก เขตบางกะปิ กรุงเทพมหานคร 10240</font><br></h1>', 'info@gmail.com', '9333333', NULL, '10:30 - 17:30 น.');

-- --------------------------------------------------------

--
-- Table structure for table `tblpromotion`
--

CREATE TABLE `tblpromotion` (
  `id` int(11) NOT NULL,
  `proname` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `uploadfile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpromotion`
--

INSERT INTO `tblpromotion` (`id`, `proname`, `create_date`, `uploadfile`) VALUES
(1, '5 แถม 1', '2021-09-17 16:12:26', '20210917368686298.jpg'),
(2, 'ฉีดวิตตามินผิด มา 2 จ่าย 1', '2021-09-17 16:21:53', '202109171037803796.png'),
(3, 'ปากกระจับ ยกมุมปากเลือกทรงได้', '2021-09-17 16:38:59', '20210917513290492.jpg'),
(4, 'โปรร้อยไหมทอนาโด 6999', '2021-09-17 16:39:59', '20210917135004854.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `uploadfile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `Cost`, `CreationDate`, `uploadfile`) VALUES
(7, 'เสริมจมูก', 3000, '2021-09-17 09:48:53', '202109171298783294.jpg'),
(8, 'เสริมหน้าอก', 30000, '2021-09-17 09:50:38', '202109171484753514.jpg'),
(9, 'ลดริ้วรอยทั้งใบหน้า 100 unit (ราคาเริ่มต้น)', 4, '2021-09-17 15:41:58', '202109171788122274.jpg'),
(10, 'ลดริ้วรอย,ลดกราม อเมริกา 100 unit (ราคาเริ่มต้น)', 16900, '2021-09-17 15:54:16', '202109171742347058.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpromotion`
--
ALTER TABLE `tblpromotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpromotion`
--
ALTER TABLE `tblpromotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
