-- Progettazione Web 
DROP DATABASE if exists Doni_635318; 
CREATE DATABASE Doni_635318; 
USE Doni_635318; 
-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: Doni_635318
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

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
-- Table structure for table `cittadino`
--

DROP TABLE IF EXISTS `cittadino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cittadino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(30) NOT NULL,
  `cognome` char(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password_account` varchar(1000) NOT NULL,
  `via` char(100) NOT NULL,
  `citta` char(100) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cittadino`
--

LOCK TABLES `cittadino` WRITE;
/*!40000 ALTER TABLE `cittadino` DISABLE KEYS */;
INSERT INTO `cittadino` VALUES (1,'Teatro Maggio','Fiorentino','552779309','root@gmail.com','$2y$10$fomVNifsivjtOaORTnitkOltKD3LdYs7W4E7CbLNxfqZA65wRT7MO','Piazza Vittorio Gui 1','Firenze',1),(2,'Mario','Rossi','3410000000','mariorossi@gmail.com','$2y$10$nxHceyE/5RrnHoyP1MYr6.keGxfKYbILZZMC5VLM7uZGyHmvnqGVy','Via Diotisalvi 1','Pisa',0),(3,'Luigi','Verdi','3420000000','luigiverdi@gmail.com','$2y$10$BfMPiSDDNqoaWRhVJ451xuhDB375nkkTBkPM2k4HNa9a4Yqj6Gjm6','Via Diotisalvi 2','Pisa',0),(4,'Carlo','Neri','3430000000','carloneri@gmail.com','$2y$10$QVYHfUiRMy7brOAYqEs3wOL275sd7TsTGsG2g3nleRd2/8tiy/Q02','Via Diotisalvi 3','Pisa',0);
/*!40000 ALTER TABLE `cittadino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commenti`
--

DROP TABLE IF EXISTS `commenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commenti` (
  `codice_commento` int(11) NOT NULL AUTO_INCREMENT,
  `codice_evento` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `commento` varchar(300) NOT NULL,
  PRIMARY KEY (`codice_commento`),
  KEY `id` (`id`),
  KEY `codice_evento` (`codice_evento`),
  CONSTRAINT `commenti_ibfk_1` FOREIGN KEY (`id`) REFERENCES `cittadino` (`id`),
  CONSTRAINT `commenti_ibfk_2` FOREIGN KEY (`codice_evento`) REFERENCES `evento` (`codice_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commenti`
--

LOCK TABLES `commenti` WRITE;
/*!40000 ALTER TABLE `commenti` DISABLE KEYS */;
INSERT INTO `commenti` VALUES (1,1,2,'mi è piaciuto tanto'),(2,1,3,'gli attori son stati bravissimi');
/*!40000 ALTER TABLE `commenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `codice_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `tipo` char(30) NOT NULL,
  `data_evento` date NOT NULL,
  `path_to_video` varchar(200) NOT NULL,
  PRIMARY KEY (`codice_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'Hamilton','musical','2023-06-25','./video/hamilton.mp4'),(2,'Hamilton','musical','2023-06-30','./video/hamilton.mp4'),(3,'Enrico IV','dramma','2023-06-26','./video/enricoiv.mp4'),(4,'Romeo E Giulietta','tragedia','2023-06-27','./video/romeogiulietta.mp4');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interazionecittadinoevento`
--

DROP TABLE IF EXISTS `interazionecittadinoevento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interazionecittadinoevento` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `codice_cittadino` int(11) NOT NULL,
  `codice_evento` int(11) NOT NULL,
  `click` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`codice`),
  KEY `codice_cittadino` (`codice_cittadino`),
  KEY `codice_evento` (`codice_evento`),
  CONSTRAINT `interazionecittadinoevento_ibfk_1` FOREIGN KEY (`codice_cittadino`) REFERENCES `cittadino` (`id`),
  CONSTRAINT `interazionecittadinoevento_ibfk_2` FOREIGN KEY (`codice_evento`) REFERENCES `evento` (`codice_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interazionecittadinoevento`
--

LOCK TABLES `interazionecittadinoevento` WRITE;
/*!40000 ALTER TABLE `interazionecittadinoevento` DISABLE KEYS */;
/*!40000 ALTER TABLE `interazionecittadinoevento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visiona`
--

DROP TABLE IF EXISTS `visiona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visiona` (
  `codice_visione` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `codice_evento` int(11) NOT NULL,
  PRIMARY KEY (`codice_visione`),
  KEY `id` (`id`),
  KEY `codice_evento` (`codice_evento`),
  CONSTRAINT `visiona_ibfk_1` FOREIGN KEY (`id`) REFERENCES `cittadino` (`id`),
  CONSTRAINT `visiona_ibfk_2` FOREIGN KEY (`codice_evento`) REFERENCES `evento` (`codice_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visiona`
--

LOCK TABLES `visiona` WRITE;
/*!40000 ALTER TABLE `visiona` DISABLE KEYS */;
/*!40000 ALTER TABLE `visiona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-04 21:32:58
