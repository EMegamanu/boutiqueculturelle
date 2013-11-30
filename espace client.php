<!doctype html>
<html lang="fr">
    <head>
	

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
       
        <title>Espace client</title>
<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
	
	<br/> <br/><br/> <br/> <br/> <br/>
	<div id="connexion">
	<center>		<h2>Connexion à votre Espace Client</h2><br/>
                    <div><form action="connexion.php" method="post">
                        <label for="username" >Identifiant:</label>
						

						
						<input name="idUtilisateur" class="required" type="text" size="25"/>
						
                    </div><br/>
                    <div>
                        <label for="password">Mot de passe:</label>
						
						
						<input name="motDePasse" class="required" type="password" value="" size="25" />
                    </div>
                   <br/>
					 <div>

                        <input  name="submit"  value="SE CONNECTER"  type="submit" />
                        <input  name="reset"  value="EFFACER"  type="reset" />
                    </div>
					</center>
	</div>
	
<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>