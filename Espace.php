<?php
    $title = 'Espace Personnel';
	/* Inclusion de l'en-tÃªte. */
	include_once('inc/header.inc.php');
?>
  
      
 

	<Body>
        <nav class = "menu-nav">
            <ul>
                <li><a href="#">Mes informations</a></li>
                <li><a href="#">Changer mon mot de passe</a></li>
                <li><a href="#">Changer mon courriel</a></li>
				
            </ul>
        </nav>
		
        <section class ="commande">
	<table class="results">
			<caption>
				<h2>
					<span class="title">
						<span class="fa fa-caret-square-o-right"></span> Mes commandes
					</span>
				</h2>
			</caption>
			<thead>
				<tr>
					<th>date commande</th>
					<th>Montant</th>
				</tr>
			</thead>
			<tbody>
<?php
		$results = $db->query('SELECT * FROM Facture D JOIN Commande P ON F.idCommande = C.id');
        // $results->setFetchMode(PDO::FETCH_OBJ);
            while($data = $results->fetch()) {
?>
			
				<td><?php echo $data['date commande'];?></td>
				<td><?php echo $data['montant facture'];?></td>
				
			</tr>
<?php
			}
?>
		</tbody>
          
	    

        
		</section>
		</body>
		
	<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>