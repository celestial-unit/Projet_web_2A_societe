<?php
session_start();
//aziz
//require '../../Controller/stage.php';
//$sta = new sta();
//$statistics = $sta->getTypeStageStatisticsWithNomTypes();

include("../../Model/authenticate.php");
include("../../Controller/sign.php");
$pdo = Config::getConnexion(); // Assurez-vous d'avoir une connexion PDO
$personne = new Personne();
$userCount = $personne->countUsers($pdo);
$email =$_SESSION['admin']['Email'];
$token = $_SESSION['admintoken']; // Assurez-vous que vous avez le token de réinitialisation
$resultatVerification = verifierTokenReinitialisation($email, $pdo);
//token non valide
if (!$resultatVerification) 
{
    // Rediriger l'utilisateur vers la page de réinitialisation si le token n'est pas valide
    header('Location: signIn.html');
    echo "<script>alert('connection time expired');</script>";
    exit();
}


//chart
//etudiant
$requeteEtudiants = "SELECT COUNT(*) as nbEtudiants FROM personne WHERE role = 'etudiant'";
$resultatEtudiants = $pdo->query($requeteEtudiants);
$nombreEtudiants = $resultatEtudiants->fetchColumn();
//recruteur
$requeteRecruteurs = "SELECT COUNT(*) as nbRecruteurs FROM personne WHERE role = 'recruteur'";
$resultatRecruteurs = $pdo->query($requeteRecruteurs);
$nombreRecruteurs = $resultatRecruteurs->fetchColumn();
//statistiques
$totalUtilisateurs = $nombreEtudiants + $nombreRecruteurs+1;

$pourcentageEtudiants = ($nombreEtudiants / $totalUtilisateurs) * 100;
$pourcentageRecruteurs = ($nombreRecruteurs / $totalUtilisateurs) * 100;

//abled
$abled = "SELECT COUNT(*) as nbabled FROM personne WHERE Status = 'Abled'";
$abled = $pdo->query($abled);
$nombreabled = $abled->fetchColumn();
//disabled
$disabled = "SELECT COUNT(*) as nbdisabled FROM personne WHERE Status = 'Disabled'";
$disabled = $pdo->query($disabled);
$nombredisabled = $disabled->fetchColumn();
//stat
$pourcentageabled= ($nombreabled / $totalUtilisateurs) * 100;
$pourcentagedisabled= ($nombredisabled / $totalUtilisateurs) * 100;


//emna 
$sqlStatistics = "SELECT tf.domaine, COUNT(f.id_formation) as count
                  FROM typeformation tf
                  LEFT JOIN formation f ON tf.id_typeformation = f.id_typeformation
                  GROUP BY tf.domaine";
$resultStatistics = $pdo->query($sqlStatistics);

$statisticsData = array('labels' => array(), 'data' => array());

if ($resultStatistics) {
    while ($rowStatistics = $resultStatistics->fetch(PDO::FETCH_ASSOC)) {
        $statisticsData['labels'][] = $rowStatistics['domaine'];
        $statisticsData['data'][] = intval($rowStatistics['count']);
    }
} else {
    // Gérer l'erreur si la requête échoue
    echo json_encode(array('error' => 'Erreur dans la requête : ' . $pdo->errorInfo()));
}

//aziz 
function getCapaciteByDomainStatistics($db)
    {
        $tableName = 'stage';
        $checkTableQuery = "SHOW TABLES LIKE '$tableName'";
        $tableExists = $db->query($checkTableQuery)->fetchColumn();

        if (!$tableExists) {
            die("Error: Table '$tableName' does not exist.");
        }

        $sql = "SELECT Domaine, SUM(capacite) AS total_capacite
                FROM stage
                GROUP BY Domaine";

        try {
            $statistics = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $statistics;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function getTypeStageStatisticsWithNomTypes($db)
    {
        $tableName = 'stage';
        $checkTableQuery = "SHOW TABLES LIKE '$tableName'";
        $tableExists = $db->query($checkTableQuery)->fetchColumn();

        if (!$tableExists) {
            die("Error: Table '$tableName' does not exist.");
        }

        $sql = "SELECT type_stage, COUNT(*) AS type_count, type_stage.nom_types
                FROM stage
                LEFT JOIN type_stage ON stage.type_stage = type_stage.id_types
                GROUP BY type_stage";

        try {
            $statistics = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $statistics;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    $statistics = getTypeStageStatisticsWithNomTypes($pdo);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
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
                    <a href="chose_intership.php">
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
                    <a href="chose_crudtraining.php">
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
                        
                            <?php
                            $pdo = Config::getConnexion(); // Assurez-vous d'avoir une connexion PDO

                            $sql = "SELECT Nom, ispaid, nature_cours FROM formation";
                            $result = $pdo->query($sql);
                            
                            if ($result) {
                                $statusColors = array(
                                    'normal' => 'status-normal',
                                    'accelerated' => 'status-accelerated',
                                    // Ajoutez d'autres valeurs de status avec leurs classes CSS correspondantes
                                );
                            
                                echo "<table>"; // Ajout d'une balise <table> pour afficher les résultats dans un tableau
                            
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    $name = $row["Nom"];
                                    $ispaid = $row["ispaid"];
                                    $nature_cours = $row["nature_cours"];
                            
                                    // Déterminer la classe de statut en fonction de la valeur de "nature_cours"
                                    $statusClass = isset($statusColors[$nature_cours]) ? $statusColors[$nature_cours] : '';
                            
                                    // Afficher une ligne dans le tableau pour chaque enregistrement
                                    echo "<tr>";
                                    echo "<td>$name</td>";
                                    echo "<td>" . (($ispaid == 1) ? 'Paid' : 'Free') . "</td>";
                                    echo "<td><span class='status $statusClass'>$nature_cours</span></td>";
                                    echo "</tr>";
                                }
                            
                                echo "</table>"; // Fermeture de la balise <table>
                            } else {
                                // Gestion des erreurs de requête
                                die("Erreur dans la requête : " . $pdo->errorInfo()[2]);
                            }
                            ?>
    
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
                        <canvas id="myChart" width="10" height="10" position="fixed"></canvas>
        
                    </li>
                    <li>
                        <canvas id="Chart" width="100" height="100" position="fixed"></canvas>
                    </li>
                    
                    <li>
                        <canvas id="formationChart"></canvas>
                    </li>

                    <li>
                        <canvas id="nomTypesChart"></canvas>
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
        var ctx = document.getElementById('myChart').getContext('2d');

        var pourcentageEtudiants = <?php echo $pourcentageEtudiants; ?>;
        var pourcentageRecruteurs = <?php echo $pourcentageRecruteurs; ?>;

        var data = {
            labels: ['Students', 'recruiter'],
            datasets: [{
                data: [pourcentageEtudiants, pourcentageRecruteurs],
                backgroundColor: ['#D2B48C', '#C3E6CB']
            }]
        };

        var options = {
            plugins: {
                title: {
                    display: true,
                    text: 'Rate of the Number of Students and Recruiters in UNIPATH',
                    font: {
                        size: 16
                    }
                }
            }
        }

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options:options,
        });

    var ctxx = document.getElementById('Chart').getContext('2d');
    var pourcentageabled = <?php echo $pourcentageabled; ?>;
    var pourcentagedisabled = <?php echo $pourcentagedisabled ; ?>;
    var data = {
        labels: ['Abled Account', 'Disabled Account'],
        datasets: [{
            data: [pourcentageabled, pourcentagedisabled],
            backgroundColor: ['#F7F7DC', '#C3E6CB'] // Couleurs adaptées selon les besoins
        }]
    };
    var options = {
    plugins: {
        title: {
            display: true,
            text: 'Rate of Abled and Disabled Accounts in UNIPATH',
            font: {
                size: 16
            }
        }
    }
}

    var myChart = new Chart(ctxx, {
        type: 'bar', // Changement du type de graphique à 'bar'
        data: data,
        options:options,
    });


    //emna 
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

//aziz chart 

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
</body>
</html>
