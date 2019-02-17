CREATE DATABASE  IF NOT EXISTS `shumkov2` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `shumkov2`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: shumkov2
-- ------------------------------------------------------
-- Server version	5.5.46-log

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
-- Table structure for table `body_shop`
--

DROP TABLE IF EXISTS `body_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `body_shop` (
  `Body_Shop_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone_Number` int(11) DEFAULT NULL,
  PRIMARY KEY (`Body_Shop_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `body_shop`
--

LOCK TABLES `body_shop` WRITE;
/*!40000 ALTER TABLE `body_shop` DISABLE KEYS */;
INSERT INTO `body_shop` VALUES (1,'Kutsebo &quot;Cust','Kukuevo 9',2561728),(4,'Бог','1',1),(5,'1','1',1),(6,'Shvarc &quot;Custo','Bryton 18',2665678),(7,'7','7',7),(9,'1','1',1);
/*!40000 ALTER TABLE `body_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car` (
  `Car_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Plate_number` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Type_of_Car` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Horse_Power` int(11) DEFAULT NULL,
  `Model_Year` year(4) DEFAULT NULL,
  `Color` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Car_ID`),
  UNIQUE KEY `Car_ID_UNIQUE` (`Car_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (1,1,'56754','Shkoda',168,1999,'Black'),(2,1,'1','1',1,2001,'1'),(4,1,'4','4',4,2004,'4'),(5,1,'5','5',5,2005,'5'),(7,1,'7','7',7,2007,'7'),(8,1,'8','8',8,2008,'8');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Full_Name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Number_of_driver_license` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone_Number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Виталик','123','Родонитовая 26','123'),(2,'Володя','32767','Премьерская 2','321'),(3,'131','32281488','3','3'),(4,'4','4','4','4'),(6,'1','32767','1','1'),(7,'7','7','7','7');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Car_ID` int(11) NOT NULL,
  `Cost_of_order` decimal(10,0) DEFAULT NULL,
  `Date_of_order` date DEFAULT NULL,
  `Type_of_work` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Planed_date_of_ending_order` date DEFAULT NULL,
  `Real_time_of_ending_order` date DEFAULT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,1,1,'2012-12-12','1','2012-12-12','2012-12-12');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mylogin','202cb962ac59075b964b07152d234b70'),(2,'admin','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker` (
  `Worker_ID` int(11) NOT NULL,
  `Full_Name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone_Number` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Qualification` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Body_Shop_ID` int(11) NOT NULL,
  PRIMARY KEY (`Worker_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (7,'1','1','1','1',1);
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works` (
  `Worker_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  PRIMARY KEY (`Worker_ID`,`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-04  2:50:49
