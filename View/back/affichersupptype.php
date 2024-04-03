<?php
include "../../Controller/type.php";
// Check if "id_r" is set in the $_GET array
if (isset($_GET["id_type"])) {
    $id_r = $_GET["id_type"];

    $r = new type();
    $tab = $r->listtype();

    $c = new type();
    $c->deletetype($id_r);
    
    header('Location:reclamation_BACK.php');
} else {
    // Handle the case where "id_r" is not set, for example, redirect to an error page
}
?>
