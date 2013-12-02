<?php
    $title = 'Réinitialisation de la base de données';

    // Si l'utilisateur n'est pas admin on le dégage
    session_start();
    if(!$_SESSION['utilisateur']['admin']) {
        header("location: ./");
    }

    /* Inclusion de l'en-tête. */
    include_once('inc/header.inc.php'); 

?>
<section>
<h2>Résultat</h2>
<?php

$log = '';
try {
	/* Inclusion script connexion base de données. */
	$server = 'localhost';
	$dbName = '';

	$dns = 'mysql:host=' . $server;

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
</section>
<?php
    include('inc/footer.inc.php');
?>
