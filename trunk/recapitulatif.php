<?php
include_once('inc/header.inc.php');;
?>
   <br> <br>
       <h1 align="center"> Recapitulatif de votre pack </h1>
	
<table align="center">
   <tr>
       <th>Produit</th>
       <th>Nom</th>
       <th>Prix</th>
   </tr>
   <tr>
       <td>DVD</td>
       <td> </td>
       <td> </td>
   </tr>
   <tr>
      <td>CD</td>
      <td> </td>
	  <td> </td>
   </tr>
   <tr>
      <td>Livre</td>
      <td> </td>
	  <td> </td>
   </tr>
   <tr>
      <td>Total</td>
      <td> </td>
	  <td> </td>
   </tr>
</table>

<script>
alert("Attention une fois votre commande confirmée il ne sera plus possible de la modifier");
</script>

<body>
<p align="center"><button type="button" onclick="toggle_text();"> Confirmer la commande </button></p>
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
  
  <p align ="center"><input type="submit" value="Passer au paiement -> " rows=6 COLS=26 style="font-family:arial" style="border style:solid" style="background:#9900ff" style="color:#ff66ff"></form> </p>
  <body/>
  
  