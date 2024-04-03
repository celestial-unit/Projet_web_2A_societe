<?php
// disclub.php
include("../Model/clubConnect.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    // Get the clubMail from the URL
    $clubMailToDisable = isset($_GET['clubMail']) ? $_GET['clubMail'] : '';

    // Create an instance of ClubC
    $clubController = new Club();

    // Disable the club
    if ($clubController->disableClub($clubMailToDisable, Config::getConnexion())) {
        echo "Club disabled successfully.";
    } else {
        echo "Error disabling the club.";
    }

    // Redirect to clubAdmin.php
    header('Location: ../View/clubAdmin.php');
    exit; // Ensure no further code is executed
}
?>
