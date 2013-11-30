<?php
include_once('inc/header.inc.php');;
?>
<link rel="stylesheet" href="stylepack.css" />

  <h1> Etape 3: Choisir un Livre </h1>
	   
	   <p> Vous voila dans la deuxi&#232me etape de votre PACK.</p>
<p>	   Nous vous demanderons de choisir dans la liste ci apr&#232s le Livre que vous souhaitez mettre dans votre pack
     </p>



<center><?php
include_once('livres.php');
?><center>
<form method="get"action="recapitulatif.php">
  
  <p align ="center"><input type="submit" value="Terminer -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"></form> </p>




  <?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>