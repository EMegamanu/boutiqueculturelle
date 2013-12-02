<?php
$title = 'Espace Personnel'; 
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
 
	/* Inclusion de l'en-tÃªte. */
	include_once('inc/header.inc.php');
?>
  
      
 

	<Body>
        <nav class = "menu-nav">
            <ul>
                <li><a href="Informations.php">Mes informations</a></li>
                <li><a href="contact.php">SAV</a></li>
				
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
		$results = $db->query('SELECT * FROM Facture F,Commande C,Utilisateur U Where F.idCommande = C.id and C.idUtilisateur= U.id');
        // $results->setFetchMode(PDO::FETCH_OBJ);
            while($data = $results->fetch()) {
?>
			
				<td><?php echo $data['date'];?></td>
				<td><?php echo $data['montant'];?></td>
				
			</tr>
<?php
			}
?>
		</tbody>
        </table>
		</section>
		</body>
		
	<?php
    /* Inclusion du pied de page. */
    include_once('inc/footer.inc.php');
?>