<?PHP
include "../Entities/livraison.php";
include "../Core/livraisoncore.php";
require '../Core/PanierCore.php' ;
require '../Entities/panier.php';

include_once "../Entities/produit.php";
    include_once "../Entities/image.php";
    include_once "../Entities/categorie.php";
    include_once "../Entities/sous_categorie.php";
    include_once "../Core/produitC.php";
    include_once "../Core/imageC.php";
    include_once "../Core/categorieC.php";
    include_once "../Core/sous_categorieC.php";

    include_once "../Core/commentaireC.php";

$Panier=new PanierCore();
$C = new categorieC();
    $categorie = $C->afficher();
    $Panier=new PanierCore();
    if ( !empty($_POST)) { 
        $rueError = null; 
        $numeroError = null;
        $regionError =  null;
        $villeError = null;
        $rue = $_POST['rue']; 
        $numero = $_POST['numero'];
        $region = $_POST['region']; 
        $ville= $_POST['ville']; 
        $valid = true;
    if(!preg_match("/^[2-9]{1}[0-9]{7}$/", $numero)) {
  // $phone is valid
       $numeroError = "Numero incorrect";
    }
    if (empty($rue)) {
        $rueError = '*Champs requis';
        $valid = false;
    }
    if (empty($numero)) {
        $numeroError = '*Champs requis';
        $valid = false;
    }
    if (empty($region)) {
        $regionError = '*Champs requis';
        $valid = false;
    }
    if (empty($ville)) {
        $villeError = '*Champs requis';
        $valid = false;
    }
    }
/* else  if (isset($_POST['rue']) and isset($_POST['numero']) and isset($_POST['region']) and isset($_POST['ville']) ){
$livraison1=new livraison('',$_POST['rue'],$_POST['numero'],$_POST['region'],$_POST['ville']);
$livraison1c=new livraisoncore();
$livraison1c->ajouterlivraison($livraison1,$_SESSION['id']);
header('Location: livraisonclient.php');
  

}
//*/
?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uouapps.a2hosted.com/dhani-html/html/sebian-intro/sebian/03-pay-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Feb 2017 13:48:06 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FashionMakeUp</title>
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

        <!-- Header -->
        <header class="header-style-2">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="container">
                    <!-- Language -->
                    <div class="top-links">

                        <!-- Social Icons -->
                        <ul class="social_icons">
                            <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>
                            <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>
                            <li class="dribbble"><a href="#."><i class="fa fa-dribbble"></i> </a></li>
                            <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>
                            <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="w3-bar w3-border w3-light-grey">
            <div style="float: right">
            <a href="#" class="w3-bar-item w3-button w3-border-right" class="top-links">ACCEUIL</a>
            <a href="#" class="w3-bar-item w3-button w3-border-right"class="top-links">EDITER MON PROFIL</a>
            <a href="#" class="w3-bar-item w3-button w3-border-right"class="top-links">PANIER</a>
            <a href="#" class="w3-bar-item w3-button w3-border-right"class="top-links">DÉCONNEXION</a>
           </div>
            <div style="float: left">
                <a href="userprofile.php" class="w3-bar-item w3-button w3-border-right" class="top-links">Retour</a>
            </div>
          </div>

            <!-- Logo -->
            <div class="container">
                <div class="logo"> <a href="#."><img src="images/fashionmakeup.png" alt=""></a> </div>
            </div>

            <!-- Nav -->
            <!-- Nav -->
            <div class="sticky">
                <div class="container">
                    <nav>
                        <ul id="ownmenu" class="ownmenu">
                            <li class="active"><a href="finalindex.php">HOME</a>
                                <ul class="dropdown">
                                </ul>
                            </li>
                            <li><a href="12-contact.html"></a>
                                <li><a href="Produit1.php">PRODUITS</a>
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
                                <li><a href="index.html">PROMOTION</a>
                                    <li><a href="08-01-blog-mansory.html">A PROPOS</a>
                                        <li><a href="04-contact-01.html">CONTACT</a>
        <!--======= Shopping Cart =========-->
      
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
  
  <!-- CONTENT START -->
  <div class="content"> 
    
    <!--======= SUB BANNER =========-->
    <section class="sub-banner">
      <div class="container">
        <h4>SHOPPING CART</h4>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">SHOPPING CART</li>
        </ol>
      </div>
    </section>
    
    <!--======= PAGES INNER =========-->
    <section class="section-p-30px pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="payment_steps">
          <ul class="row">
            <!-- SHOPPING CART -->
            <li class="col-sm-4"> <i class="fa fa-shopping-cart"></i>
              <h6>SHOPPING CART</h6>
            </li>
            
            <!-- CHECK OUT DETAIL -->
            <li class="col-sm-4 current"> <i class="fa fa-align-left"></i>
              <h6>CHECK OUT DETAIL</h6>
            </li>
            
            <!-- ORDER COMPLETE -->
            <li class="col-sm-4"> <i class="fa fa-check"></i>
              <h6>ORDER COMPLETE</h6>
            </li>
          </ul>
        </div>
        <form method="POST" action="choisirpayment.php" class="form-horizontal form-label-left" >
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-7">
                <h6> DETAILS</h6>
                
                  <ul class="row">
                    <li class="col-md-12"> 
                      <!-- ADRESSE -->
                      <label>*ADRESSE
                        <input type="text" name="rue" value="<?php echo !empty($rue)?$rue:'';?>" >
                         <?php if (!empty($rueError)): ?>
                              <span class="help-inline" style="color:Red"><?php echo $rueError;?></span>
                          <?php endif; ?>
                      </label>
                    </li>
                    <!-- Telephone -->
                    <li class="col-md-6">
                      <label> *TELEPHONE
                        <input type="number" name="numero" value="<?php echo !empty($numero)?$numero:'';?>">
                          <?php if (!empty($numeroError)): ?>
                              <span class="help-inline" style="color:Red"><?php echo $numeroError;?></span>
                          <?php endif; ?>
                      </label>
                    </li>
                    <!-- *Region -->
                    <li class="col-md-12">
                      <label> *REGION
                        <select id="optionA" onchange="update(this.value)" name="region" class="selectpicker" value="<?php echo !empty($region)?$region:'';?>">
                                                  <?php if (!empty($regionError)): ?>
                              <span class="help-inline" style="color:Red"><?php echo $regionError;?></span>
                          <?php endif; ?>
                          <option value="Select">Sélectionner...</option>
                          <option value="Ariana">Ariana</option>
                          <option value="Ben arous">Ben Arous</option>
                          <option value="Bizerte">Bizerte</option>
                          <option value="Béja">Béja</option>
                          <option value="Gabes">Gabes</option>
                          <option value="Gafsa">Gafsa</option>
                          <option value="Jendouba">Jendouba</option>
                          <option value="Kairouan">Kairouan</option>
                          <option value="Kasserine">Kasserine</option>
                          <option value="Kebili">Kebili</option>
                          <option value="La Manouba">La Manouba</option>
                          <option value="Le Kef">Le Kef</option>
                          <option value="Mahdia">Mahdia</option>
                          <option value="Monastir">Monastir</option>  
                          <option value="Médenine">Médenine</option>
                          <option value="Nabeul">Nabeul</option>
                          <option value="Sfax">Sfax</option>
                          <option value="Sidi Bouzid">Sidi Bouzid</option>
                          <option value="Siliana">Siliana</option>
                          <option value="Sousse">Sousse</option>
                          <option value="Tataouine">Tataouine</option>
                          <option value="Tozeur">Tozeur</option>
                          <option value="Tunis">Tunis</option>
                          <option value="Zaghouan">Zaghouan</option>
                        </select>
                      </label>
                    </li>
                      <!-- VILLE -->
                      <li class="col-md-12"> 
                      <label>*VILLE 
                        <br><br> <select id="data" name="ville" style="width: 400px; height: 30px">
    <option>Select an Option...</option>
  </select>
   </select>
                        <?php if (!empty($villeError)): ?>
                               <span class="help-inline" style="color:Red"><?php echo $villeError;?></span>
                           <?php endif; ?>
                      </label>
                    </li>

                    <!--  -->
               
                  </ul>
                
              </div>
              
              <!-- SUB TOTAL -->
             <div class="col-sm-5">
                                <div class="order-place">
                                    <h5>Votre Commande</h5>
                                    <div class="order-detail">
                                        <p>Produit <span>TOTAL</span></p>
                                        <div class="item-order">
                                            <?php
                                            $ids=array_keys($_SESSION['panier']);
                                            if(empty($ids))
                                            {
                                                $prod=array();

                                            }
                                            else {
                                                $prod = $Panier->AfficherPanierSession("select * from produit where reference IN (" . implode(",", $ids) . ")");
                                                foreach ($prod as $row) {
                                                    ?>
                                                    <p><?php echo $row->nom; ?><span
                                                                class="color"> x<?php echo $_SESSION['panier'][$row->reference]  ?> </span>
                                                    </p>
                                                    <p>COLOR: BLACK </p>
                                                    <p class="text-right"><?php echo number_format($row->prix, 2, ',', ''); ?>
                                                        TND</p>
                                                <?php }
                                            }?>
                                        </div>
                                        <p>CART SUBTOTAL <span><?php echo number_format($Panier->total(), 2, ',', ''); ?> TND</span></p>
                                        <p>ORDER TOTAL <span><?php echo number_format($Panier->total(), 2, ',', ''); ?> TND</span></p>
                                    </div>
                                    <div class="pay-meth">
                                      
                                        <h5>Methodes de Payments</h5>
                                        <ul>

                                            <li>
                                                <div class="checkbox">
                                                    <input name="checkbox3-2" class="styled" type="checkbox" value="livr">
                                                    <label for="checkbox3-2"> Payer a la livraison </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox">
                                                    <input name="checkbox3-2" class="styled" type="checkbox" value="paypal">
                                                    <label for="checkbox3-2"> PAYPAL </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox">
                                                    <input name="checkbox3-3" class="styled" type="checkbox">
                                                    <label for="checkbox3-3"> I’VE READ AND ACCEPT THE <span class="color"> TERMS & CONDITIONS </span> </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <input type="submit" class="btn btn-small btn-dark pull-right" value="Valider payment">

                                            <a href="Pdf.php">
                                                <input  class="btn btn-small btn-dark pull-right" value="Imprimer Facture">
                                            </a>
                                  
                                  
                                    </div>

                                </div>
                            </div>
            </div>
          </div>
        </div>
      </div>
      </form>
      <!--======= RELATED PRODUCTS =========-->
      <section class="section-p-60px new-arrival new-arri-w-slide">
        <div class="container"> 
          
          <!--  Tittle -->
          <div class="tittle tittle-2">
            <h5>RELATED PRODUCTS</h5>
            <p class="font-playfair">Most haver in your Shop </p>
          </div>
          
          <!--  New Arrival Tabs Products  -->
          <div class="popurlar_product client-slide"> 
            
            <!--  New Arrival  -->
            <div class="items-in"> 
              <!-- Image --> 
              <img src="images/new-item-1.jpg" alt=""> 
              <!-- Hover Details -->
              <div class="over-item">
                <ul class="animated fadeIn">
                  <li> <a href="images/new-item-1.jpg" data-lighter><i class="ion-search"></i></a></li>
                  <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                  <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                  <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>
                  <!-- Rating Stars -->
                  <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                </ul>
              </div>
              <!-- Item Name -->
              <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
            </div>
            
            <!--  New Arrival  -->
            <div class="items-in"> 
              <!-- Image --> 
              <img src="images/new-item-2.jpg" alt=""> 
              <!-- Hover Details -->
              <div class="over-item">
                <ul class="animated fadeIn">
                  <li> <a href="images/new-item-2.jpg" data-lighter><i class="ion-search"></i></a></li>
                  <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                  <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                  <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>
                  <!-- Rating Stars -->
                  <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                </ul>
              </div>
              <!-- Item Name -->
              <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
            </div>
            
            <!--  New Arrival  -->
            <div class="items-in"> 
              <!--  Tags  -->
              <div class="new-tag"> NEW </div>
              
              <!-- Image --> 
              <img src="images/new-item-3.jpg" alt=""> 
              <!-- Hover Details -->
              <div class="over-item">
                <ul class="animated fadeIn">
                  <li> <a href="images/new-item-3.jpg" data-lighter><i class="ion-search"></i></a></li>
                  <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                  <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                  <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>
                  <!-- Rating Stars -->
                  <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                </ul>
              </div>
              <!-- Item Name -->
              <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
            </div>
            
            <!--  New Arrival  -->
            <div class="items-in"> 
              <!--  Tags  -->
              <div class="hot-tag"> HOT </div>
              <!-- Image --> 
              <img src="images/new-item-4.jpg" alt=""> 
              <!-- Hover Details -->
              <div class="over-item">
                <ul class="animated fadeIn">
                  <li> <a href="images/new-item-4.jpg" data-lighter><i class="ion-search"></i></a></li>
                  <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                  <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                  <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>
                  <!-- Rating Stars -->
                  <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                </ul>
              </div>
              <!-- Item Name -->
              <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
            </div>
          </div>
        </div>
      </section>
    </section>
  </div>
  
  <!--======= Footer =========-->
  <footer>
    <div class="container">
      <div class="text-center"> <a href="#."><img src="images/logo.png" alt=""></a><br>
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
<script src="js/jquery.flexslider-min.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/main.js"></script>
</body>

<!-- Mirrored from uouapps.a2hosted.com/dhani-html/html/sebian-intro/sebian/03-pay-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Feb 2017 13:48:06 GMT -->
</html>

<script type="text/javascript">
   function update(str)
   {
      var xmlhttp;
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      } 
      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET","ville.php?opt="+str, true);
      xmlhttp.send();
  }
</script>