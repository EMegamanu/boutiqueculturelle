<?php
	$title = 'Films'; 
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');
	/* Inclusion de l'en-tête. */
	include_once('inc/header.inc.php');
	session_start();

?>
<table class="results">
			<caption>
				<h2>
					<span class="title">
						<span class="fa fa-caret-square-o-right"></span> Mes Informations 
					</span>
				</h2>
			</caption>
			<thead>
				<tr>
					<td>id</td>
					<td>Nom</td>
					<td>Prénom</td>
					<td>Rue</td>
					<td>CP</td>
					<td>Ville</td>
					<td>Email</td>
				</tr>
			</thead>
			<tbody>
<?php		
		$results = $db->query(
  	'SELECT * FROM Utilisateur '.
  	'WHERE id = ' . $_SESSION['utilisateur']['id']
);
    	while($data = $results->fetch()) {
?>
			<tr data-id="<?php echo $data['id']; ?>">
				<td><?php echo $data['id'];?></td>
				<td><?php echo $data['nom'];?></td>
				<td><?php echo $data['prenom'];?></td>
				<td><?php echo $data['rue'];?></td>
				<td><?php echo $data['cp'];?></td>
				<td><?php echo $data['ville'];?></td>
				<td><?php echo $data['courriel'];?></td>
			</tr>
<?php
			}
?>
		</tbody>
</table>
<?php
	/* Inclusion du pied de page. */
	include_once('inc/footer.inc.php');
?>
