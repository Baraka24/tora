<?php 
   session_start();
   include_once "includes/config.php";

   //supprimer les produits
   //si la variable del existe 
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <?php
    include 'includes/topBar.php';
    ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
      <?php
      include 'includes/navbar1.php';
      ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">PANIER</h1>
           
        </div>
    </div>
    <!-- Page Header End -->




    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
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
                            <td class="align-middle"><img src="upload/<?=$product['image']?>" alt="" style="width: 50px;"> <?=$product['designation']?></td>
                            <td class="align-middle">$<?=$product['prix']?></td>
                            <td class="align-middle"><?=$_SESSION['panier'][$product['id']] // Quantité?></td>
                            <td class="align-middle">$<?=$_SESSION['panier'][$product['id']]* $product['prix']// Quantité?></td>
                            <td class="align-middle"><a href="cart.php?del=<?=$product['id']?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>
                <?php endforeach ;} ?>
                        </tbody> 
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Resumé du panier</h4>
                    </div>
                    <div class="card-body">
                       
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$<?=$total?></h5>
                        </div>
                        <a href="confirm.php" class="btn btn-block btn-primary my-3 py-3">Confirmer</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- Cart End -->









    <!-- Footer Start -->
    <?php
    include 'includes/footer.php';
    ?>         
                
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>