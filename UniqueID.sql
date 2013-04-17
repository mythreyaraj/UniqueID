-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2013 at 07:18 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline_info`
--

CREATE TABLE IF NOT EXISTS `airline_info` (
  `UID` int(11) NOT NULL,
  `FROM` varchar(100) NOT NULL,
  `TO` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `NUMBER_OF_PASSENGERS` int(11) NOT NULL,
  `TICKET_NUMBER` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Airline tickets information.';

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table to store the password for each Unique ID' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`UID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `bank_description`
--

CREATE TABLE IF NOT EXISTS `bank_description` (
  `ACCOUNT_NUMBER` varchar(100) NOT NULL,
  `TRANSACTION` varchar(100) NOT NULL,
  `AMOUNT` double NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_info`
--

CREATE TABLE IF NOT EXISTS `bank_info` (
  `UID` int(11) NOT NULL,
  `BANK` varchar(100) NOT NULL,
  `ACCOUNT_NUMBER` varchar(100) NOT NULL,
  `BALANCE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table describes bank account details of all UIDS';

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE IF NOT EXISTS `basic_info` (
  `UID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `MIDDLE_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `SEX` varchar(10) NOT NULL,
  `MARITAL_STATUS` varchar(100) NOT NULL,
  `ADDRESS_1` varchar(100) NOT NULL,
  `ADDRESS_2` varchar(100) NOT NULL,
  `ADDRESS_3` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHOTOGRAPH` int(11) NOT NULL,
  `ACCOUNT_BALANCE` int(11) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table stores the personal information of each Unique ID';

-- --------------------------------------------------------

--
-- Table structure for table `birth_info`
--

CREATE TABLE IF NOT EXISTS `birth_info` (
  `UID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `HOSPITAL` varchar(100) NOT NULL,
  `DOCTOR` varchar(100) NOT NULL,
  `FATHER_UID` varchar(100) NOT NULL,
  `MOTHER_UID` varchar(100) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criminal_info`
--

CREATE TABLE IF NOT EXISTS `criminal_info` (
  `UID` int(11) NOT NULL,
  `FIR_NUMBER` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table links fir details to unique ids';

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

CREATE TABLE IF NOT EXISTS `education_info` (
  `UID` int(11) NOT NULL,
  `QUALIFICATION` varchar(100) NOT NULL,
  `INSTITUTION` varchar(100) NOT NULL,
  `PERCENTAGE` double NOT NULL,
  `PASSING_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table describes all the educational qualifications';

-- --------------------------------------------------------

--
-- Table structure for table `electricity_info`
--

CREATE TABLE IF NOT EXISTS `electricity_info` (
  `UID` int(11) NOT NULL,
  `OUTSTANDING_AMOUNT` double NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table stores data about each UID''s Electricity balance';

-- --------------------------------------------------------

--
-- Table structure for table `electricity_transactions`
--

CREATE TABLE IF NOT EXISTS `electricity_transactions` (
  `UID` int(11) NOT NULL,
  `AMOUNT` double NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table stores all the electricity payments';

-- --------------------------------------------------------

--
-- Table structure for table `fir_details`
--

CREATE TABLE IF NOT EXISTS `fir_details` (
  `FIR_NUMBER` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `FIR_COPY` varchar(100) NOT NULL,
  PRIMARY KEY (`FIR_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Describes the FIR details';

-- --------------------------------------------------------

--
-- Table structure for table `medical_info`
--

CREATE TABLE IF NOT EXISTS `medical_info` (
  `UID` int(11) NOT NULL,
  `DOCUMENT` varchar(100) NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table describes medical history';

-- --------------------------------------------------------

--
-- Table structure for table `passport_info`
--

CREATE TABLE IF NOT EXISTS `passport_info` (
  `UID` int(11) NOT NULL,
  `PASSPORT_NUMBER` varchar(100) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Maps UID to passport numbers';

-- --------------------------------------------------------

--
-- Table structure for table `phone_info`
--

CREATE TABLE IF NOT EXISTS `phone_info` (
  `UID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(100) NOT NULL,
  `OUTSTANDING_AMOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table stores the details about each UID''s phone numbers';

-- --------------------------------------------------------

--
-- Table structure for table `phone_transactions`
--

CREATE TABLE IF NOT EXISTS `phone_transactions` (
  `UID` int(100) NOT NULL,
  `PHONE_NUMBER` varchar(100) NOT NULL,
  `AMOUNT` double NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `railway_info`
--

CREATE TABLE IF NOT EXISTS `railway_info` (
  `UID` int(11) NOT NULL,
  `FROM` varchar(100) NOT NULL,
  `TO` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `ADULT_TICKETS` int(11) NOT NULL,
  `CHILDREN_TICKETS` int(11) NOT NULL,
  `PNR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='RAilway tickets booking info.';

-- --------------------------------------------------------

--
-- Table structure for table `voting_info`
--

CREATE TABLE IF NOT EXISTS `voting_info` (
  `UID` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CHOICE` varchar(100) NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Describes election voting details';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
