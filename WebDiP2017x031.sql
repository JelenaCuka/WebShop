-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2018 at 11:15 AM
-- Server version: 5.5.59
-- PHP Version: 5.4.45-0+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `WebDiP2017x031`
--

-- --------------------------------------------------------

--
-- Table structure for table `akcija`
--

CREATE TABLE IF NOT EXISTS `akcija` (
  `idakcija` int(11) NOT NULL AUTO_INCREMENT,
  `iznos_popusta` double NOT NULL,
  `od` date NOT NULL,
  `do` date NOT NULL,
  `idpredmet` int(11) DEFAULT NULL,
  PRIMARY KEY (`idakcija`),
  KEY `idpredmet` (`idpredmet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `akcija`
--

INSERT INTO `akcija` (`idakcija`, `iznos_popusta`, `od`, `do`, `idpredmet`) VALUES
(2, 0.15, '2018-06-02', '2018-06-03', 1),
(3, 0.2, '2018-05-01', '2018-05-31', 3),
(4, 0.15, '2018-05-19', '2018-05-20', 1),
(5, 0.5, '2018-06-07', '2018-06-10', 1),
(6, 0.22, '2018-06-13', '2018-06-21', 49),
(7, 0.3, '2018-06-14', '2018-06-21', 50);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija_predmeta`
--

CREATE TABLE IF NOT EXISTS `kategorija_predmeta` (
  `idkategorija_predmeta` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idkategorija_predmeta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- Dumping data for table `kategorija_predmeta`
--

INSERT INTO `kategorija_predmeta` (`idkategorija_predmeta`, `naziv`) VALUES
(1, 'Maskice za mobitel'),
(2, 'Dodaci za mobitele'),
(3, 'Ručni satovi'),
(4, 'Dronovi'),
(5, 'Fotoaparati'),
(6, 'Sunčane naočale'),
(7, 'Dodaci prehrani'),
(9, 'Lampice'),
(10, 'Power bankovi mobitel'),
(11, 'Upaljači'),
(20, 'bla bla'),
(21, 'Nova kategorija obrana');

-- --------------------------------------------------------

--
-- Table structure for table `konfiguracija_sustava`
--

CREATE TABLE IF NOT EXISTS `konfiguracija_sustava` (
  `idkonfiguracija_sustava` int(11) NOT NULL AUTO_INCREMENT,
  `trajanje_kolacica` int(11) DEFAULT NULL,
  `stranicenje_broj_zapisa` int(11) DEFAULT NULL,
  `virtualni_pomak_vremena` int(11) DEFAULT NULL,
  `trajanje_sesije_max` int(11) DEFAULT NULL,
  `neispravna_prijava_broj_max` int(11) DEFAULT NULL,
  `link_za_aktivaciju_trajanje_sati` int(11) DEFAULT NULL,
  `broj_top_korisnika` int(11) DEFAULT NULL,
  `prikazi_statistiku_od` date DEFAULT NULL,
  `prikazi_statistiku_do` date DEFAULT NULL,
  `aktivna` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idkonfiguracija_sustava`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `konfiguracija_sustava`
--

INSERT INTO `konfiguracija_sustava` (`idkonfiguracija_sustava`, `trajanje_kolacica`, `stranicenje_broj_zapisa`, `virtualni_pomak_vremena`, `trajanje_sesije_max`, `neispravna_prijava_broj_max`, `link_za_aktivaciju_trajanje_sati`, `broj_top_korisnika`, `prikazi_statistiku_od`, `prikazi_statistiku_do`, `aktivna`) VALUES
(2, 2, 5, 0, 1, 3, 5, 2, '2018-01-01', '2018-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `idkorisnik` int(11) NOT NULL AUTO_INCREMENT,
  `lozinka_nekriptirano` text COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(45) COLLATE utf8_bin NOT NULL,
  `ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `adresa` text COLLATE utf8_bin,
  `status_racun_aktivan` tinyint(1) NOT NULL,
  `aktivacijski_token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `link_aktiviranje_vrijeme_slanja` datetime NOT NULL,
  `uvjeti_koristenja_prihvaceni` tinyint(1) NOT NULL DEFAULT '1',
  `pristup_zakljucan` tinyint(1) NOT NULL,
  `idtip_korisnika` int(11) NOT NULL DEFAULT '1',
  `sol` text COLLATE utf8_bin NOT NULL,
  `korime` varchar(45) COLLATE utf8_bin NOT NULL,
  `neuspjesne_prijave` int(11) DEFAULT '0',
  PRIMARY KEY (`idkorisnik`),
  KEY `fk_korisnik_tip_korisnika1_idx` (`idtip_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=52 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idkorisnik`, `lozinka_nekriptirano`, `lozinka`, `ime`, `prezime`, `email`, `adresa`, `status_racun_aktivan`, `aktivacijski_token`, `link_aktiviranje_vrijeme_slanja`, `uvjeti_koristenja_prihvaceni`, `pristup_zakljucan`, `idtip_korisnika`, `sol`, `korime`, `neuspjesne_prijave`) VALUES
(31, '44444', '0b7de4aa45a4c64d62d7787597baa31ce281c151', 'Ana', 'Anićić', 'ananinci@gmail.com', 'Zadarska 66', 0, '7N3S', '2018-06-05 20:20:20', 1, 1, 1, '5d938fba568b475ce0a308cfa93018ee276283cf', 'ananinci', 0),
(32, '44444', '538def87e581059224fc26feafe2be9c21a2a6a1', 'Iva', 'Ivić', 'ivavi@ivavi.ivavi', 'Koprivnica', 1, '6C2O', '2018-06-05 20:41:56', 1, 0, 2, '922d73d99f2801f4976e644b3cdd5ee476039207', 'ivavi', 0),
(33, 'jele00', 'aeb2d863e558698b87cb81258b23c475de0e1482', 'Jelena', 'Blablabić', 'jbabla@foi.hr', 'Hrvatskog sabora 16, 23000 Zadar', 0, '7J7X', '2018-06-06 10:18:49', 1, 0, 1, 'b3604c95b581f0efd4a2a2672e54376218cb1530', 'jblabla', 0),
(34, '00000', '74092e0af96b5a77a84c850b988c726da07b7bb1', 'Jelena', 'Čuka', 'jelenacuka@hotmail.com', 'Zadar', 1, '4X0A', '2018-06-06 14:20:43', 1, 0, 3, 'd546c6c133539c8a73ebb739dfda52b19e0ad51d', 'j0000', 0),
(35, '123456', 'edeb1352e43c3f6929baca53cac419cfdd39c050', 'Jelena', 'Čuka', 'jelcuka@foi.hr', 'Vukovarska 1 c 23 000 Zadar', 0, '2W2T', '2018-06-06 20:57:09', 1, 1, 1, '23ddcffab7ca68f36218be5b40ed57f5adea90a2', 'jelcuka', 0),
(36, '999999', 'da3191ee4604ce8d8475e105c36993698bfb9c87', 'Petar', 'Jadek', 'pjadek@foi.hr', 'Slatina bla bla', 0, '2N8F', '2018-06-06 21:23:07', 1, 0, 2, '0b91554d40a3591d3c945de515f6edf3a71ab7de', 'pjadek', 0),
(37, '888888', '7320069dcb70854c2eb1f78937172bdfab1a83c6', 'Boško', 'Balaban', 'bbalaban@foi.hr', 'Zagreb Splitska 43', 0, '1L7G', '2018-06-06 21:24:58', 1, 0, 3, 'bad5bcd7266bf2ee85ce7ea4df5ee73d8e0b5171', 'bbala', 0),
(38, '111111', '3628725fde348384551525ad82576e6ee98e08ad', 'Mia', 'Šimunić', 'msimuni@foi.hr', 'Koprivnica Koprivnička', 1, '6O0G', '2018-06-06 21:27:11', 1, 0, 2, '0d90390669db8798b4f71c0723ecd6e0070ff8f5', 'msimuni', 0),
(39, 'gaga11', '3c206a926d2053ec8d663669be6904c2917eaecf', 'Petar', 'Jadek', 'pjadek@foi.hr', 'Slatina Slatinska Slovačka', 1, '0T9J', '2018-06-07 18:24:14', 1, 0, 1, '031e79ef5d223cf67b51a0189937ba30b858b35a', 'pjadek2', 0),
(41, '121212', 'e8834704a5e4298b8b49da87afeb3e8abc8a0e1b', 'Ante', 'Perkušić', 'aperkusic@foi.hr', 'Omiš', 0, '6O0P', '2018-06-07 18:48:12', 1, 0, 1, '3be315a21b3293a53cd40a0ec21413583dbc243f', 'aperkusic', 0),
(42, '654321', 'cc0305e581d90ad79b5be132137daa2c4d49701b', 'Ivica', 'Ivičić', 'i.vicic@foi.hr', 'Zagreb', 0, '8M9M', '2018-06-07 18:49:32', 1, 0, 1, '06f15f177dfee4345cafa52add4babf019df587e', 'iivicic', 0),
(43, '1I4I', '75f8256d36681a7cbe2eb14b8ddc7566db4e3066', 'Obični', 'Korisnik', 'jelenacuka@hotmail.com', 'Zadar', 1, '1D3U', '2018-06-07 18:53:05', 1, 0, 1, '916400c58f9f805f21c9963d9c2ff2211883d416', 'o', 0),
(44, 'm', '097c0a26cd3c0aab8a8914c6a74c51688988c5b4', 'Moderatorski', 'Korisnik', 'jelenacuka@hotmail.com', 'Šibenik', 1, '7H1P', '2018-06-07 18:54:01', 1, 0, 2, '679032a7b1cac9b3e29209b6ff8faa59a6cc0442', 'm', 0),
(45, 'a', 'e53c78c9e573007d287038ce77d0c43f397090de', 'Administratorski', 'Korisnik', 'jelenacuka@hotmail.com', 'Vodice', 1, '1F3N', '2018-06-07 18:54:46', 1, 0, 3, 'b6e24a88f6110cfd7e552af9a8ee2fb60d51cac0', 'a', 0),
(48, '6G6R', '742732ccb7469f781bc484a797f7fae848b4a572', 'Ivana', 'Čuka', 'jelenacuka@hotmail.com', 'Zadar 33', 1, '7M0J', '2018-06-14 21:40:58', 1, 1, 1, '113cf3ebc39d2ddee8f6925923fdd10f470b4dd9', 'ivanaMarija', 3),
(49, '88888', 'de72f5ee7c0284b81ec6d7257a034c7741f1c6ed', 'Zorica', 'Šantić', 'jelenacuka@hotmail.com', 'Ivanić Grad', 1, '7K1J', '2018-06-14 22:02:47', 1, 0, 2, '06a9672d0232acb672ea7e104d17e6508da613b5', 'zoraa', 0),
(50, '11111', 'f980fdf7608f374a4729e841749043f4b5ddbcce', 'Dsa', 'DSSA', 'DAS@sjfd.dfssdf', 'ds', 0, '6J6O', '2018-06-15 09:07:07', 1, 0, 1, 'a246ac56b91c4d0552ec55fb6da5e67532dfc01d', 'erwfds', 0),
(51, '2X4W', '2823e62f91ea855a5ec72d03ff0ed97509ae91ac', 'Luka', 'Perković', 'nere@sfamo.com', 'Zagreb', 1, '8Y7P', '2018-06-15 10:21:25', 1, 0, 1, '56787899895664f35dfe58fadaa227f0140a18be', 'user1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_sustava`
--

CREATE TABLE IF NOT EXISTS `log_sustava` (
  `idlog_sustava` int(11) NOT NULL AUTO_INCREMENT,
  `datum_vrijeme` datetime DEFAULT NULL,
  `detalji` text COLLATE utf8_bin,
  `idtip_zapisa` int(11) NOT NULL,
  `idtip_radnje` int(11) NOT NULL,
  `idkorisnik` int(11) DEFAULT NULL,
  PRIMARY KEY (`idlog_sustava`),
  KEY `fk_log_sustava_tip_zapisa1_idx` (`idtip_zapisa`),
  KEY `fk_log_sustava_tip_radnje1_idx` (`idtip_radnje`),
  KEY `fk_log_sustava_korisnik1_idx` (`idkorisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `log_sustava`
--

INSERT INTO `log_sustava` (`idlog_sustava`, `datum_vrijeme`, `detalji`, `idtip_zapisa`, `idtip_radnje`, `idkorisnik`) VALUES
(1, '2018-04-01 00:00:00', 'DETALJI1', 1, 1, NULL),
(2, '2018-04-02 00:00:00', 'detalji neki', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE IF NOT EXISTS `lokacija` (
  `idlokacija` int(11) NOT NULL AUTO_INCREMENT,
  `broj` int(11) DEFAULT NULL,
  `idstranica` int(11) NOT NULL,
  PRIMARY KEY (`idlokacija`,`idstranica`),
  KEY `fk_lokacija_stranica1_idx` (`idstranica`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`idlokacija`, `broj`, `idstranica`) VALUES
(1, 1, 1),
(2, 2, 1),
(4, 3, 1),
(5, 1, 2),
(6, 2, 2),
(7, 3, 2),
(8, 1, 3),
(9, 2, 3),
(10, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `moderatorKategorije`
--

CREATE TABLE IF NOT EXISTS `moderatorKategorije` (
  `idkategorija_predmeta` int(11) NOT NULL,
  `idkorisnik` int(11) NOT NULL,
  PRIMARY KEY (`idkategorija_predmeta`,`idkorisnik`),
  KEY `fk_kategorija_predmeta_has_korisnik_korisnik1_idx` (`idkorisnik`),
  KEY `fk_kategorija_predmeta_has_korisnik_kategorija_predmeta1_idx` (`idkategorija_predmeta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `moderatorKategorije`
--

INSERT INTO `moderatorKategorije` (`idkategorija_predmeta`, `idkorisnik`) VALUES
(1, 31),
(1, 32),
(3, 32),
(21, 32),
(1, 33),
(3, 36),
(4, 36),
(7, 36),
(10, 36),
(11, 36),
(1, 44),
(2, 44),
(3, 44),
(4, 44),
(5, 44),
(1, 49),
(2, 49),
(3, 49),
(4, 49),
(5, 49),
(6, 49),
(7, 49),
(9, 49),
(10, 49),
(11, 49);

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE IF NOT EXISTS `narudzba` (
  `idnarudzba` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(45) COLLATE utf8_bin NOT NULL,
  `adresa` text COLLATE utf8_bin NOT NULL,
  `status_potvrde` tinyint(1) NOT NULL DEFAULT '0',
  `idkorisnik` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnarudzba`),
  KEY `fk_narudzba_korisnik1_idx` (`idkorisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=32 ;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`idnarudzba`, `ime`, `prezime`, `adresa`, `status_potvrde`, `idkorisnik`) VALUES
(16, 'Obicni', 'Korisnik', 'FOI', 1, 43),
(17, 'Miroslav', 'Krleža', 'Nad lipom 35', 1, 43),
(18, 'Miroslav', 'Krleža', 'Nad lipom 35', 0, 43),
(19, 'Anita', 'Marcelić', 'Preko', 0, NULL),
(20, 'O', 'O', 'O', 0, 43),
(21, 'Moderator', 'Moderatorski', 'Addresa Moderatorska', 1, 44),
(22, 'Ivo', 'Andrić', 'Zagreb', 0, 44),
(23, 'Ivo', 'Andrić', 'Zagreb', 0, 44),
(24, 'Boško', 'Balaban', 'Danska', 1, 44),
(25, 'Vlatko', 'Štampar', 'Zagreb', 1, 44),
(26, 'Dragutin', 'Kermek', 'Foi', 0, NULL),
(27, 'Filip', 'Novački', 'Dugo selo', 1, 45),
(28, 'Ružica', 'Posavec', 'SCVZ', 1, NULL),
(29, 'Maja', 'Vračan', 'Varaždin', 0, NULL),
(30, 'Nado', 'Marinić', 'Basel', 1, 32),
(31, 'Ivica', 'Kostelić', 'Zagreb', 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `narudzba_predmet`
--

CREATE TABLE IF NOT EXISTS `narudzba_predmet` (
  `narudzba_idnarudzba` int(11) NOT NULL,
  `predmet_idpredmet` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`narudzba_idnarudzba`,`predmet_idpredmet`),
  KEY `fk_narudzba_has_predmet_predmet1_idx` (`predmet_idpredmet`),
  KEY `fk_narudzba_has_predmet_narudzba1_idx` (`narudzba_idnarudzba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `narudzba_predmet`
--

INSERT INTO `narudzba_predmet` (`narudzba_idnarudzba`, `predmet_idpredmet`, `kolicina`) VALUES
(16, 22, 1),
(16, 47, 3),
(16, 48, 3),
(17, 10, 3),
(17, 11, 1),
(18, 10, 3),
(18, 11, 1),
(19, 20, 3),
(19, 24, 10),
(19, 26, 1),
(20, 32, 5),
(20, 33, 3),
(20, 34, 2),
(21, 5, 4),
(21, 36, 2),
(22, 6, 2),
(22, 11, 1),
(23, 6, 2),
(23, 11, 1),
(24, 17, 2),
(24, 26, 10),
(25, 12, 1),
(25, 22, 3),
(26, 33, 1),
(26, 48, 1),
(27, 14, 1),
(27, 17, 1),
(27, 33, 3),
(27, 34, 1),
(27, 48, 3),
(27, 49, 8),
(28, 4, 2),
(28, 5, 2),
(28, 6, 2),
(28, 49, 2),
(29, 12, 2),
(29, 36, 1),
(30, 49, 1),
(30, 50, 3),
(31, 50, 2),
(31, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

CREATE TABLE IF NOT EXISTS `oglas` (
  `idoglas` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `opis` text COLLATE utf8_bin,
  `url_web_stranica_otvori` text COLLATE utf8_bin,
  `slika` text COLLATE utf8_bin,
  `broj_klikova` int(11) DEFAULT '0',
  `početak_prikazivanja` datetime DEFAULT NULL,
  `kraj_prikazivanja` datetime DEFAULT NULL,
  `status_potvrdenosti` tinyint(1) DEFAULT '0',
  `status_aktivnosti` tinyint(1) DEFAULT '0',
  `idkorisnik` int(11) NOT NULL,
  `vrsta_oglasa_id` int(11) NOT NULL,
  PRIMARY KEY (`idoglas`,`idkorisnik`),
  KEY `fk_oglas_korisnik1_idx` (`idkorisnik`),
  KEY `fk_oglas_vrsta_oglasa1_idx` (`vrsta_oglasa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- Dumping data for table `oglas`
--

INSERT INTO `oglas` (`idoglas`, `naziv`, `opis`, `url_web_stranica_otvori`, `slika`, `broj_klikova`, `početak_prikazivanja`, `kraj_prikazivanja`, `status_potvrdenosti`, `status_aktivnosti`, `idkorisnik`, `vrsta_oglasa_id`) VALUES
(5, 'Najjači oglasi', 'opis', 'http://foi.hr', 'upaljac4.jpg', 0, '2018-06-12 22:00:00', '2018-06-12 23:00:00', 1, 0, 43, 8),
(6, 'Naočale', 'opisa', 'https://www.eyerim.hr/brand/ray-ban/?gclid=CjwKCAjwgYPZBRBoEiwA2XeupVoZHbJaIfuZoJcDCQC3_Ra48NcumAtbAl9KKg8ukWRW9qgsqQvy9hoCoPAQAvD_BwE', 'Rayban2.jpg', 0, '2018-06-15 09:00:00', '2018-06-15 10:00:00', 4, 0, 43, 8),
(7, 'Oglas 44', 'Tra la la ala la reklame', 'https://www.foi.unizg.hr/', 'polaroid2.jpg', 0, '2018-06-15 09:00:00', '2018-06-15 11:00:00', 1, 0, 43, 9),
(8, 'Tra la ala', 'Etop tako idemo dalje ', 'https://gol.dnevnik.hr/clanak/rubrika/nogomet/svjetsko-prvenstvo-2018-raspored-i-rezultati-utakmica---498252.html', 'upaljac1.jpg', 0, '2018-06-14 22:00:00', '2018-06-15 00:00:00', 1, 0, 43, 11),
(9, 'Rarara oglas', 'fdsfds opis jkdfs', 'https://www.eyerim.hr/brand/ray-ban/?gclid=CjwKCAjwgYPZBRBoEiwA2XeupVoZHbJaIfuZoJcDCQC3_Ra48NcumAtbAl9KKg8ukWRW9qgsqQvy9hoCoPAQAvD_BwE', 'neke.jpg', 0, '2018-06-16 22:00:00', '2018-06-17 03:00:00', 1, 0, 43, 13),
(10, 'Novi polaroidi', 'fsdfs kul kul kul', 'https://www.foi.unizg.hr/', 'polaroid3Moderni.jpg', 0, '2018-06-21 08:00:00', '2018-06-21 13:00:00', 1, 0, 43, 13),
(11, 'Maskice', 'fsdfs nemoj razbit mobitel', 'https://www.w3schools.com/php/func_date_date.asp', 'stakloMob2.jpg', 0, '2018-06-15 23:00:00', '2018-06-16 04:00:00', 1, 0, 43, 13),
(12, 'Eto tako upaljač', '  Eto tako upaljač opis  Eto tako upaljač opis  Eto tako upaljač opis ', 'https://login.live.com', 'upaljac2.jpg', 0, '2018-06-16 22:00:00', '2018-06-17 03:00:00', 1, 0, 43, 13),
(13, 'Nez što reći', 'Nez što reći Nez što reći Nez što reći222', 'https://www.smarty.net/forums/viewtopic.php?p=57300', 'satRolex1.jpg', 0, '2018-06-16 16:00:00', '2018-06-16 21:00:00', 4, 0, 43, 13),
(14, 'Tra la ala 2 ', 'Tra la ala 2  Tra la ala 2  Tra la ala 2  OPIS ', 'https://www.w3schools.com/php/func_date_date.asp', 'lampice2.jpg', 0, '2018-06-14 09:00:00', '2018-06-14 14:00:00', 1, 0, 43, 13),
(15, 'Zadar', 'fdsfds', 'https://www.w3schools.com/php/func_date_date.asp', 'retro.jpg', 0, '2018-06-14 13:40:00', '2018-06-14 14:40:00', 4, 0, 43, 8),
(16, 'Varaždin', 'Test', 'https://www.w3schools.com/php/func_date_date.asp', 'maskaIphone2.jpg', 6, '2018-06-14 12:40:00', '2018-06-14 17:40:00', 1, 0, 43, 13),
(17, 'La la la', 'Tdfjsaijfiosda', 'https://www.konzum.hr/?gclid=EAIaIQobChMIlNO91enT2wIVmIbVCh0kIQXtEAAYASAAEgIWlfD_BwE', 'KONZUMvIKENDaKCIJA.jpg', 6, '2018-06-14 20:00:00', '2018-06-15 20:00:00', 1, 0, 32, 7),
(18, 'Tralalalalal oglas', 'Haha webdip', 'https://chrome.google.com/webstore/category/extensions?hl=hr', 'santorini.jpg', 2, '2018-06-14 22:05:00', '2018-06-15 00:05:00', 1, 0, 49, 9),
(19, 'Bla bla', 'dsf', 'https://www.reddit.com/', 'london2.jpg', 3, '2018-06-14 22:25:00', '2018-06-15 01:25:00', 1, 0, 44, 10),
(20, 'Oglas2 ', 'dfsf', 'https://www.spdockit.com/solutions/sharepoint-administration-tool-spdockit/?utm_term=&utm_campaign=SPDocKit+Remarketing&utm_source=adwords&utm_medium=ppc&hsa_net=adwords&hsa_tgt=aud-268543715939&hsa_ad=272449051177&hsa_acc=2353035404&hsa_grp=39345262271&hsa_mt=&hsa_cam=700926941&hsa_kw=&hsa_ver=3&hsa_src=d&gclid=EAIaIQobChMI7fHqtf7T2wIVS0HgCh2Ghwg1EAEYASAAEgLpl_D_BwE', 'kralj lavova.jpg', 0, '2018-06-14 22:25:00', '2018-06-19 02:25:00', 1, 0, 44, 16),
(21, 'Oglas obrana', 'Oglas obrana Oglas obrana Oglas obrana', 'https://www.foi.unizg.hr/', 'Kornati-Islands-Tour_Croatia-Travel-Guide-COVER.jpg', 1, '2018-06-15 10:00:00', '2018-06-16 06:00:00', 1, 0, 32, 17),
(22, 'Oglas 2 obrana', 'fdsadas', 'https://www.foi.unizg.hr/', 'SWAROWSKI.jpg', 0, '2018-06-15 10:00:00', '2018-06-16 06:00:00', 4, 0, 32, 17),
(23, 'Oglas 3brana', 'Oglas 3brana', 'https://www.foi.unizg.hr/', 'NETFLIX.jpg', 0, '2018-06-10 10:00:00', '2018-06-10 11:00:00', 1, 0, 32, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pozicija_oglasa`
--

CREATE TABLE IF NOT EXISTS `pozicija_oglasa` (
  `idpozicija_oglasa` int(11) NOT NULL AUTO_INCREMENT,
  `idlokacija` int(11) NOT NULL,
  `idstranica` int(11) NOT NULL,
  `dimenzija_oglasa_sirina` int(11) DEFAULT NULL,
  `dimenzija_oglasa_visina` int(11) DEFAULT NULL,
  `moderator_pozicije_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpozicija_oglasa`,`idlokacija`,`idstranica`),
  UNIQUE KEY `Ogranicenje_Stranica_lokacija` (`idlokacija`,`idstranica`),
  KEY `fk_pozicija_oglasa_lokacija1_idx` (`idlokacija`,`idstranica`),
  KEY `fk_pozicija_oglasa_korisnik1_idx` (`moderator_pozicije_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pozicija_oglasa`
--

INSERT INTO `pozicija_oglasa` (`idpozicija_oglasa`, `idlokacija`, `idstranica`, `dimenzija_oglasa_sirina`, `dimenzija_oglasa_visina`, `moderator_pozicije_id`) VALUES
(7, 1, 1, 388, 413, 32),
(9, 5, 2, 400, 600, 32),
(10, 2, 1, 386, 384, 36),
(11, 4, 1, 806, 406, 32),
(12, 6, 2, 400, 407, 36),
(14, 7, 2, 813, 524, 38),
(15, 9, 3, 500, 509, 32),
(16, 10, 3, 800, 200, 44),
(17, 8, 3, 800, 812, 38);

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

CREATE TABLE IF NOT EXISTS `predmet` (
  `idpredmet` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin NOT NULL,
  `opis` text COLLATE utf8_bin,
  `cijena` double NOT NULL,
  `idkategorija_predmeta` int(11) NOT NULL,
  PRIMARY KEY (`idpredmet`),
  KEY `fk_predmet_kategorija_predmeta1_idx` (`idkategorija_predmeta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=52 ;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`idpredmet`, `naziv`, `opis`, `cijena`, `idkategorija_predmeta`) VALUES
(1, 'TEST2', 'TESTOP2', 3000.99, 2),
(3, 'Predmet 2', 'Test nema akcije', 500, 3),
(4, 'Samsung maska', 'e', 100, 1),
(5, 'iPhone maska', 'xx', 350, 1),
(6, 'Xaomi maska', 'xx', 50, 1),
(7, 'Xaomi staklo', 'xx', 30, 2),
(8, 'iPhone staklo', 'xx', 300, 2),
(9, 'Samsung staklo', 'xx', 3000, 2),
(10, 'Rolex', 'jako bogati', 100000, 3),
(11, 'Casio', 'kad trebaš sat', 3000, 3),
(12, 'Dron1', 'letimo zajedno', 3000, 4),
(13, 'Canon1', 'najbolji fotoaparati za svakoga', 3000, 5),
(14, 'Canon3', 'malo jeftinija varijanta', 700, 5),
(15, 'Canon2', 'najbolji fotoaparati pro', 12000, 5),
(16, 'Nikon1', 'najbolji fotoaparati za svakoga', 4000, 5),
(17, 'Nikon3', 'malo jeftinija varijanta', 900, 5),
(18, 'Nikon2', 'najbolji fotoaparati pro', 14000, 5),
(19, 'Ray Ban 1', 'svakom stoje ray ban naočale', 1200, 6),
(20, 'Ray Ban 2', 'svakom stoje ray ban naočale2', 3300, 6),
(21, 'Ray Ban 3', 'svakom stoje ray ban naočale3', 1800, 6),
(22, 'Ray Ban 4', 'svakom stoje ray ban naočale4', 2200, 6),
(23, 'Ray Ban 5', 'svakom stoje ray ban naočale5', 1600, 6),
(24, 'Ray Ban 6', 'prejeftino', 200, 6),
(25, 'Sponzorske naočale1', 'budite kul ', 10, 6),
(26, 'Sponzorske naočale2', 'budite kul ', 9, 6),
(27, 'Sponzorske naočale3', 'budite kul ', 5, 6),
(28, 'Sponzorske naočale4', 'budite kul ', 20, 6),
(29, 'Retro 1', 'davno ', 20000, 6),
(30, 'Retro 2', 'davno ', 10000, 6),
(31, 'Harry Potter', 'davno ', 10000, 6),
(32, 'Lampice 1', 'bijele ', 60, 9),
(33, 'Lampice 2', 'žute ', 70, 9),
(34, 'Lampice 3', 'Šarene ', 100, 9),
(35, 'Power bank 1', ' brzo puni ', 80, 10),
(36, 'Power bank 2', ' brzo puni (laž) ', 30, 10),
(47, 'upaljač', ' fancy 1 ', 100, 11),
(48, 'upaljač dva', ' više fancy 2 ', 750, 11),
(49, 'Samsung galaxy 9 zlatna', 'Super', 70, 1),
(50, 'Swatch', 'Švicarski a ne preskupi??', 200, 3),
(51, 'Predmet obrana', 'gfdfgd', 900, 21);

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE IF NOT EXISTS `racun` (
  `idracun` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `vrijeme` time NOT NULL,
  `cijena_ukupno` double NOT NULL,
  `idnarudzba` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idracun`,`idnarudzba`),
  KEY `fk_racun_narudzba1_idx` (`idnarudzba`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `racun`
--

INSERT INTO `racun` (`idracun`, `datum`, `vrijeme`, `cijena_ukupno`, `idnarudzba`) VALUES
(4, '2018-06-13', '14:15:12', 4750, 16),
(5, '2018-06-13', '14:25:53', 303000, 17),
(6, '2018-06-13', '15:21:56', 1890, 24),
(7, '2018-06-13', '15:32:38', 1460, 21),
(8, '2018-06-13', '15:56:04', 4596.8, 27),
(9, '2018-06-14', '20:51:37', 1109.2, 28),
(10, '2018-06-14', '22:19:53', 474.6, 30),
(11, '2018-06-15', '10:44:24', 9600, 25),
(12, '2018-06-15', '10:46:43', 1180, 31);

-- --------------------------------------------------------

--
-- Table structure for table `stranica`
--

CREATE TABLE IF NOT EXISTS `stranica` (
  `idstranica` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idstranica`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stranica`
--

INSERT INTO `stranica` (`idstranica`, `url`) VALUES
(1, 'index.php'),
(2, 'kategorije.php'),
(3, 'narudzba.php');

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE IF NOT EXISTS `tip_korisnika` (
  `idtip_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtip_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`idtip_korisnika`, `naziv`) VALUES
(1, 'Registrirani korisnik'),
(2, 'Moderator'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tip_radnje`
--

CREATE TABLE IF NOT EXISTS `tip_radnje` (
  `idtip_radnje` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtip_radnje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tip_radnje`
--

INSERT INTO `tip_radnje` (`idtip_radnje`, `naziv`) VALUES
(1, 'upit'),
(2, 'radnja'),
(3, 'prijava'),
(4, 'odjava');

-- --------------------------------------------------------

--
-- Table structure for table `tip_zapisa`
--

CREATE TABLE IF NOT EXISTS `tip_zapisa` (
  `idtip_zapisa` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtip_zapisa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tip_zapisa`
--

INSERT INTO `tip_zapisa` (`idtip_zapisa`, `naziv`) VALUES
(1, 'rad sustava'),
(2, 'rad s bazom'),
(3, 'ostale radnje');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_oglasa`
--

CREATE TABLE IF NOT EXISTS `vrsta_oglasa` (
  `idvrsta_oglasa` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `brzina_izmjene_sec` int(11) DEFAULT NULL,
  `duljina_trajanja_prikazivanja_h` int(11) DEFAULT NULL,
  `cijena` double DEFAULT NULL,
  `pozicija_oglasa_id` int(11) NOT NULL,
  `pozicija_oglasa_idlokacija` int(11) NOT NULL,
  `pozicija_oglasa_idstranica` int(11) NOT NULL,
  PRIMARY KEY (`idvrsta_oglasa`),
  KEY `fk_vrsta_oglasa_pozicija_oglasa1_idx` (`pozicija_oglasa_id`,`pozicija_oglasa_idlokacija`,`pozicija_oglasa_idstranica`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Dumping data for table `vrsta_oglasa`
--

INSERT INTO `vrsta_oglasa` (`idvrsta_oglasa`, `naziv`, `brzina_izmjene_sec`, `duljina_trajanja_prikazivanja_h`, `cijena`, `pozicija_oglasa_id`, `pozicija_oglasa_idlokacija`, `pozicija_oglasa_idstranica`) VALUES
(6, 'Mali oglas', 5, 1, 200, 7, 1, 1),
(7, 'ultra brzi oglas 1 dan', 2, 24, 310.5, 7, 1, 1),
(8, 'Jednokratni oglas', 5, 1, 30.99, 7, 1, 1),
(9, 'VRSTA X1', 10, 2, 40.99, 9, 5, 2),
(10, 'VRSTA X3', 3, 3, 60, 9, 5, 2),
(11, 'VRSTA HOHO', 15, 2, 80, 11, 4, 1),
(12, 'VRSTA 10S', 10, 20, 70, 15, 9, 3),
(13, 'VRSTA 30S', 30, 5, 120, 15, 9, 3),
(14, 'VRSTA 20S 2H', 20, 2, 220, 9, 5, 2),
(15, 'VRSTA 4H 7S', 7, 4, 399, 9, 5, 2),
(16, 'Dugo dugo traje', 10, 100, 10000, 7, 1, 1),
(17, 'Obrana', 5, 20, 500, 11, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zahtjev_za_blokiranje_oglasa`
--

CREATE TABLE IF NOT EXISTS `zahtjev_za_blokiranje_oglasa` (
  `id_zahtjev` int(11) NOT NULL AUTO_INCREMENT,
  `idkorisnik` int(11) NOT NULL,
  `idoglas` int(11) NOT NULL,
  `oglas_idkorisnik` int(11) NOT NULL,
  `razlog` text COLLATE utf8_bin NOT NULL,
  `status_zahtjeva` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_zahtjev`,`oglas_idkorisnik`,`idoglas`,`idkorisnik`),
  KEY `fk_korisnik_has_oglas_oglas1_idx` (`idoglas`,`oglas_idkorisnik`),
  KEY `fk_korisnik_has_oglas_korisnik1_idx` (`idkorisnik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akcija`
--
ALTER TABLE `akcija`
  ADD CONSTRAINT `akcija_ibfk_1` FOREIGN KEY (`idpredmet`) REFERENCES `predmet` (`idpredmet`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_tip_korisnika1` FOREIGN KEY (`idtip_korisnika`) REFERENCES `tip_korisnika` (`idtip_korisnika`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `log_sustava`
--
ALTER TABLE `log_sustava`
  ADD CONSTRAINT `fk_log_sustava_korisnik1` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_sustava_tip_radnje1` FOREIGN KEY (`idtip_radnje`) REFERENCES `tip_radnje` (`idtip_radnje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_sustava_tip_zapisa1` FOREIGN KEY (`idtip_zapisa`) REFERENCES `tip_zapisa` (`idtip_zapisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD CONSTRAINT `fk_lokacija_stranica1` FOREIGN KEY (`idstranica`) REFERENCES `stranica` (`idstranica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `moderatorKategorije`
--
ALTER TABLE `moderatorKategorije`
  ADD CONSTRAINT `fk_kategorija_predmeta_has_korisnik_kategorija_predmeta1` FOREIGN KEY (`idkategorija_predmeta`) REFERENCES `kategorija_predmeta` (`idkategorija_predmeta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategorija_predmeta_has_korisnik_korisnik1` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `fk_narudzba_korisnik1` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `narudzba_predmet`
--
ALTER TABLE `narudzba_predmet`
  ADD CONSTRAINT `fk_narudzba_has_predmet_narudzba1` FOREIGN KEY (`narudzba_idnarudzba`) REFERENCES `narudzba` (`idnarudzba`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_narudzba_has_predmet_predmet1` FOREIGN KEY (`predmet_idpredmet`) REFERENCES `predmet` (`idpredmet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `oglas`
--
ALTER TABLE `oglas`
  ADD CONSTRAINT `fk_oglas_korisnik1` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_oglas_vrsta_oglasa1` FOREIGN KEY (`vrsta_oglasa_id`) REFERENCES `vrsta_oglasa` (`idvrsta_oglasa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pozicija_oglasa`
--
ALTER TABLE `pozicija_oglasa`
  ADD CONSTRAINT `fk_pozicija_oglasa_lokacija1` FOREIGN KEY (`idlokacija`, `idstranica`) REFERENCES `lokacija` (`idlokacija`, `idstranica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pozicija_oglasa_korisnik1` FOREIGN KEY (`moderator_pozicije_id`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `predmet`
--
ALTER TABLE `predmet`
  ADD CONSTRAINT `fk_predmet_kategorija_predmeta1` FOREIGN KEY (`idkategorija_predmeta`) REFERENCES `kategorija_predmeta` (`idkategorija_predmeta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `racun`
--
ALTER TABLE `racun`
  ADD CONSTRAINT `fk_racun_narudzba1` FOREIGN KEY (`idnarudzba`) REFERENCES `narudzba` (`idnarudzba`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vrsta_oglasa`
--
ALTER TABLE `vrsta_oglasa`
  ADD CONSTRAINT `fk_vrsta_oglasa_pozicija_oglasa1` FOREIGN KEY (`pozicija_oglasa_id`, `pozicija_oglasa_idlokacija`, `pozicija_oglasa_idstranica`) REFERENCES `pozicija_oglasa` (`idpozicija_oglasa`, `idlokacija`, `idstranica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zahtjev_za_blokiranje_oglasa`
--
ALTER TABLE `zahtjev_za_blokiranje_oglasa`
  ADD CONSTRAINT `fk_korisnik_has_oglas_korisnik1` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_oglas_oglas1` FOREIGN KEY (`idoglas`, `oglas_idkorisnik`) REFERENCES `oglas` (`idoglas`, `idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
