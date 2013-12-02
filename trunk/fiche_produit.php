<?php		
	$title = 'Détail';
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
	if (!empty($_GET) && !empty($_GET['p'])){
		$id=$_GET['p'];

		$requete='select C.nom categorie, P.nom nom, P.image, P.prixHT prixHT from produit P join categorie C on C.id= P.idCategorie where P.id = :idProduit';
		$results = $db->prepare($requete);
		$results->bindValue(':idProduit',$id);
		$results->execute();
		$count = $results->rowCount();

		if($count > 0){

			$produit = $results->fetch();
			$categorie = $produit ['categorie'];
?>

<section id="section-detail">
	<h2>Fiche produit</h2>
	<article>
	<dl>
		<dt>Support</dt>
			<dd><?php echo $categorie;?></dd>
		<dt>Nom</dt>
			<dd><?php echo $produit['nom'];?></dd>
		<dt>Image</dt>
			<dd><img src="<?php echo $produit['image'];?>" alt="" /></dd>
		<dt>Prix H.T.</dt>
			<dd class="prix"><?php echo $produit['prixHT'];?></dd>
<?php
			switch ($categorie) {
				case 'Livre':
					$requete2 = 'select * from Livre where id = :idProduit';
					$results2 = $db->prepare($requete2);
					$results2->bindValue(':idProduit',$id);
					$results2->execute();
					$livre = $results2->fetch();
?>
		<dt>Auteur</dt>
			<dd><?php echo $livre['auteur']; ?></dd>
		<dt>Date de parution</dt>
			<dd><?php echo $livre['dateParution']; ?></dd>
		<dt>Genre</dt>
			<dd><?php echo $livre['genre']; ?></dd>
<?php
					break;

				case 'Film':
					$requete2 = 'select * from Film where id = :idProduit';
					$results2 = $db->prepare($requete2);
					$results2->bindValue(':idProduit',$id);
					$results2->execute();
					$film = $results2->fetch();
?>
		<dt>Réalisateur</dt>
			<dd><?php echo $film['realisateur']; ?></dd>
		<dt>Année de production</dt>
			<dd><?php echo $film['anneeProduction']; ?></dd>
		<dt>Genre</dt>
			<dd><?php echo $film['genre']; ?></dd>
<?php
					break;

				case 'Disque':
					$requete2 = 'select * from Disque where id = :idProduit';
					$results2 = $db->prepare($requete2);
					$results2->bindValue(':idProduit',$id);
					$results2->execute();
					$disque = $results2->fetch();
?>
		<dt>Compositeur</dt>
			<dd><?php echo $disque['compositeur']; ?></dd>
		<dt>Année de production</dt>
			<dd><?php echo $disque['anneeProduction']; ?></dd>
		<dt>Genre</dt>
			<dd><?php echo $disque['genre']; ?></dd>
<?php
					break;
			}
		}

	}
?>
	</dl>
</article>
</section>
