-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: hmsdb
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adminid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`adminid`),
  CONSTRAINT `adminfk` FOREIGN KEY (`adminid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','Nipuna Weerasekara','w.nipuna@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `clinicno` varchar(255) NOT NULL,
  `slmcid` varchar(255) NOT NULL,
  `appointmentname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`clinicno`,`slmcid`,`date`),
  KEY `appfk2` (`slmcid`),
  CONSTRAINT `appfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  CONSTRAINT `appfk2` FOREIGN KEY (`slmcid`) REFERENCES `doctor` (`slmcid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispenser`
--

DROP TABLE IF EXISTS `dispenser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispenser` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `dispid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`dispid`),
  UNIQUE KEY `dispid` (`dispid`),
  CONSTRAINT `disperfk` FOREIGN KEY (`dispid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispenser`
--

LOCK TABLES `dispenser` WRITE;
/*!40000 ALTER TABLE `dispenser` DISABLE KEYS */;
INSERT INTO `dispenser` VALUES ('Nipuna',766419486,'disp','w.nipuna@hotmail.com');
/*!40000 ALTER TABLE `dispenser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `slmcid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`slmcid`),
  UNIQUE KEY `slmcid` (`slmcid`),
  CONSTRAINT `userfk` FOREIGN KEY (`slmcid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctornote`
--

DROP TABLE IF EXISTS `doctornote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctornote` (
  `clinicno` varchar(255) NOT NULL,
  `slmcid` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`clinicno`,`slmcid`,`date`),
  KEY `dnfk2` (`slmcid`),
  CONSTRAINT `dnfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  CONSTRAINT `dnfk2` FOREIGN KEY (`slmcid`) REFERENCES `doctor` (`slmcid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctornote`
--

LOCK TABLES `doctornote` WRITE;
/*!40000 ALTER TABLE `doctornote` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctornote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug`
--

DROP TABLE IF EXISTS `drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug` (
  `drugid` varchar(255) NOT NULL,
  `drugname` varchar(255) NOT NULL,
  `count` double NOT NULL,
  PRIMARY KEY (`drugid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug`
--

LOCK TABLES `drug` WRITE;
/*!40000 ALTER TABLE `drug` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drugupdate`
--

DROP TABLE IF EXISTS `drugupdate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugupdate` (
  `dispid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `drugid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `count` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dispid`,`drugid`,`timestamp`),
  KEY `drugfk` (`drugid`),
  CONSTRAINT `dispfk` FOREIGN KEY (`dispid`) REFERENCES `dispenser` (`dispid`),
  CONSTRAINT `drugfk` FOREIGN KEY (`drugid`) REFERENCES `drug` (`drugid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drugupdate`
--

LOCK TABLES `drugupdate` WRITE;
/*!40000 ALTER TABLE `drugupdate` DISABLE KEYS */;
/*!40000 ALTER TABLE `drugupdate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicaltest`
--

DROP TABLE IF EXISTS `medicaltest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicaltest` (
  `testid` varchar(255) NOT NULL,
  `testname` varchar(255) NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicaltest`
--

LOCK TABLES `medicaltest` WRITE;
/*!40000 ALTER TABLE `medicaltest` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicaltest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nurse` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `nurseid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`nurseid`),
  UNIQUE KEY `nurseid` (`nurseid`),
  CONSTRAINT `nurfk` FOREIGN KEY (`nurseid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nurse`
--

LOCK TABLES `nurse` WRITE;
/*!40000 ALTER TABLE `nurse` DISABLE KEYS */;
/*!40000 ALTER TABLE `nurse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `clinicno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nurseid` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`clinicno`),
  KEY `regfk` (`nurseid`),
  CONSTRAINT `patfk` FOREIGN KEY (`clinicno`) REFERENCES `user` (`userid`),
  CONSTRAINT `regfk` FOREIGN KEY (`nurseid`) REFERENCES `nurse` (`nurseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientrecord`
--

DROP TABLE IF EXISTS `patientrecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientrecord` (
  `clinicno` varchar(255) NOT NULL,
  `nextdate` date NOT NULL,
  PRIMARY KEY (`clinicno`),
  CONSTRAINT `prefk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientrecord`
--

LOCK TABLES `patientrecord` WRITE;
/*!40000 ALTER TABLE `patientrecord` DISABLE KEYS */;
/*!40000 ALTER TABLE `patientrecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patienttest`
--

DROP TABLE IF EXISTS `patienttest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patienttest` (
  `clinicno` varchar(255) NOT NULL,
  `testid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `result` varchar(255) NOT NULL,
  PRIMARY KEY (`clinicno`,`testid`,`date`),
  KEY `ptfk2` (`testid`),
  CONSTRAINT `ptfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  CONSTRAINT `ptfk2` FOREIGN KEY (`testid`) REFERENCES `medicaltest` (`testid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patienttest`
--

LOCK TABLES `patienttest` WRITE;
/*!40000 ALTER TABLE `patienttest` DISABLE KEYS */;
/*!40000 ALTER TABLE `patienttest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacist` (
  `name` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL,
  `pharmaid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`pharmaid`),
  UNIQUE KEY `pharmaid` (`pharmaid`),
  CONSTRAINT `phfk` FOREIGN KEY (`pharmaid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacist`
--

LOCK TABLES `pharmacist` WRITE;
/*!40000 ALTER TABLE `pharmacist` DISABLE KEYS */;
/*!40000 ALTER TABLE `pharmacist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmdisp`
--

DROP TABLE IF EXISTS `pharmdisp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmdisp` (
  `pharmaid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dispid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reportid` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`pharmaid`,`dispid`,`timestamp`),
  KEY `reportfk` (`reportid`),
  KEY `dispenfk` (`dispid`),
  CONSTRAINT `dispenfk` FOREIGN KEY (`dispid`) REFERENCES `dispenser` (`dispid`),
  CONSTRAINT `pharmfk` FOREIGN KEY (`pharmaid`) REFERENCES `pharmacist` (`pharmaid`),
  CONSTRAINT `reportfk` FOREIGN KEY (`reportid`) REFERENCES `report` (`reportid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmdisp`
--

LOCK TABLES `pharmdisp` WRITE;
/*!40000 ALTER TABLE `pharmdisp` DISABLE KEYS */;
/*!40000 ALTER TABLE `pharmdisp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription` (
  `slmcid` varchar(255) NOT NULL,
  `clinicno` varchar(255) NOT NULL,
  `drugid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `dose` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  PRIMARY KEY (`slmcid`,`clinicno`,`drugid`,`date`),
  KEY `presfk` (`clinicno`),
  KEY `presfk2` (`drugid`),
  CONSTRAINT `presfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`),
  CONSTRAINT `presfk2` FOREIGN KEY (`drugid`) REFERENCES `drug` (`drugid`),
  CONSTRAINT `presfk3` FOREIGN KEY (`slmcid`) REFERENCES `doctor` (`slmcid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `reportid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `reportname` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`reportid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',0),('disp','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',2),('doctor','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',1),('nurse','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',4),('patien','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',5),('pharma','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-11 15:46:49
