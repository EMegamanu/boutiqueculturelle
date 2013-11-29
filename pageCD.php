
<?php		
/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
?>
<script scr="js/genre.js"></script>
<nav id="menu2">
			<ul>
				<li><a href="#pop-rock">Pop-Rock</a></li>
				<li><a href="#rnb">RnB</a></li>
				<li><a href="#classique">Classique</a></li>
				<li><hr /></li>
				<li><a href="#" class="reset">Tout</a></li>
			</ul>
</nav>

<div>
	<h2><?php echo 'Disque';?></h2>
	 <table id="tableau-catalogue" class="results tablesorter">
	 	<thead>
	        <tr>
	            <th>Pochette/Couverture</th>
	            <th>Nom</th>
	            <th>Genre</th>
	            <th>Compositeur</th>
	            <th>Annee de Production</th>
	            <th>Prix</th>
	        </tr>
    	</thead>
    	<tbody>
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

