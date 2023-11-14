<?php

include '../controller/formationC.php';
if (isset($_GET['id'])) {
    $formationC = new formationC();
    $formationC->deleteFormation($_GET['id']);
    header('location:newcrudview.php'); 
}
else{
    echo "ID de la formation non specifie.";
}
?>