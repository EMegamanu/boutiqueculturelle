
<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
<script language="JavaScript" src="js/genre.js"></script>
		<script>
			/* Au chargement de la page achevé... */
			$(function() {
				/* Initialisation de jQuery.tablesorter pour tous les tableaux de résultat. */
				$("table.results").each(function() {
					var $table = $(this);
					$table.tablesorter();
				})			
			});
		</script>
</br></br></br></br>	 
<div id="menu2">

	<ul class="menu">
		<li  classe ="item1"><a href="#">Disques</a>

			<ul class= "shown">
				<li><a href="#">Pop-Rock </a></li>
				<li><a href="#">RnB </a></li>
				<li><a href="#">Classique </a></li>
			</ul>
		</li>
		<li  class ="item2"><a href="DVD.php">Films</a>
			<ul class= "hidden">
				<li><a href="#">Action </a></li>
				<li><a href="#">Comédie </a></li>
				<li><a href="#">Jeunesse </a></li>
			</ul>
		</li>
		<li  class="item3"><a href="livre.php">Livres</a>
			<ul class= "hidden">
				<li><a href="#">Manga </a></li>
				<li><a href="#">BD</a></li>
				<li><a href="#">Roman  </a></li>
				<li><a href="#">Policier </a></li>
			</ul>
		</li>
	</ul>
</div>
<div>
<h2><?php echo 'Disque';?></h2>
Search <button type="button" data-filter-column="3" data-filter-text="RNB">RNB</button>
	 <table id="tableau-catalogue" class="results" class="tablesorter" border="1">
	 	<thead>
        <tr>
            <th data-placeholder="" class="filter-false">Pochette/Couverture</th>
            <th data-placeholder="" class="filter-match">Nom</th>
            <th data-placeholder="">Genre</th>
            <th data-placeholder="">Compositeur</th>
            <th data-placeholder="">Annee de Production</th>
            <th data-placeholder="">Prix</th>
        </tr>
    	</thead>
        <tr>
<?php
        $results = $db->query('SELECT * FROM Disque D JOIN Produit P ON D.id = P.id');
        // $results->setFetchMode(PDO::FETCH_OBJ);
            while($data = $results->fetch()) {
        print_r($row);
?>
            <td class="image">
                <img src="<?php echo $data['image'];?>" alt=""/>
            </td>
            <td><?php echo $data['nom'];?></td>
            <td><?php echo $data['genre'];?></td>
            <td><?php echo $data['compositeur'];?></td>
            <td><?php echo $data['anneeProduction'];?></td>
            <td><?php echo $data['prixHT'];?></td>
        </tr>
<?php
            }
?> 
    </table>
</div>
<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>

