-- MySQL dump 10.13  Distrib 5.7.24, for osx10.9 (x86_64)
--
-- Host: localhost    Database: ticket
-- ------------------------------------------------------
-- Server version	8.3.0

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
  `id` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@tickets.com','11111');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `department` varchar(40) DEFAULT NULL,
  `Customer` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES ('Swimming Pool','Jay White','2024-03-09','04:09:09','Visited','0443556456'),('Space Rental','Faisal Halid','2024-05-15','09:56:00','Not visited','cshfaisalhalid@gmail.com'),('Resturant','Faisal Halid','2024-05-22','10:20:00','Not visited','cshfaisalhalid@gmail.com'),('Resturant','Faisal Halid','2024-05-22','10:20:00','Not visited','cshfaisalhalid@gmail.com');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Slide','slide.jpg',25),(2,'Bouncy Castle','bcastle.jpeg',25),(3,'Trampoline','trampoline.webp',25),(4,'Mini golf ','mingolf.jpg',25),(5,'Table tennis','tt.jpg',25),(6,'Snooker','snooker.jpg',25),(7,'Swimming pool','pool.webp',25),(8,'Resturant','Resturant.png',0),(9,'Dome','Dome.png',0),(10,'Marriage Registry','Marriage.png',0),(11,'Space Rental','spaace.png',0);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `ticket_id` int NOT NULL,
  `id` int NOT NULL,
  `department` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL,
  `amount` int NOT NULL,
  `customer` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `numberoftickets` int DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `id` (`id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id`) REFERENCES `departments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (280730,4,'Mini golf ','Notvisited',100,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',4),(303368,1,'Slide','Visited',50,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',2),(408404,1,'Slide','Notvisited',125,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',5),(441903,5,'Table tennis','Notvisited',75,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',3),(476309,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',1),(485512,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',1),(521697,6,'Snooker','Notvisited',100,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',4),(522898,4,'Mini golf ','Visited',25,'Faisal Halid','2024-05-09','Kumasi','cshfaisalhalid@gmail.com',1),(555385,4,'Mini golf ','Notvisited',25,'Faisal Halid','2024-05-09','Kumasi','cshfaisalhalid@gmail.com',1),(564596,2,'Bouncy Castle','Notvisited',25,'Agnes Kyei','2024-05-07','Kumasi','pros3sa@gmail.com',1),(602807,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',1),(609180,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',1),(624839,2,'Bouncy Castle','Visited',50,'Agnes Kyei','2024-05-07','Kumasi','pros3sa@gmail.com',2),(632476,7,'Swimming pool','Notvisited',25,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',1);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-09  6:19:02
