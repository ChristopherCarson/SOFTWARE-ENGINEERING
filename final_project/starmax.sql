CREATE DATABASE  IF NOT EXISTS `heroku_95f57077cc03cf4` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `heroku_95f57077cc03cf4`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: us-cdbr-iron-east-04.cleardb.net    Database: heroku_95f57077cc03cf4
-- ------------------------------------------------------
-- Server version	5.5.56-log

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
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `ship` int(11) NOT NULL,
  `ship_condition` varchar(12) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `year_of_production` int(11) DEFAULT NULL,
  PRIMARY KEY (`inv_id`),
  KEY `ship_idx` (`ship`),
  KEY `condition_idx` (`ship_condition`),
  CONSTRAINT `ship` FOREIGN KEY (`ship`) REFERENCES `ships` (`ship_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,1,'USED',89000000,1981),(12,2,'FOOBAR',8744400,1942),(42,3,'NEWISH',65000,1942),(52,4,'POOR',3677235,1967),(62,5,'BAD',658927634,1967),(72,6,'OK',4382771,1943),(82,7,'NOT GOOD',784409,2017),(92,8,'FAIR',7365143,2018),(102,9,'GREAT',83736625,2267),(112,10,'RUNS',456667,2266),(122,11,'SOLD AS IS',800097,2266),(132,12,'UNDER WARRAN',49999387,2381),(142,13,'PRESTINE',286849,2008),(152,14,'TERRIBLE',398887,2017),(162,15,'DECENT',2677839,2236),(172,16,'HORRIBLE',1226357,2401),(182,17,'FANTASTIC',900000,2401),(192,18,'TOO GOOD TO ',299877,2300),(202,19,'AWEFUL',3000098,2356),(212,20,'UNKOWN',300001,2242);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_history`
--

DROP TABLE IF EXISTS `purchase_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_history` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `user_idx` (`user_id`),
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_history`
--

LOCK TABLES `purchase_history` WRITE;
/*!40000 ALTER TABLE `purchase_history` DISABLE KEYS */;
INSERT INTO `purchase_history` VALUES (1,2,'2018-07-04'),(2,3,'2018-05-01'),(12,1,'2018-07-06'),(22,1,'2018-06-10');
/*!40000 ALTER TABLE `purchase_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchased_items`
--

DROP TABLE IF EXISTS `purchased_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchased_items` (
  `ship_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sell_price` float NOT NULL,
  KEY `purchase_id_idx` (`purchase_id`),
  KEY `ship_id_idx` (`ship_id`),
  CONSTRAINT `purchase_id` FOREIGN KEY (`purchase_id`) REFERENCES `purchase_history` (`purchase_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ship_id` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`ship_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchased_items`
--

LOCK TABLES `purchased_items` WRITE;
/*!40000 ALTER TABLE `purchased_items` DISABLE KEYS */;
INSERT INTO `purchased_items` VALUES (1,1,1,45000000),(3,1,1,35000000),(2,2,1,270000000),(1,12,1,4678990),(3,12,1,67222200),(1,22,1,4788830),(2,22,1,5403);
/*!40000 ALTER TABLE `purchased_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ships`
--

DROP TABLE IF EXISTS `ships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ships` (
  `ship_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `long_description` varchar(500) DEFAULT NULL,
  `make` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  `action_image_url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ships`
--

LOCK TABLES `ships` WRITE;
/*!40000 ALTER TABLE `ships` DISABLE KEYS */;
INSERT INTO `ships` VALUES (1,'Millennium Falcon','The modified YT-1300 Corellian light freighter is primarily used for smuggling vs combat. Designed by the Corellian Engineering Corporation (CEC), the highly modified YT-1300 is durable, modular, and is stated as being the second-fastest vessel in existence. It is 114\' long and holds 1 Pilot, 1 Co-Pilot and 2 GUnners. Max Speed is 75 Megalight per hours.','Corellian light freighter','YT-1300','https://s25.postimg.cc/ton0krn4f/falcon.jpg','https://s25.postimg.cc/b92jne3v3/falcon_Action.gif'),(2,'Galactica','Galactica is capable of lightspeed travel, although while escorting the refugee fleet she must limit her speed to that of the slowest ship. She has a complement of about 150 Vipers: Galactica also has a complement of shuttles. Unlike similar civilian models, these transport craft include military gear for detecting electronic emissions from other spacecraft and drop chutes for paratroop assaults.','Battle Star','BS-75','https://s25.postimg.cc/wvhk4efa7/galactica.jpg','https://s25.postimg.cc/xl0cgrv9b/galactica_Action.gif'),(3,'NC-170','The USS Enterprise (NCC-1701) was a 23rd century Federation Constitution-class starship operated by Starfleet. In the course of her career, the Enterprise became the most celebrated starship of her time. In her forty years of service and discovery, through upgrades and at least two refits, she took part in numerous first contacts, military engagements, and time-travels. She achieved her most lasting fame from a five-year mission (2265-2270) under the command of Captain James T. Kirk.','Star Fleet','Constitution','https://s25.postimg.cc/cbcq5x78v/NCC-170.jpg','https://s25.postimg.cc/584uqboyn/NCC-170_Action.gif'),(4,'Borg Cube','The primary vessel of the Borg. Borg cubes were described as massive in size, measuring over three kilometers along an edge and possessing an internal volume of 28 cubic kilometers. In 2366 Commander Shelby estimated that a cube could remain functional even if 78% of it was rendered inoperable due to the decentralized and redundant nature of its key systems. ','Borg','Cube','https://s8.postimg.cc/deeqabpl1/borg_cube.jpg','https://s8.postimg.cc/70pn73n9x/borg.gif'),(5,'TIE fighter','The TIE fighter is the unforgettable symbol of the Imperial fleet. Carried aboard Star Destroyers and battle stations, TIE fighters are single-pilot vehicles designed for fast-paced dogfights with Rebel X-wings and other starfighters.','Imperial','TIE','https://s8.postimg.cc/pga44k6k5/TIE_FIGHTER.jpg','https://s8.postimg.cc/zdl4xp6h1/tie.gif'),(6,'X-Wing','The X-wing is a versatile Rebel Alliance starfighter that balances speed with firepower. Armed with four laser cannons and two proton torpedo launchers, the X-wing can take on anything the Empire throws at it.','Rebel Alliance',' T-65B','https://s8.postimg.cc/7q8fjkiph/x-wing.png','https://s8.postimg.cc/wjhzk9c0l/x-wing.gif'),(7,'Longsword Interceptor','The Interceptor/Strike Fighter, commonly known as the Longsword, is the main starfighter in service with the United Nations Space Command Navy and Air Force. It is capable of filling a variety roles, exclusively or simultaneously.','UNSC','C-709','https://s8.postimg.cc/zdl4xkgpx/longsword.jpg','https://s8.postimg.cc/4jdvzxb45/longsword.gif'),(8,'Eagle 5','Eagle 5 is the 1986 Winnebago Chieftain 33 that Lone Starr and Barf travel in, using it as a flying spaceship (with space engines and wings attached). They use it to rescue Princess Vespa.','Winnebago','Chieftain 33','https://s8.postimg.cc/70pn71xjp/eagle5.jpg','https://s8.postimg.cc/urp0p5q11/eagle5.jpg'),(9,'TARDIS','The TARDIS is the time machine and spacecraft that appears in the British science fiction television programme Doctor Who and its various spin-offs.','British','TARDIS','https://s8.postimg.cc/7dh1dbv9x/TARDIS.jpg','https://s8.postimg.cc/46mhtql4l/TARDIS.gif'),(10,'Planet Express Ship','The Planet Express Ship is an anthropomorphic spaceship in the animated series Futurama, which bears the official designation U.S.S. Planet Express Ship. The ship was designed and built by Professor Hubert Farnsworth and is the sole delivery ship of Planet Express, a delivery service owned by the Professor.','Future Origins','HAL 9000','https://s8.postimg.cc/vh7t1kgat/Futurama_Planet_Express_spaceship.jpg','https://s8.postimg.cc/f67p5b8yt/planet_express.gif'),(11,'Cyclone Raider','The Raider is a roughly saucer-shaped, twin-engine craft seen employed by the Cylon Empire and used in a fighter-bomber role. They are frequently seen attacking the titular Battlestar, the rag-tag fleet it protects, their Viper fighters, and humans and targets on the surface of planets.','Cyclon','Raider','https://s8.postimg.cc/9i1eebwvp/Cylon_Raider.png','https://s8.postimg.cc/yo2cl6lb9/cyclone_raider.gif'),(12,'Aurora','The SA-23E Mitchell-Hyundyne Aurora class Starfury is a single-seat, non-atmospheric attack fighter*, utilized by Earthforce ships and installations for short range defense operations, a position it has served faithfully since it first went into service in early 2244.','Mitchell-Hyundyne','SA-23E','https://s8.postimg.cc/jfcf7dwrp/aurora.jpg','https://s8.postimg.cc/82ztpl0xh/aurora.jpg'),(13,'Red Dwarf ','Red Dwarf is an enormous mining vessel owned by the Jupiter Mining Corporation. Red Dwarf has a large complement of shuttles, including Starbugs and Blue Midgets.','Jupitor Mining Corp','Series X','https://s8.postimg.cc/g8hvnthhh/RED_DWARF.jpg','https://s8.postimg.cc/q5swgvwt1/red_dwarf.jpg'),(14,'Hyperion','The Hyperion is a Behemoth-class battlecruiser, currently commanded by Admiral Matt Horner. It has a long and checkered history.','Federation','Battle Cruiser','https://s8.postimg.cc/bmlrfftdh/Hyperion.jpg','https://s8.postimg.cc/kudzw7sqt/Battlecruiser.gif'),(15,'Serenity','Serenity is described as a Firefly-class transport ship by an Alliance starship crew, while Shepherd Book identifies her as an \"aught three\" model, with both parties implying that the class is an old design.','Alliance','Firefly-class','https://s8.postimg.cc/b9ud9b0tx/serenity.jpg','https://s8.postimg.cc/cc4jrw1np/serenity.gif'),(16,'Icarus','ANSA - the American National Space Administration - launched a space vessel from Cape Kennedy on January 14 1972, Its crew consisted of George Taylor, John Landon, Thomas Dodge and Maryann Stewart. The craft was known as Liberty 1, and nicknamed the Icarus.','ANSA','TX-9','https://s8.postimg.cc/tcng0grit/Icarus.jpg','https://s8.postimg.cc/x90rwlhp1/icarus.gif'),(17,'Star Destroyer','Star Destroyers are capital ships in the Star Wars universe. The Imperial Star Destroyer, which first appears in the first seconds of Star Wars (1977), is \"the signature vessel of the Imperial fleet\".','Galactic Empire','Executor','https://s8.postimg.cc/bzd5lo939/star_destroyer.jpg','https://s8.postimg.cc/covxy3u85/star_destroyer.gif'),(18,'Voyager','Voyager was launched in 2371. The crews first orders were to track down a Maquis ship in the Badlands. An alien force called the Caretaker transported both Voyager and the Maquis vessel across 70,000 light-years to the Delta Quadrant, damaging Voyager and killing several crewmembers.','Star Fleet','Intrepid-class','https://s8.postimg.cc/l75e2flb9/voyager.jpg','https://s8.postimg.cc/4w5a65bed/Voyager.gif'),(19,'Valkyrie','The Valkyrie is the starship captained by Joseph Korso from Titan A.E. In the film the ship provides transport and facilitates thier mission to reach the Titan.','Titan','Valkyrie-class','https://s8.postimg.cc/tcng0k6z9/Valkyrie.png','https://s8.postimg.cc/k4v7jvus5/valkyrie.gif'),(20,'Orion III','The Orion III Spaceplane is a sub-orbital spacecraft owned by Pan American World Airways and used in transit from Earth to Space Station V. It was about the size of a Boeing 737, and can seat approximately 32 passengers and at least 3 crew members.','Pan American','Spaceplan','https://s8.postimg.cc/q5swgw4it/Orion_3.jpg','https://s8.postimg.cc/gl99tzs1h/Orion_3.gif');
/*!40000 ALTER TABLE `ships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(16) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin','admin@csumb.edu','e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4',1),(2,'Alex Baldwin','theman','Alex@Starships.com','e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4',0),(3,'Chris Carson','chris','chcarson@csumb.edu','e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4',0);
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

-- Dump completed on 2018-08-06 20:40:48
