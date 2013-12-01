DROP SCHEMA IF EXISTS BoutiqueCulturelle;
CREATE SCHEMA BoutiqueCulturelle DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
  date DATETIME NOT NULL,
  idUtilisateur INT NOT NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table boutiqueculturelle.Facture
-- -----------------------------------------------------
CREATE TABLE Facture (
  id INT NOT NULL AUTO_INCREMENT,
  date DATETIME NOT NULL,
  montant DOUBLE NOT NULL,
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
  nom VARCHAR(45) NOT NULL,
  idCategorie INT NOT NULL,
  prixHT DOUBLE NOT NULL,
  image VARCHAR(45) NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table boutiqueculturelle.Livre
-- -----------------------------------------------------
CREATE TABLE Livre (
  id INT NOT NULL,
  genre VARCHAR(45) NOT NULL,
  auteur VARCHAR(45) NOT NULL,
  dateParution INT NOT NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table boutiqueculturelle.Disque
-- -----------------------------------------------------
CREATE TABLE Disque (
  id INT NOT NULL,
  genre VARCHAR(45) NOT NULL,
  compositeur VARCHAR(45) NOT NULL,
  anneeProduction INT NOT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table boutiqueculturelle.Film
-- -----------------------------------------------------
CREATE TABLE Film (
  id INT NOT NULL,
  genre VARCHAR(45) NOT NULL,
  realisateur VARCHAR(45) NOT NULL,
  anneeProduction INT NOT NULL,
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
INSERT INTO Categorie VALUES(1, 'Livre');
INSERT INTO Categorie VALUES(2, 'Film');
INSERT INTO Categorie VALUES(3, 'Disque');
INSERT INTO Categorie VALUES(4, 'Pack');

-- -----------------------------------------------------
-- Remplissage table Produit
-- -----------------------------------------------------
Insert into produit values (1, 'Very bad Trip', 2, 26.99, './img/verybadtrip.jpg');
insert into film values (1, 'Comédie', 'tod phillips',2013);

Insert into produit values (2, 'Ted', 2, 10.00, './img/ted.jpg');
insert into film values (2, 'Comédie', 'Set MacFarlane',2013);

Insert into produit values (3, 'Bienvenue à bord', 2, 10.00, './img/bab.jpg');
insert into film values (3, 'Comédie', 'Eric Lavaine', 2012);

Insert into produit values (4, 'Les seigneurs', 2, 10.00, './img/les.jpg');
insert into film values (4, 'Comédie', 'Olivier Dahan', 2013);

Insert into produit values (5, 'Sexe entre amis', 2, 10.00, './img/sexeentreamis.jpg');
insert into film values (5, 'Comédie', 'Will Gluck',2012);

Insert into produit values (6, 'Taken2', 2, 12.99, './img/taken2.jpg');
Insert into film values (6, 'Action', 'Olivier Megaton', 2013);

Insert into produit values (7, 'Héritage', 2, 15.00, './img/heritage.jpg');
Insert into film values (7, 'Action', 'Oliver Speri', 2013);

Insert into produit values (8, 'Fast And Furious 6', 2, 15.99, './img/faf.jpg');
Insert into film values (8, 'Action' ,'Justin Lin', 2013);

Insert into produit values (9, 'James Bond', 2, 11.99, './img/jb.jpg');
Insert into film values (9, 'Action', 'Sam Mendes', 2013);

Insert into produit values (10, 'Etalon Noir', 2, 9.99, './img/etalon_noir.jpg');
Insert into film values (10, 'Action', 'Carole Ballard', 2003);

Insert into produit values (11, 'Mission G', 2, 6.99, './img/missiong.jpg');
Insert into film values (11, 'Jeunesse', 'Hoyt Yeatman', 2010);

Insert into produit values (12, 'Noël', 2, 9.99, './img/noel.jpg');
Insert into film values (12, 'Jeunesse', 'John Pasquin', 2011);

Insert into produit values (13, 'Le Monde de Narnia', 2, 7.99, './img/narnia.jpg');
Insert into film values (13, 'Jeunesse', 'Michel Apted', 2010);

Insert into produit values (14, 'Pirate des caraïbes', 2, 3.99, './img/pirate.jpg');
Insert into film values (14, 'Jeunesse', 'Gore Verbinski', 2004);

Insert into produit values (15, 'Lizzy McGuire', 2, 8.99, './img/lizzy.jpg');
Insert into film values (15, 'Jeunesse', 'Jim Fall', 2004);

Insert into produit values (16, 'Naruto', 1, 29.99, './img/naruto.jpg');
Insert into livre values(16, 'manga', 'Masashi Kasimoto', 2010);

Insert into produit values (17, 'Fairy Tail', 1, 6.99, './img/f.jpg');
Insert into livre values(17, 'manga', 'Hiro Mashima', 2003);

Insert into produit values (18, 'Death Note', 1, 7.99, './img/dn.jpg');
Insert into livre values(18, 'manga', 'Tsugumi Obas', 2006);

Insert into produit values (19, 'Nanami', 1, 8.99, './img/nanami.jpg');
Insert into livre values(19, 'manga', 'SUZUKI Julietta ', 2004);

Insert into produit values (20, 'King', 1, 7.99, './img/king.jpg');
Insert into livre values(20, 'manga', 'Masashi pero', 2004);

Insert into produit values (21, 'Tintin', 1, 6.99, './img/tintin1.jpg');
Insert into livre values(21, 'BD', 'Hergé',2008);

Insert into produit values (22, 'Titeuf', 1, 9.99, './img/titeuf.jpg');
Insert into livre values(22, 'BD', 'ZEP',2007);

Insert into produit values (23,  'Légendaire', 1, 10.99, './img/legendaires.jpg');
Insert into livre values(23, 'BD', 'Patrick Sobral', 2010);

Insert into produit values (24, 'Triple Galop', 1, 10.99, './img/triple.jpg');
Insert into livre values(24, 'BD', 'Benoit Du Peloux',2012);

Insert into produit values (25, 'Game Over', 1, 9.99, './img/game.jpg');
Insert into livre values(25, 'BD', 'Midam Adam',2011);

Insert into produit values (26, 'Abscence', 1, 19.99, './img/absence.jpg');
Insert into livre values(26, 'Roman Policier', 'Alice Laplante', 2013);

Insert into produit values (27, 'Autre monde', 1, 19.99, './img/alliance.jpg');
Insert into livre values(27, 'Roman Policier', 'Maxime Chattam', 2008);

Insert into produit values (28, 'L''oeil de la lune', 1, 7.99, './img/oeil.jpg');
Insert into livre values(28, 'Roman Policier', 'Anonyme', 2012);

Insert into produit values (29, 'La malédiction', 1, 8.99, './img/mal.jpg');
Insert into livre values(29, 'Roman Policier', 'James Rollins', 2011);

Insert into produit values (30, 'Harlan promet moi Coben',  1, 7.99, './img/coben.jpg');
Insert into livre values(30, 'Roman Policier', 'Prost', 2009);

Insert into produit values (31, 'Carrington Street', 3, 16.99, './img/carrington.jpg');
Insert into Disque values (31, 'Pop-Rock', 'Adèle et Glen', 2008);

Insert into produit values (32, 'Leaving records', 3, 20.99, './img/leaving.jpg');
Insert into Disque values (32, 'Pop-Rock', 'Dual Form', 2009);

Insert into produit values (33, 'Melvins', 3, 18.99, './img/melvins.jpg');
Insert into Disque values (33, 'Pop-Rock', 'The Bootlicker', 2008);

Insert into produit values (34, 'Robert Soul', 3, 19.99, './img/robert.jpg');
Insert into Disque values (34, 'Pop-Rock', 'Robert', 2010);

Insert into produit values (35, 'Too wet to plow', 3, 20.99, './img/too.jpg');
Insert into Disque values (35, 'Pop-Rock', 'Johnny Shines', 2007);

Insert into produit values (36,'Stuff Like That', 3, 59.99, './img/stuff.jpg');
Insert into Disque values (36, 'RnB', 'Joe Hugues' , 2003);

Insert into produit values (37,'Shame Shame Shame', 3, 41.99, './img/lewis.jpg');
Insert into Disque values (37, 'RnB', 'Smiley Lewis' , 1993);

Insert into produit values (38, 'Vanguard Visionnaries', 3, 29.99, './img/big.jpg');
Insert into Disque values (38, 'RnB', 'Big mamma Thorton' , 2007);

Insert into produit values (39, 'Shake Rattle & Roll in Concert', 3, 29.99, './img/joe.jpg');
Insert into Disque values (39, 'RnB', 'Big Joe Turner' , 1998);

Insert into produit values (40, 'The Valentines', 3, 28.99, './img/the.jpg');
Insert into Disque values (40, 'RnB', 'Lily Maebelle' , 2005);

Insert into produit values (41, 'Sonates pour piano', 3, 11.99, './img/mozart.jpg');
Insert into Disque values (41, 'Classique', 'Mozart' , 1821);

Insert into produit values (42, 'Beethoven for all', 3, 41.99, './img/b.jpg');
Insert into Disque values (42, 'Classique', 'Daniel Barenboim' , 2012);

Insert into produit values (43, 'Kirov classics', 3, 41.99, './img/kirov.jpg');
Insert into Disque values (43, 'Classique', 'Kirov' , 1998);

Insert into produit values (44,'Partie 4', 3, 29.99, './img/david.jpg');
Insert into Disque values (44, 'Classique', 'David Fray' , 1998);

Insert into produit values (45, 'Concerto pour violon', 3, 24.99, './img/concerto.jpg');
Insert into Disque values (45, 'Classique', 'Izthak Perlman' , 1990);

-- -----------------------------------------------------
-- Remplissage table Utilisateur
-- -----------------------------------------------------
Insert into Utilisateur values(1, 'Admin', 'Paul', 'Chemin du Nord', 69000, 'Lyon', 'Admin@gmail.com','000000',1);
Insert into Utilisateur values(2, 'Durand', 'Thierry', 'Cours Albert Thomas', 69000, 'Lyon', 'durand@gmail.com','000000',0);

-- -----------------------------------------------------
-- Remplissage table Commande
-- -----------------------------------------------------
Insert into Commande Values (1, '2013-10-08 09:57:12', 2);
Insert into Commande Values (2, '2013-11-23 14:12:57', 2);

-- -----------------------------------------------------
-- Remplissage table Commande_Produit
-- -----------------------------------------------------
Insert Into Commande_Produit Values (1, 45, 1);
Insert Into Commande_Produit Values (2, 16, 1);

-- -----------------------------------------------------
-- Remplissage table Facture
-- -----------------------------------------------------
Insert Into Facture(id, date, montant, idCommande) Values(1, '2013-10-08 09:57:12', 24.99, 1);
Insert Into Facture(id, date, montant, idCommande) Values(2, '2013-11-23 14:12:57', 29.99, 2);

SELECT *
FROM Facture;