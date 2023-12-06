<?php
include '../controller/commentaireC.php';


$d = new commentaireC();
$d->supprimer($_GET["id"]);
header('Location:afficherCommentaire.php');


?>