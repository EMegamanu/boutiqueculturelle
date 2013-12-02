<?php
// Debut de session
session_start();

include_once('inc/header.inc.php');

// Récupération du livre 
$_SESSION['livre'] = $_POST['livre'];

?>
<link rel="stylesheet" href="stylepack.css" />
<body>
       <h1> Etape 2: Choisir un Disque </h1>
	   
	   <p> Vous voila dans la deuxi&#232me etape de votre PACK.</p>
<p>	   Nous vous demanderons de choisir dans la liste ci apr&#232s le Disque que vous souhaitez mettre dans votre pack
     </p>
	 </body>



<center> <form action="Etape3.php" method="POST"> <center>

<select name="musique" id="genre3">
<optgroup label="Pop rock">
<option value="Carrington Street">Carrington Street</option>
<option value="Leaving records">Leaving records</option>
<option value="Melvins">Melvins</option>
<option value="Robert Soul">Robert Soul</option>
<option value="Too wet to plow">Too wet to plow</option>
</optgroup>
<optgroup label="RnB">
<option value="Stuff Like That">Stuff Like That</option>
<option value="Shame Shame Shame">Shame Shame Shame</option>
<option value="Vanguard Visionnaries">Vanguard Visionnaries</option>
<option value="Shake Rattle & Roll in Concert">Shake Rattle & Roll in Concert</option>
<option value="	The Valentines">	The Valentines</option>
</optgroup>
<optgroup label="Classique">
<option value="Sonates pour piano">Sonates pour piano</option>
<option value="Beethoven for all">Beethoven for all</option>
<option value="Kirov classics">Kirov classics</option>
<option value="Concerto pour violon">Concerto pour violon</option>
</optgroup>
</select>


<div>
				<input type="submit" value="Passez à l'étape 3" />
				<input type="reset" value="Annuler" />
</div>
		</form>
		
	<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>	