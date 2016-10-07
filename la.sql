-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.6.12-log
-- รุ่นของ PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `la`
--
CREATE DATABASE IF NOT EXISTS `la` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `la`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_boss`
--

CREATE TABLE IF NOT EXISTS `la_boss` (
  `id_boss` int(11) NOT NULL DEFAULT '0',
  `id_personal` int(11) DEFAULT NULL,
  `id_prefix` int(11) DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_boss`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `la_boss`
--

INSERT INTO `la_boss` (`id_boss`, `id_personal`, `id_prefix`, `fname`, `lname`, `id_position`) VALUES
(1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_department`
--

CREATE TABLE IF NOT EXISTS `la_department` (
  `id_department` int(11) NOT NULL DEFAULT '0',
  `namedepartment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `la_department`
--

INSERT INTO `la_department` (`id_department`, `namedepartment`) VALUES
(1, 'สวท.');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_detail`
--

CREATE TABLE IF NOT EXISTS `la_detail` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) DEFAULT NULL,
  `sdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ndate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_personal_tan` int(11) NOT NULL,
  `now_date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namla` int(10) DEFAULT NULL,
  `id_boss` int(5) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=87 ;

--
-- dump ตาราง `la_detail`
--

INSERT INTO `la_detail` (`id_detail`, `id_type`, `sdate`, `ndate`, `comment`, `id_personal`, `id_personal_tan`, `now_date`, `status1`, `status2`, `status3`, `file`, `namla`, `id_boss`) VALUES
(84, 1, '2016-09-29', '2016-09-30', '', 2, 30, '2016-09-29', '1', '1', '1', '', 2, 3),
(85, 2, '2016-09-10', '2016-09-11', 'เป็นไข้', 2, 0, '2016-09-29', '0', '1', '1', '', 2, 3),
(86, 1, '2016-09-29', '2016-09-30', '', 6, 0, '2016-09-29', '1', '1', '1', '', 2, 4);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_namla`
--

CREATE TABLE IF NOT EXISTS `la_namla` (
  `id_namla` int(100) NOT NULL AUTO_INCREMENT,
  `id_personal` int(250) NOT NULL,
  `namla` int(250) NOT NULL,
  `tatalnamla` int(250) NOT NULL,
  `collectnamla` int(250) NOT NULL,
  PRIMARY KEY (`id_namla`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `la_namla`
--

INSERT INTO `la_namla` (`id_namla`, `id_personal`, `namla`, `tatalnamla`, `collectnamla`) VALUES
(1, 1, 0, 10, 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_permission`
--

CREATE TABLE IF NOT EXISTS `la_permission` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `name_per` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- dump ตาราง `la_permission`
--

INSERT INTO `la_permission` (`id_per`, `name_per`) VALUES
(1, 'ผูู้ใช้งานทั่วไป'),
(2, 'ผู้อนุมัติการลา'),
(3, 'ผู้ดูแลระบบ'),
(4, 'ผู้อำนวยการ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_personal`
--

CREATE TABLE IF NOT EXISTS `la_personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `id_prefix` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  `id_subdepart` int(11) DEFAULT NULL,
  `id_departmaent` int(11) DEFAULT NULL,
  `id_boss` int(11) DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` int(5) NOT NULL,
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- dump ตาราง `la_personal`
--

INSERT INTO `la_personal` (`id_personal`, `id_prefix`, `username`, `password`, `fname`, `lname`, `id_position`, `id_subdepart`, `id_departmaent`, `id_boss`, `tel`, `permission`) VALUES
(2, 1, 'a1', 1, 'วีรภัทร', 'กันแก้ว', 7, 4, 1, 4, '0871775926', 1),
(3, 1, 'a2', 1, 'ขัติพงษ์', 'จิโนสุวัตร์', 3, 0, 1, 3, '053921444-2330-12', 2),
(4, 6, 'a4', 1, 'ณัฐรัตน์', 'ปาณานนท์', 3, 0, 1, 4, '053921444-1101', 2),
(5, 1, 'a3', 1, 'ดาวรรณ', 'เกิดคล้าย', 7, 4, 1, 0, '053921444-1102', 3),
(6, 3, 'a5', 1, 'จิตติมา', 'ทองเหล็ก', 5, 1, 1, 4, '053921444-1102', 1),
(7, 3, NULL, NULL, 'พิมพรรณ', 'ปาณานนท์', 6, 1, 1, 5, '053921444-1104', 0),
(8, 2, NULL, NULL, 'กิตติญาพร', 'ฟูกุล', 5, 1, 1, 5, '053921444-1107', 0),
(9, 1, NULL, NULL, 'จัตวา', 'บุญตรง', 6, 2, 1, 2, '053921444-1234', 0),
(10, 2, '', 0, 'นงนุช', 'ตนหาญ', 5, 2, 1, 3, '053921444-1232', 1),
(11, 1, NULL, NULL, 'นิเวศน์', 'ศรีวิชัย', 5, 2, 1, 2, '053921444-1234', 0),
(12, 1, NULL, NULL, 'วิวัฒน์', 'สิงใส', 8, 3, 1, 0, '053921444-1113', 0),
(13, 2, NULL, NULL, 'แสงจันทร์', 'อนนทหยี', 5, 3, 1, 4, '053921444-1113', 0),
(14, 3, NULL, NULL, 'รุ่งรัชนี', 'ทิพย์อักษร', 5, 3, 1, 4, '053921444-1111', 0),
(15, 2, NULL, NULL, 'วิไลพร', 'สายทอง', 6, 3, 1, 4, '053921444-1113', 0),
(16, 2, NULL, NULL, 'สุรภีพร', 'จินะใจ', 9, 3, 1, 4, '053921444-1110', 0),
(17, 3, NULL, NULL, 'นุชนาด', 'สุขจันทร์', 9, 3, 1, 4, '053921444-1110', 0),
(18, 3, NULL, NULL, 'วัชรา', 'บริบูรณ์', 5, 3, 1, 4, '053921444-1113', 0),
(19, 3, NULL, NULL, 'ดุษฎี', 'ประจำดี', 5, 3, 1, 4, '053921444-1111', 0),
(20, 2, NULL, NULL, 'อารีรักษ์', 'อัมรินทร์', 5, 3, 1, 4, '053921444-1110', 0),
(21, 3, NULL, NULL, 'อำพร', 'ใยสามเสน', 5, 3, 1, 4, '053921444-1803', 0),
(22, 2, NULL, NULL, 'ชุณหะกาญจน์', 'พันธ์เจริญ', 5, 3, 1, 4, '053921444-1111', 0),
(23, 3, NULL, NULL, 'อะจิมา', 'เปงเฟย', 6, 3, 1, 4, '053921444-1803', 0),
(24, 2, NULL, NULL, 'ภัทรมนต์', 'เมืองขวัญใจ', 5, 3, 1, 4, '053921444-1111', 0),
(25, 1, NULL, NULL, 'จุลทรรศน์', 'จุลศรีไกวัล', 5, 3, 1, 4, '053921444-1110', 0),
(26, 2, NULL, NULL, 'ปิยะพร', 'ณรงค์ศักดิ์', 5, 3, 1, 4, '053921444-1111', 0),
(27, 1, NULL, NULL, 'เกรียงไกร', 'พงค์ปวน', 5, 3, 1, 4, '053921444-1111', 0),
(28, 1, NULL, NULL, 'ชัยยันต์', 'กันธะวงค์', 7, 3, 1, 4, '053921444-1803', 0),
(29, 1, NULL, NULL, 'ศักดิ์สิทธิ์', 'เป็งอินทร์', 7, 4, 1, 2, '053921444-1803', 0),
(30, 1, NULL, NULL, 'จิรวัฒน์', 'แก้วรากมุข', 7, 4, 1, 2, '053921444-1803', 0),
(31, 1, NULL, NULL, 'อุทัย', 'ลำธาร', 7, 4, 1, 2, '053921444-1803', 0),
(32, 2, NULL, NULL, 'ประทุมพร', 'ป๋ามี', 6, 5, 1, 3, '053921444-1103', 0),
(33, 1, NULL, NULL, 'ญาณกวี', 'ขัดสีทะลี', 6, 5, 1, 3, '053921444-1103', 0),
(34, 3, NULL, NULL, 'วิมลมาส', 'พงศ์ธไนศวรรย์', 4, 5, 1, 3, '053921444-1233', 0),
(39, 4, 'a6', 1, 'สมเกียรติ', 'วงษ์พานิช', 1, 1, 1, 39, '555', 4);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_position`
--

CREATE TABLE IF NOT EXISTS `la_position` (
  `id_position` int(11) NOT NULL DEFAULT '0',
  `nameposition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `la_position`
--

INSERT INTO `la_position` (`id_position`, `nameposition`) VALUES
(1, 'ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน'),
(2, 'รองผู้อำนวยการฝ่ายสารสนเทศและประมวลผล'),
(3, 'รองผู้อำนวยการด้านส่งเสริมวิชาการ'),
(4, 'เจ้าหน้าที่บริหารงานทั่วไปชำนาญการ'),
(5, 'เจ้าหน้าที่บริหารงานทั่วไป'),
(6, 'นักวิชาการศึกษา'),
(7, 'นักวิชาการคอมพิวเตอร์'),
(8, 'หัวหน้ากลุ่มงานทะเบียน'),
(9, 'ผู้ปฎิบัติงานบริหาร');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_prefix`
--

CREATE TABLE IF NOT EXISTS `la_prefix` (
  `id_prefix` int(11) NOT NULL DEFAULT '0',
  `nameprefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `la_prefix`
--

INSERT INTO `la_prefix` (`id_prefix`, `nameprefix`) VALUES
(1, 'นาย'),
(2, 'นางสาว'),
(3, 'นาง'),
(4, 'ผศ.'),
(5, 'ว่าที่ร้อยตรี'),
(6, 'ว่าที่ร้อยโท');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_subdepart`
--

CREATE TABLE IF NOT EXISTS `la_subdepart` (
  `id_subdepart` int(11) NOT NULL DEFAULT '0',
  `namesubdepart` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_subdepart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `la_subdepart`
--

INSERT INTO `la_subdepart` (`id_subdepart`, `namesubdepart`) VALUES
(1, 'งานบริหารทั่วไป (สนง.ผอ.)'),
(2, 'งานรับนักศึกษาใหม่'),
(3, 'งานทะเบียน'),
(4, 'งานระบบสารสนเทศ'),
(5, 'งานส่งเสริมวิชาการ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `la_type`
--

CREATE TABLE IF NOT EXISTS `la_type` (
  `id_type` int(11) NOT NULL DEFAULT '0',
  `nametype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `la_type`
--

INSERT INTO `la_type` (`id_type`, `nametype`) VALUES
(1, 'ลาพักผ่อน'),
(2, 'ลาป่วย'),
(3, 'ลากิจส่วนตัว'),
(4, 'ลาคลอดบุตร');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
