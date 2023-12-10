<?php
include("../../Controller/sign.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Dashboard</title>
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
            width: 80%;
            margin-top: 20px;
            background-color: #ead7aa; /* Couleur de fond du tableau (marron clair) */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
            border: 1px solid #d0a45f; /* Couleur des bordures (marron) */
            border-radius: 8px; /* Coins arrondis */
            margin-left: 1000px;
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
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="affichage.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
    
        <div class="navigation">
        <ul>
                <li>
                    <a href="../front/front_office.html">
                        <span class="icon">  
                        </span>
                        <span class="title">UniPath</span>
                    </a>
                </li>

                <li>
                    <a href="espace_admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="affichage2.0.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">user management</span>
                    </a>
                </li>

                <li>
                    <a href="chose_intership.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">internship management</span>
                    </a>
                </li>

                <li>
                    <a href="../AdminDash.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">club management</span>
                    </a>
                </li>
                <li>
                    <a href="chose_crudtraining.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">training management</span>
                    </a>
                </li>


                <li>
                    <a href="../../Model/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                

                <div class="user">
                 <a href="../front/front_office.html">
                    <img src="../../assets/logo.png" alt="photo of the logo">
                </a>
                </div>
            </div>
            <!-- ======================= Cards ================== -->
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
        <!-- =========== Scripts =========  -->
    <script src="compte_etudiant.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
</body>
</html>