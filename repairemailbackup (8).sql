-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 11:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repairemailbackup`
--

-- --------------------------------------------------------

--
-- Table structure for table `emailrepair`
--

CREATE TABLE `emailrepair` (
  `emailRepairId` int(11) NOT NULL,
  `emailRepair` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emailrepair`
--

INSERT INTO `emailrepair` (`emailRepairId`, `emailRepair`) VALUES
(1, 'tanadesign.service@gmail.com\r\n'),
(2, 'pm2storetana@gmail.com'),
(6, 'chavanlak1806@gmail.com'),
(7, 'smartmeow11@gmail.com'),
(9, 'ploy@gmail.com'),
(10, 'ploy@gmail.com'),
(11, 'ploy@gmail.com'),
(12, 'ploy@gmail.com'),
(13, 'ploy@gmail.com'),
(14, 'xxxx@gggg.mali.com'),
(15, 'g@f'),
(16, 'g@f');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentId` int(11) NOT NULL,
  `equipmentName` text NOT NULL,
  `TypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `equipmentName`, `TypeId`) VALUES
(1, 'งานแอร์ (งานซ่อม)\r\n', 3),
(2, 'งานเครื่องดูดอากาศ (ฮูด)  (งานซ่อม)\r\n', 3),
(18, 'งานซ่อมเบาะ\r\n', 4),
(19, 'งานพื้น\r\n', 4),
(20, 'งานผนัง\r\n', 4),
(21, 'งานฝ้าเพดาน\r\n', 4),
(22, 'งานเฟอร์นิเจอร์ Built-in \r\n', 4),
(23, 'งานเฟอร์นิเจอร์ ลอยตัว\r\n', 4),
(24, 'งานโลโก้ (ภายใน+ภายนอกอาคาร)\r\n', 4),
(25, 'งานฝารางระบายน้ำ\r\n', 4),
(26, 'งานประตู\r\n', 4),
(47, 'ระบบแก๊ส, หัวเตาแก๊ส\r\n', 5),
(48, 'หัวฉีดแก๊ส, ท่อ-สายส่งแก๊ส\r\n', 5),
(49, 'หัวเตาแก๊ส\r\n', 5),
(50, 'ตัวตัดระบบแก๊ส\r\n', 5),
(51, 'ตู้ควบคุมระบบแก๊ส\r\n', 5),
(52, 'ตู้คอนโทรลแก๊ส\r\n', 5),
(53, 'งาน PM\r\n', 5),
(54, 'ซ่อมไฟ\r\n', 5),
(55, 'ระบบน้ำ\r\n', 5),
(56, 'ท่อน้ำ\r\n', 5),
(57, 'ท่อน้ำทิ้งระบายน้ำ\r\n', 5),
(58, 'ปลั๊กไฟ\r\n', 5),
(59, 'ระบบท่อน้ำ\r\n', 5),
(60, 'สายแลน, สายแลนค์\r\n', 5),
(61, 'งานติดตั้งอุปกรณ์\r\n', 5),
(62, 'เครื่องดูดอากาศ(ดูด)-PM\r\n', 5),
(63, 'เครื่องทำน้ำแข็ง\r\n', 6),
(64, 'เครื่องล้างจาน, เครื่องอุ่นจาน\r\n', 6),
(65, 'เครื่องครัว (ตู้เย็น ตู้ไอศครีม ตู้ฟรีส)\r\n', 6),
(66, 'เครื่องอุ่นจาน\r\n', 6),
(67, 'ตู้เย็น แช่แข็ง\r\n', 6),
(68, 'ตู้ชิล\r\n', 6),
(69, 'ตู้เย็นครัว\r\n', 6),
(70, 'ตู้ไอศครีม\r\n', 6),
(71, 'เครื่องล้างจาน\r\n', 6),
(72, 'ไมโครเวฟ\r\n', 6),
(73, 'ตู้เย็น2ประตู\r\n', 6),
(74, 'ตู้เย็นฟรีส\r\n', 6),
(75, 'เครื่องปั่นน้ำผลไม้\r\n', 6),
(76, 'เครื่องปั่นน้ำแข็ง\r\n', 6),
(77, 'เครื่องกรองน้ำ\r\n', 6),
(78, 'เครื่องปั้นมากิ\r\n', 7),
(79, 'เครื่องปั้นนิกิริ\r\n', 7),
(80, 'หม้อนึ่งข้าว 2 ชั้น\r\n', 7),
(81, 'เตาทอดต่างๆ\r\n', 7),
(82, 'เครื่องทำมิโซะ\r\n', 7),
(83, 'เครื่องทำกาแฟ\r\n', 7),
(84, 'เตาทอดเกี๊ยวซ่า\r\n', 7),
(85, 'เตาทอดไฟฟ้าเยอร์ 25 ลิตร\r\n', 7),
(86, 'เตาเทมปุระ\r\n', 7),
(87, 'หม้อหุ้งข้าว\r\n', 7),
(88, 'หม้อนึ่งข้าว 3 ชั้น\r\n', 7),
(89, 'เตาทอด\r\n', 7),
(90, 'เตาย่าง\r\n', 7),
(91, 'เครื่องบนสับ\r\n', 7),
(92, 'เตาทอดไฟเยอร์ 18 ลิตร\r\n', 7),
(93, 'เตาเทปัง\r\n', 7),
(94, 'เตาย่าง\r\n', 7),
(95, 'เตาซอส\r\n', 7),
(96, 'งานติดตั้งอุปกรณ์\r\n', 7),
(97, 'งานซ่อมทั่วไป\r\n', 8),
(98, 'ก๊อกน้ำ\r\n', 8),
(99, 'เครื่องกรองน้ำ\r\n', 8),
(100, 'จอ Plasma\r\n', 8),
(101, 'ติดม่านพลาสติก\r\n', 8),
(102, 'งานติดตั้งอุปกรณ์\r\n', 8),
(103, 'กล้อง CCTV\r\n', 9),
(104, 'ถังดับเพลิง\r\n', 9),
(105, 'กำจัดแมลง\r\n', 10),
(110, 'testteqp', 16),
(111, 'เครื่องทำอาหารเเมว', 18),
(112, 'วอลเปเปอร์เเมว', 17);

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttype`
--

CREATE TABLE `equipmenttype` (
  `TypeId` int(11) NOT NULL,
  `emailRepairId` int(11) NOT NULL,
  `TypeName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `equipmenttype`
--

INSERT INTO `equipmenttype` (`TypeId`, `emailRepairId`, `TypeName`) VALUES
(3, 1, 'งานระบบ\r\n'),
(4, 1, 'ตกแต่งภายในและงานสถาปัตย์\r\n'),
(5, 2, 'งานระบบ (STORE)\r\n'),
(6, 2, 'งานซ่อมอุปกรณ์งานครัวทั่วไป\r\n'),
(7, 2, 'งานซ่อมอุปกรณ์ประกอบอาหาร\r\n'),
(8, 2, 'งานซ่อมทั่วไป\r\n'),
(9, 2, 'งานระบบความปลอดภัย\r\n'),
(10, 2, 'งานระบบ Pest Control\r\n'),
(16, 6, 'test'),
(17, 7, 'งานผนังmeow7'),
(18, 7, 'งานซ่อมMeow7'),
(20, 14, 'typea'),
(21, 14, 'typeb');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `FileUploadId` int(11) NOT NULL,
  `filename` text NOT NULL,
  `filepath` text NOT NULL,
  `NotirepairId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`FileUploadId`, `filename`, `filepath`, `NotirepairId`) VALUES
(371, 'bgupload2025-10-07.jpg', 'public//bgupload2025-10-07.jpg', 230),
(372, 'angryupload2025-10-08.png', 'public//angryupload2025-10-08.png', 231),
(373, 'bgupload2025-10-08.jpg', 'public//bgupload2025-10-08.jpg', 232),
(374, 'angryupload2025-10-08.png', 'public//angryupload2025-10-08.png', 233),
(375, 'coco_1upload2025-10-30.png', 'public//coco_1upload2025-10-30.png', 234),
(376, 'sadupload2025-11-18.png', 'public//sadupload2025-11-18.png', 235),
(378, 'sadupload2025-11-25.png', 'public//sadupload2025-11-25.png', 237),
(379, 'angryupload2025-11-26.png', 'public//angryupload2025-11-26.png', 238),
(380, 'coco_4upload2025-11-26.png', 'public//coco_4upload2025-11-26.png', 239),
(381, 'coco_4upload2025-11-26.png', 'public//coco_4upload2025-11-26.png', 240),
(382, 'coco_4upload2025-11-26.png', 'public//coco_4upload2025-11-26.png', 241),
(383, 'coco_4upload2025-11-26.png', 'public//coco_4upload2025-11-26.png', 242),
(384, 'coco_5upload2025-11-26.png', 'public//coco_5upload2025-11-26.png', 243),
(385, 'angryupload2025-11-26.png', 'public//angryupload2025-11-26.png', 244),
(386, 'angryupload2025-11-26.png', 'public//angryupload2025-11-26.png', 245),
(387, 'coco_4upload2025-11-26.png', 'public//coco_4upload2025-11-26.png', 246),
(388, 'notbadupload2025-11-26.png', 'public//notbadupload2025-11-26.png', 247),
(389, 'coco_2upload2025-11-26.png', 'public//coco_2upload2025-11-26.png', 257),
(390, 'coco_3upload2025-11-26.png', 'public//coco_3upload2025-11-26.png', 258),
(391, 'coco_5upload2025-11-26.png', 'public//coco_5upload2025-11-26.png', 259),
(392, 'angryupload2025-11-26.png', 'public//angryupload2025-11-26.png', 260),
(393, 'sadupload2025-11-26.png', 'public//sadupload2025-11-26.png', 261),
(394, 'coco_4upload2025-11-27.png', 'public//coco_4upload2025-11-27.png', 262),
(395, 'sadupload2025-11-27.png', 'public//sadupload2025-11-27.png', 263),
(396, 'angryupload2025-11-27.png', 'public//angryupload2025-11-27.png', 264),
(397, 'notbadupload2025-11-27.png', 'public//notbadupload2025-11-27.png', 265),
(398, 'coco_4upload2025-11-27.png', 'public//coco_4upload2025-11-27.png', 266),
(399, 'notbadupload2025-11-27.png', 'public//notbadupload2025-11-27.png', 267),
(400, 'coco_4upload2025-11-27.png', 'public//coco_4upload2025-11-27.png', 268),
(401, 'angryupload2025-11-27.png', 'public//angryupload2025-11-27.png', 269),
(402, 'SampleVideo_1280x720_1mbupload2025-11-27.mp4', 'public//SampleVideo_1280x720_1mbupload2025-11-27.mp4', 270),
(403, 'angryupload2025-11-27.png', 'public//angryupload2025-11-27.png', 271),
(404, 'SampleVideo_1280x720_1mbupload2025-11-27.mp4', 'public//SampleVideo_1280x720_1mbupload2025-11-27.mp4', 272),
(406, 'angryupload2025-11-27.png', 'public//angryupload2025-11-27.png', 274),
(407, 'angryupload2025-12-16.png', 'public//angryupload2025-12-16.png', 275);

-- --------------------------------------------------------

--
-- Table structure for table `notirepair`
--

CREATE TABLE `notirepair` (
  `NotirepairId` int(11) NOT NULL,
  `equipmentId` int(11) NOT NULL,
  `DateNotirepair` timestamp NOT NULL DEFAULT current_timestamp(),
  `DeatailNotirepair` text DEFAULT NULL,
  `zone` text DEFAULT NULL,
  `branch` text DEFAULT NULL,
  `closedJobs` text NOT NULL DEFAULT 'ยังไม่ปิดงาน',
  `DateCloseJobs` datetime DEFAULT NULL,
  `branchCode` varchar(10) DEFAULT NULL COMMENT 'รหัสสาขาที่ทำการแจ้งซ่อม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notirepair`
--

INSERT INTO `notirepair` (`NotirepairId`, `equipmentId`, `DateNotirepair`, `DeatailNotirepair`, `zone`, `branch`, `closedJobs`, `DateCloseJobs`, `branchCode`) VALUES
(230, 110, '2025-10-07 10:32:58', 'd', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(231, 110, '2025-10-08 05:38:39', 'c', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(232, 110, '2025-10-08 05:40:53', 'con', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(233, 110, '2025-10-08 05:44:16', 'dddd', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(234, 110, '2025-10-30 10:30:25', 'test1', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(235, 110, '2025-11-18 08:29:33', 'ff', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(237, 110, '2025-11-25 10:58:36', 'นนนน', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(238, 110, '2025-11-26 03:54:11', 'เลือก 6 ต้องส่งถึง smartmeow11@gmail.com ด้วย', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(239, 112, '2025-11-26 04:03:49', 'ส่งไปหา meow พลอยต้องเห็น', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(240, 112, '2025-11-26 04:06:20', 'ส่งหา meow พลอยต้องเห็น', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(241, 112, '2025-11-26 04:30:15', 'ส่งถึงพลอยด้วย', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(242, 112, '2025-11-26 04:48:30', 'chavanlak can see', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(243, 112, '2025-11-26 05:00:16', 'c', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(244, 112, '2025-11-26 07:06:43', 'g', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(245, 111, '2025-11-26 07:11:25', 'cccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(246, 111, '2025-11-26 07:37:59', 'kkk', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(247, 112, '2025-11-26 08:20:57', 'cccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(248, 112, '2025-11-26 08:36:19', 'นนนนนนนนนนนนนนนนนนนนนนนนนนนนน', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(249, 112, '2025-11-26 08:39:28', 'ccccccccccccccccccccccccccccccccccccccccccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(250, 112, '2025-11-26 09:14:52', 'cc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(251, 112, '2025-11-26 09:19:25', 'dd', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(252, 111, '2025-11-26 09:32:35', 'cccccccccccccccccccccccccccccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(253, 111, '2025-11-26 09:34:46', 'ssssssssss', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(254, 111, '2025-11-26 09:35:23', 'cccccccccccccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(255, 111, '2025-11-26 09:36:40', 'ccccccccccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(256, 111, '2025-11-26 09:37:33', 'd', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(257, 111, '2025-11-26 09:43:19', 'ffffffffff', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(258, 111, '2025-11-26 10:04:37', 'ccccccccccccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(259, 111, '2025-11-26 10:17:27', 'testtesttest', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(260, 111, '2025-11-26 10:32:53', 'ssssssssss', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(261, 111, '2025-11-26 10:46:23', 'cccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(262, 112, '2025-11-27 02:57:15', 'ccccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(263, 111, '2025-11-27 03:01:09', 'ccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(264, 111, '2025-11-27 03:05:06', 's', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(265, 111, '2025-11-27 03:09:13', 'sss', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(266, 112, '2025-11-27 03:37:44', 'ssssssssssss', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(267, 112, '2025-11-27 03:42:02', 'ccccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(268, 112, '2025-11-27 03:58:41', 'check', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(269, 112, '2025-11-27 04:00:51', 'หหหห', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(270, 112, '2025-11-27 04:01:51', 'นนนนน', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(271, 112, '2025-11-27 04:03:18', 'ห', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(272, 112, '2025-11-27 04:04:06', 'เเเเ', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(274, 112, '2025-11-27 05:14:49', 'cccc', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', '', '0000-00-00 00:00:00', NULL),
(275, 110, '2025-12-16 10:48:42', 'sssssss', 'chavanlak.p@ku.th', 'repaircentertgi@gmail.com', 'ยังไม่ปิดงาน', NULL, 'C01');

-- --------------------------------------------------------

--
-- Table structure for table `statustracking`
--

CREATE TABLE `statustracking` (
  `statustrackingId` int(11) NOT NULL,
  `NotirepairId` int(11) NOT NULL,
  `status` enum('ยังไม่ได้รับของ','ได้รับของเเล้ว','ส่งSuplierเเล้ว','กำลังดำเนินการซ่อม | ช่างStore','ซ่อมงานเสร็จเเล้ว | ช่างStore','ซ่อมงานเสร็จเเล้ว | Supplier') NOT NULL DEFAULT 'ยังไม่ได้รับของ',
  `statusDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `statustracking`
--

INSERT INTO `statustracking` (`statustrackingId`, `NotirepairId`, `status`, `statusDate`) VALUES
(2, 230, 'ได้รับของเเล้ว', '2025-11-21 15:09:15'),
(3, 230, 'กำลังดำเนินการซ่อม | ช่างStore', '2025-11-21 15:09:54'),
(4, 230, 'ซ่อมงานเสร็จเเล้ว | ช่างStore', '2025-11-21 15:10:15'),
(5, 231, 'ได้รับของเเล้ว', '2025-11-24 14:00:25'),
(6, 232, 'ได้รับของเเล้ว', '2025-11-25 11:35:25'),
(7, 231, 'กำลังดำเนินการซ่อม | ช่างStore', '2025-12-09 15:34:37'),
(8, 264, 'ได้รับของเเล้ว', '2025-12-09 15:36:17'),
(9, 265, 'ได้รับของเเล้ว', '2025-12-09 15:42:08'),
(10, 266, 'ได้รับของเเล้ว', '2025-12-09 15:42:14'),
(11, 265, 'ส่งSuplierเเล้ว', '2025-12-09 15:44:50'),
(12, 266, 'กำลังดำเนินการซ่อม | ช่างStore', '2025-12-09 15:49:11'),
(13, 266, 'ซ่อมงานเสร็จเเล้ว | ช่างStore', '2025-12-09 15:49:57'),
(14, 264, 'กำลังดำเนินการซ่อม | ช่างStore', '2025-12-09 16:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zoneId` int(11) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `Zone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zoneId`, `StaffName`, `email`, `Zone`) VALUES
(3, 'APICHAD', 'apichad.s@tgi.co.th', ''),
(4, 'ARNAT', 'arnutladlosri@gmail.com', ''),
(5, 'BUAPIT', 'buapit.k@tgi.co.th\r\n', NULL),
(6, 'CHANON', 'Jonteepakdeec@gmail.com\r\n', NULL),
(7, 'JADSADA', 'jedsada.j@tgi.co.th\r\n', NULL),
(8, 'JANJIRA', 'janjira.n@tgi.co.th\r\n', NULL),
(9, 'JIRAPONG', 'jirapong.p@tgi.co.th\r\n', NULL),
(10, 'JIRAPORN', 'jiraporn.n@tgi.co.th\r\n', NULL),
(11, 'KANJANA', 'kanjana.p@tgi.co.th\r\n', NULL),
(12, 'KISSADAKORN', 'kidsadakorn.r@tgi.co.th', NULL),
(13, 'MANEERATTANAPORN', 'Maneerattanaporn.buncha@gmail.com', NULL),
(14, 'NATTHIDA', 'natthathida.p@tgi.co.th', '\r\n'),
(15, 'NONTHAWAT', 'nonthawat.n@tgi.co.th', NULL),
(16, 'NUPOND', 'nupond.k@tanagroup.net', NULL),
(17, 'PANARAT', 'panarat.k@tgi.co.th', NULL),
(18, 'PASSAKORN', 'passakorn.t@tgi.co.th', NULL),
(19, 'PATCHAREE', 'patcharee.c@tgi.co.th', NULL),
(20, 'PHITCHAPHAT', 'namphung.b@tgi.co.th', NULL),
(21, 'PIYAWAN', 'Khattiyaaaa@gmail.com', NULL),
(22, 'PONGSAK', 'pongsak.p@tgi.co.th', NULL),
(23, 'PORNNIPA', 'pornnipa.porn800@gmail.com', NULL),
(24, 'PRANEE	', 'pranee.d@tgi.co.th', NULL),
(25, 'SAKUNTALA', 'sakuntara.c@tgi.co.th', NULL),
(26, 'SAOWALACK', 'saowalack.t@tgi.co.th', NULL),
(27, 'SAOWANIT', 'saowanit.p@tgi.co.th', NULL),
(28, 'SAWITREE', 'sawitree.k@tgi.co.th', NULL),
(29, 'SINEENART', 'sineenart.t@tanagroup.net', NULL),
(30, 'SOPIDA', 'sopida17021989@gmail.com', NULL),
(31, 'SUNEENET', 'suneenet.b@tanagroup.net', NULL),
(32, 'SUPAWIT', 'supawit.t@tgi.co.th', NULL),
(33, 'SUTHATHIP', 'suthathip.n@tgi.co.th', NULL),
(34, 'SUWIMOL', 'Baibua23405@gmail.com', NULL),
(35, 'TANAKORN', 'tanakorn.k@tgi.co.th', NULL),
(36, 'TECHIN', 'Techinfuji@gmail.com', NULL),
(37, 'VARICH', 'varich.1061@gmail.com', NULL),
(38, 'WANPEN', 'wanpen.t@tanagroup.net', NULL),
(39, 'WILAIWAN', 'wilaiwan.s@tgi.co.th', NULL),
(40, 'WIMOL', 'wimol.s@tgi.co.th', NULL),
(41, 'Test', 'chavanlak.p@ku.th', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emailrepair`
--
ALTER TABLE `emailrepair`
  ADD PRIMARY KEY (`emailRepairId`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentId`),
  ADD KEY `TypeId` (`TypeId`);

--
-- Indexes for table `equipmenttype`
--
ALTER TABLE `equipmenttype`
  ADD PRIMARY KEY (`TypeId`),
  ADD KEY `emailRepairId` (`emailRepairId`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`FileUploadId`),
  ADD KEY `NotirepairId` (`NotirepairId`);

--
-- Indexes for table `notirepair`
--
ALTER TABLE `notirepair`
  ADD PRIMARY KEY (`NotirepairId`),
  ADD KEY `equipmentId` (`equipmentId`);

--
-- Indexes for table `statustracking`
--
ALTER TABLE `statustracking`
  ADD PRIMARY KEY (`statustrackingId`),
  ADD KEY `NotirepairId` (`NotirepairId`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zoneId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emailrepair`
--
ALTER TABLE `emailrepair`
  MODIFY `emailRepairId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `equipmenttype`
--
ALTER TABLE `equipmenttype`
  MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `FileUploadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT for table `notirepair`
--
ALTER TABLE `notirepair`
  MODIFY `NotirepairId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `statustracking`
--
ALTER TABLE `statustracking`
  MODIFY `statustrackingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zoneId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`TypeId`) REFERENCES `equipmenttype` (`TypeId`);

--
-- Constraints for table `equipmenttype`
--
ALTER TABLE `equipmenttype`
  ADD CONSTRAINT `equipmenttype_ibfk_1` FOREIGN KEY (`emailRepairId`) REFERENCES `emailrepair` (`emailRepairId`);

--
-- Constraints for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD CONSTRAINT `fileupload_ibfk_1` FOREIGN KEY (`NotirepairId`) REFERENCES `notirepair` (`NotirepairId`);

--
-- Constraints for table `notirepair`
--
ALTER TABLE `notirepair`
  ADD CONSTRAINT `notirepair_ibfk_1` FOREIGN KEY (`equipmentId`) REFERENCES `equipment` (`equipmentId`);

--
-- Constraints for table `statustracking`
--
ALTER TABLE `statustracking`
  ADD CONSTRAINT `statustracking_ibfk_1` FOREIGN KEY (`NotirepairId`) REFERENCES `notirepair` (`NotirepairId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
