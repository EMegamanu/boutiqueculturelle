<?php		
	/* Inclusion de l'en-tÃªte. */
	include_once('inc/header.inc.php');
?>
  <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Espace Personnel</title>
    </head>

	<Body>
        <nav class = "Menu-nav">
            <ul>
                <li><a href="#">Mes informations</a></li>
                <li><a href="#">Changer mon mot de passe</a></li>
                <li><a href="#">Changer mon courriel</a></li>
				
            </ul>
        </nav>
        
        <section class ="Commande">
		<Article>
         
                <Center><a href="#"><h1>Mes commandes passees</h1></a></center>
               <Center><a href="#"><h1>Mes commandes en cours</h1></a></center>
	    </article>

        </section>
		</body>
		
	<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>