<?php
if(isset($_POST) && isset($_POST['nom']) && isset($_POST['prénom']) && isset($_POST['courriel']) && isset($_POST['téléphone']) && isset($_POST['n°commande']) && isset($_POST['message'])){
	if(!empty($_POST['nom']) && !empty($_POST['courriel']) && !empty($_POST['message'])){
		$destinataire = "ruqiyakhalid@gmail.com";
		$sujet = "Demande de contact";
		$message .= "Nom : ".$_POST['nom']."\r\n";
		$message .= "Prénom : ".$_POST['prénom']."\r\n";
		$message .= "Adresse email : ".$_POST['courriel']."\r\n";
		$message .= "Téléphone : ".$_POST['téléphone']."\r\n";
		$message .= "N° Commande : ".$_POST['n°commande']."\r\n";
		$message .= "Message : ".$_POST['message']."\r\n";
		$entete = 'From: '.$_POST['courriel']."\r\n".
        	'Reply-To: '.$_POST['courriel']."\r\n".
		'X-Mailer: PHP/'.phpversion();
		if (mail($destinataire,$sujet,$message,$entete)){
			echo 'Message envoyé';
		} else {
 			echo "Une erreur est survenue lors de l'envoi du formulaire par email";
		}
	}
}
?>

