<?php 
session_start();
require_once 'includes/config.php';

if(isset($_POST['submit']))
{
    $userName =htmlspecialchars($_POST["email"]);
    $userPass =htmlspecialchars($_POST["pswd"]);
    $query = $db->query("SELECT * FROM `internaute` WHERE `mail`= '$userName' AND `pwd` = '$userPass'");
    $row = $query->fetch();
    
    if($row)
    {
        $_SESSION['internaute']=$row['id'];
        $_SESSION['nom']=$row['nom'];
        $_SESSION['postom']=$row['postnom'];
        $_SESSION['email']=$row['mail'];
        $_SESSION['numtel']=$row['numtel'];
        header('Location:cart.php');

    }
    $query1 = $db->query("SELECT * FROM `admin` WHERE `nom`= '$userName' AND `pwd` = '$userPass'");
    $row1 = $query1->fetch();
    
    if($row1)
    {
        $_SESSION['admin']=$row['id'];
        $_SESSION['nom']=$row['nom'];
        header('Location:admin.php');

    }
    else
    {
        $_SESSION['alerteE']="Mot de passe ou Nom d'utilisateur incorrect!";
        header('Location:login.php');
    }
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
            <h2 class="section-title px-5"><span class="px-2">Connectez-vous ici...</span></h2>
        </div>
        <div class="row px-xl-5">
        <div class="col-md-4"></div>
        <div class="col-md-4 mb-5">
                        
                        <form method="post">
                        <?php
if(isset($_SESSION['alerteE']))
{
    ?>
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
          <?=$_SESSION['alerteE']?>
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
        unset($_SESSION['alerteE']);
?>    
                            <div class="form-group">
                                <input name="email" type="email" class="form-control border-0 py-4" placeholder="Votre Email"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <input name="pswd" type="password" class="form-control border-0 py-4" placeholder="Votre mot de passe" required="required" />
                            </div>
                            <div>
                                <button name="submit" class="btn btn-primary btn-block border-0 py-3" type="submit">Se connecter</button>
                            </div>
                            <p>Vous n'avez pas de compte? <a href="register.php" class="nav-item nav-link">S'enregistrer</a></p>
                        </form>
        </div>
        <div class="col-md-4"></div>
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