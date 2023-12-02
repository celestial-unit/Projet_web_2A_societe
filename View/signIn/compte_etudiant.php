<?php
session_start();
include("../../Model/authenticate.php");
$email = $_SESSION['user']['Email']; // Assurez-vous que vous avez l'email de l'utilisateur
$token = $_SESSION['reset_token']; // Assurez-vous que vous avez le token de réinitialisation

$resultatVerification = verifierTokenReinitialisation($email, $token);

if (!$resultatVerification) 
{
    // Rediriger l'utilisateur vers la page de réinitialisation si le token n'est pas valide
    header('Location: signIn.html');
    exit();
}

// Définir une variable PHP en fonction des champs remplis
$champsRemplis = (
    !empty($_SESSION['user']['Nom']) &&
    !empty($_SESSION['user']['Prenom']) &&
    !empty($_SESSION['user']['Numero']) &&
    !empty($_SESSION['user']['Age']) &&
    !empty($_SESSION['user']['Diplome']) &&
    !empty($_SESSION['user']['Niveau']) &&
    !empty($_SESSION['user']['cin'])
);

// Générer le script JavaScript avec la variable PHP
echo '<script>';
echo 'var champsRemplis = ' . json_encode($champsRemplis) . ';';
echo '</script>';
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
                    <a href="../faq/faq.html">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="../front/settings_etudiant.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li id="profileLink">
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
                        <div class="cardName">Intership</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
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
                        <h2>Recent trainings</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                <li>
                    <p>Test manager training</p>
                    <img src="https://www.affare.tn/image/10_2023_3d23e99c.JPG" alt="Description de l'image 1">
                    
                </li>
                <li>
                    <p>Developement</p>
                    <img src="https://www.affare.tn/image/11_2023_6dec9023.JPG" alt="Description de l'image 2">
                    
                </li>
                <li>
                    <p>Java training</p>
                    <img src="https://www.affare.tn/image/11_2023_af8bda07.JPG" alt="Description de l'image 1">
                    
                </li>
                <li>
                    <p>Graphic Design Training</p>
                    <img src="https://www.affare.tn/image/11_2023_cf54822f.JPG" alt="Description de l'image 2">
                    
                </li>
        <!-- Ajoutez plus d'éléments li pour chaque image avec du texte -->
    </ul>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Upcoming Trainings</h2>
                    </div>

                    <table>
                    <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/09/17/1000_F_94091751_DRwmMfbJKq4kOLw4gx7LGN87QhXDIsxL.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Cloud Computing:<br><span>Training in cloud platforms like AWS, Azure, or Google Cloud
Courses on cloud architecture and management.</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/52/57/1000_F_94525761_9tavqNFN1hD9G6eYAAUL3TaaPs9XCNyB.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Blockchain Technology<br><span>Blockchain training and certification
Courses on smart contracts and decentralized applications (DApps)</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as1.ftcdn.net/v2/jpg/00/65/73/40/1000_F_65734064_nrIH89A9J3q5icEv8HuTTTwpLiCOGXiu.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Soft Skills and Leadership<br><span>Training in communication, teamwork, and interpersonal skills
Leadership development courses</span></h4>
                            </td>
                        </tr>



                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/09/17/1000_F_94091751_DRwmMfbJKq4kOLw4gx7LGN87QhXDIsxL.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Web Development and Programming<br><span>Web development training
Programming courses in Python, JavaScript, etc.</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/52/57/1000_F_94525761_9tavqNFN1hD9G6eYAAUL3TaaPs9XCNyB.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Data Science and Data Analysis<br><span>Data science courses
Training in data analysis with Python or R</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as1.ftcdn.net/v2/jpg/00/65/73/40/1000_F_65734064_nrIH89A9J3q5icEv8HuTTTwpLiCOGXiu.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Artificial Intelligence and Machine Learning:<br><span>Introduction to AI courses
Machine learning and deep learning training</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/03/85/96/05/1000_F_385960550_VNvNA7hr2OTmGpGOdsrfVbtWhxOGU50p.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Project Management<br><span>Agile project management training
Courses on project planning and execution</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/03/29/61/23/1000_F_329612350_BGFmUegW0Hc6QvmAVJwMKxYm24Wzvsqw.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Graphic Design and UX/UI<br><span>Graphic design training
UX (User Experience) and UI (User Interface) courses</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as1.ftcdn.net/v2/jpg/03/11/99/78/1000_F_311997828_4KZ1P5sEHAJ2wT6nf4ZlPSUjGbSg2Myx.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Digital Marketing:<br><span>Online marketing courses
SEO (Search Engine Optimization) and online advertising training</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/03/85/96/05/1000_F_385960550_VNvNA7hr2OTmGpGOdsrfVbtWhxOGU50p.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Foreign Languages<br><span>Online foreign language courses</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/03/29/61/23/1000_F_329612350_BGFmUegW0Hc6QvmAVJwMKxYm24Wzvsqw.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Finance and Accounting<br><span>Financial analysis training
Corporate finance and accounting courses</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as1.ftcdn.net/v2/jpg/03/11/99/78/1000_F_311997828_4KZ1P5sEHAJ2wT6nf4ZlPSUjGbSg2Myx.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Cybersecurity:<br><span>Cybersecurity training and certifications
Courses on ethical hacking and network security</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/09/17/1000_F_94091751_DRwmMfbJKq4kOLw4gx7LGN87QhXDIsxL.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Web Development and Programming<br><span>Web development training
Programming courses in Python, JavaScript, etc.</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/52/57/1000_F_94525761_9tavqNFN1hD9G6eYAAUL3TaaPs9XCNyB.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Data Science and Data Analysis<br><span>Data science courses
Training in data analysis with Python or R</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as1.ftcdn.net/v2/jpg/00/65/73/40/1000_F_65734064_nrIH89A9J3q5icEv8HuTTTwpLiCOGXiu.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Artificial Intelligence and Machine Learning:<br><span>Introduction to AI courses
Machine learning and deep learning training</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/03/85/96/05/1000_F_385960550_VNvNA7hr2OTmGpGOdsrfVbtWhxOGU50p.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Project Management<br><span>Agile project management training
Courses on project planning and execution</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/03/29/61/23/1000_F_329612350_BGFmUegW0Hc6QvmAVJwMKxYm24Wzvsqw.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Graphic Design and UX/UI<br><span>Graphic design training
UX (User Experience) and UI (User Interface) courses</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as1.ftcdn.net/v2/jpg/03/11/99/78/1000_F_311997828_4KZ1P5sEHAJ2wT6nf4ZlPSUjGbSg2Myx.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Digital Marketing:<br><span>Online marketing courses
SEO (Search Engine Optimization) and online advertising training</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/09/17/1000_F_94091751_DRwmMfbJKq4kOLw4gx7LGN87QhXDIsxL.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Cloud Computing:<br><span>Training in cloud platforms like AWS, Azure, or Google Cloud
Courses on cloud architecture and management.</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="https://as2.ftcdn.net/v2/jpg/00/94/52/57/1000_F_94525761_9tavqNFN1hD9G6eYAAUL3TaaPs9XCNyB.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Blockchain Technology<br><span>Blockchain training and certification
Courses on smart contracts and decentralized applications (DApps)</span></h4>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="compte_etudiant.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script>
function verifierProfil() 
{
        // Utiliser la variable JavaScript
        if (champsRemplis) 
        {
            window.location.href = 'page_affichage_etudiant.php';
        } else {
            window.location.href = 'formsuppetudiant.php';
        }
    }

    // Ajouter un gestionnaire d'événements au clic sur le lien du profil
document.getElementById('profileLink').addEventListener('click', verifierProfil);
</script>
</html>