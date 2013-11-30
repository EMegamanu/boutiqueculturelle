<?php
  include_once('inc/header.inc.php');
define('GUSER', 'boutiqueculturellentic'); // GMail username
define('GPWD', 'boutique2013'); // GMail password 
   // On va chercher la définition de la classe
   require_once('inc/PHPMailer/class.phpmailer.php');
function smtpmailer( & ($_POST['nom']), & ($_POST['prenom']), &($_POST['courriel']) & ($_POST['telephone']), & ($_POST['n°commande']), & ($_POST['message'])) { 
        $mail = new PHPmailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only 
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465; 
        $mail->Username = boutiqueculturellentic;  
        $mail->Password = boutique2013;      
        $mail->SetFrom='From: '.$_POST['courriel'].;
        $mail->Subject = "contact boutique culturelle";
        $mail->Body= "Nom : ".$_POST['nom']."\r\n";"Prénom : ".$_POST['prenom']."\r\n"
                    "Adresse email : ".$_POST['courriel']."\r\n";"Téléphone : ".$_POST['telephone']."\r\n".
                    "N° Commande : ".$_POST['nun_commande']."\r\n".
                    "Message : ".$_POST['message']."\r\n".;
        $mail->AddAddress($_POST['courriel']);
        if(!$mail->Send()) {
    $error = 'Erreur: '.$mail->ErrorInfo; 
    return false;
  } else {
    $error = 'Message envoyé!';
    return true;
  }
}