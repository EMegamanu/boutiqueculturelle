<?php		
	/* Inclusion script connexion base de données. */
	require_once('inc/db.inc.php');


    if(!empty($_POST)) {
        $success = false;

        if(!empty($_POST['email']) && !empty($_POST['motDePasse'])) {
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];

            $requete = 'SELECT * FROM Utilisateur ' . 
            'WHERE courriel = :email AND motDePasse = :motDePasse';

            $results = $db->prepare($requete);
            $results->bindValue(':email', $email);
            $results->bindValue(':motDePasse', $motDePasse);

            $results->execute();

            $count = $results->rowCount();
            $results->setFetchMode(PDO::FETCH_OBJ);

            if($count == 1) {
                session_start();

                $utilisateur = $results->fetch();
                $success = true;

                $_SESSION['utilisateur'] = array();
                $_SESSION['utilisateur']['id'] = $utilisateur->id;
                $_SESSION['utilisateur']['nom'] = $utilisateur->nom;
                $_SESSION['utilisateur']['prenom'] = $utilisateur->prenom;
                $_SESSION['utilisateur']['courriel'] = $utilisateur->courriel;
                $_SESSION['utilisateur']['admin'] = (bool) $utilisateur->admin;

                header("location: ./");
            } 
        }

    	/* Inclusion de l'en-tête. */
    	include_once('inc/header.inc.php');
?>

<section id="section-connexion">
<?php
        if(!$success) {
?>
        <article>
            <p class="result fail">Erreur : vos identifiants ne sont pas reconnus.</p>
        </article>
<?php
        }
    } else {
        /* Inclusion de l'en-tête. */
        include_once('inc/header.inc.php');
?>

<section id="section-connexion">
    <form method="post" action="connexion.php">
        <h2>
            <span class="title">
                <span class="fa fa-sign-in"></span> Connexion
            </span>
        </h2>
        <fieldset>
            <legend>Identification</legend>
            <div>
                <label for="email">Courriel</label> : 
                <input type="text" name="email" id="email" />
            </div>
            <div>
                <label for="mot-de-passe">Mot de passe</label> : 
                <input type="password" name="motDePasse" id="mot-de-passe" />
            </div>
            <div class="groupe-boutons">
                <button type="reset"><span class="fa fa-hand-o-left"></span> Annuler</button>
                <button type="submit"><span class="fa fa-check"></span> Envoyer</button>
            </div>
        </fieldset>
    </form>
<?php
    }
?>
</section>
<?php
    /* Inclusion de l'en-tête. */
    include_once('inc/footer.inc.php');
?>