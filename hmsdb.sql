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
INSERT INTO `admin` VALUES ('admin','J.S Perera','w.nipuna@gmail.com',766419486);
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
  `clinic` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `appointmentno` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`clinicno`,`clinic`),
  CONSTRAINT `appfk` FOREIGN KEY (`clinicno`) REFERENCES `patient` (`clinicno`)
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
INSERT INTO `dispenser` VALUES ('K.S. Vithanage',766419486,'disp','w.nipuna@gmail.com');
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
INSERT INTO `doctor` VALUES ('H.G.S.P. Abeynayake',766419486,'doctor','w.nipuna@gmail.com');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
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
  `count` double NOT NULL DEFAULT '0',
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`drugid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug`
--

LOCK TABLES `drug` WRITE;
/*!40000 ALTER TABLE `drug` DISABLE KEYS */;
INSERT INTO `drug` VALUES ('d1','AMLODIPINE',499,1),('d10','GTN',1000,1),('d11','HCT',1000,1),('d12','ISMN',1000,1),('d13','LASIX',1000,1),('d14','LOSARTAN K.',944,2),('d15','METFORMIN',944,0),('d16','METOPROLOL',1000,1),('d17','MIX.INSULIN',1000,0),('d18','NSR',1000,1),('d19','OLEMESARTAN',1000,1),('d2','ASPIRIN',1000,2),('d20','PIOGLITAZONE',1000,0),('d21','SITAGLIPTIN',1000,0),('d22','TOLBUTAMIDE',1000,0),('d23','VERPAMIL',1000,1),('d3','ATENOLOL',1000,1),('d4','ATORVASTATIN',1000,2),('d5','CARVEDILOL',1000,1),('d6','CLOPIDOGREL',1000,2),('d7','DILTIAZEM',1000,1),('d8','ENALAPRIL',1000,0),('d9','GLIBENCLAMIDE',1000,0);
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
INSERT INTO `drugupdate` VALUES ('disp','d1',50,'2019-01-01 16:53:50'),('disp','d10',500,'2019-01-02 04:23:51'),('disp','d11',500,'2019-01-02 03:40:27'),('disp','d12',1000,'2018-10-28 11:01:12'),('disp','d13',1000,'2018-10-28 11:01:17'),('disp','d14',0,'2019-01-06 11:42:52'),('disp','d15',112,'2019-01-01 16:54:18'),('disp','d16',1000,'2018-10-28 11:02:02'),('disp','d17',112,'2019-01-01 16:54:07'),('disp','d18',1000,'2018-10-28 11:01:43'),('disp','d19',1000,'2018-10-28 11:01:52'),('disp','d2',56,'2018-10-30 11:53:11'),('disp','d20',1000,'2018-10-28 11:02:15'),('disp','d21',1000,'2018-10-28 11:02:23'),('disp','d22',1000,'2018-10-28 11:02:32'),('disp','d23',1000,'2018-10-28 11:02:37'),('disp','d3',1000,'2018-10-28 10:53:27'),('disp','d4',56,'2018-10-30 11:53:31'),('disp','d5',1000,'2018-10-28 11:00:17'),('disp','d6',1000,'2018-10-28 11:00:28'),('disp','d7',1000,'2018-10-28 11:00:35'),('disp','d8',1000,'2018-10-28 11:00:40'),('disp','d9',1000,'2018-10-28 11:00:46');
/*!40000 ALTER TABLE `drugupdate` ENABLE KEYS */;
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
INSERT INTO `nurse` VALUES ('H.S. Silva',766419486,'nurse','w.nipuna@gmail.com');
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
INSERT INTO `patient` VALUES ('Chamith Jayathilake',1,'1995-05-11',751234567,'patient0','cjayathilake@gmail.com','No 25, Asiri Mawatha, Thalpitiya, Wadduwa','nurse','2018-09-18 13:03:51',1,0),('Sanjaya Hashan',1,'1995-06-01',751234567,'patient1','sanjayahash@gmail.com','No 25, Asiri Mawatha, Thalpitiya, Wadduwa','nurse','2018-09-18 13:03:51',0,1),('J.U. Udara',1,'1995-05-15',766419486,'u950004','w.nipuna@gmail.com','45, Sausiri Mawatha, Nagoda.','nurse','2019-01-06 11:35:07',0,1),('W.M.D.N.L. Weerasekara',1,'1996-03-11',766419486,'w960003','w.nipuna@gmail.com','45, Sausiri Mawatha, Nagoda.','nurse','2018-10-20 06:11:59',1,0);
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
  `clinic` tinyint(1) NOT NULL,
  `nextdate` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`clinicno`,`timestamp`),
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
INSERT INTO `pharmacist` VALUES ('N. Jayathissa',766419486,'pharma','w.nipuna@gmail.com');
/*!40000 ALTER TABLE `pharmacist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmdisp`
--

DROP TABLE IF EXISTS `pharmdisp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmdisp` (
  `pharmaid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `dispid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readtime` timestamp NULL DEFAULT NULL,
  `drugid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `count` int(11) NOT NULL,
  `reportid` int(255) NOT NULL,
  PRIMARY KEY (`dispid`,`createtime`,`drugid`),
  KEY `pharmdrugfk` (`drugid`),
  KEY `pharmpharmfk` (`pharmaid`),
  CONSTRAINT `pharmdispfk` FOREIGN KEY (`dispid`) REFERENCES `dispenser` (`dispid`),
  CONSTRAINT `pharmdrugfk` FOREIGN KEY (`drugid`) REFERENCES `drug` (`drugid`),
  CONSTRAINT `pharmpharmfk` FOREIGN KEY (`pharmaid`) REFERENCES `pharmacist` (`pharmaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmdisp`
--

LOCK TABLES `pharmdisp` WRITE;
/*!40000 ALTER TABLE `pharmdisp` DISABLE KEYS */;
INSERT INTO `pharmdisp` VALUES ('pharma','disp','2018-11-28 08:58:19','2018-12-03 06:40:52','d1',1000,1),('pharma','disp','2018-11-28 08:58:19','2018-12-03 06:40:52','d10',1000,1),('pharma','disp','2018-11-28 08:58:19','2018-12-03 06:40:52','d11',1000,1),('pharma','disp','2018-12-03 06:41:28','2018-12-03 06:42:04','d1',1000,2),('pharma','disp','2018-12-03 06:41:28','2018-12-03 06:42:04','d10',1000,2),('pharma','disp','2018-12-03 06:41:28','2018-12-03 06:42:04','d11',1000,2),('pharma','disp','2019-01-02 03:37:53','2019-01-02 03:39:01','d10',501,3),('pharma','disp','2019-01-02 03:37:53','2019-01-02 03:39:01','d11',500,3),('pharma','disp','2019-01-02 04:21:56','2019-01-02 04:22:44','d10',500,4),('pharma','disp','2019-01-03 08:14:25','2019-01-06 11:47:16','d14',1000,5);
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
  `frequency` varchar(255) NOT NULL DEFAULT '0',
  `dose` int(255) NOT NULL DEFAULT '0',
  `duration` varchar(255) NOT NULL DEFAULT '0',
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
-- Table structure for table `sysmsg`
--

DROP TABLE IF EXISTS `sysmsg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sysmsg` (
  `message` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readtime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`message`,`createtime`),
  CONSTRAINT `msgfk` FOREIGN KEY (`message`) REFERENCES `drug` (`drugid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sysmsg`
--

LOCK TABLES `sysmsg` WRITE;
/*!40000 ALTER TABLE `sysmsg` DISABLE KEYS */;
INSERT INTO `sysmsg` VALUES ('d1','2019-01-06 06:42:06',NULL);
/*!40000 ALTER TABLE `sysmsg` ENABLE KEYS */;
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','$2y$10$Zo/G8sbbJadthYK0z0g1Oe98kA.bnTgKVCbDZh7uZoHHYm.z13wS.',0,'2018-09-16 06:52:03'),('disp','$2y$10$ELILlzwRZq/h8IrSeqrIceqxj7XHW/cOTB0htCqvfMtjUoFs.jtKW',2,'2018-09-16 06:52:03'),('doctor','$2y$10$SG0JT8lj69kPjc8eb2D9keXOoMS8PLDQuRlM8IecCzfbGdqd0uKxu',1,'2018-09-16 06:52:03'),('nurse','$2y$10$3yhgNSPOLQTmkCFjCIoGU.pGOU4mtXSe11TLpGpCPk3ogxWVpJmyW',4,'2018-09-16 06:52:03'),('patient0','$2y$10$mB2msX7f9uVjhLTMgOLmFuZTxTTVZmYjMfQUmIJP2NdgSNeIe/fVC',5,'2018-09-18 13:01:03'),('patient1','$2y$10$mB2msX7f9uVjhLTMgOLmFuZTxTTVZmYjMfQUmIJP2NdgSNeIe/fVC',5,'2018-09-18 13:01:03'),('pharma','$2y$10$KZdth47eWtpr4UjSVxToKO6OXBWtehUxmArn4EzpWl1In4/xWqBue',3,'2018-09-16 06:52:03'),('u950004','$2y$10$RUUziXcQdAZh6OAhaLzik.FxePzx0RcsHU9JPJuxtiJ0Yu8YH36NW',5,'2019-01-06 11:35:07'),('w960003','$2y$10$7HACg0KNLmtqtmaWLqbLQ.0rxMHHGK9sbMBknLqlBZK2Iw1QSfjbK',5,'2018-10-20 06:11:59');
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

-- Dump completed on 2019-01-07  8:43:46
