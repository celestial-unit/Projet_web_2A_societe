<?php
include '../controller/forumC.php';


$d = new forumC();
$d->supprimer($_GET["id"]);
header('Location:afficherForumBack.php');


?>