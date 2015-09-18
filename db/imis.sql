-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2015 at 01:57 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE IF NOT EXISTS `admin_detail` (
  `USERNAME` varchar(20) NOT NULL DEFAULT '',
  `PASSWORD` varchar(20) DEFAULT NULL,
  `OTHER_ID` varchar(20) DEFAULT NULL,
  `PHOTO_AD` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`USERNAME`, `PASSWORD`, `OTHER_ID`, `PHOTO_AD`) VALUES
('admin', 'admin', 'empty', 'empty');

-- --------------------------------------------------------

--
-- Table structure for table `cms_area`
--

CREATE TABLE IF NOT EXISTS `cms_area` (
  `ID` varchar(14) NOT NULL DEFAULT '',
  `STUDENT_ID` varchar(14) DEFAULT NULL,
  `CMS_NAME` varchar(20) DEFAULT NULL,
  `CMS_CODE` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_area`
--

INSERT INTO `cms_area` (`ID`, `STUDENT_ID`, `CMS_NAME`, `CMS_CODE`) VALUES
('0edf1', '10203', 'default', ''),
('8f8db', '1003', 'default', '044030'),
('a71cf', '2086', 'default', '000004'),
('b0b45', '', 'default', '01234'),
('b8e48', '354', 'default', '00000'),
('c18cc', '10203', 'default', ''),
('c3799', '234234', 'default', '00000'),
('ce5d8', '22222', 'default', '00000'),
('d5644', '', 'default', '00000'),
('de98f', '10203', 'default', ''),
('e291d', '10203', 'default', ''),
('e8fe6', '1002', 'default', '021013'),
('eb7ca', '10203', 'default', ''),
('eec93', '10054', 'default', '042034');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `ID` varchar(14) NOT NULL DEFAULT '',
  `CO_NAME` varchar(32) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `CITY` varchar(32) DEFAULT NULL,
  `POSTAL_CODE` varchar(10) DEFAULT NULL,
  `COUNTRY` varchar(32) DEFAULT NULL,
  `C_FIRST_NAME` varchar(20) DEFAULT NULL,
  `C_LAST_NAME` varchar(20) DEFAULT NULL,
  `C_POSITION` varchar(32) DEFAULT NULL,
  `TELEPHONE` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(32) DEFAULT NULL,
  `FAX` varchar(14) DEFAULT NULL,
  `FACULTY_ID` varchar(14) DEFAULT NULL,
  `NOTES` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`ID`, `CO_NAME`, `ADDRESS`, `CITY`, `POSTAL_CODE`, `COUNTRY`, `C_FIRST_NAME`, `C_LAST_NAME`, `C_POSITION`, `TELEPHONE`, `EMAIL`, `FAX`, `FACULTY_ID`, `NOTES`) VALUES
('5003', 'Apple Inc', '1 Infinity loop', 'Palo Alto', '2345', 'India', 'John', 'Chen', 'HR-Manager', '495-3311', 'sergio@UOW.ca', '98759789', '102238', 'Dont disturb me, pls'),
('5004', 'HP', 'Wall Street, New York', 'New York', '234234', 'USA', 'Janine', 'Labrune', 'HR-Manager', '98746354', 'labrune@hr.hp.com', '654655', '102236', 'Be prepared');

-- --------------------------------------------------------

--
-- Table structure for table `edu_training`
--

CREATE TABLE IF NOT EXISTS `edu_training` (
  `ID` varchar(14) NOT NULL DEFAULT '',
  `STUDENT_ID` varchar(14) DEFAULT NULL,
  `DEGREE` varchar(50) DEFAULT NULL,
  `MAJOR` varchar(50) DEFAULT NULL,
  `GPA` varchar(7) DEFAULT NULL,
  `UNIVERSITY` varchar(50) DEFAULT NULL,
  `COUNTRY` char(50) DEFAULT NULL,
  `DURATION` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_training`
--

INSERT INTO `edu_training` (`ID`, `STUDENT_ID`, `DEGREE`, `MAJOR`, `GPA`, `UNIVERSITY`, `COUNTRY`, `DURATION`) VALUES
('0dfe0', '10203', 'Undergraduate degree ', 'Computer Science', '8.5', 'UOW', 'Canada', '12months'),
('8f8db', '1003', 'Under Graduate', 'Natural Sciences', '7.8', 'University of Windsor', 'Canada', '24 months'),
('a71cf', '2086', 'UGC', 'Computer Science', '7.5', 'FIEM', 'India', '48months'),
('e8fe6', '1002', 'Under Graduate', 'Computer Science', '8.8', 'University of New York', 'USA', '12 months'),
('eec93', '10054', 'Graduate', 'Computer Science', '8.3', 'University Of Windsor', 'Canada', '24 Months');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_detail`
--

CREATE TABLE IF NOT EXISTS `faculty_detail` (
  `FACULTY_ID` varchar(14) NOT NULL DEFAULT '',
  `FIRST_NAME` char(20) DEFAULT NULL,
  `LAST_NAME` char(20) DEFAULT NULL,
  `POSITION` varchar(50) DEFAULT NULL,
  `SCHOOL` varchar(50) DEFAULT NULL,
  `TELEPHONE` varchar(14) DEFAULT NULL,
  `EXTENSION` varchar(20) DEFAULT NULL,
  `MOBILE` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`FACULTY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_detail`
--

INSERT INTO `faculty_detail` (`FACULTY_ID`, `FIRST_NAME`, `LAST_NAME`, `POSITION`, `SCHOOL`, `TELEPHONE`, `EXTENSION`, `MOBILE`, `EMAIL`) VALUES
('102233', 'Bernard', 'Pearson', 'Professor', 'Computer Science', '2456232625', '01', '9706609321', 'bernard@UOW.ca'),
('102236', 'Ryan', 'Adams', 'Assistant Professor', 'Computer Science', '495-3311', '617', '58754165', 'rpa@seas.harvard.edu'),
('102237', 'Yiling', 'Chen', 'John L. Loeb Associate Profess', 'Natural Sciences', '495-3298', '617', '654984654', 'yiling@seas.harvard.edu'),
('102238', 'Stephen', 'Chong', 'Associate Professor', 'Computer Science', '496-6382', '617', '385743515', 'chong@seas.harvard.edu'),
('102239', 'David', 'Cox', 'Senior Lecturer', 'Computer Science', '496-6382', '617', '6876545', 'davidcox@seas.harvard.edu');

-- --------------------------------------------------------

--
-- Table structure for table `internship_loc`
--

CREATE TABLE IF NOT EXISTS `internship_loc` (
  `ID` varchar(14) NOT NULL DEFAULT '',
  `STUDENT_ID` varchar(14) DEFAULT NULL,
  `LOC_NAME` varchar(20) DEFAULT NULL,
  `LOC_CODE` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship_loc`
--

INSERT INTO `internship_loc` (`ID`, `STUDENT_ID`, `LOC_NAME`, `LOC_CODE`) VALUES
('8f8db', '1003', 'default', '110021021'),
('a71cf', '2086', 'default', '222222222'),
('e8fe6', '1002', 'default', '111000122'),
('eb7ca', '10203', 'default', '112222200'),
('eec93', '10054', 'default', '120121002');

-- --------------------------------------------------------

--
-- Table structure for table `job_db`
--

CREATE TABLE IF NOT EXISTS `job_db` (
  `job_id` varchar(14) NOT NULL DEFAULT '',
  `company_id` varchar(14) DEFAULT NULL,
  `position` varchar(10) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `responsibilities` varchar(50) DEFAULT NULL,
  `requirements` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_db`
--

INSERT INTO `job_db` (`job_id`, `company_id`, `position`, `description`, `responsibilities`, `requirements`) VALUES
('5475', '5004', '55', 'Project Manager', 'C programming', 'good english speaking'),
('5987', '5003', '105', 'Senior Programmer', 'Trainee', 'Java, Web languages '),
('8979', '5004', '50', 'Asst Manager', 'Managing Product End', 'MAC, HR Minor');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_skill`
--

CREATE TABLE IF NOT EXISTS `knowledge_skill` (
  `ID` varchar(14) NOT NULL DEFAULT '',
  `STUDENT_ID` varchar(14) DEFAULT NULL,
  `LANG` varchar(20) DEFAULT NULL,
  `OPT_CODE` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knowledge_skill`
--

INSERT INTO `knowledge_skill` (`ID`, `STUDENT_ID`, `LANG`, `OPT_CODE`) VALUES
('8f8db', '1003', '', '0200403020020324422044'),
('a71cf', '2086', '', '0420003121300313003002'),
('e8fe6', '1002', '', '0122222244410100000040'),
('eec93', '10054', '', '0032203430240430040430');

-- --------------------------------------------------------

--
-- Table structure for table `lang_english`
--

CREATE TABLE IF NOT EXISTS `lang_english` (
  `STUDENT_ID` varchar(14) NOT NULL DEFAULT '',
  `READ_CODE` varchar(1) DEFAULT NULL,
  `WRITE_CODE` varchar(1) DEFAULT NULL,
  `SPEAK_CODE` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lang_english`
--

INSERT INTO `lang_english` (`STUDENT_ID`, `READ_CODE`, `WRITE_CODE`, `SPEAK_CODE`) VALUES
('1002', '3', '4', '3'),
('1003', '4', '4', '4'),
('10054', '4', '4', '4'),
('10203', '', '', ''),
('2086', '3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `lang_french`
--

CREATE TABLE IF NOT EXISTS `lang_french` (
  `STUDENT_ID` varchar(14) NOT NULL DEFAULT '',
  `READ_CODE` varchar(1) DEFAULT NULL,
  `WRITE_CODE` varchar(1) DEFAULT NULL,
  `SPEAK_CODE` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lang_french`
--

INSERT INTO `lang_french` (`STUDENT_ID`, `READ_CODE`, `WRITE_CODE`, `SPEAK_CODE`) VALUES
('1002', '3', '3', '2'),
('1003', '3', '3', '2'),
('10054', '4', '3', '2'),
('10203', '', '', ''),
('2086', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lang_other`
--

CREATE TABLE IF NOT EXISTS `lang_other` (
  `STUDENT_ID` varchar(14) NOT NULL DEFAULT '',
  `READ_CODE` varchar(1) DEFAULT NULL,
  `WRITE_CODE` varchar(1) DEFAULT NULL,
  `SPEAK_CODE` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `ID` varchar(14) NOT NULL DEFAULT '',
  `STUDENT_ID` varchar(14) DEFAULT NULL,
  `OS_NAME` varchar(32) DEFAULT NULL,
  `OS_CODE` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`ID`, `STUDENT_ID`, `OS_NAME`, `OS_CODE`) VALUES
('7d2af', '10203', 'default', ''),
('8f8db', '1003', 'default', '02442300204'),
('a71cf', '2086', 'default', '10004024100'),
('b0b45', '', 'default', '00000000000'),
('b8e48', '354', 'default', '00000000000'),
('c18cc', '10203', 'default', ''),
('c3799', '234234', 'default', '00000000000'),
('ce5d8', '22222', 'default', '00000000000'),
('d5644', '', 'default', '00000000000'),
('de98f', '10203', 'default', ''),
('e291d', '10203', 'default', ''),
('e8fe6', '1002', 'default', '23002031040'),
('eb7ca', '10203', 'default', ''),
('eec93', '10054', 'default', '23432040240');

-- --------------------------------------------------------

--
-- Table structure for table `project_allot`
--

CREATE TABLE IF NOT EXISTS `project_allot` (
  `student_id` varchar(14) NOT NULL DEFAULT '',
  `project_id` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_allot`
--

INSERT INTO `project_allot` (`student_id`, `project_id`) VALUES
('1002', '849');

-- --------------------------------------------------------

--
-- Table structure for table `project_db`
--

CREATE TABLE IF NOT EXISTS `project_db` (
  `project_id` varchar(14) NOT NULL DEFAULT '',
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `advisor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_db`
--

INSERT INTO `project_db` (`project_id`, `title`, `description`, `advisor`) VALUES
('6541', 'Ticket Management Portal', 'Buy Ticket Online', 'Yiling Chen'),
('6731', 'Online Examination Portal', 'take exam online', 'Bernard Pearson'),
('849', 'Online Chat System', 'Chat System', 'David Cox');

-- --------------------------------------------------------

--
-- Table structure for table `special_area`
--

CREATE TABLE IF NOT EXISTS `special_area` (
  `STUDENT_ID` varchar(14) NOT NULL DEFAULT '',
  `SPECIAL_CODE` varchar(12) DEFAULT NULL,
  `INTEREST_CODE` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_area`
--

INSERT INTO `special_area` (`STUDENT_ID`, `SPECIAL_CODE`, `INTEREST_CODE`) VALUES
('1002', '101200233440', '024032323243'),
('1003', '414444001044', '210201420004'),
('10054', '202230140402', '204224240420'),
('10203', '', ''),
('2086', '433113333224', '444444444444');

-- --------------------------------------------------------

--
-- Table structure for table `status_db`
--

CREATE TABLE IF NOT EXISTS `status_db` (
  `prospect_id` varchar(14) NOT NULL DEFAULT '',
  `student_id` varchar(14) DEFAULT NULL,
  `job_id` varchar(14) DEFAULT NULL,
  `status` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`prospect_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_db`
--

INSERT INTO `status_db` (`prospect_id`, `student_id`, `job_id`, `status`) VALUES
('49124', '10054', '5987', 'Rejected'),
('a5da5', '10054', '5475', 'Rejected'),
('c6eae', '1003', '5987', 'Hired'),
('d2a44', '1003', '8979', 'Hired'),
('dff95', '1003', '5475', 'Hired');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `STUDENT_ID` varchar(14) NOT NULL DEFAULT '',
  `FIRST_NAME` char(50) DEFAULT NULL,
  `MIDDLE_NAME` char(50) DEFAULT NULL,
  `LAST_NAME` char(50) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(11) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `SEM_REG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`STUDENT_ID`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `EMAIL`, `TELEPHONE`, `STATUS`, `SEM_REG`) VALUES
('1002', 'Ana', '', 'Trujillo', 'trujillo@gmail.com', '798745855', 'Project Allotted', 'Fall 2013'),
('1003', 'Sven', '', 'Ottlieb', 'Ottlieb@uow.ca', '760969875', 'Hired', 'Summer 2011'),
('10054', 'Peter', 'Pedro', 'Franken', 'Franken@uow.ca', '987687005', 'Rejected', 'Spring 2013');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `ID` varchar(14) NOT NULL DEFAULT '',
  `STUDENT_ID` varchar(14) DEFAULT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `START_DATE` varchar(12) DEFAULT NULL,
  `END_DATE` varchar(12) DEFAULT NULL,
  `TITLE` char(30) DEFAULT NULL,
  `DUTIES` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`ID`, `STUDENT_ID`, `COMPANY_NAME`, `START_DATE`, `END_DATE`, `TITLE`, `DUTIES`) VALUES
('0dfe0', '10203', 'Google', '12/1/2014', '-', 'Pragrammer', 'Coding'),
('8f8db', '1003', 'Philips', '2013', '-', 'Data Mining Scientist', 'Data Mining and Analyst'),
('a71cf', '2086', 'Google', '5-5-2015', '-', 'Project Manager', 'Coding'),
('e8fe6', '1002', 'Samsung', '12-4-2014', '12-5-2014', 'Programming', 'Coding'),
('eec93', '10054', 'EA Games', '20-2-2014', '15-5-2014', 'Programmer', 'Coding');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_db`
--
ALTER TABLE `job_db`
  ADD CONSTRAINT `job_db_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`ID`);

--
-- Constraints for table `project_allot`
--
ALTER TABLE `project_allot`
  ADD CONSTRAINT `project_allot_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project_db` (`project_id`);

--
-- Constraints for table `status_db`
--
ALTER TABLE `status_db`
  ADD CONSTRAINT `status_db_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_db` (`job_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
