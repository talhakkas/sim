-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 15 Eylül 2011 saat 17:31:20
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
-- Tablo için tablo yapısı `ncase`
--

DROP TABLE IF EXISTS `ncase`;
CREATE TABLE IF NOT EXISTS `ncase` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `type_playable_by` int(11) NOT NULL,
  `type_navigation_panel` int(11) NOT NULL,
  `patient_info` int(11) NOT NULL,
  `edu_opts` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `bdugumu` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `ncase`
--

INSERT INTO `ncase` (`cid`, `title`, `description`, `type_playable_by`, `type_navigation_panel`, `patient_info`, `edu_opts`, `other`, `bdugumu`) VALUES
(1, 'Çiçek Serası Çalışanı merdivenden düştü', 'TODO', 0, 0, 0, 0, 0, 1);
