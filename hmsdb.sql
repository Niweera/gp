-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 07:52 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `clinicno` varchar(255) NOT NULL,
  `slmcid` varchar(255) NOT NULL,
  `appointmentname` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dispenser`
--

CREATE TABLE `dispenser` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `dispid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `slmcid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctornote`
--

CREATE TABLE `doctornote` (
  `clinicno` varchar(255) NOT NULL,
  `slmcid` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drugid` varchar(255) NOT NULL,
  `drugname` varchar(255) NOT NULL,
  `count` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drugupdate`
--

CREATE TABLE `drugupdate` (
  `dispid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `drugid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `count` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicaltest`
--

CREATE TABLE `medicaltest` (
  `testid` varchar(255) NOT NULL,
  `testname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `nurseid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `clinicno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nurseid` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patientrecord`
--

CREATE TABLE `patientrecord` (
  `clinicno` varchar(255) NOT NULL,
  `nextdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patienttest`
--

CREATE TABLE `patienttest` (
  `clinicno` varchar(255) NOT NULL,
  `testid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `pharmaid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharmdisp`
--

CREATE TABLE `pharmdisp` (
  `pharmaid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dispid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reportid` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `slmcid` varchar(255) NOT NULL,
  `clinicno` varchar(255) NOT NULL,
  `drugid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `dose` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `reportname` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `flag`) VALUES
('admin', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 0),
('disp', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 2),
('doctor', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 1),
('nurse', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 4),
('patien', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 5),
('pharma', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`clinicno`,`slmcid`,`date`),
  ADD KEY `appfk2` (`slmcid`);

--
-- Indexes for table `dispenser`
--
ALTER TABLE `dispenser`
  ADD PRIMARY KEY (`dispid`),
  ADD UNIQUE KEY `dispid` (`dispid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`slmcid`),
  ADD UNIQUE KEY `slmcid` (`slmcid`);

--
-- Indexes for table `doctornote`
--
ALTER TABLE `doctornote`
  ADD PRIMARY KEY (`clinicno`,`slmcid`,`date`),
  ADD KEY `dnfk2` (`slmcid`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drugid`);

--
-- Indexes for table `drugupdate`
--
ALTER TABLE `drugupdate`
  ADD PRIMARY KEY (`dispid`,`drugid`,`timestamp`),
  ADD KEY `drugfk` (`drugid`);

--
-- Indexes for table `medicaltest`
--
ALTER TABLE `medicaltest`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurseid`),
  ADD UNIQUE KEY `nurseid` (`nurseid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`clinicno`),
  ADD KEY `regfk` (`nurseid`);

--
-- Indexes for table `patientrecord`
--
ALTER TABLE `patientrecord`
  ADD PRIMARY KEY (`clinicno`);

--
-- Indexes for table `patienttest`
--
ALTER TABLE `patienttest`
  ADD PRIMARY KEY (`clinicno`,`testid`,`date`),
  ADD KEY `ptfk2` (`testid`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmaid`),
  ADD UNIQUE KEY `pharmaid` (`pharmaid`);

--
-- Indexes for table `pharmdisp`
--
ALTER TABLE `pharmdisp`
  ADD PRIMARY KEY (`pharmaid`,`dispid`,`timestamp`),
  ADD KEY `reportfk` (`reportid`),
  ADD KEY `dispenfk` (`dispid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`slmcid`,`clinicno`,`drugid`,`date`),
  ADD KEY `presfk` (`clinicno`),
  ADD KEY `presfk2` (`drugid`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `adminfk` FOREIGN KEY (`adminid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  ADD CONSTRAINT `appfk2` FOREIGN KEY (`slmcid`) REFERENCES `doctor` (`slmcid`);

--
-- Constraints for table `dispenser`
--
ALTER TABLE `dispenser`
  ADD CONSTRAINT `disperfk` FOREIGN KEY (`dispid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `userfk` FOREIGN KEY (`slmcid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `doctornote`
--
ALTER TABLE `doctornote`
  ADD CONSTRAINT `dnfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  ADD CONSTRAINT `dnfk2` FOREIGN KEY (`slmcid`) REFERENCES `doctor` (`slmcid`);

--
-- Constraints for table `drugupdate`
--
ALTER TABLE `drugupdate`
  ADD CONSTRAINT `dispfk` FOREIGN KEY (`dispid`) REFERENCES `dispenser` (`dispid`),
  ADD CONSTRAINT `drugfk` FOREIGN KEY (`drugid`) REFERENCES `drug` (`drugid`);

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurfk` FOREIGN KEY (`nurseid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patfk` FOREIGN KEY (`clinicno`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `regfk` FOREIGN KEY (`nurseid`) REFERENCES `nurse` (`nurseid`);

--
-- Constraints for table `patientrecord`
--
ALTER TABLE `patientrecord`
  ADD CONSTRAINT `prefk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`);

--
-- Constraints for table `patienttest`
--
ALTER TABLE `patienttest`
  ADD CONSTRAINT `ptfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  ADD CONSTRAINT `ptfk2` FOREIGN KEY (`testid`) REFERENCES `medicaltest` (`testid`);

--
-- Constraints for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD CONSTRAINT `phfk` FOREIGN KEY (`pharmaid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `pharmdisp`
--
ALTER TABLE `pharmdisp`
  ADD CONSTRAINT `dispenfk` FOREIGN KEY (`dispid`) REFERENCES `dispenser` (`dispid`),
  ADD CONSTRAINT `pharmfk` FOREIGN KEY (`pharmaid`) REFERENCES `pharmacist` (`pharmaid`),
  ADD CONSTRAINT `reportfk` FOREIGN KEY (`reportid`) REFERENCES `report` (`reportid`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `presfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  ADD CONSTRAINT `presfk2` FOREIGN KEY (`drugid`) REFERENCES `drug` (`drugid`),
  ADD CONSTRAINT `presfk3` FOREIGN KEY (`slmcid`) REFERENCES `doctor` (`slmcid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
