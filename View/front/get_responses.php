<?php
include '../../Controller/rep.php'; 

// Check if reclamation ID is provided
if (isset($_GET["id_rec"])) {
    $reclamationId = $_GET["id_rec"];

    // Assuming you have a method to get responses by reclamation ID
    $responseController = new rep(); // Replace with your actual controller
    $responses = $responseController->getResponsesByReclamationId($reclamationId);

    // Display responses in a table
    echo '<table border="1">';
    echo '<tr><th>Response</th></tr>';
    foreach ($responses as $response) {
        echo '<tr><td>' . $response['rep'] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo 'Invalid reclamation ID.';
}
?>
