-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: 207.154.202.238    Database: c2F19B1225
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.29-MariaDB-0ubuntu0.16.04.1

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
-- Dumping data for table `CATEGORY`
--

LOCK TABLES `CATEGORY` WRITE;
/*!40000 ALTER TABLE `CATEGORY` DISABLE KEYS */;
INSERT INTO `CATEGORY` VALUES (1,'Møbler'),(2,'Belysning');
/*!40000 ALTER TABLE `CATEGORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `PRODUCT`
--

LOCK TABLES `PRODUCT` WRITE;
/*!40000 ALTER TABLE `PRODUCT` DISABLE KEYS */;
INSERT INTO `PRODUCT` VALUES (3,'ERIK JØRGENSEN EJ 142 WAVES','Helt enestående og iøjenfaldende møbel designet af designduoen Ernst & Jensen. Waves er mere end bare et møbel, og den kan betegnes som mange ting. Det er et anderledes design, som både klæder det private samt offentlige rum. Waves blev skabt til Erik Jørgensens først talentkonkurrence i 1994 i anledning af virksomhedens 40 års jubilæum. Waves er et møbel, som indbyder til afslapning. De smukke organiske former passer perfekt ind i den moderne indretning, og du kan sætte dit eget præg på designet med puder ','ej-142',117624,2,2,0,'2017-03-21 07:55:27','2017-03-21 08:49:07',1),(4,'ERIK JØRGENSEN EJ 5 CORONA CLASSIC','Meget tidløs og klassisk loungestol designet af Poul M. Volther. Corona Classic er det design, som Poul M. Volther oprindeligt udviklede. Sidenhen er der kommet flere udgaver til, da designet er meget populært. De fire krumme skaller er monteret på et smukt håndbearbejdet træstel, og de forskellige materialer komplimenterer hinanden godt. Desuden giver de mange forskellige polstringer dig mulighed for at skabe dit helt eget udtryk i hjemmet. Du kan bruge Corona som lænestol i stuen eller til hygge i læsehjø','ej-5',36157,4,2,0,'2017-03-21 07:58:36','2017-03-21 08:49:08',1),(5,'ERIK JØRGENSEN EJ 101 QUEEN','Rigtig smuk og elegant lænestol designet af Hans J. Wegner. Queen er designet i 60\'erne som en partner til Oxchair. Med sin høje og slanke ryg fremtræder Queen som et mere feminint modstykke til den maskuline Oxchair. Queen er udført i en høj håndværkmæssig kvalitet, og stolens smukke former skaber en fortræffelig siddekomfort. Stolen er et smukt og pompøst designmøbel, som klæder både det private og offentlige rum. Stellet er fremstillet af forkromet stål, hvilket skaber en enestående kontrast til de fine ','ej-101',39419,1,2,0,'2017-03-21 08:00:14','2017-03-21 08:49:09',1),(6,'ERIK JØRGENSEN EJ 123 TOWARD SOFA','Rigtig smuk og æstetisk sofa designet af Anne Boysen. Toward er en af Erik Jørgensens nyeste sofaer, og den blev introduceret i fem farvekombinationer. Toward er en kombination af den klassiske sofa, lænestol og daybed, hvilket gør designet helt enestående. Den karakteristiske form passer perfekt ind i det moderne hjem, og Toward er ideel som afslapningsmøbel i stuen eller på kontoret. Designet og de særlige detaljer har gjort Toward ','ej-123',27963,3,2,0,'2017-03-21 08:02:17','2017-03-21 08:49:10',1),(7,'ERIK JØRGENSEN EJ 50 SOFA','Rigtig smuk og elegant sofa designet af EJ Designteam. EJ 50 blev designet i 2004, og den er en minimalistisk fortolkning af den klassiske sofa. På denne smukke model er sæde og ryg faste og præcise, hvilket er med til at højne siddekomforten. Det matkrome understel bærer sofaen på svævende vis, og det er med til at skabe en let rumfornemmelse. EJ 50 er en arkitektonisk perle, der matcher det 20. århundrede modernistiske ideologi, hvor form og funktion spiller sammen. Sofaen indbyder til afslapning, og derf','ej-50',20454,2,2,0,'2017-03-21 08:04:13','2017-03-21 08:49:12',1),(8,'FLOS STRING LIGHTS SPHERE PENDEL','String Lights er en nyfortolkning af en arkitektonisk rumindeling. Lampen er inspireret af el-ledninger, som vi ser dem i trafikken. Ideen med denne pendel var at overføre de udendørs ledninger ind i indendørs miljøer, hvor ledningerne kan bruges aktivt i indretningen. Brug denne sorte pendel fra Flos over spisebordet eller på kontoret. Fremstillet i aluminium og polycarbonat. Designet af M. Anastassiades. ','flos-slsp',4300,5,2,0,'2017-03-21 08:39:08','2017-03-21 08:49:14',2),(9,'FLOS STRING LIGHTS CONE PENDEL','Denne elegante String Lights lampe er vaffelformet og har et enkelt, skandinavisk udtryk over sig. Lampen kommer med forskellige ledningslængder, som begge er inspireret af de el-netværk af tråde man finder i trafikken. Hæng din pendel fra Flos over spisebordet, i køkkenet eller over mødebordet på kontoret. Fremstillet i aluminium og polycarbonat. Designet af M. Anastassiades.','flos-slcp',4300,7,2,0,'2017-03-21 08:40:12','2017-03-21 08:49:15',2),(11,'FLOS RE-LIGHTING 2129 LED GULVLAMPE','\nDenne modernistiske og karakteristiske loftpendel fra Flos er et smukt eksempel på en italiensk designlampe med innovation i højsædet. 2129 lampen består af en vægt og en bue, der knytter sig til loftet og kan drejes horisontalt 360 grader. Denne unikke konstruktion skaber illusionen om, at buen på lampen er flyvende i rummet. Lampen fra Flos fortjener opmærksomhed, og vil derfor passe bedst ind i store rum, hvor lampens æstetik for alvor kan komme til udtryk. ','flos-rel2129',18000,2,2,0,'2017-03-21 08:41:13','2017-03-21 08:49:16',2),(12,'FLOS CHRYSALIS','Flos Chrysalis Gulvlampe. Designet af Marcel Wanders.\nDiameter bund 38,3 cm, Diameter top 33,7 cm, Højde 200 cm, fremstillet i stål og glas (cocoon fremstillet i kunststof med et lag beskyttende coating). Der medfølger 285 cm ledning.\nChrysalis er en af nyhederne som Flos lancerer i 2012. Chrysalis giver et behageligt spredt lys, du bestemmer selv via de 2 kontakter på ledningen om begge lyskilder skal være tændt, lyskilde 2 sidder i toppen af lampen og skinner igennem mønsteret som laver en smuk og dekorat','flos-cgmw',22500,5,2,0,'2017-03-21 08:43:07','2017-03-21 08:49:17',2),(14,'FLOS CAN CAN','Can Can er elegant og nytænkende, den ydre form udstråler en organisk lethed, og inderskærmen med det  udskårne mønster i transparent, violet eller rav giver en legende og hyggelig belysning som er meget smuk og beroligende.','flos-cc',2050,9,2,0,'2017-03-21 08:44:13','2017-03-21 08:49:19',2);
/*!40000 ALTER TABLE `PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-21 12:02:42
