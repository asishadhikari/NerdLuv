-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: NERDLUV
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

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
-- Table structure for table `fav_os`
--

DROP TABLE IF EXISTS `fav_os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fav_os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fav_os`
--

LOCK TABLES `fav_os` WRITE;
/*!40000 ALTER TABLE `fav_os` DISABLE KEYS */;
INSERT INTO `fav_os` VALUES (1,'Linux',1),(2,'Windows',2),(3,'Windows',3),(4,'Mac OS X',4),(5,'Windows',5),(6,'Windows',6),(7,'Windows',7),(8,'Windows',8),(9,'Windows',9),(10,'Linux',10),(11,'Windows',11),(12,'Windows',12),(13,'Linux',13),(14,'Windows',14),(15,'Mac OS X',15),(16,'Mac OS X',16),(17,'Mac OS X',17),(18,'Windows',18),(19,'Mac OS X',19);
/*!40000 ALTER TABLE `fav_os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personalities`
--

DROP TABLE IF EXISTS `personalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personalities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personalities`
--

LOCK TABLES `personalities` WRITE;
/*!40000 ALTER TABLE `personalities` DISABLE KEYS */;
INSERT INTO `personalities` VALUES (1,'INFP',1),(2,'INFP',2),(3,'INFP',3),(4,'INFJ',4),(5,'INFP',5),(6,'INFP',6),(7,'INFJ',7),(8,'INFP',8),(9,'INFP',9),(10,'ESTJ',10),(11,'INFP',11),(12,'INFP',12),(13,'INFP',13),(14,'ESTJ',14),(15,'INFJ',15),(16,'INFJ',16),(17,'INFP',17),(18,'INFP',18),(19,'INFP',19);
/*!40000 ALTER TABLE `personalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seeking_age`
--

DROP TABLE IF EXISTS `seeking_age`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seeking_age` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_age` int(11) DEFAULT '0',
  `max_age` int(11) DEFAULT '50',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seeking_age`
--

LOCK TABLES `seeking_age` WRITE;
/*!40000 ALTER TABLE `seeking_age` DISABLE KEYS */;
INSERT INTO `seeking_age` VALUES (1,20,25,1),(2,22,26,2),(3,10,30,3),(4,20,30,4),(5,20,25,5),(6,20,25,6),(7,20,25,7),(8,20,25,8),(9,20,25,9),(10,20,25,10),(11,20,25,11),(12,20,25,12),(13,20,25,13),(14,30,40,14),(15,20,30,15),(16,20,30,16),(17,21,12,17),(18,12,1,18),(19,20,25,19);
/*!40000 ALTER TABLE `seeking_age` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `age` int(10) unsigned DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ashish','M',25,'2019-04-04 05:59:05'),(2,'Shrinkhala','F',22,'2019-04-04 18:04:18'),(3,'Randy','M',35,'2019-04-04 18:04:50'),(4,'Ashish','M',26,'2019-04-04 19:26:50'),(5,'James','M',21,'2019-04-04 19:55:59'),(6,'Jessica+','F',21,'2019-04-04 19:56:23'),(7,'Adrien','M',20,'2019-04-04 20:27:03'),(8,'Lolita','F',21,'2019-04-04 20:27:33'),(9,'Peter','M',22,'2019-04-04 20:32:22'),(10,'Aditi','F',20,'2019-04-04 20:33:31'),(11,'Pamela','F',22,'2019-04-04 20:41:08'),(12,'Ronald','M',22,'2019-04-04 20:51:24'),(13,'Regina','F',20,'2019-04-04 20:57:13'),(14,'Felix','M',30,'2019-04-04 21:53:41'),(15,'Suvekchya','F',23,'2019-04-04 22:01:47'),(16,'Suvekchya','F',23,'2019-04-04 22:02:19'),(17,'Ej','M',21,'2019-04-04 23:42:23'),(18,'Ej','M',23,'2019-04-04 23:45:13'),(19,'Vijay','M',25,'2019-04-04 23:53:00');
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

-- Dump completed on 2019-04-04 23:58:06
