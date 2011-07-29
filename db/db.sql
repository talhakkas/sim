SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `sim` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sim` ;

-- -----------------------------------------------------
-- Table `sim`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`admin` ;

CREATE  TABLE IF NOT EXISTS `sim`.`admin` (
  `username` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `password` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `surname` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `super` INT(1) NOT NULL ,
  `photo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`username`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`tutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`tutor` ;

CREATE  TABLE IF NOT EXISTS `sim`.`tutor` (
  `tc` INT(12) NOT NULL ,
  `username` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `password` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `photo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`tc`, `username`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '\n';


-- -----------------------------------------------------
-- Table `sim`.`announcement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`announcement` ;

CREATE  TABLE IF NOT EXISTS `sim`.`announcement` (
  `announcement_id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `content` VARCHAR(500) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `url` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`announcement_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`student` ;

CREATE  TABLE IF NOT EXISTS `sim`.`student` (
  `no` INT(8) NOT NULL ,
  `username` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `password` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `surname` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `photo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `class` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`no`, `username`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`story`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`story` ;

CREATE  TABLE IF NOT EXISTS `sim`.`story` (
  `story_id` INT NOT NULL AUTO_INCREMENT ,
  `topic` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `content` VARCHAR(800) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `photo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`story_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`patient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`patient` ;

CREATE  TABLE IF NOT EXISTS `sim`.`patient` (
  `patient_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `surname` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `age` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `gender` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`patient_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`discipline`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`discipline` ;

CREATE  TABLE IF NOT EXISTS `sim`.`discipline` (
  `discipline_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `type` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `value` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`discipline_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`parent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`parent` ;

CREATE  TABLE IF NOT EXISTS `sim`.`parent` (
  `parent_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `discipline_id` INT NOT NULL ,
  `type` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `value` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
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
  `d_survey_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `parent_id` INT NOT NULL ,
  `value` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`d_survey_id`) ,
  INDEX `d_survey_id` (`parent_id` ASC) ,
  CONSTRAINT `d_survey_id`
    FOREIGN KEY (`parent_id` )
    REFERENCES `sim`.`parent` (`parent_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`event` ;

CREATE  TABLE IF NOT EXISTS `sim`.`event` (
  `event_id` INT NOT NULL AUTO_INCREMENT ,
  `patient_id` INT NOT NULL ,
  `story_id` INT NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `surveys` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `results` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`event_id`) ,
  INDEX `patient_id` (`patient_id` ASC) ,
  INDEX `story_id` (`story_id` ASC) ,
  CONSTRAINT `patient_id`
    FOREIGN KEY (`patient_id` )
    REFERENCES `sim`.`patient` (`patient_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `story_id`
    FOREIGN KEY (`story_id` )
    REFERENCES `sim`.`story` (`story_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sim`.`result`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sim`.`result` ;

CREATE  TABLE IF NOT EXISTS `sim`.`result` (
  `result_id` INT NOT NULL ,
  `no` INT(8) NOT NULL ,
  `event_id` INT NOT NULL ,
  `date` DATE NOT NULL ,
  `time` TIME NOT NULL ,
  `results` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `comment` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`result_id`) ,
  INDEX `event_id` (`event_id` ASC) ,
  INDEX `no` (`no` ASC) ,
  CONSTRAINT `event_id`
    FOREIGN KEY (`event_id` )
    REFERENCES `sim`.`event` (`event_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `no`
    FOREIGN KEY (`no` )
    REFERENCES `sim`.`student` (`no` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
