DROP SCHEMA IF EXISTS BoutiqueCulturelle;
CREATE SCHEMA BoutiqueCulturelle DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE BoutiqueCulturelle ;

GRANT ALL PRIVILEGES ON BoutiqueCulturelle.* TO Ciceron@localhost IDENTIFIED BY '106AVJC';

-- -----------------------------------------------------
-- Table boutiqueculturelle.Utilisateur
-- -----------------------------------------------------
CREATE TABLE Utilisateur (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(45) NOT NULL,
  prenom VARCHAR(45) NOT NULL,
  rue VARCHAR(45) NOT NULL,
  cp CHAR(5) NOT NULL,
  ville VARCHAR(45) NOT NULL,
  courriel VARCHAR(255) NOT NULL,
  motDePasse VARCHAR(45) NOT NULL,
  admin BOOLEAN NULL ,
  PRIMARY KEY(id) 
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table boutiqueculturelle.Commande
-- -----------------------------------------------------
CREATE TABLE Commande (
  id INT NOT NULL AUTO_INCREMENT,
  date DATE NOT NULL,
  idUtilisateur INT NOT NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table boutiqueculturelle.Facture
-- -----------------------------------------------------
CREATE TABLE Facture (
  id INT NOT NULL AUTO_INCREMENT,
  date DATE NOT NULL,
  montant DECIMAL NOT NULL,
  idCommande INT NOT NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table boutiqueculturelle.Categorie
-- -----------------------------------------------------
CREATE TABLE Categorie (
  id INT NOT NULL,
  nom VARCHAR(45) NOT NULL,
  PRIMARY KEY(id) 
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table boutiqueculturelle.Produit
-- -----------------------------------------------------
CREATE TABLE Produit (
  id INT NOT NULL AUTO_INCREMENT,
  idCategorie INT NOT NULL,
  prixHT DECIMAL(5,2) NOT NULL,
  image VARCHAR(45) NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table boutiqueculturelle.Livre
-- -----------------------------------------------------
CREATE TABLE Livre (
  id INT NOT NULL,
  genre VARCHAR(45) NOT NULL,
  nom VARCHAR(45) NOT NULL,
  auteur VARCHAR(45) NOT NULL,
  dateParution DATE NOT NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table boutiqueculturelle.Disque
-- -----------------------------------------------------
CREATE TABLE Disque (
  id INT NOT NULL,
  genre VARCHAR(45) NOT NULL,
  nom VARCHAR(45) NOT NULL,
  compositeur VARCHAR(45) NOT NULL,
  anneeProduction DATE NOT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table boutiqueculturelle.Film
-- -----------------------------------------------------
CREATE TABLE Film (
  id INT NOT NULL,
  nom VARCHAR(45) NOT NULL,
  genre VARCHAR(45) NOT NULL,
  realisateur VARCHAR(45) NOT NULL,
  anneeProduction DATE NOT NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table boutiqueculturelle.Pack
-- -----------------------------------------------------
CREATE TABLE Pack (
  id INT NOT NULL,
  idLivre INT NULL,
  idDisque INT NULL,
  idFilm INT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table boutiqueculturelle.Commande_Produit
-- -----------------------------------------------------
CREATE TABLE Commande_Produit (
  idCommande INT NOT NULL,
  idProduit INT NOT NULL,
  quantite INT NULL,
  PRIMARY KEY(idCommande, idProduit)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Clefs étrangères
-- -----------------------------------------------------
ALTER TABLE Commande
  ADD FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Facture
  ADD FOREIGN KEY(idCommande) REFERENCES Commande(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Produit
  ADD FOREIGN KEY(idCategorie) REFERENCES Categorie(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Livre
  ADD FOREIGN KEY(id) REFERENCES Produit(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Disque
  ADD FOREIGN KEY (id) REFERENCES Produit(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Film
  ADD FOREIGN KEY (id) REFERENCES Produit(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Pack
  ADD FOREIGN KEY (idDisque) REFERENCES Disque(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
  ,
  ADD FOREIGN KEY (idLivre) REFERENCES Livre(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
  ,
  ADD FOREIGN KEY (idFilm) REFERENCES Film(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
  ,
  ADD FOREIGN KEY (id) REFERENCES Produit(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Commande_Produit
  ADD FOREIGN KEY(idCommande) REFERENCES Commande(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
  ,
  ADD FOREIGN KEY (idProduit) REFERENCES Produit(id)
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;

-- -----------------------------------------------------
-- Remplissage table Categorie
-- -----------------------------------------------------
INSERT INTO Categorie VALUES(1, 'Disque');
INSERT INTO Categorie VALUES(2, 'Film');
INSERT INTO Categorie VALUES(3, 'Livre');
INSERT INTO Categorie VALUES(4, 'Pack');