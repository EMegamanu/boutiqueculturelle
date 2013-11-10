SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `boutiqueculturelle` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `boutiqueculturelle` ;

-- -----------------------------------------------------
-- Table `boutiqueculturelle`.`Client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutiqueculturelle`.`Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `Nom Client` TEXT NOT NULL,
  `Prénom Client` TEXT NOT NULL,
  `Rue Client` TEXT NOT NULL,
  `Code postal client` INT NOT NULL,
  `Ville` TEXT NOT NULL,
  `Courriel` TEXT NOT NULL,
  `Mot de passe` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idClient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutiqueculturelle`.`Commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutiqueculturelle`.`Commande` (
  `idCommande` INT NOT NULL AUTO_INCREMENT,
  `Date commande` DATE NOT NULL,
  PRIMARY KEY (`idCommande`),
  CONSTRAINT `idClient`
    FOREIGN KEY (`idCommande`)
    REFERENCES `boutiqueculturelle`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutiqueculturelle`.`Facture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutiqueculturelle`.`Facture` (
  `idFacture` INT NOT NULL AUTO_INCREMENT,
  `Date facture` DATE NOT NULL,
  `Montant facture` DECIMAL NOT NULL,
  PRIMARY KEY (`idFacture`),
  CONSTRAINT `idCommande`
    FOREIGN KEY (`idFacture`)
    REFERENCES `boutiqueculturelle`.`Commande` (`idCommande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutiqueculturelle`.`Livre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutiqueculturelle`.`Livre` (
  `idLivre` INT NOT NULL AUTO_INCREMENT,
  `Genre Livre` VARCHAR(45) NOT NULL,
  `Prix TTC` DECIMAL NOT NULL,
  `Nom Livre` VARCHAR(45) NOT NULL,
  `Auteur Livre` VARCHAR(45) NOT NULL,
  `Date parution` DATE NOT NULL,
  PRIMARY KEY (`idLivre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutiqueculturelle`.`CD`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutiqueculturelle`.`CD` (
  `idCD` INT NOT NULL,
  `Genre CD` VARCHAR(45) NOT NULL,
  `Nom CD` VARCHAR(45) NOT NULL,
  `Compositeur CD` VARCHAR(45) NOT NULL,
  `Année de production` DATE NOT NULL,
  `Prix CD` DECIMAL NOT NULL,
  PRIMARY KEY (`idCD`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutiqueculturelle`.`Film`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutiqueculturelle`.`Film` (
  `idFilm` INT NOT NULL,
  `Nom Film` VARCHAR(45) NOT NULL,
  `Genre Film` VARCHAR(45) NOT NULL,
  `Prix TTC` DECIMAL NOT NULL,
  `Réalisateur Film` VARCHAR(45) NOT NULL,
  `Date production Film` DATE NOT NULL,
  PRIMARY KEY (`idFilm`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutiqueculturelle`.`PACK`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutiqueculturelle`.`PACK` (
  `idPACK` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idPACK`),
  CONSTRAINT `idCD`
    FOREIGN KEY (`idPACK`)
    REFERENCES `boutiqueculturelle`.`CD` (`idCD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idLivre`
    FOREIGN KEY (`idPACK`)
    REFERENCES `boutiqueculturelle`.`Livre` (`idLivre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idFilm`
    FOREIGN KEY (`idPACK`)
    REFERENCES `boutiqueculturelle`.`Film` (`idFilm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
