<?php
require_once 'includes/config.php';
include('actions/selectArticles.php');
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



    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Nos articles</span></h2>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="article.php" class="btn btn-sm btn-primary my-3 py-3">Nouvel article</a>
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>#</th>
                            <th>Désignation</th>
                            <th>Image</th>
                            <th>Prix</th>
                            <th>Prix barré</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Catégorie</th>
                            <th>Site</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
            $i=0;
            while($article=$articles->fetch())
            {
                $i++;
                ?>
                        <tr>
                            <td class="align-middle"><?=$i?></td>
                            <td class="align-middle"><?=$article[1]?></td>
                            <td class="align-middle"><img src="upload/<?=$article[2]?>" alt="" style="width: 100px;"></td>
                            <td class="align-middle"><?=$article[3]?></td>
                            <td class="align-middle"><?=$article[4]?></td>
                            <td class="align-middle"><?=$article[5]?></td>
                            <td class="align-middle"><?=$article[6]?></td>
                            <td class="align-middle"><?=$article[9]?></td>
                            <td class="align-middle"><?=$article[10]?></td>
                            <td class="align-middle"><a href="articleEdit.php?id=<?=$article[0]?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td class="align-middle"><a href="" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <?php
            }
            ?>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <!-- Categories End -->




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