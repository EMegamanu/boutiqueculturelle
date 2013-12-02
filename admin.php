<?php
	/* Définition des variables. */
	$title = 'Administration';

    // Si l'utilisateur n'est pas admin on le dégage
    session_start();
    if(!$_SESSION['utilisateur']['admin']) {
        header("location: ./");
    }
    
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');

	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');

	/* Corps. */
?>
<section id="section-admin">
	<article>
		<h2>Base de données</h2>
		<h3>Réinitialiser</h3>
		<p>
			<strong>Attention :</strong> La réinitialisation de la base de données effacera l'ensemble des données qui n'ont pas été exportées 
			dans le fichier script.sql.
		</p>
		<p>
			Pensez à préparer votre jeu d'essai dans ce fichier.
		</p>
		<p></p>
		<form action="init_bd.php" method="post">
			<fieldset>
				<legend>Paramètres de connexion</legend>
				<label for="mot_de_passe">Mot de passe 'root'</label> :
				<input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Vide par défaut" />
			</fieldset>
			<div>
				<input type="submit" value="Réinitialiser la base" />
			</div>
		</form>
</article>
</section>
<?php
	include('inc/footer.inc.php');
?>