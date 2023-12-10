<?php

include '../../Controller/stage.php';
include '../../Model/Stage.php';
$error = "";

// create client
$s = null;

// create an instance of the controller
$staa = new sta();
if (
    isset($_POST["id_stage"]) &&
    isset($_POST["domain"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["date_f"]) &&
    isset($_POST["capacite"]) &&
    isset($_POST["email"]) &&
    isset($_POST["nom_societe"]) &&
    isset($_POST["description"])
) {
    if (
        !empty($_POST["id_stage"]) &&
        !empty($_POST["domain"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["date_f"]) &&
        !empty($_POST["capacite"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["nom_societe"]) &&
        !empty($_POST["description"])
    ) {
        $staa = new sta(
            $_POST['id_stage'],
            $_POST['domain'],
            $_POST['capacite'],
            $_POST['email'],
            $_POST['nom_societe'],
            $_POST['description'],
            new DateTime($_POST['date_f']),
            new DateTime($_POST['date_d'])
        );
        $staa->updatestage($client, $_POST["id_stage"]);


        header('Location: ../front/afficher_stage.php');
        exit(); // Add exit to stop further execution after redirection
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Update</title>
    <!-- ======= Styles ====== -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f0e1; /* Light beige background */
        }

        .container {
            display: flex;
        }

        /* Navigation Styles */
        .navigation {
            background-color: #6c5337; /* Brown */
            color: #fff;
            width: 200px;
            padding: 20px;
        }

        .navigation ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navigation li {
            margin-bottom: 15px;
        }

        .navigation a {
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        h2 {
            color: #6c5337; /* Brown */
        }

        .table {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #6c5337; /* Brown */
            color: #fff;
            cursor: pointer;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #4e3b26; /* Darker brown on hover */
        }
    </style>
   



</head>

<body>
    
    <!-- =============== Navigation ================ -->
     
        <!-- ========================= Main ==================== -->
       <div class="main-content center-table"> 
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $id_stage = $_POST["id_stage"];
    $domaine = $_POST["domaine"];
    $date_d = $_POST["date_d"];
    $date_f = $_POST["date_f"];
    $capacite = $_POST["capacite"];
    $nom_societe = $_POST["nom_societe"];
    $description = $_POST["description"];
    $email = $_POST["email"];

    
    $sql = "UPDATE stage SET 
            domaine = '$domaine',
            date_d = '$date_d',
            date_f = '$date_f',
            capacite = '$capacite',
            nom_societe = '$nom_societe',
            description = '$description',
            email = '$email'
            WHERE id_stage = '$id_stage'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $new_nom_types = $_POST["new_nom_types"];

    $updateTypeStageSQL = "UPDATE type_stage SET nom_types = '$new_nom_types' WHERE id_types = (SELECT type_stage FROM stage WHERE id_stage = '$id_stage')";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // ... Your existing code ...
    
        if ($conn->query($sql) === TRUE) {
            // Record updated successfully, redirect to stage_Back.php
            header('Location: ../front/afficher_stage.php');
            exit(); // Add exit to stop further execution after redirection
        } else {
            echo "Error updating record: " . $conn->error;
        }
    
        // ... Your existing code ...
    }
    
}


$id_stage = $_GET["id"];


$sql = "SELECT stage.*, type_stage.nom_types 
        FROM stage 
        LEFT JOIN type_stage ON stage.type_stage = type_stage.id_types 
        WHERE id_stage = '$id_stage'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
   
   <h2>Update Stage Information</h2>
<div class="table">
    <form method="post" action="">
        <input type="hidden" name="id_stage" value="<?php echo $row["id_stage"]; ?>">
        Domaine: <input class="th" name="domaine" value="<?php echo $row["Domaine"]; ?>"><br>
        Date Début: <input type="text" name="date_d" value="<?php echo $row["date_d"]; ?>"><br>
        Date Fin: <input type="text" name="date_f" value="<?php echo $row["date_f"]; ?>"><br>
        Capacité: <input type="text" name="capacite" value="<?php echo $row["capacite"]; ?>"><br>
        Nom Société: <input type="text" name="nom_societe" value="<?php echo $row["nom_societe"]; ?>"><br>
        Description: <input type="text" name="description" value="<?php echo $row["description"]; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row["email"]; ?>"><br>
        
      
        Nouveau Type de Stage (Nom): <input type="text" name="new_nom_types" value="<?php echo $row["nom_types"]; ?>"><br>
        
        <input type="submit" value="Update">
    </form>
</div>
<button onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.location.href = '../front/afficher_stage.php'
    }
</script>
    
    <?php
} else {
    echo "Record not found";
}

$conn->close();
?>
        
    </div>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
</body>


