<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Boutique culturelle - <?php echo $title; ?></title>

		<link rel="stylesheet" href="css/style.css" />
		<link rel="icon" href="img/logo-16.png" />
	</head>

	<body>

	<header>
		<img src="img/logo-64.png" alt="Boutique culturelle" id="logo"/>
		<h1><?php echo $title; ?></h1>

		<nav>
			<ul id="menu-principal">
				<li>
					<a href="disques.php">Disques</a>
					<ul>
						<li><a href="disques.php?cat=cd">CD</a></li>
						<li><a href="disques.php?cat=demat">Dématérialisé</a></li>
					</ul>
				</li>
				<li><a href="films.php">Films</a></li>
				<li><a href="livres.php">Livres</a></li>
				<li><a href="packs.php">Pack Culture</a></li>
				<li><input type="search" name="recherche" placeholder="Tapez votre recherche"/></li>

			</ul>
		</nav>

	</header>