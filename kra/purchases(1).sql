-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2019 at 11:52 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receipt_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` float NOT NULL,
  `unit_price` float NOT NULL,
  `vat` float NOT NULL,
  `vat_pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'declared',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `customer_id`, `name`, `receipt_number`, `description`, `quantity`, `total_price`, `unit_price`, `vat`, `vat_pin`, `sub_total`, `date`, `time`, `supplier_id`, `sku`, `STATUS`) VALUES
(2, 3, 'papers', '', 'Aldestor long', 250, 8750, 35, 1206.9, '', 7543.1, '2019-06-16', '17:26:00', 3, '', 'declared'),
(3, 3, 'Papers', '', 'These are ream papers', 100, 9000, 90, 1241.38, '', 7758.62, '2019-07-16', '12:00:00', 4, '', 'undeclared'),
(4, 4, 'Peas', '', 'Sweet', 5, 2500, 500, 344.828, '', 2155.17, '2019-07-20', '10:17:00', 6, 'ab36b781', 'undeclared'),
(5, 82, 'Forex', '', '5mm forex white', 1, 1800, 1800, 248.276, '', 1551.72, '2019-07-18', '14:20:00', 7, '88ffe79a', 'undeclared'),
(6, 5, 'NCR Paper Mid Blue', '', 'mid blue essy 55g', 3, 9300, 3100, 1282.76, '', 8017.24, '2019-07-22', '06:10:00', 5, '052ff413', 'undeclared'),
(7, 5, 'NCR Bottom Yellow', '', '55g Essy', 3, 9300, 3100, 1282.76, '', 8017.24, '2019-07-22', '07:11:00', 5, '2bb4b738', 'undeclared'),
(8, 6, 'Mt Kenya Milk', '', 'Whole milk', 5, 500, 100, 68.9655, '', 431.034, '2019-07-22', '10:30:00', 6, 'c67614c9', 'undeclared'),
(9, 8, 'Cream', '', 'Sweet cream', 50, 1000, 20, 137.931, '', 862.069, '2019-07-22', '10:42:00', 8, '3bf1cb68', 'undeclared'),
(10, 8, 'Cream', '', 'Sweet cream', 50, 1000, 20, 137.931, '', 862.069, '2019-07-22', '10:42:00', 8, '23c6b706', 'declared'),
(12, 3, 'Peas', '0000001', 'Sweet', 50, 5000, 100, 689.655, '', 4310.34, '2019-07-22', '16:30:00', 6, 'ab36b781', 'declared'),
(13, 9, 'ROCEPHINE', 'CS001180024', 'ROCEPHINE I.V 1G VIAL', 1, 1550, 1550, 213.793, '', 1336.21, '2019-07-26', '17:39:00', 9, 'b3e3e02b', 'declared'),
(14, 6, 'chvbnm', 'vbnm', 'vbn,m', 3, 66, 22, 9.10345, '', 56.8966, '2019-07-10', '15:00:00', 6, 'ebb56721', 'undeclared'),
(15, 3, 'bbncm,,', '63156', 'dfghjnb', 5, 2500, 500, 344.828, '', 2155.17, '2019-07-09', '14:38:00', 3, '51faf6aa', 'declared'),
(16, 5, 'Rocephine 1.V 1GM VIAL', 'CS001180024', '1.V 1GM VIAL', 1, 1550, 1550, 213.793, '', 1336.21, '2019-07-26', '17:44:00', 5, 'cd4bb33d', 'declared'),
(17, 10, 'Mill Bakers', '3058100', 'DAZ 180g Asst', 2, 90, 45, 12.4138, '', 77.5862, '2019-07-29', '14:21:00', 10, '8f1f1bea', 'declared'),
(18, 3, 'Milk', '00098', 'Sweet', 5, 250, 50, 34.4828, '', 215.517, '2019-07-30', '05:16:00', 3, 'b317a69e', 'declared'),
(19, 11, 'Mill bakers', '6355588', '200g asst', 2, 90, 45, 12.4138, '', 77.5862, '2019-07-29', '20:40:00', 11, '6ed680e1', 'undeclared'),
(20, 12, 'PICCALO', '3345', 'Number 40', 1, 2500, 2500, 344.828, '', 2155.17, '2019-07-26', '19:09:00', 12, '660a0997', 'declared'),
(21, 13, 'cvbnm,', '56nj', 'nbm,.', 8, 16000, 2000, 2206.9, '', 13793.1, '2019-07-02', '10:15:00', 13, '8f202320', 'undeclared'),
(22, 3, 'Mt Kenya Milk', '987654321', 'Box', 2, 1000, 500, 137.931, '', 862.069, '2019-07-30', '11:22:00', 3, '329a45cf', 'declared'),
(23, 14, 'KCC Milk', '2250', 'Fresh', 3, 900, 300, 124.138, '', 775.862, '2019-07-30', '13:41:00', 14, '28ded29f', 'declared'),
(24, 15, 'wwwwww', '5565', 'ppppppp', 2, 100, 50, 13.7931, '', 86.2069, '2019-07-30', '14:11:00', 15, 'c28bd6b6', 'declared'),
(25, 3, 'Milk', '3030', 'Mala', 5, 250, 50, 34.4828, '', 215.517, '2019-07-30', '14:49:00', 16, '47f970a4', 'declared'),
(26, 3, 'Cakes', '000001', 'Sweet', 1, 1000, 1000, 137.931, '', 862.069, '2019-07-30', '17:05:00', 17, '444e4f53', 'declared'),
(27, 3, 'Carpets', '55', '', 8, 4000, 500, 551.724, '', 3448.28, '2019-07-30', '18:48:00', 18, 'd7bb2b29', 'declared'),
(28, 3, 'Bagd', '8801', 'Classy bags', 12, 30000, 2500, 4137.93, '', 25862.1, '2019-07-30', '19:44:00', 19, '4e01589f', 'declared'),
(29, 3, 'Abuja Long', '130165', 'Abuja Long', 4, 228, 57, 31.4483, '', 196.552, '2019-07-10', '19:54:00', 20, 'ec52eee4', 'declared'),
(30, 5, 'Abuja Long 1/33', '130160', 'Abuja Long', 4, 228, 57, 31.4483, '', 196.552, '0000-00-00', '00:00:00', 21, '58b6dc01', 'declared'),
(31, 0, '$product_name', '$receipt_number', '$description', 100, 100, 10, 0, '', 1000, '0000-00-00', '00:00:00', 0, '$insert_sku', 'declared'),
(32, 5, 'test', '5364', '', 5, 1925, 385, 265.517, '', 1659.48, '2019-07-18', '00:00:00', 0, 'e843adcd', 'declared'),
(33, 3, 'p/copy', '5364', '', 6, 1925, 350, 265.517, '', 1659.48, '2019-07-30', '19:15:00', 0, '4965f479', 'declared'),
(34, 3, 'p/copy', '5364', '', 6, 1925, 350, 265.517, '', 1659.48, '2019-07-30', '11:32:00', 3, 'cdcc3c78', 'declared'),
(45, 3, 'Pins', '0002', 'sharp', 1, 200, 200, 27.5862, '', 172.414, '2019-07-31', '00:00:00', 6, '5a3a19c7', 'declared'),
(47, 3, 'Tuzo Milk', '2563', 'Whole fresh', 5, 250, 50, 34.4828, '', 215.517, '2019-08-01', '08:55:00', 22, '50e926a0', 'declared'),
(57, 5, 'Photo copy paper', '5364', 'bond 80g', 6, 1925, 350, 265.517, '', 1659.48, '2019-07-30', '13:12:00', 4, '307204aa', 'declared'),
(61, 5, 'Samosa', '1022722795', 'Samosa(beef)', 2, 120, 60, 16.5517, '', 103.448, '2019-07-26', '00:00:00', 29, '549083a3', 'declared'),
(62, 5, 'Samosa', '1022722795', 'Samosa(beef)', 2, 120, 60, 16.5517, '', 103.448, '2019-07-26', '00:00:00', 29, 'e36bebd4', 'declared'),
(63, 5, 'Samosa', '1022722711', 'Samosa(beef)', 4, 240, 60, 33.1034, '', 206.897, '2019-07-26', '00:00:00', 29, 'b88629b0', 'declared'),
(64, 5, 'Sausage', '1022722711', 'Sausage', 4, 240, 60, 33.1034, '', 206.897, '2019-07-26', '00:00:00', 29, 'ea723a99', 'declared'),
(65, 5, 'Andazi', '1022722711', 'Andazi', 2, 100, 50, 13.7931, '', 86.2069, '2019-07-26', '00:00:00', 29, 'afa05f01', 'declared'),
(66, 5, 'Sugar', '3040605', 'Jacmil Local Sugar 2kg', 1, 184, 184, 25.3793, '', 158.621, '2019-07-18', '00:00:00', 10, '9bb446a3', 'declared'),
(67, 5, 'Crisps', '3040605', 'T/H Salted potato crisps 200g', 1, 140, 140, 19.3103, '', 120.69, '2019-07-18', '00:00:00', 10, '48ffd63f', 'declared'),
(68, 5, 'cooking oil', '3040605', 'Fresh Fri 3ltrs', 1, 480, 480, 66.2069, '', 413.793, '2019-07-18', '00:00:00', 10, '5886cdc6', 'declared'),
(70, 5, 'Embossed Bond', '034181', 'Emb. Bd Rhino Dark Blue A1 220g', 1, 140, 140, 19.3103, '', 120.69, '2019-07-10', '16:28:00', 30, 'c93087ca', 'declared'),
(71, 3, 'Softcare High col', '137997', 'High col NT M42', 1, 585, 585, 80.6897, '', 504.31, '2019-08-12', '14:04:00', 31, 'e589940b', 'declared'),
(72, 3, 'EMB BD RHINO DARK BLUE A1 220 GMS', '034181', 'Dark blue A1', 2, 140, 70, 19.3103, '', 120.69, '2019-07-10', '16:28:00', 32, '93c0d437', 'declared'),
(73, 16, 'books', '3456', '', 1, 10, 10, 1.37931, '', 8.62069, '2019-08-13', '18:00:00', 33, 'a49fadef', 'declared'),
(74, 16, 'pencils', '1254', '', 1, 50, 50, 6.89655, '', 43.1034, '2019-08-12', '10:00:00', 34, '5d38245c', 'undeclared'),
(75, 17, 'hhhhh', '89856', '', 0, 0, 0, 0, '', 0, '2019-08-14', '15:00:00', 35, '6fcef4f7', 'declared'),
(76, 17, 'hhhhh', '89856', '', 0, 0, 0, 0, '', 0, '2019-08-14', '15:00:00', 35, '903733aa', 'declared'),
(77, 17, 'hhhhh', '89856', '', 0, 0, 0, 0, '', 0, '2019-08-14', '15:00:00', 36, '6f45038c', 'declared'),
(78, 17, 'hhhhh', '89856', '', 0, 0, 0, 0, '', 0, '2019-08-14', '15:00:00', 36, '67c559b7', 'declared'),
(79, 17, 'fdgfg', '345rt', 'reterrte rryt ththn bgrtt ttr', 5, 678, 135.6, 40, '', 638, '2019-08-14', '05:06:00', 37, '2b940b41', 'declared'),
(80, 17, 'hhhhh', '89856', '', 1, 1, 1, 2, '', -1, '2019-08-14', '15:00:00', 36, '7b33ce37', 'declared'),
(81, 17, 'KING PAPER PUNCH', '039105', 'PAPER PUNCH', 1, 140, 140, 19.3103, '', 120.69, '2019-08-13', '16:39:00', 30, '4a1f69a6', 'declared'),
(82, 3, 'AZHAR SELFADHESIVE TIC', '039103', '', 1, 8750, 8750, 1206.9, '', 7543.1, '2019-08-13', '16:36:00', 30, '1d733c47', 'declared'),
(83, 11, 'memems', '55555', '12245', 52, 26000, 500, 20, NULL, 25980, '2019-08-02', '20:20:00', 14, '7f6f7548', 'undeclared'),
(84, 11, 'selected', 'm9990', 'null', 332, 6640, 20, 20, NULL, 6620, '2019-02-08', '20:02:00', 15, '99558d6a', 'undeclared'),
(85, 11, 'brooks', 'se234567', 'null and void', 20, 2000, 100, 16, NULL, 1984, '2017-02-20', '10:10:00', 16, 'b4e83944', 'declared'),
(86, 11, 'brooks', 'se234567', 'null and void', 20, 2000, 100, 16, NULL, 1984, '2017-02-20', '10:10:00', 5, '615401c9', 'undeclared'),
(87, 11, 'softcare', '137997', 'softcare', 20, 11700, 585, 16, NULL, 11684, '2019-08-12', '05:00:00', 6, '247d1691', 'undeclared'),
(88, 11, 'blouehost supplies', '788898', 'examples', 20, 2000, 100, 16, NULL, 1984, '2019-08-07', '03:02:00', 17, 'e628384f', 'undeclared'),
(89, 11, 'mailed', '5874784', 'neletion', 20, 2000, 100, 275.862, NULL, 1724.14, '2019-08-15', '09:00:00', 18, 'ad7ba520', 'undeclared'),
(90, 13, 'nameless', '789878', 'nameless product', 20, 2000, 100, 275.862, NULL, 1724.14, '1998-01-12', '23:02:00', 19, '2ee411b5', 'declared'),
(91, 13, 'matumbo beans', '8596987', 'product exists always', 200, 20000, 100, 2758.62, NULL, 17241.4, '2019-08-23', '20:01:00', 20, '3f981837', 'declared'),
(92, 13, 'brand new', '87985895', 'alerting product', 20, 4000, 200, 551.724, NULL, 3448.28, '2019-08-30', '20:22:00', 21, '73c9a17e', 'declared');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
