<?php
include "../Entities/utilisateur.php";
include "../Core/utilisateurCore.php";
session_start();
if(isset($_POST['formconnexion'])) {
   $mailconnect = $_POST['mailconnect'];
   $mdpconnect = $_POST['mdpconnect'];
   $empty="test";
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
  $utilisateur1 = new utilisateur($mailconnect,$mdpconnect,$empty);
                        $utilisateur1C = new utilisateurCore();
                        $tab=$utilisateur1C->connection($utilisateur1);
                        $userexist=$tab[0];
                        $requser=$tab[1];
echo $userexist;
      if($userexist == 1) {
                if (isset($_POST['rememberme'])) {
                setcookie('email',$mailconnect,time()+365*24*3600,null,null,false,true);
                setcookie('password',$mdpconnect,time()+365*24*3600,null,null,false,true);
            }
            unset($_SESSION['panier']);
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['confirme'] = $userinfo['confirme'];
         $_SESSION['role'] = $userinfo['role'];

         if ($_SESSION['confirme'] == 1 && $_SESSION['role'] == 0 ) {
         header("Location:userProfile.php?id=".$_SESSION['id']);
         }
         else{
           $erreur ="votre compte n'est pas encore confirmé";
         }
        
        if($_SESSION['role'] == 1 ){
         header("Location: ../../admin/Views/production/index.php?id=".$_SESSION['id']);
         }

         if ($_SESSION['confirme'] == 1 && $_SESSION['role'] == 0 ) {
         header("Location:userProfile.php?id=".$_SESSION['id']);
         }else{
           $erreur ="votre compte n'est pas encore confirmé";
         }
         if($_SESSION['role'] == 1 ){
         header("Location: ../../admin/Views/production/index.php?id=".$_SESSION['id']);
         }
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Customer Login</title>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Default Description" />
    <meta name="keywords" content="Magento, Varien, E-commerce" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="icon" href="http://sebian.demo.arw.tf/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://sebian.demo.arw.tf/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
    <!--[if lt IE 7]>
<script type="text/javascript">
//<![CDATA[
    var BLANK_URL = 'http://sebian.demo.arw.tf/js/blank.html';
    var BLANK_IMG = 'http://sebian.demo.arw.tf/js/spacer.gif';
//]]>
</script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/widgets.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/bootstrap/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/bootstrap-select/css/bootstrap-select.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/fancybox/css/jquery.fancybox.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/icomoon/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/font-awesome/font-awesome.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/owl-carousel/assets/owl.carousel.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/slick/css/slick.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/arw-styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/arw-custom-class.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/arw-extension.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/arw-responsive.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/arw/sebian/css/_config/design_fashion_fr.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/custom.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/print.css" media="print" />
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/prototype/prototype.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/lib/ccard.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/prototype/validation.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/scriptaculous/builder.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/scriptaculous/effects.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/scriptaculous/dragdrop.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/scriptaculous/controls.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/scriptaculous/slider.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/varien/js.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/varien/form.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/varien/menu.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/mage/translate.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/mage/cookies.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/varien/product.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/arw/ajaxcart/configurable.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/arw/arexworks/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/arw/arexworks/jquery/jquery.noconflict.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/arw/arexworks/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/arw/arexworks/jquery/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/js/mage/captcha.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/imagesloaded.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/configurableswatches/modernizr.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/configurableswatches/product-media.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/configurableswatches/swatches-list.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/theme.1.9.1.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/base/default/js/bundle.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/arw/ajaxcart/ajaxcart.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/arw/producttab/js/tab.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/skrollr/skrollr.min.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/skrollr/skrollr.menu.min.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/fancybox/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/slick/js/slick.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/jcountdown/js/jquery.jcountdown.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/vendors/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/theme.js"></script>
    <link href="http://sebian.demo.arw.tf/fashion/blog/rss/index/store_id/7/" title="Blog" rel="alternate" type="application/rss+xml" />
    <!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/css/styles-ie.css" media="all" />
<![endif]-->
    <!--[if lt IE 7]>
<script type="text/javascript" src="http://sebian.demo.arw.tf/js/lib/ds-sleight.js"></script>
<script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/base/default/js/ie6.js"></script>
<![endif]-->
    <!--[if lt IE 9]>
<script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/html5shiv.min.js"></script>
<script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/html5shiv-printshiv.min.js"></script>
<script type="text/javascript" src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/js/respond.min.js"></script>
<![endif]-->

    <script type="text/javascript">
        //<![CDATA[
        Mage.Cookies.path = '/fashion';
        Mage.Cookies.domain = '.sebian.demo.arw.tf';
        //]]>
    </script>

    <script type="text/javascript">
        //<![CDATA[
        optionalZipCountries = ["HK", "IE", "MO", "PA"];
        //]]>
    </script>
    <!-- BEGIN GOOGLE ANALYTICS CODE -->
    <script type="text/javascript">
        //<![CDATA[
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-46749110-8']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
        //]]>
    </script>
    <!-- END GOOGLE ANALYTICS CODE -->
    <script type="text/javascript">
        //<![CDATA[
        var Translator = new Translate([]);
        //]]>
    </script>
    <script type="text/javascript">
        var grid_equal_height = true;
    </script>
    <link href='//fonts.googleapis.com/css?family=Montserrat:100italic,100,200italic,200,300italic,300,400,400italic,500italic,500,600,600italic,700,700italic,800italic,800,900,900italic&amp;subset=all' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:100italic,100,200italic,200,300italic,300,400,400italic,500italic,500,600,600italic,700,700italic,800italic,800,900,900italic&subset=all' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Playfair+Display:100italic,100,200italic,200,300italic,300,400,400italic,500italic,500,600,600italic,700,700italic,800italic,800,900,900italic&subset=all' rel='stylesheet' type='text/css' />
</head>

<body class=" customer-account-login sidebar-mobile-show body-stretched">
    <!-- navigation BOF -->
    <div class="arw-mobile-menu">
        <div class="arw-mobile-menu-header">
            <span class="arw-mobile-menu-title">
            <i class="fa fa-bars"></i><span>Menu</span>
            </span>
            <span class="arw-close-canvas"><i class="fa fa-close"></i></span>
        </div>
        <div class="sidebar-menu">
            <ul id="arw_accordionmenu_1977148631" class="nav-accordion nav-mobile-accordion">
                <li><a href="http://sebian.demo.arw.tf/fashion/"><span>Home</span></a></li>
                <li class=" level0 nav-4 level-top first menu-style-group parent">
                    <a href="http://sebian.demo.arw.tf/fashion/women.html" class="level-top">
<span>Women <span style="background-color:#af5875;color:#ffffff" class="cat-label cat-label-1 cat-label-Women pin-top">HOT!</span></span>
</a>
                    <ul class="level0">
                        <li class=" level1 item classic nav-4-1 first parent">
                            <a href="http://sebian.demo.arw.tf/fashion/women/women-s-tops.html">
<span>Tops</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-4-1-1 first">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-tops/shirts.html">
<span>Shirts</span>
</a>
                                </li>
                                <li class=" level2 nav-4-1-2">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-tops/florals.html">
<span>Florals</span>
</a>
                                </li>
                                <li class=" level2 nav-4-1-3">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-tops/crochet.html">
<span>Crochet</span>
</a>
                                </li>
                                <li class=" level2 nav-4-1-4">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-tops/stripes.html">
<span>Stripes <span style="background-color:;color:" class="cat-label cat-label-3 cat-label-Stripes">NEW</span></span>
</a>
                                </li>
                                <li class=" level2 nav-4-1-5">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-tops/checks.html">
<span>Checks</span>
</a>
                                </li>
                                <li class=" level2 nav-4-1-6 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-tops/plain.html">
<span>Plain</span>
</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" level1 item classic nav-4-2 parent">
                            <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms.html">
<span>Bottoms</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-4-2-7 first parent">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/shorts.html">
<span>Shorts</span>
</a>
                                    <ul class="level2">
                                        <li class=" level3 nav-4-2-7-1 first">
                                            <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/shorts/menu-level-4-1.html">
<span>Menu level 4 - 1</span>
</a>
                                        </li>
                                        <li class=" level3 nav-4-2-7-2 last">
                                            <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/shorts/menu-level-4-2.html">
<span>Menu level 4 - 2</span>
</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" level2 nav-4-2-8">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/dresses.html">
<span>Dresses</span>
</a>
                                </li>
                                <li class=" level2 nav-4-2-9">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/trousers.html">
<span>Trousers</span>
</a>
                                </li>
                                <li class=" level2 nav-4-2-10">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/skirts.html">
<span>Skirts</span>
</a>
                                </li>
                                <li class=" level2 nav-4-2-11">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/jeans.html">
<span>Jeans</span>
</a>
                                </li>
                                <li class=" level2 nav-4-2-12 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bottoms/pants.html">
<span>Pants</span>
</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" level1 item classic nav-4-3 parent">
                            <a href="http://sebian.demo.arw.tf/fashion/women/women-s-shoes.html">
<span>Shoes</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-4-3-13 first">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-shoes/heeled-sandals.html">
<span>Heeled sandals</span>
</a>
                                </li>
                                <li class=" level2 nav-4-3-14">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-shoes/flat-sandals.html">
<span>Flat sandals</span>
</a>
                                </li>
                                <li class=" level2 nav-4-3-15">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-shoes/wedges.html">
<span>Wedges</span>
</a>
                                </li>
                                <li class=" level2 nav-4-3-16">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-shoes/high-heels.html">
<span>High-heels</span>
</a>
                                </li>
                                <li class=" level2 nav-4-3-17">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-shoes/flats.html">
<span>Flats</span>
</a>
                                </li>
                                <li class=" level2 nav-4-3-18 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-shoes/ankle-boots.html">
<span>Ankle boots</span>
</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" level1 item classic nav-4-4 parent">
                            <a href="http://sebian.demo.arw.tf/fashion/women/women-s-accessories.html">
<span>Accessories</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-4-4-19 first">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-accessories/jewellery.html">
<span>Jewellery</span>
</a>
                                </li>
                                <li class=" level2 nav-4-4-20">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-accessories/sunglasses.html">
<span>Sunglasses</span>
</a>
                                </li>
                                <li class=" level2 nav-4-4-21">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-accessories/scarves.html">
<span>Scarves</span>
</a>
                                </li>
                                <li class=" level2 nav-4-4-22">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-accessories/headwear.html">
<span>Headwear</span>
</a>
                                </li>
                                <li class=" level2 nav-4-4-23">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-accessories/belts.html">
<span>Belts</span>
</a>
                                </li>
                                <li class=" level2 nav-4-4-24 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-accessories/scarfs.html">
<span>Scarfs</span>
</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" level1 item classic nav-4-5 last parent">
                            <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bags.html">
<span>Bags</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-4-5-25 first">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bags/large-handbags.html">
<span>Large handbags</span>
</a>
                                </li>
                                <li class=" level2 nav-4-5-26">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bags/messenger-bags.html">
<span>Messenger bags</span>
</a>
                                </li>
                                <li class=" level2 nav-4-5-27">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bags/hand-bags.html">
<span>Hand bags</span>
</a>
                                </li>
                                <li class=" level2 nav-4-5-28">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bags/shoulder-bags.html">
<span>Shoulder Bags</span>
</a>
                                </li>
                                <li class=" level2 nav-4-5-29">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bags/cross-body-bags.html">
<span>Cross Body Bags </span>
</a>
                                </li>
                                <li class=" level2 nav-4-5-30 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/women/women-s-bags/purses.html">
<span>Purses</span>
</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=" level0 nav-5 level-top menu-style-group parent">
                    <a href="http://sebian.demo.arw.tf/fashion/men.html" class="level-top">
<span>Men</span>
</a>
                    <ul class="level0">
                        <li class=" level1 item classic nav-5-1 first parent">
                            <a href="http://sebian.demo.arw.tf/fashion/men/trousers.html">
<span>Trousers</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-5-1-1 first">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/trousers/joggers.html">
<span>Joggers</span>
</a>
                                </li>
                                <li class=" level2 nav-5-1-2">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/trousers/casual.html">
<span>Casual</span>
</a>
                                </li>
                                <li class=" level2 nav-5-1-3">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/trousers/chinos.html">
<span>Chinos</span>
</a>
                                </li>
                                <li class=" level2 nav-5-1-4">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/trousers/tailored.html">
<span>Tailored</span>
</a>
                                </li>
                                <li class=" level2 nav-5-1-5 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/trousers/jeans.html">
<span>Jeans</span>
</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" level1 item classic nav-5-2 parent">
                            <a href="http://sebian.demo.arw.tf/fashion/men/shirts-tee.html">
<span>Shirts &amp; Tee</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-5-2-6 first">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/shirts-tee/plain.html">
<span>Plain</span>
</a>
                                </li>
                                <li class=" level2 nav-5-2-7">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/shirts-tee/print.html">
<span>Print</span>
</a>
                                </li>
                                <li class=" level2 nav-5-2-8">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/shirts-tee/short-sleeves.html">
<span>Short Sleeves</span>
</a>
                                </li>
                                <li class=" level2 nav-5-2-9">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/shirts-tee/tee-plain.html">
<span>Tee Plain</span>
</a>
                                </li>
                                <li class=" level2 nav-5-2-10 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/shirts-tee/pattern.html">
<span>Pattern</span>
</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" level1 item classic nav-5-3 last parent">
                            <a href="http://sebian.demo.arw.tf/fashion/men/accessories.html">
<span>Accessories</span>
</a>
                            <ul class="level1">
                                <li class=" level2 nav-5-3-11 first">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/accessories/beachwear.html">
<span>Beachwear</span>
</a>
                                </li>
                                <li class=" level2 nav-5-3-12">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/accessories/caps-and-hats.html">
<span>Caps and Hats</span>
</a>
                                </li>
                                <li class=" level2 nav-5-3-13">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/accessories/ties.html">
<span>Ties</span>
</a>
                                </li>
                                <li class=" level2 nav-5-3-14">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/accessories/scarves.html">
<span>Scarves</span>
</a>
                                </li>
                                <li class=" level2 nav-5-3-15 last">
                                    <a href="http://sebian.demo.arw.tf/fashion/men/accessories/foulards.html">
<span>Foulards</span>
</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=" level0 nav-6 level-top menu-style-group last">
                    <a href="http://sebian.demo.arw.tf/fashion/kids.html" class="level-top">
<span>Kids</span>
</a>
                </li>
                <li class="level0 level-top cms-static-page  ">
                    <a href="http://sebian.demo.arw.tf/fashion/about-us" class="level-top">
                                <span>About Us</span>
                            </a>
                </li>
                <li class="level0 level-top cms-static-page  ">
                    <a href="http://sebian.demo.arw.tf/fashion/brands" class="level-top">
                                <span>Brands</span>
                            </a>
                </li>
            </ul>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery("#arw_accordionmenu_1977148631").arwAccordionMenu({
                        accordion: true,
                        speed: 400,
                        closedSign: 'collapse',
                        openedSign: 'expand',
                        mouseType: 0,
                        easing: 'easeInOutQuad'
                    });
                });
            </script>
        </div>
    </div>
    <div class="site-overlay"></div>
    <script type="text/javascript">
        //<![CDATA[
        var ajaxCartObj = new ajaxCart({
            "send_url": "http:\/\/sebian.demo.arw.tf\/fashion\/ajaxcart\/ajax\/index\/",
            "update_url": "http:\/\/sebian.demo.arw.tf\/fashion\/checkout\/cart\/updatePost\/",
            "src_image_progress": "http:\/\/sebian.demo.arw.tf\/skin\/frontend\/arw_sebian\/default\/images\/loading.gif",
            "error": " \u2191 This is a required field.",
            "is_product_view": 0
        });
        //]]>
    </script>
    <script type="text/javascript">
        //<![CDATA[
        document.observe("dom:loaded", function() {
            var Slide = new tabSlide({
                "url": "http:\/\/sebian.demo.arw.tf\/fashion\/producttab\/producttab\/product\/",
                "effect": "slide",
                "duration": "1",
                "from": "0",
                "to": "100",
                "direction": "true",
                "identifier": null,
                "icon": "http:\/\/sebian.demo.arw.tf\/media\/arw\/producttab\/ajax\/ajax-loader.gif",
                "is_product_view_tab": 0
            });
            Slide.run();
        });
        //]]
    </script>
    <div class="wrapper">
        <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p>
                    <strong>JavaScript seems to be disabled in your browser.</strong><br />
                    You must have JavaScript enabled in your browser to utilize the functionality of this website.                </p>
            </div>
        </div>
    </noscript>
        <div class="page">
            <header class="header-container header_style_1 header_fixed_menu">
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="header-top-left col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <div class="form-language hidden-xs">
                                    <ul class="list-language">
                                        <li>
                                            <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_en&amp;___from_store=fashion_fr" data-toggle="tooltip" data-placement="bottom" title="EN">EN</a>
                                        </li>
                                        <li class="active">
                                            <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_fr&amp;___from_store=fashion_fr" data-toggle="tooltip" data-placement="bottom" title="FR">FR</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-top-link visible-xs">
                                    <ul class="header-top-link-ul">
                                        <li class="header-dropdown-currency">
                                            <span>Language</span>
                                            <ul class="links">
                                                <li>
                                                    <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_en&amp;___from_store=fashion_fr" title="EN">EN</a>
                                                </li>
                                                <li class="active">
                                                    <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_fr&amp;___from_store=fashion_fr" title="FR">FR</a>
                                                </li>
                                                <li>
                                                    <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_de&amp;___from_store=fashion_fr" title="DE">DE</a>
                                                </li>
                                                <li>
                                                    <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_es&amp;___from_store=fashion_fr" title="ES">ES</a>
                                                </li>
                                                <li>
                                                    <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_vi&amp;___from_store=fashion_fr" title="VI">VI</a>
                                                </li>
                                                <li>
                                                    <a href="http://sebian.demo.arw.tf/fashion/customer/account/login/?___store=fashion_ru&amp;___from_store=fashion_fr" title="RU">RU</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="header-top-right col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <div class="header-top-right-inner">
                                    <div class="header-top-link">
                                        <ul class="header-top-link-ul">
                                            <li>
                                             <a href="signup.php">VOUS N'AVEZ PAS DE COMPTE ? VEUILLEZ CRÉEZ UN ICI</a>
                                            </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="header">
                    <div class="container">
                        <div class="header-wrapper">
                            <div class="header-logo">
                                <a href="http://sebian.demo.arw.tf/fashion/" title="Magento Commerce" class="logo"><strong class="no-display">Magento Commerce</strong><img src="images/fashionmakeup.PNG"
                                 alt="Magento Commerce" /></a>
                            </div>
                            <nav class="nav-primary-container clearfix">
                                <div class="wrap-nav">
                                    <div class="arw-toggle-menu-mobile visible-xs">
                                        <div class="arw-btn-menu-mobile" data-style="accordion">
                                            <label>Menu</label>
                                            <span class="fa fa-bars"></span>
                                        </div>
                                    </div>
                                    <div class="sticky-logo">
                                        <a href="http://sebian.demo.arw.tf/fashion/" title="Magento Commerce"><img src="http://sebian.demo.arw.tf/skin/frontend/arw_sebian/default/images/media/logo.png" alt="Magento Commerce" /></a>
                                    </div>


                                                </li>
                                            </ul>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function() {
                                                    jQuery("#arw_accordionmenu_642406199").arwAccordionMenu({
                                                        accordion: true,
                                                        speed: 400,
                                                        closedSign: 'collapse',
                                                        openedSign: 'expand',
                                                        mouseType: 0,
                                                        easing: 'easeInOutQuad'
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="site-overlay"></div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

            <div class="main-container col1-layout">
                <div class="arw-page-title">
                </div>
                <div class="main">
                    <div class="container">
                        <div class="row">
                            <div class="col-main col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="account-login">
                                    <div class="page-title">
                                        <h1>Login or Create an Account</h1>
                                    </div>
                                    <form method="POST">
                                        <input name="form_key" type="hidden" value="3uHbdk9pEThUq7II" />
                                        <div class="col2-set">
                                            <div class="col-1 new-users">
                                                <div class="content">
                                                    <h2>New Customers</h2>
                                                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                                </div>
                                            </div>
                                            <div class="col-2 registered-users">
                                                <div class="content">
                                                    <h2>Registered Customers</h2>
                                                    <p>If you have an account with us, please log in.</p>
                                                    <ul class="form-list">
                                                        <li>
                                                            <label for="email" class="required"><em>*</em>Email Address</label>
                                                            <div class="input-box">
                                                                                                 <input type="text" name="mailconnect" value="" id="email" class="input-text required-entry validate-email" title="Email Address" />
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label for="pass" class="required"><em>*</em>Password</label>
                                                            <div class="input-box">
                                                                                                <input type="password" name="mdpconnect" class="input-text required-entry validate-password" id="pass" title="Password" />

                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div id="window-overlay" class="window-overlay" style="display:none;"></div>
                                                    <div id="remember-me-popup" class="remember-me-popup" style="display:none;">
                                                        <div class="remember-me-popup-head">
                                                            <h3>What's this?</h3>
                                                            <a href="#" class="remember-me-popup-close" title="Close">Close</a>
                                                        </div>
                                                        <div class="remember-me-popup-body">
                                                            <p>Checking &quot;Remember Me&quot; will let you access your shopping cart on this computer when you are logged out</p>
                                                            <div class="remember-me-popup-close-button a-right">
                                                                <a href="#" class="remember-me-popup-close button" title="Close"><span>Close</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <script type="text/javascript">
                                                        //<![CDATA[
                                                        function toggleRememberMepopup(event) {
                                                            if ($('remember-me-popup')) {
                                                                var viewportHeight = document.viewport.getHeight(),
                                                                    docHeight = $$('body')[0].getHeight(),
                                                                    height = docHeight > viewportHeight ? docHeight : viewportHeight;
                                                                $('remember-me-popup').toggle();
                                                                $('window-overlay').setStyle({
                                                                    height: height + 'px'
                                                                }).toggle();
                                                            }
                                                            Event.stop(event);
                                                        }
                                                        document.observe("dom:loaded", function() {
                                                            new Insertion.Bottom($$('body')[0], $('window-overlay'));
                                                            new Insertion.Bottom($$('body')[0], $('remember-me-popup'));
                                                            $$('.remember-me-popup-close').each(function(element) {
                                                                Event.observe(element, 'click', toggleRememberMepopup);
                                                            })
                                                            $$('#remember-me-box a').each(function(element) {
                                                                Event.observe(element, 'click', toggleRememberMepopup);
                                                            });
                                                        });
                                                        //]]>
                                                    </script>
                       <?php
         if(isset($erreur))
             {
                echo '<font color="red">'.$erreur."</font>";
             }
           ?>

                                                      </div>
                                            </div>
                                        </div>
                                        <div class="col2-set">
                                            <div class="col-1 new-users">
                                                <div class="buttons-set">
                                                    <button type="button" title="Create an Account" class="button" onclick="window.location='signup.php';"><span><span>Create an Account</span></span></button>
                                                </div>
                                            </div>
                                            <div class="col-2 registered-users">
                                                <div class="buttons-set">
                                                    <a href="recuperer.php" class="f-left">Forgot Your Password?</a>
                    <button type="submit" class="button" title="Login" name="formconnexion" id="send2"><span><span>Login</span></span></button>
                    <br> <br> <br>
                     <input type="checkbox" name="rememberme" id="remembercheckbox"> <label for="remembercheckbox"> Remember me </label>
                                                </div>
                                            </div>


                                        </div>
                                    </form>
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        var dataForm = new VarienForm('login-form', true);
                                        //]]>
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer-container">
                <div class="arw_sebian_block_footer">
                    <div class="widget widget-static-block">
                        <div class="arw_sebian_block_footer_top">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="footer-logo text-center">
                                            <a href="#" title="ARW Sebian">
                        <img src="images/fashionmakeup_dark.PNG" alt="ARW Sebian"/>
                    </a>
                                        </div>
                                        <div class="footer-sub-logo text-center">
                                            <img src="http://sebian.demo.arw.tf/media/wysiwyg/arw/custom_icon_1.png" alt="ARW Sebian" />
                                        </div>
                                    </div>
                                    <div class="footer-about">
                                        Multipurpose E-Commerce Theme is suitable for furniture store, fashion shop, accessories, electric shop. We have included multiple layouts for home page to give you best selections in customization.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-static-block">
                        <div class="arw_sebian_block_footer_bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="arw-col col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="widget widget-static-block">
                                            <div class="block block-custom-link">
                                                <div class="block-title">
                                                    <span>INFOMATION</span>
                                                </div>
                                                <div class="block-content">
                                                    <ul>
                                                        <li><a href="#">ABOUT US</a></li>
                                                        <li><a href="#">DELIVERY INFOMATION</a></li>
                                                        <li><a href="#">PRIVACY & POLICY</a></li>
                                                        <li><a href="#">TEMRS & CONDITIONS</a></li>
                                                        <li><a href="#">MANUFACTURES</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="arw-col col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="widget widget-static-block">
                                            <div class="block block-custom-link">
                                                <div class="block-title">
                                                    <span>MY ACCOUNT</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="arw-col col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="widget widget-static-block">
                                            <div class="block block-custom-twitter-feed">
                                                <div class="block-title">
                                                    <span>TWITTER</span>
                                                </div>
                                                <div class="block-content">
                                                    <ul>
                                                        <li class="twitter-feed-item">
                                                            Check out new work on my @Behance portfolio: "ARW Sebian Theme" <a target="_blank" href="http://on.be.net/1zOOfBQ">http://on.be.net/1zOOfBQ</a>
                                                        </li>
                                                        <li class="twitter-feed-item">
                                                            Check out new work on my @Behance portfolio: "ARW Sebian Theme" <a target="_blank" href="http://on.be.net/1zOOfBQ">http://on.be.net/1zOOfBQ</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="arw-col col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="widget widget-static-block">
                                            <div class="block block-custom-flickr-photo">
                                                <div class="block-title">
                                                    <span>FLICKR PHOTO</span>
                                                </div>
                                                <div class="block-content">
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                            <a href="#"><img src="http://sebian.demo.arw.tf/media/wysiwyg/arw/_flickr_photo/flickr_image_1.jpg" alt="" /></a>
                                                        </div>
                                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                            <a href="#"><img src="http://sebian.demo.arw.tf/media/wysiwyg/arw/_flickr_photo/flickr_image_2.jpg" alt="" /></a>
                                                        </div>
                                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                            <a href="#"><img src="http://sebian.demo.arw.tf/media/wysiwyg/arw/_flickr_photo/flickr_image_3.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                            <a href="#"><img src="http://sebian.demo.arw.tf/media/wysiwyg/arw/_flickr_photo/flickr_image_4.jpg" alt="" /></a>
                                                        </div>
                                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                            <a href="#"><img src="http://sebian.demo.arw.tf/media/wysiwyg/arw/_flickr_photo/flickr_image_5.jpg" alt="" /></a>
                                                        </div>
                                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                            <a href="#"><img src="http://sebian.demo.arw.tf/media/wysiwyg/arw/_flickr_photo/flickr_image_6.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="wrapper-copyright">
                                    <address>&copy; 2015 <a href="http://www.arexmage.com/magento-themes.html" title="Magento Theme" target="_blank">Magento Theme</a> by ArexWorks. All Rights Reserved.</address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>


            <script type="text/javascript">
                //<![CDATA[
                Mage.Cookies.set(
                    'PAGECACHE_ENV',
                    '8180f48bf043dc4d6cbdf322f7614f69',
                    new Date(new Date().getTime() + 3600 * 1000)
                );
                //]]>
            </script>
            <script type="text/javascript">
                if (document.cookie.length && (document.cookie.indexOf('PAGECACHE_FORMKEY=') == -1)) {
                    Mage.Cookies.set(
                        'PAGECACHE_FORMKEY',
                        'jO6pscKc7TvgQJG6',
                        new Date(new Date().getTime() + 3600000)
                    );
                }
            </script>
        </div>
    </div>
</body>

</html>
© 2018 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
API
Training
Shop
Blog
About
Press h to open a hovercard with more details.