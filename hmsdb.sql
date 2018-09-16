-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 02:24 PM
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
  `email` varchar(255) NOT NULL,
  `contactno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `email`, `contactno`) VALUES
('admin', 'Test Administrator', 'w.nipuna@gmail.com', 766419486),
('akilag', 'Akila Gamage', 'akilai94@outlook.com', 712402421),
('juranaweera', 'Janindu Ranaweera', 'w.nipuna@gmail.com', 766419486),
('nipuna', 'Nipuna Weerasekara', 'w.nipuna@gmail.com', 766419486),
('nipuna2', 'Nipuna Weerasekara', 'w.nipuna@gmail.com', 766419486),
('nisald', 'Nisal Bandara', 'nisaldbandara96@gmail.com', 714775775),
('uditha', 'Nipuna Weerasekara', 'w.nipuna@gmail.com', 766419486);

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

--
-- Dumping data for table `dispenser`
--

INSERT INTO `dispenser` (`name`, `contactno`, `dispid`, `email`) VALUES
('Test Dispenser', 766419486, 'disp', 'w.nipuna@gmail.com');

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

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `contactno`, `slmcid`, `email`) VALUES
('Test Doctor', 766419486, 'doctor', 'w.nipuna@gmail.com');

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

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drugid`, `drugname`, `count`) VALUES
('asp', 'ASPIRIN', 1000),
('ato', 'ATORVASTATIN', 1000),
('clo', 'CLOPIDOGREL', 1000),
('ena', 'ENALAPRIL', 1000),
('gli', 'GLIBENCLAMIDE', 1000),
('los', 'LOSARTAN K.', 1000),
('met', 'METFORMIN', 1000),
('mix', 'MIX.INSULIN', 1000),
('pio', 'PIOGLITAZONE', 1000),
('sit', 'SITAGLIPTIN', 1000),
('tol', 'TOLBUTAMIDE', 1000);

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

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`name`, `contactno`, `nurseid`, `email`) VALUES
('Test Nurse', 766419486, 'nurse', 'w.nipuna@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

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
  `mc` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`name`, `gender`, `dob`, `contactno`, `clinicno`, `email`, `address`, `nurseid`, `timestamp`, `dc`, `mc`) VALUES
('Test Patient14', 1, '1938-03-11', 762047044, 'c880014', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:08', 1, 0),
('Test Patient12', 0, '1967-03-11', 765512904, 'd450012', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:07', 1, 0),
('Test Patient30', 1, '1921-03-11', 767047751, 'd490030', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:14', 1, 0),
('Test Patient23', 1, '1974-03-11', 768603732, 'd520023', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:11', 1, 0),
('Test Patient22', 0, '1939-03-11', 765961745, 'e310022', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:11', 1, 0),
('Test Patient28', 1, '1966-03-11', 768580051, 'e780028', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:13', 1, 0),
('Test Patient29', 1, '1953-03-11', 768561014, 'g650029', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:13', 1, 0),
('Test Patient16', 1, '1936-03-11', 765157148, 'h640016', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:09', 1, 0),
('Test Patient6', 0, '1928-03-11', 765661109, 'h810006', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:05', 1, 0),
('Test Patient15', 0, '1952-03-11', 769610383, 'i800015', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:09', 1, 0),
('Test Patient10', 1, '1986-03-11', 764222477, 'j710010', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:07', 1, 0),
('Test Patient24', 1, '1962-03-11', 767494631, 'k450024', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:12', 1, 0),
('Test Patient20', 0, '1924-03-11', 762574607, 'm670020', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:10', 1, 0),
('Test Patient17', 0, '1988-03-11', 761337121, 'n440017', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:09', 1, 0),
('Test Patient26', 1, '1963-03-11', 761285723, 'p580026', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:12', 1, 0),
('Test Patient ', 1, '1996-03-11', 766419486, 'patient', 'w.nipuna@gmail.com', 'vfsafdhafdhafdbdfz', 'nurse', '2018-09-13 20:11:25', 1, 0),
('Test Patient1', 0, '1995-03-11', 766419486, 'patient1', 'w.nipuna@gmail.com', 'vfsafdhafdhafdbdfz', 'nurse', '2018-09-13 20:11:25', 1, 0),
('Test Patient2', 1, '1994-03-11', 766419486, 'patient2', 'w.nipuna@gmail.com', 'vfsafdhafdhafdbdfz', 'nurse', '2018-09-13 20:11:25', 1, 0),
('Test Patient3', 1, '1993-03-11', 766419486, 'patient3', 'w.nipuna@gmail.com', 'vfsafdhafdhafdbdfz', 'nurse', '2018-09-13 20:11:25', 1, 1),
('Test Patient4', 1, '1992-03-11', 766419486, 'patient4', 'w.nipuna@gmail.com', 'vfsafdhafdhafdbdfz', 'nurse', '2018-09-13 20:11:25', 0, 1),
('Test Patient5', 1, '1991-03-11', 766419486, 'patient5', 'w.nipuna@gmail.com', 'vfsafdhafdhafdbdfz', 'nurse', '2018-09-13 20:11:25', 0, 1),
('Test Patient13', 0, '1928-03-11', 761387674, 'r200013', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:08', 1, 0),
('Test Patient18', 0, '1981-03-11', 762913982, 'r380018', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:10', 1, 0),
('Test Patient25', 0, '1925-03-11', 767966251, 'r430025', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:12', 1, 0),
('Test Patient8', 0, '1922-03-11', 765985506, 's350008', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:06', 1, 0),
('Test Patient9', 1, '1989-03-11', 767411088, 't290009', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:06', 1, 0),
('Test Patient19', 1, '1969-03-11', 765151562, 't680019', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:10', 1, 0),
('Test Patient21', 0, '1989-03-11', 761381015, 'u340021', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:11', 1, 0),
('Test Patient7', 1, '1999-03-11', 764193373, 'u530007', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:06', 1, 0),
('Test Patient27', 0, '1960-03-11', 767082722, 'u530027', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:13', 1, 0),
('Test Patient11', 0, '1952-03-11', 763390047, 'w570011', 'w.nipuna@gmail.com', 'sdfdsgfdagfad', 'nurse', '2018-09-16 07:17:07', 1, 0);

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

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`name`, `contactno`, `pharmaid`, `email`) VALUES
('Test Pharmacist', 766419486, 'pharma', 'w.nipuna@gmail.com');

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `frequency` varchar(255) NOT NULL DEFAULT '0',
  `dose` int(255) NOT NULL DEFAULT '0',
  `duration` varchar(255) NOT NULL DEFAULT '0'
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
  `flag` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `flag`, `timestamp`) VALUES
('admin', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 0, '2018-09-16 06:52:03'),
('akilag', '$2y$10$orVVcHZA.FTg/0T3elxKqeb3.llH1RulEyT6igpsKRCn70VH7HPHG', 0, '2018-09-16 06:52:03'),
('c880014', '$2y$10$Ne9pUp6IdMj3dB9r.uu1pe.txuOIvooyJN6skkOkWTEpSlUqjTb8O', 5, '2018-09-16 07:17:08'),
('d450012', '$2y$10$ie0nAG2lwsENP3Ze16mbx.bLhFGeOrI71GtTwrwiOykFk4nOyBDX6', 5, '2018-09-16 07:17:07'),
('d490030', '$2y$10$X03euC33Ln4IyIIRkUI/o.QbxYpIfnGgNMU/ykGks/nyxzurWH7da', 5, '2018-09-16 07:17:14'),
('d520023', '$2y$10$ywnWkjpedzi2FDW55CQKe.Ql0nETk6NxB5CHIo0WJxuMdWD/9gUxm', 5, '2018-09-16 07:17:11'),
('disp', '$2y$10$gUlYF7uWya08F0PNXi2R1OPgQih4L/2aWYnq9NRsM27RDOgyADp4.', 2, '2018-09-16 06:52:03'),
('doctor', '$2y$10$YHrd3gyIRDq1O2fDJWXBIOVeZYkRygqBAI4l170GR4qxqrGCiukV6', 1, '2018-09-16 06:52:03'),
('e310022', '$2y$10$OTFM3bDkcjtkCStI5YmB8.LW52Y8JKuLYqPxA.KaVTvowKj3dZTMm', 5, '2018-09-16 07:17:11'),
('e780028', '$2y$10$lXODndLztN1hO6Os4HJb7etFcadoJCNZ9Mf0YwP6UhVjwB9HJfI4O', 5, '2018-09-16 07:17:13'),
('g650029', '$2y$10$P2wUfRuUU2SldfHamKDevOrlEHVCG7jbt4L7xFoUfYRwoRqcWeXQK', 5, '2018-09-16 07:17:13'),
('h640016', '$2y$10$.N1qqvN/RaP7mSguq.Hra.usWfs3Q35pXT69Oo7f2vSb6xak5/iQK', 5, '2018-09-16 07:17:09'),
('h810006', '$2y$10$TG/hg1tynYaSnX78wKKicO1hIA6IMHIEalMLZZ0EBv0HaDMuXEC4i', 5, '2018-09-16 07:17:05'),
('i800015', '$2y$10$eIBmlIdKaeone/oeO4Z6qeCg5L.Keb5Q7ZypCEB6l5QyfR9lV2m2a', 5, '2018-09-16 07:17:09'),
('j710010', '$2y$10$A/LvuPJElHt0HxTI.RkvVOHcWTFuUzoF8nGVVN9letueW4v6RIC9G', 5, '2018-09-16 07:17:07'),
('juranaweera', '$2y$10$YDpdphZEIDwLqwEnDwGhRe7G7DcNHaJuRjsc4kfdDBgp21Dh7v1Wm', 0, '2018-09-16 06:52:03'),
('k450024', '$2y$10$5Uzx34oFpbrsvLhtTM2yJ.OKFJMpczxiSYCN.SJc6TH4NLkiaUgry', 5, '2018-09-16 07:17:12'),
('m670020', '$2y$10$7jV0fHRooL4z4XgQzJUopuHoBJRWC5iiFnN6A6e.NZP6Ob3xSfwhC', 5, '2018-09-16 07:17:10'),
('n440017', '$2y$10$/bD8Dw3ectXB5yLCgB6TUurF5FqI84KMuGJpm4crVcnxTpWOHZkRK', 5, '2018-09-16 07:17:09'),
('nipuna', '$2y$10$LNqrSrd07jCa8UGo9kNkOeVKHb5B.ZdQgNCPJEG.G7LeZf4uw3/JG', 0, '2018-09-16 06:52:03'),
('nipuna2', '$2y$10$fOToKw3wTa8ENSrQw/w4POyys0pDwhVwFp2FMaguXpT9t9aYUMNzS', 0, '2018-09-16 06:52:03'),
('nisald', '$2y$10$Cl.jnlU8RAygOf.3wY5EXeYaBRtFJTO2nzimLXhYXDYrgi0D7iuGe', 0, '2018-09-16 06:52:03'),
('nurse', '$2y$10$j42BPiLfOXhxvNrL4WrJE.o0OiJjpqH6HJfEPe7XqHJOy1R/c0ZuO', 4, '2018-09-16 06:52:03'),
('p580026', '$2y$10$9E0H1TQXod/9GYMnRHZC3OryGpyo2KB/GVI70qHqR5Ek1IaYQSui6', 5, '2018-09-16 07:17:12'),
('patient', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 5, '2018-09-16 06:52:03'),
('patient1', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 5, '2018-09-16 06:52:03'),
('patient2', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 5, '2018-09-16 06:52:03'),
('patient3', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 5, '2018-09-16 06:52:03'),
('patient4', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 5, '2018-09-16 06:52:03'),
('patient5', '$2y$10$dMVTJunsoRXY24NRvqT.6OVD3c70KeSM/F/EHIvfakT1WEw00iRYC', 5, '2018-09-16 06:52:03'),
('pharma', '$2y$10$9Qtuh5mcgo49iWUXtdlG7evfNM.fNfJLFIFtphvm3KwhKc3KpjRN.', 3, '2018-09-16 06:52:03'),
('r200013', '$2y$10$ODMFthAMpo9VleTj0dIAIeeIbFUXiYpMtmKE0JCIAWNNiZnnE1xWa', 5, '2018-09-16 07:17:08'),
('r380018', '$2y$10$/hy.Swzc6hRg.tp7mFz0nO0YCJVFOLCc9.CAXpwZmu2.4RS8XxwXy', 5, '2018-09-16 07:17:10'),
('r430025', '$2y$10$tHQUES6.3bM1k1T8vVlfc.kWBW1kRgF2DRAx/NgzfkawAJanDpniO', 5, '2018-09-16 07:17:12'),
('s350008', '$2y$10$ZSRT2uYsI4FDEZGw8BLu3OrZV/Yo/6FxxI88C3xTYRh3GKksjWItS', 5, '2018-09-16 07:17:06'),
('t290009', '$2y$10$3zfNuiLHlg8/SVRDu1gtM..ND4C15XVgLr4SfKuA0hnbo7lkyl4Du', 5, '2018-09-16 07:17:06'),
('t680019', '$2y$10$0uaoHxW/DoNytzj88oo7e.MJPRjujAT1Qx0rCmsoMYo.iwxgB2EXu', 5, '2018-09-16 07:17:10'),
('u340021', '$2y$10$pCKnPyUfDbezbqTkpZA/YuLxPEXaLzhWIMb1mBOWVhQ3F7bmjlWti', 5, '2018-09-16 07:17:11'),
('u530007', '$2y$10$N69xa7rN/c5VFkBkBJLzgeSORANCmC9O6lqu1cOmqOo2AyYolmnVi', 5, '2018-09-16 07:17:05'),
('u530027', '$2y$10$abhAiU5y6DT2KuOhXm0xN.R7MaxLGBl0zBzsTt0PlRwM/IV96o4Ma', 5, '2018-09-16 07:17:13'),
('uditha', '$2y$10$Kjoxb2GrsxuBmRaRzDiQvePdtKb4XFtLGoSEy/T8sloLes1yzmydi', 0, '2018-09-16 06:52:03'),
('w570011', '$2y$10$mxlI2qRVeNuSUP0gNGGaZONANa6sgEusyNn59Bj94xyG9rxT/xQbG', 5, '2018-09-16 07:17:07');

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
