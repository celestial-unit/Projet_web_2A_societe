<?php
include '../../Controller/stage.php';
$c = new sta();
$tab = $c->liststage();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <!-- ======= Styles ====== -->
        <style>
        .container {
            display: flex;
            justify-content: flex-start; /* Alignement du contenu à gauche */
        }

        .main {
            width: 80%;
            margin-left: 400px; /* Décalage du contenu vers la gauche */
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5; /* Couleur de fond de la page */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            
        }

        #userListTable {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
            background-color: #ead7aa; /* Couleur de fond du tableau (marron clair) */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
            border: 1px solid #d0a45f; /* Couleur des bordures (marron) */
            border-radius: 8px; /* Coins arrondis */
            margin-left: 750px;
        }

        table, th, td {
            border: 1px solid #d0a45f; /* Couleur des bordures (marron) */
        }

        th, td {
            padding: 6px;
            text-align: left;
            font-size: 14px; /* Taille de police */
            color: #634b35; /* Couleur du texte (marron foncé) */
        }

        th {
            background-color: #c3a078; /* Couleur de fond de l'en-tête (marron plus clair) */
            color: #fff; /* Couleur du texte de l'en-tête (blanc) */
        }

        tr:nth-child(even) {
            background-color: #dbc3a0; /* Couleur de fond des lignes paires (marron clair) */
        }

        tr:hover {
            background-color: #d0a45f; /* Couleur de fond au survol (marron) */
            color: #fff; /* Couleur du texte au survol (blanc) */
        }

        h1 {
            color: #634b35; /* Couleur du texte du titre (marron foncé) */
            margin-bottom: 20px;
            margin-left: 550px; /* Décalage des boutons vers la gauche */
        }
        .action-buttons {
            display: flex;
            justify-content: flex-start; /* Alignement à gauche des boutons */
            margin-bottom: 20px;
            margin-left: 350px; /* Décalage des boutons vers la gauche */
        }

        .action-buttons button {
            padding: 10px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-buttons button.add {
            background-color: #836514; /* Couleur verte pour le bouton d'ajout */
            color: #fff; /* Couleur du texte blanc */
        }

        .action-buttons button.delete {
            background-color: #b2925d; /* Couleur rouge pour le bouton de suppression */
            color: #fff; /* Couleur du texte blanc */
        }

        .action-buttons button.disable {
            background-color: #836514; /* Couleur orange pour le bouton de désactivation */
            color: #fff; /* Couleur du texte blanc */
        }

        .action-buttons button.able{
            background-color: #b2925d; /* Couleur bleue pour le bouton de modification */
            color: #fff; /* Couleur du texte blanc */
        }
        .action-buttons button.return{
            background-color: #634b35; /* Couleur bleue pour le bouton de modification */
            color: #fff; /* Couleur du texte blanc */
        }
    </style>
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    
</head>

<body>
    <!-- =============== Navigation ================ -->
    
        <!-- ========================= Main ==================== -->
       
            
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the "stage" table with type information
$sql = "SELECT stage.*, type_stage.nom_types 
        FROM stage 
        LEFT JOIN type_stage ON stage.type_stage = type_stage.id_types";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in an HTML table
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Domaine</th>
        <th>Date Début</th>
        <th>Date Fin</th>
        <th>Capacité</th>
        <th>Nom Société</th>
        <th>Description</th>
        <th>Email</th>
        <th>Type de Stage</th>
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id_stage"] . "</td>
        <td>" . $row["Domaine"] . "</td>
        <td>" . $row["date_d"] . "</td>
        <td>" . $row["date_f"] . "</td>
        <td>" . $row["capacite"] . "</td>
        <td>" . $row["nom_societe"] . "</td>
        <td>" . $row["description"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["nom_types"] . "</td>
        <td>
            <a href='update_stage.php?id=" . $row["id_stage"] . "'>Update</a>
            <a href='delete.php?id=" . $row["id_stage"] . "' onclick='return confirmDelete()'>Delete</a>
        </td>
    </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</div>
      
            
            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            </body>
             
            <button onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>