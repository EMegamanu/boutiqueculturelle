<?php
include_once('inc/header.inc.php');;
?>

  <h1 align="center"> Etape 3: Choisir un Livre </h1>
	   
	   <p align="center"> Vous voila dans la deuxi&#232me etape de votre PACK.</p>
<p align="center">	   Nous vous demanderons de choisir dans la liste ci apr&#232s le Livre que vous souhaitez mettre dans votre pack
     </p>


  
  <div id="menu2">
	<ul>
		<li><a href="#">Tout</a></li>
		<li><a href="#">Manga</a></li>
		<li><a href="#">BD</a></li>
		<li><a href="#">Romans</a></li>
	</ul>
</div>

<form method="get"action="recapitulatif.php">
  
  <p align ="center"><input type="submit" value="Terminer -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"></form> </p>
  
  <?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>