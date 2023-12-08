<?php
require '../config.php';
$db = config::getConnexion();

$sqlStatistics = "SELECT tf.domaine, COUNT(f.id_formation) as count
                  FROM typeformation tf
                  LEFT JOIN formation f ON tf.id_typeformation = f.id_typeformation
                  GROUP BY tf.domaine";
$resultStatistics = $db->query($sqlStatistics);

$statisticsData = array('labels' => array(), 'data' => array());

if ($resultStatistics) {
    while ($rowStatistics = $resultStatistics->fetch(PDO::FETCH_ASSOC)) {
        $statisticsData['labels'][] = $rowStatistics['domaine'];
        $statisticsData['data'][] = intval($rowStatistics['count']);
    }
} else {
    // Gérer l'erreur si la requête échoue
    echo json_encode(array('error' => 'Erreur dans la requête : ' . $db->errorInfo()));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="espaceadmin.css">
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
                    <a href="">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">internship management</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">club management</span>
                    </a>
                </li>
                <li>
                    <a href="newcrudview.php">
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

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                 <a href="../front/front_office.html">
                    <img src="../../assets/logo.png" alt="photo of the logo">
                </a>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $userCount; ?></div>
                        <div class="cardName">Number of users</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
             <!-- ======================= Cards ================== -->
                <div class="card">
                    <div>
                        <div class="numbers">20</div>
                        <div class="cardName">Intership sharing</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">100</div>
                        <div class="cardName">club sharing</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">1000dt</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
              <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                        <table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Payment</td>
            <td>Status</td>
        </tr>
    </thead>

    <tbody>
        <?php
      
        $sql = "SELECT nom, ispaid, nature_cours FROM formation";
        $result = $db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $statusColors = array(
                'normal' => 'status-normal',
                'accelerated' => 'status-accelerated',
                // Ajoutez d'autres valeurs de status avec leurs classes CSS correspondantes
            );
        
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $name = $row["nom"];
                $ispaid = $row["ispaid"];
                $nature_cours = $row["nature_cours"];
        
                // Déterminer la classe de statut en fonction de la valeur de "nature_cours"
                $statusClass = isset($statusColors[$nature_cours]) ? $statusColors[$nature_cours] : '';
        
                // Afficher une ligne dans le tableau pour chaque enregistrement
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>" . (($ispaid == 1) ? 'Paid' : 'Free') . "</td>"; // Modification ici
                echo "<td><span class='status $statusClass'>$nature_cours</span></td>";
                echo "</tr>";
            }
               
        }
        // Vérifier s'il y a des résultats
        
      else {
            // Gestion des erreurs de requête
            die("Erreur dans la requête : " . $db->errorInfo());        }
        ?>
    </tbody>
                        </tbody>
                    </table>
                </div>
                

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Team membres</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/celia.PNG" alt="photo of celia"></div>
                            </td>
                            <td>
                                <h4>Celia Marrakchi <br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/ghadhoun.PNG" alt="photo of ghadhoun"></div>
                            </td>
                            <td>
                                <h4>Aziz Ghadhoun <br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/kenza.PNG" alt="photo of kenza"></div>
                            </td>
                            <td>
                                <h4>Kenza Chtioui<br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/chouaia.PNG" alt="photo of chouaia"></div>
                            </td>
                            <td>
                                <h4>Aziz Chouaia<br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/emna.PNG" alt="photo of emna"></div>
                            </td>
                            <td>
                                <h4>Emna Masmoudi<br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/chourabi.PNG" alt="photo of Malek"></div>
                            </td>
                            <td>
                                <h4>Malek Chourabi<br> <span>Tunisia</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
                </div>
                
                <table>
                    <li>
                    <canvas id="formationChart"></canvas>
                    </li>
                </table>
            </div>
        </div>
       
    </div>
        

    

   
    <!-- =========== Scripts =========  -->
    <script src="compte_etudiant.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
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
        function ajusterTailleGraphique()
     {
    var largeurGraphique = 30; // Définissez la largeur souhaitée en pixels
    var hauteurGraphique = 30; // Définissez la hauteur souhaitée en pixels

   
    // Modifiez le style du conteneur du graphique
    document.getElementById('myChart').style.width = largeurGraphique + 'px';
    document.getElementById('myChart').style.height = hauteurGraphique + 'px';
    document.getElementById('Chart').style.width = largeurGraphique + 'px';
    document.getElementById('Chart').style.height = hauteurGraphique + 'px';
     }

// Appelez la fonction pour ajuster la taille du graphique
ajusterTailleGraphique();
    </script>
</body>
</html>