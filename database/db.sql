-- MySQL Script generated by MySQL Workbench
-- Tue Aug 14 13:18:14 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema waterworks
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema waterworks
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `waterworks` DEFAULT CHARACTER SET utf8 ;
USE `waterworks` ;

-- -----------------------------------------------------
-- Table `waterworks`.`Client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waterworks`.`Client` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `accountNumber` VARCHAR(45) NULL,
  `meterSerialNumber` VARCHAR(45) NULL,
  `firstName` VARCHAR(45) NULL,
  `lastName` VARCHAR(45) NULL,
  `middleInitial` VARCHAR(45) NULL,
  `mobileNumber` VARCHAR(45) NULL,
  `rateClass` VARCHAR(45) NULL,
  `businessArea` VARCHAR(45) NULL,
  `streetAddress` VARCHAR(45) NULL,
  `barangay` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `postalCode` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `accountNumber_UNIQUE` (`accountNumber` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waterworks`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waterworks`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `middleInitial` VARCHAR(45) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `waterworks`.`BillingRate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waterworks`.`BillingRate` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `rate` FLOAT NULL,
  `created_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waterworks`.`Employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waterworks`.`Employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(45) NULL,
  `lastName` VARCHAR(45) NULL,
  `area` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waterworks`.`MeterReading`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waterworks`.`MeterReading` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Accountant_id` INT NOT NULL,
  `Client_id` INT NOT NULL,
  `Employee_id` INT NOT NULL,
  `waterUsage` BIGINT NULL,
  `created_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_WaterReading_Worker1_idx` (`Employee_id` ASC),
  INDEX `fk_WaterReading_Customer1_idx` (`Client_id` ASC),
  INDEX `fk_WaterReading_Admin1_idx` (`Accountant_id` ASC),
  CONSTRAINT `fk_WaterReading_Worker1`
    FOREIGN KEY (`Employee_id`)
    REFERENCES `waterworks`.`Employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_WaterReading_Customer1`
    FOREIGN KEY (`Client_id`)
    REFERENCES `waterworks`.`Client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_WaterReading_Admin1`
    FOREIGN KEY (`Accountant_id`)
    REFERENCES `waterworks`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waterworks`.`Collection`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waterworks`.`Collection` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Teller_id` INT NOT NULL,
  `Client_id` INT NOT NULL,
  `BillingRate_id` INT NOT NULL,
  `MeterReading_id` INT NOT NULL,
  `totalAmount` DOUBLE NULL,
  `created_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `dueDate` DATE NULL,
  `isPaid` TINYINT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Collection_Customer_idx` (`Client_id` ASC),
  INDEX `fk_Collection_User1_idx` (`Teller_id` ASC),
  INDEX `fk_Collection_BillingRate1_idx` (`BillingRate_id` ASC),
  INDEX `fk_Collection_WaterReading1_idx` (`MeterReading_id` ASC),
  CONSTRAINT `fk_Collection_Customer`
    FOREIGN KEY (`Client_id`)
    REFERENCES `waterworks`.`Client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Collection_User1`
    FOREIGN KEY (`Teller_id`)
    REFERENCES `waterworks`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Collection_BillingRate1`
    FOREIGN KEY (`BillingRate_id`)
    REFERENCES `waterworks`.`BillingRate` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Collection_WaterReading1`
    FOREIGN KEY (`MeterReading_id`)
    REFERENCES `waterworks`.`MeterReading` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waterworks`.`Report`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waterworks`.`Report` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Client_id` INT NOT NULL,
  `Collection_id` INT NOT NULL,
  `created_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_SMSNotification_Customer1_idx` (`Client_id` ASC),
  INDEX `fk_SMSNotification_Collection1_idx` (`Collection_id` ASC),
  CONSTRAINT `fk_SMSNotification_Customer1`
    FOREIGN KEY (`Client_id`)
    REFERENCES `waterworks`.`Client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMSNotification_Collection1`
    FOREIGN KEY (`Collection_id`)
    REFERENCES `waterworks`.`Collection` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
waterworks