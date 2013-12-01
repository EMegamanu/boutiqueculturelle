<?php
	date_default_timezone_set('Europe/Paris');
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Boutique culturelle - <?php echo $title; ?></title>

		<link rel="stylesheet" href="css/style.css" />
		<link rel="icon" href="img/logo-16.png" />

		<!-- Bibliothèques. -->
		<script src="js/jquery/jquery-2.0.3.min.js"></script>

		<!-- Éléments d'interfaces, dont DatePicker. -->
		<script src="js/jquery/jquery-ui.min.js"></script>
		<script src="js/jquery/jquery-ui-i18n.min.js"></script> <!-- Pour langues étrangères, dont Français -->

		<!-- Tri, filtres et pagination des tableaux. -->
		<script src="js/jquery/jquery.tablesorter.min.js"></script>
		<script src="js/jquery/jquery.tablesorter.widgets.min.js"></script>
		<script src="js/jquery/jquery.tablesorter.pager.min.js"></script>
		
		<!-- Compatibilité de localStorage sur vieux navigateurs via les cookies. -->
		<!-- 
		<script src="js/jquery/jcookie-min.js"></script>
		<script src="js/jquery/jstorage.min.js"></script>
 		-->
		<script src="js/jquery/jquery.cookie.js"></script>
		<link rel="stylesheet" href="css/jquery-ui/base/jquery-ui.css" />
		<link rel="stylesheet" href="css/jquery.tablesorter/theme.default.css" />
		<link rel="stylesheet" href="css/jquery.tablesorter/jquery.tablesorter.pager.css" />

		<link rel="stylesheet" href="css/font-awesome/font-awesome.min.css" />

		<script src="js/init.js"></script>
	</head>

	<body>

	<header>
		<h1>
			<a href="."><img src="img/logo-64.png" alt="Boutique culturelle" id="logo"/></a>
			<span class="title-group">
				<span class="title">Boutique culturelle - <?php echo $title; ?></span>
				<span class="subtitle">
					Bienvenue sur votre site de référence pour 
					l'achat de vos biens culturels en ligne.
				</span>
			</span>
		</h1>
		<nav id="espace-client">
			<ul>
<?php
	if($connecte) {
?>
				<li>
					<a href="espace-client.php" tabindex="61">
						<span class="fa fa-user"></span>
						<span class="libelle-lien">Espace client</span>
					</a>
				</li>
				<li>
					<a href="deconnexion.php" tabindex="71">
						<span class="fa fa-sign-out"></span>
						<span class="libelle-lien">Déconnexion</span>
					</a>
				</li>
<?php
	} else {
?>
				<li>
					<a href="inscription.php" tabindex="61">
						<span class="fa fa-user"></span>
						<span class="libelle-lien">Inscription</span>
					</a>
				</li>
				<li>
					<a href="connexion.php" tabindex="71">
						<span class="fa fa-sign-in"></span>
						<span class="libelle-lien">Connexion</span>
					</a>
				</li>
<?php
	}
?>
				<li>
					<a href="panier.php" tabindex="81">
						<span class="fa fa-shopping-cart"></span>
						<span class="libelle-lien">Panier (<span class="nb-articles">0</span>)</span>
					</a>
				</li>
			</ul>
		</nav>
	</header>
		
	<nav id="menu-principal">
		<ul>
			<li><a href="disques.php" tabindex="1">Disques</a></li>
			<li><a href="films.php" tabindex="11">Films</a></li>
			<li><a href="livres.php" tabindex="21">Livres</a></li>
			<li><a href="packs.php" tabindex="31">Pack Culture</a></li>
			<li><a href="admin.php" tabindex="41">Administration</a></li>
			<li class="search-item"><input type="search" name="recherche" placeholder="Tapez votre recherche" tabindex="51"/></li>
		</ul>
	</nav>