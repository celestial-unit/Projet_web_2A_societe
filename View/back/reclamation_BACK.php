<?php
include 'affichersupprreclamation.php';
include 'affichersupptype.php';
include '../../Controller/rep.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$r = new Rec(config::getConnexion());
$tab = $r->listReclamations();
$s = new type();
$tableau= $s->listtype();
$rep = new rep();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_rec = $_GET["id"];

    
    // Call the deleteReclamation method with the provided id
    $r->deleteReclamation($id_rec);

    // Redirect back to the original page (adjust the URL as needed)
    header("location: reclamation_BACK.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_reponse"])) {
    $id_reponse = $_GET["id_reponse"];

  
    $rep->deletereponse($id_reponse);

    // Redirect back to the page with the responses table
    header("location: reclamation_BACK.php"); // Replace with the actual page URL
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
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
            padding: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 0vh;
            
        }

        #userListTable {
            border-collapse: collapse;
            width: 40%;
            margin-top: 20px;
            background-color: #ead7aa; /* Couleur de fond du tableau (marron clair) */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
            border: 1px solid #d0a45f; /* Couleur des bordures (marron) */
            border-radius: 8px; /* Coins arrondis */
            margin-left: 9000px;
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
            margin-left: -25%; /* Décalage des boutons vers la gauche */
        }
        .action-buttons {
            display: flex;
            justify-content: flex-start; /* Alignement à gauche des boutons */
            margin-bottom: 20px;
            margin-left: 700px; /* Décalage des boutons vers la gauche */
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
    <link rel="stylesheet" href="../signIn/affichage.css">
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
                    <a href="../back/reclamation_BACK.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Complaint's management</span>
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
        
        <!-- ========================= Main ==================== -->
        <div class="main">
    <center>
        <h1>Liste des reclamations</h1>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>id reclamation</th>
            <th>titre</th>
            <th>description</th>
            <th>type reclamation</th>
            <th>etat de reclamation</th>
            <th>Action</th> <!-- Add Action column -->
            <th>reponse</th>
        </tr>
        <?php foreach ($tab as $reclamation) : ?>
            <tr>
                <?php
                // Fetch the corresponding type from the type_rec table
                $typeId = $reclamation['type_reclamation'];
                $type = $r->getTypeById($typeId); // Assuming you have a method to fetch type by ID
                $typeName = $type['nom_type'] ?? 'Unknown';
                ?>
                <td><?= $reclamation['id_rec'] ?></td>
                <td><?= $reclamation['titre'] ?></td>
                <td><?= $reclamation['description'] ?></td>
                <td><?= $typeName ?></td> <!-- Use $typeName instead of $reclamation['type_reclamation'] -->
                <td><?= $reclamation['etat'] ?></td>
                <td>
    <a href="update_back.php?id=<?= $reclamation['id_rec'] ?>">Update</a>
    <a href="reponse.php?id=<?= $reclamation['id_rec'] ?>">Response</a> <!-- Pass id_rec to the Response form -->
    <a href="reclamation_BACK.php?id=<?= $reclamation['id_rec'] ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
</td>
                <td><?= $reclamation['reponse'] ?></td> <!-- Display the response -->
            </tr>
        <?php endforeach; ?>
        </tabl/>
</div>
   
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
