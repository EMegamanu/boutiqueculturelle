<?php		
	$title = 'Inscription';
	
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>

	<section>
		<form action="nouveau_client.php" method="post">
			<fieldset>
				<legend>Identité</legend>
				<div>
					<label for="titre">Titre</label><abbr title="requis">*</abbr> :
					<select>
						<option selected="selected" disabled="disabled">Choisir...</option>
						<option value="m">M.</option>
						<option value="mlle">Mlle.</option>
						<option value="mme">Mme.</option>
					</select>
				</div>

				<div>
					<label for="nom">Nom</label><abbr title="requis">*</abbr> :
					<input type="text" placeholder="Ex. DUPONT" size=20 maxlength=30 name="nom" id="nom" required="required" />
				</div>

				<div>
					<label for="prenom">Prénom</label><abbr title="requis">*</abbr> :
					<input type="text" placeholder="Ex. Nicolas" size=20 maxlength=30 name="prenom" id="prenom" required="required" />
				</div>

				<div>
					<label for="dn">Date de naissance</label><abbr title="requis">*</abbr> :
					<input type="date" placeholder="Ex. 25/05/1986" size=20 maxlength=30 name="dn" id="dn" required="required" />
				</div>
			</fieldset>

			<fieldset>
				<legend>Adresse</legend>
				<div>
					<label for="adresse">N° et voie</label><abbr title="requis">*</abbr> :
					<input type="text" placeholder="Ex. 42 rue de la Pataterie" maxlength=50 name="adresse" id="adresse" required="required" />
				</div>

				<div>
					<label for="ville">Ville</label><abbr title="requis">*</abbr> :
					<input type="text" placeholder="Ex. Lyon" size=20 maxlength=30 name="ville" id="ville" required="required" />
				</div>
				
				<div>
					<label for="cp"><abbr title="Code postal">CP</abbr></label><abbr title="requis">*</abbr> :
					<input type="text" placeholder="Ex. 69008" size=10 maxlength=5 name="cp" id="cp" required="required" />
				</div>
			</fieldset>

			<fieldset>
				<legend>Contact</legend>
				<div>
					<label for="email">Adresse email</label><abbr title="requis">*</abbr> :
					<input type="email" placeholder="Ex. dupont@gmail.com" size=20 maxlength=40 name="email" id="email" required="required" />
				</div>
				<div>
					<label for="tel">Téléphone</label> :
					<input type="tel" placeholder="Ex. 06 00 00 00 00" size=10 maxlength=20 name="tel" id="tel" />
				</div>
			</fieldset>

			<fieldset>
				<legend>Identification</legend>
				<div>
					<label for="mot_de_passe">Mot de passe</label><abbr title="requis">*</abbr> :
					<input type="password" size=20 maxlength=20 name="mot_de_passe" id="mot_de_passe" required="required" />
				</div>
				
				<div>
					<label for="mot_de_passe2">Confirmer</label><abbr title="requis">*</abbr> :
					<input type="password" size=20 maxlength=20 name="mot_de_passe2" id="mot_de_passe2" required="required" />
				</div>
			</fieldset>

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