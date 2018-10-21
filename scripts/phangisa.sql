-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2018 at 10:48 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phangisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `who_are_we` text NOT NULL,
  `what_we_do` text NOT NULL,
  `our_mission` text NOT NULL,
  `we_love_our_clients` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_feedback`
--

DROP TABLE IF EXISTS `app_feedback`;
CREATE TABLE IF NOT EXISTS `app_feedback` (
  `app_feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `page_url` text,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`app_feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `business_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` text,
  `about_us` text,
  `country_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `location` text,
  `contact_no` text,
  `fax` text,
  `email` text,
  `website_url` text,
  `logo_url` text NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `days_remaining` int(11) NOT NULL DEFAULT '30',
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businesscategorylist`
--

DROP TABLE IF EXISTS `businesscategorylist`;
CREATE TABLE IF NOT EXISTS `businesscategorylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesscategorylist`
--

INSERT INTO `businesscategorylist` (`id`, `main_category`) VALUES
(1, 'Automotive'),
(2, 'Business Support & Supplies'),
(3, 'Computers & Electronics '),
(4, 'Construction & Contractors '),
(5, 'Education'),
(6, 'Entertainment'),
(7, 'Food & Dining'),
(8, 'Health & Medicine'),
(9, 'Home & Garden'),
(10, 'Legal & Financial '),
(11, 'Manufacturing, Wholesale,\r\nDistribution'),
(12, 'Merchants (Retail) '),
(13, 'Miscellaneous'),
(14, 'Personal Care & Services'),
(15, 'Real Estate'),
(16, 'Travel & Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `businesscategorylist_includes`
--

DROP TABLE IF EXISTS `businesscategorylist_includes`;
CREATE TABLE IF NOT EXISTS `businesscategorylist_includes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `includes_item` text NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesscategorylist_includes`
--

INSERT INTO `businesscategorylist_includes` (`id`, `includes_item`, `category_id`) VALUES
(1, 'Auto Accessories', 1),
(2, 'Auto Dealers â€“ New', 1),
(3, 'Auto Dealers â€“ Used', 1),
(4, 'Detail & Carwash', 1),
(5, 'Gas Stations', 1),
(6, 'Motorcycle Sales & Repair', 1),
(7, 'Rental & Leasing', 1),
(8, 'Service, Repair & Parts', 1),
(9, 'Towing', 1),
(10, 'Consultants', 2),
(11, 'Employment Agency', 2),
(12, 'Marketing & Communications', 2),
(13, 'Office Supplies', 2),
(14, 'Office Supplies', 2),
(15, 'Printing & Publishing ', 2),
(16, 'Computer Programming & Support', 3),
(17, 'Consumer Electronics & Accessories ', 3),
(18, 'Architects, Landscape Architects, Engineers & Surveyors', 4),
(19, 'Blasting & Demolition', 4),
(20, 'Building Materials & Supplies', 4),
(21, 'Construction Companies', 4),
(22, 'Electricians', 4),
(23, 'Engineer, Survey', 4),
(24, 'Environmental Assessments', 4),
(25, 'Inspectors', 4),
(26, 'Plaster & Concrete', 4),
(27, 'Plumbers', 4),
(28, 'Roofers', 4),
(29, 'Adult & Continuing Education', 5),
(30, 'Early Childhood Education', 5),
(31, 'Educational Resources', 5),
(32, 'Other Educational ', 5),
(33, 'Artists, Writers', 6),
(34, 'Event Planners & Supplies', 6),
(35, 'Golf Courses', 6),
(36, 'Movies', 6),
(37, 'Productions ', 6),
(38, 'Desserts, Catering & Supplies', 7),
(39, 'Fast Food & Carry Out', 7),
(40, 'Grocery, Beverage & Tobacco', 7),
(41, 'Restaurants', 7),
(42, 'Acupuncture', 8),
(43, 'Assisted Living & Home Health Care', 8),
(44, 'Audiologist', 8),
(45, 'Chiropractic', 8),
(46, 'Clinics & Medical Centers', 8),
(47, 'Dental', 8),
(48, 'Diet I& Nutrition', 8),
(49, 'Laboratory, Imaging & Diagnostic', 8),
(50, 'Massage Therapy', 8),
(51, 'Mental Health', 8),
(52, 'Nurse', 8),
(53, 'Optical', 8),
(54, 'Pharmacy, Drug & Vitamin Stores', 8),
(55, 'Physical Therapy', 8),
(56, 'Physicians & Assistants', 8),
(57, 'Podiatry', 8),
(58, 'Social Worker', 8),
(59, 'Animal Hospital', 8),
(60, 'Veterinary & Animal Surgeons', 8),
(61, 'Antiques & Collectibles', 9),
(62, 'Cleaning', 9),
(63, 'Crafts, Hobbies & Sports', 9),
(64, 'Flower Shops', 9),
(65, 'Home Furnishings', 9),
(66, 'Home Goods', 9),
(67, 'Home Improvements & Repairs', 9),
(68, 'Landscape & Lawn Service', 9),
(69, 'Pest Control', 9),
(70, 'Pool Supplies & Service', 9),
(71, 'Security System & Services ', 9),
(72, 'Accountants', 10),
(73, 'Attorneys', 10),
(74, 'Financial Institutions', 10),
(75, 'Financial Services', 10),
(76, 'Insurance', 10),
(77, 'Other Legal', 10),
(78, 'Distribution, Import/Export', 11),
(79, 'Manufacturing', 11),
(80, 'Wholesale', 11),
(81, 'Cards & Gifts', 12),
(82, 'Clothing & Accessories', 12),
(83, 'Department Stores, Sporting Goods', 12),
(84, 'General', 12),
(85, 'Jewelry', 12),
(86, 'Shoes', 12),
(87, 'Civic Groups', 13),
(88, 'Funeral Service Providers & Cemetaries', 13),
(89, 'Miscellaneous', 13),
(90, 'Utility Companies', 13),
(91, 'Animal Care & Supplies', 14),
(92, 'Barber & Beauty Salons', 14),
(93, 'Beauty Supplies', 14),
(94, 'Dry Cleaners & Laundromats', 14),
(95, 'Exercise & Fitness', 14),
(96, 'Massage & Body Works', 14),
(97, 'Nail Salons', 14),
(98, 'Shoe Repairs', 14),
(99, 'Tailors', 14),
(100, 'Agencies & Brokerage', 15),
(101, 'Agents & Brokers', 15),
(102, 'Apartment & Home Rental', 15),
(103, 'Mortgage Broker & Lender', 15),
(104, 'Property Management', 15),
(105, 'Title Company', 15),
(106, 'Hotel, Motel & Extended Stay', 16),
(107, 'Moving & Storage', 16),
(108, 'Packaging & Shipping', 16),
(109, 'Transportation', 16),
(110, 'Travel & Tourism', 16);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `active`) VALUES
(1, 'Afghanistan', 0),
(2, 'Akrotiri', 0),
(3, 'Albania', 0),
(4, 'Algeria', 0),
(5, 'American Samoa', 0),
(6, 'Andorra', 0),
(7, 'Angola', 0),
(8, 'Anguilla', 0),
(9, 'Antarctica', 0),
(10, 'Antigua and Barbuda', 0),
(11, 'Argentina', 0),
(12, 'Armenia', 0),
(13, 'Aruba', 0),
(14, 'Ashmore and Cartier Islands', 0),
(15, 'Australia', 0),
(16, 'Austria', 0),
(17, 'Azerbaijan', 0),
(18, 'Bahamas, The', 0),
(19, 'Bahrain', 0),
(20, 'Bangladesh', 0),
(21, 'Barbados', 0),
(22, 'Croatia', 0),
(23, 'Cuba', 0),
(24, 'Cyprus', 0),
(25, 'Czech Republic', 0),
(26, 'Denmark', 0),
(27, 'Dhekelia', 0),
(28, 'Djibouti', 0),
(29, 'Dominica', 0),
(30, 'Dominican Republic', 0),
(31, 'Ecuador', 0),
(32, 'Egypt', 0),
(33, 'El Salvador', 0),
(34, 'Equatorial Guinea', 0),
(35, 'Eritrea', 0),
(36, 'Estonia', 0),
(37, 'Ethiopia', 0),
(38, 'Europa Island', 0),
(39, 'Falkland Islands (Islas Malvinas)', 0),
(40, 'Faroe Islands', 0),
(41, 'Fiji', 0),
(42, 'Finland', 0),
(43, 'France', 0),
(44, 'French Guiana', 0),
(45, 'French Polynesia', 0),
(46, 'French Southern and Antarctic Lands', 0),
(47, 'Gabon', 0),
(48, 'Gambia, The', 0),
(49, 'Gaza Strip', 0),
(50, 'Georgia', 0),
(51, 'Germany', 0),
(52, 'Ghana', 0),
(53, 'Gibraltar', 0),
(54, 'Glorioso Islands', 0),
(55, 'Greece', 0),
(56, 'Greenland', 0),
(57, 'Grenada', 0),
(58, 'Guadeloupe', 0),
(59, 'Guam', 0),
(60, 'Guatemala', 0),
(61, 'Guernsey', 0),
(62, 'Guinea', 0),
(63, 'Guinea-Bissau', 0),
(64, 'Guyana', 0),
(65, 'Haiti', 0),
(66, 'Heard Island and McDonald Islands', 0),
(67, 'Holy See (Vatican City)', 0),
(68, 'Honduras', 0),
(69, 'Hong Kong', 0),
(70, 'Hungary', 0),
(71, 'Iceland', 0),
(72, 'India', 0),
(73, 'Indonesia', 0),
(74, 'Iran', 0),
(75, 'Iraq', 0),
(76, 'Ireland', 0),
(77, 'Isle of Man', 0),
(78, 'Israel', 0),
(79, 'Italy', 0),
(80, 'Jamaica', 0),
(81, 'Jan Mayen', 0),
(82, 'Japan', 0),
(83, 'Jersey', 0),
(84, 'Jordan', 0),
(85, 'Juan de Nova Island', 0),
(86, 'Kazakhstan', 0),
(87, 'Kenya', 0),
(88, 'Saint Vince', 0),
(89, 'San Marino', 0),
(90, 'Sao Tome and Principe', 0),
(91, 'Saudi Arabia', 0),
(92, 'Senegal', 0),
(93, 'Serbia and Montenegro', 0),
(94, 'Seychelles', 0),
(95, 'Sierra Leone', 0),
(96, 'Singapore', 0),
(97, 'Slovakia', 0),
(98, 'Slovenia', 0),
(99, 'Solomon Islands', 0),
(100, 'Somalia', 0),
(101, 'South Africa', 1),
(102, 'South Georgia and the South Sandwich Islands', 0),
(103, 'Spain', 0),
(104, 'Spratly Islands', 0),
(105, 'Sri Lanka', 0),
(106, 'Sudan', 0),
(107, 'Suriname', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

DROP TABLE IF EXISTS `marketing`;
CREATE TABLE IF NOT EXISTS `marketing` (
  `username` varchar(55) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` text NOT NULL,
  `member_surname` text NOT NULL,
  `member_dob` text NOT NULL,
  `member_gender` int(1) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `member_province_id` int(11) NOT NULL,
  `member_location` text,
  `member_contact_no` text,
  `member_email` varchar(100) NOT NULL,
  `member_password` text NOT NULL,
  `member_date_added` datetime DEFAULT NULL,
  `member_date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL,
  `activation_code` text,
  `profile_pic_url` text,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_email` (`member_email`),
  KEY `member_province_id` (`member_province_id`),
  KEY `country_id` (`country_id`),
  KEY `member_email_2` (`member_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` text NOT NULL,
  `package_monthly_fee` text NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productservice`
--

DROP TABLE IF EXISTS `productservice`;
CREATE TABLE IF NOT EXISTS `productservice` (
  `productservice_id` int(11) NOT NULL AUTO_INCREMENT,
  `productservice_name` text,
  `productservice_description` text,
  `productservice_code` text,
  `price` text,
  `url` text,
  `business_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `businesscategorylist_includes_id` int(11) DEFAULT NULL,
  `on_promotion` int(11) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`productservice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `province_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `country_id`, `province_name`) VALUES
(1, 101, 'Free State'),
(2, 101, 'Gauteng'),
(3, 101, 'KwaZulu-Natal'),
(4, 101, 'Limpopo'),
(5, 101, 'Mpumalanga'),
(6, 101, 'North West'),
(7, 101, 'Northern Cape'),
(8, 101, 'Western Cape'),
(9, 101, 'Eastern Cape');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

DROP TABLE IF EXISTS `social_media`;
CREATE TABLE IF NOT EXISTS `social_media` (
  `social_media_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media_name` text NOT NULL,
  PRIMARY KEY (`social_media_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`social_media_id`, `social_media_name`) VALUES
(1, 'Facebook'),
(2, 'Twitter');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

DROP TABLE IF EXISTS `social_media_links`;
CREATE TABLE IF NOT EXISTS `social_media_links` (
  `social_media_links_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `social_media_links_link` text NOT NULL,
  `social_media_id` int(11) NOT NULL,
  PRIMARY KEY (`social_media_links_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `member_ibfk_3` FOREIGN KEY (`member_province_id`) REFERENCES `province` (`province_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
