-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: sukebeis_shm
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `Bmanga`
--

DROP TABLE IF EXISTS `Bmanga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bmanga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `essizid` varchar(50) NOT NULL,
  `bolumid` varchar(255) NOT NULL,
  `bolumsirasi` int(20) NOT NULL DEFAULT '0',
  `bolumadi` text NOT NULL,
  `yuklemetarihi` varchar(15) NOT NULL,
  `video` varchar(5) DEFAULT NULL,
  `hit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bmanga`
--

LOCK TABLES `Bmanga` WRITE;
/*!40000 ALTER TABLE `Bmanga` DISABLE KEYS */;
INSERT INTO `Bmanga` (`id`, `essizid`, `bolumid`, `bolumsirasi`, `bolumadi`, `yuklemetarihi`, `video`, `hit`) VALUES (23,'rsQj94','a0jeXp18',2,'Kalp Atışı - Fotoğraf Çekimi ve Aşkın ABC\'si','2019-02-01','video',89),(19,'rsQj94','STOY0and',0,'PV','2019-01-31','video',121),(20,'rsQj94','jOVtDypC',1,'Chi-chan ve Onun Gizli Yarı Zamanlı İşi','2019-01-31','video',134),(25,'rsQj94','r8kWfqrZ',3,'Yukata, Havai Fişek ve Yaz Festivalleri','2019-02-01','video',84),(26,'rsQj94','fDaaC81N',4,'SON','2019-02-02','video',91),(27,'XccC6h','luPS3DIY',1,'「Bir Adım Önünde」&「Dalgalanan Gökyüzü」','2019-02-06','video',63),(28,'XccC6h','M43cLx6E',2,'「Yalan」&「İki Yüzlülük」','2019-02-06','video',67),(29,'TZdYfW','EWdf6yc5',1,'Bölüm 1','2019-02-06','video',92);
/*!40000 ALTER TABLE `Bmanga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bolum`
--

DROP TABLE IF EXISTS `bolum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bolum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sira` int(11) NOT NULL,
  `bolumid` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `essizid` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `url` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bolum`
--

LOCK TABLES `bolum` WRITE;
/*!40000 ALTER TABLE `bolum` DISABLE KEYS */;
/*!40000 ALTER TABLE `bolum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kat`
--

DROP TABLE IF EXISTS `kat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `katid` int(11) NOT NULL,
  `essizid` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kat`
--

LOCK TABLES `kat` WRITE;
/*!40000 ALTER TABLE `kat` DISABLE KEYS */;
INSERT INTO `kat` (`id`, `katid`, `essizid`) VALUES (17,32,'XccC6h'),(18,35,'XccC6h'),(19,37,'bOhjcC'),(20,36,'bOhjcC'),(21,38,'bOhjcC'),(22,23,'TZdYfW'),(23,32,'TZdYfW'),(24,39,'TZdYfW'),(25,28,'rsQj94'),(26,35,'rsQj94'),(27,39,'rsQj94');
/*!40000 ALTER TABLE `kat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manga`
--

DROP TABLE IF EXISTS `manga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `essizid` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yazar` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yayintarih` varchar(20) DEFAULT NULL,
  `guncellemetarihi` date NOT NULL,
  `hit` int(11) NOT NULL,
  `tur` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ozet` longtext,
  `durum` int(11) NOT NULL,
  `tpbolum` int(255) NOT NULL,
  `degerlendirme` int(11) NOT NULL,
  `kapak_resim` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manga`
--

LOCK TABLES `manga` WRITE;
/*!40000 ALTER TABLE `manga` DISABLE KEYS */;
INSERT INTO `manga` (`id`, `essizid`, `ad`, `yazar`, `yayintarih`, `guncellemetarihi`, `hit`, `tur`, `ozet`, `durum`, `tpbolum`, `degerlendirme`, `kapak_resim`) VALUES (25,'bOhjcC','Gakuen Saimin Reido','','2010-12-04','2019-01-30',21,'','Bir lise öğretmeni olan Futoshi Satou, öğrenciler ve kadın öğretmenler tarafından hem çirkin hem de hor görüyor. Güçlü bir cihaz eline düşüyor- fotoğrafını çektiği kişiyi hipnoz altına alan gizemli bir cep telefonu. Buna maruz kalanların iradesini değiştirebilir ve vücudun istediği gibi karşılık vermesini sağlayabilir, yani bu, öğretmen için eğlenceli bir zamandır ve baş öğretmen ve öğrenci konseyi üyeleri gibilerinin üstesinden gelmeyi hedefler.',2,3,0,'bOhjcC_manga.jpg'),(24,'XccC6h','Suki de Suki de, Suki de The Animation','','2012-06-29','2019-01-30',26,'','Hikaye iki kızı ve ağabeyleriyle ilişkilerini takip ediyor.',2,2,0,'XccC6h_manga.jpg'),(26,'TZdYfW','Swing Out Sisters!','','2011-11-25','2019-01-30',18,'','-Güncellenecek-',2,1,0,'TZdYfW_manga.jpg'),(27,'rsQj94','Shoujo Ramune','','2019-01-31','2019-02-02',54,'35','Kiyoshi, Tokyo eteklerinde bir şekerci dükkânı kurma hayalini gerçekleştirmek için görevinden ayrılmasından bu yana birkaç ay geçti. Hayatının geri kalanını küçük kızları izleyerek yaşamak istiyordu. Planı, yakındaki okuldan gelen çocukların her gün dükkânını ziyaret edip arkadaşlarıyla mutlu bir şekilde konuşmalarıyla başarılı oldu. Ancak, yaz tatilinin başlamasından kısa bir süre sonra, bazı müşterileri ile bir şeyler oldu. Böylece yaz tatiline küçük kızlarla başlar.',2,5,0,'rsQj94_manga.jpg');
/*!40000 ALTER TABLE `manga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oy` int(11) NOT NULL,
  `mgid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` (`id`, `oy`, `mgid`, `userid`) VALUES (17,5,27,4),(20,1,25,10),(19,2,26,10),(18,3,24,10),(16,5,24,4),(21,5,27,13);
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_durum` int(2) NOT NULL DEFAULT '1',
  `reklam1` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `reklam2` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `reklam3` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `reklam4` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `reklam5` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `title`, `description`, `keywords`, `site_durum`, `reklam1`, `reklam2`, `reklam3`, `reklam4`, `reklam5`) VALUES (1,'Sukebeist | Hentai','Türkçe hentaileri sizlerle buluşturan siteniz.','hentai,izle,hentai izle,turkce hentai,sukebeist.com,hentai, anime porn, hentai porn, anime hentai, hentai video, free hentai, hentai stream, hentai online, watch hentai, hentai xxx, anime sex, hentai sex, anime xxx, hentai series, best hentai, hentai hd',0,'<meta name=\"clckd\" content=\"0ac670e85d610fa463b03427260971d4\" />','<script async src=\"//d.smopy.com/d/?resource=pubJS\"></script>','<script async src=\"//d.smopy.com/d/?resource=pubJS\"></script>','<script async src=\"//d.smopy.com/d/?resource=pubJS\"></script>','<script async src=\"//d.smopy.com/d/?resource=pubJS\"></script>');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turler`
--

DROP TABLE IF EXISTS `turler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turler`
--

LOCK TABLES `turler` WRITE;
/*!40000 ALTER TABLE `turler` DISABLE KEYS */;
INSERT INTO `turler` (`id`, `adi`) VALUES (1,'Aksiyon'),(2,'Macera'),(4,'Komedi'),(5,'Ecchi'),(6,'Tarihi'),(7,'Yetişkin'),(8,'Gizem'),(9,'Psikolojik'),(10,'Okul Hayatı'),(11,'Seinen'),(12,'Shounen'),(13,'Spor'),(14,'Trajedi'),(15,'Webtoon'),(16,'Korku'),(17,'Shounen Ai'),(18,'Dram'),(19,'Fantezi'),(20,'Dövüş Sanatları'),(21,'Mecha'),(22,'Oneshot'),(23,'Romantizm'),(24,'Bilim Kurgu'),(25,'Shoujo'),(26,'Hayattan Bir Parça'),(27,'Doğaüstü'),(28,'Yuri'),(29,'Adult'),(30,'Yaoi'),(32,'Ensest'),(37,'Öğrenci & Öğretmen'),(36,'Hipnotize'),(35,'Lolicon'),(38,'Okul'),(39,'Erotik');
/*!40000 ALTER TABLE `turler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usermangalist`
--

DROP TABLE IF EXISTS `usermangalist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usermangalist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `essizid` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usermangalist`
--

LOCK TABLES `usermangalist` WRITE;
/*!40000 ALTER TABLE `usermangalist` DISABLE KEYS */;
INSERT INTO `usermangalist` (`id`, `essizid`, `kullanici`) VALUES (21,'ozCgBp',5),(16,'YTScNt',5),(11,'VzonZh',6),(15,'VzonZh',5),(30,'rsQj94',13);
/*!40000 ALTER TABLE `usermangalist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `parola` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rutbe` int(11) NOT NULL,
  `kitaplik` int(11) NOT NULL,
  `uyeresim` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'userimg/user_image_yok.png',
  `tarih` date NOT NULL,
  `ban` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `kullaniciadi`, `ad`, `soyad`, `parola`, `email`, `rutbe`, `kitaplik`, `uyeresim`, `tarih`, `ban`) VALUES (4,'proxlave','','','b7ca631afddbfea5315aa2385c76ea33','lowlarlowlar3@gmail.com',3,0,'userimg/user_image_yok.png','2018-06-06',0),(16,'BlumexUser','','','6d66c22ac4a079bc729d679c43564925','blumexuser@gmail.com',0,0,'userimg/user_image_yok.png','2019-02-07',0),(15,'Lucifer','','','6c31fc0f69bbf07cba275ff861d99123','yucubaba7171@gmail.com',0,0,'userimg/user_image_yok.png','2019-02-05',0),(10,'test31','','','536d69ec353e44061a437cf571f01e71','yetkiyialmaananısikerim@admin.com',3,0,'userimg/user_image_yok.png','2019-01-19',0),(11,'meirochou','','','acb31a1ab0547d340390b5397c48e326','vorskeegang@gmail.com',0,0,'userimg/11_avatar_1.jpg','2019-01-22',0),(12,'YaoiQueen','','','861692d3d1c234d66d837f9e1bbe1517','rabiadiril55@gmail.com',0,0,'userimg/12_avatar.jpg','2019-01-22',0),(13,'Ghoul Assassin','','','5350e4ecdf6983acfe8ae7ca197593e9','emir.scratch2015@yandex.com',1,0,'userimg/13_avatar.jpg','2019-01-27',0),(14,'r3pl4','','','a9309f641ff65ef541550236af61fe5e','alper_demi@hotmail.com',3,0,'userimg/user_image_yok.png','2019-01-30',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vbolum`
--

DROP TABLE IF EXISTS `vbolum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vbolum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `essizid` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `bolumid` text COLLATE utf8_turkish_ci NOT NULL,
  `embed1` text COLLATE utf8_turkish_ci,
  `embed2` text COLLATE utf8_turkish_ci,
  `embed3` text COLLATE utf8_turkish_ci,
  `embed4` text COLLATE utf8_turkish_ci,
  `embed5` text COLLATE utf8_turkish_ci,
  `embed6` text COLLATE utf8_turkish_ci,
  `embed7` text COLLATE utf8_turkish_ci,
  `embed8` text COLLATE utf8_turkish_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vbolum`
--

LOCK TABLES `vbolum` WRITE;
/*!40000 ALTER TABLE `vbolum` DISABLE KEYS */;
INSERT INTO `vbolum` (`id`, `essizid`, `bolumid`, `embed1`, `embed2`, `embed3`, `embed4`, `embed5`, `embed6`, `embed7`, `embed8`) VALUES (14,'rsQj94','STOY0and','','<iframe src=\"https://streamcherry.com/embed/kpckeamptfflootd/_Sukebeist_Shoujo_Ramune_PV_720p_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/AosZGlLRlkA/%5BSukebeist%5D_Shoujo_Ramune_PV_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(15,'rsQj94','jOVtDypC','','<iframe src=\"https://streamcherry.com/embed/oafdnrdrmbcfstbr/_Sukebeist_Shoujo_Ramune_-_01_-_Chi-chan_ve_Onun_Gizli_Yar_Zamanl_i_720p_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/KR_Z7CWxAfE/%5BSukebeist%5D_Shoujo_Ramune_-_01_-_%5BChi-chan_ve_Onun_Gizli_Yar%C4%B1_Zamanl%C4%B1_%C4%B0%C5%9Fi%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(16,'rsQj94','aIemwU2p','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(17,'rsQj94','lJHuweG8','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(18,'rsQj94','IO0jdXxZ','','','<iframe src=\"https://openload.co/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(19,'rsQj94','Y4EVsIAe','','','<iframe src=\"https://openload.co/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(20,'rsQj94','MeOpAepo','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(21,'rsQj94','UfKLrbWn','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(22,'rsQj94','BmYGu5Op','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(23,'rsQj94','3V589WnI','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(24,'rsQj94','c7KmBdDT','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(25,'rsQj94','ORFGN6Lj','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(26,'rsQj94','u6WOYd3R','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(27,'rsQj94','mgZxrDKT','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(28,'rsQj94','rpSNOl7C','','','https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4','','','','',''),(29,'rsQj94','VJv1ZEeR','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(30,'rsQj94','mO0uIF40','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(32,'rsQj94','ybQznwmM','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(34,'rsQj94','N08lu7Cb','','','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(35,'rsQj94','a0jeXp18','','<iframe src=\"https://streamcherry.com/embed/fcktalataqqatqkf/_Sukebeist_Shoujo_Ramune_-_02_-_Kalp_At_-_Foto_raf_ekimi_ve_A_k_n_ABC_si_720p_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/N6ZFy10sCac/%5BSukebeist%5D_Shoujo_Ramune_-_02_-_%5BKalp_At%C4%B1%C5%9F%C4%B1_-_Foto%C4%9Fraf_%C3%87ekimi_ve_A%C5%9Fk%C4%B1n_ABC%27si%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>\r\n','','','','',''),(37,'rsQj94','r8kWfqrZ','','<iframe src=\"https://streamcherry.com/embed/rfkelalptbcedlnd/_Sukebeist_Shoujo_Ramune_-_03_-_Yukata_Havai_Fi_ek_ve_Yaz_Festivalleri_720p_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/OnJ2UsrE30M/%5BSukebeist%5D_Shoujo_Ramune_-_03_-_%5BYukata%2C_Havai_Fi%C5%9Fek_ve_Yaz_Festivalleri%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(38,'rsQj94','fDaaC81N','','<iframe src=\"https://streamcherry.com/embed/tcqlcbedmdoclokl/_Sukebeist_Shoujo_Ramune_-_04_-_SON_720p_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/4KUPlwKIgvE/%5BSukebeist%5D_Shoujo_Ramune_-_04_-_%5BSON%5D_%5B720p%5D.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(39,'XccC6h','luPS3DIY','','<iframe src=\"https://streamango.com/embed/dornttblftornoec/_Sukebeist_Suki_de_Suki_de_Suki_de_The_Animation_-_01_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/TDHhMgf9P24/Suki_de_Suki_de%2C_Suki_de_The_Animation_-_01-muxed.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(40,'XccC6h','M43cLx6E','','<iframe src=\"https://streamango.com/embed/ndklnnfrllfbmobm/_Sukebeist_Suki_de_Suki_de_Suki_de_The_Animation_-_02_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/SCzGNMrjPzI/Suki_de_Suki_de%2C_Suki_de_The_Animation_-_02.mp4-muxed.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','',''),(41,'TZdYfW','EWdf6yc5','','<iframe src=\"https://streamango.com/embed/fmbqndbmolcqbtts/_Sukebeist_BD_1080p_Swing_Out_Sisters_-_Ep_01_mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','<iframe src=\"https://oload.tv/embed/U-aOwK07354/%5BEng-Sub%5D_%5BSubDesu-H%5D_%5BBD_1080p%5D_Swing_Out_Sisters_-_Ep.01-muxed.mp4\" scrolling=\"no\" frameborder=\"0\" width=\"700\" height=\"430\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>','','','','','');
/*!40000 ALTER TABLE `vbolum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sukebeis_shm'
--

--
-- Dumping routines for database 'sukebeis_shm'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-22 21:16:53
