<?php
header("Access-Control-Allow-Origin: *"); // Permettre toutes les origines (CORS)
// Connexion à la base de données (à remplacer avec vos informations)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération du terme de recherche depuis l'URL
$searchTerm = isset($_GET['Nom']) ? $_GET['Nom'] : '';

// Requête pour rechercher les formations dans la base de données
$sql = "SELECT * FROM formation WHERE Nom LIKE '%$searchTerm%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Renvoyer les résultats sous forme de JSON
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode(array('message' => 'Aucune formation trouvée.'));
}

$conn->close();
?>
