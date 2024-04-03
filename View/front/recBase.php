<?php
include '../../Controller/reclamation.php';
include '../../Model/Reclamation.php';


$titre = $_POST["titre"] ?? null;
$description = $_POST["subject"] ?? null;
$typeReclamation = $_POST["type_reclamation"] ?? null;
$etat = $_POST["etat"];
$rec = new reclamation(null, $titre, $description, $typeReclamation, 'en cours de traitement',$timestamp_column);
$reclamationC = new Rec(config::getConnexion());
$reclamationC->addReclamation($rec);
$type = $reclamationC->getTypes();
header("location: affiche.php");

?>
