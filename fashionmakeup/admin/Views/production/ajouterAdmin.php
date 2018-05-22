<?php 
include "../../Entities/utilisateur.php";
include "../../Core/utilisateurCore.php";

session_start();
if(isset($_POST['forminscription']))
{
  
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp'] AND !empty($_POST['mdp2']))) 
    {

      $pseudo =htmlspecialchars($_POST['pseudo']);
      $mail =htmlspecialchars($_POST['mail']);
      $mail2 =htmlspecialchars($_POST['mail2']);
      $mdp = sha1($_POST['mdp']);
      $mdp2 = sha1($_POST['mdp2']);

      $pseudolength =strlen($pseudo);
      if($pseudolength<=255)
        { 
            if($mail == $mail2)
            {   

        if(filter_var($mail,FILTER_VALIDATE_EMAIL))
           {
                     $utilisateur2C = new utilisateurCore();
                     $mailexist=$utilisateur2C->VerifierEmail($mail);
                if($mailexist==0)
                {
                if($mdp == $mdp2)
                {  

      //hne yebda el controle de saisie level 2

       //longuer de mot de passe >8             
     if (strlen($_POST['mdp'])>=8) {
      
                if (ctype_lower ($_POST['mdp'])) {
                                  $erreur="votre mot de passe doit contenir au moins une caractére en  majuscule !" ; 
                                  echo "ekteb majuscule";
                            }else{  
                               
                                  $longueurKey = 12;
                    $key = "";
                    for ($i=1; $i<$longueurKey; $i++) { 
                        $key .= mt_rand(0,9);
                    }    



              
       
                        $utilisateur1 = new utilisateur($pseudo,$mail,$mdp);
                        $utilisateur1C = new utilisateurCore();
                        $utilisateur1C->inscritptionAdmin($utilisateur1,$key);
                        $utilisateur1C->EnvoyerMail($mail,$pseudo,$key);

                        $erreur="votre comptre à était bien crée";
   
}

                            }


//strlen
} else{
    $erreur="votre mot de passe doit etre plus que 8 caractéres !";
}
  //Hne youfa el controle de siasie 2



                }
                else{
                    $erreur="vos mot de passes ne correspond pas";
                }
                }
                else{
                    $erreur="email déja utilisé , veuillez utiliser une autre adresse !";
                }
             }
             else{
                $erreur="votre adresse mail n est pas valide !";
             }

            }
            else{
                $erreur="votre mail ne corresond pas";
            }

        }
      else{
        $erreur ="votre pseudo a depasser 255 erreurs";
      }
    
    }
    else
    {
        $erreur = "tous les champs doivent etre complétes";

    }



?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FASHION MAKEUP | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
   <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Fashion makeup

                        !</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $_SESSION['pseudo']; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                              <!-- sidebar menu -->
                       <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                   <li><a href="index.php"><i class="fa fa-home" ></i>Home</a>
                  </li>
                  <li><a href="index.php"><i class="fa fa-edit"></i> Gestion de produit  <span class="fa fa-chevron-down"></span> </a>
                    <ul class="nav child_menu">
                      <li><a href="AJOUTER PRODUIT.php">Ajout de Produits</a></li>
                      <li><a href="LISTE PRODUIT.php">liste de Produits</a></li>
                      <li><a href="GESTION IMAGE.php">Gestion d'Images</a></li>
                    </ul>
                  </li>
                  <li><a href="reservationAdmin.php"><i class="fa fa-desktop"></i> Réservation </a></li>
                  <li><a href="reclamationAdmin.php"><i class="fa fa-desktop"></i> Réclamation </a> </li>
                  <li><a><i class="fa fa-table"></i> Gestion de livraison <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="afficherlivraisons.php">Liste des livraisons</a></li>
                      <li><a href="afficherlivreurs.php">Livreurs<span class="fa fa-chevron-down"></span></a>
                        <ul >
                          <li><a href="ajouterlivreur.php">Ajouter un livreur</a></li>
                          <li><a href="afficherlivreurs.php">Liste des livreurs</a></li>
                        </ul>
                      </li>
                      <li><a href="affecterlivraison.php">Affecter une livraison à un livreur</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-table"></i> Gestion de Commandes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Commande.php">Afficher Commandes Payes</a></li>
                      <li><a href="statcommande.php">Statistiaues</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>

            <!-- sidebar menu -->


                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <li><?php echo $_SESSION['pseudo']; ?></li>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profile</a></li>
                                    <li>
                                        <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                                    </li>
                                    <li>
                                        <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                                    </li>
                                    <li>
                                        <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                                    </li>
                                    <li>
                                        <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>AJouter Admin </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
 </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

     
      <!-- formulaire inscritption -->
                      

                          <form role="form" id="contact_form" class="contact-form" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="row">
                                        <li class="col-sm-12">
                                            <label>
                        <input type="text" class="form-control" placeholder="*PSEUDO" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)){ echo($pseudo);}?>">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="email" class="form-control"  placeholder="*ADRESSE MAIL" name="mail" id="mail" value="<?php if(isset($mail)){ echo($mail);}?>">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="email" class="form-control" placeholder="*CONFIRMER VOTRE MAIL" name="mail2" id="mail2" value="<?php if(isset($mail2)){ echo($mail2);}?>">
                      </label>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="row">
                                        <li class="col-sm-12">
                                            <label>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="*MOT DE PASSE">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="*CONFIRMER MOT DE PASSE">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="hidden" class="form-control" name="website" id="website" placeholder="*AGE">
                      </label>
                                        </li>
                                        <!-- captcha -->
                                          <li class="col-sm-12">
                   

                                        </li>
                                        <!-- captcha -->
                                        <li class="col-sm-12 no-margin">
                                        <table>
                                                                                      <td>
                                                <input type="submit" value="S'INSCRIRE" class="btn" id="btn_submit" onClick="proceed();" name="forminscription">
                                            </td>
                                        </table>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        </section>
        
         <?php 
         
         if(isset($erreur))
             {
                echo '<font color="red">'.$erreur."</font>";
             }

         ?>




                             <?php 
         
         if(isset($erreur))
           {
            echo '<font color="red">'.$erreur."</font>";
           }

         ?>
        <!-- suppression -->
             <br> <br> <br>
                                     <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pseudo..." name="supprimer">
                                    <span class="input-group-btn">
                      <input class="btn btn-default" type="submit" value="supprimer" name="sup">
                    </span>
                                </div>
                            </div>
 <!-- suppression -->
    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    FASHION MAKEUP<a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>

</html>
