
<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
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
	
<br/> <br/><br/> 
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
	<table id="tableau-catalogue" classe="results" border="1">

        <tr>
            <th>Pochette/Couverture</th>
            <th>Nom</th>
            <th>Genre</th>
            <th>Compositeur</th>
            <th>Annee de Production</th>
        </tr>
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

