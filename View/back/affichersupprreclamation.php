<?php
include "../../Controller/reclamation.php";


// Check if "id_r" is set in the $_GET array
if (isset($_GET["id_rec"])) {
    $id_r = $_GET["id_rec"];

    $r = new Rec(config::getConnexion());
    $tab = $r->listReclamations();

    $c = new Rec(config::getConnexion());
    $c->deletereclamation($id_r);
    
    header('Location:reclamation_BACK.php');
} else {
    // Handle the case where "id_r" is not set, for example, redirect to an error page

}
?>
