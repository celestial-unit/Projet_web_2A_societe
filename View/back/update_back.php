<?php

require '../../Controller/reclamation.php' ;
require "../../Model/Reclamation.php";
// Initialize variables
$error = "";
$r="";
$reclamationC = new Rec(config::getConnexion());

if (
    isset($_POST["id_rec"]) &&
    isset($_POST["type_reclamation"]) &&
    isset($_POST["description"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["etat"]) 
) {
    if (
        !empty($_POST["id_rec"]) &&
        !empty($_POST['type_reclamation']) &&
        !empty($_POST['description']) &&
        !empty($_POST['titre']) &&
        !empty($_POST["etat"])
    ) {
        // Check if 'remarque' is set and not empty
        $remarque = !empty($_POST["remarque"]) ? ' (' . $_POST["remarque"] . ')' : '';

        $r = new reclamation(
            $_POST['id_rec'],
            $_POST['titre'],
            $_POST['description'],
            $_POST['type_reclamation'],
            $_POST['etat'] . $remarque, // Append 'remarque' to 'etat'
            $_POST['timestamp_column']
        );
    
        $reclamationC->updateRec($r, $_POST["id_rec"], $_POST["type_reclamation"],$_POST["description"],$_POST["titre"]);
        
        header('Location:reclamation_BACK.php');
    } else
        $error = "Missing information";
}

// Check if 'id' is set in the URL parameters
if (isset($_GET['id'])) {
    $id_rec = $_GET['id'];
    $r = $reclamationC->showReclamation($id_rec);
} else {
    echo "Error: 'id' is not set in the URL.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Reclamation</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    h1 {
        color: #4f3b36; /* Couleur marron foncé pour le titre */
    }

    form {
        display: flex;
        flex-direction: column;
        margin-top: 15px;
    }

    label {
        margin-bottom: 8px;
        color: #4f3b36; /* Couleur marron foncé pour les labels */
        font-weight: bold;
    }

    select,
    textarea {
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #4f3b36; /* Couleur marron foncé pour la bordure */
        border-radius: 4px;
    }

    button {
        padding: 10px;
        background-color: #926c63; /* Couleur marron moyen pour le fond du bouton */
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #7a584f; /* Couleur marron plus sombre au survol */
    }
</style>


</head>
<body>
    <div class="container">
        <h1>Modifier la Réclamation</h1>
        <form action="" method="post">
            <input type="hidden" name="id_rec" value="<?= $r['id_rec'] ?>">
            <input type="hidden" name="titre" value="<?= $r['titre'] ?>">
            <input type="hidden" name="description" value="<?= $r['description'] ?>">
            <input type="hidden" name="type_reclamation" value="<?= $r['type_reclamation'] ?>">

            <!-- Add a select dropdown for 'etat' -->
            <label for="etat">Etat</label>
            <select id="etat" name="etat" onchange="toggleRemarque()">
                <option value="en cours de traitement" <?= ($r['etat'] == 'en cours de traitement') ? 'selected' : '' ?>>En cours de traitement</option>
                <option value="traitee" <?= ($r['etat'] == 'traitee') ? 'selected' : '' ?>>Traitee</option>
            </select>

            <!-- Add a textarea for 'remarque' with a div wrapper -->
            <div id="remarqueWrapper" style="display: <?= ($r['etat'] == 'traitee') ? 'block' : 'none' ?>">
                <label class="remarque-label" for="remarque">Remarque</label>
                <textarea id="remarque" name="remarque" ><?= $r['remarque'] ?? '' ?></textarea>
            </div>

            <button id="btn" value="send">Modifier</button>
        </form>
    </div>

    <script>
        // Function to toggle visibility of 'Remarque' textarea based on selected 'etat'
        function toggleRemarque() {
            const etatDropdown = document.getElementById('etat');
            const remarqueWrapper = document.getElementById('remarqueWrapper');

            if (etatDropdown.value === 'traitee') {
                remarqueWrapper.style.display = 'block';
            } else {
                remarqueWrapper.style.display = 'none';
            }
        }

        // Call the function on page load to set initial visibility
        toggleRemarque();
    </script>
</body>
</html>
