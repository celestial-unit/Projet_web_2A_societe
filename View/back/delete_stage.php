<?php

/////////////////////////delete stage
include '../../controler/stage.php';
$sta = new sta();
$sta->deletsatge($_GET["id_stage"]);
header('Location:stage_BACK.php');
?>
