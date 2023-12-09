-- Adminer 4.8.1 MySQL 10.4.21-MariaDB-log dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `applicant_payment`;
CREATE TABLE `applicant_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `official_receipt` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `applicant_payment` (`payment_id`, `applicant_id`, `name`, `official_receipt`, `service`, `amount`, `date_created`) VALUES
(38,	50,	'Mark Lumongsod',	'2023-231267',	'Braces',	'45,000.00',	'2023-09-13 01:15:03 PM'),
(39,	54,	'James Albert',	'2023-123213',	'Whitening',	'1,000.00',	'2023-09-18 05:12:40 PM');

DROP TABLE IF EXISTS `booking_applicant`;
CREATE TABLE `booking_applicant` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_code` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `appointment_date` varchar(50) NOT NULL,
  `appointment_time` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `booking_applicant` (`booking_id`, `appointment_code`, `name`, `email`, `phone_number`, `service`, `price`, `appointment_date`, `appointment_time`, `remark`, `date_created`) VALUES
(56,	'OM063-0000069556',	'Mark Lumongsod',	'mark@example.com',	'09123456789',	'Resto',	'800',	'2023-10-31',	'9:30am - 10:30am',	'',	'2023-10-31 09:17:39 AM'),
(57,	'OM063-0000057937',	'Mark Lumongsod',	'mark@example.com',	'09123456789',	'Extraction',	'800',	'2023-10-31',	'10:30am - 11:30am',	'',	'2023-10-31 09:24:37 AM'),
(58,	'OM063-0000084221',	'Mark Lumongsod',	'mark@example.com',	'23213213223',	'Denture',	'2500',	'2023-11-01',	'9:30am - 10:30am',	'',	'2023-10-31 09:51:38 AM');

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `update_created` varchar(100) NOT NULL,
  PRIMARY KEY (`inventory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `inventory` (`inventory_id`, `supply_name`, `quantity`, `date_created`, `update_created`) VALUES
(1,	'Mouthwash',	'10',	'2023-09-13 01:15:03 PM',	'2023-09-17 02:43:18 PM'),
(4,	'Explorer',	'5',	'2023-09-17 02:44:43 PM',	' '),
(5,	'Bib',	'5',	'2023-09-17 02:46:02 PM',	' '),
(6,	'Bib Clip',	'5',	'2023-09-17 02:46:13 PM',	' '),
(7,	'Cheek Retractor',	'15',	'2023-09-17 02:46:35 PM',	' '),
(8,	'Torch',	'10',	'2023-09-17 02:46:45 PM',	' '),
(9,	'Distal End Cutter',	'5',	'2023-09-17 02:47:06 PM',	' '),
(10,	'Ligature Wire',	'15',	'2023-09-17 02:47:28 PM',	' '),
(11,	'Spoon Excavator',	'10',	'2023-09-17 02:47:48 PM',	' '),
(12,	'Burs',	'10',	'2023-09-17 02:47:58 PM',	' '),
(13,	'Composites',	'10',	'2023-09-17 02:48:09 PM',	' '),
(14,	'Dental Floss',	'30',	'2023-09-17 02:48:23 PM',	' '),
(15,	'Low Speed ',	'5',	'2023-09-17 02:48:37 PM',	' '),
(16,	'Prophy Powder',	'10',	'2023-09-17 02:48:54 PM',	' '),
(17,	'Matrixband',	'10',	'2023-09-17 02:49:06 PM',	' '),
(18,	'Anesthesia',	'50',	'2023-09-17 02:49:31 PM',	' '),
(19,	'K Files',	'10',	'2023-09-17 02:49:48 PM',	' '),
(20,	'K Spreader',	'10',	'2023-09-17 02:50:05 PM',	' '),
(21,	'Paper Point',	'10',	'2023-09-17 02:50:19 PM',	' '),
(22,	'Needle',	'50',	'2023-09-17 02:50:45 PM',	' '),
(23,	'Topical',	'50',	'2023-09-17 02:50:58 PM',	' '),
(24,	'Microbrush',	'10',	'2023-09-17 02:51:17 PM',	' '),
(25,	'Impression Tray',	'20',	'2023-09-17 02:51:34 PM',	' '),
(26,	'Ligaties',	'10',	'2023-09-17 02:51:43 PM',	' '),
(27,	'Deffoger ',	'10',	'2023-09-17 02:52:03 PM',	' '),
(28,	'Cotton Flyer',	'15',	'2023-09-17 02:52:14 PM',	' '),
(29,	'Mouth Mirror',	'10',	'2023-09-17 02:52:26 PM',	' '),
(30,	'Forceps',	'15',	'2023-09-17 02:52:38 PM',	' '),
(31,	'Cotton',	'15',	'2023-09-17 02:52:49 PM',	' '),
(32,	'Gloves',	'15',	'2023-09-17 02:53:02 PM',	' '),
(33,	'Gauze',	'20',	'2023-09-17 02:53:13 PM',	' '),
(34,	'Rubber Bowl',	'25',	'2023-09-17 02:53:23 PM',	' '),
(35,	'Mataw',	'25',	'2023-09-17 02:53:34 PM',	' '),
(36,	'Alginate',	'50',	'2023-09-17 02:54:07 PM',	'2023-09-17 04:09:08 PM'),
(37,	'Bracket Holder',	'50',	'2023-09-17 02:54:21 PM',	' '),
(38,	'Wax',	'20',	'2023-09-17 02:54:31 PM',	' ');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `acc_id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`acc_id`, `username`, `password`) VALUES
(2,	'admin',	'admin');

-- 2023-10-31 02:06:35
