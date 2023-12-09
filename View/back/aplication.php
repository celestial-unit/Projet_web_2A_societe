


<?php
///////////////////////////////////////////////// add
include '../../controler/stage.php';
include '../../model/Stage.php';

$error = "";

// create client
$s = null;

// create an instance of the controller
$s = new sta();
if (
  isset($_POST["Domaine"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["date_f"]) &&
    isset($_POST["capacite"])&& isset($_POST["nom_societe"]) && isset($_POST["description"]) && isset($_POST["email"])  
) {
    if (
        !empty($_POST["Domaine"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["date_f"]) &&
        !empty($_POST["capacite"])&& !empty($_POST["nom_societe"]) && !empty($_POST["description"]) && !empty($_POST["email"])
    ) {
        $s = new Sta(
            null,
            $_POST['Domaine'],
            $_POST['date_d'],
            $_POST['date_f'],
            $_POST['capacite'],
            $_POST['nom_societe'],
            $_POST['descrption'],
            $_POST['email'],

        );
        $s->addStage($s);
        header('Location:stage_BACK.php');
    } else
        $error = "Missing information";
}
?>





