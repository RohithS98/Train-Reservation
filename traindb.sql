-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: traindb
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `admindetails`
--

DROP TABLE IF EXISTS `admindetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admindetails` (
  `user` varchar(20) DEFAULT NULL,
  `psw` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admindetails`
--

LOCK TABLES `admindetails` WRITE;
/*!40000 ALTER TABLE `admindetails` DISABLE KEYS */;
INSERT INTO `admindetails` VALUES ('rohith','abcd'),('q','1234');
/*!40000 ALTER TABLE `admindetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `ticketno` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `trainno` varchar(20) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`ticketno`),
  KEY `username` (`username`),
  CONSTRAINT `history_ibfk_1` FOREIGN KEY (`username`) REFERENCES `userdetails` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES ('12143907519','2018-12-04','Cancelled','q','2',1500),('40817734003','2018-11-27','Cancelled','q','12164',400),('41471453844','2018-11-08','Cancelled','q','1',300),('49823515219','2019-01-07','Confirmed','rohith','12348',300),('59665951607','2018-11-08','Cancelled','q','2',700),('70436557917','2018-12-01','Cancelled','rohith','24568',300),('73925847397','2018-11-08','Cancelled','q','2',400),('82625788515','2018-11-06','Cancelled','q','1',200),('89239882761','2018-11-06','Cancelled','q','1234',300),('91468275422','2018-11-06','Cancelled','q','2',200);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `train`
--

DROP TABLE IF EXISTS `train`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `train` (
  `trainno` varchar(10) NOT NULL,
  `StationList` varchar(200) DEFAULT NULL,
  `days` varchar(50) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  PRIMARY KEY (`trainno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `train`
--

LOCK TABLES `train` WRITE;
/*!40000 ALTER TABLE `train` DISABLE KEYS */;
INSERT INTO `train` VALUES ('12164','chennai,renigunta,mumbai','Sun,Mon,Tue,Wed,Thu,Fri,Sat','On',100),('12348','delhi,bhopal,hyderabad,tirupati','Sun,Tue,Thu,Fri','On',100),('21435','chennai,renigunta,tirupati,hyderabad','Tue,Thu,Sat','On',100),('24568','tirupati,bangalore,pune,mumbai','Mon,Tue,Wed,Sat','On',100),('36574','tirupati,bangalore,hyderabad,jhansi,delhi,jaipur','Sun,Tue,Wed','On',100);
/*!40000 ALTER TABLE `train` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetails` (
  `user` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `aadhar` bigint(20) DEFAULT NULL,
  `ACNO` bigint(20) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
INSERT INTO `userdetails` VALUES ('q','1234',765287349812,2993097282,3631),('rohith','abcd',123123123123,9938846728,1264);
/*!40000 ALTER TABLE `userdetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-30  0:10:40
