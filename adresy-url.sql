-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Lut 2017, 15:42
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adresy-url`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` varchar(24) COLLATE utf8_polish_ci NOT NULL,
  `photo` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `rodzaj` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `format` varchar(24) COLLATE utf8_polish_ci NOT NULL,
  `cena` decimal(9,2) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `tekst` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=180 ;

--
-- Zrzut danych tabeli `cart`
--

INSERT INTO `cart` (`id`, `cart_id`, `photo`, `rodzaj`, `format`, `cena`, `ilosc`, `tekst`, `status`, `time`) VALUES
(1, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-30 14:53:55'),
(2, 'cart-56fa4d6c29fda', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-30 14:55:08'),
(3, 'cart-56fa4d6c29fda', ' photo/test/smerek_4.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-30 14:59:08'),
(4, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 12:51:58'),
(5, 'cart-56fa4d6c29fda', ' photo/test/smerek_4.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 12:58:38'),
(6, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:03:07'),
(7, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:04:58'),
(8, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:05:43'),
(9, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:07:43'),
(10, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:09:08'),
(11, 'cart-56fa4d6c29fda', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:09:11'),
(12, 'cart-56fa4d6c29fda', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:09:39'),
(13, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:10:15'),
(14, 'cart-56fa4d6c29fda', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:10:46'),
(15, 'cart-56fa4d6c29fda', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:11:09'),
(16, 'cart-56fa4d6c29fda', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 13:11:21'),
(17, 'cart-56fd1d72cedc4', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 14:52:02'),
(18, 'cart-56fd1d72cedc4', ' photo/test/smerek_4.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 14:52:07'),
(19, 'cart-56fd1d72cedc4', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 14:52:57'),
(20, 'cart-56fd1d72cedc4', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 14:53:12'),
(21, 'cart-56fd1d72cedc4', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2016-03-31 14:53:13'),
(22, 'cart-56fe3e718e30d', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-04-01 11:25:05'),
(23, 'cart-56fe3e718e30d', ' photo/kolekcja/Bronx-New-York.jpg ', '', '', '0.00', 0, '', NULL, '2016-04-01 11:25:12'),
(24, 'cart-56fe3e718e30d', ' photo/kolekcja/Bronx-New-York.jpg ', '', '', '0.00', 0, '', NULL, '2016-04-01 11:25:34'),
(25, 'cart-56fe3e718e30d', ' photo/kolekcja/Country-road.jpg ', '', '', '0.00', 0, '', NULL, '2016-04-01 11:25:50'),
(26, 'cart-56fe3e718e30d', ' photo/kolekcja/oberirdische-Stromleitungen.jpg ', '', '', '0.00', 0, '', NULL, '2016-04-01 11:26:12'),
(27, 'cart-5811ee2280ec2', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-10-27 14:08:02'),
(28, 'cart-5811ee2280ec2', ' photo/kolekcja/espace.jpg ', '', '', '0.00', 0, '', NULL, '2016-10-27 14:08:21'),
(29, 'cart-5811ee2280ec2', ' photo/kolekcja/young-woman-kite-surfer.jpg ', '', '', '0.00', 0, '', NULL, '2016-10-27 14:08:42'),
(30, 'cart-584ac40d5cf32', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-09 15:47:41'),
(31, 'cart-584ac40d5cf32', ' photo/kolekcja/Bronx-New-York.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-09 15:47:44'),
(32, 'cart-584e934097e42', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-12 13:08:32'),
(33, 'cart-584e934097e42', ' photo/kolekcja/Black-tornado.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-12 13:08:46'),
(34, 'cart-584e934097e42', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-12 15:42:02'),
(35, 'cart-584e934097e42', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-12 15:42:36'),
(36, 'cart-584e934097e42', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-12 15:42:50'),
(37, 'cart-584fead1ee60a', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-13 13:34:25'),
(38, 'cart-584fead1ee60a', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-13 13:35:33'),
(39, 'cart-584fead1ee60a', ' photo/kolekcja/Bronx-New-York.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-13 13:35:37'),
(40, 'cart-584fead1ee60a', ' photo/kolekcja/Black-tornado.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-21 15:19:37'),
(41, 'cart-584fead1ee60a', ' photo/kolekcja/gram.jpg ', '', '', '0.00', 0, '', NULL, '2016-12-21 15:19:47'),
(42, 'cart-584fead1ee60a', ' photo/kolekcja/kitesurfer.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-04 15:15:14'),
(43, 'cart-584fead1ee60a', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-05 12:44:14'),
(44, 'cart-584fead1ee60a', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-09 15:20:04'),
(45, 'cart-584fead1ee60a', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-09 15:42:55'),
(46, 'cart-588612f4bdff8', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-23 15:28:04'),
(47, 'cart-588612f4bdff8', ' photo/kolekcja/young-woman-kite-surfer.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-23 15:28:12'),
(48, 'cart-58861449be7f0', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-23 15:33:45'),
(49, 'cart-58861449be7f0', ' photo/kolekcja/Black-tornado.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-23 15:34:08'),
(50, 'cart-58909c04cd5da', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-31 15:15:32'),
(51, 'cart-58909c04cd5da', ' photo/test/smerek_2.jpg ', '', '', '0.00', 0, '', NULL, '2017-01-31 15:15:36'),
(52, 'cart-5891aa34041eb', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2017-02-01 10:28:20'),
(53, 'cart-5891aa34041eb', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 10:28:26'),
(54, 'cart-5891aa34041eb', ' photo/test/smerek_4.jpg ', '', '', '0.00', 0, '', NULL, '2017-02-01 10:28:30'),
(55, 'cart-5891aa34041eb', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2017-02-01 10:29:11'),
(56, 'cart-5891aa34041eb', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 10:30:11'),
(57, 'cart-5891aa34041eb', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 10:41:27'),
(58, 'cart-5891aa34041eb', ' photo/test/smerek_4.jpg ', '', '', '0.00', 0, '', NULL, '2017-02-01 10:51:34'),
(59, 'cart-5891aa34041eb', ' photo/test/smerek_1.jpg ', '', '', '0.00', 0, '', NULL, '2017-02-01 10:52:21'),
(60, 'cart-5891aa34041eb', ' photo/test/smerek_3.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 10:53:18'),
(61, 'cart-5891aa34041eb', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 11:12:46'),
(62, 'cart-5891aa34041eb', ' photo/kolekcja/Black-tornado.jpg ', '', '', '0.00', 0, '', 1, '2017-02-01 11:39:42'),
(63, 'cart-5891aa34041eb', ' photo/kolekcja/espace.jpg ', '', '', '0.00', 0, '', 1, '2017-02-01 12:28:03'),
(64, 'cart-5891aa34041eb', ' photo/kolekcja/gram.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 12:29:00'),
(65, 'cart-5891eabd6bd9b', ' photo/kolekcja/Black-tornado.jpg ', '', '', '0.00', 0, '', 1, '2017-02-01 15:03:41'),
(66, 'cart-5891eabd6bd9b', ' photo/kolekcja/Colored-Apartment.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 15:03:46'),
(67, 'cart-5891eabd6bd9b', ' photo/kolekcja/espace.jpg ', '', '', '0.00', 0, '', 1, '2017-02-01 15:03:49'),
(68, 'cart-5891eabd6bd9b', ' photo/kolekcja/Girl-in-auditorium.jpg ', '', '', '0.00', 0, '', 1, '2017-02-01 15:05:37'),
(70, 'cart-584fead1ee60a', ' photo/kolekcja/Colored-Apartment.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 15:28:16'),
(71, 'cart-584fead1ee60a', ' photo/kolekcja/espace.jpg ', '', '', '0.00', 0, '', 0, '2017-02-01 15:28:37'),
(72, 'cart-589327c7d98f9', ' photo/kolekcja/Black-coffee.jpg ', '', '', '0.00', 0, '', 1, '2017-02-02 13:36:23'),
(73, 'cart-589327c7d98f9', ' photo/kolekcja/Black-tornado.jpg ', '', '', '0.00', 0, '', 0, '2017-02-02 13:36:27'),
(74, 'cart-589327c7d98f9', ' photo/kolekcja/Country-road.jpg ', '', '', '0.00', 0, '', 1, '2017-02-02 13:36:31'),
(75, 'cart-589327c7d98f9', ' photo/kolekcja/espace.jpg ', '', '', '0.00', 0, '', 1, '2017-02-02 13:36:34'),
(76, 'cart-589327c7d98f9', 'photo/kolekcja/kitesurfer.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:00:38'),
(77, 'cart-58932e5b83e2f', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:04:27'),
(78, 'cart-58932e5b83e2f', 'photo/kolekcja/young-woman-kite-surfer.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:04:33'),
(79, 'cart-58932e5b83e2f', 'photo/kolekcja/Welcome-Bronx.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:04:36'),
(80, 'cart-58932e5b83e2f', 'photo/kolekcja/Sydney-Opera.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:04:39'),
(81, 'cart-58932e5b83e2f', 'photo/kolekcja/Country-road.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:08:36'),
(82, 'cart-58932e5b83e2f', 'photo/kolekcja/espace.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:08:38'),
(83, 'cart-58932e5b83e2f', 'photo/kolekcja/Girl-in-auditorium.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:08:41'),
(84, 'cart-58932e5b83e2f', 'photo/kolekcja/Colored-Apartment.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:09:20'),
(85, 'cart-58932e5b83e2f', 'photo/kolekcja/espace.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:09:34'),
(86, 'cart-58932e5b83e2f', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:27:14'),
(87, 'cart-58932e5b83e2f', 'photo/kolekcja/Black-tornado.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:27:17'),
(88, 'cart-58932e5b83e2f', 'photo/kolekcja/Bronx-New-York.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:27:20'),
(89, 'cart-58932e5b83e2f', 'photo/kolekcja/Black-tornado.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:27:22'),
(90, 'cart-58932e5b83e2f', 'photo/kolekcja/Black-tornado.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:31:41'),
(91, 'cart-58932e5b83e2f', 'photo/kolekcja/Bronx-New-York.jpg', '', '', '0.00', 0, '', 1, '2017-02-02 14:31:44'),
(92, 'cart-58932e5b83e2f', 'photo/kolekcja/Colored-Apartment.jpg', '', '', '0.00', 0, '', 1, '2017-02-02 14:31:46'),
(93, 'cart-58932e5b83e2f', 'photo/kolekcja/Black-tornado.jpg', '', '', '0.00', 0, '', 1, '2017-02-02 14:31:48'),
(94, 'cart-584fead1ee60a', 'photo/kolekcja/Black-tornado.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:45:47'),
(95, 'cart-584fead1ee60a', 'photo/kolekcja/Bronx-New-York.jpg', '', '', '0.00', 0, '', 1, '2017-02-02 14:45:50'),
(96, 'cart-584fead1ee60a', 'photo/kolekcja/espace.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:45:53'),
(97, 'cart-584fead1ee60a', 'photo/kolekcja/Bronx-New-York.jpg', '', '', '0.00', 0, '', 0, '2017-02-02 14:45:56'),
(101, 'cart-58932e5b83e2f', 'path', '', '', '0.00', 0, '', 0, '2017-02-02 16:02:40'),
(102, 'cart-58932e5b83e2f', 'photo/kolekcja/gram.jpg', '', '', '0.00', 0, '', 1, '2017-02-02 16:04:22'),
(103, 'cart-584fead1ee60a', 'photo/kolekcja/young-woman-kite-surfer.jpg', '', '', '0.00', 0, '', 1, '2017-02-02 16:12:52'),
(104, 'cart-589447618bf22', 'photo/kolekcja/Bronx-New-York.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 10:03:29'),
(105, 'cart-589447618bf22', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 10:03:34'),
(106, 'cart-589447618bf22', 'photo/kolekcja/Country-road.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 10:03:39'),
(107, 'cart-589447618bf22', 'photo/kolekcja/Girl-in-auditorium.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 10:03:42'),
(108, 'cart-589447618bf22', 'photo/kolekcja/gram.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 10:03:45'),
(109, 'cart-58944c0f17b31', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:23:27'),
(110, 'cart-58944c0f17b31', 'photo/kolekcja/Black-tornado.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:23:30'),
(111, 'cart-58944c0f17b31', 'photo/kolekcja/Country-road.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:23:33'),
(112, 'cart-58944c0f17b31', 'photo/kolekcja/Girl-in-auditorium.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:23:36'),
(113, 'cart-58944c0f17b31', 'photo/kolekcja/Herd-of-Llamas.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:23:39'),
(114, 'cart-58944c0f17b31', 'photo/kolekcja/kites-flying.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:23:42'),
(115, 'cart-58944c0f17b31', 'photo/kolekcja/kitesurfer.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:23:53'),
(116, 'cart-58944c0f17b31', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 10:24:02'),
(117, 'cart-58944c0f17b31', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:39:44'),
(118, 'cart-58944c0f17b31', 'photo/kolekcja/Bronx-New-York.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:39:46'),
(119, 'cart-58944c0f17b31', 'photo/kolekcja/Country-road.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:39:48'),
(120, 'cart-58944c0f17b31', 'photo/kolekcja/gitara.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:39:51'),
(121, 'cart-58944c0f17b31', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:54:28'),
(122, 'cart-58944c0f17b31', 'photo/kolekcja/espace.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:54:31'),
(123, 'cart-58944c0f17b31', 'photo/kolekcja/gram.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 12:54:34'),
(124, 'cart-58944c0f17b31', 'photo/kolekcja/kites-flying.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:54:36'),
(125, 'cart-58944c0f17b31', 'photo/kolekcja/kitesurfer.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 12:54:38'),
(126, 'cart-58944c0f17b31', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:55:41'),
(127, 'cart-58944c0f17b31', 'photo/kolekcja/Girl-in-auditorium.jpg', '', '', '0.00', 0, '', 1, '2017-02-03 12:55:55'),
(128, 'cart-58944c0f17b31', 'photo/kolekcja/gitara.jpg', '', '', '0.00', 0, '', 0, '2017-02-03 12:55:57'),
(129, 'cart-584fead1ee60a', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 1, '2017-02-07 11:57:10'),
(130, 'cart-5899a8be8a8a3', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 0, '2017-02-07 12:00:14'),
(131, 'cart-5899a8e7b08d2', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 1, '2017-02-07 12:00:55'),
(132, 'cart-5899a8be8a8a3', 'photo/kolekcja/Black-tornado.jpg', '', '', '0.00', 0, '', 0, '2017-02-07 12:05:55'),
(133, 'cart-5899a8e7b08d2', 'photo/kolekcja/Country-road.jpg', '', '', '0.00', 0, '', 0, '2017-02-07 13:03:46'),
(134, 'cart-5899a8be8a8a3', 'photo/kolekcja/Bronx-New-York.jpg', '', '', '0.00', 0, '', 0, '2017-02-07 13:09:24'),
(135, 'cart-5899a8be8a8a3', 'photo/kolekcja/Girl-in-auditorium.jpg', '', '', '0.00', 0, '', 0, '2017-02-07 13:09:26'),
(136, 'cart-5899a8be8a8a3', 'photo/kolekcja/gram.jpg', '', '', '0.00', 0, '', 1, '2017-02-07 13:09:29'),
(137, 'cart-5899a8be8a8a3', 'photo/kolekcja/espace.jpg', '', '', '0.00', 0, '', 1, '2017-02-07 13:11:02'),
(138, 'cart-5899dd40745db', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 1, '2017-02-07 15:44:16'),
(139, 'cart-58a5af5997e41', 'photo/kolekcja/Black-coffee.jpg', '', '', '0.00', 0, '', 1, '2017-02-16 14:55:37'),
(140, 'cart-58a5af5997e41', 'photo/kolekcja/Black-coffee.jpg', '', '10x15', '0.00', 4, '', 0, '2017-02-16 15:15:44'),
(141, 'cart-58a5af5997e41', 'photo/kolekcja/Black-tornado.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 0, '', 1, '2017-02-16 15:21:49'),
(142, 'cart-58a5af5997e41', 'photo/kolekcja/Black-coffee.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 0, '', 1, '2017-02-16 21:57:32'),
(143, 'cart-58a5af5997e41', 'photo/kolekcja/gram.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 0, '', 1, '2017-02-17 12:54:43'),
(144, 'cart-58a5af5997e41', 'photo/kolekcja/Bronx-New-York.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 0, '', 0, '2017-02-17 13:05:45'),
(145, 'cart-58a5af5997e41', 'photo/kolekcja/Bronx-New-York.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 0, '', 0, '2017-02-17 13:07:11'),
(146, 'cart-58a5af5997e41', 'photo/kolekcja/Bronx-New-York.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 3, '', 1, '2017-02-17 13:08:12'),
(147, 'cart-58a5af5997e41', 'photo/kolekcja/kites-flying.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 7, 'Misio i długi napis na zdjęciu', 1, '2017-02-17 13:13:53'),
(148, 'cart-58aae9f87cefd', 'photo/kolekcja/Black-coffee.jpg', 'Zdjęcie portretowe', '10x15', '0.00', 7, 'Misio i długi napis na zdjęciu', 0, '2017-02-20 14:07:04'),
(149, 'cart-58aae9f87cefd', 'photo/kolekcja/Black-coffee.jpg', 'Kartka świąteczna', '10x15', '7.00', 7, 'Misio i długi napis na zdjęciu', 1, '2017-02-20 14:10:33'),
(150, 'cart-58aae9f87cefd', 'photo/kolekcja/Black-tornado.jpg', 'Obraz na półtnie', '30x40', '40.00', 7, 'Misio i długi napis na zdjęciu', 1, '2017-02-20 14:11:08'),
(151, 'cart-58aae9f87cefd', 'photo/kolekcja/Black-coffee.jpg', 'Zdjęcie portretowe', '10x15', '6.00', 7, 'Misio i długi napis na zdjęciu', 1, '2017-02-20 14:11:57'),
(152, 'cart-58aae9f87cefd', 'photo/kolekcja/Bronx-New-York.jpg', 'Zdjęcie grupowe', '15x21', '8.00', 7, 'Misio i długi napis na zdjęciu', 1, '2017-02-20 14:42:26'),
(153, 'cart-58aae9f87cefd', 'photo/kolekcja/Girl-in-auditorium.jpg', 'Kartka świąteczna', '10x15', '7.00', 3, 'Misio i długi napis na zdjęciu', 1, '2017-02-20 15:17:18'),
(154, 'cart-58aae9f87cefd', 'photo/kolekcja/Black-tornado.jpg', 'Zdjęcie portretowe', '13x18', '7.00', 10, 'Misio i długi napis na zdjęciu', 1, '2017-02-20 15:18:33'),
(155, 'cart-58aae9f87cefd', 'photo/kolekcja/Black-tornado.jpg', 'Zdjęcie portretowe', '20x30', '11.00', 2, 'Misio i długi napis na zdjęciu', 1, '2017-02-20 15:18:39'),
(156, 'cart-58ac145969cd9', 'photo/kolekcja/Black-coffee.jpg', 'Zdjęcie portretowe', '15x21', '8.00', 12, 'Misio i długi napis na zdjęciu', 0, '2017-02-21 11:20:09'),
(157, 'cart-58ac145969cd9', 'photo/kolekcja/gram.jpg', 'Kartka świąteczna', '10x15', '7.00', 9, '', 0, '2017-02-21 11:24:56'),
(158, 'cart-58ac145969cd9', 'photo/kolekcja/Herd-of-Llamas.jpg', 'Kartka świąteczna', '10x15', '7.00', 8, 'Wesołych', 0, '2017-02-21 11:26:38'),
(159, 'cart-58ac145969cd9', 'photo/kolekcja/Black-tornado.jpg', 'Zdjęcie grupowe', '15x21', '8.00', 1, '', 1, '2017-02-21 11:28:14'),
(160, 'cart-58ac145969cd9', 'photo/kolekcja/Black-coffee.jpg', 'Plakat', '50x70', '23.00', 1, '', 0, '2017-02-21 12:21:36'),
(161, 'cart-58ac145969cd9', 'photo/kolekcja/Black-coffee.jpg', 'Plakat', '60x84', '30.00', 1, '', 0, '2017-02-21 12:21:38'),
(162, 'cart-58ac145969cd9', 'photo/kolekcja/gitara.jpg', 'Zdjęcie portretowe', '15x21', '81.00', 1, 'Happy', 1, '2017-02-21 13:37:37'),
(163, 'cart-58ac145969cd9', 'photo/kolekcja/kites-flying.jpg', 'Zdjęcie portretowe', '20x30', '12.00', 1, 'DUŻY NAPIS', 0, '2017-02-21 13:43:43'),
(164, 'cart-58ac145969cd9', 'photo/kolekcja/gram.jpg', 'Zdjęcie portretowe', '10x15', '6.00', 1, '', 0, '2017-02-21 13:44:51'),
(165, 'cart-58ac145969cd9', 'photo/kolekcja/Bronx-New-York.jpg', 'Zestaw 6 kartek świątecznych', '10x15', '31.00', 1, '', 1, '2017-02-21 13:46:08'),
(166, 'cart-58ac145969cd9', 'photo/kolekcja/wooden-board.jpg', 'Zdjęcie portretowe', '15x21', '8.00', 1, '', 0, '2017-02-21 13:50:33'),
(167, 'cart-58ac145969cd9', 'photo/kolekcja/wooden-board.jpg', 'Zdjęcie portretowe', '20x30', '11.00', 1, '', 0, '2017-02-21 13:50:49'),
(168, 'cart-58ac145969cd9', 'photo/kolekcja/wooden-board.jpg', 'Kartka świąteczna', '10x15', '8.00', 1, 'Happy', 1, '2017-02-21 13:51:10'),
(169, 'cart-58ad5cc5087d0', 'photo/kolekcja/Black-tornado.jpg', 'Zdjęcie portretowe', '13x18', '7.00', 5, '', 0, '2017-02-22 10:41:25'),
(170, 'cart-58ad5cc5087d0', 'photo/kolekcja/Black-tornado.jpg', 'Kartka świąteczna', '10x15', '8.00', 5, 'Z napisem', 1, '2017-02-22 10:43:15'),
(171, 'cart-58ad5cc5087d0', 'photo/kolekcja/Bronx-New-York.jpg', 'Zdjęcie portretowe', '10x15', '7.55', 1, 'Jakiś napis', 1, '2017-02-22 10:57:57'),
(172, 'cart-58ad5cc5087d0', 'photo/kolekcja/Black-coffee.jpg', 'Zdjęcie portretowe', '13x18', '7.25', 1, '', 0, '2017-02-22 11:50:11'),
(173, 'cart-58ad5cc5087d0', 'photo/kolekcja/Colored-Apartment.jpg', 'Zdjęcie portretowe', '13x18', '8.25', 3, 'Happy', 1, '2017-02-22 11:51:24'),
(174, 'cart-58ad5cc5087d0', 'photo/kolekcja/Colored-Apartment.jpg', 'Kartka świąteczna', '10x15', '7.00', 1, '', 0, '2017-02-22 13:29:06'),
(175, 'cart-58ad5cc5087d0', 'photo/kolekcja/Colored-Apartment.jpg', 'Zdjęcie portretowe', '10x15', '6.00', 1, '', 1, '2017-02-22 13:29:09'),
(176, 'cart-58ad5cc5087d0', 'photo/kolekcja/Bronx-New-York.jpg', 'Plakat', '60x84', '30.00', 1, '', 1, '2017-02-22 13:29:39'),
(177, 'cart-58aec416b70ee', 'photo/kolekcja/Black-coffee.jpg', 'Zdjęcie portretowe', '10x15', '6.00', 1, '', 0, '2017-02-23 12:14:30'),
(178, 'cart-58aec416b70ee', 'photo/kolekcja/Black-tornado.jpg', 'Zdjęcie grupowe', '15x21', '8.00', 1, '', 0, '2017-02-23 13:59:02'),
(179, 'cart-58aec416b70ee', 'photo/kolekcja/Bronx-New-York.jpg', 'Zdjęcie w formie magnesu', '5x7.5', '6.00', 1, '', 1, '2017-02-23 13:59:41');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `strony`
--

CREATE TABLE IF NOT EXISTS `strony` (
  `id_strony` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url_text` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_strony`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `strony`
--

INSERT INTO `strony` (`id_strony`, `url`, `url_text`, `title`, `content`, `folder`, `pass`, `date`, `status`) VALUES
(1, '/adresy-url/?p=1', '/strefa-klienta/wpis-testowy', 'Pierwszy wpis', '<h1>Tworzenie skrótów adresów Poproszę hasło</h1>\r\nDzięki wykorzystaniu mod_rewrite możemy utworzyć "skróty" do często używanych obszarów stron WWW.\r\nZakładamy, iż większość odwiedzających stronę sklepu z odzieżą z zamiarem kupienia spodni wpisze do przeglądarki:\r\nwww.firma.pl/spodnie\r\nJednakże oprogramowanie naszego sklepu wymaga linków w postaci:\r\nwww.firma.pl/odziez/spodnie', 'test', 'pass', '2015-12-03 15:51:39', ''),
(2, '/adresy-url/?p=2', '/strefa-klienta/ustalenie-adresu-url2', 'Ustalenie adresu URL2', 'Działanie skryptu index.php rozpoczynamy od ustalenia folderu bazowego oraz adresu URL bieżącego żądania HTTP. Zadania te realizują funkcje url_manage_get_rootdir() oraz url_manage_get_request_url() przedstawione na listingach 1 i 2.\r\n<u>This line of text will render as underlined</u>', 'test', '', '2015-12-09 13:48:48', ''),
(3, '/adresy-url/?p=3', '/strefa-klienta/zamiana-znakow', 'Zamiana znaków', 'Do zamiany znaków, np. spacji na _ najlepiej użyć funkcji PHP, która się nazywa str_replace. Jej składnia wygląda następująco', '', '', '2015-12-09 14:16:41', ''),
(4, '/adresy-url/?p=4', '/strefa-klienta/polskie-znaki', 'Polskie znaki', 'W notatkach opery jeszcze mam takie coś :) Może się przydać... znalezione gdzieś w sieci...', '', '', '2015-12-09 14:30:34', ''),
(7, '/adresy-url/?p=7', '/strefa-klienta/kiedy-zaczynaem', 'Kiedy zaczynałem', 'Kiedy zaczynałem swoją przygodę z programowaniem obiektowym szybko trafiłem na tutoriale i wszelkiego rodzaju inne kursy, które pokazywały jak wykorzystywać struktury obiektowe w kodzie. Niestety większość z nich demonstrowało jedynie, jak napisać swoją pierwszą klasę, interfejs, czy też stworzyć obiekt. Wszystko sprowadzało się do “gramatyki” języka, czyli słów kluczy, sposobu tworzenia tych struktur, itp. Gdzieś po drodze “gubiła się” jednak informacja skąd takie, a nie inne decyzje, dlaczego np. interfejs ma same metody abstrakcyjne? Do tego publiczne? Po co te widoczności? I tak dalej.', '', '', '2015-12-10 14:48:09', ''),
(8, '/adresy-url/?p=8', '/strefa-klienta/co-to-jest-oop', 'Co to jest OOP?', 'OOP, czyli dosłownie Obiektowo Orientowane Programowanie (ang. Obejct-Oriented Programming), to sposób tworzenia oprogramowania polegający na tworzeniu klas, czyli pewnego rodzaju pojemników na funkcje (choć z czasem dowiemy się, że możliwości klas wykraczają daleko poza pełnienie roli „pojemników”). Dzięki takiemu podejściu skracamy czas bezpośredniego tworzenia aplikacji. Najpierw musimy poświęcić trochę czasu na stworzenie odpowiednich klas, które obsłużą naszą aplikację, ale jeśli zrobimy to dobrze, to będziemy je mogli wykorzystywać w wielu innych projektach.\r\n\r\nTeraz więc nauczę Was na prostym przykładzie co to są klasy, a później zajmiemy się zasadami ich jak najlepszego tworzenia.', '', '', '2015-12-11 14:24:35', ''),
(10, '/adresy-url/?p=10', '/strefa-klienta/jak-stworzy-dobr-klas', 'Jak stworzyć dobrą klasę', 'Aby tworzyć dobre klasy, musimy poznać zasady ich tworzenia, możliwości OOP i nabyć trochę wprawy. Zacznę od tego, że elementy klasy, czyli wszystkie zmienne i funkcje mogą mieć jeden z trzech modyfikatorów widzialności: public, private, protected. Są to pewnego rodzaju definicje tego, gdzie z danej zmiennej czy metody można korzystać i, w przypadku zmiennych, czy można je modyfikować i gdzie.', '', '', '2015-12-11 14:34:38', ''),
(11, '/adresy-url/?p=11', '/strefa-klienta/klasa-z-punktu-widzenia', 'Klasa, z punktu widzenia', 'Klasa, z punktu widzenia programowania, jest to typ zmiennej. Natomiast w ujęciu projektowym jest to ogólna definicja pewnej grupy powiązanych ze sobą obiektów, które różnią się tożsamością. Klasa definiuje metody, czyli funkcjonalność, które są dostarczane przez obiekty. Poza tym definiuje również atrybuty, które są indywidualne (nie zawsze, ale do tego tematu wrócimy w przyszłości) dla konkretnych obiektów. Czym jest obiekt? Jest to instancja danej klasy, czyli konkretna zmienna danego typu.', '', '', '2015-12-11 15:17:29', ''),
(12, '/adresy-url/?p=12', '/strefa-klienta/mobile-first', 'Mobile first', 'With Bootstrap 2, we added optional mobile friendly styles for key aspects of the framework. With Bootstrap 3, we''ve rewritten the project to be mobile friendly from the start. Instead of adding on optional mobile styles, they''re baked right into the core. In fact, Bootstrap is mobile first. Mobile first styles can be found throughout the entire library instead of in separate files.\r\n\r\nTo ensure proper rendering and touch zooming, add the viewport meta tag to your', '', '', '2015-12-16 13:28:39', ''),
(14, '/adresy-url/?p=14', '/strefa-klienta/nocna-walka', 'Nocna walka', '9 grudnia 2015 r. Pełnomocnik Ministra Obrony Narodowej ds. Utworzenia Centrum Eksperckiego Kontrwywiadu NATO Bartłomiej Misiewicz wprowadził nowego p.o. dyrektora CEK NATO płk. Roberta Balę do tymczasowych pomieszczeń CEK NATO użyczonych przez Służbę Kontrwywiadu Wojskowego - poinformowało Ministerstwo Obrony Narodowej. WCK 2', '', '', '2015-12-18 09:20:22', ''),
(15, '/adresy-url/?p=15', '/strefa-klienta/devopsdays-warsaw-2015-za-nami', 'DevOpsDays Warsaw 2015 za nami', 'Polska edycja międzynarodowej konferencji DevOpsDays przyciągnęła ponad 400 entuzjastów DevOps z Polski i ze świata. 2-dniowe spotkanie odbyło się 24-25 listopada w warszawskim hotelu Gromada Airport, a innowacyjna formuła konferencji okazała się strzałem w dziesiątkę! Zobaczcie, dlaczego kultura DevOps jest obecnie jednym z najgorętszych tematów w branży IT.', '', '', '2015-12-21 15:33:15', ''),
(16, '/adresy-url/?p=16', '/strefa-klienta/czy-zastanawiales-sie-kiedys', 'Czy zastanawiałeś się kiedyś', 'Zacznijmy od tego, że programowanie obiektowe w PHP można wykorzystać na różne sposoby. Część z tych sposobów pozwala tworzyć niezwykłe systemy, a część – jest czasami sztuką dla sztuki ( co wprowadza więcej zamieszania niż pożytku ). Jednym z tych sensownych zastosowań, jest tworzenie niezależnych komponentów – swego rodzaju „klocków”, które raz napisane, mogą zostać wykorzystane w wielu projektach ( i przez różnych programistów ). Jeśli zostanie to dobrze zrobione, będą one wygodne, funkcjonalne – i pozwolą zaoszczędzić mnóstwo czasu. I chociaż jest to jedynie preludium tego, co można uzyskać dzięki OOP ( w połączeniu z odpowiednim sposobem myślenia, dobrze zaprojektowaną architekturą MVC, wyjątkami czy automatycznymi systemami testowania aplikacji ), to już tylko ten etap pozwoli Ci inaczej spojrzeć na Twoje projekty.', '', '', '2015-12-21 15:35:50', ''),
(17, '/adresy-url/?p=17', '/strefa-klienta/przykladowa-kolekcja', 'Przykładowa kolekcja', 'Prezydent Andrzej Duda odbył dwustronną rozmowę z prezydentem USA Barackiem Obamą przy okazji oficjalnej kolacji w Białym Domu dla uczestników Szczytu Bezpieczeństwa Nuklearnego. Prezydenci rozmawiali m.in. o szczycie NATO w Warszawie i sytuacji wokół TK w Polsce - poinformował prezydencki minister Krzysztof Szczerski.\r\n\r\nAndrzej Duda przebywa w Waszyngtonie od wtorku. W czwartek wieczorem wziął udział w oficjalnej kolacji wydanej przez prezydenta Stanów Zjednoczonych dla wszystkich kilkudziesięciu przywódców państw i organizacji przybyłych na czwarty Szczyt Bezpieczeństwa Nuklearnego.\r\n\r\nPrezydencki minister poinformował polskich dziennikarzy w czwartek wieczorem czasu lokalnego, że na marginesie kolacji doszło do rozmowy prezydentów Polski i USA.', 'kolekcja', '', '2016-04-01 09:10:30', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `strony_backup`
--

CREATE TABLE IF NOT EXISTS `strony_backup` (
  `id_strony` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url_text` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_strony`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `strony_backup`
--

INSERT INTO `strony_backup` (`id_strony`, `url`, `url_text`, `title`, `content`, `folder`, `pass`, `date`, `status`) VALUES
(1, '/adresy-url/?p=1', '/strefa-klienta/wpis-testowy', 'Pierwszy wpis', '<h1>Tworzenie skrótów adresów Poproszę hasło</h1>\r\nDzięki wykorzystaniu mod_rewrite możemy utworzyć "skróty" do często używanych obszarów stron WWW.\r\nZakładamy, iż większość odwiedzających stronę sklepu z odzieżą z zamiarem kupienia spodni wpisze do przeglądarki:\r\nwww.firma.pl/spodnie\r\nJednakże oprogramowanie naszego sklepu wymaga linków w postaci:\r\nwww.firma.pl/odziez/spodnie', 'test', 'pass', '2015-12-03 15:51:39', ''),
(2, '/adresy-url/?p=2', '/strefa-klienta/ustalenie-adresu-url2', 'Ustalenie adresu URL2', 'Działanie skryptu index.php rozpoczynamy od ustalenia folderu bazowego oraz adresu URL bieżącego żądania HTTP. Zadania te realizują funkcje url_manage_get_rootdir() oraz url_manage_get_request_url() przedstawione na listingach 1 i 2.\r\n<u>This line of text will render as underlined</u>', 'test', '', '2015-12-09 13:48:48', ''),
(3, '/adresy-url/?p=3', '/strefa-klienta/zamiana-znakow', 'Zamiana znaków', 'Do zamiany znaków, np. spacji na _ najlepiej użyć funkcji PHP, która się nazywa str_replace. Jej składnia wygląda następująco', '', '', '2015-12-09 14:16:41', ''),
(4, '/adresy-url/?p=4', '/strefa-klienta/polskie-znaki', 'Polskie znaki', 'W notatkach opery jeszcze mam takie coś :) Może się przydać... znalezione gdzieś w sieci...', '', '', '2015-12-09 14:30:34', ''),
(7, '/adresy-url/?p=7', '/strefa-klienta/kiedy-zaczynaem', 'Kiedy zaczynałem', 'Kiedy zaczynałem swoją przygodę z programowaniem obiektowym szybko trafiłem na tutoriale i wszelkiego rodzaju inne kursy, które pokazywały jak wykorzystywać struktury obiektowe w kodzie. Niestety większość z nich demonstrowało jedynie, jak napisać swoją pierwszą klasę, interfejs, czy też stworzyć obiekt. Wszystko sprowadzało się do “gramatyki” języka, czyli słów kluczy, sposobu tworzenia tych struktur, itp. Gdzieś po drodze “gubiła się” jednak informacja skąd takie, a nie inne decyzje, dlaczego np. interfejs ma same metody abstrakcyjne? Do tego publiczne? Po co te widoczności? I tak dalej.', '', '', '2015-12-10 14:48:09', ''),
(8, '/adresy-url/?p=8', '/strefa-klienta/co-to-jest-oop', 'Co to jest OOP?', 'OOP, czyli dosłownie Obiektowo Orientowane Programowanie (ang. Obejct-Oriented Programming), to sposób tworzenia oprogramowania polegający na tworzeniu klas, czyli pewnego rodzaju pojemników na funkcje (choć z czasem dowiemy się, że możliwości klas wykraczają daleko poza pełnienie roli „pojemników”). Dzięki takiemu podejściu skracamy czas bezpośredniego tworzenia aplikacji. Najpierw musimy poświęcić trochę czasu na stworzenie odpowiednich klas, które obsłużą naszą aplikację, ale jeśli zrobimy to dobrze, to będziemy je mogli wykorzystywać w wielu innych projektach.\r\n\r\nTeraz więc nauczę Was na prostym przykładzie co to są klasy, a później zajmiemy się zasadami ich jak najlepszego tworzenia.', '', '', '2015-12-11 14:24:35', ''),
(10, '/adresy-url/?p=10', '/strefa-klienta/jak-stworzy-dobr-klas', 'Jak stworzyć dobrą klasę', 'Aby tworzyć dobre klasy, musimy poznać zasady ich tworzenia, możliwości OOP i nabyć trochę wprawy. Zacznę od tego, że elementy klasy, czyli wszystkie zmienne i funkcje mogą mieć jeden z trzech modyfikatorów widzialności: public, private, protected. Są to pewnego rodzaju definicje tego, gdzie z danej zmiennej czy metody można korzystać i, w przypadku zmiennych, czy można je modyfikować i gdzie.', '', '', '2015-12-11 14:34:38', ''),
(11, '/adresy-url/?p=11', '/strefa-klienta/klasa-z-punktu-widzenia', 'Klasa, z punktu widzenia', 'Klasa, z punktu widzenia programowania, jest to typ zmiennej. Natomiast w ujęciu projektowym jest to ogólna definicja pewnej grupy powiązanych ze sobą obiektów, które różnią się tożsamością. Klasa definiuje metody, czyli funkcjonalność, które są dostarczane przez obiekty. Poza tym definiuje również atrybuty, które są indywidualne (nie zawsze, ale do tego tematu wrócimy w przyszłości) dla konkretnych obiektów. Czym jest obiekt? Jest to instancja danej klasy, czyli konkretna zmienna danego typu.', '', '', '2015-12-11 15:17:29', ''),
(12, '/adresy-url/?p=12', '/strefa-klienta/mobile-first', 'Mobile first', 'With Bootstrap 2, we added optional mobile friendly styles for key aspects of the framework. With Bootstrap 3, we''ve rewritten the project to be mobile friendly from the start. Instead of adding on optional mobile styles, they''re baked right into the core. In fact, Bootstrap is mobile first. Mobile first styles can be found throughout the entire library instead of in separate files.\r\n\r\nTo ensure proper rendering and touch zooming, add the viewport meta tag to your', '', '', '2015-12-16 13:28:39', ''),
(14, '/adresy-url/?p=14', '/strefa-klienta/nocna-walka', 'Nocna walka', '9 grudnia 2015 r. Pełnomocnik Ministra Obrony Narodowej ds. Utworzenia Centrum Eksperckiego Kontrwywiadu NATO Bartłomiej Misiewicz wprowadził nowego p.o. dyrektora CEK NATO płk. Roberta Balę do tymczasowych pomieszczeń CEK NATO użyczonych przez Służbę Kontrwywiadu Wojskowego - poinformowało Ministerstwo Obrony Narodowej. WCK 2', '', '', '2015-12-18 09:20:22', ''),
(15, '/adresy-url/?p=15', '/strefa-klienta/devopsdays-warsaw-2015-za-nami', 'DevOpsDays Warsaw 2015 za nami', 'Polska edycja międzynarodowej konferencji DevOpsDays przyciągnęła ponad 400 entuzjastów DevOps z Polski i ze świata. 2-dniowe spotkanie odbyło się 24-25 listopada w warszawskim hotelu Gromada Airport, a innowacyjna formuła konferencji okazała się strzałem w dziesiątkę! Zobaczcie, dlaczego kultura DevOps jest obecnie jednym z najgorętszych tematów w branży IT.', '', '', '2015-12-21 15:33:15', ''),
(16, '/adresy-url/?p=16', '/strefa-klienta/czy-zastanawiales-sie-kiedys', 'Czy zastanawiałeś się kiedyś', 'Zacznijmy od tego, że programowanie obiektowe w PHP można wykorzystać na różne sposoby. Część z tych sposobów pozwala tworzyć niezwykłe systemy, a część – jest czasami sztuką dla sztuki ( co wprowadza więcej zamieszania niż pożytku ). Jednym z tych sensownych zastosowań, jest tworzenie niezależnych komponentów – swego rodzaju „klocków”, które raz napisane, mogą zostać wykorzystane w wielu projektach ( i przez różnych programistów ). Jeśli zostanie to dobrze zrobione, będą one wygodne, funkcjonalne – i pozwolą zaoszczędzić mnóstwo czasu. I chociaż jest to jedynie preludium tego, co można uzyskać dzięki OOP ( w połączeniu z odpowiednim sposobem myślenia, dobrze zaprojektowaną architekturą MVC, wyjątkami czy automatycznymi systemami testowania aplikacji ), to już tylko ten etap pozwoli Ci inaczej spojrzeć na Twoje projekty.', '', '', '2015-12-21 15:35:50', ''),
(17, '/adresy-url/?p=17', '/strefa-klienta/przykladowa-kolekcja', 'Przykładowa kolekcja', 'Prezydent Andrzej Duda odbył dwustronną rozmowę z prezydentem USA Barackiem Obamą przy okazji oficjalnej kolacji w Białym Domu dla uczestników Szczytu Bezpieczeństwa Nuklearnego. Prezydenci rozmawiali m.in. o szczycie NATO w Warszawie i sytuacji wokół TK w Polsce - poinformował prezydencki minister Krzysztof Szczerski.\r\n\r\nAndrzej Duda przebywa w Waszyngtonie od wtorku. W czwartek wieczorem wziął udział w oficjalnej kolacji wydanej przez prezydenta Stanów Zjednoczonych dla wszystkich kilkudziesięciu przywódców państw i organizacji przybyłych na czwarty Szczyt Bezpieczeństwa Nuklearnego.\r\n\r\nPrezydencki minister poinformował polskich dziennikarzy w czwartek wieczorem czasu lokalnego, że na marginesie kolacji doszło do rozmowy prezydentów Polski i USA.', 'kolekcja', '', '2016-04-01 09:10:30', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `user_status` varchar(5) COLLATE utf8_polish_ci NOT NULL DEFAULT 'user',
  `activate` tinyint(1) NOT NULL,
  `activation_key` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `user_status`, `activate`, `activation_key`, `date`) VALUES
(1, 'om77@wp.pl', 'pass', 'Marcin Osiak', 'admin', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2017-02-23 15:20:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
