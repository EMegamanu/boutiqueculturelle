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
  image TEXT NULL,
  miniature TEXT NULL,
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
Insert into produit values (1, 'Very bad Trip', 2, 26.99, './img/produits/very-bad-trip.jpg', './img/produits-min/very-bad-trip.jpg');
insert into film values (1, 'Comédie', 'Tod Phillips', 2009);

Insert into produit values (2, 'Ted', 2, 10.00, './img/produits/ted.jpg', './img/produits-min/ted.jpg');
insert into film values (2, 'Comédie', 'Seth MacFarlane', 2013);

Insert into produit values (3, 'Bienvenue à bord', 2, 10.00, './img/produits/bienvenue-a-bord.jpg', './img/produits-min/bienvenue-a-bord.jpg');
insert into film values (3, 'Comédie', 'Eric Lavaine', 2011);

Insert into produit values (4, 'Les Seigneurs', 2, 10.00, './img/produits/les-seigneurs.jpg', './img/produits-min/les-seigneurs.jpg');
insert into film values (4, 'Comédie', 'Olivier Dahan', 2012);

Insert into produit values (5, 'Sexe entre amis', 2, 10.00, './img/produits/sexe-entre-amis.jpg', './img/produits-min/sexe-entre-amis.jpg');
insert into film values (5, 'Comédie', 'Will Gluck',2012);

Insert into produit values (6, 'Taken 2', 2, 12.99, './img/produits/taken-2.jpg', './img/produits-min/taken-2.jpg');
Insert into film values (6, 'Action', 'Olivier Megaton', 2013);

Insert into produit values (7, 'Jason Bourne L''Héritage', 2, 15.00, './img/produits/jason-bourne-heritage.jpg', './img/produits-min/jason-bourne-heritage.jpg');
Insert into film values (7, 'Action', 'Tony Gilroy', 2013);

Insert into produit values (8, 'Fast & Furious 6', 2, 15.99, './img/produits/fast-n-furious-6.jpg', './img/produits-min/fast-n-furious-6.jpg');
Insert into film values (8, 'Action' ,'Justin Lin', 2013);

Insert into produit values (9, 'Skyfall', 2, 11.99, './img/produits/skyfall.jpg', './img/produits-min/skyfall.jpg');
Insert into film values (9, 'Action', 'Sam Mendes', 2013);

Insert into produit values (10, 'L''Étalon Noir', 2, 9.99, './img/produits/etalon_noir.jpg', './img/produits-min/etalon_noir.jpg');
Insert into film values (10, 'Action', 'Carole Ballard', 1979);

Insert into produit values (11, 'Mission G', 2, 6.99, './img/produits/mission-g.jpg', './img/produits-min/mission-g.jpg');
Insert into film values (11, 'Jeunesse', 'Hoyt Yeatman', 2010);

Insert into produit values (12, 'Super Noël', 2, 9.99, './img/produits/super-noel.jpg', './img/produits-min/super-noel.jpg');
Insert into film values (12, 'Jeunesse', 'John Pasquin', 2011);

Insert into produit values (13, 'Le Monde de Narnia', 2, 7.99, './img/produits/le-monde-de-narnia.jpg', './img/produits-min/le-monde-de-narnia.jpg');
Insert into film values (13, 'Jeunesse', 'Andrew Adamson', 2005);

Insert into produit values (14, 'Pirate des Caraïbes', 2, 3.99, './img/produits/pirate-des-caraibes.jpg', './img/produits-min/pirate-des-caraibes.jpg');
Insert into film values (14, 'Jeunesse', 'Gore Verbinski', 2004);

Insert into produit values (15, 'Lizzy McGuire', 2, 8.99, './img/produits/lizzy-mc-guire-le-film.jpg', './img/produits-min/lizzy-mc-guire-le-film.jpg');
Insert into film values (15, 'Jeunesse', 'Jim Fall', 2003);

Insert into produit values (43, 'Kirov Classics', 2, 41.99, './img/produits/kirov-classics.jpg', './img/produits-min/kirov-classics.jpg');
Insert into Film values (43, 'Ballet', 'Ileg Vinogradov' , 1998);

Insert into produit values (16, 'Naruto - Tome 1', 1, 29.99, './img/produits/naruto-t1.jpg', './img/produits-min/naruto-t1.jpg');
Insert into livre values(16, 'Manga', 'Masashi Kishimoto', 2002);

Insert into produit values (17, 'Fairy Tail - Tome 14', 1, 6.99, './img/produits/fairy-tail-t14.jpg', './img/produits-min/fairy-tail-t14.jpg');
Insert into livre values(17, 'Manga', 'Hiro Mashima', 2010);

Insert into produit values (18, 'Death Note - Tome 1', 1, 7.99, './img/produits/death-note-t1.jpg', './img/produits-min/death-note-t1.jpg');
Insert into livre values(18, 'Manga', 'Takeshi Obata, Tsugumi Ohba', 2007);

Insert into produit values (19, 'Divine Nanami - Tome 2', 1, 8.99, './img/produits/divine-nanami-t2.jpg', './img/produits-min/divine-nanami-t2.jpg');
Insert into livre values(19, 'Manga', 'Suzuki Julietta ', 2004);

Insert into produit values (20, 'King''s Game - Tome 2', 1, 7.99, './img/produits/kings-game-t2.jpg', './img/produits-min/kings-game-t2.jpg');
Insert into livre values(20, 'Manga', 'Hitori Renda, Nobuaki Kanazawa', 2013);

Insert into produit values (21, 'Tintin - Les 7 Boules de Cristal', 1, 6.99, './img/produits/tintin-les-7-boules-de-cristal.jpg', './img/produits-min/tintin-les-7-boules-de-cristal.jpg');
Insert into livre values(21, 'BD', 'Hergé', 1948);

Insert into produit values (22, 'Titeuf - Tome 13 : À la folie', 1, 9.99, './img/produits/titeuf-t13.jpg', './img/produits-min/titeuf-t13.jpg');
Insert into livre values(22, 'BD', 'Zep', 2012);

Insert into produit values (23,  'Les Légendaires - Tome 10', 1, 10.99, './img/produits/les-legendaires-t10.jpg', './img/produits-min/les-legendaires-t10.jpg');
Insert into livre values(23, 'BD', 'Patrick Sobral', 2010);

Insert into produit values (24, 'Triple Galop - Tome 4', 1, 10.99, './img/produits/triple-galop-t4.jpg', './img/produits-min/triple-galop-t4.jpg');
Insert into livre values(24, 'BD', 'Benoit Du Peloux', 2009);

Insert into produit values (25, 'Game Over - Tome 1', 1, 9.99, './img/produits/game-over-t1.jpg', './img/produits-min/game-over-t1.jpg');
Insert into livre values(25, 'BD', 'Midam, Adam', 2004);

Insert into produit values (26, 'Absences', 1, 19.99, 'img/produits/absences.jpg', 'img/produits-min/absences.jpg');
Insert into livre values(26, 'Roman Policier', 'Alice Laplante', 2013);

Insert into produit values (27, 'Autre monde', 1, 19.99, './img/produits/autre-monde.jpg', './img/produits-min/autre-monde.jpg');
Insert into livre values(27, 'Roman Policier', 'Maxime Chattam', 2008);

Insert into produit values (28, 'L''oeil de la lune', 1, 7.99, './img/produits/l-oeil-de-la-lune.jpg', './img/produits-min/l-oeil-de-la-lune.jpg');
Insert into livre values(28, 'Roman Policier', 'Anonyme', 2008);

Insert into produit values (29, 'La Malédiction de Marco Polo', 1, 8.99, './img/produits/la-malediction-de-marco-polo.jpg', './img/produits-min/la-malediction-de-marco-polo.jpg');
Insert into livre values(29, 'Roman Policier', 'James Rollins', 2011);

Insert into produit values (30, 'Promets moi',  1, 7.99, './img/produits/promets-moi.jpg', './img/produits-min/promets-moi.jpg');
Insert into livre values(30, 'Roman Policier', 'Harlan Coben', 2009);

Insert into produit values (31, 'Carrington Street', 3, 16.99, './img/produits/carrington-street.jpg', './img/produits-min/carrington-street.jpg');
Insert into Disque values (31, 'Pop-Rock', 'Adèle & Glen', 2012);

Insert into produit values (32, 'Dual Form', 3, 20.99, './img/produits/dual-form.jpg', './img/produits-min/dual-form.jpg');
Insert into Disque values (32, 'Pop-Rock', 'Leaving Records', 2013);

Insert into produit values (33, 'The Bootlicker', 3, 18.99, './img/produits/the-bootlicker.jpg', './img/produits-min/the-bootlicker.jpg');
Insert into Disque values (33, 'Pop-Rock', 'Melvins', 2004);

Insert into produit values (34, 'Rebel Soul', 3, 19.99, './img/produits/rebel-soul.jpg', './img/produits-min/rebel-soul.jpg');
Insert into Disque values (34, 'Pop-Rock', 'Kid Rock', 2012);

Insert into produit values (35, 'Too Wet to Plow', 3, 20.99, './img/produits/too-wet-to-plow.jpg', './img/produits-min/too-wet-to-plow.jpg');
Insert into Disque values (35, 'Pop-Rock', 'Johnny Shines', 2013);

Insert into produit values (36,'Stuff Like That', 3, 59.99, './img/produits/stuff-like-that.jpg', './img/produits-min/stuff-like-that.jpg');
Insert into Disque values (36, 'RnB', 'Joe Hugues' , 2003);

Insert into produit values (37,'Shame Shame Shame', 3, 41.99, './img/produits/shame-shame-shame.jpg', './img/produits-min/shame-shame-shame.jpg');
Insert into Disque values (37, 'RnB', 'Smiley Lewis' , 2000);

Insert into produit values (38, 'Big Mama Thornton', 3, 29.99, './img/big.jpg');
Insert into Disque values (38, 'RnB', 'Vanguard Visionnaries', 2007);

Insert into produit values (39, 'Shake,Rattle & Roll (concert)', 3, 29.99, './img/produits/shake-rattle-n-roll-concert.jpg', './img/produits-min/shake-rattle-n-roll-concert.jpg');
Insert into Disque values (39, 'RnB', 'Joe Turner', 1998);

Insert into produit values (40, 'Lily Maebelle', 3, 28.99, './img/produits/lily-maebelle.jpg', './img/produits-min/lily-maebelle.jpg');
Insert into Disque values (40, 'RnB', 'The Valentines' , 2013);

Insert into produit values (41, 'Mozart : Intégrale des sonates pour piano', 3, 11.99, './img/produits/mozart-integrale-des-sonates-pour-piano.jpg', './img/produits-min/mozart-integrale-des-sonates-pour-piano.jpg');
Insert into Disque values (41, 'Classique', 'Friedrich Gulda' , 1821);

Insert into produit values (42, 'Beethoven for all', 3, 41.99, './img/produits/beethoven-for-all.jpg', './img/produits-min/beethoven-for-all.jpg');
Insert into Disque values (42, 'Classique', 'Daniel Barenboim' , 2012);

Insert into produit values (44,'David Fray plays Bach & Boulez', 3, 29.99, './img/produits/david-fray-play-bach-and-boulez.jpg', './img/produits-min/david-fray-play-bach-and-boulez.jpg');
Insert into Disque values (44, 'Classique', 'David Fray' , 1998);

Insert into produit values (45, 'Concertos pour violon #1', 3, 24.99, './img/produits/concertos-pour-violon-1.jpg', './img/produits-min/concertos-pour-violon-1.jpg');
Insert into Disque values (45, 'Classique', 'Itzhak Perlman' , 1990);

-- -----------------------------------------------------
-- Remplissage table Utilisateur
-- -----------------------------------------------------
Insert into Utilisateur values(1, 'Admin', 'Paul', 'Chemin du Nord', 69000, 'Lyon', 'admin@gmail.com','000000',1);
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