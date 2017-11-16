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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (1,'Курьерская доставка'),(2,'Курьерская доставка'),(3,'Курьерская доставка'),(4,'Курьерская доставка'),(5,'Курьерская доставка'),(6,'Курьерская доставка'),(7,'Курьерская доставка');
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
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (91,2,'Завершен',0,'Наличным',NULL,'any@email.ru',38751.4,'2017-10-09'),(92,2,'Новый',0,'Наличным',NULL,'any@email1.ru',76866,'2017-10-09'),(93,2,'Отменен',0,'Наличным',NULL,'any@email.ru',34110.2,'2017-10-10'),(94,2,'Отменен',0,'Наличным',NULL,'any@email.ru',3320.44,'2017-10-10'),(95,2,'Новый',0,'Наличным',NULL,'any@email.ru',369,'2017-10-10'),(96,2,'Новый',0,'Наличным',NULL,'any@email.ru',30000,'2017-10-10'),(97,2,'Новый',0,'Наличным',NULL,'any@email',15000,'2017-10-10'),(98,9,'Новый',0,'Наличным',NULL,'any@email',15000,'2017-10-10'),(99,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,NULL),(100,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(101,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(102,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(103,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(104,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(105,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(106,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(107,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(108,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(109,NULL,'НОВЫЙ',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(110,NULL,'ОПЛАЧЕН',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(111,NULL,'ОПЛАЧЕН',2,NULL,'Кранштадская улица д.123 ',NULL,5555,'2017-10-31'),(112,NULL,'ОПЛАЧЕН',2,NULL,'Бориса Галушкина д.123 ',NULL,5555,'2017-10-31'),(113,NULL,'ОПЛАЧЕН',2,NULL,'Бориса Галушкина д.123 ',NULL,5555,'2017-10-31');
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
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (41,8,91,'Доска для сёрфа Shark синяя&',2,1333.22),(42,9,91,'Доска для сёрфа Shark',3,654),(43,10,91,'33Доска',1,2000),(44,11,91,'33Доска для сёрфа Shark красная&',1,32123),(45,9,92,'Доска для сёрфа Shark',3,6523),(46,13,92,'33Доска для сёрфа Shark красная&',3,19099),(47,8,93,'Доска для сёрфа Shark синяя&',1,1333.22),(48,9,93,'Доска для сёрфа Shark',1,654),(49,11,93,'33Доска для сёрфа Shark красная&',1,32123),(50,8,94,'Доска для сёрфа Shark синяя&',2,1333.22),(51,9,94,'Доска для сёрфа Shark',1,654),(52,108,95,'1123',3,123),(53,138,96,'Доска SUP надувная RED PADDLE 2017 14\'0\" RIDE L',2,15000),(54,138,97,'Доска SUP надувная RED PADDLE 2017 14\'0\" RIDE L',1,15000),(55,138,98,'Доска SUP надувная RED PADDLE 2017 14\'0\" RIDE L',1,15000);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
INSERT INTO `shop_cart` VALUES (28,0,2,2,0),(33,9,1,0,654),(34,10,9,1,2000),(35,9,1,1,654),(36,8,2,1,9658.57),(38,8,1,0,9658.57),(41,10,1,9,2000),(42,9,4,9,654),(43,12,1,9,19000),(44,9,2,14,654),(45,9,7,15,654),(46,10,2,0,2000),(113,107,8,0,0),(117,138,1,17,15000),(118,139,6,0,20000),(119,138,3,0,15000);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vasia','144bd922d0042e5f59d6288f58604b26','Vasia','Pupkin',NULL,''),(2,'petya','144bd922d0042e5f59d6288f58604b26','Petya','Ivanov',NULL,''),(4,'test','test','test','test','test@test.ru',''),(9,'test2','144bd922d0042e5f59d6288f58604b26','testt','tettt','test@testtwo.ru',''),(10,'test3','144bd922d0042e5f59d6288f58604b26','a','b','a@b.ru',''),(12,'test5','144bd922d0042e5f59d6288f58604b26','test5','test5','t5@t.ru',''),(13,'testnew','144bd922d0042e5f59d6288f58604b26','new','new','a@2.ru',''),(14,'ttt','144bd922d0042e5f59d6288f58604b26','ttt','','tttt@t.ru',''),(15,'asdfasdf','144bd922d0042e5f59d6288f58604b26','sadfa','sdaf','sdfaasdf',''),(16,'testfdffd','1a1dc91c907325c69271ddf0c944bc72','test','test',NULL,''),(17,'admin','144bd922d0042e5f59d6288f58604b26','admin','admin','admin@admin.ru','admin');
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

-- Dump completed on 2017-11-07 14:49:02
