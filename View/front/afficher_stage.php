<?php
include("../../Controller/sign.php");
session_start();
$email = $_SESSION['user']['Email'];
$conn = new config();
$pdo = $conn->getConnexion();?>
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
       
    </style>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../SignIn/affichage.css">
    
</head>
<body>
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
                    <a href="../signIn/compte_recruteur.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../faq/faq.html">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="../front/settings_recruteur.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li id="profileLink">
                    <a href="typestage.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Profile</span>
                    </a>
                </li>

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


        <h1>Intership List</h1>
        
</div>
<?php
try {
    // Requête SQL pour récupérer les informations de stage de l'utilisateur
    $sql = "SELECT * FROM stage WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Récupérer les résultats de la requête
    $stageInfoArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if (!empty($stageInfoArray)) {
    echo '<table border="1">';
    echo "<tr><td>Titre</td><td>Date de début</td><td>Date de fin</td><td>Capacité</td><td>Nom de la société</td><td>Description</td><td>Email</td><td>action</td></tr>";
    foreach ($stageInfoArray as $stageInfo) {
        echo "<tr>";
        echo "<td>" . $stageInfo['Domaine'] . "</td>";
        echo "<td>" . $stageInfo['date_d'] . "</td>";
        echo "<td>" . $stageInfo['date_f'] . "</td>";
        echo "<td>" . $stageInfo['capacite'] . "</td>";
        echo "<td>" . $stageInfo['nom_societe'] . "</td>";
        echo "<td>" . $stageInfo['description'] . "</td>";
        echo "<td>" . $stageInfo['email'] . "</td>";
        echo "<td>
                <a href='../back/update_stage1.php?id=" . $stageInfo["id_stage"] . "'>Update</a>
                <a href='../back/delete1.php?id=" . $stageInfo["id_stage"] . "' onclick='return confirmDelete()'>Delete</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucune information de stage trouvée pour cet utilisateur.";
}
?>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>
<script>
     
</script>