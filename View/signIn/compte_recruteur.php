<?php
session_start();
include("../../Model/authenticate.php");
include("../../Controller/sign.php");
$conn = new config();
$pdo = $conn->getConnexion();
$email = $_SESSION['recruteur']['Email']; // Assurez-vous que vous avez l'email de l'utilisateur
$token = $_SESSION['reset_token']; // Assurez-vous que vous avez le token de réinitialisation
// Définir une variable PHP en fonction des champs remplis
$resultatVerification = verifierTokenReinitialisation($email,$pdo);
//token non valide
if (!$resultatVerification) 
{
    // Rediriger l'utilisateur vers la page de réinitialisation si le token n'est pas valide
    header('Location: signIn.html');
    echo "<script>alert('connection time expired');</script>";
    exit();
}
//token valide 
else
{
$champsRempli=(
    !empty($_SESSION['recruteur']['Nom'] )&&
    !empty($_SESSION['recruteur']['Prenom']) &&
    !empty($_SESSION['recruteur']['Adresse'])&&
    !empty($_SESSION['recruteur']['Numero']) &&
    !empty($_SESSION['recruteur']['Domaine_recruteur'])&&
    !empty($_SESSION['recruteur']['Titre_recruteur'] )
   
);

// Générer le script JavaScript avec la variable PHP
echo '<script>';
echo 'var champsRempli = ' . json_encode($champsRempli) . ';';
echo '</script>';
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="../faq/faq_recruteur.html">
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
                <li>
                    <a>
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title" id="delete">Delete account</span>
                    </a>
                </li>

                <li id="profileLink1">
                    <a href="#">
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
                        <div class="numbers">0</div>
                        <div class="cardName">Training</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>


                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">50</div>
                        <div class="cardName">Points</div>
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
                        <h2>Recent statistics about our start up</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                <div>
                <img src="https://www.iweps.be/wp-content/uploads/2023/06/L025-Graph2.jpg" alt="Description de l'image">
                    
</div>
                <div>
                <img src="https://cdn.statcdn.com/Statistic/1125000/1127341-blank-754.png" alt="Description de l'image">
                    
</div>
        
        <!-- Ajoutez plus d'éléments li pour chaque image avec du texte -->
    </ul>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Membres</h2>
                    </div>

                    <table>
                    <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1508243529287-e21914733111?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1514222709107-a180c68d72b4?q=80&w=1949&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1600275669439-14e40452d20b?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1508243529287-e21914733111?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1514222709107-a180c68d72b4?q=80&w=1949&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Julia <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                            </td>
                            <td>
                                <h4>Yassine<br> <span>India</span></h4>
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="compte_recruteur.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script>
function verifierProfil() 
{
        // Utiliser la variable JavaScript
        if (champsRempli) 
        {
            window.location.href = 'page_affichage_recruteur.php';//aziz izid historique des stages recemment habtou
        } else {
            window.location.href = 'formsupprecruteur.html';
        }
    }

    // Ajouter un gestionnaire d'événements au clic sur le lien du profil
document.getElementById('profileLink1').addEventListener('click', verifierProfil);

document.getElementById("delete").addEventListener("click", function() {
confirmDeactivation()});
function confirmDeactivation() 
{
    var userResponse = prompt("Are you sure you want to deactivate your account? Type 'yes' to confirm.");

    if (userResponse !== null && userResponse.toLowerCase() === 'yes') 
    {
        deactivateAccountAndRedirect();
    } else 
    {
        // L'utilisateur a tapé autre chose ou a annulé, aucune action n'est nécessaire
    }
}
function deactivateAccountAndRedirect()
{
  fetch('desableaccount.php', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
  })
  .then(response => response.text())
  .then(data => {
    console.log('Server response:', data);

    if (data.includes('Le compte a été désactivé avec succès.')) {
      alert('The account has been successfully deactivated.');
      window.location.href = '../front/front_office.html';
    } else {
      alert("Une erreur s'est produite lors de la désactivation du compte.");
    }
  });
}

//token 

//token
function timerIncrement() {
    idleTime = idleTime + 5;
    if (idleTime > 5) {  // 5 minutes d'inactivité
        alert('Your session has expired. Please log in again.');
        fetch('../../Model/logout.php')
            .then(response => {
                if (response.ok) 
                {
                    window.location.href = 'signIn.html';  // Redirection vers la page de connexion
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
function resetIdleTime() 
{
    idleTime = 0;
}

let idleTime = 0;
document.addEventListener('mousemove', resetIdleTime);
document.addEventListener('keydown', resetIdleTime);
// Appeler timerIncrement toutes les minutes (ou selon la fréquence souhaitée)
setInterval(timerIncrement, 60000);  // 60000 millisecondes équivalent à 1 minute
</script>
</html>
