<?php
session_start();
include "../Entities/livraison.php";
include "../Core/livraisoncore.php";
if ($_POST['checkbox3-2']=="paypal" and isset($_POST['checkbox3-3']) and isset($_POST['rue']) and isset($_POST['numero']) and isset($_POST['region']) and isset($_POST['ville']))
	{
	$livraison1=new livraison('',$_POST['rue'],$_POST['numero'],$_POST['region'],$_POST['ville']);
$livraison1c=new livraisoncore();
$livraison1c->ajouterlivraison($livraison1,$_SESSION['id']);
    header("Location:paypal.php");
    }
else if ($_POST['checkbox3-2']=="livr" and isset($_POST['checkbox3-3']) and isset($_POST['rue']) and isset($_POST['numero']) and isset($_POST['region']) and isset($_POST['ville'])) {
    $livraison1 = new livraison('', $_POST['rue'], $_POST['numero'], $_POST['region'], $_POST['ville']);
    $livraison1c = new livraisoncore();
    $livraison1c->ajouterlivraison($livraison1, $_SESSION['id']);
    header("Location:successpaypal.php");
}
else{
    ?>
    <script>
        alert('accepter les termes et choisissez une methode de payment');
        history.back();
    </script>
    <?php
}