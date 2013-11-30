 <?php

mysql_connect("localhost", "root", "");
mysql_select_db("");
$requete = "SELECT * FROM utilisateur ".
                       " WHERE idUtilisateur='$idUtilisateur' AND motDePasse='$motDePasse'";
                       
    $result = mysql_query($requete);
    
    if ($enreg = mysql_fetch_array($result)) {
   
        echo "NOM : " . $enreg["nom"] . "<br/>";
        echo "PRENOM : " . $enreg["prenom"] . "<br/>";
        echo "ADRESSE : " . $enreg["adresse"] . "<br/>";
    } else {
        echo "Paramètres de connexion invalides<br/>";
    }
?>