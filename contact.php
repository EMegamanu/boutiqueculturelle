<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
<br/> <br/><br/> <br/><br/> 
<H2> Formulaire de contact</H2>
 <br/>
<form action="traitement.php" method="post">
	<div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" />
    </div>
    <div>
        <label for="prénom">Prénom :</label>
        <input type="texte" id="prénom" value="" />
    </div>
 	
    <div>
        <label for="courriel">Courriel :</label>
        <input type="email" id="courriel" value="" />
    </div>
    <div>
        <label for="téléphone">Téléphone:</label>
        <input type="texte" id="téléphone" value="" />
    </div>
    <div>
        <label for="n°commande">N°Commande:</label>
        <input type="texte" id="n°commande" value=""/>
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea id="message"></textarea>
    </div>
    <div class="button">
        <button type="submit">Envoyer votre message</button>
    </div>

</form>
<br/> <br/><br/> <br/><br/><br/> <br/><br/> <br/><br/> 
<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>