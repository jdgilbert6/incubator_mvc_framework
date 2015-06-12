-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: application
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`email`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Rocky Squirrel','rocky@blueacorn.com','f5d193d9beeec7fcf78ea54e54287bdb526cef1f');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `author` (`author`,`date`,`title`,`image`,`url`)
) ENGINE=InnoDB AUTO_INCREMENT=2108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (2086,'','06-04-2015','Blog Post Test','Lorem ipsum dolor sit amet, graeci scripta vituperatoribus vel eu. Cu mel dicit epicuri. Fierent suavitate consectetuer ex nam, malis dicta detraxit usu et. Assum epicuri et vix, usu tale animal offendit ea. Ad purto sonet aliquip quo. Et sed ludus detracto erroribus, nemore doctus his et.\r\n\r\nAt eripuit veritus accusata pro, possim lucilius per at, eu nam dicam reprehendunt. Nec dolores delicatissimi cu, sed consul phaedrum ea. Sea no quod nibh posse, id assum sensibus pericula qui. No ius nonumy commodo feugait. Eam tibique sensibus eu, ei vix virtute assentior, eirmod indoctum ex mei. Mei impedit dolores legendos at, id dico vero duo, te sanctus saperet nam.\r\n\r\nEt graece populo adolescens vis, mei et unum gloriatur. Nam ut prima insolens complectitur. Zril facilisi et nam, ad eos ponderum eleifend. Ad putent admodum comprehensam has, est adhuc omnes audiam ut. Cu quis postea his, mea esse scaevola consequat an.\r\n\r\nNec consul fastidii mediocrem ex, duo velit erroribus maluisset id. Mea odio ridens in, aeterno labores conceptam nam te. Pro an purto minimum, per purto homero id, in vis propriae salutatus. Sed volutpat assentior eu. Ei odio alienum definiebas eum, ea aliquam graecis dolores sit.\r\n\r\nAn doctus dolorum atomorum nam. Veniam ornatus eum an, cum et eros animal suscipiantur. Eam ne insolens praesent. Id lorem nullam blandit eum, illum legimus instructior eum no. Ex usu minim tantas periculis, vim ei meis pertinacia.','','blog-post-test.html'),(2102,'','06-08-2015','Blog Post 1','Lorem ipsum dolor sit amet, iuvaret aliquam eu pro, iisque ancillae argumentum ne has. Id ius mundi nusquam, ne quo suas atqui concludaturque. Has quis nemore nusquam at. Eu usu impedit facilis salutandi, his ex quod habeo.\r\n\r\nNe sea dico delectus constituam. Cum ea regione impedit. Est in sumo unum sapientem. Vel cu movet doctus volumus, cu rebum labitur cum.\r\n\r\nAn eam explicari voluptatum, eum autem quaestio adversarium ea. Inimicus disputando te cum. Sea at inani ridens. Ex vim fastidii volutpat, paulo putent dolorum ei vel. Ut his possim saperet consulatu, duo diceret tractatos ei. Eu sed duis apeirian interesset, melius moderatius assueverit id eum. Et legere probatus per, mel illud habemus dolores ut.\r\n\r\nIriure appetere mel ne. Eum essent propriae appareat id, an nam aperiam probatus abhorreant, cum tale necessitatibus te. Eu vim option deleniti vituperata. Erat falli laudem eu vix. Duo velit mazim causae ex, adipisci periculis sit ea, in vim lorem nostrud voluptatum. Odio imperdiet theophrastus sit in. Per nusquam platonem et.\r\n\r\nHis no vidit maiestatis consetetur, ei homero liberavisse mediocritatem sit. Sea sensibus vulputate signiferumque ut, pro no facer ridens facilis. Ad eligendi consulatu reprimique sit, eos no iudicabit consequat. Quaeque vulputate eu duo, et eum tota vocibus incorrupte. Ad omnium posidonium his, has definiebas constituam cu.\r\n\r\nScaevola scripserit vel ex, no mea veri prima. In eam nusquam scribentur, aeque verterem cum at. Labitur legendos praesent cu mei, mel te possim graecis. In etiam conceptam dissentiunt cum. Alii dolorem vix ne. Ceteros phaedrum concludaturque in eos, ad putent hendrerit assueverit has, cu similique consequuntur per.\r\n\r\nIllud affert dolorum id pro, clita everti laboramus te eam. Eam ut eripuit oporteat. Vel posse sanctus blandit ea. Dicat blandit comprehensam no sea, ut per ullum cotidieque.\r\n\r\nNam in natum theophrastus. An partem persecuti complectitur eam, ne summo salutatus adipiscing sed, cu apeirian tincidunt usu. Fierent efficiendi ea eum. Vim no harum delenit propriae, at modo ubique sententiae eum. Ius augue timeam singulis ut.\r\n\r\nUsu atqui liber iudicabit ne, in usu quaestio definitionem. Essent nonumes fabellas vis ex, etiam erant ex vel. Qui at mazim errem principes, eu mel summo eirmod similique. No case perpetua ius.\r\n\r\nEi scripta dignissim accommodare sea, odio graeco scripserit ius eu. Mel falli vitae dicam eu, at omittam dissentias qui, an labore dolores mel. Te nibh consequat sed, brute dicant theophrastus qui ut. Nam et civibus mentitum consequat. Etiam principes comprehensam in cum. Vide zril dignissim pro ex, erroribus iracundia mediocritatem eam ne.','','blog-post-1.html'),(2104,'','06-08-2015','Blog Post 2','Lorem ipsum dolor sit amet, iuvaret aliquam eu pro, iisque ancillae argumentum ne has. Id ius mundi nusquam, ne quo suas atqui concludaturque. Has quis nemore nusquam at. Eu usu impedit facilis salutandi, his ex quod habeo.\r\n\r\nNe sea dico delectus constituam. Cum ea regione impedit. Est in sumo unum sapientem. Vel cu movet doctus volumus, cu rebum labitur cum.\r\n\r\nAn eam explicari voluptatum, eum autem quaestio adversarium ea. Inimicus disputando te cum. Sea at inani ridens. Ex vim fastidii volutpat, paulo putent dolorum ei vel. Ut his possim saperet consulatu, duo diceret tractatos ei. Eu sed duis apeirian interesset, melius moderatius assueverit id eum. Et legere probatus per, mel illud habemus dolores ut.\r\n\r\nIriure appetere mel ne. Eum essent propriae appareat id, an nam aperiam probatus abhorreant, cum tale necessitatibus te. Eu vim option deleniti vituperata. Erat falli laudem eu vix. Duo velit mazim causae ex, adipisci periculis sit ea, in vim lorem nostrud voluptatum. Odio imperdiet theophrastus sit in. Per nusquam platonem et.\r\n\r\nHis no vidit maiestatis consetetur, ei homero liberavisse mediocritatem sit. Sea sensibus vulputate signiferumque ut, pro no facer ridens facilis. Ad eligendi consulatu reprimique sit, eos no iudicabit consequat. Quaeque vulputate eu duo, et eum tota vocibus incorrupte. Ad omnium posidonium his, has definiebas constituam cu.\r\n\r\nScaevola scripserit vel ex, no mea veri prima. In eam nusquam scribentur, aeque verterem cum at. Labitur legendos praesent cu mei, mel te possim graecis. In etiam conceptam dissentiunt cum. Alii dolorem vix ne. Ceteros phaedrum concludaturque in eos, ad putent hendrerit assueverit has, cu similique consequuntur per.\r\n\r\nIllud affert dolorum id pro, clita everti laboramus te eam. Eam ut eripuit oporteat. Vel posse sanctus blandit ea. Dicat blandit comprehensam no sea, ut per ullum cotidieque.\r\n\r\nNam in natum theophrastus. An partem persecuti complectitur eam, ne summo salutatus adipiscing sed, cu apeirian tincidunt usu. Fierent efficiendi ea eum. Vim no harum delenit propriae, at modo ubique sententiae eum. Ius augue timeam singulis ut.\r\n\r\nUsu atqui liber iudicabit ne, in usu quaestio definitionem. Essent nonumes fabellas vis ex, etiam erant ex vel. Qui at mazim errem principes, eu mel summo eirmod similique. No case perpetua ius.\r\n\r\nEi scripta dignissim accommodare sea, odio graeco scripserit ius eu. Mel falli vitae dicam eu, at omittam dissentias qui, an labore dolores mel. Te nibh consequat sed, brute dicant theophrastus qui ut. Nam et civibus mentitum consequat. Etiam principes comprehensam in cum. Vide zril dignissim pro ex, erroribus iracundia mediocritatem eam ne.','','blog-post-2.html'),(2105,'rocky@blueacorn.com','06-09-2015','Blog Post 3','Lorem ipsum dolor sit amet, iuvaret aliquam eu pro, iisque ancillae argumentum ne has. Id ius mundi nusquam, ne quo suas atqui concludaturque. Has quis nemore nusquam at. Eu usu impedit facilis salutandi, his ex quod habeo.\r\n\r\nNe sea dico delectus constituam. Cum ea regione impedit. Est in sumo unum sapientem. Vel cu movet doctus volumus, cu rebum labitur cum.\r\n\r\nAn eam explicari voluptatum, eum autem quaestio adversarium ea. Inimicus disputando te cum. Sea at inani ridens. Ex vim fastidii volutpat, paulo putent dolorum ei vel. Ut his possim saperet consulatu, duo diceret tractatos ei. Eu sed duis apeirian interesset, melius moderatius assueverit id eum. Et legere probatus per, mel illud habemus dolores ut.\r\n\r\nIriure appetere mel ne. Eum essent propriae appareat id, an nam aperiam probatus abhorreant, cum tale necessitatibus te. Eu vim option deleniti vituperata. Erat falli laudem eu vix. Duo velit mazim causae ex, adipisci periculis sit ea, in vim lorem nostrud voluptatum. Odio imperdiet theophrastus sit in. Per nusquam platonem et.\r\n\r\nHis no vidit maiestatis consetetur, ei homero liberavisse mediocritatem sit. Sea sensibus vulputate signiferumque ut, pro no facer ridens facilis. Ad eligendi consulatu reprimique sit, eos no iudicabit consequat. Quaeque vulputate eu duo, et eum tota vocibus incorrupte. Ad omnium posidonium his, has definiebas constituam cu.\r\n\r\nScaevola scripserit vel ex, no mea veri prima. In eam nusquam scribentur, aeque verterem cum at. Labitur legendos praesent cu mei, mel te possim graecis. In etiam conceptam dissentiunt cum. Alii dolorem vix ne. Ceteros phaedrum concludaturque in eos, ad putent hendrerit assueverit has, cu similique consequuntur per.\r\n\r\nIllud affert dolorum id pro, clita everti laboramus te eam. Eam ut eripuit oporteat. Vel posse sanctus blandit ea. Dicat blandit comprehensam no sea, ut per ullum cotidieque.\r\n\r\nNam in natum theophrastus. An partem persecuti complectitur eam, ne summo salutatus adipiscing sed, cu apeirian tincidunt usu. Fierent efficiendi ea eum. Vim no harum delenit propriae, at modo ubique sententiae eum. Ius augue timeam singulis ut.\r\n\r\nUsu atqui liber iudicabit ne, in usu quaestio definitionem. Essent nonumes fabellas vis ex, etiam erant ex vel. Qui at mazim errem principes, eu mel summo eirmod similique. No case perpetua ius.\r\n\r\nEi scripta dignissim accommodare sea, odio graeco scripserit ius eu. Mel falli vitae dicam eu, at omittam dissentias qui, an labore dolores mel. Te nibh consequat sed, brute dicant theophrastus qui ut. Nam et civibus mentitum consequat. Etiam principes comprehensam in cum. Vide zril dignissim pro ex, erroribus iracundia mediocritatem eam ne.','','blog-post-3.html'),(2106,'rocky@blueacorn.com','06-09-2015','Blog Post 4','Lorem ipsum dolor sit amet, iuvaret aliquam eu pro, iisque ancillae argumentum ne has. Id ius mundi nusquam, ne quo suas atqui concludaturque. Has quis nemore nusquam at. Eu usu impedit facilis salutandi, his ex quod habeo.\r\n\r\nNe sea dico delectus constituam. Cum ea regione impedit. Est in sumo unum sapientem. Vel cu movet doctus volumus, cu rebum labitur cum.\r\n\r\nAn eam explicari voluptatum, eum autem quaestio adversarium ea. Inimicus disputando te cum. Sea at inani ridens. Ex vim fastidii volutpat, paulo putent dolorum ei vel. Ut his possim saperet consulatu, duo diceret tractatos ei. Eu sed duis apeirian interesset, melius moderatius assueverit id eum. Et legere probatus per, mel illud habemus dolores ut.\r\n\r\nIriure appetere mel ne. Eum essent propriae appareat id, an nam aperiam probatus abhorreant, cum tale necessitatibus te. Eu vim option deleniti vituperata. Erat falli laudem eu vix. Duo velit mazim causae ex, adipisci periculis sit ea, in vim lorem nostrud voluptatum. Odio imperdiet theophrastus sit in. Per nusquam platonem et.\r\n\r\nHis no vidit maiestatis consetetur, ei homero liberavisse mediocritatem sit. Sea sensibus vulputate signiferumque ut, pro no facer ridens facilis. Ad eligendi consulatu reprimique sit, eos no iudicabit consequat. Quaeque vulputate eu duo, et eum tota vocibus incorrupte. Ad omnium posidonium his, has definiebas constituam cu.\r\n\r\nScaevola scripserit vel ex, no mea veri prima. In eam nusquam scribentur, aeque verterem cum at. Labitur legendos praesent cu mei, mel te possim graecis. In etiam conceptam dissentiunt cum. Alii dolorem vix ne. Ceteros phaedrum concludaturque in eos, ad putent hendrerit assueverit has, cu similique consequuntur per.\r\n\r\nIllud affert dolorum id pro, clita everti laboramus te eam. Eam ut eripuit oporteat. Vel posse sanctus blandit ea. Dicat blandit comprehensam no sea, ut per ullum cotidieque.\r\n\r\nNam in natum theophrastus. An partem persecuti complectitur eam, ne summo salutatus adipiscing sed, cu apeirian tincidunt usu. Fierent efficiendi ea eum. Vim no harum delenit propriae, at modo ubique sententiae eum. Ius augue timeam singulis ut.\r\n\r\nUsu atqui liber iudicabit ne, in usu quaestio definitionem. Essent nonumes fabellas vis ex, etiam erant ex vel. Qui at mazim errem principes, eu mel summo eirmod similique. No case perpetua ius.\r\n\r\nEi scripta dignissim accommodare sea, odio graeco scripserit ius eu. Mel falli vitae dicam eu, at omittam dissentias qui, an labore dolores mel. Te nibh consequat sed, brute dicant theophrastus qui ut. Nam et civibus mentitum consequat. Etiam principes comprehensam in cum. Vide zril dignissim pro ex, erroribus iracundia mediocritatem eam ne.','','blog-post-4.html');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `date` varchar(30) NOT NULL,
  `blogid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comment` (`comment`,`date`,`blogid`)
) ENGINE=InnoDB AUTO_INCREMENT=559 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (472,'add_comment.phtml','05/20/15',1),(558,'Comment','05/20/15',1),(1,'comments.phtml','05/20/15',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `firstname` (`firstname`,`lastname`,`email`,`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2015-06-12 14:12:12
