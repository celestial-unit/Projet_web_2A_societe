<?php
// Replace these variables with your database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "unipath_db";

try {
    // Create a PDO connection to the database
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get the count of each reclamation type with the corresponding nom_type
    $query = "SELECT tr.nom_type, COUNT(*) AS count FROM reclamation r
              JOIN type_rec tr ON r.type_reclamation = tr.id_type
              GROUP BY r.type_reclamation";
    $stmt = $pdo->query($query);

    // Fetch the data and store it in an associative array
    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[$row['nom_type']] = $row['count'];
    }
} catch (PDOException $e) {
    // If an error occurs, set an error message
    $error = 'Error: ' . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <!-- ======= Styles ====== -->
       
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
   <style>
    body {
    margin: 0;
    font-family: 'Arial', sans-serif;
}

.container {
    display: flex;
    height: 100vh;
}

.navigation {
    width: 250px;
    background-color: #8B4513; /* Brown color */
    color: #fff;
    padding-top: 20px;
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

.navigation .icon {
    margin-right: 10px;
}

.title {
    font-size: 18px;
}

.main {
    flex: 1;
    padding: 20px;
}

#reclamationChartContainer {
    margin-top: 20px;
}

#reclamationChart {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}

   </style>
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
                    <a href="#">
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
                    <a href="stage.php">
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
            
        <div id="reclamationChartContainer">
            <canvas id="reclamationChart"></canvas>
        </div>

            
              <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- ====== ionicons ======= -->
        <!-- Add this in the head section -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                <?php if (isset($data)) : ?>
                    // Extract data for the chart
                    const labels = Object.keys(<?php echo json_encode($data); ?>);
                    const values = Object.values(<?php echo json_encode($data); ?>);

                    // Create a bar chart
                    const ctx = document.getElementById('reclamationChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Reclamations',
                                data: values,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                <?php elseif (isset($error)) : ?>
                    console.error('Error fetching reclamation data:', '<?php echo $error; ?>');
                <?php endif; ?>
            });
        </script>
    </body>
</html>