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
-- Table `mydb`.`Items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Items` (
  `item_id` INT NOT NULL AUTO_INCREMENT,
  `type_id` INT NOT NULL,
  `date_found` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location_found` VARCHAR(100) NULL,
  `description` VARCHAR(500) NULL,
  `contacted_owner` TINYINT(1) NOT NULL DEFAULT 0,
  `inventory_location` VARCHAR(45) NULL,
  `address` VARCHAR(100) NULL,
  `phone` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `officer` VARCHAR(45) NULL,
  `report_number` VARCHAR(45) NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_Items_Item_Types_idx` (`type_id` ASC),
  CONSTRAINT `fk_Items_Item_Types`
    FOREIGN KEY (`type_id`)
    REFERENCES `mydb`.`Item_Types` (`type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
