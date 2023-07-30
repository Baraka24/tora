<?php 
session_start();
require_once "includes/config.php";
/* if(!isset($_SESSION['admin'])){
    header('Location: login.php');
   } */
if (isset($_POST['submit'])) {
    $categorie=htmlspecialchars($_POST['categorie']);
    
    $description=htmlspecialchars($_POST['description']);

    $db-> query("INSERT INTO `categorie` VALUES (null, '$categorie', '$description' )");
    $insertMsg="Bien ajouté!"; //execute query success message
    $_SESSION['msg']= $insertMsg;
    //header("refresh:10;index.php"); refresh 10 second and redirect to index.php page
    header("refresh:2;category.php");
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
    
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
     include 'includes/navbarA.php';
    ?>
    <!-- Navbar End -->




    <!-- Category Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Ajouter une catégorie</span></h2>
        </div>
        <div class="row px-xl-5">
        <div class="col-md-4"></div>
        <div class="col-md-4 mb-5">
        <?php
if(isset($errorMsg))
{
    ?>
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
          <?=$errorMsg?>
    </div>
    <?php
}
elseif(isset($_SESSION['msg']))
{
    ?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          <?=$_SESSION['msg']?>
    </div>
    <?php
}
        unset($_SESSION['msg']);
?>     
        <form method="post"  >
                        <div class="control-group">
                            <input name="categorie" type="text" class="form-control" id="name" placeholder="Catégorie"
                                required="required" data-validation-required-message="Entrer la catégorie!" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Description"
                                required="required" name="description"
                                data-validation-required-message="Entrer une description!"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button name="submit" class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
                                Valider
                            </button>
                        </div>
                    </form>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>
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