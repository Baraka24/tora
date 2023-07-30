<?php
$sites=$db->query("SELECT * FROM `site` WHERE id=$id");
$site = $sites->fetch();

?>