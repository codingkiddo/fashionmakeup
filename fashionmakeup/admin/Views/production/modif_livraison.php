<?php
  include_once "../../Core/livraisoncore.php";
  include_once "../../Entities/livraison.php";
$lC=new livraisoncore();
if (isset($_GET['modif'])) {
  $lC=new livraisoncore();
  $livraison=new livraison($_GET['id'],'','','','',$_GET['etat'],$_GET['pseudoLivreur'],$_GET['datelivraison']);
  $lC->modifierlivraison($livraison,$_GET['id_ini']);
  header('location: afficherlivraisons.php');
  if ($_GET['etat']=="Effectuée"){
  	                          // Authorisation details.
  $username = /*$_POST['username']*/"yafet.shil@esprit.tn";
  $hash = /*$_POST['hash']*/"df8d3ee50f72cf056d816995889be7b591b7b0ee06bdf2055fd78b355ac67909";

  // Config variables. Consult http://api.txtlocal.com/docs for more info.
  $test = "0";

  // Data for text message. This is the text message data.
  $sender = /*$_POST['sender'];*/"Fashion MakeUp"; // This is who the message appears to be from.
  $numbers = /*$_POST['num']*/ "216".$_GET['numero']; // A single number or a comma-seperated list of numbers
  $message = /*$_POST['mess']*/"Votre commande a été bien recue";
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.txtlocal.com/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  curl_close($ch);
  echo($result);
  }
  }
  ?>