-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `etiket`;
CREATE TABLE `etiket` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` int(11) DEFAULT NULL,
  `ustKategoriID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ustKategoriID` (`ustKategoriID`),
  CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`ustKategoriID`) REFERENCES `ustKategori` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `makale`;
CREATE TABLE `makale` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ozet` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `icerik` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenmeZamani` datetime DEFAULT NULL,
  `guncellenmeZamani` datetime DEFAULT NULL,
  `aktif` bit(1) DEFAULT NULL,
  `kategoriID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `kategoriID` (`kategoriID`),
  CONSTRAINT `makale_ibfk_1` FOREIGN KEY (`kategoriID`) REFERENCES `kategori` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `makaleEtiket`;
CREATE TABLE `makaleEtiket` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `makaleID` int(11) DEFAULT NULL,
  `etiketID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `makaleMovie`;
CREATE TABLE `makaleMovie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `makaleID` int(11) DEFAULT NULL,
  `movieEmbededCode` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `movieUrl` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `makalePuan`;
CREATE TABLE `makalePuan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `makaleID` int(11) DEFAULT NULL,
  `puan` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `makaleYorum`;
CREATE TABLE `makaleYorum` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `makaleID` int(11) DEFAULT NULL,
  `yorumYapanAdSoyad` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorumYapanEPosta` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorum` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aktif` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `makaleID` (`makaleID`),
  CONSTRAINT `makaleYorum_ibfk_1` FOREIGN KEY (`makaleID`) REFERENCES `makale` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `ustKategori`;
CREATE TABLE `ustKategori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE `uyeler` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ePosta` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tamAdi` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `parola` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenmeZamani` datetime DEFAULT NULL,
  `aktif` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `yazar`;
CREATE TABLE `yazar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `uyelerID` int(11) DEFAULT NULL,
  `aktif` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `uyelerID` (`uyelerID`),
  CONSTRAINT `yazar_ibfk_1` FOREIGN KEY (`uyelerID`) REFERENCES `uyeler` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


-- 2020-04-07 14:18:48
