<?php
	$title = 'Panier';

	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');

	/* articles du panier. */
	$articles =  json_decode($_COOKIE['articles']);

	$nbArticles = count($articles);

	if($nbArticles > 0) {
		$requete = 'SELECT P.nom AS nom, P.prixHT AS prixHT, P.image AS image, C.nom AS categorie ' .
		            'FROM Produit P ' .
		            'JOIN Categorie C ' .
		            'ON P.idCategorie = C.id ' .
		            'WHERE P.id = :article_0';

		for($i = 1; $i < $nbArticles; $i++) {
			$requete .= ' OR P.id = :article_' . $i;
		}


		$results = $db->prepare($requete);

		for($i = 0; $i < $nbArticles; $i++) {
			$results->bindParam(':article_' . $i, $articles[$i]);
		}
		$results->execute();
        $results->setFetchMode(PDO::FETCH_OBJ);

	}


	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>

<section>
	<form>
	<table class="results">
		<thead>
			<th>Catégorie</th>
			<th>Produit</th>
			<th>Prix Unitaire H.T.</th>
			<th>Quantité</th>
			<th>Prix Total H.T.</th>
			<th>Prix Total TTC</th>
		</thead>
		<tbody>
<?php 

			$tva = 1.196;
			$prixTHT = 0;
            while($produit = $results->fetch()) {
            	$prixUHT = $produit->prixHT;
            	$qte = 1;
            	$prixHT = $prixUHT * $qte;
            	$prixTHT += $prixHT;
            	$prixTTC = $prixHT * $tva;
?>
        	<tr>
        		<td><?php echo $produit->categorie; ?></td>
        		<td>
        			<figure>
	        			<img src="<?php echo $produit->image; ?>" alt=""/>
	        			<figcaption><?php echo $produit->nom; ?></figcaption>
	        		</figure>
        		</td>
        		<td><?php echo $prixUHT; ?></td>
        		<td><input type="number" min="0" name="qte" value="<?php echo $qte; ?>" /></td>
        		<td><?php printf('%.2f', $prixHT); ?></td>
        		<td><?php printf('%.2f', $prixTTC); ?></td>

<!--             	    // [id] => 16
    // [0] => 16
    // [nom] => Naruto
    // [1] => Naruto
    // [idCategorie] => 1
    // [2] => 1
    // [prixHT] => 29.99
    // [3] => 29.99
    // [image] => ./img/naruto.jpg
    // [4] => ./img/naruto.jpg
 // ) -->
			</tr>
<?
			$prixTTTC = $prixTHT * $tva;
            }
		?>
	</tbody>
	<tfooter>
		<td colspan="5">Total</td>
		<td><?php printf('%.2f', $prixTHT); ?></td>
		<td><?php printf('%.2f', $prixTTTC); ?></td>
	</tfooter>
</table>
<div>
	<input type="submit" />
	<input type="reset" />
</div>
</form>
</section>

<?php
	include_once('inc/footer.inc.php');
?>