<?php
include_once('inc/header.inc.php');
?>
<link rel="stylesheet" href="stylepack.css" />

 <body>
       <h1> Etape 1: Choisir un CD </h1>
	   
	   <p> Vous voila dans la premi&#232re etape de votre PACK.</p>
<p>	   Nous vous demanderons de choisir dans la liste ci apr&#232s le CD que vous souhaitez mettre dans votre pack
     </p>
	 </body>

<center><?php
include_once('disques.php');
?><center>
 <form method="get"action="Etape2.php">
  <p> <input type="submit" value="Passez &#224 l'etape 2 -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"> </p></form> 

  
  
<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>

