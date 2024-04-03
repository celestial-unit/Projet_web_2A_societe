<?php
// Include the file with the definition of the sta class
require '../../Controller/stage.php';

// Rest of your PHP code
$sta = new sta();
$statistics = $sta->getTypeStageStatisticsWithNomTypes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nom Types Statistics Graph</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="main">
        <!-- Create a canvas for the graph -->
        <div style="width: 80%;">
            <canvas id="nomTypesChart"></canvas>
        </div>

        <!-- Create a script to generate the graph using Chart.js -->
        <script>
            // Extract data from PHP to JavaScript
            var statisticsData = <?php echo json_encode($statistics); ?>;
            
            // Extract labels and data for Chart.js
            var labels = statisticsData.map(statistic => statistic.nom_types);
            var data = statisticsData.map(statistic => statistic.type_count);

            // Create a bar chart
            var ctx = document.getElementById('nomTypesChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nom Types Statistics',
                        data: data,
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
        </script>
    </div>
</body>
</html>
