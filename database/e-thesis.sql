-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 03:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(50) NOT NULL,
  `admin_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `admin_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_lname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_username`, `admin_password`, `admin_fname`, `admin_lname`, `birthday`, `address`) VALUES
(2019107, 'tejucoaj14', '04e794e01ecc8a30cd710eedf21c82c9ed52e216', 'Axel John', 'Tejuco', '1998-05-14', 'Addas 2C'),
(2019112, 'gemvie4lyf', '9b2cf265ee9a04c7414eda613896c83fbd3aee24', 'Gemar', 'Bonda', '1999-07-23', 'Bacoor, Cavite');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` varchar(10) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
('D001', 'Information Technology'),
('D002', 'Business Management'),
('D003', 'Hotel & Restaurant Management'),
('D004', 'Secondary Education'),
('D005', 'Office Administration');

-- --------------------------------------------------------

--
-- Table structure for table `research_files`
--

CREATE TABLE `research_files` (
  `research_code` int(10) NOT NULL,
  `thesis_title` varchar(200) NOT NULL,
  `author` varchar(50) NOT NULL,
  `date_of_research` date NOT NULL,
  `place_of_study` varchar(50) NOT NULL,
  `summary` varchar(2000) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_files`
--

INSERT INTO `research_files` (`research_code`, `thesis_title`, `author`, `date_of_research`, `place_of_study`, `summary`, `tags`, `department`) VALUES
(100014, 'mGarLandG: 3D Mobile Urban Gardening Landscaping Application for Imus Cavite', 'Axel Tejuco, Davela Sta. Ana', '2020-01-05', 'Imus, Cavite', 'Urban agriculture, urban farming, or urban gardening is the practice of cultivating, processing, and distributing food in or around urban areas. Urban agriculture can also involve animal husbandry, aquaculture, agroforestry, urban beekeeping, and horticulture.\r\nUrban agriculture, urban farming, or urban gardening is the practice of cultivating, processing, and distributing food in or around urban areas. Urban agriculture can also involve animal husbandry, aquaculture, agroforestry, urban beekeeping, and horticulture.\r\nUrban agriculture, urban farming, or urban gardening is the practice of cultivating, processing, and distributing food in or around urban areas. Urban agriculture can also involve animal husbandry, aquaculture, agroforestry, urban beekeeping, and horticulture.\r\nUrban agriculture, urban farming, or urban gardening is the practice of cultivating, processing, and distributing food in or around urban areas. Urban agriculture can also involve animal husbandry, aquaculture, agroforestry, urban beekeeping, and horticulture.', 'android, gardening, farming', 'D001'),
(100015, 'Mizpah Hub: A Portal for Mizpah Christian School', 'Philip Salvacion, Zarina Trajico', '2019-12-01', 'Imus, Cavite', 'A student portal is a commonly used phrase to describe the login page where students can provide a user name and password to gain access to an education organization\'s programs and other learning related materialsA student portal is a commonly used phrase to describe the login page where students can provide a user name and password to gain access to an education organization\'s programs and other learning related materialsA student portal is a commonly used phrase to describe the login page where students can provide a user name and password to gain access to an education organization\'s programs and other learning related materialsA student portal is a commonly used phrase to describe the login page where students can provide a user name and password to gain access to an education organization\'s programs and other learning related materialsA student portal is a commonly used phrase to describe the login page where students can provide a user name and password to gain access to an education organization\'s programs and other learning related materials', 'portal, enrollment, web', 'D002'),
(100016, 'eCSGo: CvSU Imus CSG Voting System', 'Jose Clapis, Tommy Mandapat', '2019-01-04', 'Bacoor, Cavite', 'An electoral system or voting system is a set of rules that determine how elections and referendums are conducted and how their results are determined. \' An electoral system or voting system is a set of rules that determine how elections and referendums are conducted and how their results are determined. \' An electoral system or voting system is a set of rules that determine how elections and referendums are conducted and how their results are determined.An electoral system or voting system is a set of rules that determine how elections and referendums are conducted and how their results are determined.An electoral system or voting system is a set of rules that determine how elections and referendums are conducted and how their results are determined.', 'voting system, csg, web', 'D003'),
(100017, 'What are the effects of sleep ddeprivation?', 'Pedro Penduko, Super Inggo', '2018-12-12', 'Imus, Cavite', 'Some of the most serious potential problems associated with chronic sleep deprivation are high blood pressure, diabetes, heart attack, heart failure or stroke. Other potential problems include obesity, depression and lower sex drive. Chronic sleep deprivation can even affect your appearance.Some of the most serious potential problems associated with chronic sleep deprivation are high blood pressure, diabetes, heart attack, heart failure or stroke. Other potential problems include obesity, depression and lower sex drive. Chronic sleep deprivation can even affect your appearance.Some of the most serious potential problems associated with chronic sleep deprivation are high blood pressure, diabetes, heart attack, heart failure or stroke. Other potential problems include obesity, depression and lower sex drive. Chronic sleeSome of the most serious potential problems associated with chronic sleep deprivation are high blood pressure, diabetes, heart attack, heart failure or stroke. Other potential problems include obesity, depression and lower sex drive. Chronic sleep deprivation can even affect your appearance.p deprivation can even affect your appearance.\'\'\'\'\'Some of the most serious potential problems associated with chronic sleep deprivation are high blood pressure, diabetes, heart attack, heart failure or stroke. Other potential problems include obesity, depression and lower sex drive. Chronic sleep deprivation can even affect your appearance.Some of the most serious potential problems associated with chronic sleep deprivation are high blood pressure, diabetes, heart attack, heart failure or stroke. Other potential problems include obesity, depression and lower sex drive. Chronic sleep deprivation can even affect your appearance.', 'sleep, effects', 'D003'),
(100018, 'In 1898, Gen. Antonio Luna (John Arcilla) faces resistance from his own countrymen as he fights for freedom during the Philippine-American War.', 'Arabella Frances Racelis', '2020-05-21', '', 'What is the main idea of heneral Luna?\r\nSet during the Philippine-American war, Heneral Luna follows the life of one of Philippine History\'s most brilliant soldier, General Antonio Luna, as he tries to lead his countrymen against colonial masters new and old, and to rise above their own raging disputes to fulfill the promise of the Philippine Revolution', 'Heroism, Revolution', 'D003'),
(100019, 'Is there an easy way to delete an element from an array using PHP, such that foreach ($array) no longer includes that element?', 'Stackoverflow', '2020-12-20', 'Dasma, Cavite', 'I would not that Konrad answer is the simplest one to the stated problem. With unset() the iterations over the array will not include the removed value anymore. OTOH, it is true that Stevan answer is ample and, actually, was the answer I was looking for - but not the OP :) danip Being easy to find in the manual does not preclude a question on StackOverflow. If the question were a duplicate StackOverflow question, then it might not belong here. StackOverflow is a good place to find answers as a go-to option even before looking in the manual Related question about removing this in a foreach loop:', 'Programming, Computer Science', 'D001'),
(100020, 'array_splice() same as unset() take the array by reference, and this means you don\'t want to assign the return values of those functions back to the array', 'Gemar Bonda', '2020-03-12', 'Manila, Philippines', 'If you want to delete multiple array elements and don\'t want to call unset() or \\array_splice() multiple times you can use the functions \\array_diff() or \\array_diff_key() depending on if you know the values or the keys of the elements which you want to delete If you want to delete multiple array elements and don\'t want to call unset() or \\array_splice() multiple times you can use the functions \\array_diff() or \\array_diff_key() depending on if you know the values or the keys of the elements which you want to delete', 'Array', 'D001'),
(100038, 'Clinically tested over 200 times, Head & Shoulders is scientifically proven to fight germs on the scalp, keeping you safe from dandruff and scalp odor while having clean and healthy hair.', 'Monkey D. Luffy', '2020-02-22', 'awda', 'Clinically tested over 200 times, Head & Shoulders is scientifically proven to fight germs on the scalp, keeping you safe from dandruff and scalp odor while having clean and healthy hair.Clinically tested over 200 times, Head & Shoulders is scientifically proven to fight germs on the scalp, keeping you safe from dandruff and scalp odor while having clean and healthy hair.Clinically tested over 200 times, Head & Shoulders is scientifically proven to fight germs on the scalp, keeping you safe from dandruff and scalp odor while having clean and healthy hair.', 'awdaw', 'D004'),
(100039, 'You have successfully installed XAMPP on this system! Now you can start using Apache, MariaDB, PHP and other components. You can find more info in the FAQs section or check the HOW-TO Guides for getti', 'Xampp Localhost', '2020-12-12', 'awda', 'XAMPP is meant only for development purposes. It has certain configuration settings that make it easy to develop locally but that are insecure if you want to have your installation accessible to others. If you want have your XAMPP accessible from the internet, make sure you understand the implications and you checked the FAQs to learn how to protect your site. Alternatively you can use WAMP, MAMP or LAMP which are similar packages which are more suitable for production.\r\n\r\n', 'programming', 'D005'),
(100040, 'XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, followin', 'Portgas D. Ace', '2020-05-05', 'Bacoor, Cavite', 'Apache Friends and Bitnami are cooperating to make dozens of open source applications available on XAMPP, for free. Bitnami-packaged applications include Wordpress, Drupal, Joomla! and dozens of others and can be deployed with one-click installers. Visit the Bitnami XAMPP page for details on the currently available apps.\r\n\r\nApache Friends and Bitnami are cooperating to make dozens of open source applications available on XAMPP, for free. Bitnami-packaged applications include Wordpress, Drupal, Joomla! and dozens of others and can be deployed with one-click installers. Visit the Bitnami XAMPP page for details on the currently available apps.\r\n\r\n', 'awda', 'D004'),
(100041, ' Allow the interruption of an import in case the script detects it is close to the PHP timeout limit. (This might be a good way to import large files, however it can break transactions.)', 'Roronoa Zoro', '2020-04-01', 'Silang, Cavite', ' Allow the interruption of an import in case the script detects it is close to the PHP timeout limit. (This might be a good way to import large files, however it can break transactions.)\r\n Allow the interruption of an import in case the script detects it is close to the PHP timeout limit. (This might be a good way to import large files, however it can break transactions.)\r\n Allow the interruption of an import in case the script detects it is close to the PHP timeout limit. (This might be a good way to import large files, however it can break transactions.)\r\n', 'mysql', 'D005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `research_files`
--
ALTER TABLE `research_files`
  ADD PRIMARY KEY (`research_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019113;

--
-- AUTO_INCREMENT for table `research_files`
--
ALTER TABLE `research_files`
  MODIFY `research_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100042;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
