<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf8" />
	<title>Projet Pâté</title>
</head>
<body>
<h1>Projet Pâté</h1>
<p>pâté</p>
<div>
<?php
	// on se connecte à MySQL
	$db = mysql_connect('localhost', 'root', '');
	mysql_set_charset('utf8');

	// on sélectionne la base
	mysql_select_db('boutiqueculturelle',$db);

	// on crée la requête SQL
	$sql = 'SELECT * FROM test';

	// on envoie la requête
	$req = mysql_query($sql) 
		or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

	// on fait une boucle qui va faire un tour pour chaque enregistrement
	while($data = mysql_fetch_assoc($req)) {
    	// on affiche les informations de l'enregistrement en cours
		print_r($data);
?>
	<br />
<?php
    	}

// on ferme la connexion à mysql
mysql_close();
?> 
</div>
</html>
