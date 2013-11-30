<?php
include_once('inc/header.inc.php');
?>
<link rel="stylesheet" href="stylepack.css" />
   <br> <br> 
<body>
  <h1> Etape 2: Choisir un DVD </h1>
	   
	   <p> Vous voila dans la deuxi&#232me etape de votre PACK.</p>
<p>	   Nous vous demanderons de choisir dans la liste ci apr&#232s le DVD que vous souhaitez mettre dans votre pack
     </p>
</body>  
 <center><?php
include_once('films.php');
?><center>
<form method="get"action="Etape3.php">
  
  <p align ="center"><input type="submit" value="Passez &#224 l'etape 3 -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"></form> </p>
 
 
 
 <?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>

