<?php
	/* Définition des variables. */
	$title = 'Administration';
	$subtitle = ''; 
	$page  = $_GET['p'];
	$cat   = $_GET['cat'];

	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');

	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');

	/* Corps. */
?>
<ul>
	<li><a href="admin.php?p=utilisateurs">Utilisateurs</a></li>
	<li><a href="admin.php?p=commandes">Commandes</a></li>
	<li><a href="admin.php?p=factures">Factures</a></li>
	<li>Produits 
		<ul>
			<li><a href="admin.php?p=categories">Catégories</a></li>
			<li>--</li>
			<li><a href="admin.php?p=produits&amp;cat=disques">Disques</a></li>
			<li><a href="admin.php?p=produits&amp;cat=films">Films</a></li>
			<li><a href="admin.php?p=produits&amp;cat=livres">Livres</a></li>
			<li>--</li>
			<li><a href="admin.php?p=produits&amps;cat=packs">Packs</a></li>
		</ul>
	</li>
</ul>
<?php

	switch($page) {
		case 'utilisateurs':
			$subtitle = 'Utilisateurs';
		break;
		case 'commandes':
			$subtitle = 'Commande';
		break;
		case 'factures':
			$subtitle = 'Facture';
		break;
		case 'categories':
			$results = $connection->query('SELECT * FROM Categorie');
			$results->setFetchMode(PDO::FETCH_OBJ);
?>
			<h2><?php echo 'Catégories de produits.';?></h2>
			<table>
				<thead>
					<th>#</th>
					<th>Nom</th>
				</thead>
				<tbody>
<?php
			while($row = $results->fetch()) {
?>
				<tr>
					<td><?php echo $row->id;?></td>
					<td><?php echo $row->nom;?></td>
				</tr>
<?php
			}
?>

				</tbody>
			</table>
<?php
		break;
		case 'produits':
			switch($cat) {
				case 'disques':
					$subtitle = 'Produits : disques';
				break;
				case 'films':
					$subtitle = 'Produits : films';
				break;
				case 'livres':
					$subtitle = 'Produits : livres';
				break;
				case 'packs':
					$subtitle = 'Produits : packs';
				break;
				default:
			}
		break;
		default:
	}
?>
<h2><?php echo $subtitle;?></h2>
<?php
	include('inc/footer.inc.php');
?>