-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `datetime`;
CREATE TABLE `datetime` (
  `id_datetime` int(10) NOT NULL AUTO_INCREMENT,
  `sdate` varchar(20) NOT NULL,
  `ndate` varchar(20) NOT NULL,
  `stime` varchar(10) NOT NULL,
  `ntime` varchar(10) NOT NULL,
  `id_personal` int(10) NOT NULL,
  PRIMARY KEY (`id_datetime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `la_boss`;
CREATE TABLE `la_boss` (
  `id_boss` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_prefix` int(11) DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_boss` (`id_boss`, `id_personal`, `id_prefix`, `fname`, `lname`, `id_position`) VALUES
(1,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `la_department`;
CREATE TABLE `la_department` (
  `id_department` int(11) DEFAULT NULL,
  `namedepartment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
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
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_detail` (`id_detail`, `id_type`, `sdate`, `ndate`, `comment`, `id_personal`, `id_personal_tan`, `now_date`, `status1`, `status2`, `status3`, `file`, `namla`) VALUES
(77,	2,	'2016-08-11',	'2016-08-12',	'เป็นหวัด',	1,	0,	'2016-08-27',	'0',	'0',	'0',	'1_90_2016-08-27.pdf',	2),
(78,	2,	'2016-08-17',	'2016-08-18',	'เป็นไข้',	1,	0,	'2016-08-27',	'0',	'0',	'0',	'1_90_2016-08-27.pdf',	2),
(79,	2,	'2016-08-24',	'2016-08-25',	'ปวดหัว',	1,	0,	'2016-08-27',	'0',	'0',	'0',	'1_45_2016-08-27.pdf',	2),
(80,	1,	'2016-08-05',	'2016-08-18',	'',	1,	31,	'2016-08-27',	'0',	'0',	'0',	'',	14);

DROP TABLE IF EXISTS `la_namla`;
CREATE TABLE `la_namla` (
  `id_namla` int(100) NOT NULL AUTO_INCREMENT,
  `id_personal` int(250) NOT NULL,
  `namla` int(250) NOT NULL,
  `tatalnamla` int(250) NOT NULL,
  `collectnamla` int(250) NOT NULL,
  PRIMARY KEY (`id_namla`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `la_namla` (`id_namla`, `id_personal`, `namla`, `tatalnamla`, `collectnamla`) VALUES
(1,	1,	0,	10,	0);

DROP TABLE IF EXISTS `la_personal`;
CREATE TABLE `la_personal` (
  `id_personal` int(11) DEFAULT NULL,
  `id_prefix` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  `id_subdepart` int(11) DEFAULT NULL,
  `id_departmaent` int(11) DEFAULT NULL,
  `id_boss` int(11) DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_personal` (`id_personal`, `id_prefix`, `username`, `password`, `fname`, `lname`, `id_position`, `id_subdepart`, `id_departmaent`, `id_boss`, `tel`) VALUES
(1,	1,	'admin',	1234,	'วีรภัทร',	'กันแก้ว',	7,	4,	1,	2,	'0871775926'),
(2,	4,	'qqq',	4567,	'สมเกียรติ',	'วงษ์พานิช',	1,	0,	1,	0,	'053921444-2006'),
(3,	1,	NULL,	NULL,	'ขัติพงษ์',	'จิโนสุวัตร์',	3,	0,	1,	0,	'053921444-2330-12'),
(4,	6,	NULL,	NULL,	'ณัฐรัตน์',	'ปาณานนท์',	3,	0,	1,	0,	'053921444-1101'),
(5,	3,	NULL,	NULL,	'ดาวรรณ',	'เกิดคล้าย',	4,	1,	1,	0,	'053921444-1101'),
(6,	3,	NULL,	NULL,	'จิตติมา',	'ทองเหล็ก',	5,	1,	1,	5,	'053921444-1102'),
(7,	3,	NULL,	NULL,	'พิมพรรณ',	'ปาณานนท์',	6,	1,	1,	5,	'053921444-1104'),
(8,	2,	NULL,	NULL,	'กิตติญาพร',	'ฟูกุล',	5,	1,	1,	5,	'053921444-1107'),
(9,	1,	NULL,	NULL,	'จัตวา',	'บุญตรง',	6,	2,	1,	2,	'053921444-1234'),
(10,	2,	NULL,	NULL,	'นงนุช',	'ตนหาญ',	5,	2,	1,	2,	'053921444-1232'),
(11,	1,	NULL,	NULL,	'นิเวศน์',	'ศรีวิชัย',	5,	2,	1,	2,	'053921444-1234'),
(12,	1,	NULL,	NULL,	'วิวัฒน์',	'สิงใส',	8,	3,	1,	0,	'053921444-1113'),
(13,	2,	NULL,	NULL,	'แสงจันทร์',	'อนนทหยี',	5,	3,	1,	4,	'053921444-1113'),
(14,	3,	NULL,	NULL,	'รุ่งรัชนี',	'ทิพย์อักษร',	5,	3,	1,	4,	'053921444-1111'),
(15,	2,	NULL,	NULL,	'วิไลพร',	'สายทอง',	6,	3,	1,	4,	'053921444-1113'),
(16,	2,	NULL,	NULL,	'สุรภีพร',	'จินะใจ',	9,	3,	1,	4,	'053921444-1110'),
(17,	3,	NULL,	NULL,	'นุชนาด',	'สุขจันทร์',	9,	3,	1,	4,	'053921444-1110'),
(18,	3,	NULL,	NULL,	'วัชรา',	'บริบูรณ์',	5,	3,	1,	4,	'053921444-1113'),
(19,	3,	NULL,	NULL,	'ดุษฎี',	'ประจำดี',	5,	3,	1,	4,	'053921444-1111'),
(20,	2,	NULL,	NULL,	'อารีรักษ์',	'อัมรินทร์',	5,	3,	1,	4,	'053921444-1110'),
(21,	3,	NULL,	NULL,	'อำพร',	'ใยสามเสน',	5,	3,	1,	4,	'053921444-1803'),
(22,	2,	NULL,	NULL,	'ชุณหะกาญจน์',	'พันธ์เจริญ',	5,	3,	1,	4,	'053921444-1111'),
(23,	3,	NULL,	NULL,	'อะจิมา',	'เปงเฟย',	6,	3,	1,	4,	'053921444-1803'),
(24,	2,	NULL,	NULL,	'ภัทรมนต์',	'เมืองขวัญใจ',	5,	3,	1,	4,	'053921444-1111'),
(25,	1,	NULL,	NULL,	'จุลทรรศน์',	'จุลศรีไกวัล',	5,	3,	1,	4,	'053921444-1110'),
(26,	2,	NULL,	NULL,	'ปิยะพร',	'ณรงค์ศักดิ์',	5,	3,	1,	4,	'053921444-1111'),
(27,	1,	NULL,	NULL,	'เกรียงไกร',	'พงค์ปวน',	5,	3,	1,	4,	'053921444-1111'),
(28,	1,	NULL,	NULL,	'ชัยยันต์',	'กันธะวงค์',	7,	3,	1,	4,	'053921444-1803'),
(29,	1,	NULL,	NULL,	'ศักดิ์สิทธิ์',	'เป็งอินทร์',	7,	4,	1,	2,	'053921444-1803'),
(30,	1,	NULL,	NULL,	'จิรวัฒน์',	'แก้วรากมุข',	7,	4,	1,	2,	'053921444-1803'),
(31,	1,	NULL,	NULL,	'อุทัย',	'ลำธาร',	7,	4,	1,	2,	'053921444-1803'),
(32,	2,	NULL,	NULL,	'ประทุมพร',	'ป๋ามี',	6,	5,	1,	3,	'053921444-1103'),
(33,	1,	NULL,	NULL,	'ญาณกวี',	'ขัดสีทะลี',	6,	5,	1,	3,	'053921444-1103'),
(34,	3,	NULL,	NULL,	'วิมลมาส',	'พงศ์ธไนศวรรย์',	4,	5,	1,	3,	'053921444-1233');

DROP TABLE IF EXISTS `la_position`;
CREATE TABLE `la_position` (
  `id_position` int(11) DEFAULT NULL,
  `nameposition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
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
  `id_prefix` int(11) DEFAULT NULL,
  `nameprefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_prefix` (`id_prefix`, `nameprefix`) VALUES
(1,	'นาย'),
(2,	'นางสาว'),
(3,	'นาง'),
(4,	'ผศ.'),
(5,	'ว่าที่ร้อยตรี'),
(6,	'ว่าที่ร้อยโท');

DROP TABLE IF EXISTS `la_type`;
CREATE TABLE `la_type` (
  `id_type` int(11) DEFAULT NULL,
  `nametype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `la_type` (`id_type`, `nametype`) VALUES
(1,	'ลาพักผ่อน'),
(2,	'ลาป่วย'),
(3,	'ลากิจส่วนตัว'),
(4,	'ลาคลอดบุตร');

DROP TABLE IF EXISTS `subdepart`;
CREATE TABLE `subdepart` (
  `id_subdepart` int(11) DEFAULT NULL,
  `namesubdepart` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `subdepart` (`id_subdepart`, `namesubdepart`) VALUES
(1,	'งานบริหารทั่วไป (สนง.ผอ.)'),
(2,	'งานรับนักศึกษาใหม่'),
(3,	'งานทะเบียน'),
(4,	'งานระบบสารสนเทศ'),
(5,	'งานส่งเสริมวิชาการ');

-- 2016-08-31 01:48:23
