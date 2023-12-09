<?php
include '../../Controller/stage.php';

if(isset($_GET['id'])) {
    $id_stage = $_GET['id'];

    $c = new sta();

    $c->deletsatge($id_stage);

    
    header('Location: stage_Back.php');
    exit();
} else {
    echo "Invalid ID.";
}
?>
