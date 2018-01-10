-- MySQL dump 10.15  Distrib 10.0.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: geekshop
-- ------------------------------------------------------
-- Server version	10.0.31-MariaDB-0ubuntu0.16.04.2

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Фэнтези'),(2,'История'),(3,'Научная литература'),(4,'Иностранные языки'),(5,'Иностранные языки'),(6,'Иностранные языки'),(7,'Иностранные языки'),(8,'Иностранные языки'),(9,'Иностранные языки'),(10,'Иностранные языки'),(11,'Иностранные языки'),(22,'Иностранные языки'),(23,'Иностранные языки'),(24,'Иностранные языки'),(25,'Иностранные языки'),(26,'Иностранные языки'),(27,'Иностранные языки'),(28,'Иностранные языки'),(29,'Иностранные языки'),(30,'Иностранные языки'),(31,'Иностранные языки'),(32,'Иностранные языки'),(33,'Иностранные языки'),(34,'Иностранные языки'),(35,'Иностранные языки'),(36,'Иностранные языки'),(37,'Иностранные языки'),(38,'1585Иностранные языки'),(39,'9442Иностранные языки'),(40,'1502Иностранные языки'),(41,'2125Иностранные языки'),(50,'4501Иностранные языки'),(54,'Иностранные языки');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `message` text,
  `author` char(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `added` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comments_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (16,NULL,'sfgkjhasdfkljasdf','jjhgjsd',6,1502122115),(17,NULL,'&lt;strong&gt;html&lt;/strong&gt;','мое имя',6,1502122165),(18,NULL,'лучший отзыв','мое имя',9,1502122349),(19,NULL,'Текст отзыва','Мой коммент',10,1502126869),(20,NULL,'asdf','asd',9,1507060188);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (1,'Курьерская доставка'),(2,'Самовывоз'),(3,'Почта');
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(128) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (7,'c2c0fbb9433682f5f0845367f80df4c6.jpeg','14178863059020.jpg',23455,0,'2017-08-03 16:44:22'),(8,'b42db8010d0cc766950962a956a1a5ce.jpeg','fox01.jpg',219839,3,'2017-08-03 17:20:53'),(9,'fc1983579961607a2202183b4ea46c81.jpeg','Nox_is_a_powerful_Xelor_(Wakfu).jpg',26889,7,'2017-08-03 17:42:02');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Новый',
  `delivery_id` int(3) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (152,18,'Отменен',1,NULL,NULL,'any@email',56599,'2018-01-09 00:15:13'),(153,18,'Отменен',1,NULL,NULL,'any@email',25000,'2018-01-09 00:28:51'),(154,18,'Отменен',1,NULL,NULL,'any@email',30000,'2018-01-09 01:09:44'),(155,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:10:09'),(156,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:10:11'),(157,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:12:18'),(158,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:12:19'),(159,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:12:19'),(160,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:12:19'),(161,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:12:19'),(162,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:18:27'),(163,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:18:28'),(164,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:18:28'),(165,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:18:28'),(166,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:18:28'),(167,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:21:38'),(168,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:21:38'),(169,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:21:38'),(170,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:21:38'),(171,18,'Отменен',1,NULL,NULL,'any@email',15000,'2018-01-09 01:21:38'),(172,18,'Новый',1,NULL,'ddsd','any@email',20000,'2018-01-09 01:26:22'),(173,18,'Новый',1,NULL,NULL,'any@email',30000,'2018-01-09 01:27:37'),(174,18,'Новый',1,NULL,NULL,'any@email',30000,'2018-01-09 01:28:11'),(175,18,'Новый',1,NULL,NULL,'any@email',30000,'2018-01-09 01:29:25'),(176,18,'Новый',1,NULL,NULL,'any@email',30000,'2018-01-09 01:29:50'),(177,18,'Новый',1,NULL,NULL,'any@email',30000,'2018-01-09 01:29:57'),(178,18,'Новый',1,NULL,NULL,'any@email',15000,'2018-01-09 01:31:08'),(179,18,'Новый',1,NULL,NULL,'any@email',NULL,'2018-01-09 01:31:49'),(180,18,'Новый',1,NULL,NULL,'any@email',NULL,'2018-01-09 01:31:52'),(181,18,'Новый',1,NULL,NULL,'any@email',15000,'2018-01-09 01:32:05'),(182,18,'Новый',1,NULL,NULL,'any@email',15000,'2018-01-09 01:32:36'),(183,18,'Новый',1,NULL,NULL,'any@email',30000,'2018-01-09 01:35:02'),(184,18,'Новый',1,NULL,NULL,'any@email',15000,'2018-01-09 01:36:29'),(185,18,'Новый',1,NULL,NULL,'any@email',NULL,'2018-01-09 01:36:44'),(186,18,'Новый',1,NULL,NULL,'any@email',15000,'2018-01-09 01:36:49');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `href` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (0000000001,'Главная','index.php','Главная страница сайта'),(0000000002,'Каталог','index.php?page=catalog','Каталог товаров сайта'),(0000000003,'Отзывы','index.php?page=feedback','Отзывы о сайте'),(0000000004,'О нас','index.php?page=about','Информация о сайте'),(0000000005,'Калькулятор 1','index.php?page=calc1','Задание 1. Калькулятор версия 1'),(0000000006,'Калькулятор 2','index.php?page=calc2','Задание 2. Калькулятор версия 2'),(0000000007,'Отзывы CRUD','index.php?page=feedback_2','Написать CRUD-блок для управления выбранным модулем через единую функцию');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_properties`
--

DROP TABLE IF EXISTS `product_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `prop_name` varchar(255) DEFAULT '0',
  `prop_value` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_properties`
--

LOCK TABLES `product_properties` WRITE;
/*!40000 ALTER TABLE `product_properties` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text,
  `published` tinyint(1) DEFAULT '1',
  `price` float DEFAULT NULL,
  `image` char(255) DEFAULT NULL,
  `added` datetime DEFAULT NULL,
  `title` char(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (137,'',NULL,'Надувная однослойная доска FLY AIR XL 17\\\'0\\\'\\\' предназначена для катания группой людей. В изготовлении использована технология SINGLE SKIN - однослойный материал1 ',1,12500,'',NULL,'1Доска для сёрфа JS board',NULL),(138,'',NULL,'Надувная доска Red Paddle 2017 Ride L 14\\\'0 является отличным выбором для катания небольших групп до 4 человек. Данная модель имеет широкую палубу и хвост, так что гарантирует стабильность, даже если гребут четыре человека. ',1,15000,'naish.jpg',NULL,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\\" RIDE L',NULL),(139,'',NULL,'Командные гонки поднимают данный вид спорта на новый уровень, так что Red Paddle Co рад представить вам новую доску Dragon 22\\\'0 - она создана для четырех гонщиков. Не обманитесь её размером: это одна быстрая машина',1,20000,'shark.jpg',NULL,'Доска SUP надувная RED PADDLE 2017 22\\\'0\\\" DRAGON',NULL),(140,'',NULL,'Отлично подходит для большой группы друзей и единомышленников. Доска создана специально для фановых катаний и развлечений:-)! Данная модель имеет одинарный сверхпрочный слой PVC, легко надувается и сдувается',1,21599,'shark_red.jpg',NULL,'Надувная доска для SUP серфинга',NULL),(142,'',NULL,'описание',1,3333,'naish.jpg',NULL,'какая-то доска',NULL),(143,'',NULL,'Р.Р. Толкиен',1,1000,NULL,NULL,'Властелин Колец. Возвращение короля',NULL),(270,'',NULL,'123123«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,999,NULL,NULL,'отредактированное наименование',1),(271,'',NULL,'123123«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,999,NULL,NULL,'отредактированное наименование',1),(272,'',NULL,'123123«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,999,NULL,NULL,'отредактированное наименование',1),(273,'',NULL,'«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,999,NULL,NULL,'Властелин Колец. Три башни',2),(274,'',NULL,'«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,9999,NULL,NULL,'Властелин Колец. Фродо Бегинс',2),(282,'',NULL,'«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,9991,NULL,NULL,'Властелин Колец. Кольцо всевластие',2),(283,'',NULL,'«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,9991,NULL,NULL,'Властелин Колец. Кольцо всевластие',2),(284,'',NULL,'123123«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.',1,888,NULL,NULL,'отредактированное наименование',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL DEFAULT '0',
  `order_id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (41,8,91,'Доска для сёрфа Shark синяя&',2,1333.22),(42,9,91,'Доска для сёрфа Shark',3,654),(43,10,91,'33Доска',1,2000),(44,11,91,'33Доска для сёрфа Shark красная&',1,32123),(45,9,92,'Доска для сёрфа Shark',3,6523),(46,13,92,'33Доска для сёрфа Shark красная&',3,19099),(47,8,93,'Доска для сёрфа Shark синяя&',1,1333.22),(48,9,93,'Доска для сёрфа Shark',1,654),(49,11,93,'33Доска для сёрфа Shark красная&',1,32123),(50,8,94,'Доска для сёрфа Shark синяя&',2,1333.22),(51,9,94,'Доска для сёрфа Shark',1,654),(52,108,95,'1123',3,123),(53,138,96,'Доска SUP надувная RED PADDLE 2017 14\'0\" RIDE L',2,15000),(54,139,97,'Доска SUP надувная RED PADDLE 2017 14\'0\" RIDE L',1,15000),(55,138,98,'Доска SUP надувная RED PADDLE 2017 14\'0\" RIDE L',1,15000),(56,140,128,'Надувная доска для SUP серфинга',2,21599),(57,140,129,'Надувная доска для SUP серфинга',2,21599),(58,140,130,'Надувная доска для SUP серфинга',2,21599),(59,274,130,'Властелин Колец. Фродо Бегинс',3,9999),(60,140,131,'Надувная доска для SUP серфинга',2,21599),(61,274,131,'Властелин Колец. Фродо Бегинс',3,9999),(62,140,132,'Надувная доска для SUP серфинга',2,21599),(63,274,132,'Властелин Колец. Фродо Бегинс',3,9999),(64,140,133,'Надувная доска для SUP серфинга',2,21599),(65,274,133,'Властелин Колец. Фродо Бегинс',1,9999),(66,140,134,'Надувная доска для SUP серфинга',2,21599),(67,274,134,'Властелин Колец. Фродо Бегинс',3,9999),(68,138,134,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(69,140,135,'Надувная доска для SUP серфинга',2,21599),(70,274,135,'Властелин Колец. Фродо Бегинс',3,9999),(71,138,135,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(72,140,136,'Надувная доска для SUP серфинга',2,21599),(73,274,136,'Властелин Колец. Фродо Бегинс',3,9999),(74,138,136,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(75,140,137,'Надувная доска для SUP серфинга',2,21599),(76,274,137,'Властелин Колец. Фродо Бегинс',3,9999),(77,138,137,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(78,140,138,'Надувная доска для SUP серфинга',2,21599),(79,274,138,'Властелин Колец. Фродо Бегинс',3,9999),(80,138,138,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(81,140,139,'Надувная доска для SUP серфинга',2,21599),(82,274,139,'Властелин Колец. Фродо Бегинс',3,9999),(83,138,139,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(84,274,140,'Властелин Колец. Фродо Бегинс',3,9999),(85,138,140,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(86,274,141,'Властелин Колец. Фродо Бегинс',2,9999),(87,138,141,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(88,274,142,'Властелин Колец. Фродо Бегинс',1,9999),(89,138,142,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(90,274,143,'Властелин Колец. Фродо Бегинс',1,9999),(91,138,143,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(92,274,144,'Властелин Колец. Фродо Бегинс',1,9999),(93,138,144,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(94,274,145,'Властелин Колец. Фродо Бегинс',1,9999),(95,138,145,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(96,274,146,'Властелин Колец. Фродо Бегинс',1,9999),(97,138,146,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(98,274,147,'Властелин Колец. Фродо Бегинс',1,9999),(99,138,147,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(100,274,148,'Властелин Колец. Фродо Бегинс',1,9999),(101,138,148,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(102,138,149,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(103,142,150,'какая-то доска',1,3333),(104,139,151,'Доска SUP надувная RED PADDLE 2017 22\\\'0\\',2,20000),(105,138,152,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(106,140,152,'Надувная доска для SUP серфинга',1,21599),(107,139,152,'Доска SUP надувная RED PADDLE 2017 22\\\'0\\',1,20000),(108,137,153,'1Доска для сёрфа JS board',2,12500),(109,138,154,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',2,15000),(110,138,155,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(111,138,156,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(112,138,157,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(113,138,158,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(114,138,159,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(115,138,160,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(116,138,161,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(117,138,162,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(118,138,163,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(119,138,164,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(120,138,165,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(121,138,166,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(122,138,167,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(123,138,168,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(124,138,169,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(125,138,170,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(126,138,171,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(127,139,172,'Доска SUP надувная RED PADDLE 2017 22\\\'0\\',1,20000),(128,138,173,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',2,15000),(129,138,174,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',2,15000),(130,138,175,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',2,15000),(131,138,176,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',2,15000),(132,138,177,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',2,15000),(133,138,178,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(134,138,181,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(135,138,182,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(136,138,183,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',2,15000),(137,138,184,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000),(138,138,186,'Доска SUP надувная RED PADDLE 2017 14\\\'0\\',1,15000);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `sid` varchar(255) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('00WHXir1eb',18,'2017-11-19 17:28:25'),('0YfZMRXGzy',18,'2017-11-13 18:01:35'),('1GlupQxMwJ',18,'2017-11-18 14:31:42'),('3iz2SRJxPC',18,'2017-11-17 14:13:36'),('3mAHDzSRxW',18,'2017-11-20 20:28:48'),('3TkwSi0Eja',18,'2017-11-27 20:04:12'),('3Zdjs5ABCf',18,'2017-11-14 17:12:16'),('4eNb4Z4k8A',18,'2017-11-23 13:09:08'),('4Nc2og6yZG',18,'2017-11-17 15:29:04'),('74TkkyCiiu',18,'2017-11-17 15:28:43'),('7IOIAqvadU',18,'2017-11-20 15:28:14'),('82ksUtjNAZ',18,'2017-11-20 16:12:21'),('8h7wzQAxrV',18,'2017-12-03 12:10:28'),('9Gb4xRbgLF',18,'2017-11-16 16:36:00'),('9kznCgVfh2',18,'2017-11-17 14:15:51'),('9LRSst9nFP',18,'2018-01-08 23:18:54'),('AvEaBlG46q',18,'2017-11-17 17:44:23'),('BN63R8e4Yg',18,'2017-11-23 19:49:26'),('bUW63OZIiw',18,'2017-11-23 21:48:43'),('ByXL8Cx9zs',18,'2017-11-27 00:02:10'),('dFzuJABYBt',18,'2017-11-17 21:28:14'),('ego4qjTIKA',18,'2017-11-22 14:53:31'),('eVgNiD37MS',18,'2017-11-22 13:54:57'),('fGOyeEm3OQ',18,'2017-11-16 16:29:01'),('FoqYDHxC2C',18,'2017-11-14 10:16:23'),('Gv48njtx9B',18,'2017-11-20 19:47:29'),('I2Eu00Hf4e',18,'2017-11-17 18:32:34'),('iQ2q22nfUj',18,'2017-11-17 20:27:29'),('JfdNjEXcMU',18,'2017-11-16 16:30:18'),('k1dJk0l4Vm',18,'2017-11-17 15:28:36'),('Ke6yelLjWd',18,'2017-11-14 17:10:31'),('KGEBHMmTRO',18,'2018-01-05 21:29:55'),('kYGkCVPxO0',18,'2017-11-17 14:13:51'),('liKyb5K5CO',18,'2017-11-17 14:16:06'),('m15R3HfL7v',18,'2017-11-18 16:04:24'),('mfsuT6mifs',18,'2017-11-16 16:28:09'),('MMW89i3w0w',18,'2017-11-17 15:57:36'),('MYQJNHqOY3',18,'2017-11-23 21:34:50'),('o77245K1eX',18,'2017-11-13 18:01:56'),('O808G4PkKC',18,'2017-11-27 01:09:20'),('OkAuzq03N1',18,'2017-11-13 18:01:50'),('OMK5qLBNAh',18,'2017-11-16 17:06:05'),('owXSiBgjj1',18,'2017-11-14 13:21:29'),('pHGO8gaEFx',18,'2017-11-30 12:10:49'),('Pon4odeL7L',18,'2018-01-09 01:36:49'),('pwXEtBEhZZ',18,'2017-11-14 11:27:38'),('QdUmxZ9h3V',18,'2017-11-27 01:29:48'),('r8EmSgyCOC',18,'2017-11-21 12:31:51'),('s3m1TMRJZC',18,'2018-01-09 01:00:55'),('SA09UlJx7A',18,'2017-11-17 21:39:27'),('sO9pI0w9li',18,'2017-11-18 14:07:56'),('sxwBuLKHWG',18,'2017-11-14 15:32:52'),('tzjGG0BCip',18,'2017-11-13 17:59:19'),('u0hNtfq7h8',18,'2017-11-16 16:27:07'),('uAeI0cWQGn',18,'2017-11-16 16:26:16'),('uJy1q6yTbS',18,'2017-11-22 17:12:09'),('uo7HIsb2Tv',18,'2017-11-16 16:38:54'),('VA2arS7ZMr',18,'2017-11-16 17:05:25'),('vIF1qSdnMc',18,'2017-11-14 09:54:14'),('vmvAx3NMe4',18,'2017-11-16 16:28:55'),('WLCmjc3Fok',18,'2017-11-17 16:00:32'),('wlM9jc8Z8x',18,'2017-11-22 19:30:46'),('Wx4Ic3AKPI',18,'2017-11-22 15:49:01'),('xDTvP0mwtc',18,'2017-11-27 19:03:28'),('XNQRtWyKai',18,'2017-11-17 15:30:01'),('Y9kkuij6Jw',18,'2017-11-14 12:42:00'),('z4xUhC3Dkc',18,'2017-11-17 14:15:59');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(6) NOT NULL,
  `user_id` int(1) NOT NULL,
  `price` float DEFAULT NULL,
  `is_in_order` tinyint(4) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
INSERT INTO `shop_cart` VALUES (197,138,2,18,15000,1,152),(198,140,2,18,21599,1,152),(199,139,1,18,20000,1,152),(200,137,2,18,12500,1,153),(202,138,2,18,15000,1,154),(203,138,1,18,15000,1,155),(204,139,1,18,20000,1,172),(205,138,2,18,15000,1,173),(206,138,2,18,15000,1,174),(207,138,2,18,15000,1,175),(208,138,2,18,15000,1,176),(209,138,2,18,15000,1,177),(210,138,1,18,15000,1,178),(212,138,1,18,15000,1,182),(213,138,2,18,15000,1,183),(214,138,1,18,15000,1,184),(215,138,1,18,15000,1,186),(216,138,2,18,15000,NULL,NULL);
/*!40000 ALTER TABLE `shop_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `firstname` char(255) DEFAULT NULL,
  `lastname` char(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_uindex` (`id`),
  UNIQUE KEY `users_login_uindex` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vasia','144bd922d0042e5f59d6288f58604b26','Vasia','Pupkin',NULL,''),(2,'petya','144bd922d0042e5f59d6288f58604b26','Petya','Ivanov',NULL,''),(4,'test','test','test','test','test@test.ru',''),(9,'test2','144bd922d0042e5f59d6288f58604b26','testt','tettt','test@testtwo.ru',''),(10,'test3','144bd922d0042e5f59d6288f58604b26','a','b','a@b.ru',''),(12,'test5','144bd922d0042e5f59d6288f58604b26','test5','test5','t5@t.ru',''),(13,'testnew','144bd922d0042e5f59d6288f58604b26','new','new','a@2.ru',''),(14,'ttt','144bd922d0042e5f59d6288f58604b26','ttt','','tttt@t.ru',''),(15,'asdfasdf','144bd922d0042e5f59d6288f58604b26','sadfa','sdaf','sdfaasdf',''),(16,'testfdffd','1a1dc91c907325c69271ddf0c944bc72','test','test',NULL,''),(17,'admin','144bd922d0042e5f59d6288f58604b26','admin','admin','admin@admin.ru','admin'),(18,'baganull','1a1dc91c907325c69271ddf0c944bc72','baganull','baganull','baganull@baganull.ru','user');
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

-- Dump completed on 2018-01-10 12:55:24
