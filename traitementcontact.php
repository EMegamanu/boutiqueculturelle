<?php

    require_once('inc/db.inc.php');
    
    // On va chercher la définition de la classe
    require_once('inc/PHPMailer/class.phpmailer.php');

    define('GUSER', 'boutiqueculturellentic'); // GMail username
    define('GPWD', 'boutique2013'); // GMail password
    define('EMAIL', GUSER . '@gmail.com'); // GMail username

    /* D'après http://www.web-development-blog.com/archives/send-e-mail-messages-via-smtp-with-phpmailer-and-gmail/ */
    function smtpmailer($to, $from, $from_name, $subject, $body) { 
        global $error;
        $mail = new PHPMailer();  // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465; 
        $mail->Username = GUSER;  
        $mail->Password = GPWD;           
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);

        if(!$mail->Send()) {
            $error = 'Erreur : '. $mail->ErrorInfo; 
            return false;
        } else {
            $error = 'Message envoyé !';
            return true;
        }
    }


    /* Si le formulaire soumis est OK. */
    $ok = false;
    /* On vérifie que le formulaire a bien été rempli... */
    if(!empty($_POST)) {
        /* 
           Note : si le client est identifié, ce serait bien de récupérer la plupart de ces informations dans la base de données 
           au lieu de les lui faire saisir.
         */

        if(
            !empty($_POST['nom']) && 
            !empty($_POST['prenom']) && 
            !empty($_POST['courriel']) && 
            !empty($_POST['telephone']) && 
            !empty($_POST['num_commande']) &&
            !empty($_POST['message'])
        ) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $courriel = $_POST['courriel'];
            $telephone = $_POST['telephone'];
            $num_commande = $_POST['num_commande'];
            $message = $_POST['message'];

            $ok = true;
        } else {
            // TODO: Traitement à faire si formulaire incomplet
            // Peut-être une redirection du formulaire ?

        }
    } else {
        // TODO: Traitement à faire si arrivé sans soumission formulaire
        // Peut-être à faire une redirection ?
    }



    include_once('inc/header.inc.php');



    if($ok) {
        $ok = smtpmailer(
            EMAIL, 
            $courriel, 
            $nom . ' ' . $prenom, 
            '[CONTACT] Commande n°' . $num_commande, 
            $message . '\n' .
            '--\n' .
            $nom . ' ' . $prenom . '\n' .
            '@ ' . $courriel . '\n' .
            'Tél. ' . $telephone . '\n'
        );
    }

    if($ok) {
?>
        <p class="result success">
            Nous avons bien reçu votre message. <br/>
            Nous vous répondrons dans les plus brefs délais.
        </p>
<?php
    } else {
?>
    <p class="result fail">
        Nous avons rencontré un problème avec votre message. <br/>
        Veuillez vérifier votre saisie, ou recommencer plus tard.
    </p>
<?php
    }

    include_once('inc/footer.inc.php');

