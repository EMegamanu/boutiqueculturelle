<?php
 
   // On va chercher la définition de la classe
   require('class.phpmailer.php');
        $mail = new PHPmailer(); 
        $mail->IsSMTP(); 
        $mail->Host='hote_smtp'; 
        $mail->From='votre@adresse'; 
        $mail->AddAddress('ruqiyakhalid@gmail.com'); 
        $mail->AddReplyTo('votre@adresse');      
        $mail->Subject='Exemple trouvé sur DVP'; 
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