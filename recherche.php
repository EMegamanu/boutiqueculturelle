
<?php 
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');

$requete = 
'SELECT * FROM ( ' .
	'SELECT C.nom categorie, P.id id, P.nom nom, P.prixHT prixHT, D.genre genre, D.compositeur artiste, D.anneeProduction annee, P.image image ' .
	'FROM Produit P ' .
	'JOIN Disque D ON P.id = D.id ' .
	'JOIN Categorie C ' . 
	'ON P.idCategorie = C.id ' .
	'WHERE P.nom LIKE CONCAT( :recherche, \'%\') ' .
	'OR D.compositeur LIKE CONCAT( :recherche, \'%\') ' .
	'OR D.genre LIKE CONCAT( :recherche, \'%\') ' .
	'OR D.anneeProduction = :recherche ' .
	'UNION ' .
	'SELECT C.nom categorie, P.id id, P.nom nom, P.prixHT prixHT, F.genre genre, F.realisateur artiste, F.anneeProduction annee, P.image image ' .
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
	'SELECT C.nom categorie, P.id id, P.nom, P.prixHT prixHT, L.genre genre, L.auteur artiste, L.dateParution annee, P.image image ' .
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
$count = $results->rowCount();
?>
<section id = 'affichage_results'>
<?php
if ($count>0) {
	

// $results->setFetchMode(PDO::FETCH_OBJ);
	// print_r($results);
?>
<table class='results'>
	<thead>
		<tr>
			<th>Pochette</th>
			<th>Nom</th>
			<th>Genre</th>
			<th>Artiste</th>
			<th>Année</th>
			<th>Prix</th>
			<th>Catégorie</th>
		</tr>
	</thead>
	<tbody>
<?php		
while($produit = $results->fetch()) {
?>
<tr>
	<td><img src ="<?php echo $produit['image'];?>" alt="" </></td>
	<td><?php echo $produit['nom'];?></td>
	<td><?php echo $produit['genre'];?></td>
	<td><?php echo $produit['artiste'];?></td>
	<td><?php echo $produit['annee'];?></td>
	<td><?php echo $produit['prixHT'];?></td>
	<td><?php echo $produit['categorie'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php
}
else
{
	?>
	<p>Aucun résultat ne correspond à votre recherche.</p>
	<?php

}
?>
</section>
<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>
