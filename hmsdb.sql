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
  `contactno` int(10) NOT NULL,
  PRIMARY KEY (`adminid`),
  CONSTRAINT `adminfk` FOREIGN KEY (`adminid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','Test Administrator','w.nipuna@gmail.com',766419486),('akilag','Akila Gamage','akilai94@outlook.com',712402421),('juranaweera','Janindu Ranaweera','w.nipuna@gmail.com',766419486),('nipuna','Nipuna Weerasekara','w.nipuna@gmail.com',766419486),('nipuna2','Nipuna Weerasekara','w.nipuna@gmail.com',766419486),('nisald','Nisal Bandara','nisaldbandara96@gmail.com',714775775),('uditha','Nipuna Weerasekara','w.nipuna@gmail.com',766419486);
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
INSERT INTO `dispenser` VALUES ('Test Dispenser',766419486,'disp','w.nipuna@gmail.com');
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
INSERT INTO `doctor` VALUES ('Test Doctor',766419486,'doctor','w.nipuna@gmail.com');
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
INSERT INTO `drug` VALUES ('asp','ASPIRIN',1000),('ato','ATORVASTATIN',1000),('clo','CLOPIDOGREL',1000),('ena','ENALAPRIL',1000),('gli','GLIBENCLAMIDE',1000),('los','LOSARTAN K.',1000),('met','METFORMIN',1000),('mix','MIX.INSULIN',1000),('pio','PIOGLITAZONE',1000),('sit','SITAGLIPTIN',1000),('tol','TOLBUTAMIDE',1000);
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
INSERT INTO `nurse` VALUES ('Test Nurse',766419486,'nurse','w.nipuna@gmail.com');
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
  `gender` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `contactno` int(10) NOT NULL,
  `clinicno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nurseid` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dc` tinyint(1) DEFAULT '0',
  `mc` tinyint(1) DEFAULT '0',
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
INSERT INTO `patient` VALUES ('Test Patient ',1,'1996-03-11',766419486,'patient','w.nipuna@gmail.com','vfsafdhafdhafdbdfz','nurse','2018-09-13 20:11:25',1,0),('Test Patient1',0,'1995-03-11',766419486,'patient1','w.nipuna@gmail.com','vfsafdhafdhafdbdfz','nurse','2018-09-13 20:11:25',1,0),('Test Patient2',1,'1994-03-11',766419486,'patient2','w.nipuna@gmail.com','vfsafdhafdhafdbdfz','nurse','2018-09-13 20:11:25',1,0),('Test Patient3',1,'1993-03-11',766419486,'patient3','w.nipuna@gmail.com','vfsafdhafdhafdbdfz','nurse','2018-09-13 20:11:25',1,1),('Test Patient4',1,'1992-03-11',766419486,'patient4','w.nipuna@gmail.com','vfsafdhafdhafdbdfz','nurse','2018-09-13 20:11:25',0,1),('Test Patient5',1,'1991-03-11',766419486,'patient5','w.nipuna@gmail.com','vfsafdhafdhafdbdfz','nurse','2018-09-13 20:11:25',0,1);
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
INSERT INTO `pharmacist` VALUES ('Test Pharmacist',766419486,'pharma','w.nipuna@gmail.com');
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `frequency` int(255) NOT NULL DEFAULT '0',
  `dose` int(1) NOT NULL DEFAULT '0',
  `duration` int(1) NOT NULL DEFAULT '0',
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
INSERT INTO `prescription` VALUES ('doctor','patient','asp','2018-09-15 12:31:36',100,1,1),('doctor','patient','ato','2018-09-15 12:31:36',125,1,1),('doctor','patient','clo','2018-09-15 12:31:36',100,1,1),('doctor','patient','ena','2018-09-15 12:31:37',10,1,1),('doctor','patient','gli','2018-09-15 12:31:37',15,1,1),('doctor','patient','los','2018-09-15 12:31:37',10,1,1),('doctor','patient','met','2018-09-15 12:31:37',10,1,1),('doctor','patient','mix','2018-09-15 12:31:37',10,1,1),('doctor','patient','pio','2018-09-15 12:31:37',10,1,1),('doctor','patient','sit','2018-09-15 12:31:37',11,1,1),('doctor','patient','tol','2018-09-15 12:31:37',15,1,1);
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
INSERT INTO `user` VALUES ('admin','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',0),('akilag','$2y$10$orVVcHZA.FTg/0T3elxKqeb3.llH1RulEyT6igpsKRCn70VH7HPHG',0),('disp','$2y$10$gUlYF7uWya08F0PNXi2R1OPgQih4L/2aWYnq9NRsM27RDOgyADp4.',2),('doctor','$2y$10$YHrd3gyIRDq1O2fDJWXBIOVeZYkRygqBAI4l170GR4qxqrGCiukV6',1),('juranaweera','$2y$10$YDpdphZEIDwLqwEnDwGhRe7G7DcNHaJuRjsc4kfdDBgp21Dh7v1Wm',0),('nipuna','$2y$10$LNqrSrd07jCa8UGo9kNkOeVKHb5B.ZdQgNCPJEG.G7LeZf4uw3/JG',0),('nipuna2','$2y$10$fOToKw3wTa8ENSrQw/w4POyys0pDwhVwFp2FMaguXpT9t9aYUMNzS',0),('nisald','$2y$10$Cl.jnlU8RAygOf.3wY5EXeYaBRtFJTO2nzimLXhYXDYrgi0D7iuGe',0),('nurse','$2y$10$j42BPiLfOXhxvNrL4WrJE.o0OiJjpqH6HJfEPe7XqHJOy1R/c0ZuO',4),('patient','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',5),('patient1','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',5),('patient2','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',5),('patient3','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',5),('patient4','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',5),('patient5','$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC',5),('pharma','$2y$10$9Qtuh5mcgo49iWUXtdlG7evfNM.fNfJLFIFtphvm3KwhKc3KpjRN.',3),('uditha','$2y$10$Kjoxb2GrsxuBmRaRzDiQvePdtKb4XFtLGoSEy/T8sloLes1yzmydi',0);
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

-- Dump completed on 2018-09-16 10:19:27
