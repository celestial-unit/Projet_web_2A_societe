<?php
session_start();
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../signIn/compte_etudiant.css">
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="affichage_users.php">
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
                    <a href="">
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
                            <tr>
                                <td>David</td>
                                <td>Paid</td>
                                <td><span class="status delivered">abled</span></td>
                            </tr>

                            <tr>
                                <td>Julia</td>
                                <td>Not paid</td>
                                <td><span class="status pending">abled</span></td>
                            </tr>

                            <tr>
                                <td>Mariem</td>
                                <td>Paid</td>
                                <td><span class="status return">disabled</span></td>
                            </tr>

                            <tr>
                                <td>Zied</td>
                                <td>Paid</td>
                                <td><span class="status inProgress">abled</span></td>
                            </tr>

                            <tr>
                                <td>Hejer</td>
                                <td>Paid</td>
                                <td><span class="status delivered">abled</span></td>
                            </tr>

                            <tr>
                                <td>fedi</td>
                                <td>not paid</td>
                                <td><span class="status pending">abled</span></td>
                            </tr>

                            <tr>
                                <td>yassine</td>
                                <td>Paid</td>
                                <td><span class="status return">disabled</span></td>
                            </tr>

                            <tr>
                                <td>olfa</td>
                                <td>Paid</td>
                                <td><span class="status inProgress">abled</span></td>
                            </tr>
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
                  

                    <li>
                        <img src="https://blog.hubspot.com/hs-fs/hubfs/copy-template-slide-pie-chart%20(7).jpg?width=975&height=549&name=copy-template-slide-pie-chart%20(7).jpg" alt="stats">
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
