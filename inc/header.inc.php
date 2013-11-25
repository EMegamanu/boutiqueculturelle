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
		<nav id="menu-principal">
			<ul>
				<li>
					<a href="disques.php" tabindex="1">Disques</a>
					<ul>
						<li><a href="disques.php?cat=cd">CD</a></li>
						<li><a href="disques.php?cat=mp3">MP3</a></li>
					</ul>
				</li>
				<li>
					<a href="films.php" tabindex="11">Films</a>
					<ul>
						<li><a href="films.php?cat=dvd">DVD</a></li>
						<li><a href="films.php?cat=bluray">Blu-ray</a></li>
					</ul>
				</li>
				<li>
					<a href="livres.php" tabindex="21">Livres</a>
					<ul>
						<li><a href="livres.php?cat=relie">Reliés</a></li>
						<li><a href="livres.php?cat=ebook">E-books</a></li>
					</ul>
				</li>
				<li><a href="packs.php" tabindex="31">Pack Culture</a></li>
				<li><a href="admin.php" tabindex="41">Administration</a></li>
				<li class="search-item"><input type="search" name="recherche" placeholder="Tapez votre recherche" tabindex="51"/></li>
			</ul>
		</nav>

	</header>