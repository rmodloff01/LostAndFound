-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Item_Types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Item_Types` (
  `type_id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Collection`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Collection` (
  `collection_id` INT NOT NULL AUTO_INCREMENT,
  `legal_name` VARCHAR(45) NOT NULL,
  `date_collected` DATETIME NOT NULL,
  PRIMARY KEY (`collection_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Items` (
  `item_id` INT NOT NULL AUTO_INCREMENT,
  `type_id` INT NOT NULL,
  `collection_id` INT NULL,
  `description` VARCHAR(500) NULL,
  `date_found` DATETIME NOT NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_Items_Item_Types_idx` (`type_id` ASC),
  INDEX `fk_Items_Collection1_idx` (`collection_id` ASC),
  CONSTRAINT `fk_Items_Item_Types`
    FOREIGN KEY (`type_id`)
    REFERENCES `mydb`.`Item_Types` (`type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Items_Collection1`
    FOREIGN KEY (`collection_id`)
    REFERENCES `mydb`.`Collection` (`collection_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
