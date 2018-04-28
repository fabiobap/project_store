CREATE DATABASE  IF NOT EXISTS `projectstore` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `projectstore`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: projectstore
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Clothes'),(2,'Computers'),(3,'Electronics'),(4,'Home Appliance');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `details` text NOT NULL,
  `insertionDate` datetime DEFAULT NULL,
  `modificationDate` datetime DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Microwave 1','Cool Brand','xyz-111',100,'cool product','cool product','2018-04-19 11:40:15','2018-04-19 11:40:15',4,'./resources/images/products/Microwave+1-15241488154485.jpg'),(2,'Microwave 2','Cool Brand','Cool Model',150,'Cool product','Cool product','2018-04-19 11:41:19','2018-04-19 11:41:19',4,'./resources/images/products/Microwave+2-15241488791520.jpg'),(3,'Microwave 3','Cool Brand','Cool Model',250,'Cool product','Cool product','2018-04-19 11:41:44','2018-04-19 11:41:44',4,'./resources/images/products/Microwave+3-15241489044865.jpg'),(4,'Notebook Ultra','Notebookster','XYZ-222',500,'best notebook out there','120x120','2018-04-19 11:42:44','2018-04-19 11:42:44',2,'./resources/images/products/Notebook+Ultra-15241489644895.jpg'),(5,'Notebook Super','Notebrackster','XYZ-666',330,'very cool','widescreen','2018-04-19 11:43:59','2018-04-19 11:43:59',2,'./resources/images/products/Notebook+Super-15241490392021.jpg'),(6,'Notebook Megablaster','Megablaster Inc','XYZ-2000',1000,'best notebook of the world','full hdmi','2018-04-19 11:44:57','2018-04-19 11:44:57',2,'./resources/images/products/Notebook+Megablaster-15241490974313.jpg'),(7,'Cool Tshirt','Coolio','XWQ',30,'Cool Tshirt','Cool Tshirt','2018-04-19 11:45:23','2018-04-19 11:45:23',1,'./resources/images/products/Cool+Tshirt-15241491232545.jpg'),(8,'Cool Tshirt 2','Cool Tshirt','XTR2',44,'Cool Tshirt','Cool Tshirt','2018-04-19 11:46:00','2018-04-19 11:46:00',1,'./resources/images/products/Cool+Tshirt+2-15241491603166.jpg'),(9,'Cool Tshirt','Cool Tshirt','6GYR',100,'Cool Tshirt','Cool Tshirt','2018-04-19 11:46:28','2018-04-19 11:46:28',1,'./resources/images/products/Cool+Tshirt-15241491882731.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-19 11:49:49
