 <?php
 if(!empty($_POST['pseudo']))
{

mysql_connect("localhost", "root", "");
mysql_select_db("");
 $motDePasse = $_POST["motdepasse"];
$motDePasse2 = $_POST["motdepasse2"];
 if($motDePasse == $motDePasse2)
{
 $nom = $_POST["nom"];
echo "votre nom est : $nom<br />";
 $prenom = $_POST["prenom"];
echo "votre prénom est : $prenom<br />";
$courriel = $_POST["email"];
$idUtilisateur = $_POST["idUtilisateur"];
echo "votre identifiant est : $idUtilisateur<br />";
echo "votre adresse e-mail est : $courriel<br />";
$adresse = $_POST["Adresse"];
echo "votre adresse est : $adresse<br />";
$cp = $_POST["CP"];
echo "votre code postal est : $cp<br />";
$ville = $_POST["Ville"];
echo "votre ville est : $ville<br />";


$motDePasse = sha1($passe);

else
{
echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
}
}

?> 