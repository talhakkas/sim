-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 20 Eylül 2011 saat 03:04:20
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

-- -----------------------------------------------------
-- Table `sim`.`discipline`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`discipline` ;

CREATE  TABLE IF NOT EXISTS `sim`.`discipline` (
  `discipline_id` INT(2) zerofill NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`discipline_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`parent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`parent` ;

CREATE  TABLE IF NOT EXISTS `sim`.`parent` (
  `parent_id` INT(4) zerofill NOT NULL AUTO_INCREMENT ,
  `discipline_id` INT NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`parent_id`) ,
  INDEX `discipline_id` (`discipline_id` ASC) ,
  CONSTRAINT `discipline_id`
    FOREIGN KEY (`discipline_id` )
    REFERENCES `sim`.`discipline` (`discipline_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

/*
CREATE  TABLE IF NOT EXISTS `sim`.`parent` (
  `parent_id` INT NOT NULL AUTO_INCREMENT ,
  `discipline_id` INT NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`parent_id`) ,
  INDEX `discipline_id` (`discipline_id` ASC) ,
  CONSTRAINT `discipline_id`
    FOREIGN KEY (`discipline_id` )
    REFERENCES `sim`.`discipline` (`discipline_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;




-- -----------------------------------------------------
-- Table `sim`.`d_survey`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`d_survey` ;

CREATE  TABLE IF NOT EXISTS `sim`.`d_survey` (
  `d_survey_id` INT(6) zerofill NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `type` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `value` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`d_survey_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


