<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
<section>
    <article id="formulaire">
    <h2 >Nous contacter</h2>
    <form id="formulairecontact"action="traitementcontact.php" method="post">
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
        <div class="groupe-boutons">
            <input type="submit" value="Envoyer"/>
        </div>
    </form>
    </article>
</section>
<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>