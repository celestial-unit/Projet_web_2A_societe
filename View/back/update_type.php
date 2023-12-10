<?php
require '../../Model/type.php'; // Adjust the path accordingly
require '../../Controller/type_stage.php'; // Adjust the path accordingly

$typeController = new type_s();
$types = $typeController->listetype_s();

// Check if the form is submitted for delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $typeController->delettype_s($deleteId);

}
$error = "";

$periode = null;


$typee = new type_s();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    if (
        isset($_POST["update_id"]) &&
        isset($_POST["updated_type"])
    ) {
        if (
            !empty($_POST["update_id"]) &&
            !empty($_POST['updated_type'])
        ) {
            $t = new type(
                $_POST['update_id'],
                $_POST['updated_type']
            );

            $typee->updatestage($t, $t->getIdtypestage());

            header('Location: ./update_type.php');
            exit();
        } else {
            $error = "Missing information";
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type Stage List</title>
    
    <style>
    

    .table-container {
  margin-left: 700px; /* Décalage vers la droite */
  margin-top: 50px;
}          
    .container {
    display: flex;
    justify-content: flex-start; /* Alignement du contenu à gauche */
    }           
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f5f5f5; /* Couleur de fond de la page */
                margin: 0;
                padding: 0;
                display: flex;
                align-items: left;
                justify-content:left;
                flex-direction: column;
                height:100vh;
                
            }

           

            table, th, td {
                border: 1px solid #d0a45f; /* Couleur des bordures (marron) */
            }

            th, td {
                padding: 3px;
                text-align: left;
                font-size: 14px; /* Taille de police */
                color: #634b35; /* Couleur du texte (marron foncé) */
            }

            th {
                background-color:#f5f5f5; /* Couleur de fond de l'en-tête (marron plus clair) */
                color:#836514; /* Couleur du texte de l'en-tête (blanc) */
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
                margin-bottom: 3px;
                margin-left: 690px; /* Décalage des boutons vers la gauche */
                margin-top: 30px;
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
            .hidden-content {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .show-content {
            display: block;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    

        </style>

<link rel="stylesheet" href="../signIn/espace_admin.css">
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
                    <a href="../SignIn/espace_admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../SignIn/affichage2.0.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">user management</span>
                    </a>
                </li>

                <li>
                    <a href="../SignIn/chose_intership.php">
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
                    <a href="../SignIn/chose_crudtraining.php">
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
<center>

    <!-- Display all types -->
    <div > <h1 class="h1">liste des types</h1></div>
    <div class="table-container">
        <table>
            
           
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($types as $type) : ?>
                    <tr>
                        <td><?= $type['id_types'] ?></td>
                        <td><?= $type['nom_types'] ?></td>
                        <td>
                            <!-- Form for delete action -->
                            <form method="post" action="">
                                <input type="hidden" name="delete_id" value="<?= $type['id_types'] ?>">
                                <button type="submit">Delete</button>
                            </form>

                            <!-- Form for update action -->
                            <form method="post" action="">
                                <input type="hidden" name="update_id" value="<?= $type['id_types'] ?>">
                                <input type="text" name="updated_type" value="<?= $type['nom_types'] ?>">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <button><a href="add_type.php">Add Type</a></button>
    </div>
    <!-- ... your existing body content ... -->
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>
