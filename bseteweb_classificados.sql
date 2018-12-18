-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: bseteweb_classificados
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `descricao` text CHARACTER SET utf8,
  `valor` float DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios`
--

LOCK TABLES `anuncios` WRITE;
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
INSERT INTO `anuncios` VALUES (1,1,1,'Samsung Galaxy S7 Edge','O Samsung Galaxy S7 Edge Ã© um smartphone Android avanÃ§ado e abrangente em todos os pontos de vista com algumas caracterÃ­sticas excelentes. Tem uma grande tela de 5.1 polegadas com uma resoluÃ§Ã£o de 2560x1440 pixels.',1899,0),(2,1,1,'Azus Zenfone Z5','Nova linha de modelos da Asus trouxe o modelo Z5 com muitas mudanÃ§as, melhor escolha intermediÃ¡ria.',600,1),(4,1,4,'Camiseta Element','Camiseta vÃ¡rias cores da marca Element.',70,0),(5,1,4,'Camiseta Hering','Camiseta da nova linha Outono / Inverno da Hering.',120,0),(9,2,2,'Maquiagem Luis Ylton','Com seis tons de sombra com acabamento mattes e cintilantes, a Pallete Mix de Una traz combinaÃ§Ãµes exclusivas que se adequam a todos os tons de pele e a qualquer ocasiÃ£o. SÃ£o diferentes opÃ§Ãµes para que toda mulher possa encontrar as combinaÃ§Ãµes que melhor realÃ§am seu olhar.',69,0),(10,2,2,'Shampo Douve','Shampo Dove para cabelos masculinos anti caspa.',14,0),(12,1,3,'adasdas','adsadasdasda',50,2);
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anuncios_imagens`
--

DROP TABLE IF EXISTS `anuncios_imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anuncios_imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios_imagens`
--

LOCK TABLES `anuncios_imagens` WRITE;
/*!40000 ALTER TABLE `anuncios_imagens` DISABLE KEYS */;
INSERT INTO `anuncios_imagens` VALUES (10,1,'14cd584dccaaeaeab1a08f38772b8378jpg'),(11,1,'f981986ac2f053e98cac5ab5877ae576jpg'),(6,4,'b0d0fa6e321272e41826e16f34b8dc44jpg'),(7,5,'3aa3159ac2e809229521d757853207c1jpg'),(8,2,'36e16e5e1e0de5508bf5ec8e31493da4jpg'),(12,1,'a56bbcdff9f07a3dd103f1df496f5b6ejpg'),(13,9,'c62b13d8faeb75e5ecd1c85d529fcc3djpg'),(14,9,'afb9fdea11be5ce210880c6342669d28jpg'),(15,10,'f08fa48d37803302a6aae8815c0d1941jpg');
/*!40000 ALTER TABLE `anuncios_imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Tecnologia'),(2,'Beleza'),(3,'Livros'),(4,'Roupas'),(5,'Veículos'),(6,'Imóveis');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(70) CHARACTER SET utf8 NOT NULL,
  `telefone` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Rodrigo','rblima0@gmail.com','$2y$10$ObHFBCPsQK3DO3FlzfR2Ke8C6eZW1el6xIsLe8vJWJfIfC7vAkNvK','11998855886'),(2,'Kathy','kathy@gmail.com','$2y$10$dDFkl6.gTm9BbqzOzdWaneT4TKU.o8YGqY3dndpYAbGWoszWkdPma','11998979694'),(3,'Ana','ana@gmail.com','$2y$10$9sOGO7Cq1AfU6t5fT30oFeXuelLOn5rsyOfFUmqT/RPkrjfh5swgu','11995969695');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-18 14:21:33
