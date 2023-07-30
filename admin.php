<?php 
   session_start();
   include_once "includes/config.php";

   
   /* if(!isset($_SESSION['admin'])){
    header('Location: login.php');
   } */
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
    
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
     include 'includes/navbarA.php';
    ?>
    <!-- Navbar End -->




    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Administration | E Boutique</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <h6 class="text-truncate mb-3 text-center">Articles</h6>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 bg-primary">
                        <div class="d-flex justify-content-center">
                            <h6>
                                <?php
                                $articles=$db->query("SELECT COUNT(*) AS articles FROM article");
                                $articles = $articles->fetch();
                                echo $articles['articles'];
                                ?>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="articles.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Accéder</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <h6 class="text-truncate mb-3 text-center">Categories</h6>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 bg-primary">
                        <div class="d-flex justify-content-center">
                            <h6>
                            <?php
                                $categories=$db->query("SELECT COUNT(*) AS categories FROM categorie");
                                $categories = $categories->fetch();
                                echo $categories['categories'];
                                ?>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="categories.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Accéder</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <h6 class="text-truncate mb-3 text-center">Clients</h6>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 bg-primary">
                        <div class="d-flex justify-content-center">
                            <h6>
                            <?php
                                $clients=$db->query("SELECT COUNT(*) AS clients FROM internaute");
                                $clients = $clients->fetch();
                                echo $clients['clients'];
                                ?>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="clients.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Accéder</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <h6 class="text-truncate mb-3 text-center">Sites</h6>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 bg-primary">
                        <div class="d-flex justify-content-center">
                            <h6>
                            <?php
                                $sites=$db->query("SELECT COUNT(*) AS sites FROM site");
                                $sites = $sites->fetch();
                                echo $sites['sites'];
                                ?>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="sites.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Accéder</a>
                    </div>
                </div>
            </div>
            
           
            
        </div>
    </div>
    <!-- Products End -->




    <!-- Products Start -->
    
    <!-- Products End -->




    <!-- Footer Start -->
    <?php
    include 'includes/footerA.php';
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