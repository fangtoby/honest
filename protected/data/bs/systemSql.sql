SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `blogsystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `blogsystem` ;

-- -----------------------------------------------------
-- Table `blogsystem`.`level`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogsystem`.`level` (
  `lid` INT(11) NOT NULL ,
  `level` INT(11) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `creater` INT(11) NOT NULL ,
  `createTime` DATETIME NOT NULL ,
  `updateTime` DATETIME NOT NULL ,
  `geterCount` INT(11) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`lid`) ,
  UNIQUE INDEX `level_UNIQUE` (`level` ASC) ,
  UNIQUE INDEX `lid_UNIQUE` (`lid` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogsystem`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogsystem`.`users` (
  `uid` INT(11) NOT NULL AUTO_INCREMENT ,
  `image` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL DEFAULT 'default' ,
  `username` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(200) NOT NULL ,
  `gender` INT(11) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `level` INT(11) NOT NULL DEFAULT 1 ,
  `status` INT(11) NOT NULL DEFAULT 1 ,
  `lastLoginTime` DATETIME NOT NULL ,
  `loginFrequency` INT(11) NOT NULL DEFAULT 0 ,
  `createTime` DATETIME NOT NULL ,
  `updateTime` VARCHAR(45) NOT NULL ,
  `friendsNumber` INT(11) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`uid`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogsystem`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogsystem`.`category` (
  `caid` INT(11) NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  `creater` INT(11) NOT NULL ,
  `description` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `status` INT(11) NOT NULL DEFAULT 1 ,
  `createTime` DATETIME NOT NULL ,
  `updateTime` DATETIME NOT NULL ,
  PRIMARY KEY (`caid`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogsystem`.`daily`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogsystem`.`daily` (
  `did` INT(11) NOT NULL AUTO_INCREMENT ,
  `uid` INT(11) NOT NULL ,
  `dailyTitle` VARCHAR(45) NOT NULL ,
  `dailyContent` LONGTEXT NOT NULL ,
  `category` INT(11) NOT NULL ,
  `status` INT(11) NOT NULL DEFAULT 1 ,
  `good` INT(11) NOT NULL DEFAULT 0 ,
  `bad` INT(11) NOT NULL DEFAULT 0 ,
  `commentCount` INT(11) NOT NULL DEFAULT 0 ,
  `updateTime` DATETIME NOT NULL ,
  `createTime` DATETIME NOT NULL ,
  PRIMARY KEY (`did`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogsystem`.`comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogsystem`.`comment` (
  `cid` INT(11) NOT NULL AUTO_INCREMENT ,
  `did` INT(11) NOT NULL ,
  `uid` INT(11) NOT NULL ,
  `content` TEXT NOT NULL ,
  `good` INT(11) NOT NULL DEFAULT 0 ,
  `bad` INT(11) NOT NULL DEFAULT 0 ,
  `createTime` DATETIME NOT NULL ,
  `updateTime` DATETIME NOT NULL ,
  `status` INT(11) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`cid`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogsystem`.`message`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogsystem`.`message` (
  `mid` INT(11) NOT NULL ,
  `accept` INT(11) NOT NULL ,
  `sender` INT(11) NOT NULL ,
  `content` VARCHAR(200) NOT NULL ,
  `reply` INT(11) NOT NULL DEFAULT 0 ,
  `createTime` DATETIME NOT NULL ,
  `updateTime` DATETIME NOT NULL ,
  `status` INT(11) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`mid`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogsystem`.`relation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogsystem`.`relation` (
  `rid` INT(11) NOT NULL ,
  `sender` INT(11) NOT NULL ,
  `accepter` INT(11) NOT NULL ,
  `status` INT(11) NOT NULL DEFAULT 1 ,
  `createTime` DATETIME NOT NULL ,
  `updateTime` DATETIME NOT NULL ,
  PRIMARY KEY (`rid`) )
ENGINE = InnoDB;

USE `blogsystem` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
