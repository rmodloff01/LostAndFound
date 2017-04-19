-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema lostfound
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lostfound
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lostfound` DEFAULT CHARACTER SET utf8 ;
USE `lostfound` ;
drop table IF EXISTS `lostfound`.`items`;
drop table IF EXISTS `lostfound`.`item_types`;

-- -----------------------------------------------------
-- Table `lostfound`.`item_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lostfound`.`item_types` (
  `type_id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lostfound`.`items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lostfound`.`items` (
  `item_id` INT NOT NULL AUTO_INCREMENT,
  `type_id` INT NOT NULL,
  `date_found` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location_found` VARCHAR(100) NULL,
  `description` VARCHAR(500) NULL,
  `collected_by` VARCHAR(50) NULL,
  `owner_info` VARCHAR(500) NULL,
  `inventory_location` VARCHAR(45) NULL,
  `officer` VARCHAR(45) NULL,
  `report_number` VARCHAR(45) NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_Items_Item_Types_idx` (`type_id` ASC),
  CONSTRAINT `fk_Items_Item_Types`
    FOREIGN KEY (`type_id`)
    REFERENCES `lostfound`.`item_types` (`type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


insert into item_types (type) values('Keys');
insert into item_types (type) values('Wallet');
insert into item_types (type) values('Cell Phone');
insert into item_types (type) values('Laptop/Tablet');
insert into item_types (type) values('AU ID - Official Gov ID Card');
insert into item_types (type) values('Flash Drive');
insert into item_types (type) values('Textbook');
insert into item_types (type) values('Clothing');
insert into item_types (type) values('Bags - Purses/Backpack');
insert into item_types (type) values('Debit/Credit Card');
insert into item_types (type) values('Glasses');
insert into item_types (type) values('Jewelry');
insert into item_types (type) values('Charger');
insert into item_types (type) values('Headphones');
insert into item_types (type) values('Notebook/Binder');
insert into item_types (type) values('Other');
