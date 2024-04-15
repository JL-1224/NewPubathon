-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for Linux (x86_64)
--
-- Host: studdb.csc.liv.ac.uk    Database: sgjlinst
-- ------------------------------------------------------
-- Server version	10.5.22-MariaDB-log

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
-- Table structure for table `pubs`
--

DROP TABLE IF EXISTS `pubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pubs` (
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pubs`
--

LOCK TABLES `pubs` WRITE;
/*!40000 ALTER TABLE `pubs` DISABLE KEYS */;
INSERT INTO `pubs` VALUES ('Roscoe Head','24 Roscoe Street, L1 2SX','City Centre'),('The Flute','35 Hardman Street, L1 9AS','City Centre'),('Ye Cracke','13 Rice Street, L1 9BB','City Centre'),('Belvadere Arm','5 Sugnall Street, L7 7EB','City Centre'),('Beer Engine','14-18 Hardman Street, L1 9AX','City Centre'),('Metrocola','2 Leece Street, L1 2TR','City Centre'),('The Hope & Anchor','Maryland Street, L1 9DE','City Centre'),('The Philharmonic Dining Rooms','36 Hope Street, L1 9BX','City Centre'),('The Caledonia','22 Caledonia Street, L7 7DX','City Centre'),('Peter Kavanagh\'s','2-6 Egerton Street, L8 7LY','City Centre'),('The Pilgrim','34 Pilgrim Street, L1 9HB','City Centre'),('McCooley\'s','9-13 Temple Court, L2 6PY','City Centre'),('Einstein Bier Haus','26 Fleet Street, L1 4AN','City Centre'),('The Lime Kiln','Fleet Street, L1 4AN','City Centre'),('Soho','Concert Street, L1 4NR','City Centre'),('Modo','2 Concert Street, L1 4NR','City Centre'),('Dirty O\'Sheas','57 Seel Street, L1 4FB','City Centre'),('Pogue Mahone','77 Seel Street, L1 4BB','City Centre'),('The Fly','13 Hardman Street, L1 9AS','City Centre'),('The Grapes','60 Roscoe Street, L1 9DW','City Centre'),('Kelly\'s Dispensary','154-158 Smithdown Road, L15 3JR','Smithdown Road'),('Brookhouse','467 Smithdown Road, L15 5AE','Smithdown Road'),('Willow Bank Tavern','329 Smithdown Road, L15 3JA','Smithdown Road'),('Black Cat','174 Smithdown Road, L15 3JR','Smithdown Road'),('Franks Bar','186 Smithdown Road, l15 3JT','Smithdown Road'),('The Love Bar','279 Smithdown Road, L15 2HF','Smithdown Road'),('Arthur Guinness','473-477 Smithdown Road, L15 5AE','Smithdown Road'),('The Beeswing','208 Smithdown Road, L15 3JT','Smithdown Road'),('The Jolly Miller','176 Mill Lane, L12 7JF','West Derby'),('Sefton Arms','1 Mill Lane, L12 7HX','West Derby'),('Royal Standard','Leyfield Road, L12 9EY','West Derby'),('Hare & Hounds','9 West Derby Vilage, L12 5HJ','West Derby'),('Halton Castle','82 Mill Lane, L12 7JD','West Derby'),('The Peacock','16 Mill Lane, L12 7JB','West Derby'),('The Book','6-8 Mill Lane, L12 7JB','West Derby'),('The Cubicle','5 Mill Lane, L12 7HX','West Derby'),('The Crown Inn','Leyfield Road, L12 7HX','West Derby'),('The Bulldog','Leyfield Road, Honey\'s Green Lane, L12 9HB','West Derby');
/*!40000 ALTER TABLE `pubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pubCrawlRules`
--

DROP TABLE IF EXISTS `pubCrawlRules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pubCrawlRules` (
  `rule` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pubCrawlRules`
--

LOCK TABLES `pubCrawlRules` WRITE;
/*!40000 ALTER TABLE `pubCrawlRules` DISABLE KEYS */;
INSERT INTO `pubCrawlRules` VALUES ('No names/nicknames'),('Drink in 2 sips'),('Buffalo - drink with non-dominant hand'),('No Toilet'),('Siri rolls a dice for amount of sips'),('Have to drink pint - no bottles/mixers'),('Guinness - furthest from splitting the G does shot of Baby Guinness'),('Put on an accent when ordering'),('Choose someone else\'s drink'),('No phones when drinking'),('No swearing'),('Can\'t place down the drink');
/*!40000 ALTER TABLE `pubCrawlRules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pubGolfScores`
--

DROP TABLE IF EXISTS `pubGolfScores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pubGolfScores` (
  `drink` varchar(50) DEFAULT NULL,
  `score` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pubGolfScores`
--

LOCK TABLES `pubGolfScores` WRITE;
/*!40000 ALTER TABLE `pubGolfScores` DISABLE KEYS */;
INSERT INTO `pubGolfScores` VALUES ('Cider','Par 2'),('Pint of Lager','Par 2'),('Cocktail','Par 1'),('Double Vodka','Par 3'),('Large Wine','Par 2'),('Guinness','Par 2'),('Rum/Gin and Mixer','par 3'),('Baby Guinness','Par 1');
/*!40000 ALTER TABLE `pubGolfScores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fancyDress`
--

DROP TABLE IF EXISTS `fancyDress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fancyDress` (
  `clothing` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fancyDress`
--

LOCK TABLES `fancyDress` WRITE;
/*!40000 ALTER TABLE `fancyDress` DISABLE KEYS */;
INSERT INTO `fancyDress` VALUES ('Football Tops'),('Movie/TV Characters'),('Heroes and Villains'),('Disney Characters'),('Rugby Tops'),('Basketball Jerseys'),('Inflatable Costumes'),('Suits/Formal-Wear');
/*!40000 ALTER TABLE `fancyDress` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-08 18:20:22
