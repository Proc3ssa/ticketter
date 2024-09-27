-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ticket
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES
(0,NULL,'admin2@gmail.com','11111'),
(1,'Administrator','admin@tickets.com','11111'),
(4,NULL,'pro@g.com','11111'),
(7,'security','security@gmail.com','11111'),
(8,'supervisor','super@gmail.com','11111'),
(3290,'accountant','accountant@gmail.com','11111');
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
  `Time` varchar(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `id` int(10) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES
('Marriage Registry','Tester','2024-09-25','6pm-11pm','Pending Approval','pros3sa@gmail.com',0000004027),
('Resturant','Tester','2024-09-23','6pm-11pm','Pending Approval','pros3sa@gmail.com',0000002130),
('Resturant','Tester','2024-09-20','6pm-11pm','The place is already booked','pros3sa@gmail.com',0000003952);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES
(1,'Slide','slide.jpg',25),
(2,'Bouncy Castle','bcastle.jpeg',25),
(3,'Trampoline','trampoline.webp',25),
(4,'Mini golf ','mingolf.jpg',25),
(5,'Table tennis','tt.jpg',25),
(6,'Snooker','snooker.jpg',25),
(7,'Swimming pool','pool.webp',25),
(8,'Resturant','Resturant.png',0),
(9,'Dome','Dome.png',0),
(10,'Marriage Registry','Marriage.png',0),
(11,'Space Rental','spaace.png',0);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `department` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `numberoftickets` int(11) DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `id` (`id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id`) REFERENCES `departments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES
(248408,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(253393,1,'Slide','Notvisited',25,'Faisal','2024-09-05','ksi','test@gmail.com',1),
(280730,4,'Mini golf ','Notvisited',100,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',4),
(288528,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(303368,1,'Slide','Visited',50,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',2),
(306043,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(362861,6,'Snooker','Notvisited',25,'Faisal','2024-09-15','kumasi','test@gmail.com',1),
(391410,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(404172,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(408404,1,'Slide','Notvisited',125,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',5),
(441903,5,'Table tennis','Notvisited',75,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',3),
(442141,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(466830,4,'Mini golf ','Notvisited',25,'Tester','2024-09-21','kumas','pros3sa@gmail.com',1),
(467559,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(476309,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',1),
(480893,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(483407,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(485512,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',1),
(500456,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(521697,6,'Snooker','Notvisited',100,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',4),
(522898,4,'Mini golf ','Visited',25,'Faisal Halid','2024-05-09','Kumasi','cshfaisalhalid@gmail.com',1),
(555385,4,'Mini golf ','Notvisited',25,'Faisal Halid','2024-05-09','Kumasi','cshfaisalhalid@gmail.com',1),
(564596,2,'Bouncy Castle','Notvisited',25,'Agnes Kyei','2024-05-07','Kumasi','pros3sa@gmail.com',1),
(583270,6,'Snooker','Notvisited',25,'test1','2024-09-16','kumasi','test@gmail.com',1),
(602807,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',1),
(609180,3,'Trampoline','Notvisited',25,'Faisal Halid','2024-05-08','Kumasi','cshfaisalhalid@gmail.com',1),
(624839,2,'Bouncy Castle','Visited',50,'Agnes Kyei','2024-05-07','Kumasi','pros3sa@gmail.com',2),
(632476,7,'Swimming pool','Notvisited',25,'Faisal Halid','2024-05-07','Kumasi','cshfaisalhalid@gmail.com',1);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `number` varchar(13) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=765577 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(69745,'Tester','pros3sa@gmail.com','0553226020','11111','verified');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-25  7:49:26
