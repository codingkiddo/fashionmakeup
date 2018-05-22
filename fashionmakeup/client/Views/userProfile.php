<?php
include "../config.php";
session_start();
$bdd = config::getConnexion();

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from uouapps.a2hosted.com/dhani-html/html/sebian-intro/sebian/08-02-blog-left-side-bar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Feb 2017 13:48:10 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PROFILE FASHION MAKEUP</title>
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
<!-- Page Wrap -->
<div id="wrap">

  <!-- Header -->
  <header class="header-style-2">
    <!-- Top Bar -->
    <div class="top-bar">
      <div class="container">
        <!-- Language -->
        <div class="language"> <a href="#." class="active">EN</a> <a href="#.">FR</a> <a href="#.">GE</a> </div>
        <div class="top-links">
          <ul>
            <LI>  <a href="finalindex.php">Acceuil</a>  </LI>
            <li> <a href="Newsletter.php">S'abonner au Newsletter</a></li>
            <li><a href="disconnect.php">Se Déconnecter</a></li>
          </ul>
          <!-- Social Icons -->
          <ul class="social_icons">
            <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>
            <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>
            <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Logo -->
    <div class="container">
      <div class="logo"> <a href="#."><img src="images/fashionmakeup.PNG" alt=""></a> </div>
    </div>

    <!-- Nav -->
    <div class="sticky">
      <div class="container">
      </div>
    </div>
  </header>
  <!-- Header End -->

  <!-- CONTENT START -->
  <div class="content">

    <!--======= SUB BANNER =========-->
    <section class="sub-banner">
      <div class="container">
        <h4>PROFIL FASHION MAKE UP</h4>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><?php echo $userinfo['pseudo']; ?></a></li>
          <li class="active"><?php echo $userinfo['mail']; ?></li>
        </ol>
      </div>
    </section>

    <!-- Blog -->
    <section class="section-p-30px blog-page">
      <div class="container">
        <div class="row">

          <!-- Left Side Bar -->
          <div class="col-sm-3 animate fadeInLeft" data-wow-delay="0.4s">
            <div class="side-bar">

              <!--  SEARCH -->
              <div class="search">
                <form>
                  <input type="text" placeholder="SEARCH FAQ">
                  <button type="submit"> <i class="fa fa-search"></i></button>
                </form>
              </div>

              <!-- HEADING -->
              <div class="heading">
                <h4>MON COMPTE</h4>
              </div>

              <!-- CATEGORIES -->
              <ul class="cate">
                <li><a href="edit.php">EDITER MON COMPTE</a></li>
                <li><a href="commande.php"> CONSULTER COMMANDES</a></li>
                <li><a href="livraisonclient.php" style="text-transform:uppercase"> CONSULTER LIVRAISON</a></li>
                <li><a href="affichageReclamation.php" style="text-transform:uppercase"> CONSULTER mes réclamations</a></li>
                <li><a href="affichageReservation.php" style="text-transform:uppercase"> CONSULTER mes réservations</a></li>
                <li><a href="chat.php">chat (1)</a></li>
                <li><a href="forum.php">FORUM</a></li>
                <li><a href="disconnect.php">DÉCONNEXION</a></li>

              </ul>
              <ul>

              </ul>

              <!-- HEADING -->
              <div class="heading">
                <h4>DERNIERS ACHATS</h4>
              </div>
              <!-- CATEGORIES -->
              <ul class="cate latest-post">

                <!-- Post Small -->
                <li>
                  <div class="media">
                    <div class="media-left"> <a href="#."><img src="images/post-left-1.jpg" alt=""></a></div>
                    <div class="media-body"> <a href="#.">Pretty in pink</a>
                      <p>86 View - 03 Comment</p>
                    </div>
                  </div>
                </li>
                <!-- Post Small -->
                <li>
                  <div class="media">
                    <div class="media-left"> <a href="#."><img src="images/post-left-2.jpg" alt=""></a></div>
                    <div class="media-body"> <a href="#.">Casual in grey</a>
                      <p>86 View - 03 Comment</p>
                    </div>
                  </div>
                </li>
                <!-- Post Small -->
                <li>
                  <div class="media">
                    <div class="media-left"> <a href="#."><img src="images/post-left-3.jpg" alt=""></a></div>
                    <div class="media-body"> <a href="#.">BANDAGE SET</a>
                      <p>86 View - 03 Comment</p>
                    </div>
                  </div>
                </li>
              </ul>

              <!-- HEADING -->
              <div class="heading">
                <h4>ARCHIVE</h4>
              </div>
              <!-- CATEGORIES -->
              <ul class="cate">
                <li><a href="#.">March 2015
                  Jan 2015</a></li>
                <li><a href="#."> December 2014</a></li>
                <li><a href="#."> November 2014</a></li>
                <li><a href="#."> July 2014</a></li>
              </ul>

              <!-- TAGS -->
              <h4 class="margin-t-40">PRODUIT TAGS</h4>
              <ul class="tags">
                <li><a href="#.">FASHION</a></li>
                <li><a href="#.">BAGS</a></li>
                <li><a href="#.">TABLET</a></li>
                <li><a href="#.">ELECTRONIC</a></li>
                <li><a href="#.">BEAUTY</a></li>
                <li><a href="#.">TRtENDING</a></li>
                <li><a href="#.">SHOES</a></li>
              </ul>
            </div>
          </div>

          <!-- Right Bar -->
          <div class="col-sm-9 animate fadeInRight" data-wow-delay="0.4s">
            <!--  Blog Posts -->
            <div class="blog-posts">
              <ul>
                <!--  Posts 1 -->
                <li class="animate fadeInUp" data-wow-delay="0.4s">
                  <!--  Image -->
                  <img class="img-responsive" src="https://ngstudentexpeditions.com/wp-content/uploads/2017/08/blank-profile-picture.jpg" alt="">

                  <!-- Tag Icon -->
                  <div class="blog-tag-icon"> <i class="fa fa-pencil"></i> </div>
                  <span class="tags">CONSEILS ET DÉMONSTRATION</span> <a href="#." class="tittle-post font-playfair">OMBRES À PAUPIÉRES FASHION MAKEUP</a>
                  <p> Plus qu'une tendance, le maquillage nude est devenu le look beauté à maitriser quelle que soit la saison. De jour comme de nuit, il sublime nos traits tout en restant discret. Alors pour maitriser vous aussi ce maquillage et arborer une mine de poupée, suivez pas à pas comment faire un maquillage nude.</p>
                  <!--  Post Info -->
                  <ul class="info">
                    <li><i class="fa fa-user"></i> admin</li>
                    <li><i class="fa fa-calendar-o"></i> 12 JULY</li>
                    <li><i class="fa fa-eye"></i> 325</li>
                    <li class="read-right"><a class="btn btn-small btn-dark" href="#.">READ MORE</a></li>
                  </ul>
                </li>

                <!--  Posts 2 -->
                <li class="animate fadeInUp" data-wow-delay="0.4s">
                  <!--  Image -->

                  <!--  Video Section -->

                  <section class="vid"> <img class="img-responsive" src="https://i.ytimg.com/vi/jzxPOwgpVFs/maxresdefault.jpg" alt="">
                    <div class="position-center-center"> <a href="#." class="video-btn"></a> </div>
                  </section>

                  <!-- Tag Icon -->
                  <div class="blog-tag-icon"> <i class="fa fa-film"></i> </div>
                  <span class="tags">TRENDING NEWS</span> <a href="#." class="tittle-post font-playfair"> Standard post with featured video</a>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                    expedita distinctio. <br>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non </p>
                  <!--  Post Info -->
                  <ul class="info">
                    <li><i class="fa fa-user"></i> admin</li>
                    <li><i class="fa fa-calendar-o"></i> 12 JULY</li>
                    <li><i class="fa fa-eye"></i> 325</li>
                  </ul>
                </li>

                <!--  Posts 3 -->
                <li class="animate fadeInUp" data-wow-delay="0.4s">
                  <!--  Image -->
                  <div class="product-slides">
                    <div><img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-v2I1ykOpVwHjm1aZpbjjz8OwP_4Wv6tei0BVokYcmOYCLNdq" alt=""></div>
                    <div><img class="img-responsive" src="images/blog-large-2.jpg" alt=""></div>
                    <div><img class="img-responsive" src="images/blog-large-1.jpg" alt=""></div>
                  </div>
                  <!-- Tag Icon -->
                  <div class="blog-tag-icon"> <i class="fa fa-picture-o"></i></div>
                  <span class="tags">MOTION GRAPHIC</span> <a href="#." class="tittle-post font-playfair">Standard post with slide images</a>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                    expedita distinctio. <br>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non </p>
                  <!--  Post Info -->
                  <ul class="info">
                    <li><i class="fa fa-user"></i> admin</li>
                    <li><i class="fa fa-calendar-o"></i> 12 JULY</li>
                    <li><i class="fa fa-eye"></i> 325</li>
                  </ul>
                </li>

                <!--  Posts 4 -->
                <li class="animate fadeInUp" data-wow-delay="0.4s">
                  <!-- Image -->
                  <a href="#." class="link-post"> http://fortawesome.github.io/Font-Awesome </a>

                  <!-- Tag Icon -->
                  <div class="blog-tag-icon"> <i class="fa fa-link"></i></div>
                  <span class="tags">MOTION GRAPHIC</span> <a href="#." class="tittle-post font-playfair">Standard post with Link</a>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                    expedita distinctio. <br>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non </p>
                  <!--  Post Info -->
                  <ul class="info">
                    <li><i class="fa fa-user"></i> admin</li>
                    <li><i class="fa fa-calendar-o"></i> 12 JULY</li>
                    <li><i class="fa fa-eye"></i> 325</li>
                  </ul>
                </li>
              </ul>
            </div>

            <!--======= PAGINATION =========-->
            <ul class="pagination animate fadeInUp" data-wow-delay="0.4s">
              <li><a href="#.">Fb</a></li>
              <li><a href="#.">insta</a></li>
              <li><a href="#.">snap</a></li>
              <li><a href="#."><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
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

<!-- Mirrored from uouapps.a2hosted.com/dhani-html/html/sebian-intro/sebian/08-02-blog-left-side-bar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Feb 2017 13:48:14 GMT -->
</html>
