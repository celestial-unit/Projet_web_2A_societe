<?php
    include '../Model/clubConnect.php';
    $club =new club();
    $conn = new config();
    $pdo = $conn->getConnexion();
    
    /*$conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed". $conn->connect_error);
    }*/




    
   

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $links = $_POST['links'];
    $university = $_POST['university'];
    $description = $_POST['description'];
    $field = $_POST['Field'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];
    $clubImage = $_POST['clubImage'];
    $street = $_POST['street'];
    $clubMail = $_POST['clubMail'];

    $club->postal = $postal;
    $club->name = $name;
    $club->links = $links;
    $club->university = $university;
    $club->city = $city;
    $club->description = $description;
    $club->field = $field;
    $club->country = $country;
    $club->clubImage = $clubImage;
    $club->street = $street;
    $club->clubMail = $clubMail;

    try {
        $upsertQuery = $pdo->prepare("
            INSERT INTO club (name, description, field, links, clubImage, clubMail,Status)
            VALUES (?, ?, ?, ?, ?, ?,?)
            ON DUPLICATE KEY UPDATE
            field = VALUES(field), description = VALUES(description), links = VALUES(links), clubImage = VALUES(clubImage), name = VALUES(name);
    
            INSERT INTO location (clubMail, country, postal, university, city, street)
            VALUES (?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            country = VALUES(country), postal = VALUES(postal), university = VALUES(university), city = VALUES(city), street = VALUES(street);
        ");
        $upsertQuery->execute([$name, $description, $field, $links, $clubImage, $clubMail,'Active', $clubMail,  $country, $postal, $university, $city, $street]);
    } catch (PDOException $e) {
        // Handle exceptions
        error_log('Error: ' . $e->getMessage());
    }
    
    // Redirect the user after form processing
    header('Location: ../View/clubAdmin.php');
    
    
}
    
    ?>

    