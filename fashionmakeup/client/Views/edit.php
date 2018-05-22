<?PHP
include "../entities/utilisateur.php";
include "../core/utilisateurCore.php";
    include_once "../Entities/produit.php";
    include_once "../Entities/image.php";
    include_once "../Entities/categorie.php";
    include_once "../Entities/sous_categorie.php";
    include_once "../Core/produitC.php";
    include_once "../Core/imageC.php";
    include_once "../Core/categorieC.php";
    include_once "../Core/sous_categorieC.php";
require '../Core/PanierCore.php' ;
$image = new imageC();
$Panier=new PanierCore();
    $C = new categorieC();
    $categorie = $C->afficher();
include_once('cookieconnect.php');

$bdd = config::getConnexion(); 
$condition;

if(isset($_SESSION['id'])) {

$requser = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
$requser->execute(array($_SESSION['id']));
$user = $requser->fetch();

if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
{    //condition1
     $msg="veuillez saisir une nouvelle adresse email";
     $newpseudo = htmlspecialchars($_POST['newpseudo']);
     $utilisateur1C = new utilisateurCore();
     $utilisateur1C->modifierUser($newpseudo,1,$_SESSION['id']);
     header("Location: userProfile.php?id=".$_SESSION['id']);     
}

if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
{    
  //condition 2
     if ($_POST['newmail'] != $user['mail']) {
         echo "veuillez saisir un nouveau mail";
     }
     $newmail = htmlspecialchars($_POST['newmail']);
     $utilisateur2C = new utilisateurCore();
     $utilisateur2C->modifierUser($newmail,2,$_SESSION['id']);
     header("Location: userProfile.php?id=".$_SESSION['id']);
}


if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
{    
   //condition 3
   $mdp1 = sha1($_POST['newmdp1']);
   $mdp2 = sha1($_POST['newmdp2']);

   if($mdp1 == $mdp2)
   {
      $utilisateur2C = new utilisateurCore();
      $utilisateur2C->modifierUser($mdp1,3,$_SESSION['id']);
      header("Location: userProfile.php?id=".$_SESSION['id']);
   }
   else{
      $msg = "les mot de passes ne correspond pas !" ;
   }

}

if (isset($_POST['supprimer'])) {

$deleteMbr = $bdd->prepare('DELETE FROM membre where id=?');
$deleteMbr->execute(array($_SESSION['id'])); 
}


?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uouapps.a2hosted.com/dhani-html/html/sebian-intro/sebian/04-contact-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Feb 2017 13:48:06 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FASHION MAKEUP-EDITER MON PROFIL</title>
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,SEBIAN Multi Purpose Care,eCommerce,SEBIAN - Multi Purpose eCommerce HTML5 Template">
    <meta name="description" content="SEBIAN - Multi Purpose eCommerce HTML5 Template">
    <meta name="author" content="M_Adnan">

    <!-- FONTS ONLINE -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!--MAIN STYLE-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- ADD YOUR OWN STYLING HERE. AVOID TO USE STYLE.CSS AND MAIN.CSS. IT WILL BE HELPFUL FOR YOU IN FUTURE UPDATES -->
    <link href="css/custom.css" rel="stylesheet" type="text/css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

    <!-- JavaScripts -->
    <script src="js/modernizr.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <!-- LOADER ===========================================-->
    <div id="loader">
        <div class="loader">
            <div class="position-center-center"> <img src="images/fashionmakeup.png" alt="">

                <p class="font-playfair text-center">Please Wait...</p>
                <div class="loading">
                    <div class="ball"></div>
                    <div class="ball"></div>
                    <div class="ball"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Wrap -->
    <div id="wrap">

        <!-- Header -->
               <header class="header-style-2">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="container">
                    <div class="top-links">
                        <ul>
                            <li><a href="userProfile.php?id=<?php echo $_SESSION['id']; ?>">Bonjour , <?php echo $_SESSION['pseudo']; ?></a></li>
                            <li><a href="disconnect.php">SE DÉCONNECTER</a></li>
                        </ul>
                        <!-- Social Icons -->
                        <ul class="social_icons">
                            <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>
                            <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>
                            <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Logo -->
                <div class="container">
                    <div class="logo"> <a href="#."><img src="images/Logo_FM-Transp_02.png" alt="" style="width: 250px; height: 150px;"></a> </div>
                </div>

                <!-- Nav -->
                <div class="sticky">
                    <div class="container" style="visibility: initial;">
                        <nav>
                            <ul id="ownmenu" class="ownmenu">
                                <li class="active"><a href="finalindex.php">ACCUEIL</a>
                                </li>
                                <li><a href="Produit1.php">PRODUITS</a>
                                    <!--======= MEGA MENU =========-->
                                    <div class="megamenu full-width">
                                        <div class="row nav-post">
                                            <form>
                                            <?php

                                                foreach ($categorie as $key) {
                                            ?>
                                                <div class="col-sm-3">
                                                    <center>
                                                        <h6><?php echo $key['nom'];?></h6>
                                                    </center>
                                                    
                                                    <!--<li><a href="08-01-blog-mansory.html">Blog Mansory</a></li>-->
                                                    <?php
                                                        $sous_categorieC = new sous_categorieC();
                                                        $liste = $sous_categorieC->recuperer($key['reference']);
                                                        foreach ($liste as $row) {
                                                    ?>
                                                        <form method="POST" action="Produit2.php">
                                                            <input type="text" name="type_produit" value="<?php echo $row['nom']; ?>" hidden>
                                                            <li><input type="submit" value="<?php echo $row['nom']; ?>" style="width: 220px; background-color: #272727; color: white; margin : auto;"> </li>
                                                        </form>
                                                        
                                                    <?php
                                                        }
                                                      ?>
                                                </div>
                                            <?php
                                            
                                                }

                                              ?>
                                              </form>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="12-contact.html">PROMOTIONS</a>
                                    <li><a href="08-01-blog-mansory.html">A PROPOS</a>
                                        <ul class="dropdown">
                                            <li><a href="08-01-blog-mansory.html">Blog Mansory</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="04-contact-01.html">CONTACT</a>
                                        <ul class="dropdown">
                                            <li><a href="04-contact-01.html">Contact US 01</a></li>
                                            <li><a href="04-contact-02.html">Contact US 02</a></li>
                                            <li><a href="04-contact-03.html">Contact US 03</a></li>
                                        </ul>
                                    </li>

                                    <!--======= Shopping Cart =========-->
            <?php if (empty($_SESSION['id'])){?>
            <li class="shop-cart"><a href="Panier.php"><i class="fa fa-shopping-cart"></i></a> <span class="numb"><?php echo $Panier->count();?></span>
                <?php } else { ?>
            <li class="shop-cart"><a href="Panier.php"><i class="fa fa-shopping-cart"></i></a> <span class="numb"><?php echo $Panier->notif();?></span>
                <?php } ?>
                <ul class="dropdown">
                    <?php

                    $ids=array_keys($_SESSION['panier']);
                    if(empty($ids))
                    {
                        $prod=array();

                    }
                    else {
                        $prod = $Panier->AfficherPanierSession("select * from produit where reference IN (" . implode(",", $ids) . ")");
                        foreach($prod as $row) {
                            $listeima = $image->recupererimage($row->reference);
                            ?>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <?php
                                        foreach($listeima as $im)
                                        {

                                            ?>
                                            <div class="cart-img"><a href="#"> <img
                                                            class="media-object img-responsive"
                                                            src="../../admin/Views/production/images/<?php echo $im['chemin'] ;?>"
                                                            alt="..."> </a></div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"><?php echo $row->nom; ?></h6>
                                        <span class="price"><?php echo number_format($row->prix, 2, ',', ''); ?>
                                            TND </span> <span class="qty">Quantité: <?php echo $_SESSION['panier'][$row->reference]; ?></span></div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <li class="no-padding no-border">
                        <h5 class="text-center">TOTAL:<?php echo number_format($Panier->total(), 2, ',', ''); ?></h5>
                    </li>
                    <li class="no-padding no-border">
                        <div class="row">

                            <div class="col-xs-6 "> <a href="connexioncommande.php" class="btn btn-1 btn-small">VALIDER</a></div>
                        </div>
                    </li>
                </ul>
            </li>
                                    <!--======= SEARCH ICON =========-->
                                    <li class="search-nav"><a href="#."><i class="fa fa-search"></i></a>
                                        <ul class="dropdown">
                                            <li class="row">
                                                <div class="col-sm-4 no-padding">
                                                    <select class="selectpicker">
                      <option>MEN'S</option>
                    </select>
                                                </div>
                                                <div class="col-sm-8 no-padding">
                                                    <input type="search" class="form-control" placeholder="Rechercher">
                                                    <button type="submit"> <i class="fa fa-search"></i> </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                            </ul>
                        </nav>
                    </div>
                </div>
        </header>
        <!-- Header End -->

        <!-- Header End -->

        <!--======= SUB BANNER =========-->
        <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <h4>EDITER MON PROFIL</h4>
                <!-- Breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="#">PROFIL</a></li>
                    <li class="active">EDITION</li>
                </ol>
            </div>
        </section>

        <!-- CONTENT START -->
        <div class="content">

            <!--======= Contact Us =========-->
            <section class="conact-us conact-us-2 conact-us-3 no-padding-b">
                <!--======= CONTACT FORM =========-->
                <div class="row">

                    <!-- Map -->

                    <!-- Contact Form -->

                    <div class="col-sm-6 contact-3 animate fadeInRight" data-wow-delay="0.4s">
                        <!-- TITTLE -->
                        <div class="tittle">
                            <h5>EDITON DE PROFILE</h5>

                        </div>
                        <div class="contact">
                            <div class="contact-form">
                                <!--======= FORM  =========-->
                               
                                <form role="form" id="contact_form" class="contact-form" method="post" enctype="multipart/form-data" float="righ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="row">
                                                <li class="col-sm-12">
                                                    <label>
                          <input type="text" class="form-control" name="newpseudo" id="name" placeholder="*PSEUDO" value="<?php echo $user['pseudo']; ?>"
                        </label>
                                                </li>
                                                <li class="col-sm-12">
                                                    <label>
                          <input type="email" class="form-control" name="newmail" id="email" placeholder="*EMAIL" value="<?php echo $user['mail']; ?>"
                        </label>
                                                </li>
                                                <li class="col-sm-12">
                                                    <label>
                          <input type="password" class="form-control" name="newmdp1" id="company" placeholder="*MOT DE PASSE">
                        </label>
                                                </li>
                                                <li class="col-sm-12">
                                                    <label>
                          <input type="password" class="form-control" name="newmdp2" id="company" placeholder="*CONFIRMER VOTRE MOT DE PASSE">
                        </label>
                                                </li>

                                                       <li class="col-sm-12">
                                      <input type="submit" name="supprimer" value="supprimer mon compte">
                                                    </li>

                                            </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <ul class="row">
                                                <li class="col-sm-12 no-margin">
                                                    <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();" name="modifier">Mettre a jour</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>

                                         <?php if(isset($msg)){ echo $msg;} ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!--======= Footer =========-->
                 <footer>
                <div class="container">
                    <div class="text-center"> <a href="#."><img src="images/Logo_FM-Transp.png" alt="" style="width: 250px; height: 150px;"></a><br>
                        <img class="margin-t-40" src="images/hammer.png" alt="">
                        <p class="intro-small margin-t-40">Multipurpose E-Commerce Theme is suitable for furniture store, fashion shop, accessories, electric shop. We have included multiple layouts for home page to give you best selections in customization.</p>
                    </div>

                    <!--  Footer Links -->
                    <div class="footer-link row">
                        <div class="col-md-6">
                            <ul>

                                <!--  INFOMATION -->
                                <li class="col-sm-6">
                                    <h5>INFOMATION</h5>
                                    <ul class="f-links">
                                        <li><a href="#.">ABOUT US</a></li>
                                        <li><a href="#."> DELIVERY INFOMATION</a></li>
                                        <li><a href="#."> PRIVACY & POLICY</a></li>
                                        <li><a href="#."> TEMRS & CONDITIONS</a></li>
                                        <li><a href="#."> MANUFACTURES</a></li>
                                    </ul>
                                </li>

                                <!-- MY ACCOUNT -->
                                <li class="col-sm-6">
                                    <h5>MY ACCOUNT</h5>
                                    <ul class="f-links">
                                        <li><a href="#.">MY ACCOUNT</a></li>
                                        <li><a href="#."> LOGIN</a></li>
                                        <li><a href="#."> MY CART</a></li>
                                        <li><a href="#."> WISHLIST</a></li>
                                        <li><a href="#."> CHECKOUT</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- Second Row -->
                        <div class="col-md-6">
                            <ul class="row">

                                <!-- TWITTER -->
                                <li class="col-sm-6">
                                    <h5>TWITTER</h5>
                                    <p>Check out new work on my @Behance portfolio: "BCreative_Multipurpose Theme" http://on.be.net/1zOOfBQ </p>
                                </li>

                                <!-- FLICKR PHOTO -->
                                <li class="col-sm-6">
                                    <h5>FLICKR PHOTO</h5>
                                    <ul class="flicker">
                                        <li><a href="#."><img src="images/flicker-1.jpg" alt=""></a></li>
                                        <li><a href="#."><img src="images/flicker-2.jpg" alt=""></a></li>
                                        <li><a href="#."><img src="images/flicker-3.jpg" alt=""></a></li>
                                        <li><a href="#."><img src="images/flicker-4.jpg" alt=""></a></li>
                                        <li><a href="#."><img src="images/flicker-5.jpg" alt=""></a></li>
                                        <li><a href="#."><img src="images/flicker-6.jpg" alt=""></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Rights -->
                    <div class="rights">
                        <p>© 2015 HTML5 TEMPLATE SEBIAN. All Rights Reserved. Powered By WPELITE</p>
                    </div>
                </div>
            </footer>
            <!-- GO TO TOP -->
            <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
            <!-- GO TO TOP End -->
        </div>
        <!-- Wrap End -->
        <script src="js/jquery-1.11.3.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/own-menu.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/jquery.nouislider.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            jQuery(document).ready(function($) {

                //  Price Filter ( noUiSlider Plugin)
                $("#price-range").noUiSlider({
                    range: {
                        'min': [0],
                        'max': [1000]
                    },
                    start: [40, 940],
                    connect: true,
                    serialization: {
                        lower: [
                            $.Link({
                                target: $("#price-min")
                            })
                        ],
                        upper: [
                            $.Link({
                                target: $("#price-max")
                            })
                        ],
                        format: {
                            // Set formatting
                            decimals: 2,
                            prefix: '$'
                        }
                    }
                })
            })

        </script>

</body>

<!-- Mirrored from uouapps.a2hosted.com/dhani-html/html/sebian-intro/sebian/04-contact-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Feb 2017 13:48:06 GMT -->

</html>
<?php   
}
else
{
  echo "string";
header("Location: connexion.php");
}
?>
