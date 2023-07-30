<?php
$clients=$db->query("SELECT `acheter`.`id`, `acheter`.`internaute`, `acheter`.`dates`, `acheter`.`article`, `acheter`.`quantite`, internaute.nom,internaute.postnom,internaute.mail,internaute.numtel,article.designation,article.image,article.prix FROM `acheter`,internaute,article WHERE internaute.id=acheter.internaute AND acheter.article=article.id AND internaute.id=$id");

?>