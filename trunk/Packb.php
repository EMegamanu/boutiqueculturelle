<?php
include_once('inc/header.inc.php');
?>
<link rel="stylesheet" href="stylepack.css" />
<body>
  <br> <br>
       <h1> Pack culture</h1>
	   <p> Bienvenue dans votre pack.</p>
<p> Cet espace vous permettra de cr&#233er votre pack &#233tape par &#233tape en toute simplicit&#233.
     </p>
	 <p> Vous devrez dans un premier temps choisir un CD,puis un DVD et enfin un Livre. </p>
	 <p> Quel est l'avantage du Pack? Sa réduction de <span class="gras">10</span> %!! </p>
	 </body>
  
  <form method="get"action="Etape1.php">
  <p><input type="submit" value="Cr&#233er votre pack -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"></form> </p>
 
 <center> <a href="."><img src="Livre_dvd_cd.jpg"/> <center>

 <?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>