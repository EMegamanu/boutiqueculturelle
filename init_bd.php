<?php
    $title = 'Réinitialisation de la base de données';
    /* Inclusion de l'en-tête. */
    include_once('inc/header.inc.php');
?>
<h2>Résultat</h2>
<?php

$log = '';
try {
	/* Inclusion script connexion base de données. */
	$server = 'localhost';
	$dbName = '';

	$dns = 'mysql:host=' . $server . ';charset=UTF-8';

	$user = 'root';
	$password = $_POST['mot_de_passe'];

	$db = new PDO($dns, $user, $password);

    $file = file_get_contents('private/script.sql');

    /* Tableau de requêtes. */
    $queries = explode(";", $file);

    for ($i = 0; $i < count($queries) ; $i++) {
        $query = $queries[$i] . ';';
        
    	$log .= $query;
    	$db->exec($query);    
    }
?>
    <p class="success result">Base de données réinitialisée</p>
<?php
} catch(Exception $e) {
?>
    <p class="fail result">Problème à la réinitialisation de la base de données.</p>
<?php
    $log .= 'Exception reçue : ' .  $e->getMessage();
}
?>

<h2>Trace</h2>
<pre class="log"><?php echo $log; ?></pre>
<?php
    include('inc/footer.inc.php');
?>
