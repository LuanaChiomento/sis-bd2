-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: db_app_db2
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `amizade`
--

DROP TABLE IF EXISTS `amizade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amizade` (
  `leitor_id1` int DEFAULT NULL,
  `leitor_id2` int DEFAULT NULL,
  KEY `id_leitor1` (`leitor_id1`),
  KEY `id_leitor2` (`leitor_id2`),
  CONSTRAINT `amizade_ibfk_1` FOREIGN KEY (`leitor_id1`) REFERENCES `leitor` (`leitor_id`),
  CONSTRAINT `amizade_ibfk_2` FOREIGN KEY (`leitor_id2`) REFERENCES `leitor` (`leitor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amizade`
--

LOCK TABLES `amizade` WRITE;
/*!40000 ALTER TABLE `amizade` DISABLE KEYS */;
INSERT INTO `amizade` VALUES (1,3),(4,3),(5,2),(1,2),(4,5);
/*!40000 ALTER TABLE `amizade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `autor_id` int NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(100) DEFAULT NULL,
  `nacionalidade` varchar(100) DEFAULT NULL,
  `titulo_livros_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`autor_id`),
  KEY `livro` (`titulo_livros_id`),
  CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`titulo_livros_id`) REFERENCES `livros` (`titulo_livros_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'J. K. Rowling','britânica','Harry Potter'),(2,'J. K. Rowling','britânica','Harry Potter'),(3,'Jeff Kinney','estadunidense','Diário de Um Banana'),(4,'J. R. R. Tolkien','britânico','O Senhor dos Anéis'),(5,'Suzanne Collins','estadunidense','Jogos Vorazes');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblioteca`
--

DROP TABLE IF EXISTS `biblioteca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `biblioteca` (
  `biblioteca_id` int NOT NULL AUTO_INCREMENT,
  `leitor_id` int DEFAULT NULL,
  `titulo_livros_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`biblioteca_id`),
  KEY `id_leitor` (`leitor_id`),
  KEY `titulo` (`titulo_livros_id`),
  CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`leitor_id`) REFERENCES `leitor` (`leitor_id`),
  CONSTRAINT `biblioteca_ibfk_2` FOREIGN KEY (`titulo_livros_id`) REFERENCES `livros` (`titulo_livros_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblioteca`
--

LOCK TABLES `biblioteca` WRITE;
/*!40000 ALTER TABLE `biblioteca` DISABLE KEYS */;
INSERT INTO `biblioteca` VALUES (1,1,'Jogos Vorazes'),(2,4,'O Senhor dos Anéis'),(3,5,'Harry Potter'),(4,2,'Diário de Um Banana'),(5,3,'Harry Potter');
/*!40000 ALTER TABLE `biblioteca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leitor`
--

DROP TABLE IF EXISTS `leitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leitor` (
  `nome_leitor` varchar(100) DEFAULT NULL,
  `leitor_id` int NOT NULL AUTO_INCREMENT,
  `cidade` varchar(100) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  PRIMARY KEY (`leitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leitor`
--

LOCK TABLES `leitor` WRITE;
/*!40000 ALTER TABLE `leitor` DISABLE KEYS */;
INSERT INTO `leitor` VALUES ('Maria',1,'Farroupilha',999990000),('João',2,'Caxias do Sul',999874532),('Lúcia',3,'Flores da Cunha',999765435),('Paula',4,'Garibaldi',996786512),('Giovana',5,'Bento Gonçalves',997808646);
/*!40000 ALTER TABLE `leitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leitura`
--

DROP TABLE IF EXISTS `leitura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leitura` (
  `leitura_id` varchar(100) NOT NULL,
  `leitor_id` int DEFAULT NULL,
  `titulo_livros_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`leitura_id`),
  KEY `id_leitor` (`leitor_id`),
  KEY `titulo` (`titulo_livros_id`),
  CONSTRAINT `leitura_ibfk_1` FOREIGN KEY (`leitor_id`) REFERENCES `leitor` (`leitor_id`),
  CONSTRAINT `leitura_ibfk_2` FOREIGN KEY (`titulo_livros_id`) REFERENCES `livros` (`titulo_livros_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leitura`
--

LOCK TABLES `leitura` WRITE;
/*!40000 ALTER TABLE `leitura` DISABLE KEYS */;
INSERT INTO `leitura` VALUES ('1',1,'Harry Potter'),('2',4,'Diário de Um Banana'),('3',2,'Jogos Vorazes'),('4',5,'Jogos Vorazes: Em Chamas'),('5',3,'O Senhor dos Anéis');
/*!40000 ALTER TABLE `leitura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livros`
--

DROP TABLE IF EXISTS `livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livros` (
  `titulo_livros_id` varchar(100) NOT NULL,
  `classificacao` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `paginas` int DEFAULT NULL,
  `edicao` int DEFAULT NULL,
  PRIMARY KEY (`titulo_livros_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livros`
--

LOCK TABLES `livros` WRITE;
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
INSERT INTO `livros` VALUES ('Diário de Um Banana','Comédia','Jeff Kinney',360,3),('Harry Potter','Ficção','J. K. Rowling',300,1),('Jogos Vorazes','Aventura','Suzanne Collins',400,1),('Jogos Vorazes: Em Chamas','Aventura','Suzanne Collins',423,1),('O Senhor dos Anéis','Fantasia','J. R. R. Tolkien',800,4);
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `possui`
--

DROP TABLE IF EXISTS `possui`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `possui` (
  `leitor_id` int DEFAULT NULL,
  `titulo_livros_id` varchar(100) DEFAULT NULL,
  KEY `id_leitor` (`leitor_id`),
  KEY `titulo_livro` (`titulo_livros_id`),
  CONSTRAINT `possui_ibfk_1` FOREIGN KEY (`leitor_id`) REFERENCES `leitor` (`leitor_id`),
  CONSTRAINT `possui_ibfk_2` FOREIGN KEY (`titulo_livros_id`) REFERENCES `livros` (`titulo_livros_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `possui`
--

LOCK TABLES `possui` WRITE;
/*!40000 ALTER TABLE `possui` DISABLE KEYS */;
INSERT INTO `possui` VALUES (1,'Jogos Vorazes'),(2,'Harry Potter'),(3,'O Senhor dos Anéis'),(4,'Diário de Um Banana'),(5,'Jogos Vorazes: Em Chamas'),(3,'Harry Potter'),(4,'Jogos Vorazes'),(5,'Diário de Um Banana'),(2,'Diário de Um Banana');
/*!40000 ALTER TABLE `possui` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-10 16:32:26
