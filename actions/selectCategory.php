<?php
$categories=$db->query("SELECT * FROM `categorie` WHERE id=$id");
$category = $categories->fetch();
?>