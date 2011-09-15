-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 15 Eylül 2011 saat 17:31:06
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
  `nodes` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `response` varchar(1250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Tablo döküm verisi `takip`
--

