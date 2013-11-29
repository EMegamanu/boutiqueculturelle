<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>

<H2 class="formulaire"> Formulaire de contact</H2>
<form action="traitement.php" method="post">
	<div>
        <label for="nom">Nom :</label>
        <input type="text" id="formulaire" name="nom" />
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="texte" id="formulaire" name="prenom" />
    </div>
 	
    <div>
        <label for="courriel">Courriel :</label>
        <input type="email" id="formulaire" name="courriel"/>
    </div>
    <div>
        <label for="telephone">Téléphone:</label>
        <input type="texte" id="formulaire" name="telephone"/>
    </div>
    <div>
        <label for="n°commande">N°Commande:</label>
        <input type="number" id="formulaire" name="n°commande"/>
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea id="message"></textarea>
    </div>
    <div class="button">
        <input type="button" value="Envoyer" onClick="return verif()"/>
    </div>
</form>
<br/> <br/><br/> <br/><br/><br/> <br/><br/> <br/><br/> 
<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>