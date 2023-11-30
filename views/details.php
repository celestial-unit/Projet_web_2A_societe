<?php
// Connexion à la base de données (à remplacer avec vos informations)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération du paramètre id de l'URL
$id_formation = isset($_GET['id']) ? $_GET['id'] : '';

// Requête pour récupérer les informations de la formation et de la description
$sql = "SELECT formation.*, typeformation.description
        FROM formation
        LEFT JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.id_formation = $id_formation";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barre de recherche CSS</title>
    <link href='https://fonts.googleapis.com/css?family=Scada:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <link rel="stylesheet" href="./details.css">
</head>
<body>
<?php
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nom_formation = $row['Nom'];
    $description = $row['description'];
    $image_url = $row['image_url'];

    // Affichage de la description avec l'image
    echo '<div class="card">';
    echo '  <img src="' . $image_url . '" alt="' . $nom_formation . '">';
    echo '  <div class="card__content">';
    echo "    <h2>$nom_formation</h2>";
    echo "    <p>Description : $description</p>";
    echo '  </div>';
    echo '</div>';
} else {
    echo "Aucune formation trouvée.";
}

$conn->close();
?>

</body>
</html>