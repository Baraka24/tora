<?php
session_start();
include_once "includes/config.php";
if(!isset($_SESSION['internaute'])){
  echo "<script>alert('Vous devez être connecté svp!');document.location='login.php'</script>";

 }
 if(isset($_SESSION['internaute'])){ 
$total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session 
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "<script>alert('Votre panier est vide!');document.location='cart.php'</script>";
              }else {
                //si oui 
                $products = $db->query( "SELECT `article`.`id`, `article`.`designation`, `article`.`image`, `article`.`prix`, `article`.`prixB`, `article`.`stock`, `article`.`description`, `article`.`categorie`, `article`.`site`,categorie.categorie,site.nom FROM `article`,categorie,site WHERE categorie.id=article.categorie AND site.id=article.site AND article.id IN (".implode(',', $ids).")");
  $internaute = $_SESSION['internaute'];
                //lise des produit avec une boucle foreach
                foreach($products as $product){
    $ok = $_SESSION['panier'][$product['id']];
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['prix'] * $_SESSION['panier'][$product['id']] ;
                $db->query("INSERT INTO `acheter` VALUES (NULL,'$internaute',NOW(),'" . $product['id'] . "','" . $ok . "')");
    unset($_SESSION['panier']);
                echo "<script>alert('Félicitations!Vous avez confirmé vos achats! Merci de passer de nouveaux achats...');document.location='index.php'</script>";
              }
                }
                
                 
                }
?>