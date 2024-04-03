<?php
include '../../Controller/reclamation.php';
include '../../Model/Reclamation.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$error = "";

$reclamationC = new Rec(config::getConnexion());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["id"]) &&
        isset($_POST["titre"]) &&
        isset($_POST["description"]) &&
        isset($_POST["type_reclamation"])
    ) {
        $id = $_POST["id"];
        $titre = $_POST["titre"];
        $description = $_POST["description"];
        $typeReclamation = $_POST["type_reclamation"];

        $rec = new reclamation(null, $titre, $description, $typeReclamation, 'en cours de traitement',$timestamp_column);

        // Assuming you have a method to get the type by ID
       // Assuming you have a method to get the type by ID
$type = $reclamationC->getTypeById($rec->getType());

if ($type !== null) {
    $reclamationC->updateReclamation($rec, $id, $type['id_type']); // Pass the type ID, not the type name
    header("location: affiche.php");
    exit; // Ensure script stops executing after the redirect
} else {
    // Handle the case where the type is not found
    $error = "Type not found";
}

    } else {
        $error = "Missing information";
    }
}  elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $rec = $reclamationC->getReclamationById($id);

    if (is_array($rec)) {
        // Handle the case where $rec is an array (possibly an error condition)
        var_dump($rec); // Output the contents of $rec for debugging purposes
        exit;
    }

    if (!$rec instanceof reclamation) {
        // Handle invalid response, redirect or show an error message
        header("location: affiche.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Reclamation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    
</head>


<body>
<div class="container">
    <h1>Modifier la Réclamation</h1>
    <form action="update.php" method="post">

    <?php if (isset($rec)): ?>
        <input type="hidden" name="id" value="<?= $rec->getIdreclamationt() ?>">
        <label for="sujet">Titre</label>
        <input type="text" id="sujet" name="titre" value="<?= $rec->gettitre() ?>" placeholder="L'objet de votre message">
        <label for="subject">Message</label>
        <textarea id="subject" name="description" placeholder="Votre message" style="height:200px"><?= $rec->getsubject() ?></textarea>
        <!-- Add this block inside your form -->
<!-- Add this block inside your form -->
<div class="form-control text">
    <label for="type_reclamation" class="label">Type de réclamation</label>
    <select id="type_reclamation" name="type_reclamation">
        <?php
        $types = $reclamationC->getTypes(); // Assuming this method returns an array of types
        foreach ($types as $type) {
            echo "<option value='" . $type['id_type'] . "'";
            if ($rec->getType() == $type['id_type']) {
                echo " selected";
            }
            echo ">" . $type['nom_type'] . "</option>";
        }
        ?>
    </select>
</div>
        
        <button id="btn" value="send">Modifier</button>
    <?php else: ?>
        <p>Error: Reclamation not found.</p>
    <?php endif; ?>

    </form>
</div>
</body>
</html>
