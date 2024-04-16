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
  `area` varchar(50) DEFAULT NULL,
  `latitude` decimal(20,15) DEFAULT NULL,
  `longitude` decimal(20,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pubs`
--

LOCK TABLES `pubs` WRITE;
/*!40000 ALTER TABLE `pubs` DISABLE KEYS */;
INSERT INTO `pubs` VALUES ('Roscoe Head','24 Roscoe Street, L1 2SX','City Centre',53.402295140431410,-2.974036629499758),('The Flute','35 Hardman Street, L1 9AS','City Centre',53.401910000000000,-2.971320000000000),('Ye Cracke','13 Rice Street, L1 9BB','City Centre',53.400570000000000,-2.972010000000000),('The Belvadere Arms','5 Sugnall Street, L7 7EB','City Centre',53.460249654753135,-2.984079501005522),('Beer Engine','14-18 Hardman Street, L1 9AX','City Centre',53.403666690573964,-2.972635162919992),('Metrocola','2 Leece Street, L1 2TR','City Centre',53.401971188644750,-2.973873031347626),('The Hope & Anchor','Maryland Street, L1 9DE','City Centre',53.402442240384820,-2.970997186462310),('The Philharmonic Dining Rooms','36 Hope Street, L1 9BX','City Centre',53.401921292292160,-2.970454429499784),('The Caledonia','22 Caledonia Street, L7 7DX','City Centre',53.400640886897186,-2.967898516006061),('Peter Kavanagh\'s','2-6 Egerton Street, L8 7LY','City Centre',53.396765744098950,-2.967380399957995),('The Pilgrim','34 Pilgrim Street, L1 9HB','City Centre',53.400450936407445,-2.972615720260595),('McCooley\'s','9-13 Temple Court, L2 6PY','City Centre',53.403415001905415,-2.979945631347583),('Einstein Bier Haus','26 Fleet Street, L1 4AN','City Centre',53.403285194924386,-2.980525389018376),('The Lime Kiln','Fleet Street, L1 4AN','City Centre',53.403069473768085,-2.980133444841349),('Soho','Concert Street, L1 4NR','City Centre',53.403527131321220,-2.980261144841345),('Modo','2 Concert Street, L1 4NR','City Centre',53.403475798026655,-2.980464960182963),('Dirty O\'Sheas','57 Seel Street, L1 4FB','City Centre',53.402017226831890,-2.978464758335181),('Pogue Mahone','77 Seel Street, L1 4BB','City Centre',53.401376000951400,-2.976663931347655),('The Fly','13 Hardman Street, L1 9AS','City Centre',53.402032709342220,-2.972212112310334),('The Grapes','60 Roscoe Street, L1 9DW','City Centre',53.400417443517235,-2.974645072329898),('Kelly\'s Dispensary','154-158 Smithdown Road, L15 3JR','Smithdown Road',53.391963369130224,-2.932680213453411),('Brookhouse','467 Smithdown Road, L15 5AE','Smithdown Road',53.392344697024580,-2.922301163639123),('Willow Bank Tavern','329 Smithdown Road, L15 3JA','Smithdown Road',53.393183453247670,-2.934055747831997),('Black Cat','174 Smithdown Road, L15 3JR','Smithdown Road',53.391528645411030,-2.932192617854360),('Franks Bar','186 Smithdown Road, l15 3JT','Smithdown Road',53.391173042439510,-2.931261735602662),('The Love Bar','279 Smithdown Road, L15 2HF','Smithdown Road',53.394447836915960,-2.935605276083862),('Arthur Guinness','473-477 Smithdown Road, L15 5AE','Smithdown Road',53.390055250204490,-2.925714416006568),('The Beeswing','208 Smithdown Road, L15 3JT','Smithdown Road',53.390620845543715,-2.930574827652468),('The Jolly Miller','176 Mill Lane, L12 7JF','West Derby',53.427094386867700,-2.916596306765532),('Sefton Arms','1 Mill Lane, L12 7HX','West Derby',53.432300995273340,-2.908529572386326),('Royal Standard','Leyfield Road, L12 9EY','West Derby',53.429021802511410,-2.899377875526322),('Hare & Hounds','9 West Derby Vilage, L12 5HJ','West Derby',53.433522834717440,-2.907819695298517),('Halton Castle','82 Mill Lane, L12 7JD','West Derby',53.430488264620166,-2.911424665429000),('The Peacock','16 Mill Lane, L12 7JB','West Derby',53.432314311308900,-2.909868387169124),('The Book','6-8 Mill Lane, L12 7JB','West Derby',53.432547142919700,-2.909587152790165),('The Cubicle','5 Mill Lane, L12 7HX','West Derby',53.432168940367670,-2.909491382756551),('Crown Inn','Leyfield Road, L12 7HX','West Derby',53.428565952498150,-2.899583000663102),('The Bulldog','Leyfield Road, Honey\'s Green Lane, L12 9HB','West Derby',53.424730353167995,-2.890424033473765),('The Crafty Swine','336-338 Smithdown Road, L15 5AN','Smithdown Road',53.389447944988610,-2.917667916565442);
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
INSERT INTO `pubGolfScores` VALUES ('Cider','Par 2'),('Pint of Lager','Par 2'),('Cocktail','Par 1'),('Large Wine','Par 2'),('Guinness','Par 2'),('Baby Guinness','Par 1'),('Double Vodka','Par 3'),('Rum/Gin & Mixer','Par 3'),('Shot of Sambuca or Tequila','Par 1');
/*!40000 ALTER TABLE `pubGolfScores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pubGolfPenalties`
--

DROP TABLE IF EXISTS `pubGolfPenalties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pubGolfPenalties` (
  `penalty` varchar(50) DEFAULT NULL,
  `stroke` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pubGolfPenalties`
--

LOCK TABLES `pubGolfPenalties` WRITE;
/*!40000 ALTER TABLE `pubGolfPenalties` DISABLE KEYS */;
INSERT INTO `pubGolfPenalties` VALUES ('Water Hazard','+2 Strokes'),('Spillage','+1 Stroke'),('Vomit','+10 Strokes'),('Refused a Drink','+10 Strokes'),('Cheating - purposefully spilling drink','+10 Strokes'),('Being refused a drink or kicked out of a bar','+5 Strokes');
/*!40000 ALTER TABLE `pubGolfPenalties` ENABLE KEYS */;
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

-- Dump completed on 2024-04-16 18:27:17
