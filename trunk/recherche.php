<pre>
<?php 
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');

$requete = 
'SELECT * FROM ( ' .
	'SELECT C.nom categorie, P.id id, P.nom nom, P.prixHT prixHT, D.genre genre, D.compositeur artiste, D.anneeProduction annee ' .
	'FROM Produit P ' .
	'JOIN Disque D ON P.id = D.id ' .
	'JOIN Categorie C ' . 
	'ON P.idCategorie = C.id ' .
	'WHERE P.nom LIKE CONCAT( :recherche, \'%\') ' .
	'OR D.compositeur LIKE CONCAT( :recherche, \'%\') ' .
	'OR D.genre LIKE CONCAT( :recherche, \'%\') ' .
	'OR D.anneeProduction = :recherche ' .
	'UNION ' .
	'SELECT C.nom categorie, P.id id, P.nom nom, P.prixHT prixHT, F.genre genre, F.realisateur artiste, F.anneeProduction annee ' .
	'FROM Produit P ' .
	'JOIN Film F ' .
	'ON P.id = F.id ' .
	'JOIN Categorie C ' .
	'ON P.idCategorie = C.id ' .
	'WHERE P.nom LIKE CONCAT( :recherche, \'%\') ' .
	'OR F.realisateur LIKE CONCAT( :recherche, \'%\') ' .
	'OR F.genre LIKE CONCAT( :recherche, \'%\') ' .
	'OR F.anneeProduction = :recherche ' .
	'UNION ' .
	'SELECT C.nom categorie, P.id id, P.nom, P.prixHT prixHT, L.genre genre, L.auteur artiste, L.dateParution annee ' .
	'FROM Produit P ' .
	'JOIN Livre L ' .
	'ON P.id = L.id ' .
	'JOIN Categorie C ' .
	'ON P.idCategorie = C.id ' .
	'WHERE P.nom LIKE CONCAT( :recherche, \'%\') ' .
	'OR L.auteur LIKE CONCAT( :recherche, \'%\') ' .
	'OR L.genre LIKE CONCAT( :recherche, \'%\') ' .
	'OR L.dateParution = :recherche ' .
') AS P ORDER BY id DESC';

$results = $db->prepare($requete);

// print_r($requete);
// print_r($_GET['recherche']);

$results->bindValue(':recherche', $_GET['recherche']);
$results->execute();
$results->setFetchMode(PDO::FETCH_OBJ);
	// print_r($results);

while($produit = $results->fetch()) {
	print_r($produit);
}
?>
</pre>