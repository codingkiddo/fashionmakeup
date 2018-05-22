<?php  
 //load_product.php  

 include_once "../Entities/produit.php";
    include_once "../Entities/image.php";
    include_once "../Entities/categorie.php";
    include_once "../Entities/sous_categorie.php";
    include_once "../Core/produitC.php";
    include_once "../Core/imageC.php";
    include_once "../Core/categorieC.php";
    include_once "../Core/sous_categorieC.php";

 $connect = mysqli_connect("localhost", "root", "", "projet");  
 if(isset($_POST["price"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM produit WHERE prix <= ".$_POST['price']." ORDER BY prix desc";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $imagesC = new imageC();
                $listeimage = $imagesC->recupererimage($row['reference']);  

                $output .= '  <li class="col-sm-4 animate fadeIn" data-wow-delay="0.5s">
                                                <div class="items-in" >
                                                    
                                                    <!-- Image -->
                                                    <?php
                                                        foreach ($listeimage as $row) {
                                                    ?>
                                                        <!--  Tags  -->
                                                        <div style="min-height: 350px">
                                                            <img src="../../admin/Views/production/images/<?php echo $row[\'chemin\'] ;?>" alt="" style="max-height: 350px;">
                                                        </div>
                                                        
                                                    <?php
                                                        break;
                                                        }

                                                      ?>
                                                    
                                                    <!-- Hover Details -->
                                                    <div class="over-item">
                                                        <ul class="animated fadeIn">
                                                        <?php
                                                        foreach ($listeimage as $r) {
                                                        ?>
                                                            <li> <a href="../../admin/Views/production/images/<?php echo $r[\'chemin\'] ;?>" data-lighter><i class="ion-search"></i></a></li>
                                                        <?php
                                                        break;
                                                         }

                                                      ?>
                                                            
                                                            <li> <a datalighter><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="#." class="btn-dark"><i class="fa fa-shopping-cart"></i>></a></li><br>
                                                            <!-- Rating Stars -->
                                                            <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <!-- Item Name -->
                                                    <form id="myform" method="POST" action="details_produit.php">
                                                    <input type="text" name="reference_p" value="'.$row['reference'].'" hidden>
                                                    <div class="details-sec">
                                                        <input type="submit" value="'.$row['nom'].'" style="border: none; background-color: white; font-weight: solid;" class="font-montserrat"><hr>
                                                        <span class="font-montserrat">'.$row['prix'].'"DT" ?></span>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </li>
                ';  
           }  
      }  
      else  
      {  
           $output = "No Product Found";  
      }  
      echo $output;  
 }  
 ?>  