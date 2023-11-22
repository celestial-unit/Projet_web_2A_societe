<?php
include '../../controler/stage.php';
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
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7; /* Light gray background */
        }

        .container {
            display: flex;
        }

        /* Navigation Styles */
        .navigation {
            background-color: #3d2914; /* Brown color for navigation background */
            color: #fff; /* White text color */
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
            color: #fff; /* White text color for links */
            display: flex;
            align-items: center;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #3d2914; /* Brown border for table cells */
        }

        th {
            background-color: #6a4d25; /* Darker brown color for table header */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #e0d4bf; /* Lighter brown color for even rows */
        }

        /* Footer Styles */
        footer {
            background-color: #3d2914;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
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
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            
                        </span>
                        <span class="title">UniPath</span>
                    </a>
                </li>

                <li>
                    <a href="./back.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="./stage_Back.php">
                        <span class="title">departement stage</span>
                    </a>
                </li>

                <li>
                    <a href="./reclamation_BACK.php">
                        <span class="title">reclamation</span>

                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
       
            
        <?php
// Connect to your database (replace these variables with your actual database credentials)
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
             

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

