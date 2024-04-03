<?php
include '../../Controller/stage.php';

if(isset($_GET['id'])) {
    $id_stage = $_GET['id'];

    $c = new sta();

    $c->deletsatge($id_stage);

    
    header('Location: ../front/afficher_stage.php');
    exit();
} else {
    echo "Invalid ID.";
}
?>
