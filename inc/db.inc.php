<?php
	/*
	 * ATTENTION :
	 * A faire dans un terminal pour les machines sous OS X :
	 * http://hints.macworld.com/article.php?story=20060111113313511
	 */

	/*
	 * Documentation : http://studio.jacksay.com/tutoriaux/php/connection-mysql-avec-pdo
	 */
	try {
		$server = 'localhost';
		$dbName = 'BoutiqueCulturelle';

		$dns = 'mysql:host=' . $server . ';dbname=' . $dbName;

		$user = 'Ciceron';
		$password = '106AVJC';

		$connection = new PDO($dns, $user, $password);
	} catch (Exception $e) {
?>
<pre>
<?php
	    echo 'Exception reçue : ',  $e->getMessage(), "\n";
?>
</pre>
<?php
	}
?>