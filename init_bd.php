<?php
    /* Inclusion de l'en-tête. */
    include_once('inc/header.inc.php');
?>
<style>
    pre.log {
        max-height: 300px;
        overflow-y: scroll;
        border: solid 1px #000000; 
    }

    p.result {
        font-weight: bold;
    }

    p.success {
        color: #006600;
    }

    p.fail {
        color: #FF0000;
    }
</style>
<h2>Trace</h2>
<pre class="log">
<?php
try {
	/* Inclusion script connexion base de données. */
	$server = 'localhost';
	$dbName = '';

	$dns = 'mysql:host=' . $server . ';charset=UTF-8';

	$user = 'root';
	$password = $_POST['mot_de_passe'];

	$db = new PDO($dns, $user, $password);

    $file = file_get_contents('private/script.sql');

    $queries = explode(";", $file);

    for ($i = 0; $i < count($queries) ; $i++) {
        $query = $queries[$i] . ';';
        
        if ($query != '') {
        	echo $query;
        	$db->exec($query . ';');  
        }  
    }
?>
        
    </pre>
    <p class="success result">Base de données réinitialisée</p>
<?php
} catch(Exception $e) {
?>
    </pre>
    <p class="fail result">Problème à la réinitialisation de la base de données.</p>
<?php
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
    exit();
}
    include('inc/footer.inc.php');
?>
