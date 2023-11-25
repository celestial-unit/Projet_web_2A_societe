<?php
include("../../Controller/sign.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre titre</title>

    <!-- Intégrer le style CSS ici -->
    <style>
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
            width: 80%;
            margin-top: 20px;
            background-color: #ead7aa; /* Couleur de fond du tableau (marron clair) */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
            border: 1px solid #d0a45f; /* Couleur des bordures (marron) */
            border-radius: 8px; /* Coins arrondis */
        }

        table, th, td {
            border: 1px solid #d0a45f; /* Couleur des bordures (marron) */
        }

        th, td {
            padding: 12px;
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
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
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
</head>

<body>
<h1>Users List</h1>
<div class="action-buttons">
    <button class="return" id="return">Return</button>
        <button class="add" id="add">Add/edit User</button>
        <button class="delete" id="delete">Delete User</button>
        <button class="disable" id="disable">Disable Account</button>
        <button class="able" id="able">Able Account</button>
    </div>
    <?php
    $personne = new Personne();
    $personne->showUserList();
    ?>
</body>
<script>
     document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("add");
    addButton.addEventListener("click", function () {
        window.location.href = 'ajout_utulisateur_par_admin.php';
    });
});
document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("able");
    addButton.addEventListener("click", function () {
        window.location.href = 'able_user_by_admin.php';
    });
});
document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("delete");
    addButton.addEventListener("click", function () {
        window.location.href = 'delete_user_by_admin.php';
    });
});
document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("disable");
    addButton.addEventListener("click", function () {
        window.location.href = 'disable_user_by_admin.php';
    });
});
document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("return");
    addButton.addEventListener("click", function () {
        window.location.href = 'espace_admin.php';
    });
});
</script>
</html>