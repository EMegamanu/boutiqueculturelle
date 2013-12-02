<?php
include_once('inc/header.inc.php');
?>

    <h1> Etape 1: Choisir un CD </h1>
	   <p > Vous voila dans la premi&#232re etape de votre PACK.</p>
    <p>	Nous vous demanderons de choisir dans la liste ci-après le CD que vous souhaitez mettre dans votre pack.</p>	 
  <form method="get"action="ladeuxiemeetape.php">
  <p> <input type="submit" value="Passez &#224 l'etape 2 -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"> </form> </p>
  	 
<div id="menu2">
	<ul>
                <li><a href="#">Pop-Rock</a></li>
                <li><a href="#">RnB</a></li>
                <li><a href="#">Classique</a></li>
                <li><a href="#">Tout</a></li>
	</ul>
<div/>

<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>

