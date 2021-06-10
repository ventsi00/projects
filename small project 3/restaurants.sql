-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2021 at 10:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `vegetarian` tinyint(1) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `number` varchar(13) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `capacity` int(60) DEFAULT NULL,
  `creator` int(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `city`, `vegetarian`, `vegan`, `number`, `capacity`, `creator`) VALUES
(14, 'Язиа', 'Стара Загора', 1, 0, '0882354878', 35, 1),
(15, 'Макиато', 'София', 1, 1, '0887435888', 15, 1),
(16, 'Уникато', 'Бъргас', 0, 0, '0887354888', 100, 1),
(17, 'Джаз', 'Сливен', 0, 1, '0887345888', 28, 1),
(18, 'Американа', 'Пловдив', 1, 1, '0886347888', 73, 18);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
