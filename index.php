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
			<a href="packs.php"><img src="img/pub2.png" alt="Composez votre pack culture"/></a>
		</aside>

		<article id="bienvenue">
			<p>Bienvenue sur la boutique culturelle en ligne.</p>

			<p>Nous vous proposons de nombreux <strong>Livres</strong>, <strong>Disques</strong> et <strong>Films</strong>. Notre catalogue de produits se compose ainsi de classiques mais aussi de nouveautés.</p>

			<p>Disponible seulement sur notre site internet: la possibilité de composer un <strong>Pack Culture</strong> économique comprenant un Disque, un Film et un Livre pour seulement 29,99 euros.</p>

			<p>Notre équipe reste à votre disposition en cas de question ou de problème de navigation.</p>

			<p>Bonne visite sur notre site !</p>
		</article>
	</div>
</section>

<section>
	<h2>Nouveautés du mois</h2>
</section>
		


<?php
	/* Inclusion du pied de page. */
	include_once('inc/footer.inc.php');
?>