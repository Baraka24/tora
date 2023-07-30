<?php
$articles=$db->query("SELECT `article`.`id`, `article`.`designation`, `article`.`image`, `article`.`prix`, `article`.`prixB`, `article`.`stock`, `article`.`description`, `article`.`categorie`, `article`.`site`,categorie.categorie,site.nom FROM `article`,categorie,site WHERE categorie.id=article.categorie AND site.id=article.site AND article.id=$id");
$article = $articles->fetch();
?>