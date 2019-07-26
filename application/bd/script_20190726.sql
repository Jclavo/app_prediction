-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: app_prediction
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `alternative`
--

DROP TABLE IF EXISTS `alternative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alternative` (
  `alternative_id` int(11) NOT NULL AUTO_INCREMENT,
  `letter` varchar(1) NOT NULL,
  `description` varchar(45) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`alternative_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `alternative_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternative`
--

LOCK TABLES `alternative` WRITE;
/*!40000 ALTER TABLE `alternative` DISABLE KEYS */;
INSERT INTO `alternative` VALUES (1,'A','Option 1',1),(2,'B','Option 2',1),(3,'A','Option 1',8),(4,'B','Option 2',8),(5,'C','Option 3',8),(6,'D','Option 4',8),(7,'A','Option 1',9),(8,'B','Option 2',9),(9,'C','Option 3',9),(10,'D','Option 4',9),(11,'A','Option 1',10),(12,'B','Option 2',10),(13,'C','Option 3',10),(14,'D','Option 4',10),(15,'A','Option 1',11),(16,'B','Option 2',11),(17,'C','Option 3',11),(18,'D','Option 4',11),(19,'A','Option 1',13),(20,'B','Option 2',13),(21,'C','Option 3',13),(22,'D','Option 4',13),(23,'E','Option 5',13),(24,'A','Option 1',14),(25,'B','Option 2',14),(26,'C','Option 3',14),(27,'D','Option 4',14),(28,'E','Option 5',14),(29,'A','Option 1',15),(30,'B','Option 2',15),(31,'C','Option 3',15),(32,'D','Option 4',15),(33,'E','Option 5',15),(34,'A','Option 1',16),(35,'B','Option 2',16),(36,'C','Option 3',16),(37,'D','Option 4',16),(38,'E','Option 5',16),(39,'A','Option 1',17),(40,'B','Option 2',17),(41,'C','Option 3',17),(42,'D','Option 4',17),(43,'E','Option 5',17),(44,'A','Option 1',18),(45,'B','Option 2',18),(46,'C','Option 3',18),(47,'D','Option 4',18),(48,'A','Option 1',19),(49,'B','Option 2',19),(50,'C','Option 3',19),(51,'D','Option 4',19),(52,'A','Option 1',20),(53,'B','Option 2',20),(54,'C','Option 3',20),(55,'D','Option 4',20),(56,'A','Option 1',21),(57,'B','Option 2',21),(58,'C','Option 3',21),(59,'A','Option 1',22),(60,'B','Option 2',22),(61,'C','Option 3',22),(62,'A','Option 1',23),(63,'B','Option 2',23),(64,'C','Option 3',23),(65,'A','Option 1',24),(66,'B','Option 2',24),(67,'C','Option 3',24),(68,'A','Option 1',25),(69,'B','Option 2',25),(70,'C','Option 3',25),(71,'A','Option 1',26),(72,'B','Option 2',26),(73,'C','Option 3',26),(74,'A','Option 1',27),(75,'B','Option 2',27),(76,'C','Option 3',27),(77,'A','Option 1',28),(78,'B','Option 2',28),(79,'C','Option 3',28),(80,'A','Option 1',29),(81,'B','Option 2',29),(82,'C','Option 3',29),(83,'A','Option 1',30),(84,'B','Option 2',30),(85,'C','Option 3',30),(86,'A','Option 1',31),(87,'B','Option 2',31),(88,'A','Option 1',32),(89,'B','Option 2',32),(90,'A','Option 1',33),(91,'B','Option 2',33),(92,'A','Option 1',34),(93,'B','Option 2',34),(94,'A','Option 1',35),(95,'B','Option 2',35),(96,'A','Option 1',36),(97,'B','Option 2',36),(98,'A','Option 1',37),(99,'B','Option 2',37),(100,'A','Option 1',38),(101,'B','Option 2',38),(102,'A','Option 1',39),(103,'B','Option 2',39),(104,'A','Option 1',40),(105,'B','Option 2',40),(106,'A','Option 1',41),(107,'B','Option 2',41),(108,'A','Option 1',42),(109,'B','Option 2',42),(110,'A','Option 1',43),(111,'B','Option 2',43),(112,'A','Option 1',44),(113,'B','Option 2',44),(114,'A','Option 1',45),(115,'B','Option 2',45),(116,'A','Option 1',46),(117,'B','Option 2',46),(118,'A','Option 1',47),(119,'B','Option 2',47),(120,'A','Option 1',48),(121,'B','Option 2',48),(122,'A','Option 1',49),(123,'B','Option 2',49),(124,'A','Option 1',50),(125,'B','Option 2',50);
/*!40000 ALTER TABLE `alternative` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `selected_option` varchar(1) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`),
  KEY `answer_ibfk_1` (`student_id`),
  KEY `fk_answer_2` (`test_id`),
  CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (41,'3',20,12,13),(42,'2',20,12,14),(43,'1',20,12,15),(44,'2',20,12,16),(45,'5',20,12,17),(46,'2',63,12,13),(47,'2',63,12,14),(48,'2',63,12,15),(49,'2',63,12,16),(50,'5',63,12,17),(51,'0',52,12,13),(52,'0',52,12,14),(53,'0',52,12,15),(54,'0',52,12,16),(55,'0',52,12,17),(56,'0',64,16,20),(57,'2',65,16,20),(58,'0',74,17,21),(59,'0',74,17,22),(60,'0',74,17,23),(61,'0',74,17,24),(62,'0',74,17,25),(63,'0',74,17,26),(64,'0',74,17,27),(65,'0',74,17,28),(66,'0',74,17,29),(67,'0',74,17,30),(68,'2',78,17,21),(69,'1',78,17,22),(70,'3',78,17,23),(71,'2',78,17,24),(72,'1',78,17,25),(73,'0',78,17,26),(74,'2',78,17,27),(75,'1',78,17,28),(76,'3',78,17,29),(77,'1',78,17,30),(78,'2',80,17,21),(79,'1',80,17,22),(80,'2',80,17,23),(81,'2',80,17,24),(82,'1',80,17,25),(83,'3',80,17,26),(84,'2',80,17,27),(85,'1',80,17,28),(86,'3',80,17,29),(87,'1',80,17,30),(88,'2',82,17,21),(89,'1',82,17,22),(90,'2',82,17,23),(91,'2',82,17,24),(92,'3',82,17,25),(93,'2',82,17,26),(94,'2',82,17,27),(95,'1',82,17,28),(96,'2',82,17,29),(97,'3',82,17,30),(98,'2',77,17,21),(99,'1',77,17,22),(100,'2',77,17,23),(101,'3',77,17,24),(102,'2',77,17,25),(103,'1',77,17,26),(104,'2',77,17,27),(105,'2',77,17,28),(106,'1',77,17,29),(107,'1',77,17,30),(108,'2',76,17,21),(109,'3',76,17,22),(110,'1',76,17,23),(111,'2',76,17,24),(112,'1',76,17,25),(113,'3',76,17,26),(114,'2',76,17,27),(115,'1',76,17,28),(116,'3',76,17,29),(117,'1',76,17,30),(118,'2',71,17,21),(119,'2',71,17,22),(120,'2',71,17,23),(121,'2',71,17,24),(122,'1',71,17,25),(123,'2',71,17,26),(124,'2',71,17,27),(125,'1',71,17,28),(126,'3',71,17,29),(127,'3',71,17,30),(128,'2',75,17,21),(129,'1',75,17,22),(130,'1',75,17,23),(131,'2',75,17,24),(132,'1',75,17,25),(133,'2',75,17,26),(134,'2',75,17,27),(135,'1',75,17,28),(136,'2',75,17,29),(137,'1',75,17,30),(138,'2',73,17,21),(139,'1',73,17,22),(140,'2',73,17,23),(141,'2',73,17,24),(142,'2',73,17,25),(143,'3',73,17,26),(144,'3',73,17,27),(145,'1',73,17,28),(146,'3',73,17,29),(147,'2',73,17,30),(148,'2',72,17,21),(149,'3',72,17,22),(150,'1',72,17,23),(151,'2',72,17,24),(152,'1',72,17,25),(153,'2',72,17,26),(154,'3',72,17,27),(155,'1',72,17,28),(156,'3',72,17,29),(157,'1',72,17,30),(158,'2',81,17,21),(159,'1',81,17,22),(160,'1',81,17,23),(161,'2',81,17,24),(162,'1',81,17,25),(163,'2',81,17,26),(164,'2',81,17,27),(165,'1',81,17,28),(166,'2',81,17,29),(167,'1',81,17,30),(168,'2',81,18,31),(169,'2',81,18,32),(170,'1',81,18,33),(171,'2',81,18,34),(172,'2',81,18,35),(173,'2',81,18,36),(174,'1',81,18,37),(175,'2',81,18,38),(176,'1',81,18,39),(177,'2',81,18,40),(178,'1',78,18,31),(179,'2',78,18,32),(180,'1',78,18,33),(181,'2',78,18,34),(182,'2',78,18,35),(183,'2',78,18,36),(184,'2',78,18,37),(185,'2',78,18,38),(186,'1',78,18,39),(187,'2',78,18,40),(188,'2',80,18,31),(189,'2',80,18,32),(190,'1',80,18,33),(191,'2',80,18,34),(192,'1',80,18,35),(193,'2',80,18,36),(194,'1',80,18,37),(195,'2',80,18,38),(196,'1',80,18,39),(197,'1',80,18,40),(198,'2',82,18,31),(199,'1',82,18,32),(200,'1',82,18,33),(201,'2',82,18,34),(202,'1',82,18,35),(203,'1',82,18,36),(204,'1',82,18,37),(205,'1',82,18,38),(206,'2',82,18,39),(207,'2',82,18,40),(208,'2',77,18,31),(209,'2',77,18,32),(210,'1',77,18,33),(211,'2',77,18,34),(212,'2',77,18,35),(213,'2',77,18,36),(214,'1',77,18,37),(215,'1',77,18,38),(216,'1',77,18,39),(217,'2',77,18,40),(218,'2',76,18,31),(219,'2',76,18,32),(220,'1',76,18,33),(221,'2',76,18,34),(222,'1',76,18,35),(223,'2',76,18,36),(224,'1',76,18,37),(225,'1',76,18,38),(226,'1',76,18,39),(227,'2',76,18,40),(228,'1',71,18,31),(229,'1',71,18,32),(230,'1',71,18,33),(231,'2',71,18,34),(232,'2',71,18,35),(233,'2',71,18,36),(234,'1',71,18,37),(235,'2',71,18,38),(236,'2',71,18,39),(237,'1',71,18,40),(238,'2',75,18,31),(239,'2',75,18,32),(240,'1',75,18,33),(241,'2',75,18,34),(242,'0',75,18,35),(243,'2',75,18,36),(244,'1',75,18,37),(245,'2',75,18,38),(246,'1',75,18,39),(247,'2',75,18,40),(248,'1',73,18,31),(249,'2',73,18,32),(250,'1',73,18,33),(251,'2',73,18,34),(252,'1',73,18,35),(253,'1',73,18,36),(254,'1',73,18,37),(255,'2',73,18,38),(256,'1',73,18,39),(257,'1',73,18,40),(258,'2',72,18,31),(259,'1',72,18,32),(260,'2',72,18,33),(261,'1',72,18,34),(262,'1',72,18,35),(263,'2',72,18,36),(264,'2',72,18,37),(265,'2',72,18,38),(266,'1',72,18,39),(267,'1',72,18,40);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `started_date` date NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'Class November','2018-11-01',1),(2,'Class September','2018-09-01',1),(3,'Class October','2018-10-01',1),(4,'class january','2018-01-01',0),(5,'Class September','2018-09-01',0),(6,'Class Setiembre','2018-09-01',1),(14,'xd','2019-03-25',0),(15,'COURSE - TEST 1','2019-03-25',1),(16,'Class Saturday Morning','2019-04-01',1),(17,'course example','2019-04-22',1);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`),
  KEY `fk_exam_1` (`course_id`),
  CONSTRAINT `fk_exam_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES (1,'EXAM CHANGE',0,1),(2,'test2',1,5),(3,'test 1',1,1),(4,'Exam - Test # 1',1,15),(5,'NO USE',0,6),(6,'midterm L & G2',0,16),(7,'midterm G2 & R',0,16),(8,'Final Exam - R7',1,16),(9,'Final Exam - R6',1,16),(10,'Final Exam - R5',1,16);
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `score` decimal(4,2) NOT NULL DEFAULT '0.00',
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  PRIMARY KEY (`grade_id`),
  KEY `exam_id` (`exam_id`),
  KEY `fk_grade_1` (`student_id`),
  CONSTRAINT `fk_grade_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (7,19.00,20,3),(8,20.00,63,3),(9,15.00,52,3),(10,18.00,57,2),(11,13.00,20,2),(12,5.00,70,4),(13,2.50,69,4),(14,3.00,68,4),(15,8.50,67,4),(16,4.00,66,4),(17,4.00,65,4),(18,6.00,64,4),(19,88.00,74,8),(20,86.00,78,8),(21,84.00,82,8),(22,0.00,76,8),(23,0.00,73,8),(24,94.00,75,8),(25,90.00,81,8),(26,82.00,77,8),(27,86.00,71,8),(28,93.00,80,8),(29,0.00,79,8),(30,0.00,72,8),(31,86.00,74,9),(32,0.00,78,9),(33,83.00,82,9),(34,89.00,76,9),(35,86.00,73,9),(36,98.00,75,9),(37,0.00,81,9),(38,84.00,77,9),(39,94.00,71,9),(40,0.00,80,9),(41,0.00,79,9),(42,0.00,72,9),(43,84.00,74,10),(44,0.00,78,10),(45,0.00,82,10),(46,0.00,76,10),(47,88.00,73,10),(48,93.00,75,10),(49,85.00,81,10),(50,80.00,77,10),(51,81.00,71,10),(52,0.00,80,10),(53,86.00,79,10),(54,87.00,72,10);
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option` (
  `option_id` int(11) NOT NULL,
  `letter` varchar(1) NOT NULL,
  `description` varchar(45) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `correct` varchar(1) DEFAULT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'Question 1','3',1),(2,'Question 2','2',1),(3,'Question 3',NULL,1),(8,'Question 1','1',9),(9,'Question 2','2',9),(10,'Question 1',NULL,10),(11,'Question 2',NULL,10),(13,'Question 1','2',12),(14,'Question 2','1',12),(15,'Question 3','2',12),(16,'Question 4','2',12),(17,'Question 5','3',12),(18,'Question 1',NULL,13),(19,'Question 1',NULL,15),(20,'Question 1',NULL,16),(21,'Question 1','2',17),(22,'Question 2','1',17),(23,'Question 3','2',17),(24,'Question 4','3',17),(25,'Question 5','1',17),(26,'Question 6','3',17),(27,'Question 7','2',17),(28,'Question 8','1',17),(29,'Question 9','3',17),(30,'Question 10','1',17),(31,'Question 1','2',18),(32,'Question 2','2',18),(33,'Question 3','1',18),(34,'Question 4','2',18),(35,'Question 5','1',18),(36,'Question 6','2',18),(37,'Question 7','1',18),(38,'Question 8','2',18),(39,'Question 9','1',18),(40,'Question 10','1',18),(41,'Question 1',NULL,19),(42,'Question 2',NULL,19),(43,'Question 3',NULL,19),(44,'Question 4',NULL,19),(45,'Question 5',NULL,19),(46,'Question 6',NULL,19),(47,'Question 7',NULL,19),(48,'Question 8',NULL,19),(49,'Question 9',NULL,19),(50,'Question 10',NULL,19);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `cellphone` varchar(12) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'erickx','xcelis','+51942051000',0),(2,'Alex','Culki hdz','942051001',0),(3,'Jose','clavo','+51942051470',1),(4,'luis','everis','',0),(5,'Alex','Culki','',1),(6,'','','',0),(7,'Harry','Portales','',0),(8,'rober','social','',0),(9,'rober','social','',0),(10,'rober','social','',0),(11,'rober','social','',0),(12,'rober','social','',0),(13,'coco','lastname','',1),(14,'coco1','gato','',0),(15,'coco2','gato','',0),(16,'coco3','gato','',0),(17,'coco4','gato','',0),(18,'coco5','gato','',0),(19,'coco2','gato','',0),(20,'coco3','gato','',0),(29,'rober','social','',0),(52,'Hugo','Lira','',0),(53,'sss','xxxxx','',0),(54,'Hebert','Serrano','',0),(55,'x','c','',0),(56,'w','e','',0),(57,'JUAN','Pineda','+51942051005',0),(59,'now','i sleep','',0),(62,'the end','is here','',0),(63,'walter','tocas','',0),(64,'A','A','',1),(65,'B','B','',1),(66,'C','C','',1),(67,'D','D','',1),(68,'E','E','',1),(69,'F','F','',1),(70,'GG','G','',1),(71,'Jury','Alarcon Sisniegas','',1),(72,'Raiza','Arce Medina','',1),(73,'Eric','Cruz Guarniz','',1),(74,'Adriana','Jimenez Cruz','',1),(75,'Estela','Ortiz Elias','',1),(76,'David','Ramirez Medina','',1),(77,'Jean Pool','Ramós Sullon','',1),(78,'Angel','Rojas Zavala','',1),(79,'Lucero','Sanchez Alva','',1),(80,'Lourdes','Suarez Galves','',1),(81,'Genesis','Vargas Davila','',1),(82,'Arelhy','Ventura Cutipo','',1),(83,'student example','student example','',1);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_course` (
  `student_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`student_course_id`),
  KEY `student_id` (`student_id`),
  KEY `fk_course_student_1` (`course_id`),
  CONSTRAINT `fk_course_student_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_course`
--

LOCK TABLES `student_course` WRITE;
/*!40000 ALTER TABLE `student_course` DISABLE KEYS */;
INSERT INTO `student_course` VALUES (1,1,3),(2,12,1),(4,12,3),(12,57,5),(18,20,1),(19,7,6),(20,63,6),(21,63,1),(22,52,1),(23,70,15),(24,69,15),(25,68,15),(26,67,15),(27,66,15),(28,65,15),(29,64,15),(30,82,16),(31,81,16),(32,80,16),(33,79,16),(34,78,16),(35,77,16),(36,76,16),(37,75,16),(38,74,16),(39,73,16),(40,72,16),(41,71,16);
/*!40000 ALTER TABLE `student_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `total_question` int(11) NOT NULL,
  `total_alternative` int(11) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `fk_exam_1_idx` (`course_id`),
  CONSTRAINT `fk_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'XD',5,4,0,2),(9,'TESTmodif',2,4,1,2),(10,'abc',2,4,0,2),(12,'test_2',5,5,1,1),(13,'TEST - 1',1,4,0,1),(15,'TEST 1',1,4,1,1),(16,'TEST # 1 (1 question)',1,4,1,15),(17,'Midterm L & G2',10,3,1,16),(18,'midterm G2_',10,2,1,16),(19,'midterm G2 & R',10,2,0,16);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'app_prediction'
--

--
-- Dumping routines for database 'app_prediction'
--
/*!50003 DROP PROCEDURE IF EXISTS `get_exambytest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_exambytest`(IN in_test_id INT(11))
BEGIN

	SELECT test_id,description,total_question,total_alternative,course_id
	FROM test
	WHERE test_id = in_test_id
	AND state = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_alternative_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_alternative_add`(IN in_letter VARCHAR(1),
										IN in_description VARCHAR(45),
                                        IN in_question_id INT(11)
)
BEGIN

	INSERT INTO alternative(letter,description,question_id) 
        VALUES (in_letter,in_description,in_question_id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_alternative_getbytest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_alternative_getbytest`(IN in_test_id INT(11))
BEGIN
	SELECT q.question_id as question_id, q.description as question_description,
		   a.alternative_id as alternative_id, a.description as alternative_description
	FROM   question as q
	INNER JOIN alternative as a
	ON q.question_id = a.question_id
	WHERE q.test_id = in_test_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_alternative_getbytest_copy` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_alternative_getbytest_copy`(IN in_test_id INT(11))
BEGIN
	SELECT q.question_id as question_id, q.description as question_description,
		   a.alternative_id as alternative_id, a.description as alternative_description
	FROM   question as q
	INNER JOIN alternative as a
	ON q.question_id = a.question_id
	WHERE q.test_id = in_test_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_answer_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_answer_add`(IN in_student_id  INT(11),
								   IN in_test_id     INT(11),
								   IN in_question_id INT(11)
)
BEGIN
	SET @answer_id = NULL;
    
	SELECT answer_id INTO @answer_id
	FROM   answer
	WHERE  student_id  = in_student_id
    AND    test_id	   = in_test_id
    AND    question_id = in_question_id;
    
    IF (@answer_id IS NULL) THEN
		INSERT INTO answer(student_id,test_id,question_id) 
        VALUES (in_student_id,in_test_id,in_question_id);
    END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_answer_getbystudentbytest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_answer_getbystudentbytest`(IN in_student_id  INT(11),
																			IN in_test_id     INT(11)
)
BEGIN
	SELECT a.answer_id,q.description,a.selected_option
		FROM answer AS a
	INNER JOIN question AS q
		ON a.question_id = q.question_id 
	WHERE a.student_id = in_student_id
	AND   a.test_id    = in_test_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_answer_getbytest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_answer_getbytest`(IN in_test_id INT(11))
BEGIN
	SELECT a.test_id, a.question_id, q.description,  a.student_id, a.selected_option
		FROM answer AS a
	INNER JOIN question AS q
		ON a.test_id = q.test_id
		AND a.question_id = q.question_id
	WHERE a.test_id = in_test_id
		ORDER BY a.question_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_answer_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_answer_update`(IN in_answer_id INT(11),
									  IN in_selected_option INT(11)
)
BEGIN

    UPDATE answer
		SET selected_option = in_selected_option
        WHERE answer_id  = in_answer_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_course_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_course_add`(IN in_description  VARCHAR(45),
								  IN in_started_date DATE
)
BEGIN
	INSERT INTO course(description,started_date) 
        VALUES (in_description,in_started_date);
        
	SELECT LAST_INSERT_ID() as last_course_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_course_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_course_delete`(IN in_id INT(11))
BEGIN
	UPDATE course
		SET state = 0
        WHERE course_id = in_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_course_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_course_get`()
BEGIN
	SELECT course_id, description, started_date  
	FROM   course
    WHERE  state = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_course_getbyid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_course_getbyid`(IN in_id INT(11))
BEGIN
	SELECT course_id, description, started_date  
	FROM   course
    WHERE  course_id = in_id
    AND    state = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_course_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_course_update`(IN in_id INT(11),
									 IN in_description  VARCHAR(45),
								     IN in_started_date DATE
)
BEGIN
    UPDATE course
		SET description  = in_description,
			started_date = in_started_date
        WHERE course_id  = in_id
	    AND   state 	 = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_exam_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_exam_add`(IN in_description  VARCHAR(45),
								 IN in_course_id INT(11)                                 
)
BEGIN
	INSERT INTO exam(description,course_id) 
        VALUES (in_description,in_course_id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_exam_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_exam_delete`(IN in_id INT(11))
BEGIN

	UPDATE exam
		SET state = 0
        WHERE exam_id = in_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_exam_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_exam_get`()
BEGIN

	SELECT e.exam_id, e.description , c.course_id, c.description as course_description
	FROM exam e
	INNER JOIN course c ON e.course_id = c.course_id
	AND e.state = c.state
	WHERE e.state = '1';

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_exam_getbyid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_exam_getbyid`(IN in_id INT(11))
BEGIN
	SELECT e.exam_id, e.description , c.course_id, c.description as course_description
	FROM exam e
	INNER JOIN course c ON e.course_id = c.course_id
	AND e.state = c.state
	WHERE e.exam_id = in_id
    AND   e.state = '1';

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_exam_getbytest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_exam_getbytest`(IN in_test_id INT(11))
BEGIN

	SELECT test_id,description,total_question,total_alternative,course_id
	FROM test
	WHERE test_id = in_test_id
	AND state = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_exam_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_exam_update`(IN in_id INT(11),
															IN in_description VARCHAR(11)
)
BEGIN
		UPDATE exam
		SET description = in_description
        WHERE exam_id   = in_id
	    AND   state 	= 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_get_exambytest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_get_exambytest`(IN in_test_id INT(11))
BEGIN

	SELECT test_id,description,total_question,total_alternative,course_id
	FROM test
	WHERE test_id = in_test_id
	AND state = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_grade_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_grade_add`(IN in_student_id INT(11),
															IN in_exam_id    INT(11) 
)
BEGIN
	
    SET @grade_id = NULL;
    
	SELECT grade_id INTO @grade_id
	FROM   grade
	WHERE  student_id = in_student_id
    AND    exam_id	  = in_exam_id;
    
    IF (@grade_id IS NULL) THEN
		
		INSERT INTO grade(student_id,exam_id)
		VALUES (in_student_id,in_exam_id);
        
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_grade_getAvegareByCourse` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_grade_getAvegareByCourse`(IN in_course_id INT(11))
BEGIN
	SELECT s.student_id, s.name, s.lastname, avg(g.score) as average
		FROM   student AS s
	INNER JOIN student_course as sc
		ON s.student_id = sc.student_id
	INNER JOIN course AS c
		ON sc.course_id = c.course_id
	INNER JOIN grade AS g
		ON s.student_id = g.student_id
	WHERE c.course_id = in_course_id
		AND   s.state = c.state
		AND   s.state = 1
    GROUP BY  s.student_id,  s.name, s.lastname;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_grade_getbyexam` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_grade_getbyexam`(IN in_exam_id INT(11)
)
BEGIN

	SELECT g.grade_id, g.student_id, CONCAT(s.lastname,' ',s.name) as full_name, g.score
		FROM   grade as g
	INNER JOIN student as s
		ON g.student_id = s.student_id
	WHERE g.exam_id = in_exam_id
	AND   s.state   = 1
    ORDER BY full_name;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_grade_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_grade_update`(IN in_score  DECIMAL(4,2),    
									IN in_student_id INT(11),
									IN in_exam_id    INT(11) 
)
BEGIN

	UPDATE grade
		SET score = in_score
	WHERE  student_id = in_student_id
	AND    exam_id	  = in_exam_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_question_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_question_add`(IN in_description VARCHAR(45),
									IN in_test_id	  INT(11)

)
BEGIN

	INSERT INTO question(description,test_id) 
        VALUES (in_description,in_test_id);
        
	SELECT LAST_INSERT_ID() as last_question_id;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_question_getbytest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_question_getbytest`(IN in_test_id INT(11))
BEGIN
	SELECT q.question_id, q.description, q.correct, q.test_id 
		FROM question as q
	INNER JOIN test as t
	ON q.test_id = t.test_id
		WHERE t.test_id = in_test_id
		AND  t.state = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_question_updatecorrectanswer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_question_updatecorrectanswer`(
											 IN in_question_id    INT(11),
											 IN in_correct_answer INT(11)
)
BEGIN
	UPDATE question
		SET correct  = in_correct_answer
        WHERE question_id  = in_question_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_add`(IN in_name VARCHAR(45),
									IN in_lastname VARCHAR(45),
									IN in_cellphone VARCHAR(12)
)
BEGIN
	INSERT INTO student(name,lastname,cellphone) 
        VALUES (in_name,in_lastname,in_cellphone);
	
    SELECT LAST_INSERT_ID() as last_student_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_course_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_course_add`(IN in_student_id INT(11),
										   IN in_course_id INT(11)
)
BEGIN
	
    SELECT student_course_id INTO @student_course_id
    FROM   student_course
    WHERE  student_id = in_student_id
    AND    course_id  = in_course_id;
    
    IF (@student_course_id IS NULL) THEN
    
		INSERT INTO student_course(student_id,course_id) 
        VALUES (in_student_id,in_course_id);
        
    END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_course_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_course_delete`(IN in_id INT(11))
BEGIN
	DELETE FROM student_course
        WHERE student_course_id = in_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_course_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_course_get`()
BEGIN
	SELECT sc.student_course_id,
		   s.student_id, CONCAT(s.name,' ',s.lastname) AS student_name , 
           c.course_id, c.description
	FROM student as s
		INNER JOIN student_course as sc 
			ON s.student_id = sc.student_id
		INNER JOIN course as c 
			ON  sc.course_id = c.course_id
			AND s.state = c.state
	WHERE s.state = 1
	ORDER BY sc.student_course_id DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_delete`(IN in_id INT(11))
BEGIN
	UPDATE student
		SET state = 0
        WHERE student_id = in_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_get`()
BEGIN
	SELECT student_id , name, lastname, cellphone
		FROM student 
		WHERE state = 1
        ORDER BY student_id DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_getbycourse` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_getbycourse`(IN in_id_course INT(11))
BEGIN
	SELECT s.student_id, s.name, s.lastname
		FROM   student AS s
	INNER JOIN student_course as sc
		ON s.student_id = sc.student_id
	INNER JOIN course AS c
		ON sc.course_id = c.course_id
	WHERE c.course_id = in_id_course
		AND   s.state = c.state
		AND   s.state = 1
	ORDER BY s.name, s.lastname;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_getbyid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_getbyid`(IN in_id INT(11))
BEGIN

	SELECT student_id , name, lastname, cellphone
		FROM student 
		WHERE  student_id = in_id
		AND    state = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_student_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_student_update`(IN in_id INT(11),
									   IN in_name VARCHAR(45),
									   IN in_lastname VARCHAR(45),
									   IN in_cellphone VARCHAR(12)
)
BEGIN
    UPDATE student
		SET name      =  in_name,
			lastname  =  in_lastname,
			cellphone =  in_cellphone
        WHERE student_id = in_id
	    AND    state = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_test_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_test_add`(IN in_description VARCHAR(45),
								IN in_total_question INT(11),
								IN in_total_alternative INT(11),
                                IN in_course_id INT(11)
)
BEGIN

	INSERT INTO test(description,total_question,total_alternative,course_id) 
        VALUES (in_description,in_total_question,in_total_alternative,in_course_id);
        
	SELECT LAST_INSERT_ID() as last_test_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_test_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_test_delete`(IN in_test_id INT(11))
BEGIN
	UPDATE test
		SET state = 0
	WHERE test_id = in_test_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_test_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_test_get`()
BEGIN

	SELECT t.test_id, t.description, t.total_question, t.total_alternative,c.course_id,c.description as course_description
		FROM test as t
	INNER JOIN course as c
		ON t.course_id = c.course_id
	WHERE t.state = 1
	AND   c.state = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_test_getbyid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_test_getbyid`(IN in_test_id INT(11))
BEGIN

	SELECT t.test_id, t.description, t.total_question, t.total_alternative,c.course_id,c.description as course_description
		FROM test as t
	INNER JOIN course as c
		ON t.course_id = c.course_id
	WHERE t.test_id = in_test_id
    AND	  t.state = 1
	AND   c.state = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_test_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_test_update`(IN in_test_id INT(11),
									IN in_description VARCHAR(11),
                                    IN in_course_id INT(11)
)
BEGIN

	UPDATE test
		SET description = in_description,
			course_id = in_course_id
	    WHERE test_id = in_test_id;
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-26 18:40:46
