<!DOCTYPE html>
<html lang="fr">
    <head>
	

	<meta charset="utf-8"/>
       
        <title>Inscription</title>
<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
	
	<br/> <br/>
</div>
			<h2>Inscription</h2>

<form action="nouveau_client.php" "method="post">
	<div><label>Nom*:&nbsp;&nbsp;</label><input type="text" placeholder="Ex. DUPONT"size=20 maxlength=30 name="nom"/></div>
	<div> <label>Pr&#233nom*:&nbsp;&nbsp;<label/><input type="text" placeholder="Ex. Nicolas"size=20 maxlength=30 name="prenom"/></div>
	<div><label>Identifiant*:&nbsp;&nbsp;</label><input type="text" size=20 maxlength=30 name="idUtilisateur"/></div>
<div><label>Adresse*:&nbsp;&nbsp;</label><input type="text" maxlength=50 name="Adresse"/></div>
<div><label>Ville*:&nbsp;&nbsp;</label/><input type="text"size=20 maxlength=30 name="Ville"/></div>
<div><label>CP*:&nbsp;&nbsp;</label><input type="text"size=10 maxlength=5 name="CP"/></div>

<div><label>Adresse email*:&nbsp;&nbsp;</label><input type="email" placeholder="Ex. dupont@gmail.com"size=20 maxlength=40 name="email"/></div>
<div><label>Mot de passe*:&nbsp;&nbsp;</label><input type="password"size=20 maxlength=20 name="motdepasse"/></div>
<div><label>Confirmer mot de passe*:&nbsp;&nbsp;</label><input type="password""size=20 maxlength=20 name="motdepasse2"/></div>
<div>
 <input type="submit" value="Envoyer" />
 <input type="reset" value="Annuler" />
 </div>
<br/></form>
<br/> <br/><br/> <br/><br/><br/> <br/><br/> <br/><br/> 
<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>