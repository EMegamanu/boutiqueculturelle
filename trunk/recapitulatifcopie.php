<?php
//Début de session
session_start();
include_once('inc/header.inc.php');
// Récupération du dvd
$_SESSION['dvd'] = $_POST['dvd'];
?>
<link rel="stylesheet" href="stylepack.css" />
   <br> <br>
 <h1> Recapitulatif </h1>
<table align="center" >
   <tr>
       <th class= "blanc">Produit</th>
       <th class="blanc">Nom</th>
   </tr>
   <tr>
       <td>Film</td>
       <td><?php echo $_SESSION['dvd']; ?> </td>
   </tr>
   <tr>
      <td>Musique</td>
      <td><?php echo $_SESSION['musique']; ?> </td>
   </tr>
   <tr>
      <td>Livre</td>
      <td><?php echo $_SESSION['livre']; ?> </td>
   </tr>
   <tr>

   </tr>
</table >

<script>
alert("Attention une fois votre commande confirmée il ne sera plus possible de la modifier");
</script>

<br>
<br>
<body>
<p1><button type="button" onclick="toggle_text();"> Confirmer la commande</button></p1>
<script>
function toggle_text() {
  var span = document.getElementById("span_test");
  if(span.innerHTML != "") {
    span.innerHTML = "";
  } else {
    span.innerHTML = "Merci votre commande est confirm&#233e";
  }
}

</script>

 <span id="span_test"></span>
 
 <form method="get"action="paiement.html">
  
  <p><input type="submit" value="Passer au paiement -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"></form> </p>
  <body/>
  
  
  <?php
	/* Inclusion du pied de page */
	include_once('inc/footer.inc.php');
?>
  