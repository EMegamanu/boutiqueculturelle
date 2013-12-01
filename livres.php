<?php		
	$title = 'Livres';
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');

?>
<nav id="menu2">
	<ul>
		<li><a href="#" class="reset">Tout</a></li>
		<li><hr /></li>
		<li><a href="#manga">Manga</a></li>
		<li><a href="#bd">BD</a></li>
		<li><a href="#roman_policier">Roman Policier</a></li>
	</ul>
</nav>
<div>
	<h2><?php echo 'Livres';?></h2>
	<table id="tableau-catalogue" class="results tablesorter">
		<thead>
			<tr>
				<th><span class="fa fa-shopping-cart"><span class="hidden">Panier</span></span></th>
				<th>Pochette/Couverture</th>
				<th>Nom</th>
				<th>Genre</th>
				<th>Auteur</th>
				<th>Date de Parution</th>
				<th>Prix</th>
			</tr>
		</thead>
		<tbody>
<?php
		$results = $db->query('SELECT * FROM Livre D JOIN Produit P ON D.id = P.id');
        // $results->setFetchMode(PDO::FETCH_OBJ);
            while($data = $results->fetch()) {
?>
			<tr data-id="<?php echo $data['id']; ?>">
				<td class="ajout-panier">
					<a href="panier.php?ajout=<?php echo $data['id']; ?>" class="fa fa-square-o">
						<span class="hidden action">+</span>
					</a>
					<!-- Affichage / Masquage au niveau d'un parent du input pour compatibilité avec méthode de rabatage via JQuery. -->
					<span class="nb">
						<input type="number" min="0" max="999" name="nb-<?php echo $data['id']; ?>" value="0" />
					</span>
				</td>
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
			<img src="img/jquery.tablesorter/pager/icons/first.png" alt="<<" class="first" />
			<img src="img/jquery.tablesorter/pager/icons/prev.png" alt="<" class="prev" />
			<span class="pagedisplay"></span>
			<img src="img/jquery.tablesorter/pager/icons/next.png" alt=">" class="next" />
			<img src="img/jquery.tablesorter/pager/icons/last.png" alt=">>" class="last" />
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
