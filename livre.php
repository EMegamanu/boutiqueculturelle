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

</br></br></br></br></br>
<nav id="menu2">
	<ul class="menu">
		<li  classe ="item3">Genre
			<ul>
				<li><a href="#manga">Manga</a></li>
				<li><a href="#BD">BD</a></li>
				<li><a href="#Roman Policier">Roman Policier</a></li>
				<li><hr /></li>
				<li><a href="#" class="reset">Tout</a></li>
			</ul>
		</li>	
	</ul>
</nav>
<div>
	<h2><?php echo 'Livre';?></h2>
	<table id="tableau-catalogue" class="results tablesorter">
		<thead>
			<tr>
				<th>Pochette/Couverture</th>
				<th>Nom</th>
				<th>Genre</th>
				<th>Auteur</th>
				<th>Date de Parution</th>
				<th>Prix</th>
			</tr>
		</thead>
		<tbody>
		<tr>
<?php
		$results = $db->query('SELECT * FROM Livre D JOIN Produit P ON D.id = P.id');
        // $results->setFetchMode(PDO::FETCH_OBJ);
            while($data = $results->fetch()) {
        print_r($row);
?>
			<td class="image">
                <img src="<?php echo $data['image'];?>" alt=""/>
            </td>
			<td><?php echo $data['nom'];?></td>
			<td><?php echo $data['genre'];?></td>
			<td><?php echo $data['auteur'];?></td>
			<td><?php echo $data['dateParution'];?></td>
			<td><?php echo $data['prixHT'];?></td>
		</tr>
<?php
			}
?>
	</tbody>
	</table>
	 <nav class="pager">
		<form>
			<img src="img/jquery.tablesorter/pager/icons/first.png" class="first" />
			<img src="img/jquery.tablesorter/pager/icons/prev.png" class="prev" />
			<span class="pagedisplay"></span>
			<img src="img/jquery.tablesorter/pager/icons/next.png" class="next" />
			<img src="img/jquery.tablesorter/pager/icons/last.png" class="last" />
			<select class="pagesize">
				<option selected="selected" value="5">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="30">30</option>
				<option value="40">40</option>
			</select>
		</form>
	</nav>
</div>
<?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>
</div>
<?php
	/* Inclusion du pied de page. */
	include_once('inc/footer.inc.php');
?>

