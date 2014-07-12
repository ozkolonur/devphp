-- phpMyAdmin SQL Dump
-- version 2.11.9.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2010 at 08:28 PM
-- Server version: 5.0.90
-- PHP Version: 5.2.13-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `email` varchar(150) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  KEY `email` (`email`),
  KEY `product_id` (`product_id`),
  KEY `email_2` (`email`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`email`, `product_id`, `count`) VALUES
('ozkolonur@hotmail.com', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(2, 'can yayinlari'),
(3, 'warner bros'),
(4, 'oxford press'),
(5, 'lg'),
(6, 'sony');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'book', 'book'),
(2, 'dvd', 'dvd'),
(3, 'electronics', 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `status` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `name`, `description`, `price`, `status`) VALUES
(1, 1, 2, 'iyi_dusun_dogru_karar', 'dogan cuceloglu', 10.00, 10),
(2, 2, 3, 'prince of persia', 'prince of persia', 9.00, 19),
(3, 1, 4, 'open doors', 'english course book', 30.00, 20),
(4, 3, 5, 'tv', 'tvvv', 1200.00, 5),
(5, 3, 5, 'walkman', 'stereo', 1100.00, 5),
(6, 3, 6, 'walkman', 'mono', 1300.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(150) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id`, `email`, `product_id`, `count`, `date`) VALUES
(1, 'ozkolonur@gmail.com', 2, 1, 'Sat, 12 Jun 10 13:57:54 +0300'),
(2, 'ozkolonur@gmail.com', 5, 5, 'Sat, 12 Jun 10 18:31:46 +0300');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(150) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `first_name`, `last_name`, `password`, `is_admin`) VALUES
('ozkolonur@gmail.com', 'onur', 'ozkol', '121212', 0),
('ozkolonur@hotmail.com', 'onur2', 'ozkol2', '121212', 1),
('reyhan@boun.edu.tr', 'reyhan', 'reyhan', '12345', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
