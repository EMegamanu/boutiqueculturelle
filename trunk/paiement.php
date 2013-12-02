<?php
	session_start();
	
	$title = 'Paiement';

	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');

	if(empty($_POST)) {
		header("location: ./");
	}

	/* Paiement... Pas sécurisé au passage ! */
	if(!empty($_POST['paiement'])) {
		$paiement = $_POST['paiement'];

		if(
			empty($paiement['titulaire']) ||
			empty($paiement['num']) ||
			empty($paiement['date']) ||
			empty($paiement['crypto'])
		) {
			include_once('inc/header.inc.php');
?>
	<section id="section-paiement">
	<h2>
		<span class="title">
			<span class="fa fa-euro"></span> Paiement
		</span>
	</h2>
	<p class="result fail">
		Vous n'avez pas saisi toutes les informations nécessaires au paiement de votre commande.
	</p>
	<p>
		Veuillez recommencer l'opération s'il vous plaît.
	</p>
	</section>
<?php
			include_once('inc/footer.inc.php');
		} else {
			/* Si la commande a déjà été payée, retour à l'accueil... */
			if($_SESSION['montant'] == 0) {
				header("location: ./");
			}

			/* On vide le panier. */
			setcookie("articles", null, time() - 3600);

			$titulaire = $paiement['titulaire'];
			$num = $paiement['num'];
			$date = $paiement['date'];
			$crypto = $paiement['crypto'];

			$idUtilisateur = $_SESSION['utilisateur']['id'];

			/* Ajout commande dans la base de données. */
			$reqAjoutCommande = 'INSERT INTO Commande(date, idUtilisateur) VALUES(NOW(), :idUtilisateur)';
			$stmt = $db->prepare($reqAjoutCommande);
			$stmt->bindValue(':idUtilisateur', $idUtilisateur);

			$stmt->execute();

			$reqGetCommande = 'SELECT max(id) FROM Commande WHERE idUtilisateur = :idUtilisateur';
			$stmt = $db->prepare($reqGetCommande);
			$stmt->bindParam(':idUtilisateur', $idUtilisateur);
			$stmt->execute();
			$commande = $stmt->fetch();
			$idCommande = $commande[0];

			/* Ajout lignes de la commande dans la base de données. */
			foreach($_SESSION['lignesProduits'] as $idProduit => $qte) {
				$reqAjoutCommandeProduit = 'INSERT INTO Commande_Produit(idCommande, idProduit, quantite) VALUES(:idCommande, :idProduit, :qte)';
				$stmt = $db->prepare($reqAjoutCommandeProduit);
				// Solution trouvée ici : http://fr.openclassrooms.com/forum/sujet/probleme-bindparam-date-51009
				$stmt->bindParam(':idCommande', $idCommande);
				$stmt->bindParam(':idProduit', $idProduit);
				$stmt->bindParam(':qte', $qte);

				$stmt->execute();
			}

			/* Ajout facture dans la base de données. */
			$reqAjoutFacture = 'INSERT INTO Facture(date, montant, idCommande) VALUES(NOW(), :montant, :idCommande)';
			$stmt = $db->prepare($reqAjoutFacture);
			// Solution trouvée ici : http://fr.openclassrooms.com/forum/sujet/probleme-bindparam-date-51009
			$stmt->bindValue(':montant', $_SESSION['montant']);
			$stmt->bindValue(':idCommande', $idCommande);

			$stmt->execute();

			/* Inclusion de l'en-tête. */
			include_once('inc/header.inc.php');

?>
	<section id="section-paiement">
	<h2>
		<span class="title">
			<span class="fa fa-euro"></span> Paiement
		</span>
	</h2>
	<p class="result success">
		Nous avons bien reçu votre paiement de <strong><?php printf("%.2f", $_SESSION['montant']); ?> €</strong>.
	</p>
	<p>
		Merci d'avoir commandé chez nous, nous vous tiendrons informé de la bonne expédition de vos articles.
	</p>

	</section>
<?php
			$_SESSION['montant'] = 0;
			$_SESSION['lignesProduits'] = null;

			/* Inclusion du pied-de-page. */
			include_once('inc/footer.inc.php');
		}

	} else if(!empty($_POST['articles'])) {
		/* Articles du panier sous forme de paires (id, quantité). */
		$articles = $_POST['articles'];
		$_SESSION['lignesProduits'] = $articles;

		$nbArticles = count($articles);

		if($nbArticles == 0) {
			header("location: ./");
		}

		$requete = 'SELECT P.id AS id, P.nom AS nom, P.prixHT AS prixHT, P.miniature AS image, C.nom AS categorie ' .
		            'FROM Produit P ' .
		            'JOIN Categorie C ' .
		            'ON P.idCategorie = C.id ' .
		            'WHERE P.id = :article_0';

		for($i = 1; $i < $nbArticles; $i++) {
			$requete .= ' OR P.id = :article_' . $i;
		}

		$results = $db->prepare($requete);

		$i = 0;
		foreach($articles as $id => $nb) {
			$results->bindValue(':article_' . $i, $id);
			$i++;
		}
		$results->execute();
		$count = $results->rowCount();
	    $results->setFetchMode(PDO::FETCH_OBJ);

		/* Inclusion de l'en-tête. */
		include_once('inc/header.inc.php');
?>
<section id="section-paiement">
	<h2>
		<span class="title">
			<span class="fa fa-euro"></span> Paiement
		</span>
	</h2>
<?php
    	if($count > 0) {
?>
	<h3>Récapitulatif</h3>
	<article>
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
				$prixTTTC = 0;

	            while($produit = $results->fetch()) {
	            	$prixUHT = $produit->prixHT;
	            	$qte     = $articles[$produit->id];
	            	$prixHT  = $prixUHT * $qte;
	            	$prixTHT += $prixHT;
	            	$prixTTC = $prixHT * $tva;
?>
        	<tr data-id="<?php echo $produit->id; ?>">
        		<td><?php echo $produit->categorie; ?></td>
        		<td><?php echo $produit->nom; ?></td>
        		<td class="prix prix-uht"><?php printf("%.2f", $prixUHT); ?></td>
        		<td class="qte"><?php echo $qte; ?></td>
        		<td class="prix prix-ht"><?php printf('%.2f', $prixHT); ?></td>
        		<td class="prix prix-ttc"><?php printf('%.2f', $prixTTC); ?></td>
			</tr>
	<?php
	            }
				$prixTTTC = $prixTHT * $tva;
				$_SESSION['montant'] = $prixTTTC;
?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4">Total</th>
			<td class="prix prix-tht"><?php printf('%.2f', $prixTHT); ?></td>
			<td class="prix prix-tttc"><?php printf('%.2f', $prixTTTC); ?></td>
		</tr>
	</tfoot>
</table>
</article>
	<h3>Moyen de paiement</h3>
<form method="post" action="paiement.php">
	<fieldset>
		<legend>Carte bancaire</legend>
		<!-- http://html5pattern.com -->
		<div>
			<label for="cb-titulaire">Titulaire</label> : 
			<input type="text" name="paiement[titulaire]" id="cb-titulaire" placeholder="M. Jean Durand" />
		</div>
		<div>
			<label for="cb-num">N°</label> : 
			<input type="text" name="paiement[num]" id="cb-num" pattern="[0-9]{4}\ *[0-9]{4}\ *[0-9]{4}\ *[0-9]{4}" placeholder="Ex. 0000 1111 2222 3333"/>
		</div>
		<div>
			<label for="cb-date">Fin de validité</label> : 
			<input type="month" name="paiement[date]" id="cb-date" pattern="[0-9]{2}\/[0-9]{4}" placeholder="Ex. 12/2015" />
		</div>
		<div>
			<label for="cb-crypto">Cryptogramme</label> : 
			<input type="text" name="paiement[crypto]" id="cb-crypto" pattern="[0-9]{3}" placeholder="Ex. 123" />
		</div>
	</fieldset>
	<div class="groupe-boutons">
		<button type="reset">
			<span class="fa fa-hand-o-left"></span>
			Annuler
		</button>
		<button type="submit">
			<span class="fa fa-eur"></span>
			Payer
		</button>
	</div>
</form>
</section>
<?php
		}
		/* Inclusion du pied-de-page. */
		include_once('inc/footer.inc.php');
	} else {
		header("location: ./");
	}
?>