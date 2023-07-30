<div class="container-fluid">
       
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Boutique
                    <span>
                        <?php
                        if(isset($_SESSION['internaute']))
                        {
                            echo ($_SESSION['email']);
                        }
                        else
                        {
                            ?>
                            <a href="login.php" class="text-sm">Se connecter</a>
                            <?php
                        }
                        ?>
                    </span>
                    </h1>
              </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <!-- <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher les articles">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form> -->
            </div>
            <div class="col-lg-3 col-6 text-right">
                
            <!-- hidden start-->
            <div class="col-lg-8 table-responsive mb-5" hidden>
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Articles</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Enlever</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                $products = $db->query( "SELECT `article`.`id`, `article`.`designation`, `article`.`image`, `article`.`prix`, `article`.`prixB`, `article`.`stock`, `article`.`description`, `article`.`categorie`, `article`.`site`,categorie.categorie,site.nom FROM `article`,categorie,site WHERE categorie.id=article.categorie AND site.id=article.site AND article.id IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['prix'] * $_SESSION['panier'][$product['id']] ;
                ?>
                        <tr>
                            <td class="align-middle"><img src="upload/<?=$product['image']?>" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                            <td class="align-middle">$<?=$product['prix']?></td>
                            <td class="align-middle"><?=$_SESSION['panier'][$product['id']] // Quantité?></td>
                            <td class="align-middle"><?=$_SESSION['panier'][$product['id']]* $product['prix']// Quantité?></td>
                            <td class="align-middle"><a href="cart.php?del=<?=$product['id']?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>
                <?php endforeach ;} ?>
                        </tbody> 
                </table>
            </div>
            <!-- hidden end-->
                <a href="" class="btn border">
                    <i class="fas fa-money text-primary"></i>
                    <span class="badge">$<?=$total?></span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <?php
                     if(!isset($_SESSION['panier'])){
                        //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
                        $_SESSION['panier'] = array();
                     }
                    ?>
                    <span class="badge"><?=array_sum($_SESSION['panier'])?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->





  