<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlStatistics = "SELECT tf.domaine, COUNT(f.id_formation) as count
                  FROM typeformation tf
                  LEFT JOIN formation f ON tf.id_typeformation = f.id_typeformation
                  GROUP BY tf.domaine";
$resultStatistics = $conn->query($sqlStatistics);

$statisticsData = array('labels' => array(), 'data' => array());

if ($resultStatistics) {
    while ($rowStatistics = $resultStatistics->fetch_assoc()) {
        $statisticsData['labels'][] = $rowStatistics['domaine'];
        $statisticsData['data'][] = intval($rowStatistics['count']);
    }
} else {
    // Gérer l'erreur si la requête échoue
    echo json_encode(array('error' => 'Erreur dans la requête : ' . $conn->error));
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="formationChart" width="400" height="200"></canvas>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            createFormationChart(<?php echo json_encode($statisticsData); ?>);
        });

        function createFormationChart(statisticsData) {
            var ctx = document.getElementById('formationChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: statisticsData.labels,
                    datasets: [{
                        label: 'Nombre de formations',
                        data: statisticsData.data,
                        backgroundColor: 'rgb(123, 67, 39)', // Utiliser la couleur spécifiée
                        borderColor: 'rgb(123, 67, 39)',   // Utiliser la couleur spécifiée pour la bordure
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
        }
    </script>
</body>
</html>
