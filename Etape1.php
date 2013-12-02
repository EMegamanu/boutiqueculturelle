<?php
session_start();

include_once('inc/header.inc.php');
?>
<link rel="stylesheet" href="stylepack.css" />

 <body>
       <p id= "pack"> Etape 1: Choisir un Livre </p>
	   
	   <p> Vous voila dans la premi&#232re etape de votre PACK.</p>
<p>	   Nous vous demanderons de choisir dans la liste ci apr&#232s le livre que vous souhaitez mettre dans votre pack
     </p>
	 </body>
<center><form action="Etape2.php" method="post">		

<select name="livre" id="genre1">
<optgroup label="Manga">
<option value="Naruto">Naruto</option>
<option value="Death Note">Death Note</option>
<option value="Nanami">Nanami</option>
<option value="King">King</option>
</optgroup>
<optgroup label="BD">
<option value="Tintin">Tintin</option>
<option value="Titeuf">Titeuf</option>
<option value="Legendaire">Legendaire</option>
<option value="Triple galop">Triple galop</option>
<option value="Game over">Game over</option>
</optgroup>
<optgroup label="Roman policier">
<option value="Absence">Absence</option>
<option value="Autre monde">Autre monde</option>
<option value="L'oeil de la lune">L'oeil de la lune</option>
<option value="La malédiction">La malediction</option>
<option value="Harlan promets moi Coben">Harlan promets moi Coben</option>
</optgroup>
</select>



<div>
				<input type="submit" value="Passez à l'étape 2" />
				<input type="reset" value="Annuler" />
</div>
		</form> <center>
		
	

  
  
<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>