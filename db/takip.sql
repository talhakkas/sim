-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Ağustos 2011 saat 07:22:16
-- Sunucu sürümü: 5.1.49
-- PHP Sürümü: 5.3.3-7+squeeze1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takip`
--

DROP TABLE IF EXISTS `takip`;
CREATE TABLE IF NOT EXISTS `takip` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nodes` varchar(50) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Tablo döküm verisi `takip`
--

INSERT INTO `takip` (`tid`, `nodes`) VALUES
(22, '1 , 2 , 2 , 2 , 2 , 2'),
(21, '1'),
(20, '1 , 1 , 1 , 1'),
(19, '1 , 1 , 1'),
(18, '1 , 2 , 3 , 2 , 4');
