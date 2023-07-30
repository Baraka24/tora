<?php
session_start();
require_once 'includes/config.php';
if (isset($_POST['submit'])) {
    $mail=htmlspecialchars($_POST['mail']);
    $num=htmlspecialchars($_POST['num']);
    $nom=htmlspecialchars($_POST['nom']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $postnom=htmlspecialchars($_POST['postnom']);

    $db-> query("INSERT INTO `internaute`
    VALUES (null, '$nom', '$postnom','$mail','$num','$pwd' )");
    $insertMsg="Bien enregistré!"; //execute query success message
    $_SESSION['msg']= $insertMsg;
    //header("refresh:10;index.php"); refresh 10 second and redirect to index.php page
    header("refresh:2;login.php");
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
      include 'includes/navbarLr.php';
      ?>
    <!-- Navbar End -->
    <!-- Page Header Start -->

    <!-- Page Header End -->




     <!-- Contact Start -->
     <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Enregistrez-vous ici...</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="post" >
                    <?php if(isset($errorMsg))
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
                        <div class="control-group">
                            <input name="nom" type="text" class="form-control" id="name" placeholder="Votre nom"
                                 data-validation-required-message="Entrer votre nom" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="postnom" type="text" class="form-control" id="name" placeholder="Votre postnom"
                                 data-validation-required-message="Entrer votre postnom" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="mail" type="email" class="form-control" id="email" placeholder="Votre Email"
                                 data-validation-required-message="Entrer votre email" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="pwd" type="password" class="form-control" id="subject" placeholder="Entrer votre mot de passe"
                                 data-validation-required-message="Entrer votre mot de passe" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="num" type="text" class="form-control" id="name" placeholder="Votre numéro de telephone"
                                 data-validation-required-message="Votre numéro de telephone" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button name="submit" class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
                                Confirmer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Entrer en contact:</h5>
                <p>Nous sommes une boutique de vente en ligne des articles de seconde main. Nous travaillons dans les respects des clauses, et respectons les droits.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Informations:</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Avenue du Centre,Butembo, RDC</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>manaz@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+243 852 67890</p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Contact End -->









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