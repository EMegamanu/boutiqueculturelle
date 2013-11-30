<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>

<h2 class="formulaire"> Formulaire de contact</h2>
<form action="traitementcontact.php" method="post">
	<div>
        <label for="nom">Nom :</label>
        <input type="text" id="identifiant" name="nom" />
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="texte" id="identifiant" name="prenom" />
    </div>
 	
    <div>
        <label for="courriel">Courriel :</label>
        <input type="email" id="identifiant" name="courriel"/>
    </div>
    <div>
        <label for="telephone">Téléphone:</label>
        <input type="texte" id="identifiant" name="telephone"/>
    </div>
    <div>
        <label for="num_commande">N°Commande:</label>
        <input type="number" id="identifiant" name="num_commande"/>
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea id="identifiant" name="message"></textarea>
    </div>
    <div class="button">
        <input type="submit" value="Envoyer"/>
    </div>
</form>
<br/> <br/><br/> <br/><br/><br/> <br/><br/> <br/><br/> 
<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>