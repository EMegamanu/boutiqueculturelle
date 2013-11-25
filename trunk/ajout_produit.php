<pre>
<?php
	print_r($_POST);
	print_r($_FILES);

	if(isset($_FILES['image'])) { 
	     $dossier = getcwd() . '/img/disques/';
	     $fichier = basename($_FILES['image']['name']);
	     if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) {
	          echo 'Image enregistrée à : ' . $dossier . $fichier;
	     } else  {
	          echo 'Echec de l\'envoi d\'image. !';
	     }
	}
?>
</pre>
