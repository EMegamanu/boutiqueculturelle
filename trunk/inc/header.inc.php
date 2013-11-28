<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Boutique culturelle - <?php echo $title; ?></title>

		<link rel="stylesheet" href="css/style.css" />
		<link rel="icon" href="img/logo-16.png" />

		<!-- Bibliothèques. -->
		<script src="js/jquery/jquery-2.0.3.min.js"></script>
		<script src="js/jquery/jquery-ui.min.js"></script>
		<script src="js/jquery/jquery-ui-i18n.min.js"></script> <!-- Localisation de jQuery-ui -->
		<script src="js/jquery/jquery.tablesorter.min.js"></script>
		<script src="js/jquery/jquery.tablesorter.widgets.min.js"></script>
		<script src="js/jquery/jquery.tablesorter.pager.min.js"></script>


		<link rel="stylesheet" href="css/jquery-ui/base/jquery-ui.css" />
		<link rel="stylesheet" href="css/jquery.tablesorter/theme.default.css" />
		<link rel="stylesheet" href="css/jquery.tablesorter/jquery.tablesorter.pager.css" />

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
			<div id="espace_client">
				<ul>
					<li><a href="inscription.php">Inscription</a></li>
					<li><a href="Connexion">Espace client</a></li>
				</ul>
			</div>
		</h1>
		
		<nav id="menu-principal">
			<ul>
				<li><a href="pageCD.php" tabindex="1">Disques</a></li>
				<li><a href="DVD.php" tabindex="11">Films</a></li>
				<li><a href="livre.php" tabindex="21">Livres</a></li>
				<li><a href="packs.php" tabindex="31">Pack Culture</a></li>
				<li><a href="admin.php" tabindex="41">Administration</a></li>
				<li class="search-item"><input type="search" name="recherche" placeholder="Tapez votre recherche" tabindex="51"/></li>
			</ul>
		</nav>

	</header>