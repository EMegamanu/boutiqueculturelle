<?php		
	$title = 'Inscription';
	
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>

	<section>
		<form action="nouveau_client.php" method="post">
			<div>
				<label for="nom">Nom</label><abbr title="requis">*</abbr> :
				<input type="text" placeholder="Ex. DUPONT" size=20 maxlength=30 name="nom" id="nom" required="required" />
			</div>

			<div>
				<label for="prenom">Prénom</label><abbr title="requis">*</abbr> :
				<input type="text" placeholder="Ex. Nicolas" size=20 maxlength=30 name="prenom" id="prenom" required="required" />
			</div>

			<div>
				<label for="idUtilisateur">Identifiant</label><abbr title="requis">*</abbr> :
				<input type="text" size=20 maxlength=30 name="idUtilisateur" id="idUtilisateur" required="required" />
			</div>

			<div>
				<label for="adresse">Adresse</label><abbr title="requis">*</abbr> :
				<input type="text" maxlength=50 name="Adresse" id="adresse" required="required" />
			</div>

			<div>
				<label for="ville">Ville</label><abbr title="requis">*</abbr> :
				<input type="text" size=20 maxlength=30 name="ville" id="ville" required="required" />
			</div>
			
			<div>
				<label for="cp"><abbr title="Code postal">CP</abbr></label><abbr title="requis">*</abbr> :
				<input type="text" size=10 maxlength=5 name="cp" id="cp" required="required" />
			</div>

			<div>
				<label for="email">Adresse email</label><abbr title="requis">*</abbr> :
				<input type="email" placeholder="Ex. dupont@gmail.com" size=20 maxlength=40 name="email" id="email" required="required" />
			</div>

			<div>
				<label for="mot_de_passe">Mot de passe</label><abbr title="requis">*</abbr> :
				<input type="password" size=20 maxlength=20 name="mot_de_passe" id="mot_de_passe" required="required" />
			</div>
			
			<div>
				<label for="mot_de_passe2">Confirmer</label><abbr title="requis">*</abbr> :
				<input type="password" size=20 maxlength=20 name="mot_de_passe2" id="mot_de_passe2" required="required" />
			</div>

			<div>
				<input type="submit" value="Envoyer" />
				<input type="reset" value="Annuler" />
			</div>
		</form>
	</section>
<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>