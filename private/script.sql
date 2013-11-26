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
  nom VARCHAR(45) NOT NULL,
  idCategorie INT NOT NULL,
  prixHT DECIMAL(5,2) NOT NULL,
  image VARCHAR(45) NULL,
  idSupport INT NOT NULL,
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
  ADD FOREIGN KEY(idCategorie) REFERENCES Categorie(id),
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION
;
ALTER TABLE Support
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

-- -----------------------------------------------------
-- Remplissage table Produit
-- -----------------------------------------------------
Insert into produit values (1,2,26.99, './img/verybadtrip.jpg');
Insert into produit values (2,2,10.00, './img/ted.jpg');
Insert into produit values (3,2,10.00, './img/bab.jpg');
Insert into produit values (4,2,10.00, './img/leseigneurs.jpg');
Insert into produit values (5,2,10.00, './img/sexeentreamis.jpg');
Insert into produit values (6,2,12.99, './img/taken2.jpg');
Insert into produit values (7,2,15.00, './img/héritage.jpg');
Insert into produit values (8,2,15.99, './img/faf.jpg');
Insert into produit values (9,2,11.99, './img/jb.jpg');
Insert into produit values (10,2,9.99, './img/étalon noir.jpg');
Insert into produit values (11,2,6.99, './img/missiong.jpg');
Insert into produit values (12,2,9.99, './img/noel.jpg');
Insert into produit values (13,2,7.99, './img/narnia.jpg');
Insert into produit values (14,2,3.99, './img/pirate.jpg');
Insert into produit values (15,2,8.99, './img/lizzy.jpg');
Insert into produit values (16,1,29.99, './img/naruto.jpg');
Insert into produit values (17,1,6.99, './img/f.jpg');
Insert into produit values (18,1,7.99, './img/dn.jpg');
Insert into produit values (19,1,8.99, './img/nanami.jpg');
Insert into produit values (20,1,7.99, './img/king.jpg');
Insert into produit values (21,1,6.99, './img/tintin1.jpg');
Insert into produit values (22,1,9.99, './img/titeuf.jpg');
Insert into produit values (23,1,10.99, './img/légendaire.jpg');
Insert into produit values (24,1,10.99, './img/triple.jpg');
Insert into produit values (25,1,9.99, './img/game.jpg');
Insert into produit values (26,1,19.99, './img/absence.jpg');
Insert into produit values (27,1,19.99, './img/alliance.jpg');
Insert into produit values (28,1,7.99, './img/oeuil.jpg');
Insert into produit values (29,1,8.99, './img/mal.jpg');
Insert into produit values (30,1,7.99, './img/coben.jpg');
Insert into produit values (31,3,16.99, './img/carrington.jpg');
Insert into produit values (32,3,20.99, './img/leaving.jpg');
Insert into produit values (33,3,18.99, './img/melvins.jpg');
Insert into produit values (34,3,19.99, './img/robert.jpg');
Insert into produit values (35,3,20.99, './img/too.jpg');
Insert into produit values (36,3,59.99, './img/stuff.jpg');
Insert into produit values (37,3,41.99, './img/lewis.jpg');
Insert into produit values (38,3,29.99, './img/big.jpg');
Insert into produit values (39,3,29.99, './img/joe.jpg');
Insert into produit values (40,3,28.99, './img/the.jpg');
Insert into produit values (41,3,11.99, './img/mozart.jpg');
Insert into produit values (42,3,41.99, './img/b.jpg');
Insert into produit values (43,3,41.99, './img/kirov.jpg');
Insert into produit values (44,3,29.99, './img/david.jpg');
Insert into produit values (45,3,24.99, './img/concerto.jpg');

-- -----------------------------------------------------
-- Remplissage table Film
-- -------------------------------
insert into film values (1, 'Very bad Trip', 'Comédie', 'tod phillips',2013);
insert into film values (2, 'Ted', 'Comédie', 'Set MacFarlane',2013);
insert into film values (3, 'Bienvenue à bord', 'Comédie', 'Eric Lavaine',2012);
insert into film values (4, 'Les seigneurs', 'Comédie', 'Olivier Dahan',2013);
insert into film values (5, 'Sexe entre amis', 'Comédie', 'Will Gluck',2012);
Insert into film values (6, 'Taken2', 'Action', 'Olivier Megaton', 2013);
Insert into film values (7, 'héritage','Action','Oliver Speri', 2013);
Insert into film values (8, 'Fast And Furious 6','Action' , 'Justin Lin', 2013)
Insert into film values (9, 'James Bond', 'Action', 'Sam Mendes', 2013);
Insert into film values (10, 'Etalon Noir', 'Action', 'Carole Ballard', 2003);
Insert into film values (11, 'Mission G', 'Jeunesse', 'Hoyt Yeatman', 2010);
Insert into film values (12, 'Noël', 'Jeunesse', 'John Pasquin', 2011);
Insert into film values (13, 'Le Monde de Narnia', 'Jeunesse', 'Michel Apted', 2010);
Insert into film values (14, 'Pirate des caraïbes', 'Jeunesse', 'Gore Verbinski', 2004);
Insert into film values (15, 'Lizzy McGuire', 'Jeunesse', 'Jim Fall', 2004);

-- -----------------------------------------------------
-- Remplissage table Livre
-- -------------------------------
Insert into livre values(16, 'manga', 'Naruto', 'Masashi Kasimoto', 2010);
Insert into livre values(17, 'manga', 'Fairy Tail', 'Yoko', 2003);
Insert into livre values(18, 'manga', 'Death Note', 'Tsugumi Obas', 2006);
Insert into livre values(19, 'manga', 'Nanami', 'Yoko', 2004);
Insert into livre values(20, 'manga', 'King', 'Masashi pero', 2004);
Insert into livre values(21, 'BD', 'Tintin', 'Hergé',2008);
Insert into livre values(22, 'BD', 'Titeuf', 'ZEP',2007);
Insert into livre values(23, 'BD' , 'Légendaire', 'Patrick Sobral', 2010);
Insert into livre values(24, 'BD', 'Triple Galop', 'Benoit Du Peloux',2012);
Insert into livre values(25, 'BD', 'Game Over' , 'Midam Adam',2011);
Insert into livre values(26, 'Roman Policier', 'Abscence ', 'Alice Laplante', 2013);
Insert into livre values(27, 'Roman Policier', 'Autre monde ', 'Maxime Chattam', 2008);
Insert into livre values(28, 'Roman Policier', 'L oeil de la lune ', 'Anonyme', 2012);
Insert into livre values(29, 'Roman Policier', 'La malédiction ', 'James Rollins', 2011);
Insert into livre values(30, 'Roman Policier', 'Harlan promet moi Coben ', 'Prost', 2009);

-- -----------------------------------------------------
-- Remplissage table Disque
-- -------------------------------
Insert into Disque values (31, 'Pop Rock', 'Carrington Street', 'Adèle et Glen', 2008);
Insert into Disque values (32, 'Pop Rock', 'Leaving records', 'Dual Form', 2009);
Insert into Disque values (33, 'Pop Rock', 'Melvins', 'The Bootlicker', 2008);
Insert into Disque values (34, 'Pop Rock', 'Robert Soul', 'Robert', 2010);
Insert into Disque values (35, 'Pop Rock', 'Too wet to plow', 'Johnny Shines', 2007);
Insert into Disque values (36, 'RNB', 'Stuff Like That', 'Joe Hugues' , 2003);
Insert into Disque values (37, 'RNB', 'Shame Shame Shame', 'Smiley Lewis' , 1993);
Insert into Disque values (38, 'RNB', 'Vanguard Visionnaries', 'Big mamma Thorton' , 2007);
Insert into Disque values (39, 'RNB', 'Shake Rattle & Roll in Concert', 'Big Joe Turner' , 1998);
Insert into Disque values (40, 'RNB', 'The Valentines', 'Lily Maebelle' , 2005);
Insert into Disque values (41, 'Classique', 'Sonates pour piano', 'Mozart' , 1821);
Insert into Disque values (42, 'Classique', 'Beethoven for all', 'Daniel Barenboim' , 2012);
Insert into Disque values (43, 'Classique', 'Kirov classics', 'Kirov' , 1998);
Insert into Disque values (44, 'Classique', 'Partie 4', 'David Fray' , 1998);
Insert into Disque values (45, 'Classique', 'Concerto pour violon', 'Izthak Perlman' , 1990);

-- -----------------------------------------------------
-- Remplissage table Utilisateur
-- -------------------------------
Insert into Utilisateur values(1, 'Admin', 'Paul', 'Chemin du Nord', 69000, 'Lyon', 'Admin@gmail.com','000000',1);
Insert into Utilisateur values(2, 'Durand', 'Thierry', 'Cours Albert Thomas', 69000, 'Lyon', 'durand@gmail.com','000000',0);

-- -----------------------------------------------------
-- Remplissage table Commande
-- -------------------------------
Insert into Commande Values (1, 2013-10-08 09:57:12, 2)
Insert into Commande Values (2,2013-11-23 14:12:57, 2)

-- -----------------------------------------------------
-- Remplissage table Commande_Produit
-- -------------------------------
Insert Into Commande_Produit Values (1,45,1);
Insert Into Commande_Produit Values (2,16,1);

-- -----------------------------------------------------
-- Remplissage table Facture
-- -------------------------------
Insert Into Facture Values(1,2013-10-08 09:57:12,24.99,1);
Insert Into Facture Values(2,2013-11-23 14:12:57,29.99,2);