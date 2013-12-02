<?php
// Début de session
session_start();

include_once('inc/header.inc.php');

// Récupération de la musique 
$_SESSION['musique'] = $_POST['musique'];

?>	
<link rel="stylesheet" href="stylepack.css" />

<center> <form action="recapitulatifcopie.php" method="post"><center>
<body>
       <p id="pack"> Etape 3: Choisir un film </p>
	   
	   <p> Vous voila dans la troisi&#232me etape de votre PACK.</p>
<p>	   Nous vous demanderons de choisir dans la liste ci apr&#232s le film que vous souhaitez mettre dans votre pack
     </p>
	 </body>



<div>
<select name="dvd" id="genre2">
<optgroup label="Action">
<option value="Taken2"> Taken 2</option>
<option value="Heritage">Heritage</option>
<option value="Fast and furious 6">Fast and furious 6</option>
<option value="James bond">James bond</option>
<option value="Etalon noir">Etalon noir</option>
</optgroup>
<optgroup label="Comedie">
<option value="very bad trip">very bad trip</option>
<option value="Ted">Ted</option>
<option value="Bienvenue à bord">Bienvenue à bord</option>
<option value="Les seigneurs">Les seigneurs</option>
<option value="Sexe entre amis">Sexe entre amis</option>
</optgroup>
<optgroup label="Jeunesse">
<option value="Mission G">Mission G</option>
<option value="Noel">Noel</option>
<option value="Le monde de narnia">Le monde de narnia</option>
<option value="Pirates des caraibes">Pirates des caraibes</option>
<option value="Lizzie Mc guire">Lizzie Mc guire</option>
</optgroup>
</select>
</div>

<div>
				<input type="submit" value="Terminer" />
				<input type="reset" value="Annuler" />
</div>
		</form>
		
<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>		