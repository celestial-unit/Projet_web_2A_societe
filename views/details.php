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

// Récupérer le paramètre id de l'URL
$id_formation = isset($_GET['id']) ? $_GET['id'] : 0;

// Requête pour récupérer les informations de la formation spécifique avec jointure
$sql = "SELECT formation.*, typeformation.description, typeformation.domaine,formation.nbheures
        FROM formation
        LEFT JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.id_formation = $id_formation";

$result = $conn->query($sql);

if (!$result) {
    die("Erreur dans la requête : " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="./details.css">
</head>
<body>
    <div class="container">
        <div id="slider-2" class="slider">
            <div class="slider-wrapper">
                <?php
                // Vérifier si la requête a réussi avant de boucler
                if ($result->num_rows > 0) {
                    // Boucle à travers les résultats de la requête
                    while ($row = $result->fetch_assoc()) {
                        // Nouvelle diapositive pour chaque formation
                        echo '<div class="slide">';
                        // Incorporer les données de la base de données dans votre HTML
                        echo '<div class="values-slider">';
                        echo '<div class="values-column">';
                        echo '<div class="spacer-xxxs desktop-hidden"></div>';
                        echo '<h6>' . $row['Nom'] . '</h6>';
                        echo '<h2>' . $row['description'] . '</h2>';
                        echo '<div class="spacer-xxxs"></div>';
                        echo '<p>' . $row['nbheures'] . '</p>';
                        echo '</div>';
                        echo '<div class="values-column-image"><img src="' . $row['image_url'] . '" loading="lazy" alt="" class="values-image"></div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Aucun résultat trouvé.";
                }
                ?>
            </div>
        </div>
        <a href="#" class="slider-button--prev">
      <i class="material-icons">chevron_left</i>
    </a>
    <a href="#" class="slider-button--next">
      <i class="material-icons">chevron_right</i>
    </a>
    </div>
</body>
</html>
