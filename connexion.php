<?php		
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');

	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');

	$requete = 'SELECT * FROM Utilisateur ' . 
    'WHERE id=:email AND motDePasse=:motDePasse';

  //   $results = $db->query($requete);
    
  //   if($enreg = $results->fetch()) {
   
  //       echo 'NOM : ' . $enreg['nom'] . '<br/>';
  //       echo 'PRENOM : ' . $enreg['prenom'] . '<br/>';
  //       echo 'ADRESSE : ' . $enreg['adresse'] . '<br/>';
		// echo '<a href="Espace.php">Mon espace personel</a>' . '<br/>';
  //   } else {
  //       echo 'Paramètres de connexion invalides<br/>';
  //   }
?>
<section id="section-connexion">
    <form method="post" action="connexion.php">
        <h2>
            <span class="title">
                <span class="fa fa-sign-in"></span> Connexion
            </span>
        </h2>
        <fieldset>
            <legend>Identification</legend>
            <div>
                <label for="email">Courriel</label> : 
                <input type="text" name="email" id="email" />
            </div>
            <div>
                <label for="mot-de-passe">Mot de passe</label> : 
                <input type="password" name="motDePasse" id="mot-de-passe" />
            </div>
            <div class="groupe-boutons">
                <button type="reset"><span class="fa fa-hand-o-left"></span> Annuler</button>
                <button type="submit"><span class="fa fa-check"></span> Envoyer</button>
            </div>
        </fieldset>
    </form>
</section>
<?php
    /* Inclusion de l'en-tête. */
    include_once('inc/footer.inc.php');
?>