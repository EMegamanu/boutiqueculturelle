<?php		
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');

	/* Note : sécuriser cerre requête contre les injections SQL via une requête préparée... */
	$requete = "SELECT * FROM Utilisateur " .
           " WHERE id='$idUtilisateur' AND motDePasse='$motDePasse'";

    $results = $db->query($requete);
    
    if($enreg = $results->fetch()) {
   
        echo "NOM : " . $enreg["nom"] . "<br/>";
        echo "PRENOM : " . $enreg["prenom"] . "<br/>";
        echo "ADRESSE : " . $enreg["adresse"] . "<br/>";
    } else {
        echo "Paramètres de connexion invalides<br/>";
    }
?>