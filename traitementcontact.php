<?php

  include_once('inc/header.inc.php');
 
   // On va chercher la définition de la classe
   require('class.phpmailer.php');
        $mail = new PHPmailer(); 
        $mail->IsSMTP(); 
        $mail->Host="smtp.gmail.com"; 
        $mail->From='courriel'; 
        $mail->AddAddress('ruqiyakhalid@gmail.com'); 
        $mail->AddReplyTo('courriel');      
        $mail->Subject='boutique culturelle'; 
        $mail->Body='Voici un exemple d\'e-mail au format Texte'; 
        if(!$mail->Send()){ //Teste le return code de la fonction 
          echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7) 
        } 
        else{      
          echo 'Mail envoyé avec succès'; 
        } 
        $mail->SmtpClose(); 
        unset($mail); 
?> 

 
?>