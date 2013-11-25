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
<section id="section-admin">
	<nav>
		<ul>
			<li><a href="admin.php?p=bd">Base de données</a></li>
			<li><hr /></li>
			<li><a href="admin.php?p=utilisateurs">Utilisateurs</a></li>
			<li><a href="admin.php?p=commandes">Commandes</a></li>
			<li><a href="admin.php?p=factures">Factures</a></li>
			<li>Produits 
				<ul>
					<li><a href="admin.php?p=categories">Catégories</a></li>
					<li><hr /></li>
					<li><a href="admin.php?p=produits&amp;cat=disques">Disques</a></li>
					<li><a href="admin.php?p=produits&amp;cat=films">Films</a></li>
					<li><a href="admin.php?p=produits&amp;cat=livres">Livres</a></li>
					<li><hr /></li>
					<li><a href="admin.php?p=produits&amp;cat=packs">Packs</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<article>
<?php

	switch($page) {
		case 'bd':
			$subtitle = 'Base de données';
?>
		<h2>Base de données</h2>
		<h3>Réinitialiser</h3>
		<p>
			<strong>Attention :</strong> La réinitialisation de la base de données effacera l'ensemble des données qui n'ont pas été exportées 
			dans le fichier script.sql.
		</p>
		<p>
			Pensez à préparer votre jeu d'essai dans ce fichier.
		</p>
		<p></p>
		<form action="init_bd.php" method="post">
			<fieldset>
				<legend>Paramètres de connexion</legend>
				<label for="mot_de_passe">Mot de passe 'root'</label> :
				<input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Vide par défaut" />
			</fieldset>
			<div>
				<input type="submit" value="Réinitialiser la base" />
			</div>
		</form>
<?php
		break;
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
			$results = $db->query('SELECT * FROM Categorie');
			$results->setFetchMode(PDO::FETCH_OBJ);
?>
				<h2><?php echo 'Catégories de produits.';?></h2>
				<table class="results">
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
			$categorieResult = $db->query(
				'SELECT id FROM Categorie ' .
				'WHERE nom LIKE "Disque"'
			);
			$categorieResult->setFetchMode(PDO::FETCH_OBJ);
			$categorieId = $categorieResult->fetch()->id;

			$supportsResult = $db->query(
				'SELECT * FROM Support ' .
				'WHERE idCategorie = ' . $categorieId
			);
			$supportsResult->setFetchMode(PDO::FETCH_OBJ);
			$date = new DateTime("now", new DateTimeZone('Europe/Paris'));
?>				
		<form action="ajout_produit.php" method="post" enctype="multipart/form-data">
			<div class="field-group">
				<label for="nom">Nom</label> : 
				<input type="text" id="nom" name="nom" />
			</div>
			<div class="field-group">
				<input type="hidden" id="categorie" name="categorie" value="<?php echo $idCategorie; ?>"/>
			</div>
			<div class="field-group">
				<label for="support">Support</label> :
				<select id="support" name="support">

<?php
				while($support = $supportsResult->fetch()) {
?>
					<option value="<?php echo $support->id; ?>"><?php echo $support->nom; ?></option>
<?php
				}
?>
				</select>
			</div>

			<div class="field-group">
				<label for="prix-ht">Prix HT</label> : 
				<input type="number" id="prix-ht" name="prix-ht" step="any" />
			</div>

			<div class="field-group">
				<label for="genre">Genre</label> : 
				<input type="text" id="genre" name="genre" />
			</div>
			<div class="field-group">
				<label for="compositeur">Compositeur</label> : 
				<input type="text" id="compositeur" name="compositeur" />
			</div>
			<div class="field-group">
				<label for="annee-production">Année de production</label> : 
				<input type="number" id="annee-production" name="annee-production" step=1 min=1900 max=<?php echo $date->format('Y');?> />
			</div>
			<div class="field-group">
				<label for="image">Image</label> : 
				<input type="file" id="image" name="image" accept="image/png, image/jpeg"/>
			</div>
			<div>
				<input type="submit" value="Ajouter" />
			</div>
		</form>
<?php
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
<!-- <h2><?php echo $subtitle;?></h2> -->
</article>
</section>
<?php
	include('inc/footer.inc.php');
?>