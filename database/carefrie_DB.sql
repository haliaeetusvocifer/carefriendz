-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2016 at 06:24 PM
-- Server version: 5.5.50-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carefrie_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `claimcontact`
--

CREATE TABLE IF NOT EXISTS `claimcontact` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `locationname` varchar(255) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `reason` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `claimcontact`
--

INSERT INTO `claimcontact` (`id`, `fname`, `lname`, `locationname`, `phonenumber`, `gender`, `reason`, `email`, `image`, `date`) VALUES
(1, 'Wale', 'Wahab', 'Ajah Epe lekki lagos', '08060440897', 'girl', 'Am in need of it', 'walewahab@yahoo.com', '130.jpg', '2008-11-16 00:00:00.000000'),
(2, 'Wale', 'Wahab', 'Ajah Epe lekki lagos', '08060440897', 'girl', 'Am in need of it', 'walewahab@yahoo.com', 'cfdbg2.jpg', '2008-11-16 00:00:00.000000'),
(3, 'Wale', 'Wahab', 'Ajah Epe lekki lagos', '08060440897', 'girl', 'Am in need of it', 'walewahab@yahoo.com', 'cfdbg2.jpg', '2008-11-16 00:00:00.000000'),
(4, 'Adebayo', 'oluyemi', 'plot21 1', '8172055870', 'girl', 'sdfghjkl', 'adebayooluyemi4@gmail.com', 'cover3.jpg', '0000-00-00 00:00:00.000000'),
(5, 'Adebayo', 'oluyemi', 'location', '8172055870', 'girl', 'srdfgyigj', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(6, 'Adebayo', 'oluyemi', 'location', '8172055870', 'girl', 'srdfgyigj', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(7, 'Adebayo', 'oluyemi', 'location', '8172055870', 'girl', 'srdfgyigj', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(8, 'Adebayo', 'oluyemi', 'location', '8172055870', 'girl', 'srdfgyigj', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(9, 'Adebayo', 'oluyemi', 'location', '8172055870', 'girl', 'srdfgyigj', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(10, 'Adebayo', 'oluyemi', 'location', '8172055870', 'girl', 'srdfgyigj', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(11, 'Adebayo', 'oluyemi', 'location', '8172055870', 'girl', 'srdfgyigj', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(12, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'girl', 'sdfghjkl;', 'adebayooluyemi4@gmail.com', 'cover6.jpg', '0000-00-00 00:00:00.000000'),
(13, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'girl', 'sdfghjkl;', 'adebayooluyemi4@gmail.com', 'cover2.jpg', '0000-00-00 00:00:00.000000'),
(14, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'girl', 'sdfghjkl;', 'adebayooluyemi4@gmail.com', 'cover2.jpg', '0000-00-00 00:00:00.000000'),
(15, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'girl', 'sdfghjkl;', 'adebayooluyemi4@gmail.com', 'cover2.jpg', '0000-00-00 00:00:00.000000'),
(16, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'girl', 'sdfghjkl;', 'adebayooluyemi4@gmail.com', 'cover2.jpg', '0000-00-00 00:00:00.000000'),
(17, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'girl', 'sdfghjkl;', 'adebayooluyemi4@gmail.com', 'cover2.jpg', '0000-00-00 00:00:00.000000'),
(18, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'boy', 'wdaz', 'adebayooluyemi4@gmail.com', 'cover7.jpe', '0000-00-00 00:00:00.000000'),
(19, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'boy', 'wdaz', 'adebayooluyemi4@gmail.com', 'cover7.jpe', '0000-00-00 00:00:00.000000'),
(20, 'Adebayo', 'oluyemi', '08172055870', '8172055870', 'boy', 'wdaz', 'adebayooluyemi4@gmail.com', 'cover7.jpe', '0000-00-00 00:00:00.000000'),
(21, 'Adebaqqqq', 'oluyemiqqqq', 'New Location', '8172055869', 'boy', ' Enter the claim reason. See Claim Reason Code Table Enter the claim reason. See Claim Reason Code Table Enter the claim reason. See Claim Reason Code Table Enter the claim reason. See Claim Reason Code Table', 'adebayooluyemi4@gmail.com', 'cover7.jpe', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `donatetable`
--

CREATE TABLE IF NOT EXISTS `donatetable` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `itemColor` varchar(100) NOT NULL,
  `itemDescription` varchar(200) NOT NULL,
  `itemLocation` varchar(100) NOT NULL,
  `itemGps` varchar(100) DEFAULT NULL,
  `itemEmail` varchar(100) NOT NULL,
  `itemDate` text NOT NULL,
  `itemImage` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `donatetable`
--

INSERT INTO `donatetable` (`id`, `itemName`, `itemColor`, `itemDescription`, `itemLocation`, `itemGps`, `itemEmail`, `itemDate`, `itemImage`) VALUES
(11, 'Book', 'Multi color ', 'i Have a new one and am not using this again ', 'plot 21 omorinre Johnson lekki lagos ', NULL, 'adebayooluyemi4@gmail.com', '08-15-16', 'lesstravled.jpg'),
(12, 'African Bag ', 'Multi color ', 'I have many bag but am not using this one again ', 'Ajah Epe express road ', NULL, 'adebayooluyemi3@gmail.com', '08-15-16', 'AfricanBag.jpg'),
(13, 'L G TV', 'Black', 'i just get new one ', 'Omorinre lekki phase 1', NULL, 'adebayooluyemi1@gmail.com', '08-15-16', 'lglcd.JPG'),
(14, 'Laptop', 'White', 'I have many more but God say i should give it out ', 'Obalende ', NULL, 'adebayooluyemi4@gmail.com', '08-15-16', 'portfolio-4.jpg'),
(15, 'mattress', 'multicolor', '6x6', 'ikeja,lagos', NULL, 'Jimiayo2002@gmail.com', '08-20-16', 'mattress picture.docx');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
