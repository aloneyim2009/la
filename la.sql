-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `la_boss`;
CREATE TABLE `la_boss` (
  `id_boss` int(11) NOT NULL DEFAULT '0',
  `id_personal` int(11) DEFAULT NULL,
  `id_prefix` int(11) DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_boss`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_boss` (`id_boss`, `id_personal`, `id_prefix`, `fname`, `lname`, `id_position`) VALUES
(1,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `la_department`;
CREATE TABLE `la_department` (
  `id_department` int(11) NOT NULL DEFAULT '0',
  `namedepartment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_department` (`id_department`, `namedepartment`) VALUES
(1,	'สำนักส่งเสริมวิชาการและงานทะเบียน');

DROP TABLE IF EXISTS `la_detail`;
CREATE TABLE `la_detail` (
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
  `numlatotal` int(5) NOT NULL,
  `id_boss` int(5) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `la_permission`;
CREATE TABLE `la_permission` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `name_per` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_permission` (`id_per`, `name_per`) VALUES
(1,	'ผูู้ใช้งานทั่วไป'),
(2,	'ผู้อนุมัติการลา'),
(3,	'ผู้ดูแลระบบ'),
(4,	'ผู้อำนวยการ');

DROP TABLE IF EXISTS `la_personal`;
CREATE TABLE `la_personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `id_prefix` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_position` int(11) DEFAULT NULL,
  `id_subdepart` int(11) DEFAULT NULL,
  `id_departmaent` int(11) DEFAULT NULL,
  `id_boss` int(11) DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` int(5) NOT NULL,
  `colagela` int(5) NOT NULL,
  `imgper` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_personal` (`id_personal`, `id_prefix`, `username`, `password`, `fname`, `lname`, `email`, `id_position`, `id_subdepart`, `id_departmaent`, `id_boss`, `tel`, `permission`, `colagela`, `imgper`) VALUES
(2,	1,	'a1',	1,	'วีรภัทร',	'กันแก้ว',	'wrphat@hotmail.com',	7,	4,	1,	4,	'0871775926',	1,	3,	''),
(3,	1,	'a2',	1,	'ขัติพงษ์',	'จิโนสุวัตร์',	'',	2,	0,	1,	3,	'053921444-2330-12',	2,	0,	'kp'),
(4,	6,	'a3',	1,	'ณัฐรัตน์',	'ปาณานนท์',	'',	3,	0,	1,	4,	'053921444-1101',	2,	0,	'np'),
(5,	3,	'a4',	1,	'ดาวรรณ',	'เกิดคล้าย',	'',	4,	4,	1,	0,	'053921444-1102',	3,	0,	'dw'),
(6,	3,	'a5',	1,	'จิตติมา',	'ทองเหล็ก',	'',	5,	1,	1,	4,	'053921444-1102',	1,	0,	''),
(7,	3,	'1',	NULL,	'พิมพรรณ',	'ปาณานนท์',	'',	6,	1,	1,	5,	'053921444-1104',	0,	0,	''),
(8,	2,	'1',	NULL,	'กิตติญาพร',	'ฟูกุล',	'',	5,	1,	1,	5,	'053921444-1107',	0,	0,	''),
(9,	1,	'1',	NULL,	'จัตวา',	'บุญตรง',	'',	6,	2,	1,	2,	'053921444-1234',	0,	0,	''),
(10,	2,	'1',	0,	'นงนุช',	'ตนหาญ',	'',	5,	2,	1,	3,	'053921444-1232',	1,	0,	''),
(11,	1,	'1',	NULL,	'นิเวศน์',	'ศรีวิชัย',	'',	5,	2,	1,	2,	'053921444-1234',	0,	0,	''),
(12,	1,	'1',	NULL,	'วิวัฒน์',	'สิงใส',	'',	8,	3,	1,	0,	'053921444-1113',	0,	0,	''),
(13,	2,	'1',	NULL,	'แสงจันทร์',	'อนนทหยี',	'',	5,	3,	1,	4,	'053921444-1113',	0,	0,	''),
(14,	3,	'1',	NULL,	'รุ่งรัชนี',	'ทิพย์อักษร',	'',	5,	3,	1,	4,	'053921444-1111',	0,	0,	''),
(15,	2,	'1',	NULL,	'วิไลพร',	'สายทอง',	'',	6,	3,	1,	4,	'053921444-1113',	0,	0,	''),
(16,	2,	'1',	NULL,	'สุรภีพร',	'จินะใจ',	'',	9,	3,	1,	4,	'053921444-1110',	0,	0,	''),
(17,	3,	'1',	NULL,	'นุชนาด',	'สุขจันทร์',	'',	9,	3,	1,	4,	'053921444-1110',	0,	0,	''),
(18,	3,	'1',	NULL,	'วัชรา',	'บริบูรณ์',	'',	5,	3,	1,	4,	'053921444-1113',	0,	0,	''),
(19,	3,	'1',	NULL,	'ดุษฎี',	'ประจำดี',	'',	5,	3,	1,	4,	'053921444-1111',	0,	0,	''),
(20,	2,	'1',	NULL,	'อารีรักษ์',	'อัมรินทร์',	'',	5,	3,	1,	4,	'053921444-1110',	0,	0,	''),
(21,	3,	'1',	NULL,	'อำพร',	'ใยสามเสน',	'',	5,	3,	1,	4,	'053921444-1803',	0,	0,	''),
(22,	2,	'1',	NULL,	'ชุณหะกาญจน์',	'พันธ์เจริญ',	'',	5,	3,	1,	4,	'053921444-1111',	0,	0,	''),
(23,	3,	'1',	NULL,	'อะจิมา',	'เปงเฟย',	'',	6,	3,	1,	4,	'053921444-1803',	0,	0,	''),
(24,	2,	'1',	NULL,	'ภัทรมนต์',	'เมืองขวัญใจ',	'',	5,	3,	1,	4,	'053921444-1111',	0,	0,	''),
(25,	1,	'1',	NULL,	'จุลทรรศน์',	'จุลศรีไกวัล',	'',	5,	3,	1,	4,	'053921444-1110',	0,	0,	''),
(26,	2,	'1',	NULL,	'ปิยะพร',	'ณรงค์ศักดิ์',	'',	5,	3,	1,	4,	'053921444-1111',	0,	0,	''),
(27,	1,	'1',	NULL,	'เกรียงไกร',	'พงค์ปวน',	'',	5,	3,	1,	4,	'053921444-1111',	0,	0,	''),
(28,	1,	'1',	NULL,	'ชัยยันต์',	'กันธะวงค์',	'',	7,	3,	1,	4,	'053921444-1803',	0,	0,	''),
(29,	1,	'1',	NULL,	'ศักดิ์สิทธิ์',	'เป็งอินทร์',	'',	7,	4,	1,	2,	'053921444-1803',	0,	0,	''),
(30,	1,	'1',	NULL,	'จิรวัฒน์',	'แก้วรากมุข',	'',	7,	4,	1,	2,	'053921444-1803',	0,	0,	''),
(31,	1,	'1',	NULL,	'อุทัย',	'ลำธาร',	'',	7,	4,	1,	2,	'053921444-1803',	0,	0,	''),
(32,	2,	'1',	NULL,	'ประทุมพร',	'ป๋ามี',	'',	6,	5,	1,	3,	'053921444-1103',	0,	0,	''),
(33,	1,	'1',	NULL,	'ญาณกวี',	'ขัดสีทะลี',	'',	6,	5,	1,	3,	'053921444-1103',	0,	0,	''),
(34,	3,	'1',	NULL,	'วิมลมาส',	'พงศ์ธไนศวรรย์',	'',	4,	5,	1,	3,	'053921444-1233',	0,	0,	''),
(39,	4,	'a8',	1,	'สมเกียรติ',	'วงษ์พานิช',	'',	1,	1,	1,	39,	'555',	4,	0,	'sk');

DROP TABLE IF EXISTS `la_position`;
CREATE TABLE `la_position` (
  `id_position` int(11) NOT NULL DEFAULT '0',
  `nameposition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_position` (`id_position`, `nameposition`) VALUES
(1,	'ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน'),
(2,	'รองผู้อำนวยการฝ่ายสารสนเทศและประมวลผล'),
(3,	'รองผู้อำนวยการด้านส่งเสริมวิชาการ'),
(4,	'เจ้าหน้าที่บริหารงานทั่วไปชำนาญการ'),
(5,	'เจ้าหน้าที่บริหารงานทั่วไป'),
(6,	'นักวิชาการศึกษา'),
(7,	'นักวิชาการคอมพิวเตอร์'),
(8,	'หัวหน้ากลุ่มงานทะเบียน'),
(9,	'ผู้ปฎิบัติงานบริหาร');

DROP TABLE IF EXISTS `la_prefix`;
CREATE TABLE `la_prefix` (
  `id_prefix` int(11) NOT NULL DEFAULT '0',
  `nameprefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_prefix` (`id_prefix`, `nameprefix`) VALUES
(1,	'นาย'),
(2,	'นางสาว'),
(3,	'นาง'),
(4,	'ผศ.'),
(5,	'ว่าที่ร้อยตรี'),
(6,	'ว่าที่ร้อยโท');

DROP TABLE IF EXISTS `la_subdepart`;
CREATE TABLE `la_subdepart` (
  `id_subdepart` int(11) NOT NULL DEFAULT '0',
  `namesubdepart` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_subdepart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_subdepart` (`id_subdepart`, `namesubdepart`) VALUES
(1,	'งานบริหารทั่วไป (สนง.ผอ.)'),
(2,	'งานรับนักศึกษาใหม่'),
(3,	'งานทะเบียน'),
(4,	'งานระบบสารสนเทศ'),
(5,	'งานส่งเสริมวิชาการ');

DROP TABLE IF EXISTS `la_type`;
CREATE TABLE `la_type` (
  `id_type` int(11) NOT NULL DEFAULT '0',
  `nametype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_type` (`id_type`, `nametype`) VALUES
(1,	'ลาพักผ่อน'),
(2,	'ลาป่วย'),
(3,	'ลากิจส่วนตัว'),
(4,	'ลาคลอดบุตร');

-- 2016-10-18 00:35:22
