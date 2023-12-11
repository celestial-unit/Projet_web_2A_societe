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
        
            <style>
                /* Navigation Styles */
    

    /* Example icon styles (adjust as needed) */
    

    /* Smaller Table Styles */
    .userListTable {
  font-family: Arial, sans-serif;
  width: 100%;
  margin-bottom: 20px;
  margin-left: 500px; /* Décalage vers la droite */
}
  
    h1 {
        margin-left: 20px; /* Adjust the left margin of the title */
    }

                
            .container {
                display: flex;
                justify-content: flex-start; /* Alignement du contenu à gauche */
                
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
                margin-bottom: 30px;
                margin-left: 300px; /* Décalage des boutons vers la gauche */
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
            <!-- ======= Styles ====== -->
        
            <link rel="stylesheet" href="../signIn/espace_admin.css">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Admin Dashboard </title>
        <!-- ======= Styles ====== -->
        
    </head>

    <body>
        <!-- =============== Navigation ================ -->
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
                    <a href="../signIn/espace_admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../signIn/affichage2.0.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">user management</span>
                    </a>
                </li>
                <li>
                    <a href="../back/reclamation_BACK.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Complaint's management</span>
                    </a>
                </li>

                <li>
                    <a href="../signIn/chose_intership.php">
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
                    <a href="../signIn/chose_crudtraining.php">
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
        
                <div class="userListTable ">
                    <h1 class="h1">liste des stage</h1>
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
                <td class='description-cell'>
                    <span class='description-label'>" . substr($row["description"], 0, 3) . "...</span>
                    <div class='hidden-content'>
                        <span class='close-btn' onclick='closeDescription(this)'>&times;</span>
                        " . $row["description"] . "
                    </div>
                </td>
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
                

        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>

    <script>
            function closeDescription(btn) {
                const hiddenContent = btn.parentElement;
                hiddenContent.classList.remove("show-content");
            }

            document.addEventListener("DOMContentLoaded", function () {
                const descriptionCells = document.querySelectorAll(".description-cell");

                descriptionCells.forEach((cell) => {
                    const label = cell.querySelector(".description-label");
                    const hiddenContent = cell.querySelector(".hidden-content");

                    label.addEventListener("click", function () {
                        hiddenContent.classList.add("show-content");
                    });
                });
            });

            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </body>
    </html>