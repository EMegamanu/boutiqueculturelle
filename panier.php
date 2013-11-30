<?php
	$titre = 'Panier';

	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>

<section>
		<?php 
		$articles =  json_decode($_COOKIE['articles']);
?>
<pre>
<?php
		print_r($articles);
            echo "\n";
            echo "\n";
?>
</pre>
<?php
		$nbArticles = count($articles);

		if($nbArticles > 0) {
			$requete = 'SELECT * FROM Produit WHERE id = :article_0';

			for($i = 1; $i < $nbArticles; $i++) {
				$requete .= ' OR id = :article_' . $i;
			}

            echo '<pre>';
			print_r($articles);
            echo "\n";

			$results = $db->prepare($requete);

			for($i = 0; $i < $nbArticles; $i++) {
				$results->bindParam(':article_' . $i, $articles[$i]);
			}
			$results->execute();

            echo "\n";
     
            print_r($articles);
            echo "\n";
            echo "\n";
            echo "\n";
            print_r($results);
            echo "\n";
            echo "\n";
            echo "\n";
		}

        // $results->setFetchMode(PDO::FETCH_OBJ);
            while($data = $results->fetch()) {
            	print_r($data);
            }

            echo '</pre>';
		?>

</section>

<?php
	include_once('inc/footer.inc.php');
?>