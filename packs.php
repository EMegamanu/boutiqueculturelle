<?php
include_once('inc/header.inc.php');
?>
<link rel="stylesheet" href="stylepack.css" />
<body>
  <br> <br>
       <h1> Pack culture</h1>
	   
	   <p> Bienvenue dans votre pack.</p>
<p> Cet espace vous permettra de cr&#233er votre pack &#233tape par &#233tape en toute simplicit&#233
     </p>
	 <p> Vous devrez dans un premier temps choisir un CD,puis un DVD et enfin un Livre </p>
	 <p> Quel est l'avantage du Pack? Son prix imbattable de seulement <span class="gras">30</span> euros!! </p>
	 </body>
  
  <form method="get"action="Etape1.php">
  <p><input type="submit" value="Cr&#233er votre pack -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"></form> </p>
 
    <?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>