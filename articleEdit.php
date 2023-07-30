<?php
session_start();
require_once "includes/config.php";
$id = $_GET['id'];
require_once "actions/selectArticle.php";
include('actions/selectSites.php');
/* if(!isset($_SESSION['admin'])){
    header('Location: login.php');
   } */
if(isset($_REQUEST['submit']))
{
try
{
 $designation = $_REQUEST['designation']; 
 $prix = $_REQUEST['prix'];
 $prixB = $_REQUEST['prixB']; 
 $description = $_REQUEST['description']; 
 $categorie = $_REQUEST['categorie']; 
 $site = $_REQUEST['site']; 
 $stock = $_REQUEST['stock'];



 $image_file = $_FILES["txt_file"]["name"];
 $type = $_FILES["txt_file"]["type"]; //file name "txt_file" 
 $size = $_FILES["txt_file"]["size"];
 $temp = $_FILES["txt_file"]["tmp_name"];
 
 $path="upload/".$image_file; //set upload folder path
 

if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png')
 {
 if(!file_exists($path)) //check file not exist in your upload folder path
 {
 if($size < 5000000) //check file size 5MB
 {
 move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory dir
 }
 else
 {
 $errorMsg="Fichier volumineux, choisir un fichier de 5MB au moins."; //error message file size no
 }
 }
 else
 {
 $errorMsg="Ce fichier existe déjà..."; //error message file not exis
 }
 }
 else
 {
 $errorMsg="Choisir les extensions JPG , JPEG & PNG."; //er
 }
 if(!isset($errorMsg))
 {
 $insert_stmt=$db->prepare('UPDATE article SET designation=:designation,image=:image,prix=:prix,prixB=:prixB,stock=:stock,description=:description,categorie=:categorie,site=:site WHERE article.id=:id
 ');
 $insert_stmt->bindParam(':designation',$designation);
 $insert_stmt->bindParam(':image',$image_file);
 $insert_stmt->bindParam(':prix',$prix);
 $insert_stmt->bindParam(':prixB',$prixB);  
 $insert_stmt->bindParam(':stock',$stock);
 $insert_stmt->bindParam(':description',$description); 
 $insert_stmt->bindParam(':categorie',$categorie);
 $insert_stmt->bindParam(':site',$site);
 $insert_stmt->bindParam(':id',$id);

 
 if($insert_stmt->execute())
 {
 $insertMsg="Bien modifié!"; //execute query success message
 $_SESSION['msg']= $insertMsg;
 //header("refresh:10;index.php"); refresh 10 second and redirect to index.php page
 header("refresh:1;articles.php");
 }
 }

}
catch(PDOException $e)
{
 echo $e->getMessage();
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
    
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
     include 'includes/navbarA.php';
    ?>
    <!-- Navbar End -->




    <!-- Category Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Editer un article</span></h2>
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
        <form method="post" enctype="multipart/form-data"  >
                        <div class="control-group">
                            <input value="<?=$article[1]?>" name="designation" type="text" class="form-control" id="name" placeholder="Désignation"
                                required="required" data-validation-required-message="Entrer la désignation!" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <p name="img"><?=$article[2]?></p>
                            <input name="txt_file" type="file" class="form-control" id="name" 
                                required="required" data-validation-required-message="Choisir un fichier!" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input value="<?=$article[3]?>" name="prix" type="text" class="form-control" id="name" placeholder="Prix"
                                required="required" data-validation-required-message="Entrer le prix!" />
                            <p class="help-block text-danger"></p>
                        </div>
                      
                        <div class="control-group">
                            <input value="<?=$article[4]?>" name="prixB" type="text" class="form-control" id="name" placeholder="Prix barré"
                                required="required" data-validation-required-message="Entrer le prix barré!" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input value="<?=$article[5]?>" name="stock" type="text" class="form-control" id="name" placeholder="stock disponible"
                                required="required" data-validation-required-message="Entrer le stock disponible!" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="description" class="form-control" rows="6" id="message" placeholder="Description"
                                required="required"
                                data-validation-required-message="Entrer une description!"><?=$article[6]?></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <select name="categorie" id="" class="form-control">
                                <option selected disabled>Selectionner la catégorie...</option>
                                <?php
            $i=0;
            while($category=$categories->fetch())
            { 
                $i++;
                ?>
                <option value="<?=$category[0]?>"><?=$category[1]?></option>
                        <?php
            }
            ?>  
                            </select>
                            <p></p>
                        </div>
                        <div class="control-group">
                            <select name="site" id="" class="form-control" required>
                                <option selected disabled>Selectionner le site...</option>
                                <?php
            $i=0;
            while($site=$sites->fetch())
            { 
                $i++;
                ?>
                <option value="<?=$site[0]?>"><?=$site[1]?></option>
                        <?php
            }
            ?> 
                            </select>
                            <p></p>
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