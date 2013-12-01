<?php
	$title = 'Boutique Culturelle';

	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');

	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
<section id="accueil">
	<div class="group">
		<aside id="pub">
			<a href="packs.php"><img src="img/pub.png" alt="Composez votre pack culture"/></a>
		</aside>

		<article id="bienvenue">
			<p>Bienvenue sur la boutique culturelle en ligne.</p>

			<p>Nous vous proposons de nombreux <strong>Livres</strong>, <strong>Disques</strong> et <strong>Films</strong>. Notre catalogue de produits comprend aussi bien des classiques que les dernières nouveautés.</p>

			<p>Disponible seulement sur notre site internet: la possibilité de composer un <strong>Pack Culture</strong> économique comprenant un Disque, un Film et un Livre. Vous obtiendrez ainsi une réduction de 10 % sur le montant de votre Pack.</p>

			<p>Notre équipe reste à votre disposition en cas de question ou de problème de navigation.</p>

			<p>Bonne visite sur notre site !</p>
		</article>
	</div>
</section>

<section id="nouveautes">
	<h2><span class="title">Nouveautés du mois</span></h2>

	<?php
		$results = $db->query('SELECT * FROM Produit ORDER BY id DESC LIMIT 0, 5');
		  while($data = $results->fetch()) {
?>
		<figure>
			<a href="fiche_produit.php?p=<?php echo $data['id']?>"><img src="<?php echo $data['miniature'];?>" alt="" /></a>
			<figcaption><?php echo $data['nom'].'<br />';?></figcaption>
		</figure>
	
<?php
		  }
	?>

</section>

<?php
	/* Inclusion du pied de page. */
	include_once('inc/footer.inc.php');
?>